@extends('admin.layouts.app')

@section('title', 'Add Doctor - ' . $hospital->name)

@push('styles')
<!-- Quill Rich Text Editor CSS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>
    .ql-toolbar.ql-snow {
        border-top-left-radius: 0.875rem;
        border-top-right-radius: 0.875rem;
        border-color: #e2e8f0;
        background: #f8fafc;
        padding: 0.5rem 0.75rem;
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
        min-height: 120px;
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
                    &larr; Hospitals
                </a>
                <span class="text-slate-300">&bull;</span>
                <a href="{{ route('admin.hospital.doctor.index', $hospital->id) }}" class="text-slate-600 hover:underline">
                    {{ $hospital->name }} Doctors
                </a>
                <span class="text-slate-300">&bull;</span>
                <span class="text-slate-400">Add Doctor</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Register Medical Consultant</h1>
            <p class="text-xs text-slate-500 mt-0.5">Add doctor credentials, OPD consultation fee, medical qualifications, and weekly schedules for {{ $hospital->name }}.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <span class="px-3 py-1.5 rounded-xl bg-teal-50 border border-teal-200 text-teal-800 text-xs font-bold flex items-center gap-1.5">
                <span>🏥</span>
                <span>{{ $hospital->name }}</span>
            </span>
        </div>
    </div>

    <!-- Registration Form -->
    <form action="{{ route('admin.hospital.doctor.store', $hospital->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

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

        <!-- Card 1: Core Doctor Profile -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">1. Doctor Profile & Speciality</h2>
                    <p class="text-xs text-slate-400">Doctor's full name, designation, medical speciality, and photo</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] font-bold text-sm flex items-center justify-center">
                    👨‍⚕️
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <!-- Name -->
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Doctor Full Name <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}" 
                        required 
                        placeholder="e.g. Dr. Naresh Trehan, Dr. Ashok Seth..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <!-- Photo -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Doctor Photo <span class="text-slate-400 text-[10px] font-normal">(SVG, PNG, JPG, WebP)</span>
                    </label>
                    <input 
                        type="file" 
                        name="image" 
                        accept="image/*,.svg"
                        class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                    >
                </div>

                <!-- Designation -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Designation / Title <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="designation" 
                        value="{{ old('designation') }}" 
                        required 
                        placeholder="e.g. Chairman & Chief Cardiac Surgeon" 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <!-- Speciality (with datalist for convenience) -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Speciality <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="spaciality" 
                        id="spaciality_input"
                        list="specialities_list"
                        value="{{ old('spaciality') }}" 
                        required 
                        placeholder="e.g. Cardiothoracic Surgeon, Neurosurgeon..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                    <datalist id="specialities_list">
                        @foreach ($specialities as $sp)
                            <option value="{{ $sp->name }}"></option>
                        @endforeach
                    </datalist>
                </div>

                <!-- Experience (Years) -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Years of Experience <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="number" 
                        name="experience" 
                        value="{{ old('experience', 10) }}" 
                        min="0" 
                        required 
                        placeholder="e.g. 18" 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <!-- OPD Fee -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        OPD Consultation Fee (₹) <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 font-bold">₹</span>
                        <input 
                            type="number" 
                            name="OPD_fee" 
                            step="0.01" 
                            value="{{ old('OPD_fee', '1500.00') }}" 
                            min="0" 
                            required 
                            placeholder="e.g. 1500.00" 
                            class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm pl-8 pr-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                        >
                    </div>
                </div>

                <!-- Surgeries (Optional) -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Surgeries Performed <span class="text-slate-400 text-[10px] font-normal">(Optional)</span>
                    </label>
                    <input 
                        type="text" 
                        name="surgeries" 
                        value="{{ old('surgeries') }}" 
                        placeholder="e.g. 5000+ Heart Surgeries" 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <!-- Status -->
                <div class="flex items-center gap-2 pt-6">
                    <input 
                        type="checkbox" 
                        name="status" 
                        id="status" 
                        value="1" 
                        {{ old('status', '1') ? 'checked' : '' }}
                        class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer"
                    >
                    <label for="status" class="text-xs font-bold text-slate-700 cursor-pointer select-none">
                        Active Doctor in Hospital
                    </label>
                </div>
            </div>
        </div>

        <!-- Card 2: Weekly OPD Consultation Schedules -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">2. Weekly OPD Consultation Schedules</h2>
                    <p class="text-xs text-slate-400">Specify consultation days (Monday to Sunday) and timing slots</p>
                </div>
                <div class="flex items-center gap-2">
                    <button 
                        type="button" 
                        onclick="applyDefaultSchedule()"
                        class="text-[11px] font-bold text-[#27797D] hover:underline cursor-pointer"
                    >
                        + Mon-Fri Default Slot
                    </button>
                    <button 
                        type="button" 
                        onclick="addScheduleRow()"
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-teal-50 hover:bg-teal-100 text-[#27797D] border border-teal-200 text-xs font-bold transition-colors cursor-pointer"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        <span>Add Day Slot</span>
                    </button>
                </div>
            </div>

            <!-- Schedules Table Container -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-100 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                            <th class="py-2.5 px-3 w-48">Day of Week</th>
                            <th class="py-2.5 px-3">Start Time (From)</th>
                            <th class="py-2.5 px-3">End Time (To)</th>
                            <th class="py-2.5 px-3 text-right w-16">Action</th>
                        </tr>
                    </thead>
                    <tbody id="schedules_container" class="divide-y divide-slate-100">
                        <!-- Default Row 1 -->
                        <tr class="schedule-row">
                            <td class="py-2.5 px-3">
                                <select name="schedules[0][day]" class="w-full bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 font-bold text-slate-700 cursor-pointer">
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </td>
                            <td class="py-2.5 px-3">
                                <input 
                                    type="text" 
                                    name="schedules[0][time_from]" 
                                    value="09:00 AM" 
                                    placeholder="e.g. 09:00 AM" 
                                    class="w-full bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 font-medium"
                                >
                            </td>
                            <td class="py-2.5 px-3">
                                <input 
                                    type="text" 
                                    name="schedules[0][time_to]" 
                                    value="01:00 PM" 
                                    placeholder="e.g. 01:00 PM" 
                                    class="w-full bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 font-medium"
                                >
                            </td>
                            <td class="py-2.5 px-3 text-right">
                                <button type="button" onclick="removeScheduleRow(this)" class="p-1.5 text-slate-400 hover:text-rose-500 rounded-lg transition-colors cursor-pointer" title="Remove Slot">
                                    &times;
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card 3: Education, Awards & Experience -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">3. Qualifications & Clinical Experience</h2>
                    <p class="text-xs text-slate-400">Degrees, fellowships, recognitions, and former institutional practice</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] font-bold text-sm flex items-center justify-center">
                    🎓
                </span>
            </div>

            <!-- Education -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center justify-between">
                    <span>Education & Medical Degrees <span class="text-rose-500">*</span></span>
                    <span class="text-[10px] text-teal-700 font-semibold bg-teal-50 px-2 py-0.5 rounded-full border border-teal-200">Rich Text</span>
                </label>
                <input type="hidden" name="education" id="education_input" value="{{ old('education') }}">
                <div id="education_editor">
                    {!! old('education', '<p>MBBS, MD - General Medicine, DM - Cardiology</p>') !!}
                </div>
            </div>

            <!-- Awards -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center justify-between">
                    <span>Awards, Honors & Accolades <span class="text-slate-400 text-[10px] font-normal">(Optional)</span></span>
                    <span class="text-[10px] text-teal-700 font-semibold bg-teal-50 px-2 py-0.5 rounded-full border border-teal-200">Rich Text</span>
                </label>
                <input type="hidden" name="awards" id="awards_input" value="{{ old('awards') }}">
                <div id="awards_editor">
                    {!! old('awards') !!}
                </div>
            </div>

            <!-- Work Experience -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5 flex items-center justify-between">
                    <span>Work Experience & Former Affiliations <span class="text-slate-400 text-[10px] font-normal">(Optional)</span></span>
                    <span class="text-[10px] text-teal-700 font-semibold bg-teal-50 px-2 py-0.5 rounded-full border border-teal-200">Rich Text</span>
                </label>
                <input type="hidden" name="work_experiance" id="work_experiance_input" value="{{ old('work_experiance') }}">
                <div id="work_experiance_editor">
                    {!! old('work_experiance') !!}
                </div>
            </div>
        </div>

        <!-- Submit Actions -->
        <div class="flex items-center justify-end gap-3 pt-4">
            <a 
                href="{{ route('admin.hospital.doctor.index', $hospital->id) }}" 
                class="px-5 py-2.5 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
            >
                Cancel
            </a>
            <button 
                type="submit" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-6 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                <span>Save Doctor & Schedule</span>
            </button>
        </div>
    </form>

</div>

@push('scripts')
<!-- Quill Rich Text Editor JS -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    // Quill Rich Editors
    let eduQuill, awardsQuill, workQuill;
    
    document.addEventListener('DOMContentLoaded', function () {
        const toolbarOptions = [
            [{ 'header': [2, 3, false] }],
            ['bold', 'italic', 'underline'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['link', 'clean']
        ];

        eduQuill = new Quill('#education_editor', {
            theme: 'snow',
            placeholder: 'MBBS, MD, MS, MCh, Fellowships...',
            modules: { toolbar: toolbarOptions }
        });

        awardsQuill = new Quill('#awards_editor', {
            theme: 'snow',
            placeholder: 'Padma Shri, Best Doctor Award, Research fellowships...',
            modules: { toolbar: toolbarOptions }
        });

        workQuill = new Quill('#work_experiance_editor', {
            theme: 'snow',
            placeholder: 'Former Director at AIIMS, Head of Cardiology...',
            modules: { toolbar: toolbarOptions }
        });

        // Form Submit Sync
        document.querySelector('form').addEventListener('submit', function () {
            document.getElementById('education_input').value = eduQuill.getText().trim().length === 0 ? '' : eduQuill.root.innerHTML;
            document.getElementById('awards_input').value = awardsQuill.getText().trim().length === 0 ? '' : awardsQuill.root.innerHTML;
            document.getElementById('work_experiance_input').value = workQuill.getText().trim().length === 0 ? '' : workQuill.root.innerHTML;
        });
    });

    // Schedule Row Logic
    let scheduleIndex = 1;

    function addScheduleRow(day = 'Monday', from = '09:00 AM', to = '01:00 PM') {
        const container = document.getElementById('schedules_container');
        const tr = document.createElement('tr');
        tr.className = 'schedule-row';
        tr.innerHTML = `
            <td class="py-2.5 px-3">
                <select name="schedules[${scheduleIndex}][day]" class="w-full bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 font-bold text-slate-700 cursor-pointer">
                    <option value="Monday" ${day === 'Monday' ? 'selected' : ''}>Monday</option>
                    <option value="Tuesday" ${day === 'Tuesday' ? 'selected' : ''}>Tuesday</option>
                    <option value="Wednesday" ${day === 'Wednesday' ? 'selected' : ''}>Wednesday</option>
                    <option value="Thursday" ${day === 'Thursday' ? 'selected' : ''}>Thursday</option>
                    <option value="Friday" ${day === 'Friday' ? 'selected' : ''}>Friday</option>
                    <option value="Saturday" ${day === 'Saturday' ? 'selected' : ''}>Saturday</option>
                    <option value="Sunday" ${day === 'Sunday' ? 'selected' : ''}>Sunday</option>
                </select>
            </td>
            <td class="py-2.5 px-3">
                <input 
                    type="text" 
                    name="schedules[${scheduleIndex}][time_from]" 
                    value="${from}" 
                    placeholder="e.g. 09:00 AM" 
                    class="w-full bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 font-medium"
                >
            </td>
            <td class="py-2.5 px-3">
                <input 
                    type="text" 
                    name="schedules[${scheduleIndex}][time_to]" 
                    value="${to}" 
                    placeholder="e.g. 01:00 PM" 
                    class="w-full bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 font-medium"
                >
            </td>
            <td class="py-2.5 px-3 text-right">
                <button type="button" onclick="removeScheduleRow(this)" class="p-1.5 text-slate-400 hover:text-rose-500 rounded-lg transition-colors cursor-pointer" title="Remove Slot">
                    &times;
                </button>
            </td>
        `;
        container.appendChild(tr);
        scheduleIndex++;
    }

    function removeScheduleRow(btn) {
        const rows = document.querySelectorAll('.schedule-row');
        if (rows.length > 1) {
            btn.closest('tr').remove();
        } else {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'info',
                title: 'At least one schedule row is recommended',
                timer: 2000,
                showConfirmButton: false
            });
        }
    }

    function applyDefaultSchedule() {
        const container = document.getElementById('schedules_container');
        container.innerHTML = '';
        scheduleIndex = 0;
        const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        days.forEach(day => {
            addScheduleRow(day, '09:00 AM', '05:00 PM');
        });
    }
</script>
@endpush
@endsection
