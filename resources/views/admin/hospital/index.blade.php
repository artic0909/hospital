@extends('admin.layouts.app')

@section('title', 'Hospital Management - Admin Portal')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="text-xs font-bold uppercase tracking-wider text-[#27797D]">Network & Directory</span>
                <span class="text-slate-300">&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $hospitals->total() }} Partner Hospitals
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Hospitals Directory</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage empanelled partner hospitals, medical infrastructure, category classification, and locations.</p>
        </div>

        <div class="flex items-center gap-3">
            <a 
                href="{{ route('admin.hospital.create') }}"
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add Hospital</span>
            </a>
        </div>
    </div>

    <!-- Hidden Bulk Delete Form -->
    <form id="bulk-delete-form" action="{{ route('admin.hospital.bulk-delete') }}" method="POST" class="hidden">
        @csrf
    </form>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        
        <!-- Controls: Search & Multi-Filters Bar -->
        <div class="p-4 sm:p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <form action="{{ route('admin.hospital.index') }}" method="GET" class="flex flex-wrap items-center gap-3 w-full lg:w-auto flex-1">
                
                <!-- Search Input -->
                <div class="relative w-full sm:w-64">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Search name, code, contact, email..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2 pl-9 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    >
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <!-- Category Filter -->
                <select 
                    name="hospital_category_id" 
                    onchange="this.form.submit()"
                    class="bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none cursor-pointer font-medium max-w-[170px] truncate"
                >
                    <option value="">All Categories</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('hospital_category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>

                <!-- Country Filter -->
                <select 
                    name="country_id" 
                    onchange="this.form.submit()"
                    class="bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none cursor-pointer font-medium max-w-[160px] truncate"
                >
                    <option value="">All Countries</option>
                    @foreach ($countries as $ctry)
                        <option value="{{ $ctry->id }}" {{ request('country_id') == $ctry->id ? 'selected' : '' }}>
                            {{ $ctry->name }}
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
                        <option value="20" {{ request('per_page', 20) == 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ request('per_page', 50) == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page', 100) == 100 ? 'selected' : '' }}>100</option>
                        <option value="all" {{ request('per_page') === 'all' ? 'selected' : '' }}>All</option>
                    </select>
                    <span>per page</span>
                </div>

                <button type="submit" class="px-3.5 py-2 text-xs font-bold bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl transition-colors cursor-pointer">
                    Apply
                </button>
            </form>

            @if(request('search') || request('hospital_category_id') || request('country_id') || (request('per_page') && request('per_page') != 10))
                <a href="{{ route('admin.hospital.index') }}" class="text-xs font-bold text-rose-500 hover:underline">
                    Reset Filters &times;
                </a>
            @endif
        </div>

        <!-- Floating Bulk Action Bar (Active when checkboxes selected) -->
        <div id="bulk-action-bar" class="hidden items-center justify-between px-6 py-3 bg-gradient-to-r from-amber-50 to-orange-50 border-b border-orange-200/80 text-xs text-orange-950 font-bold transition-all">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#EF7415] animate-ping"></span>
                <span><span id="selected-count">0</span> hospitals selected</span>
            </div>
            <button 
                type="button" 
                onclick="submitBulkDelete()"
                class="inline-flex items-center gap-1.5 bg-rose-600 hover:bg-rose-700 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition-colors shadow-xs cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                <span>Delete Selected</span>
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3.5 px-4 w-10 text-center">
                            <input 
                                type="checkbox" 
                                id="selectAllCheckbox" 
                                onchange="toggleSelectAll(this)"
                                class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer"
                            >
                        </th>
                        <th class="py-3.5 px-4 w-16">#ID</th>
                        <th class="py-3.5 px-5">Code</th>
                        <th class="py-3.5 px-5">Hospital Name</th>
                        <th class="py-3.5 px-5">Category</th>
                        <th class="py-3.5 px-5">Location</th>
                        <th class="py-3.5 px-5">Contact & Email</th>
                        <th class="py-3.5 px-5">Doctors & OPD</th>
                        <th class="py-3.5 px-5">Beds</th>
                        <th class="py-3.5 px-5">Est. Year</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse ($hospitals as $hosp)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-3.5 px-4 text-center">
                                <input 
                                    type="checkbox" 
                                    class="row-checkbox w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer"
                                    value="{{ $hosp->id }}"
                                    onchange="updateSelectionBar()"
                                >
                            </td>
                            <td class="py-3.5 px-4 font-bold text-slate-400">
                                #{{ $hosp->id }}
                            </td>
                            <td class="py-3.5 px-5">
                                <span class="font-mono text-[11px] font-bold px-2 py-0.5 rounded-md bg-teal-50 text-[#27797D] border border-teal-200">
                                    {{ $hosp->code }}
                                </span>
                            </td>
                            <td class="py-3.5 px-5">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-sm font-bold shrink-0">
                                        🏥
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.hospital.view', $hosp->id) }}" class="font-bold text-slate-900 text-sm hover:text-[#27797D] transition-colors block leading-tight">
                                            {{ $hosp->name }}
                                        </a>
                                        <span class="text-[11px] text-slate-400 block truncate max-w-xs">
                                            {{ Str::limit($hosp->address, 35) }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-5">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-50 text-amber-800 border border-amber-200">
                                    🏷️ {{ $hosp->category->name ?? 'General' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-5">
                                <div class="text-xs">
                                    <span class="font-bold text-slate-800 block">{{ $hosp->city->name ?? 'N/A' }}</span>
                                    <span class="text-[11px] text-slate-400 block">{{ $hosp->state->name ?? '' }}, {{ $hosp->country->name ?? '' }}</span>
                                </div>
                            </td>
                            <td class="py-3.5 px-5">
                                <div class="space-y-0.5 text-xs">
                                    <span class="font-semibold text-slate-900 block flex items-center gap-1">
                                        📞 {{ $hosp->contact }}
                                    </span>
                                    @if($hosp->email)
                                        <span class="text-slate-400 text-[11px] block flex items-center gap-1">
                                            ✉️ {{ $hosp->email }}
                                        </span>
                                    @else
                                        <span class="text-slate-300 text-[10px] italic">No email</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3.5 px-5">
                                <div class="inline-flex items-center gap-1.5">
                                    <a 
                                        href="{{ route('admin.hospital.doctor.index', $hosp->id) }}"
                                        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-xl text-xs font-bold bg-teal-50 hover:bg-teal-100 text-[#27797D] border border-teal-200 transition-colors shadow-2xs"
                                        title="View Doctors Directory"
                                    >
                                        <span>👨‍⚕️</span>
                                        <span>{{ $hosp->doctors_count }} Doctors</span>
                                    </a>
                                   
                                </div>
                            </td>
                            <td class="py-3.5 px-5">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    🛏️ {{ number_format($hosp->no_of_bed) }}
                                </span>
                            </td>
                            <td class="py-3.5 px-5 text-slate-600 font-semibold">
                                {{ $hosp->establish_year }}
                            </td>
                            <td class="py-3.5 px-5 text-right">
                                <div class="inline-flex items-center gap-1.5">
                                    <!-- Power Button: One-Click Access Partner Dashboard as this Hospital -->
                                    <a 
                                        href="{{ route('admin.hospital.login-as-partner', $hosp->id) }}"
                                        target="_blank"
                                        class="p-1.5 rounded-lg text-emerald-600 hover:text-white hover:bg-emerald-600 bg-emerald-50/80 border border-emerald-200 transition-all shadow-2xs group/power"
                                        title="Power Button: Go / Login Partner Dashboard as {{ $hosp->name }}"
                                    >
                                        <svg class="w-4 h-4 transition-transform group-hover/power:scale-110" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
                                        </svg>
                                    </a>

                                    <!-- Add Doctor Shortcut Button -->
                                    <a 
                                        href="{{ route('admin.hospital.doctor.create', $hosp->id) }}"
                                        class="p-1.5 rounded-lg text-[#EF7415] hover:bg-orange-50 transition-colors"
                                        title="Add Doctor"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                                    </a>

                                    <!-- View Details Button -->
                                    <a 
                                        href="{{ route('admin.hospital.view', $hosp->id) }}"
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-[#27797D] hover:bg-teal-50 transition-colors"
                                        title="View Hospital Details"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    <!-- Edit Button -->
                                    <a 
                                        href="{{ route('admin.hospital.update', $hosp->id) }}"
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-amber-50 transition-colors"
                                        title="Edit Hospital"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>

                                    <!-- Delete Button -->
                                    <form id="delete-hosp-{{ $hosp->id }}" action="{{ route('admin.hospital.destroy', $hosp->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmDelete('delete-hosp-{{ $hosp->id }}', '{{ addslashes($hosp->name) }} ({{ $hosp->code }})')"
                                            class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer"
                                            title="Delete Hospital"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="py-12 text-center text-slate-400">
                                <div class="max-w-xs mx-auto space-y-2">
                                    <span class="text-3xl block">🏥</span>
                                    <p class="font-bold text-slate-700">No partner hospitals found</p>
                                    <p class="text-[11px] text-slate-400">Click "Add Hospital" above to empanel a new partner hospital in the network.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($hospitals->hasPages())
            <div class="p-4 sm:p-6 border-t border-slate-100">
                {{ $hospitals->links('admin.includes.pagination') }}
            </div>
        @endif

    </div>

</div>

@push('scripts')
<script>
    function toggleSelectAll(master) {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(cb => cb.checked = master.checked);
        updateSelectionBar();
    }

    function updateSelectionBar() {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        const checked = document.querySelectorAll('.row-checkbox:checked');
        const countSpan = document.getElementById('selected-count');
        const bar = document.getElementById('bulk-action-bar');
        const master = document.getElementById('selectAllCheckbox');

        if (countSpan) countSpan.textContent = checked.length;

        if (checked.length > 0) {
            bar.classList.remove('hidden');
            bar.classList.add('flex');
        } else {
            bar.classList.add('hidden');
            bar.classList.remove('flex');
        }

        if (master) {
            master.checked = checkboxes.length > 0 && checked.length === checkboxes.length;
            master.indeterminate = checked.length > 0 && checked.length < checkboxes.length;
        }
    }

    function submitBulkDelete() {
        const checked = document.querySelectorAll('.row-checkbox:checked');
        if (checked.length === 0) return;

        Swal.fire({
            title: `Delete ${checked.length} hospital(s)?`,
            text: 'Selected hospitals and all their doctors, facilities, and records will be permanently removed.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#94A3B8',
            confirmButtonText: 'Yes, delete all',
            cancelButtonText: 'Cancel',
            borderRadius: '1.25rem'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('bulk-delete-form');
                form.querySelectorAll('input[name="ids[]"]').forEach(el => el.remove());

                checked.forEach(cb => {
                    const hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = 'ids[]';
                    hidden.value = cb.value;
                    form.appendChild(hidden);
                });

                form.submit();
            }
        });
    }
</script>
@endpush
@endsection
