@extends('admin.layouts.app')

@section('title', 'Register New Patient - Heal Go Fly Admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Navigation -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.patient.index') }}" class="text-[#27797D] hover:underline">&larr; Patients Directory</a>
                <span>&bull;</span>
                <span class="text-slate-400">Add Patient</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Register New Patient</h1>
            <p class="text-xs text-slate-500 mt-0.5">Create a comprehensive patient health dossier with contact details and optional medical photo.</p>
        </div>

        <div class="flex items-center gap-2">
            <a 
                href="{{ route('admin.patient.index') }}" 
                class="px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 text-xs font-bold text-slate-700 transition-colors"
            >
                Cancel
            </a>
        </div>
    </div>

    <!-- Registration Form -->
    <form action="{{ route('admin.patient.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="patient-registration-form">
        @csrf

        @if(isset($enquiry) && $enquiry)
            <!-- Conversion Ribbon Alert -->
            <div class="bg-gradient-to-r from-teal-500/10 via-emerald-500/10 to-teal-500/5 border-2 border-teal-300 p-5 rounded-3xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 shadow-xs">
                <div class="flex items-start gap-3.5">
                    <div class="w-11 h-11 rounded-2xl bg-[#27797D] text-white flex items-center justify-center font-bold text-xl shrink-0 shadow-sm">
                        👤
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-0.5 rounded-full bg-teal-100 text-[#27797D] text-[10px] font-black uppercase tracking-wider">Converting Lead #{{ $enquiry->id }}</span>
                            <span class="text-xs text-slate-400">&bull; Received {{ $enquiry->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="text-base font-black text-[#112347] mt-1">
                            {{ $enquiry->name }} &bull; <span class="font-mono">{{ $enquiry->phone }}</span>
                        </h3>
                        <p class="text-xs text-slate-600 mt-0.5 font-medium">
                            Enquiry matched data (Name, Phone, Country, City, Clinical Notes) is pre-filled below. Review and complete any missing fields to convert this lead into an official patient.
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <a 
                        href="{{ route('admin.enquiries.show', $enquiry->id) }}" 
                        target="_blank"
                        class="px-3.5 py-2 rounded-xl bg-white hover:bg-slate-50 text-xs font-bold text-[#27797D] border border-teal-200 transition-colors shadow-2xs whitespace-nowrap"
                    >
                        View Original Enquiry &rarr;
                    </a>
                </div>
            </div>

            <input type="hidden" name="enquiry_id" value="{{ $enquiry->id }}">
            @if($enquiry->hospital_id)
                <input type="hidden" name="hospital_id" value="{{ $enquiry->hospital_id }}">
            @endif
        @endif

        <!-- Duplicate Warning Banner at Top (Dynamically triggered) -->
        <div id="duplicate-patient-top-alert" class="hidden p-4 rounded-2xl bg-rose-50 border-2 border-rose-300 text-rose-800 text-xs font-semibold flex items-center justify-between gap-3 animate-in fade-in">
            <div class="flex items-center gap-2.5">
                <span class="text-xl">⚠️</span>
                <div>
                    <strong class="block text-sm text-rose-900 font-black">Existing Patient Detected!</strong>
                    <span id="duplicate-patient-top-msg">A patient with this mobile number or email is already registered in the system.</span>
                </div>
            </div>
            <a id="duplicate-patient-top-link" href="#" target="_blank" class="px-3.5 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-bold whitespace-nowrap shadow-xs">
                View Existing Patient &rarr;
            </a>
        </div>

        <!-- CARD 1: Basic Information -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">Personal Details</h2>
                    <p class="text-xs text-slate-400">Core identifying information for this patient</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center font-bold text-xs">1</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                
                <!-- Patient Name -->
                <div class="sm:col-span-2">
                    <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Patient Full Name <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        required
                        value="{{ old('name', isset($enquiry) ? $enquiry->name : '') }}" 
                        placeholder="e.g. Johnathan Doe" 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('name') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                    @error('name')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Phone / WhatsApp -->
                <div>
                    <label for="phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 flex items-center justify-between">
                        <span>Phone / WhatsApp Number <span class="text-rose-500">*</span></span>
                        <span id="phone-checking-spinner" class="text-[10px] text-teal-600 font-normal hidden">Checking...</span>
                    </label>
                    <input 
                        type="text" 
                        name="phone" 
                        id="phone" 
                        required
                        value="{{ old('phone', isset($enquiry) ? $enquiry->phone : '') }}" 
                        placeholder="+91 98765 43210" 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('phone') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800 font-mono"
                    >
                    <!-- Duplicate Alert Box under Phone -->
                    <div id="phone-duplicate-box" class="hidden mt-2 p-2.5 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-700">
                        <div class="flex items-start gap-2">
                            <span class="text-rose-500 font-bold shrink-0">⚠️</span>
                            <div class="flex-1">
                                <span id="phone-duplicate-text" class="font-bold block"></span>
                                <a id="phone-duplicate-link" href="#" target="_blank" class="inline-block mt-1 underline text-rose-800 font-black hover:text-rose-950">View Profile &rarr;</a>
                            </div>
                        </div>
                    </div>
                    @error('phone')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 flex items-center justify-between">
                        <span>Email Address</span>
                        <span id="email-checking-spinner" class="text-[10px] text-teal-600 font-normal hidden">Checking...</span>
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        placeholder="patient@example.com" 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('email') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                    <!-- Duplicate Alert Box under Email -->
                    <div id="email-duplicate-box" class="hidden mt-2 p-2.5 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-700">
                        <div class="flex items-start gap-2">
                            <span class="text-rose-500 font-bold shrink-0">⚠️</span>
                            <div class="flex-1">
                                <span id="email-duplicate-text" class="font-bold block"></span>
                                <a id="email-duplicate-link" href="#" target="_blank" class="inline-block mt-1 underline text-rose-800 font-black hover:text-rose-950">View Profile &rarr;</a>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

        <!-- CARD 2: Location & Address -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">Geographical & Residential Info</h2>
                    <p class="text-xs text-slate-400">Origin country, state/province, and address details</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-orange-50 text-[#EF7415] flex items-center justify-center font-bold text-xs">2</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                
                <!-- Country -->
                <div>
                    <label for="country_select" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Country
                    </label>
                    <select 
                        name="country" 
                        id="country_select"
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('country') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer"
                    >
                        <option value="">Select Country</option>
                        @php
                            $targetCountry = old('country', isset($enquiry) ? $enquiry->country : '');
                        @endphp
                        @foreach($countries as $country)
                            <option value="{{ $country->name }}" {{ strtolower($targetCountry) === strtolower($country->name) ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('country')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- State -->
                <div>
                    <label for="state_select" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        State / Province
                    </label>
                    <div class="relative">
                        <select 
                            name="state" 
                            id="state_select"
                            class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('state') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer disabled:bg-slate-100 disabled:cursor-not-allowed"
                            {{ (old('country', isset($enquiry) ? $enquiry->country : '')) ? '' : 'disabled' }}
                        >
                            <option value="">{{ (old('country', isset($enquiry) ? $enquiry->country : '')) ? 'Select State' : 'Select Country First' }}</option>
                            @if(old('state', isset($enquiry) && $enquiry->city ? $enquiry->city : ''))
                                <option value="{{ old('state', $enquiry->city) }}" selected>{{ old('state', $enquiry->city) }}</option>
                            @endif
                        </select>
                        <div id="state-spinner" class="absolute right-3 top-1/2 -translate-y-1/2 hidden">
                            <svg class="animate-spin h-4 w-4 text-[#27797D]" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        </div>
                    </div>
                    @error('state')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- City -->
                <div>
                    <label for="city_select" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        City / Town
                    </label>
                    <div class="relative">
                        <select 
                            name="city" 
                            id="city_select"
                            class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('city') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer disabled:bg-slate-100 disabled:cursor-not-allowed"
                            {{ (old('city', isset($enquiry) ? $enquiry->city : '')) ? '' : 'disabled' }}
                        >
                            <option value="">{{ (old('city', isset($enquiry) ? $enquiry->city : '')) ? 'Select City' : 'Select State First' }}</option>
                            @if(old('city', isset($enquiry) && $enquiry->city ? $enquiry->city : ''))
                                <option value="{{ old('city', $enquiry->city) }}" selected>{{ old('city', $enquiry->city) }}</option>
                            @endif
                        </select>
                        <div id="city-spinner" class="absolute right-3 top-1/2 -translate-y-1/2 hidden">
                            <svg class="animate-spin h-4 w-4 text-[#27797D]" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        </div>
                    </div>
                    @error('city')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Full Residential Address / Clinical Notes -->
                <div class="sm:col-span-3">
                    <label for="address" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 flex items-center justify-between">
                        <span>Residential Address / Clinical History</span>
                        @if(isset($enquiry) && $enquiry->problem)
                            <span class="text-[10px] text-[#27797D] font-bold">Prefilled from enquiry problem</span>
                        @endif
                    </label>
                    <textarea 
                        name="address" 
                        id="address" 
                        rows="3" 
                        placeholder="House / Street, Landmark, Postcode or clinical notes..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('address') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >{{ old('address', isset($enquiry) ? ($enquiry->problem ? 'Clinical Problem: ' . $enquiry->problem . ($enquiry->age_or_dob ? " | Age/DOB: " . $enquiry->age_or_dob : "") : '') : '') }}</textarea>
                    @error('address')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

        <!-- CARD 3: Photo Upload -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">Patient Photo</h2>
                    <p class="text-xs text-slate-400">Optional identification picture for the clinical record</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold text-xs">3</span>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-6">
                <!-- Preview Canvas -->
                <div class="relative w-28 h-28 rounded-2xl overflow-hidden bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center shrink-0 shadow-inner group">
                    <img 
                        id="image-preview" 
                        src="" 
                        alt="Photo Preview" 
                        class="w-full h-full object-cover hidden"
                    >
                    <div id="image-placeholder" class="text-center p-3">
                        <svg class="w-8 h-8 text-slate-400 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span class="text-[10px] text-slate-400 font-bold block">No Photo</span>
                    </div>
                </div>

                <!-- File Drop Area -->
                <div class="flex-1 w-full">
                    <label 
                        for="image" 
                        class="flex flex-col items-center justify-center w-full px-6 py-6 border-2 border-slate-200 border-dashed rounded-2xl cursor-pointer bg-slate-50/60 hover:bg-slate-50 hover:border-[#27797D] transition-all"
                    >
                        <svg class="w-8 h-8 text-[#27797D] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                        <span class="text-xs font-bold text-[#112347]">Click to upload or drag & drop patient photo</span>
                        <span class="text-[11px] text-slate-400 mt-1">JPEG, PNG, WEBP, AVIF up to 10MB</span>
                        <input 
                            type="file" 
                            name="image" 
                            id="image" 
                            accept="image/*"
                            class="hidden"
                        >
                    </label>
                    <div id="file-name-display" class="text-xs text-teal-700 font-bold mt-2 hidden flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-teal-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span id="file-name-text"></span>
                    </div>
                    @error('image')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Submit & Actions Footer -->
        <div class="flex items-center justify-end gap-3 pt-2">
            <a 
                href="{{ route('admin.patient.index') }}" 
                class="px-5 py-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 transition-colors"
            >
                Cancel
            </a>
            <button 
                type="submit" 
                class="inline-flex items-center gap-2 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs sm:text-sm font-bold px-7 py-3 rounded-xl shadow-md shadow-[#27797D]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                <span>Save & Register Patient</span>
            </button>
        </div>

    </form>

</div>

@push('scripts')
<script>
    // 1. Image Preview
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const imagePlaceholder = document.getElementById('image-placeholder');
    const fileNameDisplay = document.getElementById('file-name-display');
    const fileNameText = document.getElementById('file-name-text');

    if (imageInput) {
        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    imagePlaceholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);

                fileNameText.textContent = file.name;
                fileNameDisplay.classList.remove('hidden');
            }
        });
    }

    // 2. Cascading Country -> State -> City Dropdowns
    const countrySelect = document.getElementById('country_select');
    const stateSelect = document.getElementById('state_select');
    const citySelect = document.getElementById('city_select');
    const stateSpinner = document.getElementById('state-spinner');
    const citySpinner = document.getElementById('city-spinner');

    if (countrySelect && stateSelect && citySelect) {
        
        countrySelect.addEventListener('change', function () {
            const countryVal = this.value;
            
            // Reset dependent dropdowns
            stateSelect.innerHTML = '<option value="">Select State</option>';
            citySelect.innerHTML = '<option value="">Select State First</option>';
            stateSelect.disabled = true;
            citySelect.disabled = true;

            if (!countryVal) {
                stateSelect.innerHTML = '<option value="">Select Country First</option>';
                return;
            }

            stateSpinner.classList.remove('hidden');

            fetch(`{{ route('admin.patient.get-states') }}?country=${encodeURIComponent(countryVal)}`)
                .then(res => res.json())
                .then(states => {
                    stateSpinner.classList.add('hidden');
                    stateSelect.disabled = false;
                    stateSelect.innerHTML = '<option value="">Select State</option>';
                    states.forEach(state => {
                        const opt = document.createElement('option');
                        opt.value = state.name;
                        opt.textContent = state.name;
                        stateSelect.appendChild(opt);
                    });
                })
                .catch(err => {
                    stateSpinner.classList.add('hidden');
                    console.error('Error fetching states:', err);
                });
        });

        stateSelect.addEventListener('change', function () {
            const stateVal = this.value;

            citySelect.innerHTML = '<option value="">Select City</option>';
            citySelect.disabled = true;

            if (!stateVal) {
                citySelect.innerHTML = '<option value="">Select State First</option>';
                return;
            }

            citySpinner.classList.remove('hidden');

            fetch(`{{ route('admin.patient.get-cities') }}?state=${encodeURIComponent(stateVal)}`)
                .then(res => res.json())
                .then(cities => {
                    citySpinner.classList.add('hidden');
                    citySelect.disabled = false;
                    citySelect.innerHTML = '<option value="">Select City</option>';
                    cities.forEach(city => {
                        const opt = document.createElement('option');
                        opt.value = city.name;
                        opt.textContent = city.name;
                        citySelect.appendChild(opt);
                    });
                })
                .catch(err => {
                    citySpinner.classList.add('hidden');
                    console.error('Error fetching cities:', err);
                });
        });
    }

    // 3. Real-time Duplicate Mobile & Email Check with alert
    const phoneInput = document.getElementById('phone');
    const emailInput = document.getElementById('email');
    const phoneBox = document.getElementById('phone-duplicate-box');
    const phoneText = document.getElementById('phone-duplicate-text');
    const phoneLink = document.getElementById('phone-duplicate-link');
    const phoneSpinner = document.getElementById('phone-checking-spinner');

    const emailBox = document.getElementById('email-duplicate-box');
    const emailText = document.getElementById('email-duplicate-text');
    const emailLink = document.getElementById('email-duplicate-link');
    const emailSpinner = document.getElementById('email-checking-spinner');

    const topAlert = document.getElementById('duplicate-patient-top-alert');
    const topMsg = document.getElementById('duplicate-patient-top-msg');
    const topLink = document.getElementById('duplicate-patient-top-link');

    let debounceTimer = null;

    function checkPatientDuplicate() {
        const phoneVal = phoneInput ? phoneInput.value.trim() : '';
        const emailVal = emailInput ? emailInput.value.trim() : '';

        if (!phoneVal && !emailVal) {
            if (phoneBox) phoneBox.classList.add('hidden');
            if (emailBox) emailBox.classList.add('hidden');
            if (topAlert) topAlert.classList.add('hidden');
            return;
        }

        if (phoneSpinner) phoneSpinner.classList.remove('hidden');
        if (emailSpinner) emailSpinner.classList.remove('hidden');

        fetch(`{{ route('admin.patient.check-exists') }}?phone=${encodeURIComponent(phoneVal)}&email=${encodeURIComponent(emailVal)}`)
            .then(res => res.json())
            .then(data => {
                if (phoneSpinner) phoneSpinner.classList.add('hidden');
                if (emailSpinner) emailSpinner.classList.add('hidden');

                if (data.exists && data.patient) {
                    if (phoneBox && phoneVal) {
                        phoneText.textContent = data.message;
                        phoneLink.href = data.patient.url;
                        phoneBox.classList.remove('hidden');
                    }
                    if (emailBox && emailVal) {
                        emailText.textContent = data.message;
                        emailLink.href = data.patient.url;
                        emailBox.classList.remove('hidden');
                    }
                    if (topAlert) {
                        topMsg.textContent = data.message;
                        topLink.href = data.patient.url;
                        topAlert.classList.remove('hidden');
                    }
                } else {
                    if (phoneBox) phoneBox.classList.add('hidden');
                    if (emailBox) emailBox.classList.add('hidden');
                    if (topAlert) topAlert.classList.add('hidden');
                }
            })
            .catch(err => {
                if (phoneSpinner) phoneSpinner.classList.add('hidden');
                if (emailSpinner) emailSpinner.classList.add('hidden');
            });
    }

    if (phoneInput) {
        phoneInput.addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(checkPatientDuplicate, 400);
        });
        phoneInput.addEventListener('blur', checkPatientDuplicate);
        if (phoneInput.value.trim()) {
            checkPatientDuplicate();
        }
    }

    if (emailInput) {
        emailInput.addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(checkPatientDuplicate, 400);
        });
        emailInput.addEventListener('blur', checkPatientDuplicate);
        if (emailInput.value.trim()) {
            checkPatientDuplicate();
        }
    }
</script>
@endpush
@endsection
