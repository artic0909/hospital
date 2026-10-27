@extends('admin.layouts.app')

@section('title', 'Register New Patient - ' . $hospital->name . ' - Heal Go Fly Admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Navigation -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.hospital.index') }}" class="text-[#27797D] hover:underline">&larr; Hospitals</a>
                <span>&bull;</span>
                <a href="{{ route('admin.hospital.patient.index', $hospital->id) }}" class="text-slate-600 hover:underline">{{ $hospital->name }} Patients</a>
                <span>&bull;</span>
                <span class="text-slate-400">Add Patient</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Register Patient for {{ $hospital->name }}</h1>
            <p class="text-xs text-slate-500 mt-0.5">Create a comprehensive patient health dossier with contact details and optional medical photo.</p>
        </div>

        <div class="flex items-center gap-2">
            <a 
                href="{{ route('admin.hospital.patient.index', $hospital->id) }}" 
                class="px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 text-xs font-bold text-slate-700 transition-colors"
            >
                Cancel
            </a>
        </div>
    </div>

    <!-- Registration Form -->
    <form action="{{ route('admin.hospital.patient.store', $hospital->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
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
                    <h2 class="text-base font-extrabold text-[#112347]">Geographical Location & Address</h2>
                    <p class="text-xs text-slate-400">Country of origin and residential coordinates</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center font-bold text-xs">2</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                
                <!-- Country -->
                <div>
                    <label for="country" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Country
                    </label>
                    <input 
                        list="countries-list" 
                        name="country" 
                        id="country" 
                        value="{{ old('country') }}" 
                        placeholder="Type or select country" 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('country') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                        autocomplete="off"
                    >
                    <datalist id="countries-list">
                        @foreach($countries as $c)
                            <option value="{{ $c->name }}"></option>
                        @endforeach
                    </datalist>
                    @error('country')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- State -->
                <div>
                    <label for="state" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        State / Province
                    </label>
                    <input 
                        list="states-list" 
                        name="state" 
                        id="state" 
                        value="{{ old('state') }}" 
                        placeholder="State or region" 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('state') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                        autocomplete="off"
                    >
                    <datalist id="states-list"></datalist>
                    @error('state')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- City -->
                <div>
                    <label for="city" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        City
                    </label>
                    <input 
                        list="cities-list" 
                        name="city" 
                        id="city" 
                        value="{{ old('city') }}" 
                        placeholder="City" 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('city') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                        autocomplete="off"
                    >
                    <datalist id="cities-list"></datalist>
                    @error('city')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address -->
                <div class="sm:col-span-3">
                    <label for="address" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Detailed Street Address / Landmark
                    </label>
                    <textarea 
                        name="address" 
                        id="address" 
                        rows="2" 
                        placeholder="House / Flat No, Street, Landmark, Postal Code..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border {{ $errors->has('address') ? 'border-rose-400' : 'border-slate-200' }} focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >{{ old('address') }}</textarea>
                    @error('address')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- CARD 3: Photo / Avatar Upload -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">Patient Photo</h2>
                    <p class="text-xs text-slate-400">Supports all image types: JPEG, PNG, JPG, WebP, GIF, SVG, BMP, AVIF, TIFF, HEIC (Max 10MB)</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center font-bold text-xs">3</span>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-6">
                <!-- Image Preview Box -->
                <div class="relative w-28 h-28 sm:w-32 sm:h-32 rounded-3xl overflow-hidden bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center shrink-0 shadow-inner group">
                    <img 
                        id="image-preview" 
                        src="https://ui-avatars.com/api/?name=New+Patient&background=E2E8F0&color=64748B&size=200" 
                        alt="Patient Photo Preview" 
                        class="w-full h-full object-cover"
                    >
                    <button 
                        type="button" 
                        id="remove-preview-btn" 
                        class="hidden absolute top-2 right-2 p-1 rounded-full bg-rose-600 text-white shadow-md hover:bg-rose-700 transition-colors cursor-pointer"
                        title="Remove Preview"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Upload Drag-Drop Box -->
                <div class="flex-1 w-full">
                    <label 
                        for="image" 
                        class="border-2 border-dashed border-slate-200 hover:border-[#27797D] bg-slate-50/50 hover:bg-teal-50/30 rounded-2xl p-5 flex flex-col items-center justify-center text-center cursor-pointer transition-all group"
                    >
                        <div class="w-10 h-10 rounded-xl bg-teal-100 text-[#27797D] flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <span class="text-xs font-bold text-[#112347]">Click to upload or drag & drop patient photo</span>
                        <span class="text-[10px] text-slate-400 mt-0.5">JPEG, PNG, JPG, GIF, SVG, WebP, AVIF, BMP, TIFF up to 10MB</span>
                        <input 
                            type="file" 
                            name="image" 
                            id="image" 
                            accept="image/*,.heic,.heif,.avif,.webp,.svg,.ico,.bmp,.tiff" 
                            class="hidden"
                        >
                    </label>
                    <div id="file-name-label" class="text-[11px] font-semibold text-teal-800 mt-1.5 hidden"></div>
                    @error('image')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Submit & Actions Footer -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <a 
                href="{{ route('admin.hospital.patient.index', $hospital->id) }}" 
                class="px-5 py-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-600 transition-colors"
            >
                Back to Patients
            </a>

            <button 
                type="submit" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-6 py-3 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                <span>Save & Continue to Reports</span>
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // 1. Live Image Preview
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const fileNameLabel = document.getElementById('file-name-label');
    const removePreviewBtn = document.getElementById('remove-preview-btn');
    const defaultPlaceholder = "https://ui-avatars.com/api/?name=New+Patient&background=E2E8F0&color=64748B&size=200";

    if (imageInput) {
        imageInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                const file = this.files[0];
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    removePreviewBtn.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
                fileNameLabel.textContent = `Selected: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
                fileNameLabel.classList.remove('hidden');
            }
        });
    }

    if (removePreviewBtn) {
        removePreviewBtn.addEventListener('click', function () {
            imageInput.value = '';
            imagePreview.src = defaultPlaceholder;
            fileNameLabel.textContent = '';
            fileNameLabel.classList.add('hidden');
            removePreviewBtn.classList.add('hidden');
        });
    }

    // 2. Dynamic Country -> State -> City cascading loader
    const countryInput = document.getElementById('country');
    const stateInput = document.getElementById('state');
    const statesDataList = document.getElementById('states-list');
    const cityInput = document.getElementById('city');
    const citiesDataList = document.getElementById('cities-list');

    if (countryInput) {
        countryInput.addEventListener('change', function () {
            const countryVal = this.value.trim();
            if (!countryVal) return;

            fetch(`{{ route('admin.hospital.patient.get-states', $hospital->id) }}?country=${encodeURIComponent(countryVal)}`)
                .then(res => res.json())
                .then(data => {
                    statesDataList.innerHTML = '';
                    if (data && data.length > 0) {
                        data.forEach(item => {
                            const opt = document.createElement('option');
                            opt.value = item.name;
                            statesDataList.appendChild(opt);
                        });
                    }
                })
                .catch(err => console.error(err));
        });
    }

    if (stateInput) {
        stateInput.addEventListener('change', function () {
            const stateVal = this.value.trim();
            if (!stateVal) return;

            fetch(`{{ route('admin.hospital.patient.get-cities', $hospital->id) }}?state=${encodeURIComponent(stateVal)}`)
                .then(res => res.json())
                .then(data => {
                    citiesDataList.innerHTML = '';
                    if (data && data.length > 0) {
                        data.forEach(item => {
                            const opt = document.createElement('option');
                            opt.value = item.name;
                            citiesDataList.appendChild(opt);
                        });
                    }
                })
                .catch(err => console.error(err));
        });
    }
</script>
@endpush
@endsection
