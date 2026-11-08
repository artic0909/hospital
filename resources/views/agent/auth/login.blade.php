@extends('frontend.layouts.app')

@section('title', 'Agent Login - Heal Go Fly | Medical Value Travel Network')

@section('content')
<!-- ==================== MAIN AGENT AUTH HERO ==================== -->
<section class="relative bg-gradient-to-b from-[#1D4B6C]/5 via-[#27797D]/5 to-white py-8 sm:py-12 lg:py-16 overflow-hidden">
    
    <!-- Background Soft Ambient Glow -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#27797D]/10 rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="absolute bottom-0 left-10 w-80 h-80 bg-[#EF7415]/10 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- LEFT COLUMN: Trust, Agent Perks & Info -->
            <div class="lg:col-span-7 space-y-6 sm:space-y-8 order-2 lg:order-1">
                
                <!-- Badge & Tagline -->
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1D4B6C]/10 text-[#1D4B6C] border border-[#1D4B6C]/15 text-xs font-bold">
                    <span class="w-2 h-2 rounded-full bg-[#EF7415] animate-pulse"></span>
                    <span>Dedicated Agent Desk</span>
                    <span class="text-gray-300">|</span>
                    <span class="italic text-[#27797D]">HealGoFly</span>
                </div>

                <!-- Main Headline -->
                <div class="space-y-3">
                    <h1 class="text-3xl sm:text-4xl lg:text-[42px] font-black text-[#112347] tracking-tight leading-[1.18]">
                        Manage Your Patients & Real-Time Treatment Journey
                    </h1>
                    <p class="text-base sm:text-lg text-[#5a6a85] font-normal leading-relaxed max-w-2xl">
                        Log in to register your patients, upload diagnostic medical records, and monitor every stage of hospital appointments, received status, surgery, and discharge.
                    </p>
                </div>

                <!-- 3 Feature Highlight Pills -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                    <div class="flex items-center gap-2.5 p-3.5 rounded-xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-9 h-9 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-gray-900 block">Direct Patient CRUD</span>
                            <span class="text-[10px] text-gray-400 block mt-0.5">Isolated to your account</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2.5 p-3.5 rounded-xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-9 h-9 rounded-xl bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-gray-900 block">Status Tracking</span>
                            <span class="text-[10px] text-gray-400 block mt-0.5">Live admin care updates</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2.5 p-3.5 rounded-xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-9 h-9 rounded-xl bg-blue-50 text-[#1D4B6C] flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-gray-900 block">Diagnostic Dossier</span>
                            <span class="text-[10px] text-gray-400 block mt-0.5">Upload medical scans</span>
                        </div>
                    </div>
                </div>

                <!-- Dedicated Helpline Footer Pill -->
                <div class="pt-2 flex flex-wrap items-center gap-4 text-xs text-gray-600">
                    <span class="font-bold text-[#1D4B6C]">Agent Support:</span>
                    <a href="mailto:info@healgofly.com?subject=Agent%20Support" class="font-medium text-[#27797D] hover:underline">
                        info@healgofly.com
                    </a>
                </div>

            </div>

            <!-- RIGHT COLUMN: Agent Login Card -->
            <div class="lg:col-span-5 order-1 lg:order-2 flex justify-center">
                
                <div class="w-full max-w-md bg-white rounded-3xl shadow-xl shadow-[#1D4B6C]/10 border border-gray-100 overflow-hidden">
                    
                    <!-- Themed Card Header -->
                    <div class="bg-gradient-to-r from-[#112347] via-[#1D4B6C] to-[#27797D] px-6 py-6 text-center text-white relative">
                        <a href="{{ url('/') }}" class="inline-flex items-center justify-center bg-white px-3 py-1.5 rounded-xl shadow-xs mb-2.5">
                            <img src="{{ asset('logo.png') }}" alt="Heal Go Fly" class="h-8 w-auto object-contain">
                        </a>
                        <h2 class="text-2xl font-black tracking-tight text-white">Agent Portal Login</h2>
                        <p class="text-xs text-teal-100/90 mt-0.5">Enter your credentials to access your agent dashboard</p>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 sm:p-7">
                        
                        @if(session('success'))
                            <div class="mb-4 p-3 rounded-xl text-xs font-semibold bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="mb-4 p-3 rounded-xl text-xs font-semibold bg-rose-50 border border-rose-200 text-rose-800 flex items-center gap-2">
                                <svg class="w-4 h-4 text-rose-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                <span>{{ session('error') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('agent.login.submit') }}" method="POST" novalidate class="space-y-4">
                            @csrf

                            <!-- Email / Phone / Agent Code Field -->
                            <div>
                                <label for="login-input" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                    Email / Phone / Agent Code <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"/></svg>
                                    </span>
                                    <input 
                                        type="text" 
                                        id="login-input" 
                                        name="login" 
                                        value="{{ old('login', old('email')) }}"
                                        required
                                        placeholder="agent@company.com, phone, or AGT-00001" 
                                        class="w-full pl-10 pr-4 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('login') border-rose-400 bg-rose-50/30 @enderror @error('email') border-rose-400 bg-rose-50/30 @enderror"
                                        autocomplete="username"
                                    >
                                </div>
                                @if($errors->has('login') || $errors->has('email'))
                                    <p class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                        <span>{{ $errors->first('login') ?: $errors->first('email') }}</span>
                                    </p>
                                @endif
                            </div>

                            <!-- Password Field -->
                            <div>
                                <div class="flex items-center justify-between mb-1.5">
                                    <label for="login-password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                                        Password <span class="text-rose-500">*</span>
                                    </label>
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
                                </div>
                                @error('password')
                                    <p class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="flex items-center justify-between pt-1">
                                <label class="inline-flex items-center cursor-pointer select-none">
                                    <input 
                                        type="checkbox" 
                                        name="remember" 
                                        value="1"
                                        {{ old('remember') ? 'checked' : '' }}
                                        class="w-4 h-4 rounded text-[#27797D] border-gray-300 focus:ring-[#27797D]/30"
                                    >
                                    <span class="ml-2 text-xs font-medium text-gray-600">Remember me</span>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button 
                                type="submit" 
                                class="w-full mt-2 py-3 px-4 rounded-xl bg-gradient-to-r from-[#112347] to-[#27797D] hover:from-[#0e1d3a] hover:to-[#1e5f62] text-white text-sm font-bold shadow-lg shadow-[#1D4B6C]/25 transition-all transform hover:-translate-y-0.5 cursor-pointer flex items-center justify-center gap-2"
                            >
                                <span>Sign In to Agent Portal</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>

                        </form>

                        <!-- Switch to Agent Register -->
                        <div class="mt-6 pt-5 border-t border-gray-100 text-center">
                            <p class="text-xs text-gray-500">
                                Want to become an authorized Agent? 
                                <a href="{{ route('agent.register') }}" class="font-bold text-[#EF7415] hover:text-[#d9640d] transition-colors ml-1">
                                    Register as Agent &rarr;
                                </a>
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
@endsection

