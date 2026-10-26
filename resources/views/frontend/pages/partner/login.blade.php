@extends('frontend.layouts.app')

@section('title', 'Partner Login - Heal Go Fly | Medical Value Travel Network')

@section('content')
<!-- ==================== MAIN PARTNER AUTH HERO (SIDE-BY-SIDE ON DESKTOP) ==================== -->
<section class="relative bg-gradient-to-b from-[#1D4B6C]/5 via-[#27797D]/5 to-white py-8 sm:py-12 lg:py-16 overflow-hidden">
    
    <!-- Background Soft Ambient Glow -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#27797D]/10 rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="absolute bottom-0 left-10 w-80 h-80 bg-[#EF7415]/10 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- LEFT COLUMN: Trust, Partner Perks & Info (Adapted from index page hero) -->
            <div class="lg:col-span-7 space-y-6 sm:space-y-8 order-2 lg:order-1">
                
                <!-- Badge & Tagline -->
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1D4B6C]/10 text-[#1D4B6C] border border-[#1D4B6C]/15 text-xs font-bold">
                    <span class="w-2 h-2 rounded-full bg-[#EF7415] animate-pulse"></span>
                    <span>Global Healthcare Facilitator Network</span>
                    <span class="text-gray-300">|</span>
                    <span class="italic text-[#27797D]">Healgofly hi rahega</span>
                </div>

                <!-- Main Headline -->
                <div class="space-y-3">
                    <h1 class="text-3xl sm:text-4xl lg:text-[42px] font-black text-[#112347] tracking-tight leading-[1.18]">
                        Empowering Medical Travel Partners & Healthcare Facilitators
                    </h1>
                    <p class="text-base sm:text-lg text-[#5a6a85] font-normal leading-relaxed max-w-2xl">
                        Seamlessly submit patient inquiries, access multi-specialty hospital quotes, and track medical visa approvals through one dedicated portal.
                    </p>
                </div>

                <!-- Social Proof & Assisted Counter (Direct from Index Page) -->
                <div class="pt-1 flex flex-wrap items-center gap-6 sm:gap-8">
                    <!-- Avatars & Counter -->
                    <div>
                        <div class="flex items-center -space-x-2.5 overflow-hidden">
                            <img class="inline-block h-10 w-10 sm:h-11 sm:w-11 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80" alt="Patient">
                            <img class="inline-block h-10 w-10 sm:h-11 sm:w-11 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" alt="Doctor">
                            <img class="inline-block h-10 w-10 sm:h-11 sm:w-11 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=150&q=80" alt="Doctor">
                            <img class="inline-block h-10 w-10 sm:h-11 sm:w-11 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=150&q=80" alt="Patient">
                        </div>
                        <p class="text-xs text-gray-700 mt-2">
                            <span class="font-extrabold text-[#112347] text-sm">1,00,000+</span> 
                            <span class="text-[#5a6a85] font-medium">Patients Assisted</span>
                        </p>
                    </div>

                    <!-- Google Rating Card (Direct from Index Page) -->
                    <div class="flex items-center gap-3 bg-white px-3.5 py-2 rounded-xl border border-gray-200/80 shadow-xs">
                        <div class="w-8 h-8 flex-shrink-0">
                            <svg viewBox="0 0 24 24" class="w-full h-full drop-shadow-sm">
                                <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z"/>
                                <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.25v3.15C3.26 21.36 7.35 24 12 24z"/>
                                <path fill="#FBBC05" d="M5.28 14.27c-.25-.72-.38-1.49-.38-2.27s.13-1.55.38-2.27V6.58H1.25C.45 8.18 0 10.04 0 12s.45 3.82 1.25 5.42l4.03-3.15z"/>
                                <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.35 0 3.26 2.64 1.25 6.58l4.03 3.15c.95-2.83 3.6-4.98 6.72-4.98z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-1.5">
                                <span class="text-sm font-bold text-gray-900 leading-none">4.7</span>
                                <div class="flex text-amber-400">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </div>
                            </div>
                            <span class="text-[10px] text-gray-500 font-medium">Verified Partner Trust</span>
                        </div>
                    </div>
                </div>

                <!-- 3 Feature Highlight Pills -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                    <div class="flex items-center gap-2.5 p-3 rounded-xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-8 h-8 rounded-lg bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <span class="text-xs font-bold text-gray-800 leading-tight">24h Express Quotes</span>
                    </div>

                    <div class="flex items-center gap-2.5 p-3 rounded-xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-8 h-8 rounded-lg bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <span class="text-xs font-bold text-gray-800 leading-tight">Direct Hospital Panel</span>
                    </div>

                    <div class="flex items-center gap-2.5 p-3 rounded-xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-[#1D4B6C] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <span class="text-xs font-bold text-gray-800 leading-tight">Transparent Settlements</span>
                    </div>
                </div>

                <!-- Dedicated Helpline Footer Pill -->
                <div class="pt-2 flex flex-wrap items-center gap-4 text-xs text-gray-600">
                    <span class="font-bold text-[#1D4B6C]">Partner Helpline Desk:</span>
                    <a href="https://wa.me/919129846542" target="_blank" class="inline-flex items-center gap-1.5 font-bold text-emerald-600 hover:text-emerald-700">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.199.534 1.286.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.302c-.087.087-.179.182-.077.357.101.174.45 0.742.965 1.201.664.591 1.224.774 1.397.86.173.087.275.072.376-.043.101-.116.433-.506.549-.679.116-.173.231-.144.39-.087s1.011.477 1.184.564.289.13.332.202c.044.072.044.419-.1 0.824z"/></svg>
                        <span>+91 9129846542</span>
                    </a>
                    <span>&bull;</span>
                    <a href="mailto:info@healgofly.com" class="font-medium text-[#27797D] hover:underline">
                        info@healgofly.com
                    </a>
                </div>

            </div>

            <!-- RIGHT COLUMN: Clean Themed Partner Login Card (order-1 on mobile for fast access) -->
            <div class="lg:col-span-5 order-1 lg:order-2 flex justify-center">
                
                <div class="w-full max-w-md bg-white rounded-3xl shadow-xl shadow-[#1D4B6C]/10 border border-gray-100 overflow-hidden">
                    
                    <!-- Themed Card Header -->
                    <div class="bg-gradient-to-r from-[#1D4B6C] to-[#27797D] px-6 py-6 text-center text-white relative">
                        <a href="{{ url('/') }}" class="inline-flex items-center justify-center bg-white px-3 py-1.5 rounded-xl shadow-xs mb-2.5">
                            <img src="{{ asset('logo.png') }}" alt="Heal Go Fly" class="h-8 w-auto object-contain">
                        </a>
                        <h2 class="text-2xl font-black tracking-tight text-white">Partner Login</h2>
                        <p class="text-xs text-teal-100/90 mt-0.5">Access your facilitator portal</p>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 sm:p-7">
                        
                        <!-- General Alert Box -->
                        <div id="general-alert" class="hidden mb-4 p-3 rounded-xl text-xs font-semibold flex items-start gap-2 transition-all">
                            <span id="alert-icon" class="flex-shrink-0 mt-0.5"></span>
                            <span id="alert-message" class="flex-1 leading-snug"></span>
                        </div>

                        @if(session('success'))
                            <div class="mb-4 p-3 rounded-xl text-xs font-semibold bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <form id="partner-login-form" action="{{ route('partner.login.submit') }}" method="POST" novalidate class="space-y-4">
                            @csrf

                            <!-- Email Field -->
                            <div>
                                <label for="login-email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                    Email Address <span class="text-rose-500">*</span>
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
                                        placeholder="name@company.com" 
                                        class="w-full pl-10 pr-4 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('email') border-rose-400 bg-rose-50/30 @enderror"
                                        autocomplete="email"
                                    >
                                </div>
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
                                    <a href="mailto:info@healgofly.com?subject=Partner%20Password%20Reset%20Request" class="text-xs font-semibold text-[#27797D] hover:underline">
                                        Forgot?
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
                                        class="w-full pl-10 pr-10 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('password') border-rose-400 bg-rose-50/30 @enderror"
                                        autocomplete="current-password"
                                    >
                                    <button 
                                        type="button" 
                                        id="toggle-password" 
                                        class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none"
                                        title="Toggle visibility"
                                    >
                                        <svg id="eye-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        <svg id="eye-off-icon" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                    </button>
                                </div>
                                <p id="error-password" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('password') ? '' : 'hidden' }}">
                                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    <span class="error-text">{{ $errors->first('password') }}</span>
                                </p>
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="flex items-center">
                                <label class="flex items-center gap-2 cursor-pointer select-none">
                                    <input 
                                        type="checkbox" 
                                        name="remember" 
                                        id="remember-me"
                                        value="1"
                                        class="w-4 h-4 rounded border-gray-300 text-[#27797D] focus:ring-[#27797D]"
                                        {{ old('remember') ? 'checked' : '' }}
                                    >
                                    <span class="text-xs font-medium text-gray-600">Remember me</span>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-1">
                                <button 
                                    type="submit" 
                                    id="login-submit-btn" 
                                    class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white font-bold py-3 px-4 rounded-xl shadow-md shadow-[#EF7415]/20 hover:shadow-lg transition-all text-sm flex items-center justify-center gap-2"
                                >
                                    <span id="btn-text">Sign In</span>
                                    <svg id="btn-spinner" class="animate-spin h-4 w-4 text-white hidden" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <svg id="btn-arrow" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </button>
                            </div>
                        </form>

                        <!-- Switch to Register -->
                        <div class="mt-5 pt-4 border-t border-gray-100 text-center">
                            <p class="text-xs text-gray-500">
                                Don't have a partner account? 
                                <a href="{{ route('partner.register') }}" class="font-bold text-[#27797D] hover:text-[#1D4B6C] hover:underline">
                                    Register here
                                </a>
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<!-- ==================== SUITABLE SECTION BELOW: OUR SERVICES COVER EVERY NEED (Direct from Index) ==================== -->
<section class="py-12 sm:py-16 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-12">
            <span class="text-xs uppercase font-extrabold tracking-wider text-[#EF7415] bg-[#EF7415]/10 px-3 py-1 rounded-full">
                Partner Ecosystem
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#112347] tracking-tight mt-3">
                Our Services Cover Every Need
            </h2>
            <p class="text-xs sm:text-sm text-[#5a6a85] mt-2 max-w-2xl mx-auto leading-relaxed">
                As a Heal Go Fly partner, every patient you refer receives end-to-end medical concierge support at no extra cost.
            </p>
        </div>

        <!-- 6 Core Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            
            <!-- 1. Medical Opinion & Estimates -->
            <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-start gap-4 group">
                <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform mt-0.5">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <path d="M10 13l2 2 4-4" stroke="#EF7415" stroke-width="2"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                        Doctor Opinions & Quotes
                    </h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                        Receive treatment quotes and doctor credentials from top accredited hospitals within 24 hours.
                    </p>
                </div>
            </div>

            <!-- 2. Pre-Travel Tele-Consultation -->
            <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-start gap-4 group">
                <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform mt-0.5">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M22 6c0 1.66-1.34 3-3 3h-.5L17 11v-2c-1.66 0-3-1.34-3-3s1.34-3 3-3h2c1.66 0 3 1.34 3 3z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                        Pre-Travel Video Consult
                    </h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                        Facilitate live video calls between your patient and super-specialist surgeons before flying.
                    </p>
                </div>
            </div>

            <!-- 3. Visa Assistance & Invitation -->
            <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-start gap-4 group">
                <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform mt-0.5">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="5" y="3" width="14" height="18" rx="2"/>
                        <line x1="9" y1="7" x2="15" y2="7"/>
                        <circle cx="12" cy="13" r="3"/>
                        <path d="M12 11v4M10 13h4" stroke="#EF7415" stroke-width="1.5"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                        Medical Visa Letter
                    </h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                        Prompt issuance of official hospital visa invitation letters for patients and medical attendants.
                    </p>
                </div>
            </div>

            <!-- 4. Airport Transfer & Logistics -->
            <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-start gap-4 group">
                <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform mt-0.5">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
                        <circle cx="7" cy="17" r="2"/>
                        <circle cx="17" cy="17" r="2"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                        Airport Pickup & Transfers
                    </h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                        Free ambulance or chauffeur airport pickup, guest house accommodation, and local SIM cards.
                    </p>
                </div>
            </div>

            <!-- 5. Dedicated Case Manager & Translators -->
            <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-start gap-4 group">
                <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform mt-0.5">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                        Dedicated Case Manager
                    </h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                        Multilingual translators (Arabic, Russian, Bengali, French) and hospital bedside coordination.
                    </p>
                </div>
            </div>

            <!-- 6. Transparent Referral Settlements -->
            <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-start gap-4 group">
                <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform mt-0.5">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                        Transparent Settlements
                    </h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                        Clear case billing status, direct bank remittances, and live facilitator tracking.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

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

    // Helper: Show Error Directly Below Field
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

    // Clear field error on typing
    [emailInput, passwordInput].forEach(inp => {
        if (inp) {
            inp.addEventListener('input', function () {
                clearFieldError(inp.id);
                if (generalAlert) generalAlert.classList.add('hidden');
            });
        }
    });

    // Helper: Show Alert
    function showAlert(type, message) {
        if (!generalAlert) return;
        generalAlert.className = 'mb-4 p-3 rounded-xl text-xs font-semibold flex items-start gap-2 transition-all';
        if (type === 'error') {
            generalAlert.classList.add('bg-rose-50', 'border', 'border-rose-200', 'text-rose-800');
            alertIcon.innerHTML = '<svg class="w-4 h-4 text-rose-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
        } else {
            generalAlert.classList.add('bg-emerald-50', 'border', 'border-emerald-200', 'text-emerald-800');
            alertIcon.innerHTML = '<svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>';
        }
        alertMessage.textContent = message;
        generalAlert.classList.remove('hidden');
    }

    // Handle Form Submit with JS Validation & AJAX
    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        // Clear existing errors
        clearFieldError('login-email');
        clearFieldError('login-password');
        if (generalAlert) generalAlert.classList.add('hidden');

        // Client-side validation
        let hasClientError = false;
        const emailVal = emailInput.value.trim();
        const passwordVal = passwordInput.value;

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailVal) {
            showFieldError('login-email', 'Please enter your email address.');
            hasClientError = true;
        } else if (!emailRegex.test(emailVal)) {
            showFieldError('login-email', 'Please enter a valid email.');
            hasClientError = true;
        }

        if (!passwordVal) {
            showFieldError('login-password', 'Please enter your password.');
            hasClientError = true;
        } else if (passwordVal.length < 6) {
            showFieldError('login-password', 'Password must be at least 6 characters.');
            hasClientError = true;
        }

        if (hasClientError) {
            return;
        }

        // Loading state
        submitBtn.disabled = true;
        btnText.textContent = 'Signing In...';
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
                showAlert('success', data.message || 'Login successful!');
                btnText.textContent = 'Redirecting...';
                
                // Frontend-level redirect
                setTimeout(() => {
                    window.location.href = data.redirect_url;
                }, 400);
            } else {
                submitBtn.disabled = false;
                btnText.textContent = 'Sign In';
                btnSpinner.classList.add('hidden');
                btnArrow.classList.remove('hidden');

                if (data.errors) {
                    if (data.errors.email) showFieldError('login-email', data.errors.email[0]);
                    if (data.errors.password) showFieldError('login-password', data.errors.password[0]);
                    showAlert('error', data.message || 'Please check your inputs.');
                } else {
                    showAlert('error', data.message || 'Invalid email or password.');
                }
            }
        } catch (error) {
            submitBtn.disabled = false;
            btnText.textContent = 'Sign In';
            btnSpinner.classList.add('hidden');
            btnArrow.classList.remove('hidden');

            form.submit();
        }
    });
});
</script>
@endpush
@endsection
