<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display the partner login view.
     */
    public function showLoginForm(): View|RedirectResponse
    {
        if (Auth::guard('partner')->check()) {
            return redirect()->route('partner.dashboard');
        }

        return view('frontend.pages.partner.login');
    }

    /**
     * Handle an incoming partner authentication request.
     */
    public function login(Request $request): JsonResponse|RedirectResponse
    {
        $loginInput = trim((string) $request->input('login', $request->input('email', '')));
        $password = (string) $request->input('password', '');
        $remember = $request->boolean('remember');

        $validator = Validator::make([
            'login' => $loginInput,
            'password' => $password,
        ], [
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ], [
            'login.required' => 'Please enter your registered email address, phone number, or partner code.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 6 characters long.',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => [
                        'email' => $validator->errors()->get('login') ?: $validator->errors()->get('email'),
                        'password' => $validator->errors()->get('password'),
                    ],
                    'message' => 'Please fix the errors below.',
                ], 422);
            }

            return back()->withErrors($validator)->withInput($request->only('email', 'login', 'remember'));
        }

        // 1. Resolve Partner
        $partner = null;

        // A. Match by email
        if (filter_var($loginInput, FILTER_VALIDATE_EMAIL)) {
            $partner = Partner::where('email', $loginInput)->first();
        }

        // B. Match by Partner Code (e.g. PTR-00002 or PTR-2 or direct partner ID)
        if (!$partner && preg_match('/^PTR-?0*(\d+)$/i', $loginInput, $matches)) {
            $partner = Partner::find((int) $matches[1]);
        }

        // C. Match by Phone Number
        if (!$partner) {
            $cleanPhone = preg_replace('/[^\d+]/', '', $loginInput);
            if (!empty($cleanPhone)) {
                $partner = Partner::where('phone', $loginInput)
                    ->orWhere('phone', $cleanPhone)
                    ->orWhere('phone', 'like', "%{$cleanPhone}%")
                    ->first();
            }
        }

        // D. Match via Hospital (by code, email, contact phone, or slug)
        if (!$partner) {
            $hospital = \App\Models\Hospital::where('code', strtoupper($loginInput))
                ->orWhere('email', $loginInput)
                ->orWhere('contact', $loginInput)
                ->orWhere('slug', $loginInput)
                ->first();

            if ($hospital) {
                $partner = Partner::where('hospital_id', $hospital->id)->first();
                if (!$partner && !empty($hospital->email)) {
                    $partner = Partner::where('email', $hospital->email)->first();
                }

                // If hospital exists but Partner row hasn't been provisioned yet, create it on-the-fly!
                if (!$partner) {
                    $hospital->load('country');
                    $cleanCode = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $hospital->code ?: 'hosp' . $hospital->id));
                    $email = !empty($hospital->email) 
                        ? $hospital->email 
                        : ($cleanCode . '@partner.healgofly.com');

                    $partner = Partner::create([
                        'hospital_id' => $hospital->id,
                        'name' => $hospital->name,
                        'company_name' => $hospital->name,
                        'email' => $email,
                        'phone' => $hospital->contact ?? '0000000000',
                        'country' => $hospital->country?->name ?? 'India',
                        'partner_type' => 'Hospital Partner',
                        'address' => $hospital->address,
                        'status' => $hospital->status ? 'active' : 'suspended',
                        'password' => $hospital->password,
                    ]);
                }
            }
        }

        // 2. If Partner still not found
        if (!$partner) {
            $failedMsg = 'These credentials do not match our records.';
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => ['email' => [$failedMsg], 'password' => [$failedMsg]],
                    'message' => $failedMsg,
                ], 422);
            }

            return back()->withErrors(['email' => $failedMsg])->withInput($request->only('email', 'login', 'remember'));
        }

        // 3. Check if partner is suspended
        if ($partner->status === 'suspended') {
            $msg = 'Your partner account has been suspended. Please contact info@healgofly.com.';
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => ['email' => [$msg]],
                    'message' => $msg,
                ], 422);
            }

            return back()->withErrors(['email' => $msg])->withInput($request->only('email', 'login'));
        }

        // 4. Attempt login with partner ID & password
        if (Auth::guard('partner')->attempt(['id' => $partner->id, 'password' => $password], $remember)) {
            if ($request->hasSession()) {
                $request->session()->regenerate();

                // Set active hospital in session
                $h = $partner->getHospital();
                if ($h) {
                    session(['active_hospital_id' => $h->id]);
                }
            }

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('partner.dashboard'),
                    'message' => 'Login successful! Redirecting to dashboard...',
                ]);
            }

            return redirect()->intended(route('partner.dashboard'))->with('success', 'Welcome back!');
        }

        // 5. Wrong password
        $failedMsg = 'The password you entered is incorrect.';
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => false,
                'errors' => ['password' => [$failedMsg]],
                'message' => $failedMsg,
            ], 422);
        }

        return back()->withErrors(['password' => $failedMsg])->withInput($request->only('email', 'login', 'remember'));
    }

    /**
     * Display the partner registration view.
     */
    public function showRegisterForm(): View|RedirectResponse
    {
        if (Auth::guard('partner')->check()) {
            return redirect()->route('partner.dashboard');
        }

        return view('frontend.pages.partner.register');
    }

    /**
     * Handle an incoming partner registration request.
     */
    public function register(Request $request): JsonResponse|RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:partners,email'],
            'phone' => ['required', 'string', 'min:7', 'max:20'],
            'country' => ['required', 'string', 'max:100'],
            'partner_type' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ], [
            'name.required' => 'Please enter your full name / primary contact.',
            'name.min' => 'Full name must be at least 3 characters.',
            'email.required' => 'Please enter your business email.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already registered as a partner. Please log in instead.',
            'phone.required' => 'Please enter your phone/WhatsApp contact number.',
            'phone.min' => 'Phone number must be at least 7 digits.',
            'country.required' => 'Please select or enter your country.',
            'partner_type.required' => 'Please select your organization/partner type.',
            'password.required' => 'Please create a secure password.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
            'terms.accepted' => 'You must agree to the Heal Go Fly Partner Terms & Conditions.',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                    'message' => 'Please correct the highlighted fields.',
                ], 422);
            }

            return back()->withErrors($validator)->withInput($request->except('password', 'password_confirmation'));
        }

        // Create the partner record
        $partner = Partner::create([
            'name' => trim($request->name),
            'company_name' => $request->filled('company_name') ? trim($request->company_name) : null,
            'email' => strtolower(trim($request->email)),
            'phone' => trim($request->phone),
            'country' => trim($request->country),
            'partner_type' => $request->partner_type,
            'address' => $request->address ? trim($request->address) : null,
            'website' => $request->website ? trim($request->website) : null,
            'status' => 'active',
            'password' => Hash::make($request->password),
        ]);

        // Auto login newly registered partner
        Auth::guard('partner')->login($partner);
        $request->session()->regenerate();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect_url' => route('partner.dashboard'),
                'message' => 'Registration successful! Welcome to the Heal Go Fly Partner Network.',
            ]);
        }

        return redirect()->route('partner.dashboard')->with('success', 'Registration successful! Welcome to the Heal Go Fly Partner Network.');
    }

    /**
     * Log the partner out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('partner')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('partner.login')->with('success', 'You have been successfully logged out.');
    }
}
