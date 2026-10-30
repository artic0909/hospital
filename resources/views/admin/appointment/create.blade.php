@extends('admin.layouts.app')

@section('title', 'Book New Appointment - Heal Go Fly Admin')

@push('styles')
<!-- TomSelect CSS -->
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.default.min.css" rel="stylesheet">
<style>
    /* Custom TomSelect theme matching HealGoFly design system */
    .ts-wrapper {
        width: 100%;
    }
    .ts-wrapper .ts-control {
        background-color: #f8fafc !important; /* bg-slate-50 */
        border: 1px solid #e2e8f0 !important; /* border-slate-200 */
        border-radius: 0.75rem !important; /* rounded-xl */
        padding: 0.75rem 1rem !important;
        font-size: 0.8125rem !important; /* text-xs */
        font-weight: 600 !important;
        color: #1e293b !important;
        min-height: 46px !important;
        box-shadow: none !important;
        display: flex !important;
        align-items: center !important;
        transition: all 0.2s ease-in-out !important;
    }
    .ts-wrapper.focus .ts-control {
        background-color: #ffffff !important;
        border-color: #27797D !important;
        box-shadow: 0 0 0 3px rgba(39, 121, 125, 0.15) !important;
    }
    .ts-wrapper.has-items .ts-control > input {
        margin: 0 !important;
    }
    .ts-control input {
        font-size: 0.8125rem !important;
        color: #1e293b !important;
        font-weight: 600 !important;
    }
    .ts-control input::placeholder {
        color: #94a3b8 !important;
        font-weight: 500 !important;
    }
    .ts-dropdown {
        border: 1px solid #e2e8f0 !important;
        border-radius: 1rem !important; /* rounded-2xl */
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1) !important;
        padding: 0.375rem !important;
        margin-top: 4px !important;
        background: #ffffff !important;
        z-index: 1000 !important;
    }
    .ts-dropdown .option {
        padding: 0.625rem 0.875rem !important;
        border-radius: 0.5rem !important;
        font-size: 0.8125rem !important;
        font-weight: 600 !important;
        color: #334155 !important;
        cursor: pointer !important;
        transition: all 0.15s ease !important;
    }
    /* Active, hover & selected states with high contrast white text */
    .ts-dropdown .option:hover,
    .ts-dropdown .option.active,
    .ts-dropdown .option.selected,
    .ts-dropdown .option.selected.active {
        background-color: #27797D !important;
        color: #ffffff !important;
    }
    .ts-dropdown .option:hover *,
    .ts-dropdown .option.active *,
    .ts-dropdown .option.selected *,
    .ts-dropdown .option.selected.active * {
        color: #ffffff !important;
    }
    .ts-dropdown .option:hover span,
    .ts-dropdown .option.active span,
    .ts-dropdown .option.selected span,
    .ts-dropdown .option:hover div,
    .ts-dropdown .option.active div,
    .ts-dropdown .option.selected div,
    .ts-dropdown .option:hover p,
    .ts-dropdown .option.active p,
    .ts-dropdown .option.selected p {
        color: #ffffff !important;
    }
    .ts-dropdown .option:hover svg,
    .ts-dropdown .option.active svg,
    .ts-dropdown .option.selected svg {
        stroke: #ffffff !important;
        color: #ffffff !important;
    }
    .ts-dropdown .option:hover [class*="bg-teal"],
    .ts-dropdown .option.active [class*="bg-teal"],
    .ts-dropdown .option.selected [class*="bg-teal"] {
        background-color: rgba(255, 255, 255, 0.22) !important;
        border-color: rgba(255, 255, 255, 0.4) !important;
        color: #ffffff !important;
    }
    .ts-dropdown .optgroup-header {
        font-size: 0.7rem !important;
        font-weight: 800 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        color: #94a3b8 !important;
        padding: 0.5rem 0.875rem 0.25rem !important;
    }
    .ts-wrapper.is-invalid .ts-control {
        border-color: #fb7185 !important;
    }
</style>
@endpush

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Navigation -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.appointment.index') }}" class="text-[#27797D] hover:underline">&larr; Appointments</a>
                <span>&bull;</span>
                <span class="text-slate-400">Book New Appointment</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Book Doctor Consultation</h1>
            <p class="text-xs text-slate-500 mt-0.5">Schedule an in-person or clinical appointment with a particular partner's affiliated doctor.</p>
        </div>

        <div class="flex items-center gap-2">
            <a 
                href="{{ route('admin.appointment.index') }}" 
                class="px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 text-xs font-bold text-slate-700 transition-colors"
            >
                Cancel
            </a>
        </div>
    </div>

    <!-- Appointment Booking Form -->
    <form action="{{ route('admin.appointment.store') }}" method="POST" class="space-y-6">
        @csrf

        @if(!empty($selectedPatient))
        <!-- Pre-selected Patient Notice Banner -->
        <div class="bg-teal-50/90 border border-teal-200/90 p-4 sm:p-5 rounded-3xl flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-xs">
            <div class="flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-2xl bg-[#27797D] text-white flex items-center justify-center font-bold text-base shadow-sm shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2 flex-wrap">
                        <span class="text-xs font-bold uppercase tracking-wider text-teal-700">Pre-Selected Patient</span>
                        <span class="text-[11px] font-mono font-bold px-2 py-0.5 rounded-md bg-teal-100 text-teal-900">#PT-{{ str_pad($selectedPatient->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="text-base font-black text-[#112347]">{{ $selectedPatient->name }}</div>
                    <div class="text-xs text-slate-500 flex flex-wrap items-center gap-x-3 gap-y-1 mt-0.5">
                        @if($selectedPatient->phone)
                            <span>Phone: <strong class="text-slate-700">{{ $selectedPatient->phone }}</strong></span>
                        @endif
                        @if($selectedPatient->email)
                            <span>Email: <strong class="text-slate-700">{{ $selectedPatient->email }}</strong></span>
                        @endif
                        @if($selectedPatient->country)
                            <span>Location: <strong class="text-slate-700">{{ $selectedPatient->city ? $selectedPatient->city . ', ' : '' }}{{ $selectedPatient->country }}</strong></span>
                        @endif
                        @if(!empty($partnerIdToSelect) && !empty($selectedPatient->hospital))
                            <span class="text-[#27797D] font-bold">&bull; Hospital: {{ $selectedPatient->hospital->name }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.appointment.create') }}" class="inline-flex items-center gap-1 text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors whitespace-nowrap self-start sm:self-center">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                <span>Change Patient</span>
            </a>
        </div>
        @endif

        <!-- CARD 1: Patient Selection -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">1. Select Patient</h2>
                    <p class="text-xs text-slate-400">Search registered patient by name, patient code (#PT-...), or phone number</p>
                </div>
                <a 
                    href="{{ route('admin.patient.create') }}" 
                    target="_blank"
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-[#27797D] hover:underline"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>Register New Patient</span>
                </a>
            </div>

            <div class="space-y-2">
                <!-- Patient Dropdown -->
                <label for="patient_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    Patient <span class="text-rose-500">*</span>
                </label>
                <select 
                    name="patient_id" 
                    id="patient_id" 
                    required 
                    placeholder="Search by name, patient code (#PT-00001), or phone number..."
                    class="w-full text-xs font-semibold {{ $errors->has('patient_id') ? 'is-invalid' : '' }}"
                >
                    <option value="">-- Choose Patient (Search name, code, phone) --</option>
                    @foreach($patients as $patient)
                        @php
                            $code = 'PT-' . str_pad($patient->id, 5, '0', STR_PAD_LEFT);
                        @endphp
                        <option 
                            value="{{ $patient->id }}" 
                            data-data='{"name": "{{ addslashes($patient->name) }}", "code": "{{ $code }} #{{ $code }} {{ $patient->id }}", "phone": "{{ $patient->phone }}", "email": "{{ $patient->email }}"}'
                            {{ (old('patient_id', request('patient_id')) == $patient->id) ? 'selected' : '' }}
                        >
                            {{ $patient->name }} (#{{ $code }}) - {{ $patient->phone ?: ($patient->email ?: 'No contact') }}
                        </option>
                    @endforeach
                </select>
                @error('patient_id')
                    <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                @enderror
                <p class="text-[11px] text-slate-400">Tip: Type any part of patient's name, phone number or ID code (e.g. <span class="font-mono text-slate-600">00001</span> or <span class="font-mono text-slate-600">PT-00001</span>).</p>
            </div>
        </div>

        <!-- CARD 2: Partner & Doctor Selection -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">2. Partner & Doctor Selection</h2>
                    <p class="text-xs text-slate-400">Select healthcare partner (optional) and choose an attending doctor</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center font-bold text-xs">2</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                
                <!-- Particular Partner Dropdown -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="partner_select" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            Healthcare Partner / Agency
                        </label>
                        <span id="partner-spinner" class="text-[11px] text-[#27797D] font-bold hidden items-center gap-1">
                            <svg class="animate-spin h-3.5 w-3.5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            <span>Loading doctors...</span>
                        </span>
                    </div>
                    <select 
                        name="partner_id" 
                        id="partner_select" 
                        placeholder="Search partner by name, partner code (#PTR-...), or phone..."
                        class="w-full text-xs font-semibold"
                    >
                        <option value="">-- All Partners / Direct Booking (Optional) --</option>
                        @foreach($partners as $partner)
                            @php
                                $hosp = $partner->hospital ?? $partner->getHospital();
                                $hospName = $hosp?->name ?? '';
                                $hospPhone = $hosp?->contact ?? '';
                                $partnerPhone = $partner->phone ?? '';
                                $partnerCode = 'PTR-' . str_pad($partner->id, 5, '0', STR_PAD_LEFT);
                                $displayName = ($partner->company_name && ($partner->company_name !== $partner->name))
                                    ? $partner->company_name . ' (' . $partner->name . ')'
                                    : ($partner->company_name ?: $partner->name);
                                $primaryPhone = $hospPhone ?: $partnerPhone;
                            @endphp
                            <option 
                                value="{{ $partner->id }}" 
                                data-data='{"name": "{{ addslashes($partner->name) }}", "company": "{{ addslashes($partner->company_name ?? '') }}", "code": "{{ $partnerCode }} #{{ $partnerCode }} {{ $partner->id }}", "hospital": "{{ addslashes($hospName) }}", "hospital_phone": "{{ $hospPhone }}", "phone": "{{ $partnerPhone }}"}'
                                {{ (old('partner_id', $partnerIdToSelect ?? request('partner_id')) == $partner->id) ? 'selected' : '' }}
                            >
                                {{ $displayName }} (#{{ $partnerCode }}) {{ $primaryPhone ? '- ' . $primaryPhone : '' }} {{ $hospName && $hospName !== $displayName ? '[' . $hospName . ']' : '' }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-[11px] text-slate-400 mt-1 block">Selecting a partner dynamically filters their affiliated hospital doctors.</span>
                </div>

                <!-- Doctor Selection -->
                <div>
                    <label for="doctor_select" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Doctor / Consultant <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="doctor_id" 
                        id="doctor_select" 
                        required 
                        placeholder="Search doctor by name, speciality, hospital, or phone..."
                        class="w-full text-xs font-semibold {{ $errors->has('doctor_id') ? 'is-invalid' : '' }}"
                    >
                        <option value="">-- Choose Doctor (Search name, speciality, hospital) --</option>
                        @foreach($allDoctors as $doc)
                            @php
                                $hospName = $doc->hospital->name ?? 'Affiliated Hospital';
                                $hospPhone = $doc->hospital->contact ?? '';
                                $feeStr = $doc->OPD_fee ? '₹' . number_format($doc->OPD_fee) : '';
                            @endphp
                            <option 
                                value="{{ $doc->id }}" 
                                data-data='{"name": "{{ addslashes($doc->name) }}", "speciality": "{{ addslashes($doc->spaciality ?? '') }}", "hospital": "{{ addslashes($hospName) }}", "hospital_phone": "{{ $hospPhone }}", "fee": "{{ $feeStr }}", "hospital_id": {{ $doc->hospital_id ?? 0 }}}'
                                {{ old('doctor_id') == $doc->id ? 'selected' : '' }}
                            >
                                {{ $doc->name }} ({{ $doc->spaciality ?: 'Specialist' }}) - {{ $hospName }} {{ $hospPhone ? '📞 ' . $hospPhone : '' }} {{ $feeStr ? '[' . $feeStr . ']' : '' }}
                            </option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                    <span class="text-[11px] text-slate-400 mt-1 block">Hospital assignment is automatically resolved from the selected doctor.</span>
                </div>

            </div>
        </div>

        <!-- CARD 3: Schedule, Status & Clinical Notes -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">3. Schedule & Status</h2>
                    <p class="text-xs text-slate-400">Appointment timing and patient admission workflow stage</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-orange-50 text-[#EF7415] flex items-center justify-center font-bold text-xs">3</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                
                <!-- Appointment Date -->
                <div>
                    <label for="appointment_date" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Appointment Date <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="date" 
                        name="appointment_date" 
                        id="appointment_date" 
                        required 
                        value="{{ old('appointment_date', now()->toDateString()) }}" 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-800 cursor-pointer"
                    >
                    @error('appointment_date')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Appointment Time / Shift -->
                <div>
                    <label for="appointment_time" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Time / Shift
                    </label>
                    <input 
                        type="text" 
                        name="appointment_time" 
                        id="appointment_time" 
                        placeholder="e.g. 10:30 AM or Morning OPD" 
                        value="{{ old('appointment_time', '10:00 AM') }}" 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >
                    @error('appointment_time')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Status <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="status" 
                        id="status" 
                        required 
                        placeholder="Select status..."
                        class="w-full text-xs font-bold"
                    >
                        <option value="booked" {{ old('status', 'booked') == 'booked' ? 'selected' : '' }}>Booked</option>
                        <option value="received" {{ old('status') == 'received' ? 'selected' : '' }}>Received</option>
                        <option value="treatment" {{ old('status') == 'treatment' ? 'selected' : '' }}>In Treatment</option>
                        <option value="discharge" {{ old('status') == 'discharge' ? 'selected' : '' }}>Discharged</option>
                    </select>
                    @error('status')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Clinical Notes / Reason -->
                <div class="sm:col-span-3">
                    <label for="notes" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Notes / Symptoms / Reason for Visit
                    </label>
                    <textarea 
                        name="notes" 
                        id="notes" 
                        rows="3" 
                        placeholder="Key complaints, expected procedures, emergency requirements..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                    >{{ old('notes') }}</textarea>
                    @error('notes')
                        <span class="text-rose-500 text-[11px] font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

        <!-- Submit & Actions Footer -->
        <div class="flex items-center justify-end gap-3 pt-2">
            <a 
                href="{{ route('admin.appointment.index') }}" 
                class="px-5 py-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 transition-colors"
            >
                Cancel
            </a>
            <button 
                type="submit" 
                class="inline-flex items-center gap-2 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs sm:text-sm font-bold px-7 py-3 rounded-xl shadow-md shadow-[#27797D]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                <span>Confirm Appointment Booking</span>
            </button>
        </div>

    </form>

</div>
@endsection

@push('scripts')
<!-- TomSelect JS -->
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>

<script>
    // Initial data cache for all doctors
    const allDoctorsList = @json($allDoctorsFormatted);

    // 1. Patient TomSelect: Searchable by name, patient code (#PT-...), phone, email
    const patientTomSelect = new TomSelect('#patient_id', {
        create: false,
        maxItems: 1,
        placeholder: '-- Choose Patient (Search name, code, phone) --',
        searchField: ['text', 'name', 'code', 'phone', 'email'],
        render: {
            option: function(data, escape) {
                const codeRaw = data.code ? escape(data.code).split(' ')[0] : '';
                const codeDisplay = codeRaw ? (codeRaw.startsWith('#') ? codeRaw : '#' + codeRaw) : '';
                const name = escape(data.name || data.text);
                const phone = data.phone ? escape(data.phone) : '';
                return `<div class="py-1">
                    <div class="flex items-center justify-between gap-2">
                        <span class="font-bold text-slate-800 text-xs">${name}</span>
                        ${codeDisplay ? `<span class="text-[11px] font-mono px-2 py-0.5 rounded-md bg-teal-50 text-[#27797D] font-bold border border-teal-200/60">${codeDisplay}</span>` : ''}
                    </div>
                    ${phone ? `<div class="text-[11px] text-slate-500 mt-0.5 flex items-center gap-1 font-medium">
                        <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>${phone}</span>
                    </div>` : ''}
                </div>`;
            },
            item: function(data, escape) {
                return `<div class="font-semibold text-slate-800 text-xs">${escape(data.text)}</div>`;
            }
        }
    });

    // 2. Doctor TomSelect: Searchable by doctor name, speciality, hospital, and hospital phone
    const doctorTomSelect = new TomSelect('#doctor_select', {
        create: false,
        maxItems: 1,
        placeholder: '-- Choose Doctor (Search name, speciality, hospital) --',
        searchField: ['text', 'name', 'speciality', 'hospital', 'hospital_phone'],
        render: {
            option: function(data, escape) {
                const name = escape(data.name || data.text);
                const spec = data.speciality ? escape(data.speciality) : 'Specialist';
                const hosp = data.hospital ? escape(data.hospital) : '';
                const hospPhone = data.hospital_phone ? escape(data.hospital_phone) : '';
                const fee = data.fee ? escape(data.fee) : '';
                return `<div class="py-1">
                    <div class="flex items-center justify-between gap-2">
                        <span class="font-bold text-slate-800 text-xs">${name}</span>
                        ${fee ? `<span class="text-[11px] font-bold px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 border border-emerald-200/60">${fee} OPD</span>` : ''}
                    </div>
                    <div class="text-[11px] text-slate-500 mt-1 flex flex-wrap items-center gap-x-2 gap-y-0.5 font-medium">
                        <span>${spec}</span>
                        ${hosp ? `<span class="text-slate-300">&bull;</span><span class="text-[#27797D] font-semibold flex items-center gap-1">
                            <svg class="w-3 h-3 text-[#27797D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <span>${hosp}</span>
                        </span>` : ''}
                        ${hospPhone ? `<span class="text-slate-300">&bull;</span><span class="text-emerald-700 font-semibold flex items-center gap-1">
                            <svg class="w-3 h-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>${hospPhone}</span>
                        </span>` : ''}
                    </div>
                </div>`;
            },
            item: function(data, escape) {
                return `<div class="font-semibold text-slate-800 text-xs">${escape(data.text)}</div>`;
            }
        }
    });

    // 3. Partner TomSelect: Searchable partner agency with partner code & hospital phone
    const partnerTomSelect = new TomSelect('#partner_select', {
        create: false,
        maxItems: 1,
        placeholder: '-- All Partners / Direct Booking (Optional) --',
        searchField: ['text', 'name', 'company', 'code', 'hospital', 'hospital_phone', 'phone'],
        render: {
            option: function(data, escape) {
                const name = escape(data.name || data.text);
                const company = escape(data.company || '');
                const displayName = company && (company !== name) ? `${company} (${name})` : (company || name);
                const codeRaw = data.code ? escape(data.code).split(' ')[0] : '';
                const codeDisplay = codeRaw ? (codeRaw.startsWith('#') ? codeRaw : '#' + codeRaw) : '';
                const hosp = data.hospital ? escape(data.hospital) : '';
                const hospPhone = data.hospital_phone ? escape(data.hospital_phone) : '';
                const directPhone = data.phone ? escape(data.phone) : '';
                const displayPhone = hospPhone || directPhone;

                return `<div class="py-1">
                    <div class="flex items-center justify-between gap-2">
                        <span class="font-bold text-slate-800 text-xs">${displayName}</span>
                        ${codeDisplay ? `<span class="text-[11px] font-mono px-2 py-0.5 rounded-md bg-teal-50 text-[#27797D] font-bold border border-teal-200/60">${codeDisplay}</span>` : ''}
                    </div>
                    <div class="text-[11px] text-slate-500 mt-1 flex flex-wrap items-center gap-x-2 gap-y-0.5 font-medium">
                        ${hosp ? `<span class="text-slate-600 font-semibold flex items-center gap-1">
                            <svg class="w-3 h-3 text-[#27797D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <span>${hosp}</span>
                        </span>` : ''}
                        ${displayPhone ? `${hosp ? `<span class="text-slate-300">&bull;</span>` : ''}<span class="text-emerald-700 font-semibold flex items-center gap-1">
                            <svg class="w-3 h-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>${displayPhone}</span>
                        </span>` : ''}
                    </div>
                </div>`;
            },
            item: function(data, escape) {
                return `<div class="font-semibold text-slate-800 text-xs">${escape(data.text)}</div>`;
            }
        }
    });

    // 4. Status TomSelect: Searchable workflow status
    const statusTomSelect = new TomSelect('#status', {
        create: false,
        maxItems: 1,
        placeholder: 'Select status...'
    });

    // Handle Partner change to dynamically update Doctor list
    const partnerSpinner = document.getElementById('partner-spinner');

    partnerTomSelect.on('change', function(partnerId) {
        if (!partnerId) {
            // Restore all doctors
            const currentSelected = doctorTomSelect.getValue();
            doctorTomSelect.clear();
            doctorTomSelect.clearOptions();
            allDoctorsList.forEach(item => {
                doctorTomSelect.addOption(item);
            });
            doctorTomSelect.refreshOptions(false);
            if (currentSelected) {
                doctorTomSelect.setValue(currentSelected);
            }
            return;
        }

        // Show spinner
        partnerSpinner.classList.remove('hidden');
        partnerSpinner.classList.add('inline-flex');

        fetch(`{{ url('admin/appointment/get-partner-doctors') }}/${partnerId}`)
            .then(res => res.json())
            .then(data => {
                partnerSpinner.classList.add('hidden');
                partnerSpinner.classList.remove('inline-flex');

                doctorTomSelect.clear();
                doctorTomSelect.clearOptions();

                if (data.doctors && data.doctors.length > 0) {
                    data.doctors.forEach(doc => {
                        const feeStr = doc.OPD_fee ? `₹${Number(doc.OPD_fee).toLocaleString()}` : '';
                        doctorTomSelect.addOption({
                            value: String(doc.id),
                            text: doc.label || `${doc.name} (${doc.spaciality || 'Specialist'}) - ${doc.hospital_name || ''}`,
                            name: doc.name,
                            speciality: doc.spaciality || doc.designation || 'Specialist',
                            hospital: doc.hospital_name || '',
                            hospital_phone: doc.hospital_phone || '',
                            fee: feeStr,
                            hospital_id: doc.hospital_id
                        });
                    });
                    doctorTomSelect.refreshOptions(false);

                    // If only 1 doctor is associated with this partner, auto-select them
                    if (data.doctors.length === 1) {
                        doctorTomSelect.setValue(String(data.doctors[0].id));
                    }
                } else {
                    doctorTomSelect.refreshOptions(false);
                }
            })
            .catch(err => {
                partnerSpinner.classList.add('hidden');
                partnerSpinner.classList.remove('inline-flex');
                console.error('Error fetching partner doctors:', err);
            });
    });

    // Auto-select initial patient & partner if passed from patient row or query
    @if(old('patient_id', $selectedPatientId ?? request('patient_id')))
        patientTomSelect.setValue("{{ old('patient_id', $selectedPatientId ?? request('patient_id')) }}");
    @endif
    @if(old('partner_id', $partnerIdToSelect ?? request('partner_id')))
        partnerTomSelect.setValue("{{ old('partner_id', $partnerIdToSelect ?? request('partner_id')) }}");
    @endif
</script>
@endpush
