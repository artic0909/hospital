@extends('frontend.layouts.app')

@section('title', 'Partner Registration - Heal Go Fly | Join Medical Travel Network')

@section('content')
<div class="min-h-[85vh] bg-gradient-to-br from-slate-50 via-teal-50/20 to-slate-100 py-10 sm:py-16 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <div class="max-w-2xl w-full">
        
        <!-- Breadcrumb & Top Indicator -->
        <div class="mb-6 flex items-center justify-center gap-2 text-xs font-semibold text-gray-500">
            <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors">Home</a>
            <span>/</span>
            <span class="text-[#27797D]">Partner Portal</span>
            <span>/</span>
            <span class="text-gray-800">Registration</span>
        </div>

        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            
            <!-- Header Banner -->
            <div class="bg-gradient-to-r from-[#1D4B6C] via-[#1D4B6C] to-[#27797D] p-6 sm:p-8 text-white text-center relative">
                <div class="inline-flex items-center justify-center bg-white px-3 py-1.5 rounded-xl shadow-md mb-3">
                    <img src="{{ asset('logo.png') }}" alt="Heal Go Fly" class="h-8 w-auto object-contain">
                </div>
                <h1 class="text-xl sm:text-2xl font-black tracking-tight text-white">Join Heal Go Fly Partner Network</h1>
                <p class="text-xs sm:text-sm text-teal-100/90 mt-1.5 max-w-lg mx-auto">
                    Collaborate with world-class hospital networks, refer patients with full transparency, and earn competitive medical value travel incentives.
                </p>
                <div class="inline-block mt-3 px-3 py-0.5 rounded-full bg-[#EF7415] text-[10px] font-bold uppercase tracking-wider text-white shadow-xs">
                    Healgofly hi rahega &bull; Global Partner Program
                </div>
            </div>

            <!-- Form Body -->
            <div class="p-6 sm:p-10">
                
                <!-- General Feedback Alert Box (Populated by JS or Server) -->
                <div id="general-alert" class="hidden mb-6 p-4 rounded-xl text-xs font-medium flex items-start gap-2.5 transition-all">
                    <span id="alert-icon" class="flex-shrink-0 mt-0.5"></span>
                    <span id="alert-message" class="flex-1 leading-snug"></span>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-xl text-xs font-semibold bg-rose-50 border border-rose-200 text-rose-800 flex items-start gap-2">
                        <svg class="w-4 h-4 text-rose-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <div>
                            <span class="block font-bold">Please correct the highlighted errors below:</span>
                            <ul class="list-disc list-inside mt-1 space-y-0.5 text-[11px]">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form id="partner-register-form" action="{{ route('partner.register.submit') }}" method="POST" novalidate class="space-y-5">
                    @csrf

                    <!-- Section: Primary Contact & Organization -->
                    <div class="border-b border-gray-100 pb-4">
                        <h2 class="text-xs font-black uppercase tracking-wider text-[#1D4B6C] flex items-center gap-1.5 mb-3">
                            <span class="w-5 h-5 rounded-full bg-teal-100 text-[#27797D] inline-flex items-center justify-center text-[10px] font-black">1</span>
                            <span>Contact & Business Details</span>
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Contact Full Name -->
                            <div>
                                <label for="reg-name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                                    Full Name / Lead <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    </span>
                                    <input 
                                        type="text" 
                                        id="reg-name" 
                                        name="name" 
                                        value="{{ old('name') }}"
                                        required
                                        placeholder="e.g. Rahul Sharma" 
                                        class="w-full pl-10 pr-3.5 py-2.5 text-xs sm:text-sm text-gray-900 bg-gray-50/70 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-teal-100 transition-all @error('name') border-rose-400 bg-rose-50/30 @enderror"
                                        autocomplete="name"
                                    >
                                </div>
                                <p id="error-name" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('name') ? '' : 'hidden' }}">
                                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    <span class="error-text">{{ $errors->first('name') }}</span>
                                </p>
                            </div>

                            <!-- Company / Organization Name -->
                            <div>
                                <label for="reg-company_name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                                    Company / Agency <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    </span>
                                    <input 
                                        type="text" 
                                        id="reg-company_name" 
                                        name="company_name" 
                                        value="{{ old('company_name') }}"
                                        required
                                        placeholder="e.g. CareTravel Global LLP" 
                                        class="w-full pl-10 pr-3.5 py-2.5 text-xs sm:text-sm text-gray-900 bg-gray-50/70 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-teal-100 transition-all @error('company_name') border-rose-400 bg-rose-50/30 @enderror"
                                    >
                                </div>
                                <p id="error-company_name" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('company_name') ? '' : 'hidden' }}">
                                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    <span class="error-text">{{ $errors->first('company_name') }}</span>
                                </p>
                            </div>

                            <!-- Business Email -->
                            <div>
                                <label for="reg-email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                                    Business Email <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"/></svg>
                                    </span>
                                    <input 
                                        type="email" 
                                        id="reg-email" 
                                        name="email" 
                                        value="{{ old('email') }}"
                                        required
                                        placeholder="partner@agency.com" 
                                        class="w-full pl-10 pr-3.5 py-2.5 text-xs sm:text-sm text-gray-900 bg-gray-50/70 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-teal-100 transition-all @error('email') border-rose-400 bg-rose-50/30 @enderror"
                                        autocomplete="email"
                                    >
                                </div>
                                <p id="error-email" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('email') ? '' : 'hidden' }}">
                                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    <span class="error-text">{{ $errors->first('email') }}</span>
                                </p>
                            </div>

                            <!-- Phone / WhatsApp Number -->
                            <div>
                                <label for="reg-phone" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                                    Phone / WhatsApp <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    </span>
                                    <input 
                                        type="tel" 
                                        id="reg-phone" 
                                        name="phone" 
                                        value="{{ old('phone') }}"
                                        required
                                        placeholder="+91 9129846542" 
                                        class="w-full pl-10 pr-3.5 py-2.5 text-xs sm:text-sm text-gray-900 bg-gray-50/70 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-teal-100 transition-all @error('phone') border-rose-400 bg-rose-50/30 @enderror"
                                        autocomplete="tel"
                                    >
                                </div>
                                <p id="error-phone" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('phone') ? '' : 'hidden' }}">
                                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    <span class="error-text">{{ $errors->first('phone') }}</span>
                                </p>
                            </div>

                            <!-- Country of Operation -->
                            <div>
                                <label for="reg-country" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                                    Country <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </span>
                                    <select 
                                        id="reg-country" 
                                        name="country" 
                                        required
                                        class="w-full pl-10 pr-8 py-2.5 text-xs sm:text-sm text-gray-900 bg-gray-50/70 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-teal-100 transition-all appearance-none cursor-pointer @error('country') border-rose-400 bg-rose-50/30 @enderror"
                                    >
                                        <option value="">Select Primary Country</option>
                                        <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                        <option value="Bangladesh" {{ old('country') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="UAE" {{ old('country') == 'UAE' ? 'selected' : '' }}>United Arab Emirates</option>
                                        <option value="Saudi Arabia" {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                        <option value="Oman" {{ old('country') == 'Oman' ? 'selected' : '' }}>Oman</option>
                                        <option value="Kuwait" {{ old('country') == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
                                        <option value="Kenya" {{ old('country') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                        <option value="Nigeria" {{ old('country') == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                                        <option value="Tanzania" {{ old('country') == 'Tanzania' ? 'selected' : '' }}>Tanzania</option>
                                        <option value="Ghana" {{ old('country') == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                                        <option value="Uzbekistan" {{ old('country') == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
                                        <option value="Russia" {{ old('country') == 'Russia' ? 'selected' : '' }}>Russia</option>
                                        <option value="Iraq" {{ old('country') == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                                        <option value="United States" {{ old('country') == 'United States' ? 'selected' : '' }}>United States</option>
                                        <option value="United Kingdom" {{ old('country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                        <option value="Other" {{ old('country') == 'Other' ? 'selected' : '' }}>Other International</option>
                                    </select>
                                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </span>
                                </div>
                                <p id="error-country" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('country') ? '' : 'hidden' }}">
                                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    <span class="error-text">{{ $errors->first('country') }}</span>
                                </p>
                            </div>

                            <!-- Partner Type -->
                            <div>
                                <label for="reg-partner_type" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                                    Partner Category <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </span>
                                    <select 
                                        id="reg-partner_type" 
                                        name="partner_type" 
                                        required
                                        class="w-full pl-10 pr-8 py-2.5 text-xs sm:text-sm text-gray-900 bg-gray-50/70 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-teal-100 transition-all appearance-none cursor-pointer @error('partner_type') border-rose-400 bg-rose-50/30 @enderror"
                                    >
                                        <option value="">Select Partnership Type</option>
                                        <option value="medical_facilitator" {{ old('partner_type') == 'medical_facilitator' ? 'selected' : '' }}>Medical Travel Facilitator</option>
                                        <option value="travel_agent" {{ old('partner_type') == 'travel_agent' ? 'selected' : '' }}>Travel Agency / Tour Operator</option>
                                        <option value="hospital_rep" {{ old('partner_type') == 'hospital_rep' ? 'selected' : '' }}>Hospital Liaison / Representative</option>
                                        <option value="doctor_clinic" {{ old('partner_type') == 'doctor_clinic' ? 'selected' : '' }}>Doctor / Polyclinic / Diagnostic Center</option>
                                        <option value="corporate_affiliate" {{ old('partner_type') == 'corporate_affiliate' ? 'selected' : '' }}>Corporate & Insurance Affiliate</option>
                                        <option value="other" {{ old('partner_type') == 'other' ? 'selected' : '' }}>Other Independent Consultant</option>
                                    </select>
                                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </span>
                                </div>
                                <p id="error-partner_type" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('partner_type') ? '' : 'hidden' }}">
                                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    <span class="error-text">{{ $errors->first('partner_type') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Security & Password -->
                    <div class="border-b border-gray-100 pb-4">
                        <h2 class="text-xs font-black uppercase tracking-wider text-[#1D4B6C] flex items-center gap-1.5 mb-3">
                            <span class="w-5 h-5 rounded-full bg-teal-100 text-[#27797D] inline-flex items-center justify-center text-[10px] font-black">2</span>
                            <span>Security & Account Credentials</span>
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Password -->
                            <div>
                                <label for="reg-password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                                    Create Password <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                    </span>
                                    <input 
                                        type="password" 
                                        id="reg-password" 
                                        name="password" 
                                        required
                                        placeholder="Min 8 characters" 
                                        class="w-full pl-10 pr-10 py-2.5 text-xs sm:text-sm text-gray-900 bg-gray-50/70 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-teal-100 transition-all @error('password') border-rose-400 bg-rose-50/30 @enderror"
                                        autocomplete="new-password"
                                    >
                                    <button 
                                        type="button" 
                                        class="toggle-pwd-btn absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none"
                                        data-target="reg-password"
                                    >
                                        <svg class="w-4 h-4 eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        <svg class="w-4 h-4 eye-off-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                    </button>
                                </div>
                                <p id="error-password" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('password') ? '' : 'hidden' }}">
                                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    <span class="error-text">{{ $errors->first('password') }}</span>
                                </p>
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="reg-password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                                    Confirm Password <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </span>
                                    <input 
                                        type="password" 
                                        id="reg-password_confirmation" 
                                        name="password_confirmation" 
                                        required
                                        placeholder="Repeat your password" 
                                        class="w-full pl-10 pr-10 py-2.5 text-xs sm:text-sm text-gray-900 bg-gray-50/70 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-teal-100 transition-all"
                                        autocomplete="new-password"
                                    >
                                    <button 
                                        type="button" 
                                        class="toggle-pwd-btn absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none"
                                        data-target="reg-password_confirmation"
                                    >
                                        <svg class="w-4 h-4 eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        <svg class="w-4 h-4 eye-off-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                    </button>
                                </div>
                                <p id="error-password_confirmation" class="text-xs text-rose-500 font-medium mt-1.5 hidden flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    <span class="error-text"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Terms & Conditions Checkbox -->
                    <div class="pt-1">
                        <label class="flex items-start gap-2.5 cursor-pointer select-none">
                            <input 
                                type="checkbox" 
                                name="terms" 
                                id="reg-terms" 
                                value="1"
                                required
                                class="w-4 h-4 mt-0.5 rounded border-gray-300 text-[#27797D] focus:ring-[#27797D]"
                                {{ old('terms') ? 'checked' : '' }}
                            >
                            <span class="text-xs text-gray-600 leading-normal">
                                I agree to the <a href="#terms" target="_blank" class="text-[#27797D] font-bold hover:underline">Heal Go Fly Partner Agreement</a>, Referral Terms, and <a href="#privacy" target="_blank" class="text-[#27797D] font-bold hover:underline">Privacy Policy</a>.
                            </span>
                        </label>
                        <p id="error-terms" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('terms') ? '' : 'hidden' }}">
                            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span class="error-text">{{ $errors->first('terms') }}</span>
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-3">
                        <button 
                            type="submit" 
                            id="register-submit-btn" 
                            class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-150 transform hover:-translate-y-0.5 active:translate-y-0 text-xs sm:text-sm flex items-center justify-center gap-2"
                        >
                            <span id="reg-btn-text">Register as Certified Partner</span>
                            <svg id="reg-btn-spinner" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white hidden" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <svg id="reg-btn-arrow" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </form>

                <!-- Divider & Login Link -->
                <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                    <p class="text-xs text-gray-600">
                        Already have a partner account? 
                        <a href="{{ route('partner.login') }}" class="font-bold text-[#27797D] hover:underline ml-1">
                            Sign in to Partner Portal &rarr;
                        </a>
                    </p>
                </div>

            </div>

        </div>

        <!-- Help Notice -->
        <div class="mt-6 text-center text-xs text-gray-500">
            <span>Heal Go Fly LLP &bull; Healthcare Travel Partner Assistance: </span>
            <a href="mailto:info@healgofly.com" class="font-bold text-[#27797D] hover:underline">info@healgofly.com</a>
        </div>

    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('partner-register-form');
    const submitBtn = document.getElementById('register-submit-btn');
    const btnText = document.getElementById('reg-btn-text');
    const btnSpinner = document.getElementById('reg-btn-spinner');
    const btnArrow = document.getElementById('reg-btn-arrow');
    const generalAlert = document.getElementById('general-alert');
    const alertMessage = document.getElementById('alert-message');
    const alertIcon = document.getElementById('alert-icon');

    // Toggle Password Visibility Handlers
    document.querySelectorAll('.toggle-pwd-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            if (!input) return;
            const isPassword = input.getAttribute('type') === 'password';
            input.setAttribute('type', isPassword ? 'text' : 'password');
            this.querySelector('.eye-icon').classList.toggle('hidden', isPassword);
            this.querySelector('.eye-off-icon').classList.toggle('hidden', !isPassword);
        });
    });

    // Helper: Show Error Under Field
    function showFieldError(field, message) {
        const input = document.getElementById('reg-' + field);
        const errorEl = document.getElementById('error-' + field);
        
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
    function clearFieldError(field) {
        const input = document.getElementById('reg-' + field);
        const errorEl = document.getElementById('error-' + field);
        
        if (input) {
            input.classList.remove('border-rose-400', 'bg-rose-50/30');
            input.classList.add('border-gray-300');
        }
        if (errorEl) {
            errorEl.classList.add('hidden');
        }
    }

    // Clear field error on live input typing
    ['name', 'company_name', 'email', 'phone', 'country', 'partner_type', 'password', 'password_confirmation', 'terms'].forEach(fieldName => {
        const input = document.getElementById('reg-' + fieldName);
        if (input) {
            input.addEventListener('input', function () {
                clearFieldError(fieldName);
                if (generalAlert) generalAlert.classList.add('hidden');
            });
            input.addEventListener('change', function () {
                clearFieldError(fieldName);
                if (generalAlert) generalAlert.classList.add('hidden');
            });
        }
    });

    // Helper: Show General Alert Banner
    function showAlert(type, message) {
        if (!generalAlert) return;
        generalAlert.className = 'mb-6 p-4 rounded-xl text-xs font-semibold flex items-start gap-2.5 transition-all';
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
        ['name', 'company_name', 'email', 'phone', 'country', 'partner_type', 'password', 'password_confirmation', 'terms'].forEach(f => clearFieldError(f));
        if (generalAlert) generalAlert.classList.add('hidden');

        // Client-side validations
        let hasClientError = false;
        let firstErrorInput = null;

        function markError(field, msg) {
            showFieldError(field, msg);
            hasClientError = true;
            if (!firstErrorInput) {
                firstErrorInput = document.getElementById('reg-' + field);
            }
        }

        const nameVal = document.getElementById('reg-name').value.trim();
        const companyVal = document.getElementById('reg-company_name').value.trim();
        const emailVal = document.getElementById('reg-email').value.trim();
        const phoneVal = document.getElementById('reg-phone').value.trim();
        const countryVal = document.getElementById('reg-country').value;
        const partnerTypeVal = document.getElementById('reg-partner_type').value;
        const passwordVal = document.getElementById('reg-password').value;
        const passwordConfirmVal = document.getElementById('reg-password_confirmation').value;
        const termsChecked = document.getElementById('reg-terms').checked;

        if (!nameVal || nameVal.length < 3) {
            markError('name', 'Please enter your full name (minimum 3 characters).');
        }

        if (!companyVal || companyVal.length < 2) {
            markError('company_name', 'Please enter your company or agency name.');
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailVal) {
            markError('email', 'Please enter your business email address.');
        } else if (!emailRegex.test(emailVal)) {
            markError('email', 'Please provide a valid email address.');
        }

        if (!phoneVal || phoneVal.length < 7) {
            markError('phone', 'Please enter a valid contact phone / WhatsApp number.');
        }

        if (!countryVal) {
            markError('country', 'Please select your primary country of operation.');
        }

        if (!partnerTypeVal) {
            markError('partner_type', 'Please select your partnership category.');
        }

        if (!passwordVal) {
            markError('password', 'Please create a password.');
        } else if (passwordVal.length < 8) {
            markError('password', 'Password must be at least 8 characters long.');
        }

        if (!passwordConfirmVal) {
            markError('password_confirmation', 'Please confirm your password.');
        } else if (passwordVal && passwordVal !== passwordConfirmVal) {
            markError('password_confirmation', 'Passwords do not match. Please re-enter.');
        }

        if (!termsChecked) {
            markError('terms', 'You must agree to the Heal Go Fly Partner Terms & Conditions.');
        }

        if (hasClientError) {
            showAlert('error', 'Please correct the highlighted fields before submitting.');
            if (firstErrorInput) {
                firstErrorInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstErrorInput.focus();
            }
            return;
        }

        // Set Loading State
        submitBtn.disabled = true;
        btnText.textContent = 'Creating Partner Account...';
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
                showAlert('success', data.message || 'Registration successful! Redirecting to your dashboard...');
                btnText.textContent = 'Redirecting...';
                
                // Frontend level redirect
                setTimeout(() => {
                    window.location.href = data.redirect_url;
                }, 600);
            } else {
                // Restore button state
                submitBtn.disabled = false;
                btnText.textContent = 'Register as Certified Partner';
                btnSpinner.classList.add('hidden');
                btnArrow.classList.remove('hidden');

                if (data.errors) {
                    let firstErrKey = null;
                    for (const [field, messages] of Object.entries(data.errors)) {
                        showFieldError(field, messages[0]);
                        if (!firstErrKey) firstErrKey = field;
                    }
                    showAlert('error', data.message || 'Please correct the highlighted errors below.');
                    if (firstErrKey) {
                        const errEl = document.getElementById('reg-' + firstErrKey);
                        if (errEl) errEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                } else {
                    showAlert('error', data.message || 'Registration failed. Please check your inputs and try again.');
                }
            }
        } catch (error) {
            // Restore button state
            submitBtn.disabled = false;
            btnText.textContent = 'Register as Certified Partner';
            btnSpinner.classList.add('hidden');
            btnArrow.classList.remove('hidden');

            console.error('Registration error:', error);
            showAlert('error', 'Network error or session expired. Submitting standard form...');
            setTimeout(() => {
                form.submit();
            }, 600);
        }
    });
});
</script>
@endpush
@endsection
