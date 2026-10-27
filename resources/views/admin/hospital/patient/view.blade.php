@extends('admin.layouts.app')

@section('title', 'Patient Dossier: ' . $patient->name . ' - ' . $hospital->name . ' - Heal Go Fly Admin')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div class="flex items-center gap-4">
            <div class="relative w-16 h-16 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 shrink-0 shadow-xs">
                <img 
                    src="{{ $patient->image_url }}" 
                    alt="{{ $patient->name }}" 
                    class="w-full h-full object-cover"
                    onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($patient->name) }}&background=27797D&color=fff';"
                >
            </div>
            <div>
                <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                    <a href="{{ route('admin.hospital.index') }}" class="text-[#27797D] hover:underline">&larr; Hospitals</a>
                    <span>&bull;</span>
                    <a href="{{ route('admin.hospital.patient.index', $hospital->id) }}" class="text-slate-600 hover:underline">{{ $hospital->name }} Patients</a>
                    <span>&bull;</span>
                    <span class="font-mono text-teal-700 bg-teal-50 px-2 py-0.5 rounded-md font-bold">#PT-{{ str_pad($patient->id, 5, '0', STR_PAD_LEFT) }}</span>
                </div>
                <h1 class="text-2xl font-black text-[#112347] tracking-tight">{{ $patient->name }}</h1>
                <p class="text-xs text-slate-400 mt-0.5">Registered for <strong>{{ $hospital->name }}</strong> on {{ $patient->created_at->format('M d, Y') }} ({{ $patient->created_at->diffForHumans() }})</p>
            </div>
        </div>

        <div class="flex items-center gap-2 flex-wrap">
            <!-- Add Report Button (triggers modal) -->
            <button 
                type="button" 
                onclick="openReportModal()" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Attach Report</span>
            </button>

            <!-- Edit Profile -->
            <a 
                href="{{ route('admin.hospital.patient.update', [$hospital->id, $patient->id]) }}" 
                class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 transition-colors"
            >
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                <span>Edit Profile</span>
            </a>

            <!-- Delete -->
            <button 
                type="button" 
                onclick="confirmDelete('{{ route('admin.hospital.patient.destroy', [$hospital->id, $patient->id]) }}', '{{ addslashes($patient->name) }}')"
                class="p-2.5 rounded-xl text-rose-600 hover:bg-rose-50 border border-rose-200 transition-colors cursor-pointer"
                title="Delete Patient"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </button>
        </div>
    </div>

    <!-- Patient Details Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- CARD 1: Contact Information -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Contact Details</span>
                <div class="w-7 h-7 rounded-lg bg-teal-50 text-[#27797D] flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
            </div>

            <div class="space-y-3 text-xs">
                <div>
                    <span class="text-slate-400 block font-semibold text-[11px] mb-0.5">Phone / Mobile</span>
                    @if($patient->phone)
                        <div class="flex items-center justify-between">
                            <a href="tel:{{ $patient->phone }}" class="font-bold text-[#112347] hover:text-[#27797D] text-sm">
                                {{ $patient->phone }}
                            </a>
                            <a 
                                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $patient->phone) }}" 
                                target="_blank"
                                class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 hover:bg-emerald-100"
                            >
                                <span>WhatsApp</span>
                            </a>
                        </div>
                    @else
                        <span class="text-slate-400 italic">Not provided</span>
                    @endif
                </div>

                <div>
                    <span class="text-slate-400 block font-semibold text-[11px] mb-0.5">Email Address</span>
                    @if($patient->email)
                        <a href="mailto:{{ $patient->email }}" class="font-semibold text-[#27797D] hover:underline break-all">
                            {{ $patient->email }}
                        </a>
                    @else
                        <span class="text-slate-400 italic">Not provided</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- CARD 2: Geographic & Residence -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Location Coordinates</span>
                <div class="w-7 h-7 rounded-lg bg-teal-50 text-[#27797D] flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>

            <div class="space-y-3 text-xs">
                <div>
                    <span class="text-slate-400 block font-semibold text-[11px] mb-0.5">Country & Region</span>
                    <span class="font-bold text-[#112347] text-sm block">
                        {{ $patient->country ?? 'Global / International' }}
                    </span>
                    <span class="text-slate-500 font-medium">
                        {{ implode(', ', array_filter([$patient->city, $patient->state])) ?: 'City/State not specified' }}
                    </span>
                </div>

                <div>
                    <span class="text-slate-400 block font-semibold text-[11px] mb-0.5">Street Address</span>
                    <p class="text-slate-600 font-medium leading-relaxed">
                        {{ $patient->address ?: 'No physical address added.' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- CARD 3: Health Dossier & Summary -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Hospital Assignment</span>
                <div class="w-7 h-7 rounded-lg bg-[#27797D]/10 text-[#27797D] flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
            </div>

            <div class="space-y-3 text-xs">
                <div class="flex items-center justify-between">
                    <span class="text-slate-400 font-semibold text-[11px]">Hospital:</span>
                    <span class="font-bold text-[#112347]">{{ $hospital->name }}</span>
                </div>

                <div class="flex items-center justify-between">
                    <span class="text-slate-400 font-semibold text-[11px]">Total Attached Reports:</span>
                    <span class="font-extrabold text-[#27797D] text-sm">{{ $patient->reports->count() }}</span>
                </div>

                <div class="pt-2 border-t border-slate-100">
                    <a 
                        href="{{ route('admin.hospital.patient.report.index', [$hospital->id, $patient->id]) }}" 
                        class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 rounded-xl bg-slate-50 hover:bg-[#27797D] hover:text-white text-[#27797D] font-bold text-xs transition-colors"
                    >
                        <span>Open Report Management Console &rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Attached Medical Reports Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="text-lg font-black text-[#112347]">Medical & Diagnostic Reports</h2>
                    <span class="px-2 py-0.5 rounded-full text-xs font-extrabold bg-teal-50 text-[#27797D] border border-teal-200/60">
                        {{ $patient->reports->count() }}
                    </span>
                </div>
                <p class="text-xs text-slate-400 mt-0.5">Lab investigations, radiology scans, clinical discharge summaries, and prescriptions.</p>
            </div>

            <button 
                type="button" 
                onclick="openReportModal()" 
                class="inline-flex items-center gap-2 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold px-4 py-2 rounded-xl transition-all shadow-xs cursor-pointer self-start sm:self-auto"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Upload Report</span>
            </button>
        </div>

        <!-- Reports Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-200 text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                        <th class="py-3 px-6">Report Title / Test Name</th>
                        <th class="py-3 px-6">Investigation Date</th>
                        <th class="py-3 px-6">Document Type</th>
                        <th class="py-3 px-6">Uploaded At</th>
                        <th class="py-3 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($patient->reports as $report)
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        
                        <!-- Name -->
                        <td class="py-3.5 px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 {{ $report->isPdf() ? 'bg-rose-50 text-rose-600' : ($report->isImage() ? 'bg-blue-50 text-blue-600' : 'bg-slate-100 text-slate-600') }}">
                                    @if($report->isPdf())
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                    @elseif($report->isImage())
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    @else
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    @endif
                                </div>
                                <div>
                                    <span class="font-bold text-[#112347] text-sm block">{{ $report->name }}</span>
                                    <span class="text-[10px] text-slate-400 font-mono">#REP-{{ str_pad($report->id, 4, '0', STR_PAD_LEFT) }}</span>
                                </div>
                            </div>
                        </td>

                        <!-- Date -->
                        <td class="py-3.5 px-6">
                            <div class="font-semibold text-slate-800">
                                {{ $report->date ? $report->date->format('M d, Y') : 'Date not set' }}
                            </div>
                            @if($report->date)
                            <div class="text-[10px] text-slate-400">{{ $report->date->diffForHumans() }}</div>
                            @endif
                        </td>

                        <!-- Document Type -->
                        <td class="py-3.5 px-6">
                            @if($report->file)
                                <span class="px-2 py-0.5 rounded-md font-mono font-bold text-[10px] uppercase {{ $report->isPdf() ? 'bg-rose-100 text-rose-800' : ($report->isImage() ? 'bg-blue-100 text-blue-800' : 'bg-slate-100 text-slate-700') }}">
                                    {{ $report->extension ?? 'FILE' }}
                                </span>
                            @else
                                <span class="text-slate-400 italic">No document file</span>
                            @endif
                        </td>

                        <!-- Uploaded At -->
                        <td class="py-3.5 px-6 text-slate-500">
                            {{ $report->created_at->format('M d, Y H:i') }}
                        </td>

                        <!-- Actions -->
                        <td class="py-3.5 px-6 text-right">
                            <div class="inline-flex items-center gap-1.5">
                                @if($report->file)
                                <a 
                                    href="{{ route('admin.hospital.patient.report.download', [$hospital->id, $patient->id, $report->id]) }}" 
                                    class="p-2 rounded-lg text-slate-400 hover:text-[#27797D] hover:bg-teal-50 transition-colors"
                                    title="Download File"
                                    download
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </a>
                                @endif

                                <button 
                                    type="button" 
                                    onclick="confirmDeleteReport('{{ route('admin.hospital.patient.report.destroy', [$hospital->id, $patient->id, $report->id]) }}', '{{ addslashes($report->name) }}')"
                                    class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer"
                                    title="Delete Report"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center">
                            <div class="max-w-xs mx-auto space-y-2">
                                <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </div>
                                <h4 class="text-sm font-bold text-slate-700">No Medical Reports Attached</h4>
                                <p class="text-xs text-slate-400">Upload lab reports, scans, or prescriptions for this patient.</p>
                                <button 
                                    type="button" 
                                    onclick="openReportModal()"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#27797D] text-white rounded-lg text-xs font-bold transition-all hover:bg-[#1e5f62] cursor-pointer"
                                >
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                    <span>Attach First Report</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Hidden Form for Single Delete -->
    <form id="single-delete-form" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</div>

<!-- Modal for Adding New Report -->
<div 
    id="report-modal" 
    class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4 hidden"
>
    <div class="bg-white w-full max-w-lg rounded-3xl p-6 sm:p-8 shadow-2xl space-y-6 relative border border-slate-100">
        
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <div>
                <h3 class="text-lg font-black text-[#112347]">Attach Medical Report</h3>
                <p class="text-xs text-slate-400">Add medical record for <strong>{{ $patient->name }}</strong> ({{ $hospital->name }})</p>
            </div>
            <button 
                type="button" 
                onclick="closeReportModal()"
                class="p-2 text-slate-400 hover:text-slate-600 rounded-lg hover:bg-slate-100 transition-colors"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form action="{{ route('admin.hospital.patient.report.store', [$hospital->id, $patient->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Report Name -->
            <div>
                <label for="report_name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    Report Title / Investigation Name <span class="text-rose-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="report_name" 
                    required
                    placeholder="e.g. Complete Blood Count (CBC) / MRI Brain" 
                    class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                >
            </div>

            <!-- Report Date -->
            <div>
                <label for="report_date" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    Investigation Date
                </label>
                <input 
                    type="date" 
                    name="date" 
                    id="report_date" 
                    value="{{ date('Y-m-d') }}"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-4 py-3 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                >
            </div>

            <!-- File Upload -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    Upload Report Document / Image (Optional)
                </label>
                <label 
                    for="report_file" 
                    class="border-2 border-dashed border-slate-200 hover:border-[#27797D] bg-slate-50/50 hover:bg-teal-50/30 rounded-2xl p-4 flex flex-col items-center justify-center text-center cursor-pointer transition-all"
                >
                    <svg class="w-7 h-7 text-[#27797D] mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                    <span class="text-xs font-bold text-slate-700" id="report-file-text">Click to choose report file (PDF, JPG, PNG, DOC)</span>
                    <span class="text-[10px] text-slate-400 mt-0.5">Maximum file size: 25MB</span>
                    <input 
                        type="file" 
                        name="file" 
                        id="report_file" 
                        class="hidden"
                        onchange="document.getElementById('report-file-text').textContent = this.files[0]?.name || 'Click to choose report file'"
                    >
                </label>
            </div>

            <!-- Submit -->
            <div class="pt-3 flex items-center justify-end gap-3">
                <button 
                    type="button" 
                    onclick="closeReportModal()"
                    class="px-4 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-600 transition-colors"
                >
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <span>Save Report</span>
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openReportModal() {
        document.getElementById('report-modal').classList.remove('hidden');
    }

    function closeReportModal() {
        document.getElementById('report-modal').classList.add('hidden');
    }

    function confirmDelete(url, name) {
        Swal.fire({
            title: 'Delete Patient Profile?',
            html: `Are you sure you want to delete <strong>${name}</strong>?<br><span class="text-xs text-rose-500 font-medium">All associated medical records and reports will be permanently deleted.</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, Delete Patient',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            customClass: {
                popup: 'rounded-3xl shadow-2xl border border-slate-100',
                confirmButton: 'font-bold px-5 py-2.5 rounded-xl shadow-md',
                cancelButton: 'font-bold px-5 py-2.5 rounded-xl'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('single-delete-form');
                form.action = url;
                form.submit();
            }
        });
    }

    function confirmDeleteReport(url, name) {
        Swal.fire({
            title: 'Delete Medical Report?',
            html: `Are you sure you want to remove report <strong>${name}</strong>?<br><span class="text-xs text-rose-500 font-medium">The uploaded diagnostic document will be permanently deleted.</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, Delete Report',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            customClass: {
                popup: 'rounded-3xl shadow-2xl border border-slate-100',
                confirmButton: 'font-bold px-5 py-2.5 rounded-xl shadow-md',
                cancelButton: 'font-bold px-5 py-2.5 rounded-xl'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('single-delete-form');
                form.action = url;
                form.submit();
            }
        });
    }
</script>
@endpush
@endsection
