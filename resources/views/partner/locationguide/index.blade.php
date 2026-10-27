@extends('partner.layouts.app')

@section('title', 'Location & Travel Guide - ' . $hospital->name)

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
                <span class="text-slate-600 font-extrabold">Location Guide</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Location, Airport & Transit Guide</h1>
            <p class="text-xs text-slate-500 mt-0.5">Provide arrival directions, airport transit times, nearby patient hotels, and accessibility details for <strong>{{ $hospital->name }}</strong>.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <span class="px-3 py-1.5 rounded-xl bg-teal-50 border border-teal-200 text-teal-800 text-xs font-bold flex items-center gap-1.5 shadow-xs">
                <span>📍</span>
                <span>{{ $hospital->city->name ?? 'City' }}, {{ $hospital->country->name ?? 'India' }}</span>
            </span>
        </div>
    </div>

    <!-- Location Guide Editor Form -->
    <form id="location-guide-form" action="{{ route('partner.locationguide.store') }}" method="POST" class="space-y-6">
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
                    <h2 class="text-base font-extrabold text-[#112347]">Location & Transit Content</h2>
                    <p class="text-xs text-slate-400">Compose rich formatted arrival guidelines, airport transit, metro, and patient stays</p>
                </div>
                <span class="w-9 h-9 rounded-2xl bg-teal-50 text-[#27797D] font-bold text-base flex items-center justify-center">
                    🗺️
                </span>
            </div>

            <!-- Quick Insertion Snippets -->
            <div class="bg-slate-50/80 border border-slate-200/60 p-3.5 rounded-2xl space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-[#112347] flex items-center gap-1.5">
                        <span>⚡ Quick Template Presets:</span>
                        <span class="text-[10px] text-slate-400 font-normal">(Click to append snippet)</span>
                    </span>
                    <button type="button" id="clear-editor-btn" class="text-[11px] text-slate-400 hover:text-rose-600 transition-colors">Clear</button>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <button type="button" onclick="insertSnippet('airport')" class="px-3 py-1.5 rounded-xl bg-white border border-slate-200 hover:border-[#27797D] hover:text-[#27797D] text-xs font-bold text-slate-600 transition-all shadow-2xs">
                        ✈️ Airport Distance
                    </button>
                    <button type="button" onclick="insertSnippet('metro')" class="px-3 py-1.5 rounded-xl bg-white border border-slate-200 hover:border-[#27797D] hover:text-[#27797D] text-xs font-bold text-slate-600 transition-all shadow-2xs">
                        🚇 Metro & Trains
                    </button>
                    <button type="button" onclick="insertSnippet('hotels')" class="px-3 py-1.5 rounded-xl bg-white border border-slate-200 hover:border-[#27797D] hover:text-[#27797D] text-xs font-bold text-slate-600 transition-all shadow-2xs">
                        🏨 Nearby Hotels
                    </button>
                    <button type="button" onclick="insertSnippet('pickup')" class="px-3 py-1.5 rounded-xl bg-white border border-slate-200 hover:border-[#27797D] hover:text-[#27797D] text-xs font-bold text-slate-600 transition-all shadow-2xs">
                        🚑 Pickup & Parking
                    </button>
                </div>
            </div>

            <!-- Rich Text Editor Container -->
            <div>
                <input type="hidden" name="description" id="description_input" value="{{ old('description', $locationGuide->description) }}">
                <div id="quill_editor">
                    {!! old('description', $locationGuide->description) !!}
                </div>
            </div>

            <!-- Recommended Checklist -->
            <div class="p-4 bg-slate-50/70 rounded-2xl border border-slate-100 text-xs text-slate-500 space-y-2">
                <div class="font-bold text-[#112347] flex items-center gap-1.5">
                    <span>💡 Recommended Location Information for International Patients:</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-[11px] text-slate-600">
                    <div>&bull; Nearest International Airport name & transit time by taxi/ambulance</div>
                    <div>&bull; Closest Metro / Subway line and station name</div>
                    <div>&bull; Dedicated patient pickup & ambulance arrival coordinates</div>
                    <div>&bull; Partner 3-star & 5-star hotels & serviced apartments within 2 km</div>
                    <div>&bull; Currency exchange counter, ATM & 24/7 pharmacies nearby</div>
                    <div>&bull; Multi-cuisine dining & international food availability in the vicinity</div>
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
                    id="save-guide-btn"
                    class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-6 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <span>Save Location Guide</span>
                </button>
            </div>
        </div>
    </form>

    <!-- Real-Time Patient Live Preview Card -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
        <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
            <div>
                <h3 class="text-base font-extrabold text-[#112347]">Patient-Facing Live Preview</h3>
                <p class="text-xs text-slate-400">Live preview of how travelers view your location guide on the hospital page</p>
            </div>
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold border border-emerald-200">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Real-Time Preview</span>
            </span>
        </div>

        <div id="live-preview-box" class="rich-content min-h-[140px] text-slate-700 text-xs sm:text-sm p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
            {!! $locationGuide->description !!}
        </div>
    </div>

</div>

@push('scripts')
<!-- Quill Rich Text Editor JS -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    let quill;

    const snippets = {
        airport: `<h3>Airport Connectivity</h3><p><strong>Nearest Airport:</strong> International Airport (approx. 20-35 mins by airport cab / hospital transport).</p><ul><li>Distance: ~22 Kilometers</li><li>Travel Duration: 30-40 minutes depending on peak traffic</li><li>Pre-paid taxi and Heal Go Fly airport liaison representative available upon arrival.</li></ul>`,
        metro: `<h3>Metro & Railway Access</h3><p><strong>Closest Metro Station:</strong> 5-10 minutes from campus with direct line connection.</p><ul><li>Closest Metro: Central Line Station (2.5 km away)</li><li>Major Railway Station: Main City Junction (~8 km away, 20 mins by car)</li><li>24/7 auto-rickshaw and app-based cab stand directly outside the main hospital gate.</li></ul>`,
        hotels: `<h3>Nearby Accommodations & Guest Houses</h3><p>Multiple accommodation options suited for patient families and long recovery periods:</p><ul><li>3-Star & 4-Star Partner Hotels located within a 1.5 km radius</li><li>Serviced apartments with kitchenettes for international attendants</li><li>Budget guest houses and bed & breakfast options nearby</li></ul>`,
        pickup: `<h3>Patient Pickup & Campus Access</h3><p>Dedicated international patient drop-off porch at the main tower. Ample covered multi-level parking, ramp-assisted wheelchair access, and 24/7 emergency ambulance bay.</p>`
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
                preview.innerHTML = '<span class="text-slate-400 italic">Location guide description is currently empty. Write content above to see the live preview.</span>';
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
            placeholder: 'Provide detailed arrival instructions, airport transit, metro links, partner guest houses...',
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
        const form = document.getElementById('location-guide-form');
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
                            text: 'Please write location and transit details before saving.',
                            confirmButtonColor: '#EF7415',
                            borderRadius: '16px'
                        });
                    } else {
                        alert('Please write location and transit details before saving.');
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
