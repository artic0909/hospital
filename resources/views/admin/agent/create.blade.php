@extends('admin.layouts.app')

@section('title', 'Add New Agent / Facilitator - Admin Portal')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Navigation -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.agent.index') }}" class="text-[#27797D] hover:underline">&larr; Agents Directory</a>
                <span>&bull;</span>
                <span class="text-slate-400">Add New Agent</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Register New Agent / Facilitator</h1>
            <p class="text-xs text-slate-500 mt-0.5">Create a dedicated medical facilitator account with access to the Agent Portal.</p>
        </div>

        <div class="flex items-center gap-2">
            <a 
                href="{{ route('admin.agent.index') }}" 
                class="px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 text-xs font-bold text-slate-700 transition-colors"
            >
                Cancel
            </a>
        </div>
    </div>

    <!-- Agent Creation Form -->
    <form action="{{ route('admin.agent.store') }}" method="POST" class="space-y-6" id="agent-create-form">
        @csrf

        <!-- General & Contact Information Card -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="w-10 h-10 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center font-bold text-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <div>
                    <h3 class="text-base font-black text-[#112347]">Primary Profile & Agency Details</h3>
                    <p class="text-xs text-slate-400">Enter agent identity, company representation, and contact credentials.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                        Agent Full Name <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name') }}" 
                        placeholder="e.g. Tariq Al-Mansoor"
                        required
                        class="w-full text-xs px-4 py-2.5 rounded-xl border @error('name') border-rose-400 bg-rose-50/30 @else border-slate-200 bg-slate-50 focus:bg-white @enderror focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                    @error('name')
                        <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company / Agency Name -->
                <div>
                    <label for="company_name" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                        Agency / Company Name <span class="text-slate-400 font-normal lowercase">(optional)</span>
                    </label>
                    <input 
                        type="text" 
                        name="company_name" 
                        id="company_name" 
                        value="{{ old('company_name') }}" 
                        placeholder="e.g. Al-Amal Health Tourism Ltd"
                        class="w-full text-xs px-4 py-2.5 rounded-xl border @error('company_name') border-rose-400 bg-rose-50/30 @else border-slate-200 bg-slate-50 focus:bg-white @enderror focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                    @error('company_name')
                        <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                        Email Address (Login ID) <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        placeholder="facilitator@agency.com"
                        required
                        class="w-full text-xs px-4 py-2.5 rounded-xl border @error('email') border-rose-400 bg-rose-50/30 @else border-slate-200 bg-slate-50 focus:bg-white @enderror focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                    @error('email')
                        <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone / Mobile -->
                <div>
                    <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                        Phone / WhatsApp Number <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="phone" 
                        id="phone" 
                        value="{{ old('phone') }}" 
                        placeholder="+91 98765 43210 or +971 50 123 4567"
                        required
                        class="w-full text-xs px-4 py-2.5 rounded-xl border @error('phone') border-rose-400 bg-rose-50/30 @else border-slate-200 bg-slate-50 focus:bg-white @enderror focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800 font-mono"
                    >
                    @error('phone')
                        <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Country -->
                <div>
                    <label for="country" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                        Country of Operation <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="country" 
                        id="country" 
                        required
                        class="w-full text-xs px-4 py-2.5 rounded-xl border @error('country') border-rose-400 bg-rose-50/30 @else border-slate-200 bg-slate-50 focus:bg-white @enderror focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                        <option value="">-- Select Country --</option>
                        @foreach($countries as $cnt)
                            <option value="{{ $cnt->name }}" {{ old('country') === $cnt->name ? 'selected' : '' }}>
                                {{ $cnt->name }}
                            </option>
                        @endforeach
                        <option value="Bangladesh" {{ old('country') === 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                        <option value="India" {{ old('country') === 'India' ? 'selected' : '' }}>India</option>
                        <option value="United Arab Emirates" {{ old('country') === 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                        <option value="Oman" {{ old('country') === 'Oman' ? 'selected' : '' }}>Oman</option>
                        <option value="Saudi Arabia" {{ old('country') === 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                        <option value="Nigeria" {{ old('country') === 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                        <option value="Kenya" {{ old('country') === 'Kenya' ? 'selected' : '' }}>Kenya</option>
                        <option value="Uzbekistan" {{ old('country') === 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
                        <option value="Russia" {{ old('country') === 'Russia' ? 'selected' : '' }}>Russia</option>
                    </select>
                    @error('country')
                        <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Agent / Facilitator Type -->
                <div>
                    <label for="agent_type" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                        Facilitator Type <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="agent_type" 
                        id="agent_type" 
                        required
                        class="w-full text-xs px-4 py-2.5 rounded-xl border @error('agent_type') border-rose-400 bg-rose-50/30 @else border-slate-200 bg-slate-50 focus:bg-white @enderror focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                        @php
                            $types = [
                                'Medical Facilitator',
                                'Travel Agency',
                                'Corporate Partner',
                                'Independent Agent',
                                'Insurance Partner',
                                'Doctor Referral / Clinic',
                                'Embassy / Consulate Coordinator'
                            ];
                        @endphp
                        @foreach($types as $type)
                            <option value="{{ $type }}" {{ old('agent_type', 'Medical Facilitator') === $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                    @error('agent_type')
                        <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Website -->
                <div>
                    <label for="website" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                        Website / Portfolio <span class="text-slate-400 font-normal lowercase">(optional)</span>
                    </label>
                    <input 
                        type="url" 
                        name="website" 
                        id="website" 
                        value="{{ old('website') }}" 
                        placeholder="https://agency.com"
                        class="w-full text-xs px-4 py-2.5 rounded-xl border @error('website') border-rose-400 bg-rose-50/30 @else border-slate-200 bg-slate-50 focus:bg-white @enderror focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                    @error('website')
                        <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Account Status -->
                <div>
                    <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                        Account Status <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="status" 
                        id="status" 
                        required
                        class="w-full text-xs px-4 py-2.5 rounded-xl border @error('status') border-rose-400 bg-rose-50/30 @else border-slate-200 bg-slate-50 focus:bg-white @enderror focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                        <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Active (Can login & add patients)</option>
                        <option value="suspended" {{ old('status') === 'suspended' ? 'selected' : '' }}>Suspended (Portal access revoked)</option>
                    </select>
                    @error('status')
                        <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Portal Login Password -->
            <div class="pt-2 border-t border-slate-100">
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                    Initial Portal Password <span class="text-slate-400 font-normal lowercase">(optional)</span>
                </label>
                <div class="relative">
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Leave blank to default to '12345678'"
                        class="w-full text-xs px-4 py-2.5 rounded-xl border @error('password') border-rose-400 bg-rose-50/30 @else border-slate-200 bg-slate-50 focus:bg-white @enderror focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                </div>
                <p class="text-[11px] text-slate-400 mt-1">If left empty, default password will be <code class="bg-slate-100 px-1 py-0.5 rounded text-slate-700 font-mono font-bold">12345678</code>. The agent can change it anytime in their portal settings.</p>
                @error('password')
                    <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Office / Physical Address -->
            <div>
                <label for="address" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                    Physical Office Address <span class="text-slate-400 font-normal lowercase">(optional)</span>
                </label>
                <textarea 
                    name="address" 
                    id="address" 
                    rows="3" 
                    placeholder="Floor, Building, Street, City, State/Province, Country"
                    class="w-full text-xs px-4 py-2.5 rounded-xl border @error('address') border-rose-400 bg-rose-50/30 @else border-slate-200 bg-slate-50 focus:bg-white @enderror focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                >{{ old('address') }}</textarea>
                @error('address')
                    <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Submit & Actions Bar -->
        <div class="flex items-center justify-end gap-3 pt-4">
            <a 
                href="{{ route('admin.agent.index') }}" 
                class="px-5 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 transition-colors shadow-2xs"
            >
                Cancel
            </a>
            <button 
                type="submit" 
                class="px-6 py-2.5 rounded-xl bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-black shadow-md shadow-[#EF7415]/20 hover:shadow-lg transition-all transform hover:-translate-y-0.5 cursor-pointer inline-flex items-center gap-2"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                <span>Save Agent & View Profile</span>
            </button>
        </div>

    </form>

</div>
@endsection

