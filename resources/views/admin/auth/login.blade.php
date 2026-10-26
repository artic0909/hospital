@extends('frontend.layouts.app')

@section('title', 'Admin Central Login - Heal Go Fly | Hospital Management')

@section('content')
<!-- ==================== MAIN ADMIN AUTH HERO ==================== -->
<section class="relative bg-gradient-to-b from-[#1D4B6C]/5 via-[#27797D]/5 to-white py-8 sm:py-12 lg:py-16 overflow-hidden">
    
    <!-- Background Soft Ambient Glow -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#27797D]/10 rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="absolute bottom-0 left-10 w-80 h-80 bg-[#EF7415]/10 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- LEFT COLUMN: Trust, Operations & Central Command Info -->
            <div class="lg:col-span-7 space-y-6 sm:space-y-8 order-2 lg:order-1">
                
                <!-- Badge & Tagline -->
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1D4B6C]/10 text-[#1D4B6C] border border-[#1D4B6C]/15 text-xs font-bold">
                    <span class="w-2 h-2 rounded-full bg-[#EF7415] animate-pulse"></span>
                    <span>Executive Operations & Hospital Liaison</span>
                    <span class="text-gray-300">|</span>
                    <span class="italic text-[#27797D]">Healgofly hi rahega</span>
                </div>

                <!-- Main Headline -->
                <div class="space-y-3">
                    <h1 class="text-3xl sm:text-4xl lg:text-[42px] font-black text-[#112347] tracking-tight leading-[1.18]">
                        Central Administration & Medical Travel Command
                    </h1>
                    <p class="text-base sm:text-lg text-[#5a6a85] font-normal leading-relaxed max-w-2xl">
                        Comprehensive management for hospital networks, doctor opinions, medical visa processing, facilitator settlements, and patient admissions.
                    </p>
                </div>

                <!-- Social Proof & Assisted Counter -->
                <div class="pt-1 flex flex-wrap items-center gap-6 sm:gap-8">
                    <div>
                        <div class="flex items-center -space-x-2.5 overflow-hidden">
                            <img class="inline-block h-10 w-10 sm:h-11 sm:w-11 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80" alt="Patient">
                            <img class="inline-block h-10 w-10 sm:h-11 sm:w-11 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" alt="Doctor">
                            <img class="inline-block h-10 w-10 sm:h-11 sm:w-11 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=150&q=80" alt="Doctor">
                            <img class="inline-block h-10 w-10 sm:h-11 sm:w-11 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=150&q=80" alt="Patient">
                        </div>
                        <p class="text-xs text-gray-700 mt-2">
                            <span class="font-extrabold text-[#112347] text-sm">1,00,000+</span> 
                            <span class="text-[#5a6a85] font-medium">Patients Coordinated</span>
                        </p>
                    </div>

                    <!-- Security & Encryption Badge -->
                    <div class="flex items-center gap-3 bg-white px-3.5 py-2.5 rounded-xl border border-gray-200/80 shadow-xs">
                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-gray-900 block leading-tight">256-Bit SSL Enforced</span>
                            <span class="text-[10px] text-gray-500 font-medium">Role-Based Access Control</span>
                        </div>
                    </div>
                </div>

                <!-- 3 Feature Highlight Pills -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                    <div class="flex items-center gap-2.5 p-3 rounded-xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-8 h-8 rounded-lg bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <span class="text-xs font-bold text-gray-800 leading-tight">Multi-Hospital Network</span>
                    </div>

                    <div class="flex items-center gap-2.5 p-3 rounded-xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-8 h-8 rounded-lg bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <span class="text-xs font-bold text-gray-800 leading-tight">Visa & Embassy Liaison</span>
                    </div>

                    <div class="flex items-center gap-2.5 p-3 rounded-xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-[#1D4B6C] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <span class="text-xs font-bold text-gray-800 leading-tight">Financial Clearing</span>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN: Secure Admin Login Form Card -->
            <div class="lg:col-span-5 order-1 lg:order-2">
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl shadow-slate-200/50 border border-slate-200/80 relative">
                    
                    <!-- Decorative Top Corner Accent -->
                    <div class="absolute -top-3 right-6 bg-gradient-to-r from-[#112347] to-[#27797D] text-white px-3.5 py-1 rounded-full text-[11px] font-black uppercase tracking-wider shadow-sm flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                        <span>Admin Central</span>
                    </div>

                    <!-- Header -->
                    <div class="mb-6">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-9 h-9 rounded-xl bg-[#112347] text-white flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 004 11m0 0a8 8 0 008 8c1.378 0 2.686-.347 3.839-.968"/></svg>
                            </div>
                            <h2 class="text-2xl font-black text-[#112347] tracking-tight">Admin Sign In</h2>
                        </div>
                        <p class="text-xs text-[#5a6a85]">
                            Enter your executive credentials to access the central management dashboard.
                        </p>
                    </div>
                   

                    <!-- Flash Success / Error Messages -->
                    @if (session('success'))
                        <div class="mb-4 p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4 p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1">
                            @foreach ($errors->all() as $error)
                                <div class="flex items-center gap-1.5 font-medium">
                                    <span class="text-rose-500 font-bold">&bull;</span>
                                    <span>{{ $error }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
                        @csrf

                        <!-- Email Input -->
                        <div>
                            <label for="admin-email" class="block text-xs font-bold text-slate-700 mb-1.5">
                                Administrator Email <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="admin-email"
                                    required 
                                    value="{{ old('email') }}"
                                    placeholder="Enter your email"
                                    class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm text-slate-900 px-3.5 py-2.5 pl-10 rounded-xl border border-slate-200 focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 focus:outline-none transition-all font-medium"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                                </div>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label for="admin-password" class="block text-xs font-bold text-slate-700">
                                    Password <span class="text-rose-500">*</span>
                                </label>
                            </div>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="admin-password"
                                    required
                                    placeholder="Enter your password"
                                    class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm text-slate-900 px-3.5 py-2.5 pl-10 pr-10 rounded-xl border border-slate-200 focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 focus:outline-none transition-all font-medium"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                </div>
                                <button 
                                    type="button" 
                                    id="toggle-password-btn" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none"
                                    aria-label="Toggle password visibility"
                                >
                                    <svg id="eye-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between text-xs pt-1">
                            <label class="flex items-center gap-2 cursor-pointer select-none">
                                <input 
                                    type="checkbox" 
                                    name="remember" 
                                    value="1"
                                    checked
                                    class="w-4 h-4 rounded border-slate-300 text-[#27797D] focus:ring-[#27797D]/20 accent-[#27797D]"
                                >
                                <span class="font-medium text-slate-600">Keep me logged in</span>
                            </label>
                            <span class="text-slate-400 text-[11px] font-semibold">Authorized Personnel Only</span>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button 
                                type="submit"
                                class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-[#112347] via-[#1D4B6C] to-[#27797D] hover:from-[#0d1b36] hover:to-[#1e5f62] text-white font-bold text-sm px-5 py-3 rounded-xl shadow-lg shadow-[#1D4B6C]/25 transition-all duration-200 transform hover:-translate-y-0.5 cursor-pointer"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                                <span>Sign In to Admin Portal</span>
                            </button>
                        </div>

                    </form>

                    <!-- Footer Help & Links -->
                    <div class="mt-6 pt-5 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <a href="{{ route('partner.login') }}" class="font-semibold text-[#27797D] hover:underline">
                            &larr; Partner Portal
                        </a>
                        <a href="{{ url('/') }}" class="hover:text-slate-700">
                            Public Website &rarr;
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('toggle-password-btn');
        const passInput = document.getElementById('admin-password');
        
        if (toggleBtn && passInput) {
            toggleBtn.addEventListener('click', () => {
                if (passInput.type === 'password') {
                    passInput.type = 'text';
                } else {
                    passInput.type = 'password';
                }
            });
        }
    });
</script>
@endpush
@endsection
