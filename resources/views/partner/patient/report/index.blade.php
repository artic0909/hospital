@extends('partner.layouts.app')

@section('title', 'Medical Reports: ' . $patient->name . ' - Heal Go Fly Partner')

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
                    <a href="{{ route('partner.patient.index') }}" class="text-[#27797D] hover:underline">&larr; Patients Directory</a>
                    <span>&bull;</span>
                    <a href="{{ route('partner.patient.view', $patient) }}" class="text-slate-600 hover:underline">{{ $patient->name }}</a>
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
                href="{{ route('partner.patient.view', $patient) }}" 
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

        <!-- Attached Documents -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Attached Files</span>
                <span class="text-3xl font-black text-emerald-700">{{ number_format($stats['with_file']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
            </div>
        </div>

        <!-- Latest Test Date -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Latest Investigation</span>
                <span class="text-lg font-black text-[#EF7415]">
                    {{ $stats['latest_date'] ? \Carbon\Carbon::parse($stats['latest_date'])->format('M d, Y') : 'No tests recorded' }}
                </span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs">
        <form action="{{ route('partner.patient.report.index', $patient) }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <!-- Search -->
            <div class="sm:col-span-5 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search by test name or title..." 
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
                    title="From Date"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700"
                >
            </div>

            <!-- Date To -->
            <div class="sm:col-span-3">
                <input 
                    type="date" 
                    name="date_to" 
                    value="{{ request('date_to') }}" 
                    title="To Date"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700"
                >
            </div>

            <!-- Submit & Reset -->
            <div class="sm:col-span-1 flex items-center gap-1.5">
                <button 
                    type="submit" 
                    class="bg-[#27797D] hover:bg-[#1e5f62] text-white p-2.5 rounded-xl text-xs font-bold transition-all shadow-xs shrink-0 cursor-pointer"
                    title="Search"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>

                @if(request()->hasAny(['search', 'date_from', 'date_to']))
                <a 
                    href="{{ route('partner.patient.report.index', $patient) }}" 
                    class="p-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold transition-all shrink-0 cursor-pointer"
                    title="Reset Filters"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Reports Data Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-200 text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                        <th class="py-3.5 px-6">Report Title / Test Name</th>
                        <th class="py-3.5 px-6">Investigation Date</th>
                        <th class="py-3.5 px-6">File Attachment</th>
                        <th class="py-3.5 px-6">Uploaded At</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($reports as $report)
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        
                        <!-- Name & Icon -->
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-2xl flex items-center justify-center shrink-0 {{ $report->isPdf() ? 'bg-rose-50 text-rose-600' : ($report->isImage() ? 'bg-blue-50 text-blue-600' : 'bg-slate-100 text-slate-600') }}">
                                    @if($report->isPdf())
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                    @elseif($report->isImage())
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    @else
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    @endif
                                </div>
                                <div>
                                    <span class="font-bold text-[#112347] text-sm block">{{ $report->name }}</span>
                                    <span class="text-[10px] text-slate-400 font-mono">#REP-{{ str_pad($report->id, 5, '0', STR_PAD_LEFT) }}</span>
                                </div>
                            </div>
                        </td>

                        <!-- Investigation Date -->
                        <td class="py-4 px-6">
                            <div class="font-semibold text-slate-800">
                                {{ $report->date ? $report->date->format('F d, Y') : 'Date not set' }}
                            </div>
                            @if($report->date)
                            <div class="text-[10px] text-slate-400">{{ $report->date->diffForHumans() }}</div>
                            @endif
                        </td>

                        <!-- File Attachment -->
                        <td class="py-4 px-6">
                            @if($report->file)
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-0.5 rounded font-mono font-bold text-[10px] uppercase {{ $report->isPdf() ? 'bg-rose-100 text-rose-800' : ($report->isImage() ? 'bg-blue-100 text-blue-800' : 'bg-slate-100 text-slate-700') }}">
                                        {{ $report->extension ?? 'FILE' }}
                                    </span>
                                    <a 
                                        href="{{ route('partner.patient.report.download', [$patient, $report]) }}" 
                                        class="text-xs font-bold text-[#27797D] hover:underline inline-flex items-center gap-1"
                                        download
                                    >
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                        <span>Download</span>
                                    </a>
                                </div>
                            @else
                                <span class="text-slate-400 italic">No document file attached</span>
                            @endif
                        </td>

                        <!-- Uploaded At -->
                        <td class="py-4 px-6 text-slate-500">
                            <div>{{ $report->created_at->format('M d, Y') }}</div>
                            <div class="text-[10px] text-slate-400">{{ $report->created_at->format('h:i A') }}</div>
                        </td>

                        <!-- Actions -->
                        <td class="py-4 px-6 text-right">
                            <div class="inline-flex items-center gap-2">
                                @if($report->file)
                                <a 
                                    href="{{ route('partner.patient.report.download', [$patient, $report]) }}" 
                                    class="p-2 rounded-lg text-slate-400 hover:text-[#27797D] hover:bg-teal-50 transition-colors"
                                    title="Download Report Document"
                                    download
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </a>
                                @endif

                                <button 
                                    type="button" 
                                    onclick="confirmDeleteReport('{{ route('partner.patient.report.destroy', [$patient, $report]) }}', '{{ addslashes($report->name) }}')"
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
                        <td colspan="5" class="py-14 text-center">
                            <div class="max-w-sm mx-auto space-y-3">
                                <div class="w-16 h-16 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </div>
                                <h3 class="text-base font-bold text-slate-800">No Diagnostic Reports Found</h3>
                                <p class="text-xs text-slate-400">Keep medical history up to date by attaching laboratory results, pathology panels, and clinical scans.</p>
                                <button 
                                    type="button" 
                                    onclick="openReportModal()"
                                    class="inline-flex items-center gap-2 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all shadow-xs cursor-pointer"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                    <span>Upload First Medical Report</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($reports->hasPages())
        <div class="p-4 border-t border-slate-100 flex items-center justify-between">
            <span class="text-xs text-slate-400 font-medium">
                Showing {{ $reports->firstItem() }} to {{ $reports->lastItem() }} of {{ $reports->total() }} reports
            </span>
            <div>
                {{ $reports->links() }}
            </div>
        </div>
        @endif
    </div>

    <!-- Hidden Form for Delete -->
    <form id="delete-report-form" method="POST" class="hidden">
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
                <h3 class="text-lg font-black text-[#112347]">Upload Medical Report</h3>
                <p class="text-xs text-slate-400">Attach report for <strong>{{ $patient->name }}</strong></p>
            </div>
            <button 
                type="button" 
                onclick="closeReportModal()"
                class="p-2 text-slate-400 hover:text-slate-600 rounded-lg hover:bg-slate-100 transition-colors"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form action="{{ route('partner.patient.report.store', $patient) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                    placeholder="e.g. MRI Brain with Contrast / CBC Report / Pathology" 
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
                    <span class="text-xs font-bold text-slate-700" id="report-file-text">Click to choose report file (PDF, JPG, PNG, DOC, XLS)</span>
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

    function confirmDeleteReport(url, name) {
        Swal.fire({
            title: 'Delete Medical Report?',
            html: `Are you sure you want to remove <strong>${name}</strong>?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('delete-report-form');
                form.action = url;
                form.submit();
            }
        });
    }
</script>
@endpush
@endsection
