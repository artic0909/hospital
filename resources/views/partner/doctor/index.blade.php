@extends('partner.layouts.app')

@section('title', 'Manage Doctors - ' . $hospital->name)

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('partner.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="text-slate-400">Doctors Directory</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Doctors & OPD Consultations</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage doctor credentials, clinical specialities, consultation fees, and weekly OPD timetables for <strong>{{ $hospital->name }}</strong>.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <a 
                href="{{ route('partner.doctor.create') }}" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add Doctor</span>
            </a>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs space-y-3">
        <form action="{{ route('partner.doctor.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <!-- Search -->
            <div class="sm:col-span-6 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search doctor by name, designation, or speciality..." 
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 pl-9 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                >
                <div class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <!-- Speciality Filter -->
            <div class="sm:col-span-3">
                <select 
                    name="spaciality" 
                    onchange="this.form.submit()"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer"
                >
                    <option value="">All Specialities</option>
                    @foreach($specialities as $sp)
                        <option value="{{ $sp->name }}" {{ request('spaciality') == $sp->name ? 'selected' : '' }}>
                            {{ $sp->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Per Page Dropdown -->
            <div class="sm:col-span-3 flex items-center justify-end gap-2">
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

                @if(request()->hasAny(['search', 'spaciality', 'per_page']))
                    <a 
                        href="{{ route('partner.doctor.index') }}" 
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
                <span>doctors</span>
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

    <!-- Doctors Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200/70 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3.5 px-4 w-10 text-center">
                            <input type="checkbox" id="select-all" class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer">
                        </th>
                        <th class="py-3.5 px-4">Doctor</th>
                        <th class="py-3.5 px-4">Speciality & Title</th>
                        <th class="py-3.5 px-4">Experience</th>
                        <th class="py-3.5 px-4">OPD Fee</th>
                        <th class="py-3.5 px-4">Weekly Schedule</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($doctors as $doc)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-3.5 px-4 text-center">
                                <input type="checkbox" name="ids[]" value="{{ $doc->id }}" class="row-checkbox w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer">
                            </td>
                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-3">
                                    <img 
                                        src="{{ $doc->image_url }}" 
                                        alt="{{ $doc->name }}" 
                                        class="w-10 h-10 rounded-xl object-cover border border-slate-200 shadow-2xs bg-white shrink-0"
                                    >
                                    <div class="truncate">
                                        <a href="{{ route('partner.doctor.view', $doc->id) }}" class="font-extrabold text-[#112347] hover:text-[#27797D] transition-colors block truncate">
                                            Dr. {{ $doc->name }}
                                        </a>
                                        <span class="text-[11px] text-slate-400 block truncate">{{ $doc->designation }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-teal-50 text-teal-800 border border-teal-200 inline-block">
                                    {{ $doc->spaciality }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 font-bold text-slate-700">
                                {{ $doc->experience }} Years
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="font-black text-amber-600">₹{{ number_format($doc->OPD_fee, 2) }}</span>
                            </td>
                            <td class="py-3.5 px-4">
                                @if($doc->schedules->count() > 0)
                                    <div class="flex flex-wrap gap-1 max-w-xs">
                                        @foreach($doc->schedules->take(3) as $sched)
                                            <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-600 text-[10px] font-semibold">
                                                {{ substr($sched->day, 0, 3) }}: {{ $sched->time_from }}
                                            </span>
                                        @endforeach
                                        @if($doc->schedules->count() > 3)
                                            <span class="px-1 py-0.5 rounded bg-teal-50 text-[#27797D] text-[10px] font-bold">
                                                +{{ $doc->schedules->count() - 3 }} more
                                            </span>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-[11px] text-slate-400 italic">No slots set</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4">
                                @if($doc->status)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        Active
                                    </span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-500">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <div class="inline-flex items-center gap-1.5">
                                    <!-- View -->
                                    <a 
                                        href="{{ route('partner.doctor.view', $doc->id) }}"
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-[#27797D] hover:bg-teal-50 transition-colors"
                                        title="View Profile"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    <!-- Edit -->
                                    <a 
                                        href="{{ route('partner.doctor.update', $doc->id) }}"
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-amber-50 transition-colors"
                                        title="Edit Doctor"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>

                                    <!-- Delete -->
                                    <form id="delete-doc-{{ $doc->id }}" action="{{ route('partner.doctor.destroy', $doc->id) }}" method="POST" class="inline">
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
                            <td colspan="8" class="text-center py-12 px-4 text-slate-400">
                                <span class="text-3xl block mb-2">👨‍⚕️</span>
                                <div class="font-bold text-slate-600 text-sm">No doctors registered yet</div>
                                <p class="text-xs text-slate-400 mt-1">Click "Add Doctor" to create your first consultant profile.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($doctors->hasPages())
            <div class="p-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                <span class="text-xs text-slate-500 font-semibold">
                    Showing {{ $doctors->firstItem() }} to {{ $doctors->lastItem() }} of {{ $doctors->total() }} doctors
                </span>
                <div>
                    {{ $doctors->links('admin.includes.pagination') }}
                </div>
            </div>
        @endif
    </div>

    <!-- Hidden Bulk Delete Form -->
    <form id="bulk-delete-form" action="{{ route('partner.doctor.bulk-delete') }}" method="POST" class="hidden">
        @csrf
        <div id="bulk-delete-inputs"></div>
    </form>

</div>

@push('scripts')
<script>
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
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: `Delete ${name}?`,
                text: "This doctor and consultation schedules will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF7415',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, delete',
                borderRadius: '16px'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        } else {
            if (confirm(`Delete ${name}? This doctor and consultation schedules will be permanently deleted.`)) {
                document.getElementById(formId).submit();
            }
        }
    }

    function confirmBulkDelete() {
        const checked = document.querySelectorAll('.row-checkbox:checked');
        if (checked.length === 0) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'info',
                    title: 'No Selection',
                    text: 'Please check at least one doctor to delete.',
                    confirmButtonColor: '#27797D'
                });
            } else {
                alert('Please select at least one doctor to delete.');
            }
            return;
        }

        const executeBulk = () => {
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
        };

        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: `Delete ${checked.length} selected doctors?`,
                text: "All selected doctors and their consultation timetables will be permanently removed!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF7415',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, delete selected',
                borderRadius: '16px'
            }).then((result) => {
                if (result.isConfirmed) {
                    executeBulk();
                }
            });
        } else {
            if (confirm(`Delete ${checked.length} selected doctors?`)) {
                executeBulk();
            }
        }
    }
</script>
@endpush
@endsection
