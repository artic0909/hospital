@extends('admin.layouts.app')

@section('title', 'Edit Referral Partner - ' . $agent->name . ' - Admin Portal')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Navigation -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.agent.index') }}" class="text-[#27797D] hover:underline">&larr; Referral Partners Directory</a>
                <span>&bull;</span>
                <a href="{{ route('admin.agent.view', $agent->id) }}" class="text-slate-600 hover:underline">{{ $agent->agent_code }}</a>
                <span>&bull;</span>
                <span class="text-slate-400">Edit Profile</span>
            </div>
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-black text-[#112347] tracking-tight">Edit Referral Partner: {{ $agent->name }}</h1>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-mono font-bold bg-teal-50 text-teal-800 border border-teal-200">
                    {{ $agent->agent_code }}
                </span>
            </div>
            <p class="text-xs text-slate-500 mt-0.5">Update agency profile information, login credentials, or account standing.</p>
        </div>

        <div class="flex items-center gap-2">
            <a 
                href="{{ route('admin.agent.login-direct', $agent->id) }}" 
                target="_blank"
                class="px-3.5 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold transition-all shadow-xs inline-flex items-center gap-1.5"
                title="Direct impersonation login into this partner's portal"
            >
                <span>⚡ Power Login</span>
            </a>
            <a 
                href="{{ route('admin.agent.view', $agent->id) }}" 
                class="px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 text-xs font-bold text-slate-700 transition-colors"
            >
                Cancel
            </a>
        </div>
    </div>

    <!-- Referral Partner Edit Form -->
    <form action="{{ route('admin.agent.update.submit', $agent->id) }}" method="POST" class="space-y-6" id="agent-update-form">
        @csrf
        @method('PUT')

        <!-- General & Contact Information Card -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="w-10 h-10 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center font-bold text-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
                <div>
                    <h3 class="text-base font-black text-[#112347]">Primary Profile & Agency Details</h3>
                    <p class="text-xs text-slate-400">Modify partner profile, agency affiliation, phone numbers, or country of operation.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                        Partner Full Name <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name', $agent->name) }}" 
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
                        value="{{ old('company_name', $agent->company_name) }}" 
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
                        value="{{ old('email', $agent->email) }}" 
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
                        value="{{ old('phone', $agent->phone) }}" 
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
                            <option value="{{ $cnt->name }}" {{ old('country', $agent->country) === $cnt->name ? 'selected' : '' }}>
                                {{ $cnt->name }}
                            </option>
                        @endforeach
                        <option value="Bangladesh" {{ old('country', $agent->country) === 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                        <option value="India" {{ old('country', $agent->country) === 'India' ? 'selected' : '' }}>India</option>
                        <option value="United Arab Emirates" {{ old('country', $agent->country) === 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                        <option value="Oman" {{ old('country', $agent->country) === 'Oman' ? 'selected' : '' }}>Oman</option>
                        <option value="Saudi Arabia" {{ old('country', $agent->country) === 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                        <option value="Nigeria" {{ old('country', $agent->country) === 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                        <option value="Kenya" {{ old('country', $agent->country) === 'Kenya' ? 'selected' : '' }}>Kenya</option>
                        <option value="Uzbekistan" {{ old('country', $agent->country) === 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
                        <option value="Russia" {{ old('country', $agent->country) === 'Russia' ? 'selected' : '' }}>Russia</option>
                    </select>
                    @error('country')
                        <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Referral Partner / Facilitator Type -->
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
                                'Independent Referral Partner',
                                'Insurance Partner',
                                'Doctor Referral / Clinic',
                                'Embassy / Consulate Coordinator'
                            ];
                        @endphp
                        @foreach($types as $type)
                            <option value="{{ $type }}" {{ old('agent_type', $agent->agent_type) === $type ? 'selected' : '' }}>
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
                        value="{{ old('website', $agent->website) }}" 
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
                        <option value="active" {{ old('status', $agent->status) === 'active' ? 'selected' : '' }}>Active (Can login & add patients)</option>
                        <option value="suspended" {{ old('status', $agent->status) === 'suspended' ? 'selected' : '' }}>Suspended (Portal access revoked)</option>
                    </select>
                    @error('status')
                        <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Portal Login Password (Optional for updates) -->
            <div class="pt-2 border-t border-slate-100">
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                    Reset Portal Password <span class="text-slate-400 font-normal lowercase">(leave blank to keep unchanged)</span>
                </label>
                <div class="relative">
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Enter new password (min 6 characters)"
                        class="w-full text-xs px-4 py-2.5 rounded-xl border @error('password') border-rose-400 bg-rose-50/30 @else border-slate-200 bg-slate-50 focus:bg-white @enderror focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                </div>
                <p class="text-[11px] text-slate-400 mt-1">Leave blank if you do not want to alter this partner's current credentials.</p>
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
                >{{ old('address', $agent->address) }}</textarea>
                @error('address')
                    <p class="text-rose-500 text-[11px] font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Submit & Actions Bar -->
        <div class="flex items-center justify-between pt-4">
            <a 
                href="{{ route('admin.agent.view', $agent->id) }}" 
                class="px-5 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 transition-colors shadow-2xs"
            >
                &larr; Back to Dossier
            </a>
            <div class="flex items-center gap-3">
                <button 
                    type="submit" 
                    class="px-6 py-2.5 rounded-xl bg-[#27797D] hover:bg-[#1f6265] text-white text-xs font-black shadow-md shadow-[#27797D]/20 hover:shadow-lg transition-all transform hover:-translate-y-0.5 cursor-pointer inline-flex items-center gap-2"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <span>Update Partner Profile</span>
                </button>
            </div>
        </div>

    </form>

</div>
@endsection

