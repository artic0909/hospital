@extends('admin.layouts.app')

@section('title', 'State Management - Master Utilities')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="text-xs font-bold uppercase tracking-wider text-[#27797D]">Master Utilities</span>
                <span class="text-slate-300">&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $states->total() }} States / Provinces
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">States & Provinces</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage regional divisions mapped to destination and source countries.</p>
        </div>

        <div class="flex items-center gap-3">
            <button 
                type="button" 
                onclick="openAddStateModal()"
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add State</span>
            </button>
        </div>
    </div>

    <!-- Hidden Bulk Delete Form -->
    <form id="bulk-delete-form" action="{{ route('admin.utilities.state.bulk-delete') }}" method="POST" class="hidden">
        @csrf
    </form>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        
        <!-- Search & Filter Bar -->
        <div class="p-4 sm:p-6 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <form action="{{ route('admin.utilities.state') }}" method="GET" class="flex flex-wrap items-center gap-3 w-full md:w-auto flex-1">
                <!-- Search Input -->
                <div class="relative w-full sm:w-64">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Search state or country..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2 pl-9 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    >
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <!-- Country Filter -->
                <select 
                    name="country_id" 
                    onchange="this.form.submit()"
                    class="bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none cursor-pointer font-medium"
                >
                    <option value="">All Countries</option>
                    @foreach ($countries as $c)
                        <option value="{{ $c->id }}" {{ request('country_id') == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>

                <!-- Per Page Dropdown -->
                <div class="flex items-center gap-1.5 text-xs text-slate-500 font-semibold">
                    <span>Show</span>
                    <select 
                        name="per_page" 
                        onchange="this.form.submit()" 
                        class="bg-slate-50 text-xs px-2.5 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none cursor-pointer font-bold text-slate-700"
                    >
                        <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                        <option value="all" {{ request('per_page') === 'all' ? 'selected' : '' }}>All</option>
                    </select>
                    <span>per page</span>
                </div>

                <button type="submit" class="px-3.5 py-2 text-xs font-bold bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl transition-colors cursor-pointer">
                    Apply
                </button>
            </form>

            @if(request('search') || request('country_id') || (request('per_page') && request('per_page') != 10))
                <a href="{{ route('admin.utilities.state') }}" class="text-xs font-bold text-rose-500 hover:underline">
                    Reset Filters &times;
                </a>
            @endif
        </div>

        <!-- Floating Bulk Action Bar (Active when checkboxes selected) -->
        <div id="bulk-action-bar" class="hidden items-center justify-between px-6 py-3 bg-gradient-to-r from-amber-50 to-orange-50 border-b border-orange-200/80 text-xs text-orange-950 font-bold transition-all">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#EF7415] animate-ping"></span>
                <span><span id="selected-count">0</span> items selected</span>
            </div>
            <button 
                type="button" 
                onclick="submitBulkDelete()"
                class="inline-flex items-center gap-1.5 bg-rose-600 hover:bg-rose-700 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition-colors shadow-xs cursor-pointer"
            >
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                <span>Delete Selected</span>
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                        <!-- Checkbox Before Indexing -->
                        <th class="py-3.5 px-4 w-10 text-center">
                            <input 
                                type="checkbox" 
                                id="selectAllCheckbox" 
                                onchange="toggleSelectAll(this)"
                                class="w-4 h-4 rounded border-slate-300 text-[#27797D] focus:ring-[#27797D]/20 accent-[#27797D] cursor-pointer"
                            >
                        </th>
                        <th class="py-3.5 px-4 w-16">#ID</th>
                        <th class="py-3.5 px-6">State / Province Name</th>
                        <th class="py-3.5 px-6">Parent Country</th>
                        <th class="py-3.5 px-6">Cities Count</th>
                        <th class="py-3.5 px-6">Created At</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse ($states as $state)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <!-- Row Checkbox -->
                            <td class="py-3.5 px-4 text-center">
                                <input 
                                    type="checkbox" 
                                    name="selected_ids[]" 
                                    value="{{ $state->id }}" 
                                    onchange="updateSelectionBar()"
                                    class="row-checkbox w-4 h-4 rounded border-slate-300 text-[#27797D] focus:ring-[#27797D]/20 accent-[#27797D] cursor-pointer"
                                >
                            </td>
                            <td class="py-3.5 px-4 font-bold text-slate-400">
                                #{{ $state->id }}
                            </td>
                            <td class="py-3.5 px-6">
                                <span class="font-bold text-slate-900 text-sm flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-[#EF7415]"></span>
                                    <span>{{ $state->name }}</span>
                                </span>
                            </td>
                            <td class="py-3.5 px-6">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold bg-teal-50 text-[#27797D] border border-teal-200/60">
                                    🌐 {{ $state->country->name ?? 'Unknown Country' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-6">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">
                                    {{ $state->cities_count }} Cities
                                </span>
                            </td>
                            <td class="py-3.5 px-6 text-slate-400">
                                {{ $state->created_at ? $state->created_at->format('M d, Y') : 'N/A' }}
                            </td>
                            <td class="py-3.5 px-6 text-right">
                                <div class="inline-flex items-center gap-1.5">
                                    <!-- Edit Button -->
                                    <button 
                                        type="button" 
                                        onclick="openEditStateModal({{ $state->id }}, {{ $state->country_id }}, '{{ addslashes($state->name) }}')"
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-[#27797D] hover:bg-teal-50 transition-colors"
                                        title="Edit State"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </button>

                                    <!-- Delete Button -->
                                    <form id="delete-state-{{ $state->id }}" action="{{ route('admin.utilities.state.destroy', $state->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmDelete('delete-state-{{ $state->id }}', '{{ addslashes($state->name) }}')"
                                            class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer"
                                            title="Delete State"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-slate-400">
                                <div class="max-w-xs mx-auto space-y-2">
                                    <span class="text-3xl block">🗺️</span>
                                    <p class="font-bold text-slate-700">No states found</p>
                                    <p class="text-[11px] text-slate-400">Click "Add State" above to register regional states or provinces.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination (with < 1, 2 ... 10 > format) -->
        <div class="p-4 sm:p-6 border-t border-slate-100">
            {{ $states->links('admin.includes.pagination') }}
        </div>

    </div>

</div>

<!-- ==================== MODAL: ADD STATE ==================== -->
<div id="add-state-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs overflow-y-auto">
    <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-8">
        <div class="bg-gradient-to-r from-[#112347] to-[#27797D] text-white p-5 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center font-bold text-sm">
                    +
                </div>
                <div>
                    <h3 class="text-base font-bold">Add New State</h3>
                    <p class="text-[11px] text-teal-100">Associate state with a country</p>
                </div>
            </div>
            <button type="button" onclick="closeAddStateModal()" class="w-7 h-7 rounded-full bg-white/20 hover:bg-white/30 text-white flex items-center justify-center text-xs font-bold transition-colors cursor-pointer">&times;</button>
        </div>

        <form action="{{ route('admin.utilities.state.store') }}" method="POST" class="p-5 sm:p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">
                    Parent Country <span class="text-rose-500">*</span>
                </label>
                <select name="country_id" required class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium cursor-pointer">
                    <option value="">Select Country</option>
                    @foreach ($countries as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">
                    State / Province Name <span class="text-rose-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    required 
                    placeholder="e.g. Maharashtra, Delhi, Haryana, Istanbul..." 
                    class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                >
            </div>

            <div class="pt-2 flex items-center justify-end gap-2.5">
                <button type="button" onclick="closeAddStateModal()" class="px-4 py-2 text-xs font-bold text-slate-500 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2 text-xs font-bold bg-[#EF7415] hover:bg-[#d9640d] text-white rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer">
                    Save State
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ==================== MODAL: EDIT STATE ==================== -->
<div id="edit-state-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs overflow-y-auto">
    <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-8">
        <div class="bg-gradient-to-r from-[#112347] to-[#27797D] text-white p-5 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center font-bold text-sm">
                    ✎
                </div>
                <div>
                    <h3 class="text-base font-bold">Edit State</h3>
                    <p class="text-[11px] text-teal-100">Update state and country association</p>
                </div>
            </div>
            <button type="button" onclick="closeEditStateModal()" class="w-7 h-7 rounded-full bg-white/20 hover:bg-white/30 text-white flex items-center justify-center text-xs font-bold transition-colors cursor-pointer">&times;</button>
        </div>

        <form id="edit-state-form" action="" method="POST" class="p-5 sm:p-6 space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">
                    Parent Country <span class="text-rose-500">*</span>
                </label>
                <select name="country_id" id="edit-state-country-id" required class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium cursor-pointer">
                    @foreach ($countries as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">
                    State / Province Name <span class="text-rose-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="edit-state-name"
                    required 
                    class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                >
            </div>

            <div class="pt-2 flex items-center justify-end gap-2.5">
                <button type="button" onclick="closeEditStateModal()" class="px-4 py-2 text-xs font-bold text-slate-500 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2 text-xs font-bold bg-[#27797D] hover:bg-[#1e5f62] text-white rounded-xl shadow-md shadow-[#27797D]/20 transition-all cursor-pointer">
                    Update State
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openAddStateModal() {
        const modal = document.getElementById('add-state-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeAddStateModal() {
        const modal = document.getElementById('add-state-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function openEditStateModal(id, countryId, name) {
        const modal = document.getElementById('edit-state-modal');
        const form = document.getElementById('edit-state-form');
        const countrySelect = document.getElementById('edit-state-country-id');
        const nameInput = document.getElementById('edit-state-name');

        form.action = "{{ url('/admin/utilities/state') }}/" + id;
        countrySelect.value = countryId;
        nameInput.value = name;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditStateModal() {
        const modal = document.getElementById('edit-state-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function toggleSelectAll(master) {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(cb => cb.checked = master.checked);
        updateSelectionBar();
    }

    function updateSelectionBar() {
        const checked = document.querySelectorAll('.row-checkbox:checked');
        const count = checked.length;
        const bar = document.getElementById('bulk-action-bar');
        const countSpan = document.getElementById('selected-count');
        const master = document.getElementById('selectAllCheckbox');

        if (countSpan) countSpan.textContent = count;

        if (count > 0) {
            if (bar) {
                bar.classList.remove('hidden');
                bar.classList.add('flex');
            }
        } else {
            if (bar) {
                bar.classList.add('hidden');
                bar.classList.remove('flex');
            }
            if (master) master.checked = false;
        }
    }

    function submitBulkDelete() {
        const checked = document.querySelectorAll('.row-checkbox:checked');
        if (checked.length === 0) return;

        Swal.fire({
            title: 'Delete Selected States?',
            text: 'You are about to delete ' + checked.length + ' state(s). This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF7415',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, Delete ' + checked.length + ' Items!',
            cancelButtonText: 'Cancel',
            borderRadius: '16px'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('bulk-delete-form');
                form.querySelectorAll('input[name="ids[]"]').forEach(el => el.remove());
                checked.forEach(cb => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'ids[]';
                    input.value = cb.value;
                    form.appendChild(input);
                });
                form.submit();
            }
        });
    }
</script>
@endpush
@endsection
