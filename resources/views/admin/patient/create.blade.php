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
    <form action="{{ route('admin.patient.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

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
                        value="{{ old('name') }}" 
                        placeholder="e.g. Johnathan Doe" 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('name') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                    @error('name')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Phone / WhatsApp -->
                <div>
                    <label for="phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Phone / WhatsApp Number
                    </label>
                    <input 
                        type="text" 
                        name="phone" 
                        id="phone" 
                        value="{{ old('phone') }}" 
                        placeholder="+91 98765 43210" 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('phone') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                    @error('phone')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Email Address
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        placeholder="patient@example.com" 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('email') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
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
                        @foreach($countries as $country)
                            <option value="{{ $country->name }}" {{ old('country') == $country->name ? 'selected' : '' }}>
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
                            {{ old('country') ? '' : 'disabled' }}
                        >
                            <option value="">{{ old('country') ? 'Select State' : 'Select Country First' }}</option>
                            @if(old('state'))
                                <option value="{{ old('state') }}" selected>{{ old('state') }}</option>
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
                            {{ old('state') ? '' : 'disabled' }}
                        >
                            <option value="">{{ old('state') ? 'Select City' : 'Select State First' }}</option>
                            @if(old('city'))
                                <option value="{{ old('city') }}" selected>{{ old('city') }}</option>
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

                <!-- Full Residential Address -->
                <div class="sm:col-span-3">
                    <label for="address" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Residential Address / Hotel in India
                    </label>
                    <textarea 
                        name="address" 
                        id="address" 
                        rows="3" 
                        placeholder="House / Street, Landmark, Postcode..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('address') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >{{ old('address') }}</textarea>
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
</script>
@endpush
@endsection
