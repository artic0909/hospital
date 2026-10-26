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
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
            'remember' => ['nullable'],
        ], [
            'email.required' => 'Please enter your registered email address.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 6 characters long.',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                    'message' => 'Please fix the errors below.',
                ], 422);
            }

            return back()->withErrors($validator)->withInput($request->only('email', 'remember'));
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        // Check if partner exists and account status
        $partner = Partner::where('email', $request->email)->first();
        if ($partner && $partner->status === 'suspended') {
            $msg = 'Your partner account has been suspended. Please contact info@healgofly.com.';
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => ['email' => [$msg]],
                    'message' => $msg,
                ], 422);
            }

            return back()->withErrors(['email' => $msg])->withInput($request->only('email'));
        }

        if (Auth::guard('partner')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('partner.dashboard'),
                    'message' => 'Login successful! Redirecting to dashboard...',
                ]);
            }

            return redirect()->intended(route('partner.dashboard'))->with('success', 'Welcome back!');
        }

        $failedMsg = 'These credentials do not match our records.';
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => false,
                'errors' => ['password' => [$failedMsg]],
                'message' => $failedMsg,
            ], 422);
        }

        return back()->withErrors(['email' => $failedMsg])->withInput($request->only('email', 'remember'));
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
            'company_name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:partners,email'],
            'phone' => ['required', 'string', 'min:7', 'max:20'],
            'country' => ['required', 'string', 'max:100'],
            'partner_type' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ], [
            'name.required' => 'Please enter your full name / primary contact.',
            'name.min' => 'Full name must be at least 3 characters.',
            'company_name.required' => 'Please enter your company or agency name.',
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
            'company_name' => trim($request->company_name),
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
