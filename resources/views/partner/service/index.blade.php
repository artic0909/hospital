@extends('partner.layouts.app')

@section('title', 'Hospital Services - ' . $hospital->name)

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('partner.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="text-slate-400">Hospital Services</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Hospital Services & Amenities</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage patient care, food services, language support, transportation, and finance services for <strong>{{ $hospital->name }}</strong>.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <button 
                type="button" 
                onclick="openCreateServiceModal()"
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add Service</span>
            </button>
        </div>
    </div>

    <!-- Category Pill Filter Tabs -->
    <div class="bg-white p-3 rounded-2xl border border-slate-200/80 shadow-xs overflow-x-auto">
        <div class="flex items-center gap-2 min-w-max">
            <a 
                href="{{ route('partner.service.index', request()->only(['search', 'per_page'])) }}" 
                class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 {{ !request('category') ? 'bg-[#27797D] text-white shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}"
            >
                <span>All Services</span>
                <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ !request('category') ? 'bg-white/20 text-white' : 'bg-slate-200 text-slate-700' }}">
                    {{ array_sum($categoryCounts) }}
                </span>
            </a>

            @foreach($categories as $cat)
                @php
                    $count = $categoryCounts[$cat] ?? 0;
                    $isActive = request('category') === $cat;
                @endphp
                <a 
                    href="{{ route('partner.service.index', array_merge(request()->only(['search', 'per_page']), ['category' => $cat])) }}" 
                    class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 {{ $isActive ? 'bg-[#27797D] text-white shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}"
                >
                    <span>{{ $cat }}</span>
                    @if($count > 0)
                        <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ $isActive ? 'bg-white/20 text-white' : 'bg-teal-100 text-teal-800' }}">
                            {{ $count }}
                        </span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs space-y-3">
        <form action="{{ route('partner.service.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            <!-- Search -->
            <div class="sm:col-span-8 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search services (e.g. Private Rooms, Halal Food, Airport Pickup, Insurance TPA...)" 
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

                @if(request()->hasAny(['search', 'category', 'per_page']))
                    <a 
                        href="{{ route('partner.service.index') }}" 
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
                <span>services</span>
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

    <!-- Services Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200/70 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3.5 px-4 w-10 text-center">
                            <input type="checkbox" id="select-all" class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer">
                        </th>
                        <th class="py-3.5 px-4 w-52">Service Category</th>
                        <th class="py-3.5 px-4">Service Details / Facility Name</th>
                        <th class="py-3.5 px-4">Hospital</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($services as $serv)
                        @php
                            $catColors = [
                                'Comfort During Stay' => 'bg-emerald-50 text-emerald-800 border-emerald-200',
                                'Food Services' => 'bg-amber-50 text-amber-800 border-amber-200',
                                'Money Matters' => 'bg-blue-50 text-blue-800 border-blue-200',
                                'Patient Support' => 'bg-purple-50 text-purple-800 border-purple-200',
                                'Transportation' => 'bg-indigo-50 text-indigo-800 border-indigo-200',
                                'Diagnostics' => 'bg-rose-50 text-rose-800 border-rose-200',
                                'Language Support' => 'bg-teal-50 text-teal-800 border-teal-200',
                            ];
                            $badgeColor = $catColors[$serv->category] ?? 'bg-slate-50 text-slate-800 border-slate-200';
                        @endphp
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-3.5 px-4 text-center">
                                <input type="checkbox" name="ids[]" value="{{ $serv->id }}" class="row-checkbox w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer">
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold border inline-block {{ $badgeColor }}">
                                    {{ $serv->category }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 font-bold text-[#112347] text-sm">
                                {{ $serv->name }}
                            </td>
                            <td class="py-3.5 px-4 text-slate-500 font-medium">
                                {{ $hospital->name }}
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <div class="inline-flex items-center gap-1.5">
                                    <button 
                                        type="button" 
                                        onclick="openEditServiceModal({{ $serv->id }}, '{{ addslashes($serv->category) }}', '{{ addslashes($serv->name) }}')"
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-amber-50 transition-colors cursor-pointer"
                                        title="Edit Service"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </button>

                                    <form id="delete-serv-{{ $serv->id }}" action="{{ route('partner.service.destroy', $serv->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmDelete('delete-serv-{{ $serv->id }}', '{{ addslashes($serv->name) }}')"
                                            class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer"
                                            title="Delete Service"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-12 px-4 text-slate-400">
                                <span class="text-3xl block mb-2">🛎️</span>
                                <div class="font-bold text-slate-600 text-sm">No services registered in this category</div>
                                <p class="text-xs text-slate-400 mt-1">Click "Add Service" to add patient amenities for {{ $hospital->name }}.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($services->hasPages())
            <div class="p-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                <span class="text-xs text-slate-500 font-semibold">
                    Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} of {{ $services->total() }} services
                </span>
                <div>
                    {{ $services->links('admin.includes.pagination') }}
                </div>
            </div>
        @endif
    </div>

    <!-- Hidden Bulk Delete Form -->
    <form id="bulk-delete-form" action="{{ route('partner.service.bulk-delete') }}" method="POST" class="hidden">
        @csrf
        <div id="bulk-delete-inputs"></div>
    </form>

    <!-- Create Service Modal -->
    <div id="create-service-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full border border-slate-200 shadow-2xl p-6 sm:p-7 space-y-5 animate-in fade-in zoom-in-95 duration-150">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] font-bold text-sm flex items-center justify-center">🛎️</span>
                    <h3 class="text-base font-extrabold text-[#112347]">Add Hospital Service</h3>
                </div>
                <button type="button" onclick="closeCreateServiceModal()" class="text-slate-400 hover:text-slate-600 text-xl font-bold">&times;</button>
            </div>

            <form action="{{ route('partner.service.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Service Category <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="category" 
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-bold text-slate-700 cursor-pointer"
                    >
                        <option value="">-- Choose Category --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Service Name / Feature <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        required 
                        placeholder="e.g. Arabic & Russian Interpreters, Airport Ambulance, Halal Meals..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <div class="flex items-center justify-end gap-2.5 pt-2 border-t border-slate-100">
                    <button 
                        type="button" 
                        onclick="closeCreateServiceModal()" 
                        class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="px-5 py-2 text-xs font-bold bg-[#EF7415] hover:bg-[#d9640d] text-white rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                    >
                        Save Service
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Service Modal -->
    <div id="edit-service-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full border border-slate-200 shadow-2xl p-6 sm:p-7 space-y-5 animate-in fade-in zoom-in-95 duration-150">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 font-bold text-sm flex items-center justify-center">✏️</span>
                    <h3 class="text-base font-extrabold text-[#112347]">Edit Service</h3>
                </div>
                <button type="button" onclick="closeEditServiceModal()" class="text-slate-400 hover:text-slate-600 text-xl font-bold">&times;</button>
            </div>

            <form id="edit-service-form" action="" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Service Category <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="category" 
                        id="edit-service-category"
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-bold text-slate-700 cursor-pointer"
                    >
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Service Name / Feature <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="edit-service-name"
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <div class="flex items-center justify-end gap-2.5 pt-2 border-t border-slate-100">
                    <button 
                        type="button" 
                        onclick="closeEditServiceModal()" 
                        class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="px-5 py-2 text-xs font-bold bg-[#EF7415] hover:bg-[#d9640d] text-white rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                    >
                        Update Service
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@push('scripts')
<script>
    function openCreateServiceModal() {
        document.getElementById('create-service-modal').classList.remove('hidden');
    }

    function closeCreateServiceModal() {
        document.getElementById('create-service-modal').classList.add('hidden');
    }

    function openEditServiceModal(id, category, name) {
        document.getElementById('edit-service-form').action = `/partner/service/${id}`;
        document.getElementById('edit-service-category').value = category;
        document.getElementById('edit-service-name').value = name;
        document.getElementById('edit-service-modal').classList.remove('hidden');
    }

    function closeEditServiceModal() {
        document.getElementById('edit-service-modal').classList.add('hidden');
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
            title: `Delete service?`,
            text: `Are you sure you want to delete "${name}"?`,
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
            title: `Delete ${checked.length} selected services?`,
            text: "All selected services will be removed from your hospital profile!",
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
