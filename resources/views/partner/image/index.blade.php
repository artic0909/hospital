@extends('partner.layouts.app')

@section('title', 'Hospital Photo Gallery - ' . $hospital->name)

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('partner.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="text-slate-400">Photo Gallery</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Hospital Images & Campus Gallery</h1>
            <p class="text-xs text-slate-500 mt-0.5">Showcase building campus, inpatient suites, robotic surgical theaters, and reception lounges for <strong>{{ $hospital->name }}</strong>.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <button 
                type="button" 
                onclick="openUploadModal()"
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                <span>Upload Photos</span>
            </button>
        </div>
    </div>

    <!-- Gallery Toolbar & Selection Bar -->
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="flex items-center gap-3">
            <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer select-none">
                <input type="checkbox" id="select-all" class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer">
                <span>Select All Photos</span>
            </label>
            <span class="text-slate-300">|</span>
            <span class="text-xs font-semibold text-slate-500">
                Total <strong>{{ $images->total() }}</strong> photos uploaded
            </span>
        </div>

        <div id="bulk-action-bar" class="hidden items-center gap-3 text-xs">
            <span class="text-rose-700 font-bold">
                <span id="selected-count">0</span> photos selected
            </span>
            <button 
                type="button" 
                onclick="confirmBulkDelete()"
                class="px-3 py-1.5 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs transition-colors cursor-pointer"
            >
                Delete Selected
            </button>
        </div>
    </div>

    <!-- Photo Grid -->
    @if($images->count() > 0)
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach($images as $img)
                <div class="group relative bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden flex flex-col hover:shadow-md transition-all">
                    <!-- Checkbox -->
                    <div class="absolute top-2 left-2 z-10 bg-white/90 backdrop-blur-xs p-1 rounded-lg shadow-xs">
                        <input type="checkbox" name="ids[]" value="{{ $img->id }}" class="row-checkbox w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer">
                    </div>

                    <!-- Delete button -->
                    <div class="absolute top-2 right-2 z-10 opacity-0 group-hover:opacity-100 transition-opacity">
                        <form id="delete-img-{{ $img->id }}" action="{{ route('partner.image.destroy', $img->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="button" 
                                onclick="confirmDelete('delete-img-{{ $img->id }}')"
                                class="p-1.5 rounded-lg bg-rose-600 text-white hover:bg-rose-700 shadow-md transition-colors cursor-pointer"
                                title="Delete Photo"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>

                    <!-- Image Thumbnail with Zoom Lightbox -->
                    <a 
                        href="{{ $img->image_url }}" 
                        target="_blank" 
                        class="aspect-4/3 overflow-hidden bg-slate-100 block cursor-zoom-in"
                        title="Click to view full photo"
                    >
                        <img 
                            src="{{ $img->image_url }}" 
                            alt="{{ $img->title ?? 'Hospital Photo' }}" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                            loading="lazy"
                        >
                    </a>

                    <!-- Caption -->
                    <div class="p-2.5 bg-white border-t border-slate-100 truncate">
                        <span class="text-[11px] font-bold text-slate-700 truncate block" title="{{ $img->title }}">
                            {{ $img->title ?: 'Hospital Photo #' . $img->id }}
                        </span>
                        <span class="text-[9px] text-slate-400 block mt-0.5">
                            {{ $img->created_at->format('M d, Y') }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($images->hasPages())
            <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
                <span class="text-xs text-slate-500 font-semibold">
                    Showing {{ $images->firstItem() }} to {{ $images->lastItem() }} of {{ $images->total() }} photos
                </span>
                <div>
                    {{ $images->links('admin.includes.pagination') }}
                </div>
            </div>
        @endif
    @else
        <div class="bg-white rounded-3xl border border-dashed border-slate-300 p-12 text-center space-y-4">
            <span class="text-4xl block">📸</span>
            <div>
                <h3 class="text-base font-extrabold text-[#112347]">No Campus Photos Yet</h3>
                <p class="text-xs text-slate-400 max-w-sm mx-auto mt-1">Upload high-resolution hospital photos to attract international patients and showcase world-class medical facilities.</p>
            </div>
            <button 
                type="button" 
                onclick="openUploadModal()"
                class="inline-flex items-center gap-2 bg-[#27797D] hover:bg-[#1D4B6C] text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Upload First Photos</span>
            </button>
        </div>
    @endif

    <!-- Hidden Bulk Delete Form -->
    <form id="bulk-delete-form" action="{{ route('partner.image.bulk-delete') }}" method="POST" class="hidden">
        @csrf
        <div id="bulk-delete-inputs"></div>
    </form>

    <!-- Upload Photos Modal -->
    <div id="upload-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full border border-slate-200 shadow-2xl p-6 sm:p-7 space-y-5 animate-in fade-in zoom-in-95 duration-150">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] font-bold text-sm flex items-center justify-center">📸</span>
                    <h3 class="text-base font-extrabold text-[#112347]">Upload Campus Photos</h3>
                </div>
                <button type="button" onclick="closeUploadModal()" class="text-slate-400 hover:text-slate-600 text-xl font-bold">&times;</button>
            </div>

            <form action="{{ route('partner.image.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Photo Caption / Tag <span class="text-slate-400 text-[10px] font-normal">(Optional)</span>
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        placeholder="e.g. Main Lobby, Cardiac ICU, Exterior Campus..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Select Photo(s) <span class="text-rose-500">*</span> <span class="text-slate-400 text-[10px] font-normal">(Multiple files supported, SVG, PNG, JPG, WebP)</span>
                    </label>
                    <div class="border-2 border-dashed border-slate-200 hover:border-[#27797D] rounded-2xl p-6 text-center bg-slate-50/60 transition-colors cursor-pointer relative">
                        <input 
                            type="file" 
                            name="images[]" 
                            id="images_input"
                            multiple
                            required 
                            accept="image/*,.svg"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                            onchange="updateFileCount(this)"
                        >
                        <div class="space-y-1">
                            <span class="text-3xl block">🖼️</span>
                            <div class="text-xs font-bold text-[#112347]">Drag and drop images here, or browse</div>
                            <p class="text-[11px] text-slate-400" id="file-count-text">Upload up to 5MB per image</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2.5 pt-2 border-t border-slate-100">
                    <button 
                        type="button" 
                        onclick="closeUploadModal()" 
                        class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="px-5 py-2 text-xs font-bold bg-[#EF7415] hover:bg-[#d9640d] text-white rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                    >
                        Upload to Gallery
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@push('scripts')
<script>
    function openUploadModal() {
        document.getElementById('upload-modal').classList.remove('hidden');
    }

    function closeUploadModal() {
        document.getElementById('upload-modal').classList.add('hidden');
    }

    function updateFileCount(input) {
        const text = document.getElementById('file-count-text');
        if (input.files.length > 0) {
            text.innerHTML = `<strong class="text-emerald-600 font-bold">${input.files.length} file(s) selected</strong> ready to upload`;
        } else {
            text.textContent = 'Upload up to 5MB per image';
        }
    }

    const selectAll = document.getElementById('select-all');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const bulkBar = document.getElementById('bulk-action-bar');
    const selectedCount = document.getElementById('selected-count');

    function updateBulkBar() {
        const checked = document.querySelectorAll('.row-checkbox:checked');
        if (checked.length > 0) {
            bulkBar.classList.remove('hidden');
            bulkBar.classList.add('flex');
            selectedCount.textContent = checked.length;
        } else {
            bulkBar.classList.add('hidden');
            bulkBar.classList.remove('flex');
        }
    }

    if (selectAll) {
        selectAll.addEventListener('change', function () {
            rowCheckboxes.forEach(cb => cb.checked = selectAll.checked);
            updateBulkBar();
        });
    }

    rowCheckboxes.forEach(cb => {
        cb.addEventListener('change', function () {
            updateBulkBar();
            if (selectAll) {
                selectAll.checked = document.querySelectorAll('.row-checkbox:checked').length === rowCheckboxes.length;
            }
        });
    });

    function confirmDelete(formId) {
        Swal.fire({
            title: 'Delete this photo?',
            text: 'This image will be permanently removed from the hospital gallery!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF7415',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, delete'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }

    function confirmBulkDelete() {
        const checked = document.querySelectorAll('.row-checkbox:checked');
        if (checked.length === 0) return;

        Swal.fire({
            title: `Delete ${checked.length} selected photos?`,
            text: 'All selected gallery photos will be permanently deleted!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF7415',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, delete selected'
        }).then((result) => {
            if (result.isConfirmed) {
                const container = document.getElementById('bulk-delete-inputs');
                container.innerHTML = '';
                checked.forEach(cb => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'selected_ids[]';
                    input.value = cb.value;
                    container.appendChild(input);
                });
                document.getElementById('bulk-delete-form').submit();
            }
        });
    }
</script>
@endpush
@endsection
