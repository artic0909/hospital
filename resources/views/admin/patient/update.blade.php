@extends('admin.layouts.app')

@section('title', 'Edit Patient: ' . $patient->name . ' - Heal Go Fly Admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Navigation -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.patient.index') }}" class="text-[#27797D] hover:underline">&larr; Patients Directory</a>
                <span>&bull;</span>
                <a href="{{ route('admin.patient.view', $patient->id) }}" class="text-slate-600 hover:underline">Profile</a>
                <span>&bull;</span>
                <span class="text-slate-400">Edit</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Edit Patient Profile</h1>
            <p class="text-xs text-slate-500 mt-0.5">Modify information for <strong>{{ $patient->name }}</strong> (#PT-{{ str_pad($patient->id, 5, '0', STR_PAD_LEFT) }}).</p>
        </div>

        <div class="flex items-center gap-2">
            <a 
                href="{{ route('admin.patient.view', $patient->id) }}" 
                class="px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 text-xs font-bold text-slate-700 transition-colors"
            >
                View Profile
            </a>
        </div>
    </div>

    <!-- Update Form -->
    <form action="{{ route('admin.patient.update.submit', $patient->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Hidden flag for image deletion -->
        <input type="hidden" name="remove_image" id="remove_image" value="0">

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
                        value="{{ old('name', $patient->name) }}" 
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
                        value="{{ old('phone', $patient->phone) }}" 
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
                        value="{{ old('email', $patient->email) }}" 
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
                            <option value="{{ $country->name }}" {{ old('country', $patient->country) == $country->name ? 'selected' : '' }}>
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
                            {{ (old('country', $patient->country)) ? '' : 'disabled' }}
                        >
                            <option value="">Select State</option>
                            @foreach($states as $st)
                                <option value="{{ $st->name }}" {{ old('state', $patient->state) == $st->name ? 'selected' : '' }}>
                                    {{ $st->name }}
                                </option>
                            @endforeach
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
                            {{ (old('state', $patient->state)) ? '' : 'disabled' }}
                        >
                            <option value="">Select City</option>
                            @foreach($cities as $ct)
                                <option value="{{ $ct->name }}" {{ old('city', $patient->city) == $ct->name ? 'selected' : '' }}>
                                    {{ $ct->name }}
                                </option>
                            @endforeach
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
                    >{{ old('address', $patient->address) }}</textarea>
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
                    <p class="text-xs text-slate-400">Update identification picture or remove current image</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold text-xs">3</span>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-6">
                <!-- Current / Preview Canvas -->
                <div class="relative w-28 h-28 rounded-2xl overflow-hidden bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center shrink-0 shadow-inner group">
                    <img 
                        id="image-preview" 
                        src="{{ $patient->image ? asset($patient->image) : '' }}" 
                        alt="{{ $patient->name }}" 
                        class="w-full h-full object-cover {{ $patient->image ? '' : 'hidden' }}"
                    >
                    <div id="image-placeholder" class="text-center p-3 {{ $patient->image ? 'hidden' : '' }}">
                        <svg class="w-8 h-8 text-slate-400 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span class="text-[10px] text-slate-400 font-bold block">No Photo</span>
                    </div>

                    @if($patient->image)
                    <button 
                        type="button" 
                        id="remove-current-image-btn"
                        class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center text-white text-[11px] font-bold gap-1 cursor-pointer"
                        title="Remove current image"
                    >
                        <svg class="w-5 h-5 text-rose-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        <span>Remove</span>
                    </button>
                    @endif
                </div>

                <!-- File Drop Area -->
                <div class="flex-1 w-full">
                    <label 
                        for="image" 
                        class="flex flex-col items-center justify-center w-full px-6 py-6 border-2 border-slate-200 border-dashed rounded-2xl cursor-pointer bg-slate-50/60 hover:bg-slate-50 hover:border-[#27797D] transition-all"
                    >
                        <svg class="w-8 h-8 text-[#27797D] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                        <span class="text-xs font-bold text-[#112347]">Click to upload or drag new patient photo</span>
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
                href="{{ route('admin.patient.view', $patient->id) }}" 
                class="px-5 py-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 transition-colors"
            >
                Cancel
            </a>
            <button 
                type="submit" 
                class="inline-flex items-center gap-2 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs sm:text-sm font-bold px-7 py-3 rounded-xl shadow-md shadow-[#27797D]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                <span>Save Changes</span>
            </button>
        </div>

    </form>

</div>

@push('scripts')
<script>
    // 1. Image Preview & Remove Current Image
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const imagePlaceholder = document.getElementById('image-placeholder');
    const fileNameDisplay = document.getElementById('file-name-display');
    const fileNameText = document.getElementById('file-name-text');
    const removeImageInput = document.getElementById('remove_image');
    const removeCurrentImageBtn = document.getElementById('remove-current-image-btn');

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
                if (removeImageInput) removeImageInput.value = '0';
            }
        });
    }

    if (removeCurrentImageBtn) {
        removeCurrentImageBtn.addEventListener('click', function () {
            if (confirm('Are you sure you want to remove this patient photo?')) {
                removeImageInput.value = '1';
                imagePreview.src = '';
                imagePreview.classList.add('hidden');
                imagePlaceholder.classList.remove('hidden');
                removeCurrentImageBtn.classList.add('hidden');
                if (imageInput) imageInput.value = '';
                fileNameDisplay.classList.add('hidden');
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
