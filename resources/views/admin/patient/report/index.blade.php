@extends('admin.layouts.app')

@section('title', 'Medical Reports: ' . $patient->name . ' - Heal Go Fly Admin')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div class="flex items-center gap-4">
            <div class="relative w-14 h-14 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 shrink-0">
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
                    <a href="{{ route('admin.patient.view', $patient->id) }}" class="text-slate-600 hover:underline">{{ $patient->name }}</a>
                    <span>&bull;</span>
                    <span class="text-slate-400">Diagnostic Reports</span>
                </div>
                <h1 class="text-2xl font-black text-[#112347] tracking-tight">Patient Medical Reports</h1>
                <p class="text-xs text-slate-500 mt-0.5">Attach, organize, and inspect medical documents, pathology files, and lab tests for <strong>{{ $patient->name }}</strong>.</p>
            </div>
        </div>

        <div class="flex items-center gap-2.5">
            <button 
                type="button" 
                onclick="openReportModal()" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Upload Report</span>
            </button>

            <a 
                href="{{ route('admin.patient.view', $patient->id) }}" 
                class="px-4 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 transition-colors"
            >
                View Dossier
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <!-- Total Reports -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Total Reports</span>
                <span class="text-3xl font-black text-[#112347]">{{ number_format($stats['total']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
        </div>

        <!-- Documents with Downloadable File -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">With File Attached</span>
                <span class="text-3xl font-black text-emerald-700">{{ number_format($stats['with_file']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            </div>
        </div>

        <!-- Latest Investigation Date -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Latest Test Date</span>
                <span class="text-xl font-black text-[#27797D]">
                    {{ $stats['latest_date'] ? \Carbon\Carbon::parse($stats['latest_date'])->format('M d, Y') : 'No records' }}
                </span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs">
        <form action="{{ route('admin.patient.report.index', $patient->id) }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <!-- Search by Name -->
            <div class="sm:col-span-5 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search test name, scan type..." 
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 pl-9 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-700"
                >
                <div class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <!-- Date From -->
            <div class="sm:col-span-3">
                <input 
                    type="date" 
                    name="date_from" 
                    value="{{ request('date_from') }}" 
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer"
                    title="From Date"
                >
            </div>

            <!-- Date To -->
            <div class="sm:col-span-3">
                <input 
                    type="date" 
                    name="date_to" 
                    value="{{ request('date_to') }}" 
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer"
                    title="To Date"
                >
            </div>

            <!-- Submit & Reset -->
            <div class="sm:col-span-1 flex items-center gap-1.5 justify-end">
                <button 
                    type="submit" 
                    class="w-full bg-[#27797D] hover:bg-[#1e5f62] text-white p-2.5 rounded-xl text-xs font-bold transition-all shadow-xs cursor-pointer flex items-center justify-center"
                    title="Search"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>

                @if(request()->hasAny(['search', 'date_from', 'date_to']))
                <a 
                    href="{{ route('admin.patient.report.index', $patient->id) }}" 
                    class="p-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold transition-all shrink-0 cursor-pointer"
                    title="Reset Filter"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </a>
                @endif
            </div>

        </form>
    </div>

    <!-- Reports Data Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($reports as $report)
        <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs hover:border-teal-300 hover:shadow-md transition-all flex flex-col justify-between group">
            
            <div class="space-y-3">
                <div class="flex items-start justify-between gap-3">
                    <!-- File Badge Icon -->
                    <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                        @php
                            $ext = $report->file ? strtolower(pathinfo($report->file, PATHINFO_EXTENSION)) : 'doc';
                        @endphp
                        @if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp']))
                            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        @elseif($ext === 'pdf')
                            <span class="text-rose-600 font-extrabold text-xs">PDF</span>
                        @else
                            <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        @endif
                    </div>

                    <!-- Date Badge -->
                    <span class="px-2.5 py-1 rounded-xl text-[11px] font-bold bg-slate-100 text-slate-600">
                        {{ $report->date ? \Carbon\Carbon::parse($report->date)->format('M d, Y') : 'Date N/A' }}
                    </span>
                </div>

                <div>
                    <h3 class="font-extrabold text-sm text-[#112347] line-clamp-2 group-hover:text-[#27797D] transition-colors" title="{{ $report->name }}">
                        {{ $report->name }}
                    </h3>
                    <p class="text-[11px] text-slate-400 mt-1">
                        Uploaded {{ $report->created_at->format('M d, Y \a\t h:i A') }}
                    </p>
                </div>
            </div>

            <!-- Card Bottom Bar -->
            <div class="mt-5 pt-3.5 border-t border-slate-100 flex items-center justify-between">
                @if($report->file)
                    <a 
                        href="{{ route('admin.patient.report.download', [$patient->id, $report->id]) }}" 
                        class="inline-flex items-center gap-1.5 text-xs font-bold text-[#27797D] hover:underline"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        <span>Download</span>
                    </a>
                @else
                    <span class="text-xs text-slate-400 italic">No Attachment</span>
                @endif

                <button 
                    type="button" 
                    onclick="confirmDeleteReport('{{ route('admin.patient.report.destroy', [$patient->id, $report->id]) }}', '{{ addslashes($report->name) }}')"
                    class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer"
                    title="Delete Report"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </button>
            </div>

        </div>
        @empty
        <div class="sm:col-span-3 py-16 text-center bg-white rounded-3xl border border-slate-200/80 shadow-xs">
            <div class="max-w-md mx-auto space-y-3">
                <div class="w-16 h-16 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h3 class="text-base font-extrabold text-[#112347]">No Diagnostic Reports Found</h3>
                <p class="text-xs text-slate-400">No medical investigation documents have been attached matching your query.</p>
                <button 
                    type="button" 
                    onclick="openReportModal()"
                    class="inline-flex items-center gap-2 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all shadow-xs cursor-pointer"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    <span>Upload Medical Report</span>
                </button>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($reports->hasPages())
    <div class="p-4 bg-white rounded-2xl border border-slate-200/80 flex items-center justify-between">
        <span class="text-xs text-slate-400 font-medium">
            Showing {{ $reports->firstItem() }} to {{ $reports->lastItem() }} of {{ $reports->total() }} reports
        </span>
        <div>
            {{ $reports->links() }}
        </div>
    </div>
    @endif

    <!-- Single Delete Form -->
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
                <h3 class="text-base font-bold tracking-tight">Upload Medical Diagnostic Report</h3>
                <p class="text-xs text-teal-100">Attach report document for <strong>{{ $patient->name }}</strong></p>
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
