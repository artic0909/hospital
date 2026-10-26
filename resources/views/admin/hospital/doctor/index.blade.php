@extends('admin.layouts.app')

@section('title', 'Doctors - ' . $hospital->name)

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <a href="{{ route('admin.hospital.index') }}" class="text-xs font-bold text-[#27797D] hover:underline flex items-center gap-1">
                    &larr; Hospitals
                </a>
                <span class="text-slate-300">&bull;</span>
                <a href="{{ route('admin.hospital.view', $hospital->id) }}" class="text-xs font-bold text-slate-600 hover:underline">
                    {{ $hospital->name }}
                </a>
                <span class="text-slate-300">&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $doctors->total() }} Specialists
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Doctors & Consultants Directory</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage medical faculty, OPD fees, weekly consultation schedules, and surgery counts for {{ $hospital->name }}.</p>
        </div>

        <div class="flex items-center gap-3">
            <a 
                href="{{ route('admin.hospital.doctor.create', $hospital->id) }}"
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add Doctor</span>
            </a>
        </div>
    </div>

    <!-- Hidden Bulk Delete Form -->
    <form id="bulk-delete-form" action="{{ route('admin.hospital.doctor.bulk-delete', $hospital->id) }}" method="POST" class="hidden">
        @csrf
    </form>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        
        <!-- Controls: Search & Filter Bar -->
        <div class="p-4 sm:p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <form action="{{ route('admin.hospital.doctor.index', $hospital->id) }}" method="GET" class="flex flex-wrap items-center gap-3 w-full lg:w-auto flex-1">
                
                <!-- Search Input -->
                <div class="relative w-full sm:w-64">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Search doctor, speciality, degree..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2 pl-9 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    >
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <!-- Speciality Filter -->
                <select 
                    name="spaciality" 
                    onchange="this.form.submit()"
                    class="bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none cursor-pointer font-medium max-w-[180px] truncate"
                >
                    <option value="">All Specialities</option>
                    @foreach ($specialities as $spec)
                        <option value="{{ $spec->name }}" {{ request('spaciality') === $spec->name ? 'selected' : '' }}>
                            {{ $spec->name }}
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

            @if(request('search') || request('spaciality') || (request('per_page') && request('per_page') != 10))
                <a href="{{ route('admin.hospital.doctor.index', $hospital->id) }}" class="text-xs font-bold text-rose-500 hover:underline">
                    Reset Filters &times;
                </a>
            @endif
        </div>

        <!-- Floating Bulk Action Bar (Active when checkboxes selected) -->
        <div id="bulk-action-bar" class="hidden items-center justify-between px-6 py-3 bg-gradient-to-r from-amber-50 to-orange-50 border-b border-orange-200/80 text-xs text-orange-950 font-bold transition-all">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#EF7415] animate-ping"></span>
                <span><span id="selected-count">0</span> doctors selected</span>
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
                        <th class="py-3.5 px-4 w-14">#ID</th>
                        <th class="py-3.5 px-5">Doctor</th>
                        <th class="py-3.5 px-5">Speciality & Department</th>
                        <th class="py-3.5 px-5">Experience</th>
                        <th class="py-3.5 px-5">OPD Fee</th>
                        <th class="py-3.5 px-5">Surgeries</th>
                        <th class="py-3.5 px-5">OPD Schedule</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse ($doctors as $doc)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-3.5 px-4 text-center">
                                <input 
                                    type="checkbox" 
                                    class="row-checkbox w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer"
                                    value="{{ $doc->id }}"
                                    onchange="updateSelectionBar()"
                                >
                            </td>
                            <td class="py-3.5 px-4 font-bold text-slate-400">
                                #{{ $doc->id }}
                            </td>
                            <td class="py-3.5 px-5">
                                <div class="flex items-center gap-3">
                                    @if($doc->image_url)
                                        <div class="w-10 h-10 rounded-xl overflow-hidden bg-slate-100 border border-slate-200/80 shrink-0">
                                            <img src="{{ $doc->image_url }}" alt="{{ $doc->name }}" class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div class="w-10 h-10 rounded-xl bg-teal-50 text-[#27797D] border border-teal-200 font-bold text-base flex items-center justify-center shrink-0">
                                            👨‍⚕️
                                        </div>
                                    @endif
                                    <div>
                                        <a href="{{ route('admin.hospital.doctor.view', [$hospital->id, $doc->id]) }}" class="font-extrabold text-slate-900 text-sm hover:text-[#27797D] transition-colors block leading-tight">
                                            {{ $doc->name }}
                                        </a>
                                        <span class="text-[11px] text-slate-500 block truncate max-w-xs mt-0.5">
                                            {{ $doc->designation }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-5">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-teal-50 text-[#27797D] border border-teal-200">
                                    🩺 {{ $doc->spaciality }}
                                </span>
                            </td>
                            <td class="py-3.5 px-5 font-bold text-slate-800">
                                {{ $doc->experience }} Years
                            </td>
                            <td class="py-3.5 px-5">
                                <span class="font-extrabold text-slate-900 text-sm">
                                    ₹{{ number_format($doc->OPD_fee, 2) }}
                                </span>
                            </td>
                            <td class="py-3.5 px-5 text-slate-600">
                                @if($doc->surgeries)
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-lg text-[11px] font-bold bg-amber-50 text-amber-800 border border-amber-200">
                                        ⚕️ {{ $doc->surgeries }}
                                    </span>
                                @else
                                    <span class="text-slate-300 text-[11px] italic">Not specified</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-5">
                                @if($doc->schedules->count() > 0)
                                    <div class="space-y-1">
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            🗓️ {{ $doc->schedules->count() }} Days / Week
                                        </span>
                                        <div class="text-[10px] text-slate-400 font-medium truncate max-w-[140px]" title="{{ $doc->schedules->pluck('day')->join(', ') }}">
                                            {{ $doc->schedules->pluck('day')->take(3)->join(', ') }}@if($doc->schedules->count() > 3)...@endif
                                        </div>
                                    </div>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-slate-100 text-slate-400">
                                        No Schedule Added
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-5 text-right">
                                <div class="inline-flex items-center gap-1.5">
                                    <!-- View Details Button -->
                                    <a 
                                        href="{{ route('admin.hospital.doctor.view', [$hospital->id, $doc->id]) }}"
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-[#27797D] hover:bg-teal-50 transition-colors"
                                        title="View Doctor Details & Schedule"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    <!-- Edit Button -->
                                    <a 
                                        href="{{ route('admin.hospital.doctor.update', [$hospital->id, $doc->id]) }}"
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-amber-50 transition-colors"
                                        title="Edit Doctor & Schedules"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>

                                    <!-- Delete Button -->
                                    <form id="delete-doc-{{ $doc->id }}" action="{{ route('admin.hospital.doctor.destroy', [$hospital->id, $doc->id]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmDelete('delete-doc-{{ $doc->id }}', 'Dr. {{ addslashes($doc->name) }}')"
                                            class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer"
                                            title="Delete Doctor"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-12 text-center text-slate-400">
                                <div class="max-w-xs mx-auto space-y-2">
                                    <span class="text-3xl block">👨‍⚕️</span>
                                    <p class="font-bold text-slate-700">No doctors added yet</p>
                                    <p class="text-[11px] text-slate-400">Click "Add Doctor" above to empanel specialists, consultants, and OPD timetable for {{ $hospital->name }}.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($doctors->hasPages())
            <div class="p-4 sm:p-6 border-t border-slate-100">
                {{ $doctors->links('admin.includes.pagination') }}
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
            title: `Delete ${checked.length} doctor(s)?`,
            text: 'Selected doctors and their associated schedules will be permanently removed.',
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
