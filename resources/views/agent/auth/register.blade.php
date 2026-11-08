@extends('frontend.layouts.app')

@section('title', 'Agent Registration - Heal Go Fly | Medical Value Travel Network')

@section('content')
<!-- ==================== MAIN AGENT REGISTRATION HERO ==================== -->
<section class="relative bg-gradient-to-b from-[#1D4B6C]/5 via-[#27797D]/5 to-white py-8 sm:py-12 lg:py-16 overflow-hidden">
    
    <!-- Ambient Glow Elements -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#27797D]/10 rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="absolute bottom-0 left-10 w-80 h-80 bg-[#EF7415]/10 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- LEFT COLUMN: Why Register as an Agent -->
            <div class="lg:col-span-5 space-y-6 sm:space-y-8 order-2 lg:order-1 lg:sticky lg:top-24">
                
                <!-- Badge & Slogan -->
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1D4B6C]/10 text-[#1D4B6C] border border-[#1D4B6C]/15 text-xs font-bold">
                    <span class="w-2 h-2 rounded-full bg-[#EF7415] animate-pulse"></span>
                    <span>Become Authorized Agent</span>
                    <span class="text-gray-300">|</span>
                    <span class="italic text-[#27797D]">HealGoFly</span>
                </div>

                <!-- Main Heading -->
                <div class="space-y-3">
                    <h1 class="text-2xl sm:text-3xl lg:text-[36px] font-black text-[#112347] tracking-tight leading-[1.2]">
                        Join India's Top Medical Value Travel Network
                    </h1>
                    <p class="text-sm sm:text-base text-[#5a6a85] font-normal leading-relaxed">
                        Register as an authorized HealGoFly healthcare agent. Manage your patients directly, track hospital appointments, and oversee treatment progress end-to-end.
                    </p>
                </div>

                <!-- 4 Quick Workflow Steps -->
                <div class="space-y-4 pt-1">
                    <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0 font-extrabold text-xs">
                            1
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">Instant Agent ID Generation</h4>
                            <p class="text-[11px] text-gray-500 mt-0.5 leading-relaxed">Get your unique Agent Code (e.g. AGT-00001) immediately upon registration.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-8 h-8 rounded-xl bg-blue-50 text-[#1D4B6C] flex items-center justify-center shrink-0 font-extrabold text-xs">
                            2
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">Direct Patient Management</h4>
                            <p class="text-[11px] text-gray-500 mt-0.5 leading-relaxed">Register your international patients and securely upload diagnostic scans & reports.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-8 h-8 rounded-xl bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0 font-extrabold text-xs">
                            3
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">Live Treatment Status Updates</h4>
                            <p class="text-[11px] text-gray-500 mt-0.5 leading-relaxed">Follow your patient's real-time journey: booked, arrived/received, active treatment, and discharge.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-white border border-gray-100 shadow-xs">
                        <div class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-extrabold text-xs">
                            4
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">Admin Visibility & Priority Coordination</h4>
                            <p class="text-[11px] text-gray-500 mt-0.5 leading-relaxed">All your patients are clearly attributed to your agency on the Admin panel.</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Helpline Info -->
                <div class="pt-2 flex flex-wrap items-center gap-4 text-xs text-gray-600">
                    <span class="font-bold text-[#1D4B6C]">Agent Helpdesk:</span>
                    <a href="mailto:info@healgofly.com" class="font-medium text-[#27797D] hover:underline">
                        info@healgofly.com
                    </a>
                </div>

            </div>

            <!-- RIGHT COLUMN: Agent Registration Form Card -->
            <div class="lg:col-span-7 order-1 lg:order-2">
                
                <div class="bg-white rounded-3xl shadow-xl shadow-[#1D4B6C]/10 border border-gray-100 overflow-hidden">
                    
                    <!-- Themed Card Header -->
                    <div class="bg-gradient-to-r from-[#112347] via-[#1D4B6C] to-[#27797D] px-6 py-6 text-center text-white relative">
                        <a href="{{ url('/') }}" class="inline-flex items-center justify-center bg-white px-3 py-1.5 rounded-xl shadow-xs mb-2.5">
                            <img src="{{ asset('logo.png') }}" alt="Heal Go Fly" class="h-8 w-auto object-contain">
                        </a>
                        <h2 class="text-2xl font-black tracking-tight text-white">Agent Registration</h2>
                        <p class="text-xs text-teal-100/90 mt-0.5">Create your authorized healthcare agent account</p>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 sm:p-8">

                        @if($errors->any())
                            <div class="mb-5 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs">
                                <p class="font-bold mb-1">Please fix the following errors:</p>
                                <ul class="list-disc list-inside space-y-0.5">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('agent.register.submit') }}" method="POST" novalidate class="space-y-4">
                            @csrf

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                
                                <!-- Full Name -->
                                <div>
                                    <label for="name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                        Full Name <span class="text-rose-500">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        id="name" 
                                        name="name" 
                                        value="{{ old('name') }}"
                                        required
                                        placeholder="Your full name" 
                                        class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('name') border-rose-400 bg-rose-50/30 @enderror"
                                        autocomplete="name"
                                    >
                                    @error('name')
                                        <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Company / Agency Name (Optional) -->
                                <div>
                                    <label for="company_name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                        Company / Agency <span class="text-gray-400 font-normal lowercase">(optional)</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        id="company_name" 
                                        name="company_name" 
                                        value="{{ old('company_name') }}"
                                        placeholder="Agency or Clinic Name" 
                                        class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('company_name') border-rose-400 bg-rose-50/30 @enderror"
                                    >
                                    @error('company_name')
                                        <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Business Email -->
                                <div>
                                    <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                        Business Email <span class="text-rose-500">*</span>
                                    </label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email" 
                                        value="{{ old('email') }}"
                                        required
                                        placeholder="name@company.com" 
                                        class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('email') border-rose-400 bg-rose-50/30 @enderror"
                                        autocomplete="email"
                                    >
                                    @error('email')
                                        <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Phone / WhatsApp -->
                                <div>
                                    <label for="phone" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                        Phone / WhatsApp <span class="text-rose-500">*</span>
                                    </label>
                                    <input 
                                        type="tel" 
                                        id="phone" 
                                        name="phone" 
                                        value="{{ old('phone') }}"
                                        required
                                        placeholder="+91 9876543210" 
                                        class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('phone') border-rose-400 bg-rose-50/30 @enderror"
                                    >
                                    @error('phone')
                                        <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Country Selection -->
                                <div>
                                    <label for="country" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                        Country <span class="text-rose-500">*</span>
                                    </label>
                                    <select 
                                        id="country" 
                                        name="country" 
                                        required
                                        class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('country') border-rose-400 bg-rose-50/30 @enderror"
                                    >
                                        <option value="">Select country</option>
                                        @if(isset($countries) && count($countries) > 0)
                                            @foreach($countries as $c)
                                                <option value="{{ $c->name }}" {{ old('country') == $c->name ? 'selected' : '' }}>{{ $c->name }}</option>
                                            @endforeach
                                        @else
                                            <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                            <option value="Bangladesh" {{ old('country') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                            <option value="Oman" {{ old('country') == 'Oman' ? 'selected' : '' }}>Oman</option>
                                            <option value="UAE" {{ old('country') == 'UAE' ? 'selected' : '' }}>United Arab Emirates</option>
                                            <option value="Saudi Arabia" {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                            <option value="Kenya" {{ old('country') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                            <option value="Nigeria" {{ old('country') == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                                            <option value="Uzbekistan" {{ old('country') == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
                                            <option value="Nepal" {{ old('country') == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                                        @endif
                                    </select>
                                    @error('country')
                                        <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Agent Type -->
                                <div>
                                    <label for="agent_type" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                        Agent Type <span class="text-rose-500">*</span>
                                    </label>
                                    <select 
                                        id="agent_type" 
                                        name="agent_type" 
                                        required
                                        class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('agent_type') border-rose-400 bg-rose-50/30 @enderror"
                                    >
                                        <option value="">Select type</option>
                                        <option value="Medical Tourism Agency" {{ old('agent_type') == 'Medical Tourism Agency' ? 'selected' : '' }}>Medical Tourism Agency</option>
                                        <option value="Individual Medical Facilitator" {{ old('agent_type') == 'Individual Medical Facilitator' ? 'selected' : '' }}>Individual Medical Facilitator</option>
                                        <option value="Doctor / Clinic / Hospital" {{ old('agent_type') == 'Doctor / Clinic / Hospital' ? 'selected' : '' }}>Doctor / Clinic / Hospital</option>
                                        <option value="Travel Agency / Tour Operator" {{ old('agent_type') == 'Travel Agency / Tour Operator' ? 'selected' : '' }}>Travel Agency / Tour Operator</option>
                                        <option value="Corporate / Insurance Provider" {{ old('agent_type') == 'Corporate / Insurance Provider' ? 'selected' : '' }}>Corporate / Insurance Provider</option>
                                        <option value="Other Healthcare Affiliate" {{ old('agent_type') == 'Other Healthcare Affiliate' ? 'selected' : '' }}>Other Healthcare Affiliate</option>
                                    </select>
                                    @error('agent_type')
                                        <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Website (Optional) -->
                                <div>
                                    <label for="website" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                        Website / Profile Link <span class="text-gray-400 font-normal lowercase">(optional)</span>
                                    </label>
                                    <input 
                                        type="url" 
                                        id="website" 
                                        name="website" 
                                        value="{{ old('website') }}"
                                        placeholder="https://company.com" 
                                        class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('website') border-rose-400 bg-rose-50/30 @enderror"
                                    >
                                    @error('website')
                                        <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Address (Optional) -->
                                <div>
                                    <label for="address" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                        Office Address <span class="text-gray-400 font-normal lowercase">(optional)</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        id="address" 
                                        name="address" 
                                        value="{{ old('address') }}"
                                        placeholder="City, State, Country" 
                                        class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('address') border-rose-400 bg-rose-50/30 @enderror"
                                    >
                                    @error('address')
                                        <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div>
                                    <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                        Password <span class="text-rose-500">*</span>
                                    </label>
                                    <input 
                                        type="password" 
                                        id="password" 
                                        name="password" 
                                        required
                                        placeholder="At least 8 characters" 
                                        class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('password') border-rose-400 bg-rose-50/30 @enderror"
                                        autocomplete="new-password"
                                    >
                                    @error('password')
                                        <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div>
                                    <label for="password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                                        Confirm Password <span class="text-rose-500">*</span>
                                    </label>
                                    <input 
                                        type="password" 
                                        id="password_confirmation" 
                                        name="password_confirmation" 
                                        required
                                        placeholder="Re-type password" 
                                        class="w-full px-3.5 py-2.5 text-sm text-gray-900 bg-gray-50/60 border border-gray-300 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                                        autocomplete="new-password"
                                    >
                                </div>

                            </div>

                            <!-- Terms & Conditions Checkbox -->
                            <div class="pt-2">
                                <label class="inline-flex items-start cursor-pointer select-none">
                                    <input 
                                        type="checkbox" 
                                        name="terms" 
                                        value="1" 
                                        required
                                        {{ old('terms') ? 'checked' : '' }}
                                        class="w-4 h-4 mt-0.5 rounded text-[#27797D] border-gray-300 focus:ring-[#27797D]/30"
                                    >
                                    <span class="ml-2 text-xs text-gray-600 leading-snug">
                                        I agree to the <span class="font-bold text-[#112347]">Heal Go Fly Agent Terms of Service</span> and authorize Heal Go Fly to coordinate healthcare inquiries and hospital referrals.
                                    </span>
                                </label>
                                @error('terms')
                                    <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button 
                                type="submit" 
                                class="w-full mt-3 py-3 px-4 rounded-xl bg-gradient-to-r from-[#112347] via-[#1D4B6C] to-[#27797D] hover:from-[#0e1d3a] hover:to-[#1e5f62] text-white text-sm font-bold shadow-lg shadow-[#1D4B6C]/25 transition-all transform hover:-translate-y-0.5 cursor-pointer flex items-center justify-center gap-2"
                            >
                                <span>Complete Agent Registration</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>

                        </form>

                        <!-- Switch to Login -->
                        <div class="mt-6 pt-5 border-t border-gray-100 text-center">
                            <p class="text-xs text-gray-500">
                                Already registered as an Agent? 
                                <a href="{{ route('agent.login') }}" class="font-bold text-[#27797D] hover:underline ml-1">
                                    Sign In here &rarr;
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

