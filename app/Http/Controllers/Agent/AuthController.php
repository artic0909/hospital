<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Country;
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
     * Display the agent login view.
     */
    public function showLoginForm(): View|RedirectResponse
    {
        if (Auth::guard('agent')->check()) {
            return redirect()->route('agent.dashboard');
        }

        return view('agent.auth.login');
    }

    /**
     * Handle an incoming agent authentication request.
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
            'login.required' => 'Please enter your registered email address, phone number, or agent code.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 6 characters long.',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => [
                        'email' => $validator->errors()->get('login') ?: $validator->errors()->get('email'),
                        'login' => $validator->errors()->get('login') ?: $validator->errors()->get('email'),
                        'password' => $validator->errors()->get('password'),
                    ],
                    'message' => 'Please fix the errors below.',
                ], 422);
            }

            return back()->withErrors($validator)->withInput($request->only('email', 'login', 'remember'));
        }

        // 1. Resolve Agent
        $agent = null;

        // A. Match by email
        if (filter_var($loginInput, FILTER_VALIDATE_EMAIL)) {
            $agent = Agent::where('email', $loginInput)->first();
        }

        // B. Match by Agent Code (e.g. AGT-00001 or AGT-1)
        if (!$agent && preg_match('/^AGT-?0*(\d+)$/i', $loginInput, $matches)) {
            $agent = Agent::find((int) $matches[1]);
        }

        // C. Match by Phone Number
        if (!$agent) {
            $cleanPhone = preg_replace('/[^\d+]/', '', $loginInput);
            if (!empty($cleanPhone)) {
                $agent = Agent::where('phone', $loginInput)
                    ->orWhere('phone', $cleanPhone)
                    ->orWhere('phone', 'like', "%{$cleanPhone}%")
                    ->first();
            }
        }

        // 2. If Agent not found
        if (!$agent) {
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

        // 3. Check status
        if ($agent->status === 'suspended') {
            $msg = 'Your agent account has been suspended. Please contact info@healgofly.com.';
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => ['email' => [$msg]],
                    'message' => $msg,
                ], 422);
            }

            return back()->withErrors(['email' => $msg])->withInput($request->only('email', 'login'));
        }

        // 4. Attempt login
        if (Auth::guard('agent')->attempt(['id' => $agent->id, 'password' => $password], $remember)) {
            if ($request->hasSession()) {
                $request->session()->regenerate();
            }

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('agent.dashboard'),
                    'message' => 'Login successful! Redirecting...',
                ]);
            }

            return redirect()->intended(route('agent.dashboard'))->with('success', 'Welcome back, ' . $agent->name . '!');
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
     * Display the agent registration view.
     */
    public function showRegisterForm(): View|RedirectResponse
    {
        if (Auth::guard('agent')->check()) {
            return redirect()->route('agent.dashboard');
        }

        $countries = Country::orderBy('name')->get();

        return view('agent.auth.register', compact('countries'));
    }

    /**
     * Handle an incoming agent registration request.
     */
    public function register(Request $request): JsonResponse|RedirectResponse
    {
        // Normalize agent_type / partner_type from form
        $agentType = $request->input('agent_type', $request->input('partner_type', 'Medical Tourism Agency'));
        $request->merge([
            'agent_type' => $agentType,
            'partner_type' => $agentType,
        ]);

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:agents,email'],
            'phone' => ['required', 'string', 'min:5', 'max:30'],
            'country' => ['required', 'string', 'max:100'],
            'agent_type' => ['required', 'string', 'max:100'],
            'partner_type' => ['nullable', 'string', 'max:100'],
            'website' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:1000'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ], [
            'name.required' => 'Please enter your full name / primary contact.',
            'name.min' => 'Full name must be at least 3 characters.',
            'email.required' => 'Please enter your business email.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already registered. Please log in instead.',
            'phone.required' => 'Please enter your phone/WhatsApp contact number.',
            'phone.min' => 'Phone number must be at least 5 digits.',
            'country.required' => 'Please select or enter your country.',
            'agent_type.required' => 'Please select your organization/partner type.',
            'partner_type.required' => 'Please select your organization/partner type.',
            'password.required' => 'Please create a secure password.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
            'terms.accepted' => 'You must agree to the Terms & Conditions.',
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

        // Combine country code with phone if separate
        $cleanPhone = trim((string) $request->phone);
        if ($request->filled('country_code')) {
            $cleanCode = trim((string) $request->country_code);
            if (!str_starts_with($cleanPhone, '+') && !str_starts_with($cleanPhone, $cleanCode)) {
                $cleanPhone = $cleanCode . ' ' . $cleanPhone;
            }
        }

        // Create the agent record
        $agent = Agent::create([
            'name' => trim($request->name),
            'company_name' => $request->filled('company_name') ? trim($request->company_name) : null,
            'email' => strtolower(trim($request->email)),
            'phone' => $cleanPhone,
            'country' => trim($request->country),
            'agent_type' => $agentType,
            'website' => $request->filled('website') ? trim($request->website) : null,
            'address' => $request->filled('address') ? trim($request->address) : null,
            'status' => 'active',
            'password' => Hash::make($request->password),
        ]);

        // Auto login newly registered agent
        Auth::guard('agent')->login($agent);
        $request->session()->regenerate();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect_url' => route('agent.dashboard'),
                'message' => 'Registration successful! Welcome to the Heal Go Fly Agent Network.',
            ]);
        }

        return redirect()->route('agent.dashboard')->with('success', 'Registration successful! Welcome to the Heal Go Fly Agent Network.');
    }

    /**
     * Log the agent out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('agent')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('agent.login')->with('success', 'You have been successfully logged out.');
    }
}

