@extends('admin.layouts.app')

@section('title', 'Appointments Directory - Heal Go Fly Admin')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $appointments->total() }} Appointments
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Appointments Booking System</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage patient consultation appointments, hospital admissions, and doctor schedules across partners.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <a 
                href="{{ route('admin.appointment.create') }}" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Book Appointment</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-3.5 sm:gap-4">
        <!-- Total -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Total</span>
                <span class="text-xl sm:text-2xl font-black text-[#112347]">{{ number_format($stats['total']) }}</span>
            </div>
            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </div>

        <!-- Booked -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-blue-500 block mb-0.5">Booked</span>
                <span class="text-xl sm:text-2xl font-black text-[#1D4B6C]">{{ number_format($stats['booked']) }}</span>
            </div>
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1D4B6C] flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        <!-- Received -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-amber-500 block mb-0.5">Received</span>
                <span class="text-xl sm:text-2xl font-black text-amber-700">{{ number_format($stats['received']) }}</span>
            </div>
            <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        <!-- Treatment -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-purple-500 block mb-0.5">In Treatment</span>
                <span class="text-xl sm:text-2xl font-black text-purple-700">{{ number_format($stats['treatment']) }}</span>
            </div>
            <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
            </div>
        </div>

        <!-- Discharge -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-emerald-500 block mb-0.5">Discharged</span>
                <span class="text-xl sm:text-2xl font-black text-emerald-700">{{ number_format($stats['discharge']) }}</span>
            </div>
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs space-y-3">
        <form action="{{ route('admin.appointment.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <!-- Search -->
            <div class="sm:col-span-4 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search code, patient, doctor, hospital..." 
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 pl-9 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-700"
                >
                <div class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <!-- Status Filter -->
            <div class="sm:col-span-2">
                <select 
                    name="status" 
                    onchange="this.form.submit()"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer"
                >
                    <option value="">All Statuses</option>
                    <option value="booked" {{ request('status') == 'booked' ? 'selected' : '' }}>Booked</option>
                    <option value="received" {{ request('status') == 'received' ? 'selected' : '' }}>Received</option>
                    <option value="treatment" {{ request('status') == 'treatment' ? 'selected' : '' }}>In Treatment</option>
                    <option value="discharge" {{ request('status') == 'discharge' ? 'selected' : '' }}>Discharged</option>
                </select>
            </div>

            <!-- Date Filter -->
            <div class="sm:col-span-2">
                <input 
                    type="date" 
                    name="date" 
                    value="{{ request('date') }}" 
                    onchange="this.form.submit()"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer"
                    title="Filter by Appointment Date"
                >
            </div>

            <!-- Partner Filter -->
            <div class="sm:col-span-2">
                <select 
                    name="partner_id" 
                    onchange="this.form.submit()"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer truncate"
                >
                    <option value="">All Partners</option>
                    @foreach($partners as $partner)
                        <option value="{{ $partner->id }}" {{ request('partner_id') == $partner->id ? 'selected' : '' }}>
                            {{ $partner->company_name ?: $partner->name }} (#PTR-{{ str_pad($partner->id, 5, '0', STR_PAD_LEFT) }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Per Page & Actions -->
            <div class="sm:col-span-2 flex items-center gap-2">
                <select 
                    name="per_page" 
                    onchange="this.form.submit()"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-2.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer"
                >
                    <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10 / Page</option>
                    <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>20 / Page</option>
                    <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50 / Page</option>
                    <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>View All</option>
                </select>

                <button 
                    type="submit" 
                    class="bg-[#27797D] hover:bg-[#1e5f62] text-white p-2.5 rounded-xl text-xs font-bold transition-all shadow-xs shrink-0 cursor-pointer"
                    title="Search"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>

                @if(request()->hasAny(['search', 'status', 'date', 'partner_id', 'hospital_id', 'per_page']))
                <a 
                    href="{{ route('admin.appointment.index') }}" 
                    class="p-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold transition-all shrink-0 cursor-pointer"
                    title="Reset Filters"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </a>
                @endif
            </div>

        </form>

        <!-- Bulk Action Floating Ribbon -->
        <div id="bulk-action-bar" class="hidden items-center justify-between bg-teal-50/80 border border-teal-200 p-3 rounded-xl transition-all">
            <div class="flex items-center gap-2 text-xs font-bold text-teal-900">
                <span class="w-2 h-2 rounded-full bg-teal-600 animate-pulse"></span>
                <span id="bulk-selected-count">0</span> appointments selected
            </div>
            <form id="bulk-delete-form" action="{{ route('admin.appointment.bulk-delete') }}" method="POST" class="inline">
                @csrf
                <div id="bulk-hidden-inputs"></div>
                <button 
                    type="button" 
                    onclick="confirmBulkDelete()"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white rounded-lg text-xs font-bold shadow-xs transition-colors cursor-pointer"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    <span>Delete Selected</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Appointments Data Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-200 text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                        <th class="py-3.5 px-4 w-10 text-center">
                            <input 
                                type="checkbox" 
                                id="select-all-checkbox" 
                                class="rounded border-slate-300 text-[#27797D] focus:ring-[#27797D] cursor-pointer"
                            >
                        </th>
                        <th class="py-3.5 px-4">Code</th>
                        <th class="py-3.5 px-4">Patient</th>
                        <th class="py-3.5 px-4">Doctor & Partner</th>
                        <th class="py-3.5 px-4">Hospital</th>
                        <th class="py-3.5 px-4">Schedule</th>
                        <th class="py-3.5 px-4 text-center">Status</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($appointments as $apt)
                    <tr class="hover:bg-slate-50/60 transition-colors group">
                        
                        <!-- Checkbox -->
                        <td class="py-3.5 px-4 text-center">
                            <input 
                                type="checkbox" 
                                name="appointment_ids[]" 
                                value="{{ $apt->id }}" 
                                class="appointment-checkbox rounded border-slate-300 text-[#27797D] focus:ring-[#27797D] cursor-pointer"
                            >
                        </td>

                        <!-- Code -->
                        <td class="py-3.5 px-4 font-mono font-bold">
                            <a href="{{ route('admin.appointment.view', $apt->id) }}" class="text-[#27797D] hover:underline">
                                #{{ $apt->appointment_code }}
                            </a>
                        </td>

                        <!-- Patient -->
                        <td class="py-3.5 px-4">
                            @if($apt->patient)
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-xl overflow-hidden bg-slate-100 border border-slate-200 shrink-0">
                                    <img 
                                        src="{{ $apt->patient->image_url }}" 
                                        alt="{{ $apt->patient->name }}" 
                                        class="w-full h-full object-cover"
                                        onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($apt->patient->name) }}&background=27797D&color=fff';"
                                    >
                                </div>
                                <div class="truncate">
                                    <a href="{{ route('admin.patient.view', $apt->patient->id) }}" class="font-bold text-[#112347] hover:text-[#27797D] block truncate">
                                        {{ $apt->patient->name }}
                                    </a>
                                    <span class="text-[10px] text-slate-400 block truncate">
                                        {{ $apt->patient->phone ?: ($apt->patient->email ?: 'No contact') }}
                                    </span>
                                </div>
                            </div>
                            @else
                                <span class="text-slate-400 italic">Unknown Patient</span>
                            @endif
                        </td>

                        <!-- Doctor & Partner -->
                        <td class="py-3.5 px-4">
                            @if($apt->doctor)
                                <div class="font-bold text-[#112347] flex items-center gap-1.5">
                                    <span>👨‍⚕️</span>
                                    <span>{{ $apt->doctor->name }}</span>
                                </div>
                                <div class="text-[11px] text-[#27797D] font-medium mt-0.5">
                                    {{ $apt->doctor->spaciality ?: ($apt->doctor->designation ?: 'Specialist') }}
                                </div>
                                @if($apt->partner)
                                    <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1">
                                        <span class="font-semibold text-slate-500">Partner:</span>
                                        <span class="truncate">{{ $apt->partner->company_name ?: $apt->partner->name }}</span>
                                    </div>
                                @endif
                            @else
                                <span class="text-slate-400 italic">Doctor Unassigned</span>
                            @endif
                        </td>

                        <!-- Hospital -->
                        <td class="py-3.5 px-4">
                            @if($apt->hospital)
                                <div class="font-semibold text-slate-800 flex items-center gap-1">
                                    <span>🏥</span>
                                    <span class="truncate">{{ $apt->hospital->name }}</span>
                                </div>
                                @if($apt->hospital->city)
                                    <span class="text-[10px] text-slate-400 block">{{ $apt->hospital->city->name ?? '' }}</span>
                                @endif
                            @else
                                <span class="text-slate-400 italic">Hospital Not Set</span>
                            @endif
                        </td>

                        <!-- Schedule Date & Time -->
                        <td class="py-3.5 px-4 text-slate-600">
                            <div class="font-semibold">
                                {{ $apt->appointment_date ? $apt->appointment_date->format('M d, Y') : 'Date TBD' }}
                            </div>
                            <div class="text-[11px] text-slate-400">
                                {{ $apt->appointment_time ?: 'Standard OPD' }}
                            </div>
                        </td>

                        <!-- Status Badge + Quick Switcher -->
                        <td class="py-3.5 px-4 text-center">
                            <form action="{{ route('admin.appointment.update-status', $apt->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <select 
                                    name="status" 
                                    onchange="this.form.submit()" 
                                    class="text-xs font-bold px-2.5 py-1 rounded-xl border cursor-pointer focus:outline-none transition-all {{ $apt->status_badge_class }}"
                                >
                                    <option value="booked" {{ $apt->status === 'booked' ? 'selected' : '' }}>Booked</option>
                                    <option value="received" {{ $apt->status === 'received' ? 'selected' : '' }}>Received</option>
                                    <option value="treatment" {{ $apt->status === 'treatment' ? 'selected' : '' }}>In Treatment</option>
                                    <option value="discharge" {{ $apt->status === 'discharge' ? 'selected' : '' }}>Discharged</option>
                                </select>
                            </form>
                        </td>

                        <!-- Actions -->
                        <td class="py-3.5 px-4 text-right">
                            <div class="inline-flex items-center gap-1.5">
                                <!-- View -->
                                <a 
                                    href="{{ route('admin.appointment.view', $apt->id) }}" 
                                    class="p-2 rounded-lg text-slate-400 hover:text-[#27797D] hover:bg-teal-50 transition-colors"
                                    title="View Appointment Dossier"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>

                                <!-- Edit -->
                                <a 
                                    href="{{ route('admin.appointment.update', $apt->id) }}" 
                                    class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 transition-colors"
                                    title="Edit Appointment"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>

                                <!-- Delete -->
                                <button 
                                    type="button" 
                                    onclick="confirmDelete('{{ route('admin.appointment.destroy', $apt->id) }}', '{{ $apt->appointment_code }}')"
                                    class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer"
                                    title="Delete Appointment"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="py-14 text-center">
                            <div class="max-w-sm mx-auto space-y-3">
                                <div class="w-16 h-16 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center mx-auto">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <h3 class="text-base font-extrabold text-[#112347]">No Appointments Scheduled</h3>
                                <p class="text-xs text-slate-400">Schedule appointments with partner-affiliated doctors and hospitals for registered patients.</p>
                                <a 
                                    href="{{ route('admin.appointment.create') }}" 
                                    class="inline-flex items-center gap-2 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all shadow-xs cursor-pointer"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                    <span>Book First Appointment</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($appointments->hasPages())
        <div class="p-4 border-t border-slate-100 flex items-center justify-between">
            <span class="text-xs text-slate-400 font-medium">
                Showing {{ $appointments->firstItem() }} to {{ $appointments->lastItem() }} of {{ $appointments->total() }} appointments
            </span>
            <div>
                {{ $appointments->links() }}
            </div>
        </div>
        @endif
    </div>

    <!-- Hidden Form for Single Delete -->
    <form id="single-delete-form" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</div>

@push('scripts')
<script>
    // 1. Bulk Select & Delete Management
    const selectAllCheckbox = document.getElementById('select-all-checkbox');
    const appointmentCheckboxes = document.querySelectorAll('.appointment-checkbox');
    const bulkActionBar = document.getElementById('bulk-action-bar');
    const bulkSelectedCount = document.getElementById('bulk-selected-count');
    const bulkHiddenInputs = document.getElementById('bulk-hidden-inputs');

    function updateBulkToolbar() {
        const checked = Array.from(appointmentCheckboxes).filter(cb => cb.checked);
        const count = checked.length;
        bulkSelectedCount.textContent = count;

        if (count > 0) {
            bulkActionBar.classList.remove('hidden');
            bulkActionBar.classList.add('flex');
            bulkHiddenInputs.innerHTML = '';
            checked.forEach(cb => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'ids[]';
                input.value = cb.value;
                bulkHiddenInputs.appendChild(input);
            });
        } else {
            bulkActionBar.classList.add('hidden');
            bulkActionBar.classList.remove('flex');
            bulkHiddenInputs.innerHTML = '';
        }

        if (selectAllCheckbox) {
            selectAllCheckbox.checked = count === appointmentCheckboxes.length && count > 0;
            selectAllCheckbox.indeterminate = count > 0 && count < appointmentCheckboxes.length;
        }
    }

    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function () {
            appointmentCheckboxes.forEach(cb => cb.checked = selectAllCheckbox.checked);
            updateBulkToolbar();
        });
    }

    appointmentCheckboxes.forEach(cb => {
        cb.addEventListener('change', updateBulkToolbar);
    });

    // 2. SweetAlert2 Delete Confirmations
    function confirmDelete(url, code) {
        Swal.fire({
            title: 'Delete Appointment?',
            html: `Are you sure you want to delete appointment <strong>#${code}</strong>?<br><span class="text-xs text-rose-500 font-medium">This action cannot be undone.</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            customClass: {
                popup: 'rounded-3xl shadow-2xl border border-slate-100',
                confirmButton: 'font-bold px-5 py-2.5 rounded-xl shadow-md',
                cancelButton: 'font-bold px-5 py-2.5 rounded-xl'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('single-delete-form');
                form.action = url;
                form.submit();
            }
        });
    }

    function confirmBulkDelete() {
        const count = document.querySelectorAll('.appointment-checkbox:checked').length;
        Swal.fire({
            title: `Delete ${count} Selected Appointments?`,
            html: `Are you sure you want to delete <strong>${count}</strong> appointment(s)?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, Delete All Selected',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            customClass: {
                popup: 'rounded-3xl shadow-2xl border border-slate-100',
                confirmButton: 'font-bold px-5 py-2.5 rounded-xl shadow-md',
                cancelButton: 'font-bold px-5 py-2.5 rounded-xl'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('bulk-delete-form').submit();
            }
        });
    }
</script>
@endpush
@endsection

