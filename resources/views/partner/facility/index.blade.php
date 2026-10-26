@extends('partner.layouts.app')

@section('title', 'Hospital Facilities - ' . $hospital->name)

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('partner.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="text-slate-400">Hospital Facilities</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Hospital Facilities & Amenities</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage specialized medical units, intensive care facilities, patient wards, and diagnostic amenities for <strong>{{ $hospital->name }}</strong>.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <button 
                type="button" 
                onclick="openCreateFacilityModal()"
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add Facility</span>
            </button>
        </div>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs space-y-3">
        <form action="{{ route('partner.facility.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            <!-- Search -->
            <div class="sm:col-span-8 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search facility name (e.g. ICU, Cath Lab, Robotic Surgery, MRI...)" 
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 pl-9 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                >
                <div class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <!-- Per Page Dropdown -->
            <div class="sm:col-span-4 flex items-center justify-end gap-2">
                <span class="text-xs text-slate-400 font-bold whitespace-nowrap">Show:</span>
                <select 
                    name="per_page" 
                    onchange="this.form.submit()"
                    class="bg-slate-50 focus:bg-white text-xs px-2.5 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none font-bold text-slate-700 cursor-pointer"
                >
                    <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                    <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>20</option>
                    <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('per_page') == '100' ? 'selected' : '' }}>100</option>
                    <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>All</option>
                </select>

                @if(request()->hasAny(['search', 'per_page']))
                    <a 
                        href="{{ route('partner.facility.index') }}" 
                        class="p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition-colors cursor-pointer"
                        title="Reset Filters"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                @endif
            </div>
        </form>

        <!-- Bulk Action Bar -->
        <div id="bulk-action-bar" class="hidden items-center justify-between p-2.5 bg-rose-50 border border-rose-200 rounded-xl text-xs">
            <div class="flex items-center gap-2 text-rose-800 font-bold">
                <span>Selected:</span>
                <span id="selected-count" class="bg-rose-600 text-white px-2 py-0.5 rounded-md text-[11px]">0</span>
                <span>facilities</span>
            </div>
            <button 
                type="button" 
                onclick="confirmBulkDelete()"
                class="px-3 py-1.5 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs transition-colors cursor-pointer"
            >
                Delete Selected
            </button>
        </div>
    </div>

    <!-- Facilities Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200/70 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3.5 px-4 w-10 text-center">
                            <input type="checkbox" id="select-all" class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer">
                        </th>
                        <th class="py-3.5 px-4">Facility Icon / Image</th>
                        <th class="py-3.5 px-4">Facility Name</th>
                        <th class="py-3.5 px-4">Hospital</th>
                        <th class="py-3.5 px-4">Added Date</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($facilities as $fac)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-3.5 px-4 text-center">
                                <input type="checkbox" name="ids[]" value="{{ $fac->id }}" class="row-checkbox w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer">
                            </td>
                            <td class="py-3.5 px-4">
                                <div class="w-12 h-12 rounded-xl border border-slate-200/80 bg-slate-50 p-1 flex items-center justify-center shrink-0 shadow-2xs">
                                    <img 
                                        src="{{ $fac->image_url }}" 
                                        alt="{{ $fac->name }}" 
                                        class="w-full h-full object-contain rounded-lg"
                                    >
                                </div>
                            </td>
                            <td class="py-3.5 px-4 font-bold text-[#112347] text-sm">
                                {{ $fac->name }}
                            </td>
                            <td class="py-3.5 px-4 text-slate-500 font-medium">
                                {{ $hospital->name }}
                            </td>
                            <td class="py-3.5 px-4 text-slate-400 text-[11px]">
                                {{ $fac->created_at->format('M d, Y') }}
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <div class="inline-flex items-center gap-1.5">
                                    <button 
                                        type="button" 
                                        onclick="openEditFacilityModal({{ $fac->id }}, '{{ addslashes($fac->name) }}', '{{ $fac->image_url }}')"
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-amber-50 transition-colors cursor-pointer"
                                        title="Edit Facility"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </button>

                                    <form id="delete-fac-{{ $fac->id }}" action="{{ route('partner.facility.destroy', $fac->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmDelete('delete-fac-{{ $fac->id }}', '{{ addslashes($fac->name) }}')"
                                            class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer"
                                            title="Delete Facility"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-12 px-4 text-slate-400">
                                <span class="text-3xl block mb-2">🏥</span>
                                <div class="font-bold text-slate-600 text-sm">No facilities added yet</div>
                                <p class="text-xs text-slate-400 mt-1">Add facilities such as ICU, Blood Bank, Cath Lab, or 24/7 Pharmacy.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($facilities->hasPages())
            <div class="p-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                <span class="text-xs text-slate-500 font-semibold">
                    Showing {{ $facilities->firstItem() }} to {{ $facilities->lastItem() }} of {{ $facilities->total() }} facilities
                </span>
                <div>
                    {{ $facilities->links('admin.includes.pagination') }}
                </div>
            </div>
        @endif
    </div>

    <!-- Hidden Bulk Delete Form -->
    <form id="bulk-delete-form" action="{{ route('partner.facility.bulk-delete') }}" method="POST" class="hidden">
        @csrf
        <div id="bulk-delete-inputs"></div>
    </form>

    <!-- Create Facility Modal -->
    <div id="create-facility-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full border border-slate-200 shadow-2xl p-6 sm:p-7 space-y-5 animate-in fade-in zoom-in-95 duration-150">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] font-bold text-sm flex items-center justify-center">🏥</span>
                    <h3 class="text-base font-extrabold text-[#112347]">Add Hospital Facility</h3>
                </div>
                <button type="button" onclick="closeCreateFacilityModal()" class="text-slate-400 hover:text-slate-600 text-xl font-bold">&times;</button>
            </div>

            <form action="{{ route('partner.facility.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Facility Name <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        required 
                        placeholder="e.g. 24x7 Emergency & Trauma, Robotic Surgery Unit, MRI & CT..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Facility Icon / Image <span class="text-slate-400 text-[10px] font-normal">(SVG, PNG, JPG, WebP)</span>
                    </label>
                    <input 
                        type="file" 
                        name="image" 
                        accept="image/*,.svg"
                        class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                    >
                </div>

                <div class="flex items-center justify-end gap-2.5 pt-2 border-t border-slate-100">
                    <button 
                        type="button" 
                        onclick="closeCreateFacilityModal()" 
                        class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="px-5 py-2 text-xs font-bold bg-[#EF7415] hover:bg-[#d9640d] text-white rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                    >
                        Save Facility
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Facility Modal -->
    <div id="edit-facility-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full border border-slate-200 shadow-2xl p-6 sm:p-7 space-y-5 animate-in fade-in zoom-in-95 duration-150">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 font-bold text-sm flex items-center justify-center">✏️</span>
                    <h3 class="text-base font-extrabold text-[#112347]">Edit Facility</h3>
                </div>
                <button type="button" onclick="closeEditFacilityModal()" class="text-slate-400 hover:text-slate-600 text-xl font-bold">&times;</button>
            </div>

            <form id="edit-facility-form" action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Facility Name <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="edit-facility-name"
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Change Icon / Image <span class="text-slate-400 text-[10px] font-normal">(SVG, PNG, JPG, WebP)</span>
                    </label>
                    <div class="flex items-center gap-3 mb-2">
                        <img id="edit-facility-preview" src="" class="w-10 h-10 object-contain rounded-lg border border-slate-200 p-1 bg-slate-50">
                        <span class="text-[11px] text-slate-400">Current image preview</span>
                    </div>
                    <input 
                        type="file" 
                        name="image" 
                        accept="image/*,.svg"
                        class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                    >
                </div>

                <div class="flex items-center justify-end gap-2.5 pt-2 border-t border-slate-100">
                    <button 
                        type="button" 
                        onclick="closeEditFacilityModal()" 
                        class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="px-5 py-2 text-xs font-bold bg-[#EF7415] hover:bg-[#d9640d] text-white rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                    >
                        Update Facility
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@push('scripts')
<script>
    function openCreateFacilityModal() {
        document.getElementById('create-facility-modal').classList.remove('hidden');
    }

    function closeCreateFacilityModal() {
        document.getElementById('create-facility-modal').classList.add('hidden');
    }

    function openEditFacilityModal(id, name, imageUrl) {
        document.getElementById('edit-facility-form').action = `/partner/facility/${id}`;
        document.getElementById('edit-facility-name').value = name;
        document.getElementById('edit-facility-preview').src = imageUrl;
        document.getElementById('edit-facility-modal').classList.remove('hidden');
    }

    function closeEditFacilityModal() {
        document.getElementById('edit-facility-modal').classList.add('hidden');
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

    function confirmDelete(formId, name) {
        Swal.fire({
            title: `Delete ${name}?`,
            text: "This facility will be permanently deleted from the hospital profile!",
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
            title: `Delete ${checked.length} selected facilities?`,
            text: "All selected facilities will be removed!",
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
