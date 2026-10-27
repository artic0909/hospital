@extends('partner.layouts.app')

@section('title', 'Hospital Infrastructure - ' . $hospital->name)

@push('styles')
<!-- Quill Rich Text Editor CSS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>
    .ql-toolbar.ql-snow {
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
        border-color: #e2e8f0;
        background: #f8fafc;
        padding: 0.75rem 1rem;
    }
    .ql-container.ql-snow {
        border-bottom-left-radius: 1rem;
        border-bottom-right-radius: 1rem;
        border-color: #e2e8f0;
        background: #ffffff;
        font-family: inherit;
        font-size: 0.925rem;
    }
    .ql-editor {
        min-height: 320px;
        font-size: 0.925rem;
        line-height: 1.75;
        color: #334155;
        padding: 1.25rem;
    }
    .ql-editor.ql-blank::before {
        color: #94a3b8;
        font-style: normal;
        font-size: 0.925rem;
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
                <span class="text-slate-400">Hospital Content</span>
                <span>&bull;</span>
                <span class="text-slate-600 font-extrabold">Infrastructure</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Hospital Infrastructure & Technology</h1>
            <p class="text-xs text-slate-500 mt-0.5">Detail architectural capacity, robotic surgery technology, ICU beds, helipads, and specialized units for <strong>{{ $hospital->name }}</strong>.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <span class="px-3 py-1.5 rounded-xl bg-teal-50 border border-teal-200 text-teal-800 text-xs font-bold flex items-center gap-1.5 shadow-xs">
                <span>🏥</span>
                <span>{{ $hospital->name }}</span>
            </span>
        </div>
    </div>

    <!-- Infrastructure Editor Form -->
    <form id="infrastructure-form" action="{{ route('partner.infrustructure.store') }}" method="POST" class="space-y-6">
        @csrf

        @if (isset($errors) && $errors->any())
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
            <div class="border-b border-slate-100 pb-3 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div>
                    <h2 class="text-base font-extrabold text-[#112347]">Infrastructure Details</h2>
                    <p class="text-xs text-slate-400">Use formatted headings, bullet points, and paragraphs to describe clinical infrastructure</p>
                </div>
                <span class="w-9 h-9 rounded-2xl bg-teal-50 text-[#27797D] font-bold text-base flex items-center justify-center">
                    🏗️
                </span>
            </div>

            <!-- Quick Insertion Snippets -->
            <div class="bg-slate-50/80 border border-slate-200/60 p-3.5 rounded-2xl space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-[#112347] flex items-center gap-1.5">
                        <span>⚡ Quick Infrastructure Snippets:</span>
                        <span class="text-[10px] text-slate-400 font-normal">(Click to append section)</span>
                    </span>
                    <button type="button" id="clear-editor-btn" class="text-[11px] text-slate-400 hover:text-rose-600 transition-colors">Clear</button>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <button type="button" onclick="insertSnippet('capacity')" class="px-3 py-1.5 rounded-xl bg-white border border-slate-200 hover:border-[#27797D] hover:text-[#27797D] text-xs font-bold text-slate-600 transition-all shadow-2xs">
                        🏥 Bed & ICU Capacity
                    </button>
                    <button type="button" onclick="insertSnippet('surgical')" class="px-3 py-1.5 rounded-xl bg-white border border-slate-200 hover:border-[#27797D] hover:text-[#27797D] text-xs font-bold text-slate-600 transition-all shadow-2xs">
                        🤖 Robotic Surgery & OTs
                    </button>
                    <button type="button" onclick="insertSnippet('imaging')" class="px-3 py-1.5 rounded-xl bg-white border border-slate-200 hover:border-[#27797D] hover:text-[#27797D] text-xs font-bold text-slate-600 transition-all shadow-2xs">
                        🔬 Diagnostic Imaging & Labs
                    </button>
                    <button type="button" onclick="insertSnippet('transplant')" class="px-3 py-1.5 rounded-xl bg-white border border-slate-200 hover:border-[#27797D] hover:text-[#27797D] text-xs font-bold text-slate-600 transition-all shadow-2xs">
                        🩸 Transplant & Critical Care
                    </button>
                </div>
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
                    <div>&bull; Total bed capacity, ICU, CCU & NICU bed breakdown</div>
                    <div>&bull; Operating theaters with ultra-clean HEPA laminar air flow</div>
                    <div>&bull; Advanced imaging: 3T MRI, 128+ Slice CT, PET-CT, Dual Energy CT</div>
                    <div>&bull; Robotic surgery systems (e.g. da Vinci Xi, MAKO orthopedic robot)</div>
                    <div>&bull; Accredited blood bank, transplant isolation units & bone marrow wards</div>
                    <div>&bull; 24/7 emergency triage & digital flat-panel cardiac catheterization lab</div>
                </div>
            </div>

            <!-- Submit Button Ribbon -->
            <div class="flex items-center justify-between gap-3 pt-3 border-t border-slate-100">
                <a 
                    href="{{ route('partner.dashboard') }}" 
                    class="px-5 py-2.5 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
                >
                    Cancel
                </a>
                <button 
                    type="submit" 
                    id="save-infra-btn"
                    class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-6 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <span>Save Infrastructure Details</span>
                </button>
            </div>
        </div>
    </form>

    <!-- Real-Time Patient Live Preview Card -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
        <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
            <div>
                <h3 class="text-base font-extrabold text-[#112347]">Patient-Facing Live Preview</h3>
                <p class="text-xs text-slate-400">Live preview of how international patients see your infrastructure on the hospital profile</p>
            </div>
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold border border-emerald-200">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Real-Time Preview</span>
            </span>
        </div>

        <div id="live-preview-box" class="rich-content min-h-[140px] text-slate-700 text-xs sm:text-sm p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
            {!! $infrustructure->description !!}
        </div>
    </div>

</div>

@push('scripts')
<!-- Quill Rich Text Editor JS -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    let quill;

    const snippets = {
        capacity: `<h3>Campus & Bed Capacity</h3><p>State-of-the-art multi-acre tertiary care medical center engineered to global JCI standards.</p><ul><li>Total Bed Capacity: Over 700+ licensed in-patient beds</li><li>Comprehensive Critical Care: 180+ dedicated ICU, CCU, and NICU units with central telemetry</li><li>Private and presidential recovery suites with international TV, patient attendants lounge, and dedicated nurse call buttons</li></ul>`,
        surgical: `<h3>Robotic Surgery & Advanced Theaters</h3><p>Equipped with modular cleanroom surgical theaters featuring laminar airflow filtration systems:</p><ul><li>4th Generation da Vinci Xi Multi-Specialty Robotic Surgical System</li><li>Orthopedic robotic joint replacement suites (MAKO)</li><li>Dedicated neuro-navigation systems with intra-operative CT and MRI integration</li><li>Round-the-clock emergency surgical capability with rapid response teams</li></ul>`,
        imaging: `<h3>Comprehensive Diagnostic Imaging & Lab</h3><p>Round-the-clock diagnostic capability guaranteeing rapid clinical turnaround:</p><ul><li>High-Resolution 3 Tesla MRI scanners with quiet technology</li><li>128+ Slice Ultra-Fast Low-Dose CT and Cardiac CT Angiography</li><li>Whole-Body PET-CT scanner for oncology staging and metabolic evaluation</li><li>NABL-accredited automated pathology laboratories and flow cytometry suites</li></ul>`,
        transplant: `<h3>Dedicated Organ Transplant & Critical Units</h3><p>Pioneering solid organ and bone marrow transplant infrastructure:</p><ul><li>HEPA-filtered positive-pressure bone marrow transplant (BMT) suites</li><li>Dedicated Liver and Kidney transplant ICUs with isolated sterile bays</li><li>24/7 Digital Flat-Panel Cardiac Catheterization Lab for emergency angioplasty</li><li>Full-spectrum blood bank with component apheresis and nucleic acid testing (NAT)</li></ul>`
    };

    function insertSnippet(type) {
        if (!quill || !snippets[type]) return;
        const html = snippets[type];
        const range = quill.getSelection();
        const index = range ? range.index : quill.getLength();
        quill.clipboard.dangerouslyPasteHTML(index, html);
        updatePreview();
    }

    function updatePreview() {
        const preview = document.getElementById('live-preview-box');
        if (preview && quill) {
            const html = quill.root.innerHTML;
            const text = quill.getText().trim();
            if (text.length === 0 && !html.includes('<img')) {
                preview.innerHTML = '<span class="text-slate-400 italic">Infrastructure description is currently empty. Write content above to see the live preview.</span>';
            } else {
                preview.innerHTML = html;
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const toolbarOptions = [
            [{ 'header': [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['blockquote'],
            ['link', 'clean']
        ];

        quill = new Quill('#quill_editor', {
            theme: 'snow',
            placeholder: 'Describe your hospital infrastructure, surgical theaters, bed strength, technology...',
            modules: { toolbar: toolbarOptions }
        });

        // Sync live preview on text change
        quill.on('text-change', function () {
            updatePreview();
        });

        const clearBtn = document.getElementById('clear-editor-btn');
        if (clearBtn) {
            clearBtn.addEventListener('click', function () {
                if (confirm('Clear the current editor content?')) {
                    quill.setText('');
                    updatePreview();
                }
            });
        }

        // Form submission sync
        const form = document.getElementById('infrastructure-form');
        if (form) {
            form.addEventListener('submit', function (e) {
                const text = quill.getText().trim();
                const html = quill.root.innerHTML;

                if (text.length === 0 && !html.includes('<img')) {
                    e.preventDefault();
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Content Required',
                            text: 'Please write hospital infrastructure details before saving.',
                            confirmButtonColor: '#EF7415',
                            borderRadius: '16px'
                        });
                    } else {
                        alert('Please write hospital infrastructure details before saving.');
                    }
                    return false;
                }

                document.getElementById('description_input').value = html;
            });
        }
    });
</script>
@endpush
@endsection
