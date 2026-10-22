@extends('frontend.layouts.app')

@section('title', 'Partner Login - Heal Go Fly | Medical Value Travel Network')

@section('content')
<div class="min-h-[75vh] bg-gradient-to-br from-slate-50 via-teal-50/20 to-slate-100 py-10 sm:py-16 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <div class="max-w-md w-full">
        
        <!-- Breadcrumb & Top Indicator -->
        <div class="mb-6 flex items-center justify-center gap-2 text-xs font-semibold text-gray-500">
            <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors">Home</a>
            <span>/</span>
            <span class="text-[#27797D]">Partner Portal</span>
            <span>/</span>
            <span class="text-gray-800">Login</span>
        </div>

        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            
            <!-- Header Banner -->
            <div class="bg-gradient-to-r from-[#1D4B6C] via-[#1D4B6C] to-[#27797D] p-6 text-white text-center relative">
                <div class="inline-flex items-center justify-center bg-white px-3 py-1.5 rounded-xl shadow-md mb-3">
                    <img src="{{ asset('logo.png') }}" alt="Heal Go Fly" class="h-8 w-auto object-contain">
                </div>
                <h1 class="text-xl sm:text-2xl font-black tracking-tight text-white">Partner Portal Login</h1>
                <p class="text-xs text-teal-100/90 mt-1">Medical Travel Facilitators & Healthcare Affiliates</p>
                <div class="inline-block mt-2 px-2.5 py-0.5 rounded-full bg-[#EF7415] text-[10px] font-bold uppercase tracking-wider text-white shadow-xs">
                    Healgofly hi rahega
                </div>
            </div>

            <!-- Form Body -->
            <div class="p-6 sm:p-8">
                
                <!-- General Feedback Alert Box (Populated by JS or Server) -->
                <div id="general-alert" class="hidden mb-5 p-3.5 rounded-xl text-xs font-medium flex items-start gap-2.5 transition-all">
                    <span id="alert-icon" class="flex-shrink-0 mt-0.5"></span>
                    <span id="alert-message" class="flex-1 leading-snug"></span>
                </div>

                @if(session('success'))
                    <div class="mb-5 p-3.5 rounded-xl text-xs font-semibold bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-start gap-2">
                        <svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any() && !$errors->has('email') && !$errors->has('password'))
                    <div class="mb-5 p-3.5 rounded-xl text-xs font-semibold bg-rose-50 border border-rose-200 text-rose-800 flex items-start gap-2">
                        <svg class="w-4 h-4 text-rose-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form id="partner-login-form" action="{{ route('partner.login.submit') }}" method="POST" novalidate class="space-y-4">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="login-email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Business Email <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"/></svg>
                            </span>
                            <input 
                                type="email" 
                                id="login-email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required
                                placeholder="partner@company.com" 
                                class="w-full pl-10 pr-4 py-2.5 text-xs sm:text-sm text-gray-900 bg-gray-50/70 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-teal-100 transition-all @error('email') border-rose-400 bg-rose-50/30 @enderror"
                                autocomplete="email"
                            >
                        </div>
                        <!-- Inline Error Message Display -->
                        <p id="error-email" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('email') ? '' : 'hidden' }}">
                            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span class="error-text">{{ $errors->first('email') }}</span>
                        </p>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="login-password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                                Password <span class="text-rose-500">*</span>
                            </label>
                            <a href="mailto:info@healgofly.com?subject=Partner%20Password%20Reset%20Request" class="text-[11px] font-semibold text-[#27797D] hover:underline">
                                Forgot password?
                            </a>
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </span>
                            <input 
                                type="password" 
                                id="login-password" 
                                name="password" 
                                required
                                placeholder="••••••••" 
                                class="w-full pl-10 pr-10 py-2.5 text-xs sm:text-sm text-gray-900 bg-gray-50/70 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-teal-100 transition-all @error('password') border-rose-400 bg-rose-50/30 @enderror"
                                autocomplete="current-password"
                            >
                            <button 
                                type="button" 
                                id="toggle-password" 
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none"
                                title="Toggle password visibility"
                            >
                                <svg id="eye-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg id="eye-off-icon" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                            </button>
                        </div>
                        <!-- Inline Error Message Display -->
                        <p id="error-password" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('password') ? '' : 'hidden' }}">
                            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span class="error-text">{{ $errors->first('password') }}</span>
                        </p>
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center gap-2 cursor-pointer select-none">
                            <input 
                                type="checkbox" 
                                name="remember" 
                                id="remember-me"
                                class="w-4 h-4 rounded border-gray-300 text-[#27797D] focus:ring-[#27797D]"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            <span class="text-xs text-gray-600">Keep me logged in</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button 
                            type="submit" 
                            id="login-submit-btn" 
                            class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white font-bold py-3 px-5 rounded-xl shadow-md hover:shadow-lg transition-all duration-150 transform hover:-translate-y-0.5 active:translate-y-0 text-xs sm:text-sm flex items-center justify-center gap-2"
                        >
                            <span id="btn-text">Sign In to Partner Portal</span>
                            <svg id="btn-spinner" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white hidden" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <svg id="btn-arrow" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="my-6 flex items-center">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="flex-shrink mx-3 text-[11px] font-semibold text-gray-400 uppercase tracking-wider">New to Heal Go Fly?</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>

                <!-- Registration Link -->
                <div class="text-center">
                    <a 
                        href="{{ route('partner.register') }}" 
                        class="inline-flex items-center justify-center gap-2 w-full py-2.5 px-4 rounded-xl border-2 border-[#27797D] text-[#27797D] hover:bg-[#27797D] hover:text-white font-bold text-xs sm:text-sm transition-all duration-150"
                    >
                        <span>Join Partner Network (Register)</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    </a>
                </div>

                <!-- Security Assurance -->
                <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-center gap-2 text-[11px] text-gray-500">
                    <svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span>256-Bit SSL Encrypted Partner Authentication</span>
                </div>

            </div>

        </div>

        <!-- Help & Contact -->
        <div class="mt-6 text-center text-xs text-gray-500 space-y-1">
            <p>Need assistance or have partner inquiries?</p>
            <p>Email: <a href="mailto:info@healgofly.com" class="font-bold text-[#27797D] hover:underline">info@healgofly.com</a> &bull; WhatsApp: <a href="https://wa.me/919129846542" target="_blank" class="font-bold text-[#27797D] hover:underline">+91 9129846542</a></p>
        </div>

    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('partner-login-form');
    const emailInput = document.getElementById('login-email');
    const passwordInput = document.getElementById('login-password');
    const submitBtn = document.getElementById('login-submit-btn');
    const btnText = document.getElementById('btn-text');
    const btnSpinner = document.getElementById('btn-spinner');
    const btnArrow = document.getElementById('btn-arrow');
    const generalAlert = document.getElementById('general-alert');
    const alertMessage = document.getElementById('alert-message');
    const alertIcon = document.getElementById('alert-icon');
    
    // Toggle Password Visibility
    const togglePasswordBtn = document.getElementById('toggle-password');
    const eyeIcon = document.getElementById('eye-icon');
    const eyeOffIcon = document.getElementById('eye-off-icon');

    if (togglePasswordBtn) {
        togglePasswordBtn.addEventListener('click', function () {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            eyeIcon.classList.toggle('hidden', isPassword);
            eyeOffIcon.classList.toggle('hidden', !isPassword);
        });
    }

    // Helper: Show Error Under Field
    function showFieldError(fieldId, message) {
        const input = document.getElementById(fieldId);
        const errorEl = document.getElementById('error-' + (fieldId.replace('login-', '')));
        
        if (input) {
            input.classList.add('border-rose-400', 'bg-rose-50/30');
            input.classList.remove('border-gray-300');
        }
        if (errorEl) {
            const textSpan = errorEl.querySelector('.error-text');
            if (textSpan) textSpan.textContent = message;
            errorEl.classList.remove('hidden');
        }
    }

    // Helper: Clear Error for Field
    function clearFieldError(fieldId) {
        const input = document.getElementById(fieldId);
        const errorEl = document.getElementById('error-' + (fieldId.replace('login-', '')));
        
        if (input) {
            input.classList.remove('border-rose-400', 'bg-rose-50/30');
            input.classList.add('border-gray-300');
        }
        if (errorEl) {
            errorEl.classList.add('hidden');
        }
    }

    // Clear field error on live input typing
    [emailInput, passwordInput].forEach(inp => {
        if (inp) {
            inp.addEventListener('input', function () {
                clearFieldError(inp.id);
                if (generalAlert) generalAlert.classList.add('hidden');
            });
        }
    });

    // Helper: Show General Alert Banner
    function showAlert(type, message) {
        if (!generalAlert) return;
        generalAlert.className = 'mb-5 p-3.5 rounded-xl text-xs font-semibold flex items-start gap-2.5 transition-all';
        if (type === 'error') {
            generalAlert.classList.add('bg-rose-50', 'border', 'border-rose-200', 'text-rose-800');
            alertIcon.innerHTML = '<svg class=\"w-4 h-4 text-rose-600 flex-shrink-0\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z\"/></svg>';
        } else {
            generalAlert.classList.add('bg-emerald-50', 'border', 'border-emerald-200', 'text-emerald-800');
            alertIcon.innerHTML = '<svg class=\"w-4 h-4 text-emerald-600 flex-shrink-0\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\"/></svg>';
        }
        alertMessage.textContent = message;
        generalAlert.classList.remove('hidden');
    }

    // Handle Form Submit with JS Validation & AJAX
    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        // Reset errors
        clearFieldError('login-email');
        clearFieldError('login-password');
        if (generalAlert) generalAlert.classList.add('hidden');

        // Client-side validation
        let hasClientError = false;
        const emailVal = emailInput.value.trim();
        const passwordVal = passwordInput.value;

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailVal) {
            showFieldError('login-email', 'Please enter your registered email address.');
            hasClientError = true;
        } else if (!emailRegex.test(emailVal)) {
            showFieldError('login-email', 'Please provide a valid email format.');
            hasClientError = true;
        }

        // Password validation
        if (!passwordVal) {
            showFieldError('login-password', 'Please enter your password.');
            hasClientError = true;
        } else if (passwordVal.length < 6) {
            showFieldError('login-password', 'Password must be at least 6 characters.');
            hasClientError = true;
        }

        if (hasClientError) {
            showAlert('error', 'Please correct the highlighted fields below.');
            return;
        }

        // Set Loading State
        submitBtn.disabled = true;
        btnText.textContent = 'Authenticating...';
        btnSpinner.classList.remove('hidden');
        btnArrow.classList.add('hidden');

        try {
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok && data.success) {
                showAlert('success', data.message || 'Login successful! Redirecting to portal...');
                btnText.textContent = 'Redirecting...';
                
                // Frontend level redirect
                setTimeout(() => {
                    window.location.href = data.redirect_url;
                }, 500);
            } else {
                // Restore button state
                submitBtn.disabled = false;
                btnText.textContent = 'Sign In to Partner Portal';
                btnSpinner.classList.add('hidden');
                btnArrow.classList.remove('hidden');

                if (data.errors) {
                    // Show specific errors below fields
                    if (data.errors.email) {
                        showFieldError('login-email', data.errors.email[0]);
                    }
                    if (data.errors.password) {
                        showFieldError('login-password', data.errors.password[0]);
                    }
                    showAlert('error', data.message || 'The provided credentials do not match our records.');
                } else {
                    showAlert('error', data.message || 'Unable to sign in. Please check your credentials.');
                }
            }
        } catch (error) {
            // Restore button state
            submitBtn.disabled = false;
            btnText.textContent = 'Sign In to Partner Portal';
            btnSpinner.classList.add('hidden');
            btnArrow.classList.remove('hidden');

            console.error('Login error:', error);
            // Fallback: If network issue or non-JSON, submit standard form
            showAlert('error', 'Network error or session expired. Retrying submission...');
            setTimeout(() => {
                form.submit();
            }, 600);
        }
    });
});
</script>
@endpush
@endsection
