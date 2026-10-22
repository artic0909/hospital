@extends('frontend.layouts.app')

@section('title', 'Partner Registration - Heal Go Fly')

@section('content')
<div class="min-h-[85vh] bg-gradient-to-br from-[#1D4B6C]/5 via-[#27797D]/5 to-slate-100 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <div class="w-full max-w-2xl">
        
        <!-- Clean Themed Registration Card -->
        <div class="bg-white rounded-3xl shadow-xl shadow-[#1D4B6C]/10 border border-gray-100 overflow-hidden">
            
            <!-- Themed Header -->
            <div class="bg-gradient-to-r from-[#1D4B6C] to-[#27797D] px-6 py-7 text-center text-white relative">
                <a href="{{ url('/') }}" class="inline-flex items-center justify-center bg-white px-3.5 py-1.5 rounded-xl shadow-sm mb-3">
                    <img src="{{ asset('logo.png') }}" alt="Heal Go Fly" class="h-8 w-auto object-contain">
                </a>
                <h1 class="text-2xl font-black tracking-tight text-white">Partner Registration</h1>
                <p class="text-xs text-teal-100/90 mt-1">Create your medical facilitator account</p>
            </div>

            <!-- Form Content -->
            <div class="p-6 sm:p-8">
                
                <!-- General Alert Box -->
                <div id="general-alert" class="hidden mb-5 p-3.5 rounded-xl text-xs font-semibold flex items-start gap-2 transition-all">
                    <span id="alert-icon" class="flex-shrink-0 mt-0.5"></span>
                    <span id="alert-message" class="flex-1 leading-snug"></span>
                </div>

                <form id="partner-register-form" action="{{ route('partner.register.submit') }}" method="POST" novalidate class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        
                        <!-- Full Name -->
                        <div>
                            <label for="reg-name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                Full Name <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="reg-name" 
                                name="name" 
                                value="{{ old('name') }}"
                                required
                                placeholder="Your full name" 
                                class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('name') border-rose-400 bg-rose-50/30 @enderror"
                                autocomplete="name"
                            >
                            <p id="error-name" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('name') ? '' : 'hidden' }}">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span class="error-text">{{ $errors->first('name') }}</span>
                            </p>
                        </div>

                        <!-- Company / Agency Name -->
                        <div>
                            <label for="reg-company_name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                Company / Agency <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="reg-company_name" 
                                name="company_name" 
                                value="{{ old('company_name') }}"
                                required
                                placeholder="Agency or Clinic Name" 
                                class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('company_name') border-rose-400 bg-rose-50/30 @enderror"
                            >
                            <p id="error-company_name" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('company_name') ? '' : 'hidden' }}">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span class="error-text">{{ $errors->first('company_name') }}</span>
                            </p>
                        </div>

                        <!-- Business Email -->
                        <div>
                            <label for="reg-email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                Business Email <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="reg-email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required
                                placeholder="name@company.com" 
                                class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('email') border-rose-400 bg-rose-50/30 @enderror"
                                autocomplete="email"
                            >
                            <p id="error-email" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('email') ? '' : 'hidden' }}">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span class="error-text">{{ $errors->first('email') }}</span>
                            </p>
                        </div>

                        <!-- Phone / WhatsApp -->
                        <div>
                            <label for="reg-phone" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                Phone / WhatsApp <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="tel" 
                                id="reg-phone" 
                                name="phone" 
                                value="{{ old('phone') }}"
                                required
                                placeholder="+91 9129846542" 
                                class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('phone') border-rose-400 bg-rose-50/30 @enderror"
                            >
                            <p id="error-phone" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('phone') ? '' : 'hidden' }}">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span class="error-text">{{ $errors->first('phone') }}</span>
                            </p>
                        </div>

                        <!-- Country Selection -->
                        <div>
                            <label for="reg-country" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                Country <span class="text-rose-500">*</span>
                            </label>
                            <select 
                                id="reg-country" 
                                name="country" 
                                required
                                class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('country') border-rose-400 bg-rose-50/30 @enderror"
                            >
                                <option value="">Select country</option>
                                <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                <option value="Bangladesh" {{ old('country') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                <option value="Oman" {{ old('country') == 'Oman' ? 'selected' : '' }}>Oman</option>
                                <option value="UAE" {{ old('country') == 'UAE' ? 'selected' : '' }}>United Arab Emirates</option>
                                <option value="Saudi Arabia" {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                <option value="Kenya" {{ old('country') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                <option value="Nigeria" {{ old('country') == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                                <option value="Tanzania" {{ old('country') == 'Tanzania' ? 'selected' : '' }}>Tanzania</option>
                                <option value="Ethiopia" {{ old('country') == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
                                <option value="Uzbekistan" {{ old('country') == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
                                <option value="Iraq" {{ old('country') == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                                <option value="Yemen" {{ old('country') == 'Yemen' ? 'selected' : '' }}>Yemen</option>
                                <option value="Nepal" {{ old('country') == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                                <option value="Sri Lanka" {{ old('country') == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                                <option value="United Kingdom" {{ old('country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                <option value="United States" {{ old('country') == 'United States' ? 'selected' : '' }}>United States</option>
                                <option value="Other" {{ old('country') == 'Other' ? 'selected' : '' }}>Other Country</option>
                            </select>
                            <p id="error-country" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('country') ? '' : 'hidden' }}">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span class="error-text">{{ $errors->first('country') }}</span>
                            </p>
                        </div>

                        <!-- Partner Category -->
                        <div>
                            <label for="reg-partner_type" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                Partner Type <span class="text-rose-500">*</span>
                            </label>
                            <select 
                                id="reg-partner_type" 
                                name="partner_type" 
                                required
                                class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('partner_type') border-rose-400 bg-rose-50/30 @enderror"
                            >
                                <option value="">Select type</option>
                                <option value="Medical Tourism Agency" {{ old('partner_type') == 'Medical Tourism Agency' ? 'selected' : '' }}>Medical Tourism Agency</option>
                                <option value="Individual Medical Facilitator" {{ old('partner_type') == 'Individual Medical Facilitator' ? 'selected' : '' }}>Individual Medical Facilitator</option>
                                <option value="Doctor / Clinic / Hospital" {{ old('partner_type') == 'Doctor / Clinic / Hospital' ? 'selected' : '' }}>Doctor / Clinic / Hospital</option>
                                <option value="Travel Agency / Tour Operator" {{ old('partner_type') == 'Travel Agency / Tour Operator' ? 'selected' : '' }}>Travel Agency / Tour Operator</option>
                                <option value="Corporate / Insurance Provider" {{ old('partner_type') == 'Corporate / Insurance Provider' ? 'selected' : '' }}>Corporate / Insurance Provider</option>
                                <option value="Other Healthcare Affiliate" {{ old('partner_type') == 'Other Healthcare Affiliate' ? 'selected' : '' }}>Other Healthcare Affiliate</option>
                            </select>
                            <p id="error-partner_type" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('partner_type') ? '' : 'hidden' }}">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span class="error-text">{{ $errors->first('partner_type') }}</span>
                            </p>
                        </div>

                        <!-- Website (Optional) -->
                        <div>
                            <label for="reg-website" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                Website / Social Link <span class="text-gray-400 font-normal lowercase">(optional)</span>
                            </label>
                            <input 
                                type="url" 
                                id="reg-website" 
                                name="website" 
                                value="{{ old('website') }}"
                                placeholder="https://company.com" 
                                class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('website') border-rose-400 bg-rose-50/30 @enderror"
                            >
                            <p id="error-website" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('website') ? '' : 'hidden' }}">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span class="error-text">{{ $errors->first('website') }}</span>
                            </p>
                        </div>

                        <!-- Address (Optional) -->
                        <div>
                            <label for="reg-address" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                Office Address <span class="text-gray-400 font-normal lowercase">(optional)</span>
                            </label>
                            <input 
                                type="text" 
                                id="reg-address" 
                                name="address" 
                                value="{{ old('address') }}"
                                placeholder="City, State" 
                                class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('address') border-rose-400 bg-rose-50/30 @enderror"
                            >
                            <p id="error-address" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('address') ? '' : 'hidden' }}">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span class="error-text">{{ $errors->first('address') }}</span>
                            </p>
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="reg-password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                Password <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    id="reg-password" 
                                    name="password" 
                                    required
                                    placeholder="••••••••" 
                                    class="w-full px-3.5 pr-10 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('password') border-rose-400 bg-rose-50/30 @enderror"
                                    autocomplete="new-password"
                                >
                                <button 
                                    type="button" 
                                    id="toggle-reg-password" 
                                    class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none"
                                >
                                    <svg id="reg-eye-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <svg id="reg-eye-off-icon" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                </button>
                            </div>
                            <p id="error-password" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('password') ? '' : 'hidden' }}">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span class="error-text">{{ $errors->first('password') }}</span>
                            </p>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="reg-password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                Confirm Password <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="password" 
                                id="reg-password_confirmation" 
                                name="password_confirmation" 
                                required
                                placeholder="••••••••" 
                                class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                                autocomplete="new-password"
                            >
                            <p id="error-password_confirmation" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 hidden">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span class="error-text"></span>
                            </p>
                        </div>

                    </div>

                    <!-- Terms Checkbox -->
                    <div class="pt-2">
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
                            <span class="text-xs text-gray-600 leading-snug">
                                I agree to the <a href="{{ url('/') }}" target="_blank" class="text-[#27797D] font-bold hover:underline">Partner Terms & Conditions</a>
                            </span>
                        </label>
                        <p id="error-terms" class="text-xs text-rose-500 font-medium mt-1.5 flex items-center gap-1 {{ $errors->has('terms') ? '' : 'hidden' }}">
                            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span class="error-text">{{ $errors->first('terms') }}</span>
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button 
                            type="submit" 
                            id="reg-submit-btn" 
                            class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white font-bold py-3 px-5 rounded-xl shadow-md shadow-[#EF7415]/20 hover:shadow-lg transition-all text-sm flex items-center justify-center gap-2"
                        >
                            <span id="reg-btn-text">Register as Partner</span>
                            <svg id="reg-btn-spinner" class="animate-spin h-4 w-4 text-white hidden" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <svg id="reg-btn-arrow" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </form>

                <!-- Switch to Login -->
                <div class="mt-6 pt-5 border-t border-gray-100 text-center">
                    <p class="text-xs text-gray-500">
                        Already have a partner account? 
                        <a href="{{ route('partner.login') }}" class="font-bold text-[#27797D] hover:text-[#1D4B6C] hover:underline">
                            Sign in here
                        </a>
                    </p>
                </div>

            </div>

        </div>

    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('partner-register-form');
    const submitBtn = document.getElementById('reg-submit-btn');
    const btnText = document.getElementById('reg-btn-text');
    const btnSpinner = document.getElementById('reg-btn-spinner');
    const btnArrow = document.getElementById('reg-btn-arrow');
    const generalAlert = document.getElementById('general-alert');
    const alertMessage = document.getElementById('alert-message');
    const alertIcon = document.getElementById('alert-icon');

    // Toggle Password Visibility
    const toggleRegPasswordBtn = document.getElementById('toggle-reg-password');
    const passwordInput = document.getElementById('reg-password');
    const eyeIcon = document.getElementById('reg-eye-icon');
    const eyeOffIcon = document.getElementById('reg-eye-off-icon');

    if (toggleRegPasswordBtn && passwordInput) {
        toggleRegPasswordBtn.addEventListener('click', function () {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            eyeIcon.classList.toggle('hidden', isPassword);
            eyeOffIcon.classList.toggle('hidden', !isPassword);
        });
    }

    // Helper: Show Error Directly Below Field
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

    // Attach real-time clear handlers
    const fields = ['name', 'company_name', 'email', 'phone', 'country', 'partner_type', 'website', 'address', 'password', 'password_confirmation', 'terms'];
    fields.forEach(field => {
        const el = document.getElementById('reg-' + field);
        if (el) {
            el.addEventListener('input', () => {
                clearFieldError(field);
                if (generalAlert) generalAlert.classList.add('hidden');
            });
            el.addEventListener('change', () => {
                clearFieldError(field);
                if (generalAlert) generalAlert.classList.add('hidden');
            });
        }
    });

    // Helper: Show Alert Box
    function showAlert(type, message) {
        if (!generalAlert) return;
        generalAlert.className = 'mb-5 p-3.5 rounded-xl text-xs font-semibold flex items-start gap-2 transition-all';
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

    // Form Submit Handler
    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        // Clear all errors
        fields.forEach(f => clearFieldError(f));
        if (generalAlert) generalAlert.classList.add('hidden');

        // Client validation
        let hasError = false;
        let firstErrorInput = null;

        function markError(f, msg) {
            showFieldError(f, msg);
            hasError = true;
            if (!firstErrorInput) {
                firstErrorInput = document.getElementById('reg-' + f);
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
            markError('name', 'Please enter your full name (at least 3 characters).');
        }

        if (!companyVal || companyVal.length < 2) {
            markError('company_name', 'Please enter your company or agency name.');
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailVal) {
            markError('email', 'Please enter your email address.');
        } else if (!emailRegex.test(emailVal)) {
            markError('email', 'Please enter a valid email address.');
        }

        if (!phoneVal || phoneVal.length < 7) {
            markError('phone', 'Please enter a valid phone number.');
        }

        if (!countryVal) {
            markError('country', 'Please select your country.');
        }

        if (!partnerTypeVal) {
            markError('partner_type', 'Please select your partner type.');
        }

        if (!passwordVal) {
            markError('password', 'Please create a password.');
        } else if (passwordVal.length < 8) {
            markError('password', 'Password must be at least 8 characters.');
        }

        if (!passwordConfirmVal) {
            markError('password_confirmation', 'Please confirm your password.');
        } else if (passwordVal && passwordVal !== passwordConfirmVal) {
            markError('password_confirmation', 'Passwords do not match.');
        }

        if (!termsChecked) {
            markError('terms', 'You must agree to the partner terms.');
        }

        if (hasError) {
            if (firstErrorInput) {
                firstErrorInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstErrorInput.focus();
            }
            return;
        }

        // Loading state
        submitBtn.disabled = true;
        btnText.textContent = 'Creating Account...';
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
                showAlert('success', data.message || 'Registration successful!');
                btnText.textContent = 'Redirecting...';
                
                // Frontend-level redirect
                setTimeout(() => {
                    window.location.href = data.redirect_url;
                }, 400);
            } else {
                submitBtn.disabled = false;
                btnText.textContent = 'Register as Partner';
                btnSpinner.classList.add('hidden');
                btnArrow.classList.remove('hidden');

                if (data.errors) {
                    let firstErrField = null;
                    for (const [field, messages] of Object.entries(data.errors)) {
                        showFieldError(field, messages[0]);
                        if (!firstErrField) firstErrField = field;
                    }
                    showAlert('error', data.message || 'Please fix the errors below.');
                    if (firstErrField) {
                        const errEl = document.getElementById('reg-' + firstErrField);
                        if (errEl) errEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                } else {
                    showAlert('error', data.message || 'Registration failed. Please try again.');
                }
            }
        } catch (error) {
            submitBtn.disabled = false;
            btnText.textContent = 'Register as Partner';
            btnSpinner.classList.add('hidden');
            btnArrow.classList.remove('hidden');

            form.submit();
        }
    });
});
</script>
@endpush
@endsection
