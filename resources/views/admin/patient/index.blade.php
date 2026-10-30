@extends('admin.layouts.app')

@section('title', 'Patients Directory - Heal Go Fly Admin')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $patients->total() }} Patients
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Patients Directory</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage patient health dossiers, international case files, and diagnostic reports.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <a 
                href="{{ route('admin.patient.create') }}" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add Patient</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total Patients -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Total Patients</span>
                <span class="text-2xl sm:text-3xl font-black text-[#112347]">{{ number_format($stats['total']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </div>

        <!-- Patients with Reports -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">With Reports</span>
                <span class="text-2xl sm:text-3xl font-black text-emerald-700">{{ number_format($stats['with_reports']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>

        <!-- Total Medical Reports -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Attached Reports</span>
                <span class="text-2xl sm:text-3xl font-black text-[#27797D]">{{ number_format($stats['total_reports']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-[#27797D]/10 text-[#27797D] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>

        <!-- Registered This Month -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">New This Month</span>
                <span class="text-2xl sm:text-3xl font-black text-[#EF7415]">{{ number_format($stats['this_month']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs space-y-3">
        <form action="{{ route('admin.patient.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <!-- Search -->
            <div class="sm:col-span-6 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search by name, phone, email, country, city..." 
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 pl-9 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-700"
                >
                <div class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <!-- Country Filter -->
            <div class="sm:col-span-3">
                <select 
                    name="country" 
                    onchange="this.form.submit()"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer"
                >
                    <option value="">All Countries</option>
                    @foreach($filterCountries as $c)
                        <option value="{{ $c }}" {{ request('country') == $c ? 'selected' : '' }}>
                            {{ $c }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Per Page & Actions -->
            <div class="sm:col-span-3 flex items-center gap-2">
                <select 
                    name="per_page" 
                    onchange="this.form.submit()"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer"
                >
                    <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10 / Page</option>
                    <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>20 / Page</option>
                    <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50 / Page</option>
                    <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>View All</option>
                </select>

                <button 
                    type="submit" 
                    class="bg-[#27797D] hover:bg-[#1e5f62] text-white px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all shadow-xs shrink-0 cursor-pointer"
                    title="Search"
                >
                    Search
                </button>

                @if(request()->hasAny(['search', 'country', 'per_page']))
                <a 
                    href="{{ route('admin.patient.index') }}" 
                    class="p-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold transition-all shrink-0 cursor-pointer"
                    title="Reset Filter"
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
                <span id="bulk-selected-count">0</span> patients selected
            </div>
            <form id="bulk-delete-form" action="{{ route('admin.patient.bulk-delete') }}" method="POST" class="inline">
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

    <!-- Patients Data Table Card -->
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
                        <th class="py-3.5 px-4">Patient Profile</th>
                        <th class="py-3.5 px-4">Contact Info</th>
                        <th class="py-3.5 px-4">Location</th>
                        <th class="py-3.5 px-4 text-center">Reports</th>
                        <th class="py-3.5 px-4">Joined Date</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($patients as $patient)
                    <tr class="hover:bg-slate-50/60 transition-colors group">
                        
                        <!-- Checkbox -->
                        <td class="py-3.5 px-4 text-center">
                            <input 
                                type="checkbox" 
                                name="patient_ids[]" 
                                value="{{ $patient->id }}" 
                                class="patient-checkbox rounded border-slate-300 text-[#27797D] focus:ring-[#27797D] cursor-pointer"
                            >
                        </td>

                        <!-- Patient Profile -->
                        <td class="py-3.5 px-4">
                            <div class="flex items-center gap-3">
                                <div class="relative w-11 h-11 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200/80 shrink-0">
                                    <img 
                                        src="{{ $patient->image_url }}" 
                                        alt="{{ $patient->name }}" 
                                        class="w-full h-full object-cover"
                                        loading="lazy"
                                        onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($patient->name) }}&background=27797D&color=fff';"
                                    >
                                </div>
                                <div class="truncate">
                                    <a href="{{ route('admin.patient.view', $patient->id) }}" class="font-bold text-[#112347] hover:text-[#27797D] transition-colors text-sm block truncate">
                                        {{ $patient->name }}
                                    </a>
                                    <span class="inline-flex items-center gap-1 text-[10px] font-mono font-bold text-slate-400 mt-0.5">
                                        #PT-{{ str_pad($patient->id, 5, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>
                            </div>
                        </td>

                        <!-- Contact Info -->
                        <td class="py-3.5 px-4">
                            <div class="space-y-1">
                                @if($patient->phone)
                                <a href="tel:{{ $patient->phone }}" class="flex items-center gap-1.5 text-slate-600 hover:text-[#27797D] font-medium transition-colors">
                                    <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    <span>{{ $patient->phone }}</span>
                                </a>
                                @endif

                                @if($patient->email)
                                <a href="mailto:{{ $patient->email }}" class="flex items-center gap-1.5 text-slate-500 hover:text-[#27797D] transition-colors truncate max-w-[200px]">
                                    <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    <span class="truncate">{{ $patient->email }}</span>
                                </a>
                                @endif

                                @if(!$patient->phone && !$patient->email)
                                <span class="text-slate-400 italic">No contact details</span>
                                @endif
                            </div>
                        </td>

                        <!-- Location -->
                        <td class="py-3.5 px-4">
                            <div class="flex items-start gap-1.5 text-slate-600">
                                <svg class="w-3.5 h-3.5 text-slate-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <div>
                                    <div class="font-semibold text-slate-800">{{ $patient->country ?? 'Global' }}</div>
                                    <div class="text-[11px] text-slate-400">
                                        {{ implode(', ', array_filter([$patient->city, $patient->state])) ?: 'City not specified' }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Medical Reports Count Badge -->
                        <td class="py-3.5 px-4 text-center">
                            <a 
                                href="{{ route('admin.patient.report.index', $patient->id) }}" 
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-xl font-bold text-xs transition-all {{ $patient->reports_count > 0 ? 'bg-teal-50 text-[#27797D] hover:bg-[#27797D] hover:text-white border border-teal-200/80 shadow-xs' : 'bg-slate-100 text-slate-400 hover:bg-slate-200 hover:text-slate-700' }}"
                                title="Manage Medical Reports"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <span>{{ $patient->reports_count }} {{ Str::plural('Report', $patient->reports_count) }}</span>
                            </a>
                        </td>

                        <!-- Joined Date -->
                        <td class="py-3.5 px-4 text-slate-500 font-medium">
                            <div>{{ $patient->created_at->format('M d, Y') }}</div>
                            <div class="text-[10px] text-slate-400">{{ $patient->created_at->diffForHumans() }}</div>
                        </td>

                        <!-- Actions -->
                        <td class="py-3.5 px-4 text-right">
                            <div class="inline-flex items-center gap-1.5">
                                
                                <!-- Appointment Booking -->
                                <a 
                                    href="{{ route('admin.appointment.create', ['patient_id' => $patient->id]) }}" 
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-xl text-xs font-bold bg-[#EF7415] hover:bg-[#d9640d] text-white shadow-xs hover:shadow transition-all whitespace-nowrap cursor-pointer mr-1"
                                    title="Book Appointment for {{ $patient->name }}"
                                >
                                    <svg class="w-3.5 h-3.5 text-white shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>Appointment Booking</span>
                                </a>

                                <!-- View Profile -->
                                <a 
                                    href="{{ route('admin.patient.view', $patient->id) }}" 
                                    class="p-2 rounded-lg text-slate-400 hover:text-[#27797D] hover:bg-teal-50 transition-colors"
                                    title="View Dossier"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>

                                <!-- Medical Reports -->
                                <a 
                                    href="{{ route('admin.patient.report.index', $patient->id) }}" 
                                    class="p-2 rounded-lg text-slate-400 hover:text-teal-600 hover:bg-teal-50 transition-colors"
                                    title="Upload & View Reports"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </a>

                                <!-- Edit -->
                                <a 
                                    href="{{ route('admin.patient.update', $patient->id) }}" 
                                    class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 transition-colors"
                                    title="Edit Patient"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>

                                <!-- Delete -->
                                <button 
                                    type="button" 
                                    onclick="confirmDelete('{{ route('admin.patient.destroy', $patient->id) }}', '{{ addslashes($patient->name) }}')"
                                    class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer"
                                    title="Delete Patient"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center">
                            <div class="max-w-sm mx-auto space-y-3">
                                <div class="w-16 h-16 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </div>
                                <h3 class="text-base font-bold text-slate-800">No Patients Registered Yet</h3>
                                <p class="text-xs text-slate-400">Add patients directly to track international clinical treatments, diagnostic files, and investigations.</p>
                                <a 
                                    href="{{ route('admin.patient.create') }}" 
                                    class="inline-flex items-center gap-2 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold px-4 py-2 rounded-xl transition-all shadow-xs cursor-pointer"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                    <span>Register First Patient</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($patients->hasPages())
        <div class="p-4 border-t border-slate-100 flex items-center justify-between">
            <span class="text-xs text-slate-400 font-medium">
                Showing {{ $patients->firstItem() }} to {{ $patients->lastItem() }} of {{ $patients->total() }} patients
            </span>
            <div>
                {{ $patients->links() }}
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
    const patientCheckboxes = document.querySelectorAll('.patient-checkbox');
    const bulkActionBar = document.getElementById('bulk-action-bar');
    const bulkSelectedCount = document.getElementById('bulk-selected-count');
    const bulkHiddenInputs = document.getElementById('bulk-hidden-inputs');

    function updateBulkToolbar() {
        const checked = Array.from(patientCheckboxes).filter(cb => cb.checked);
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
            selectAllCheckbox.checked = count === patientCheckboxes.length && count > 0;
            selectAllCheckbox.indeterminate = count > 0 && count < patientCheckboxes.length;
        }
    }

    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function () {
            patientCheckboxes.forEach(cb => cb.checked = selectAllCheckbox.checked);
            updateBulkToolbar();
        });
    }

    patientCheckboxes.forEach(cb => {
        cb.addEventListener('change', updateBulkToolbar);
    });

    // 2. SweetAlert2 Delete Confirmations
    function confirmDelete(url, name) {
        Swal.fire({
            title: 'Delete Patient Profile?',
            html: `Are you sure you want to delete <strong>${name}</strong>?<br><span class="text-xs text-rose-500 font-medium">All attached medical reports and dossiers will be permanently removed.</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, Delete Patient',
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
        const count = document.querySelectorAll('.patient-checkbox:checked').length;
        Swal.fire({
            title: `Delete ${count} Selected Patients?`,
            html: `Are you sure you want to delete <strong>${count}</strong> patient profile(s)?<br><span class="text-xs text-rose-500 font-medium">All selected dossiers and their medical reports will be permanently deleted.</span>`,
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
