@extends('admin.layouts.app')

@section('title', 'Edit Hospital - ' . $hospital->name)

@push('styles')
<!-- Quill Rich Text Editor CSS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>
    .ql-toolbar.ql-snow {
        border-top-left-radius: 0.875rem;
        border-top-right-radius: 0.875rem;
        border-color: #e2e8f0;
        background: #f8fafc;
        padding: 0.625rem 0.875rem;
    }
    .ql-container.ql-snow {
        border-bottom-left-radius: 0.875rem;
        border-bottom-right-radius: 0.875rem;
        border-color: #e2e8f0;
        background: #ffffff;
        font-family: inherit;
        font-size: 0.875rem;
    }
    .ql-editor {
        min-height: 180px;
        font-size: 0.875rem;
        line-height: 1.6;
        color: #334155;
    }
    .ql-editor.ql-blank::before {
        color: #94a3b8;
        font-style: normal;
        font-size: 0.8125rem;
    }
</style>
@endpush

@section('content')
<div class="space-y-6 max-w-5xl mx-auto">

    <!-- Top Breadcrumb & Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold">
                <a href="{{ route('admin.hospital.index') }}" class="text-[#27797D] hover:underline flex items-center gap-1">
                    &larr; Hospitals Directory
                </a>
                <span class="text-slate-300">&bull;</span>
                <a href="{{ route('admin.hospital.view', $hospital->id) }}" class="text-slate-600 hover:underline">
                    {{ $hospital->name }}
                </a>
                <span class="text-slate-300">&bull;</span>
                <span class="text-slate-400">Edit</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Edit Hospital Details</h1>
            <p class="text-xs text-slate-500 mt-0.5">Update hospital configuration, location mapping, beds capacity, or access password.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <span class="font-mono text-xs font-bold px-3 py-1.5 rounded-xl bg-teal-50 text-[#27797D] border border-teal-200">
                Code: {{ $hospital->code }}
            </span>
            <a 
                href="{{ route('admin.hospital.view', $hospital->id) }}"
                class="px-3.5 py-1.5 text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors"
            >
                View Profile
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <form action="{{ route('admin.hospital.update.submit', $hospital->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="p-4 bg-rose-50 border border-rose-200 rounded-2xl text-xs text-rose-800 space-y-1 font-medium">
                <div class="font-bold flex items-center gap-1.5 text-rose-900">
                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span>Please review and fix the following errors:</span>
                </div>
                <ul class="list-disc list-inside space-y-0.5 pl-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Card 1: Core Hospital Information -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">1. General Information</h2>
                    <p class="text-xs text-slate-400">Hospital name, category classification, and infrastructure capacity</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] font-bold text-sm flex items-center justify-center">
                    🏥
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <!-- Hospital Name -->
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Hospital Name <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name', $hospital->name) }}" 
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <!-- Hospital Category -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Hospital Category <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="hospital_category_id" 
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium cursor-pointer"
                    >
                        <option value="">Select Category</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('hospital_category_id', $hospital->hospital_category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Establish Year -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Establishment Year <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="number" 
                        name="establish_year" 
                        value="{{ old('establish_year', $hospital->establish_year) }}" 
                        min="1800" 
                        max="{{ date('Y') + 1 }}" 
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <!-- Number of Beds -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Total Bed Capacity <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="number" 
                        name="no_of_bed" 
                        value="{{ old('no_of_bed', $hospital->no_of_bed) }}" 
                        min="0" 
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <!-- Status Checkbox -->
                <div class="flex items-center gap-2 pt-6">
                    <input 
                        type="checkbox" 
                        name="status" 
                        id="status" 
                        value="1" 
                        {{ old('status', $hospital->status) ? 'checked' : '' }}
                        class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer"
                    >
                    <label for="status" class="text-xs font-bold text-slate-700 cursor-pointer select-none">
                        Active Hospital in Network
                    </label>
                </div>
            </div>
        </div>

        <!-- Card 2: Location Details -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">2. Geographic Location</h2>
                    <p class="text-xs text-slate-400">Country, State, City, and full street address</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] font-bold text-sm flex items-center justify-center">
                    🗺️
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <!-- Country -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Country <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="country_id" 
                        id="country_id" 
                        required 
                        onchange="loadStates(this.value)"
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium cursor-pointer"
                    >
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id', $hospital->country_id) == $country->id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- State (Dynamic) -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        State / Province <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="state_id" 
                        id="state_id" 
                        required 
                        onchange="loadCities(this.value)"
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium cursor-pointer"
                    >
                        @foreach ($states as $st)
                            <option value="{{ $st->id }}" {{ old('state_id', $hospital->state_id) == $st->id ? 'selected' : '' }}>
                                {{ $st->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- City (Dynamic) -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        City <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="city_id" 
                        id="city_id" 
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium cursor-pointer"
                    >
                        @foreach ($cities as $ct)
                            <option value="{{ $ct->id }}" {{ old('city_id', $hospital->city_id) == $ct->id ? 'selected' : '' }}>
                                {{ $ct->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Full Street Address -->
                <div class="sm:col-span-3">
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Full Street Address / Campus Location <span class="text-rose-500">*</span>
                    </label>
                    <textarea 
                        name="address" 
                        rows="2.5" 
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >{{ old('address', $hospital->address) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Card 3: Contact & Portal Credentials -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">3. Contact & Security Credentials</h2>
                    <p class="text-xs text-slate-400">Direct contact phone, official email, and partner portal login password</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] font-bold text-sm flex items-center justify-center">
                    🔐
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <!-- Contact Phone -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Contact Phone / Hotline <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="contact" 
                        value="{{ old('contact', $hospital->contact) }}" 
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                    <span class="text-[10px] text-slate-400 mt-1 block">Must be unique for hospital communication</span>
                </div>

                <!-- Email (Optional but unique) -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Official Email <span class="text-slate-400 text-[10px] font-normal">(Optional, unique)</span>
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email', $hospital->email) }}" 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <!-- Password (Optional on Edit) -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        New Password <span class="text-slate-400 text-[10px] font-normal">(Leave blank to keep unchanged)</span>
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            name="password" 
                            id="password_edit_input" 
                            minlength="6"
                            placeholder="Enter new password if updating" 
                            class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 pr-10 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                        >
                        <button 
                            type="button" 
                            onclick="togglePasswordVisibility('password_edit_input')"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 cursor-pointer"
                        >
                            👁️
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: About & Clinical Profile Overview -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">4. About & Clinical Overview</h2>
                    <p class="text-xs text-slate-400">Brief summary of medical achievements, accreditations, and specialities</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] font-bold text-sm flex items-center justify-center">
                    📋
                </span>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center justify-between">
                    <span>Hospital Profile & Description</span>
                    <span class="text-[10px] text-teal-700 font-semibold bg-teal-50 px-2 py-0.5 rounded-full border border-teal-200">
                        Rich Text Editor
                    </span>
                </label>
                <!-- Hidden input submitted with the form -->
                <input type="hidden" name="about" id="about_input" value="{{ old('about', $hospital->about) }}">
                
                <!-- Quill Editor Container -->
                <div id="about_editor">
                    {!! old('about', $hospital->about) !!}
                </div>
            </div>
        </div>

        <!-- Submit Actions -->
        <div class="flex items-center justify-between gap-3 pt-4">
            <a 
                href="{{ route('admin.hospital.index') }}" 
                class="px-5 py-2.5 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
            >
                &larr; Back to Directory
            </a>
            <div class="flex items-center gap-3">
                <button 
                    type="submit" 
                    class="inline-flex items-center gap-2 bg-[#27797D] hover:bg-[#1f6063] text-white text-xs sm:text-sm font-bold px-6 py-2.5 rounded-xl shadow-md shadow-[#27797D]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <span>Update Hospital</span>
                </button>
            </div>
        </div>
    </form>

</div>

@push('scripts')
<script>
    function togglePasswordVisibility(inputId) {
        const input = document.getElementById(inputId);
        if (input.type === 'password') {
            input.type = 'text';
        } else {
            input.type = 'password';
        }
    }

    async function loadStates(countryId, selectedStateId = null) {
        const stateSelect = document.getElementById('state_id');
        const citySelect = document.getElementById('city_id');

        stateSelect.innerHTML = '<option value="">Loading states...</option>';
        citySelect.innerHTML = '<option value="">Select State First</option>';

        if (!countryId) {
            stateSelect.innerHTML = '<option value="">Select Country First</option>';
            return;
        }

        try {
            const res = await fetch(`{{ url('/admin/hospital/get-states') }}/${countryId}`);
            const states = await res.json();

            let options = '<option value="">Select State</option>';
            states.forEach(st => {
                const selected = selectedStateId && selectedStateId == st.id ? 'selected' : '';
                options += `<option value="${st.id}" ${selected}>${st.name}</option>`;
            });
            stateSelect.innerHTML = options;

            if (selectedStateId) {
                loadCities(selectedStateId);
            }
        } catch (e) {
            stateSelect.innerHTML = '<option value="">Error loading states</option>';
        }
    }

    async function loadCities(stateId, selectedCityId = null) {
        const citySelect = document.getElementById('city_id');

        citySelect.innerHTML = '<option value="">Loading cities...</option>';

        if (!stateId) {
            citySelect.innerHTML = '<option value="">Select State First</option>';
            return;
        }

        try {
            const res = await fetch(`{{ url('/admin/hospital/get-cities') }}/${stateId}`);
            const cities = await res.json();

            let options = '<option value="">Select City</option>';
            cities.forEach(ct => {
                const selected = selectedCityId && selectedCityId == ct.id ? 'selected' : '';
                options += `<option value="${ct.id}" ${selected}>${ct.name}</option>`;
            });
            citySelect.innerHTML = options;
        } catch (e) {
            citySelect.innerHTML = '<option value="">Error loading cities</option>';
        }
    }
</script>

<!-- Quill Rich Text Editor JS -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quill = new Quill('#about_editor', {
            theme: 'snow',
            placeholder: 'Describe hospital infrastructure, clinical achievements, accreditations (JCI/NABH), emergency facilities, key departments...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'color': [] }, { 'background': [] }],
                    ['blockquote', 'link'],
                    ['clean']
                ]
            }
        });

        const aboutInput = document.getElementById('about_input');

        // Sync Quill content with hidden input
        quill.on('text-change', function () {
            aboutInput.value = quill.getText().trim().length === 0 ? '' : quill.root.innerHTML;
        });

        // Ensure input has HTML content when form submits
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function () {
                aboutInput.value = quill.getText().trim().length === 0 ? '' : quill.root.innerHTML;
            });
        }
    });
</script>
@endpush
@endsection
