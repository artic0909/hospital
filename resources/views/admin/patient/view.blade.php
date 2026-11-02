@extends('admin.layouts.app')

@section('title', 'Patient Dossier: ' . $patient->name . ' - Heal Go Fly Admin')

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
                    <a href="{{ route('admin.patient.index') }}" class="text-[#27797D] hover:underline">&larr; Patients Directory</a>
                    <span>&bull;</span>
                    <span class="font-mono text-teal-700 bg-teal-50 px-2 py-0.5 rounded-md font-bold">#PT-{{ str_pad($patient->id, 5, '0', STR_PAD_LEFT) }}</span>
                </div>
                <h1 class="text-2xl font-black text-[#112347] tracking-tight">{{ $patient->name }}</h1>
                <p class="text-xs text-slate-400 mt-0.5">Registered on {{ $patient->created_at->format('M d, Y') }} ({{ $patient->created_at->diffForHumans() }})</p>
            </div>
        </div>

        <div class="flex items-center gap-2 flex-wrap">
            <!-- Appointment Booking -->
            <a 
                href="{{ route('admin.appointment.create', ['patient_id' => $patient->id]) }}" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span>Appointment Booking</span>
            </a>

            <!-- Add Report Button (triggers modal) -->
            <button 
                type="button" 
                onclick="openReportModal()" 
                class="inline-flex items-center gap-2 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#27797D]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Attach Report</span>
            </button>

            <!-- Edit Profile -->
            <a 
                href="{{ route('admin.patient.update', $patient->id) }}" 
                class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 transition-colors"
            >
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                <span>Edit Profile</span>
            </a>

            <!-- Delete -->
            <button 
                type="button" 
                onclick="confirmDelete('{{ route('admin.patient.destroy', $patient->id) }}', '{{ addslashes($patient->name) }}')"
                class="p-2.5 rounded-xl text-rose-600 hover:bg-rose-50 border border-rose-200 transition-colors cursor-pointer"
                title="Delete Patient"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </button>
        </div>
    </div>

    <!-- Main 2-Column Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <!-- LEFT COLUMN: Patient Info & Quick Contact Card (4 cols) -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Quick Contacts Card -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
                <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Direct Contact</h3>
                
                <div class="space-y-4 text-xs">
                    
                    <!-- Phone -->
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div class="flex-1 truncate">
                            <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Phone / WhatsApp</span>
                            @if($patient->phone)
                                <a href="tel:{{ $patient->phone }}" class="font-bold text-[#112347] hover:text-[#27797D] text-sm">
                                    {{ $patient->phone }}
                                </a>
                                <a 
                                    href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $patient->phone) }}" 
                                    target="_blank" 
                                    class="inline-flex items-center gap-1 text-[11px] text-emerald-600 font-bold mt-0.5 hover:underline"
                                >
                                    <span>WhatsApp Chat</span>
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.199.534 1.286.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.302c-.087.087-.179.182-.077.357.101.174.45 0.742.965 1.201.664.591 1.224.774 1.397.86.173.087.275.072.376-.043.101-.116.433-.506.549-.679.116-.173.231-.144.39-.087s1.011.477 1.184.564.289.13.332.202c.044.072.044.419-.1 0.824z"/></svg>
                                </a>
                            @else
                                <span class="text-slate-400 italic">Not provided</span>
                            @endif
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-blue-50 text-[#1D4B6C] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div class="flex-1 truncate">
                            <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Email</span>
                            @if($patient->email)
                                <a href="mailto:{{ $patient->email }}" class="font-semibold text-[#27797D] hover:underline break-all">
                                    {{ $patient->email }}
                                </a>
                            @else
                                <span class="text-slate-400 italic">Not provided</span>
                            @endif
                        </div>
                    </div>

                    <!-- Geographic Location -->
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Origin Location</span>
                            <div class="font-bold text-[#112347]">
                                {{ $patient->country ?? 'Global / International' }}
                            </div>
                            <div class="text-slate-500 text-[11px]">
                                {{ implode(', ', array_filter([$patient->city, $patient->state])) ?: 'City/State not specified' }}
                            </div>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="pt-2 border-t border-slate-100">
                        <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider mb-1">Local Address</span>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            {{ $patient->address ?: 'No physical address added.' }}
                        </p>
                    </div>

                </div>
            </div>

            <!-- Health Summary / Stats Badge -->
            <div class="bg-gradient-to-br from-[#1D4B6C] to-[#27797D] p-6 rounded-3xl text-white shadow-lg shadow-[#1D4B6C]/10 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] uppercase font-bold tracking-widest text-teal-200">Patient Case Status</span>
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                </div>
                <div class="text-lg font-black tracking-tight">
                    Active Clinical Record
                </div>
                <p class="text-xs text-teal-100/90 leading-relaxed">
                    Patient dossier is active and accessible for clinical evaluations, specialist opinions, and urgent medical visa applications.
                </p>
                <div class="pt-3 border-t border-white/10 flex items-center justify-between text-xs">
                    <span class="text-teal-200">Attached Reports:</span>
                    <span class="font-extrabold text-white text-sm">{{ $patient->reports->count() }}</span>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN: Attached Medical Diagnostic Reports (8 cols) -->
        <div class="lg:col-span-8 space-y-6">
            
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
                
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-slate-100 pb-4">
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 class="text-lg font-black text-[#112347]">Medical Reports & Diagnostic Scans</h2>
                            <span class="px-2 py-0.5 rounded-full text-xs font-bold bg-teal-50 text-[#27797D]">
                                {{ $patient->reports->count() }}
                            </span>
                        </div>
                        <p class="text-xs text-slate-400 mt-0.5">Lab test results, scans, MRI, prescription slips, and specialist clinical summaries</p>
                    </div>

                    <div class="flex items-center gap-2">
                        <a 
                            href="{{ route('admin.patient.report.index', $patient->id) }}" 
                            class="px-3 py-1.5 rounded-xl border border-slate-200 hover:bg-slate-50 text-xs font-bold text-slate-600 transition-colors"
                        >
                            Manage Reports
                        </a>
                        <button 
                            type="button" 
                            onclick="openReportModal()"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#27797D] hover:bg-[#1e5f62] text-white rounded-xl text-xs font-bold shadow-xs transition-colors cursor-pointer"
                        >
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                            <span>Upload Report</span>
                        </button>
                    </div>
                </div>

                <!-- Reports Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @forelse($patient->reports as $report)
                    <div class="p-4 rounded-2xl border border-slate-200/80 hover:border-teal-300 hover:shadow-xs transition-all bg-slate-50/40 flex flex-col justify-between group">
                        
                        <div class="flex items-start gap-3">
                            <!-- File Icon -->
                            <div class="w-10 h-10 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0 font-bold text-xs uppercase">
                                @php
                                    $ext = $report->file ? strtolower(pathinfo($report->file, PATHINFO_EXTENSION)) : 'doc';
                                @endphp
                                @if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp']))
                                    <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                @elseif($ext === 'pdf')
                                    <span class="text-rose-600 font-extrabold text-[10px]">PDF</span>
                                @else
                                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                @endif
                            </div>

                            <div class="truncate flex-1">
                                <h4 class="font-bold text-xs text-[#112347] truncate group-hover:text-[#27797D] transition-colors" title="{{ $report->name }}">
                                    {{ $report->name }}
                                </h4>
                                <div class="flex items-center gap-2 text-[10px] text-slate-400 mt-0.5">
                                    <span>Date: {{ $report->date ? \Carbon\Carbon::parse($report->date)->format('M d, Y') : 'N/A' }}</span>
                                    <span>&bull;</span>
                                    <span>Added {{ $report->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Action Buttons -->
                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                            @if($report->file)
                                <a 
                                    href="{{ route('admin.patient.report.download', [$patient->id, $report->id]) }}" 
                                    class="inline-flex items-center gap-1.5 text-xs font-bold text-[#27797D] hover:underline"
                                >
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    <span>Download File</span>
                                </a>
                            @else
                                <span class="text-[11px] text-slate-400 italic">No document file</span>
                            @endif

                            <button 
                                type="button" 
                                onclick="confirmDeleteReport('{{ route('admin.patient.report.destroy', [$patient->id, $report->id]) }}', '{{ addslashes($report->name) }}')"
                                class="text-slate-400 hover:text-rose-600 transition-colors p-1"
                                title="Delete Report"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>

                    </div>
                    @empty
                    <div class="sm:col-span-2 py-10 text-center bg-slate-50/50 rounded-2xl border border-dashed border-slate-200">
                        <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <h4 class="text-xs font-bold text-slate-700">No medical reports uploaded yet</h4>
                        <p class="text-xs text-slate-400">Upload lab reports, scans, or prescriptions for this patient.</p>
                        <button 
                            type="button" 
                            onclick="openReportModal()"
                            class="inline-flex items-center gap-1.5 mt-3 px-3.5 py-1.5 bg-[#EF7415] hover:bg-[#d9640d] text-white rounded-xl text-xs font-bold transition-all shadow-xs cursor-pointer"
                        >
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                            <span>Attach Report</span>
                        </button>
                    </div>
                    @endforelse
                </div>

            </div>

        </div>

    </div>

    <!-- Hidden Form for Deletions -->
    <form id="single-delete-form" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</div>

<!-- ATTACH REPORT MODAL -->
<div 
    id="report-modal" 
    class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4 transition-all"
>
    <div class="bg-white w-full max-w-lg rounded-3xl shadow-2xl border border-slate-100 overflow-hidden transform transition-all scale-95 opacity-0 duration-200" id="report-modal-content">
        
        <!-- Modal Header -->
        <div class="px-6 py-5 bg-gradient-to-r from-[#1D4B6C] to-[#27797D] text-white flex items-center justify-between">
            <div>
                <h3 class="text-base font-bold tracking-tight">Attach Medical Diagnostic Report</h3>
                <p class="text-xs text-teal-100">Add medical record for <strong>{{ $patient->name }}</strong></p>
            </div>
            <button 
                type="button" 
                onclick="closeReportModal()" 
                class="p-1 rounded-lg text-teal-200 hover:text-white hover:bg-white/10 transition-colors"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Modal Body Form -->
        <form action="{{ route('admin.patient.report.store', $patient->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf

            <!-- Report Name / Test Title -->
            <div>
                <label for="modal-report-name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    Report Title / Investigation Name <span class="text-rose-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="modal-report-name" 
                    required 
                    placeholder="e.g. Brain MRI Scan with Contrast" 
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-800"
                >
            </div>

            <!-- Investigation Date -->
            <div>
                <label for="modal-report-date" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    Report / Scan Date
                </label>
                <input 
                    type="date" 
                    name="date" 
                    id="modal-report-date" 
                    value="{{ now()->toDateString() }}" 
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700"
                >
            </div>

            <!-- File Upload -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    Document File <span class="text-gray-400 font-normal lowercase">(PDF, Scans, Images, DOCX up to 25MB)</span>
                </label>
                <label 
                    for="modal-report-file" 
                    class="flex flex-col items-center justify-center w-full px-4 py-5 border-2 border-slate-200 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 hover:border-[#27797D] transition-all"
                >
                    <svg class="w-6 h-6 text-[#27797D] mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                    <span class="text-xs font-bold text-slate-700">Choose file or drag & drop</span>
                    <input 
                        type="file" 
                        name="file" 
                        id="modal-report-file" 
                        class="hidden"
                    >
                </label>
                <div id="modal-file-selected" class="text-xs text-teal-700 font-bold mt-1.5 hidden flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-teal-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span id="modal-file-name"></span>
                </div>
            </div>

            <!-- Modal Action Buttons -->
            <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2">
                <button 
                    type="button" 
                    onclick="closeReportModal()" 
                    class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 text-xs font-bold hover:bg-slate-100 transition-colors"
                >
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="px-5 py-2 rounded-xl bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold shadow-xs transition-colors cursor-pointer"
                >
                    Upload Report
                </button>
            </div>
        </form>

    </div>
</div>

@push('scripts')
<script>
    // 1. Modal Toggle
    const reportModal = document.getElementById('report-modal');
    const reportModalContent = document.getElementById('report-modal-content');
    const modalFileInput = document.getElementById('modal-report-file');
    const modalFileSelected = document.getElementById('modal-file-selected');
    const modalFileName = document.getElementById('modal-file-name');

    function openReportModal() {
        reportModal.classList.remove('hidden');
        reportModal.classList.add('flex');
        setTimeout(() => {
            reportModalContent.classList.remove('scale-95', 'opacity-0');
            reportModalContent.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeReportModal() {
        reportModalContent.classList.remove('scale-100', 'opacity-100');
        reportModalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            reportModal.classList.add('hidden');
            reportModal.classList.remove('flex');
        }, 150);
    }

    if (modalFileInput) {
        modalFileInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                modalFileName.textContent = this.files[0].name;
                modalFileSelected.classList.remove('hidden');
            }
        });
    }

    // 2. Delete Confirmations
    function confirmDelete(url, name) {
        Swal.fire({
            title: 'Delete Patient Profile?',
            html: `Are you sure you want to delete <strong>${name}</strong>?<br><span class="text-xs text-rose-500 font-medium">All attached medical reports and history will be permanently deleted.</span>`,
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
            html: `Are you sure you want to delete report <strong>${name}</strong>?`,
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
