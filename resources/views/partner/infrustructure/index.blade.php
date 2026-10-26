@extends('partner.layouts.app')

@section('title', 'Hospital Infrastructure - ' . $hospital->name)

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
        min-height: 280px;
        font-size: 0.875rem;
        line-height: 1.7;
        color: #334155;
    }
    .ql-editor.ql-blank::before {
        color: #94a3b8;
        font-style: normal;
        font-size: 0.875rem;
    }
</style>
@endpush

@section('content')
<div class="space-y-6 max-w-5xl mx-auto">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('partner.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="text-slate-400">Hospital Infrastructure</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Hospital Infrastructure & Technology</h1>
            <p class="text-xs text-slate-500 mt-0.5">Detail architectural capacity, robotic surgery technology, ICU beds, helipads, and specialized units for <strong>{{ $hospital->name }}</strong>.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <span class="px-3 py-1.5 rounded-xl bg-teal-50 border border-teal-200 text-teal-800 text-xs font-bold flex items-center gap-1.5">
                <span>🏥</span>
                <span>{{ $hospital->name }}</span>
            </span>
        </div>
    </div>

    <!-- Infrastructure Editor Form -->
    <form action="{{ route('partner.infrustructure.store') }}" method="POST" class="space-y-6">
        @csrf

        @if ($errors->any())
            <div class="p-4 bg-rose-50 border border-rose-200 rounded-2xl text-xs text-rose-800 space-y-1 font-medium">
                <div class="font-bold flex items-center gap-1.5 text-rose-900">
                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span>Please review errors:</span>
                </div>
                <ul class="list-disc list-inside space-y-0.5 pl-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">Infrastructure Details</h2>
                    <p class="text-xs text-slate-400">Use formatted headings, bullet points, and paragraphs to describe clinical infrastructure</p>
                </div>
                <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] font-bold text-sm flex items-center justify-center">
                    🏗️
                </span>
            </div>

            <!-- Rich Text Editor Container -->
            <div>
                <input type="hidden" name="description" id="description_input" value="{{ old('description', $infrustructure->description) }}">
                <div id="quill_editor">
                    {!! old('description', $infrustructure->description) !!}
                </div>
            </div>

            <!-- Quick Template Inspiration Tips -->
            <div class="p-4 bg-slate-50/70 rounded-2xl border border-slate-100 text-xs text-slate-500 space-y-2">
                <div class="font-bold text-[#112347] flex items-center gap-1.5">
                    <span>💡 Recommended Infrastructure Topics to Cover:</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-[11px] text-slate-600">
                    <div>&bull; Total bed capacity, ICU & CCU bed breakdown</div>
                    <div>&bull; Operating theaters with HEPA laminar air flow</div>
                    <div>&bull; Advanced imaging: 3T MRI, 128+ Slice CT, PET-CT</div>
                    <div>&bull; Robotic surgery systems (e.g. da Vinci Xi)</div>
                    <div>&bull; Blood bank, transplant units & isolation rooms</div>
                    <div>&bull; Emergency triage & 24/7 cardiac catheterization lab</div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-slate-100">
                <a 
                    href="{{ route('partner.dashboard') }}" 
                    class="px-5 py-2.5 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
                >
                    Cancel
                </a>
                <button 
                    type="submit" 
                    class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-6 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <span>Save Infrastructure Details</span>
                </button>
            </div>
        </div>
    </form>

    <!-- Preview Card -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
        <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
            <div>
                <h3 class="text-base font-extrabold text-[#112347]">Patient-Facing Live Preview</h3>
                <p class="text-xs text-slate-400">How international patients see your infrastructure on the hospital profile</p>
            </div>
            <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold border border-emerald-200">
                Live Preview
            </span>
        </div>

        <div class="prose prose-sm max-w-none text-slate-700 leading-relaxed text-xs sm:text-sm p-4 bg-slate-50/50 rounded-2xl border border-slate-100">
            {!! $infrustructure->description !!}
        </div>
    </div>

</div>

@push('scripts')
<!-- Quill Rich Text Editor JS -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    let quill;

    document.addEventListener('DOMContentLoaded', function () {
        const toolbarOptions = [
            [{ 'header': [2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['link', 'clean']
        ];

        quill = new Quill('#quill_editor', {
            theme: 'snow',
            placeholder: 'Describe your hospital infrastructure, surgical theaters, bed strength, technology...',
            modules: { toolbar: toolbarOptions }
        });

        document.querySelector('form').addEventListener('submit', function () {
            document.getElementById('description_input').value = quill.getText().trim().length === 0 ? '' : quill.root.innerHTML;
        });
    });
</script>
@endpush
@endsection
