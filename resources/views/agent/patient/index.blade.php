@extends('agent.layouts.app')

@section('title', 'My Patients Directory - Heal Go Fly Agent Portal')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('agent.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $patients->total() }} Patients
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">My Patients Directory</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage your registered international patients, upload diagnostic medical records, and track their hospital care journey.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <a 
                href="{{ route('agent.patient.create') }}" 
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
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">My Patients</span>
                <span class="text-2xl sm:text-3xl font-black text-[#112347]">{{ number_format($stats['total'] ?? $stats['total_patients'] ?? 0) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
        </div>

        <!-- Patients with Reports -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">With Reports</span>
                <span class="text-2xl sm:text-3xl font-black text-emerald-700">{{ number_format($stats['with_reports'] ?? 0) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        <!-- Total Diagnostic Reports -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Total Reports</span>
                <span class="text-2xl sm:text-3xl font-black text-[#27797D]">{{ number_format($stats['total_reports'] ?? 0) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
        </div>

        <!-- Added This Month -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">This Month</span>
                <span class="text-2xl sm:text-3xl font-black text-amber-600">{{ number_format($stats['this_month'] ?? 0) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-[#EF7415] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white p-4 sm:p-5 rounded-3xl border border-slate-200/80 shadow-xs">
        <form method="GET" action="{{ route('agent.patient.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <!-- Search bar -->
            <div class="sm:col-span-6 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search by patient name, phone, email, city..." 
                    class="w-full pl-10 pr-4 py-2.5 text-xs text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                >
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <!-- Country Filter -->
            <div class="sm:col-span-3">
                <select 
                    name="country" 
                    class="w-full px-3 py-2.5 text-xs text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                    onchange="this.form.submit()"
                >
                    <option value="">All Countries</option>
                    @foreach($filterCountries as $countryName)
                        <option value="{{ $countryName }}" {{ request('country') == $countryName ? 'selected' : '' }}>{{ $countryName }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Buttons -->
            <div class="sm:col-span-3 flex items-center gap-2 justify-end">
                <button 
                    type="submit" 
                    class="px-4 py-2.5 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold rounded-xl transition-colors cursor-pointer w-full sm:w-auto text-center"
                >
                    Filter
                </button>
                @if(request()->hasAny(['search', 'country']))
                    <a 
                        href="{{ route('agent.patient.index') }}" 
                        class="px-3 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors whitespace-nowrap"
                        title="Clear filters"
                    >
                        Reset
                    </a>
                @endif
            </div>

        </form>
    </div>

    <!-- Patients Data Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-4 px-5">Patient Dossier</th>
                        <th class="py-4 px-4">Contact</th>
                        <th class="py-4 px-4">Location</th>
                        <th class="py-4 px-4 text-center">Reports</th>
                        <th class="py-4 px-4">Care Journey Status</th>
                        <th class="py-4 px-4 text-slate-400">Registered</th>
                        <th class="py-4 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($patients as $patient)
                        @php
                            $latestAppt = $patient->appointments->first();
                            $statusClasses = [
                                'booked' => 'bg-amber-50 text-amber-700 border-amber-200',
                                'received' => 'bg-blue-50 text-blue-700 border-blue-200',
                                'treatment' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                                'discharge' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                            ];
                        @endphp
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            
                            <!-- Patient Name & Photo -->
                            <td class="py-4 px-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-2xl bg-slate-100 border border-slate-200 overflow-hidden shrink-0">
                                        @if($patient->image && file_exists(public_path($patient->image)))
                                            <img src="{{ asset($patient->image) }}" alt="{{ $patient->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-teal-50 text-[#27797D] font-bold text-sm">
                                                {{ strtoupper(substr($patient->name, 0, 1)) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <a href="{{ route('agent.patient.view', $patient->id) }}" class="font-extrabold text-[#112347] hover:text-[#27797D] text-xs sm:text-sm">
                                            {{ $patient->name }}
                                        </a>
                                        <span class="block text-[10px] font-mono text-slate-400 mt-0.5">ID: #PT-{{ str_pad($patient->id, 5, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                </div>
                            </td>

                            <!-- Contact Info -->
                            <td class="py-4 px-4">
                                <div class="space-y-0.5">
                                    <a href="tel:{{ $patient->phone }}" class="text-xs font-semibold text-slate-800 hover:text-[#27797D] block">
                                        📞 {{ $patient->phone }}
                                    </a>
                                    @if($patient->email)
                                        <span class="text-[11px] text-slate-500 block truncate max-w-[160px]">
                                            ✉️ {{ $patient->email }}
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <!-- Location -->
                            <td class="py-4 px-4">
                                <div class="text-xs text-slate-700 font-medium">
                                    @if($patient->country)
                                        <span class="font-bold text-[#112347]">{{ $patient->country }}</span>
                                    @else
                                        <span class="text-slate-400">-</span>
                                    @endif
                                    @if($patient->city)
                                        <span class="text-[11px] text-slate-400 block">{{ $patient->city }}</span>
                                    @endif
                                </div>
                            </td>

                            <!-- Medical Reports Count -->
                            <td class="py-4 px-4 text-center">
                                @if($patient->reports_count > 0)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        <span>{{ $patient->reports_count }}</span>
                                    </span>
                                @else
                                    <span class="text-[11px] text-slate-400 italic">None</span>
                                @endif
                            </td>

                            <!-- Care Journey Status -->
                            <td class="py-4 px-4">
                                @if($latestAppt)
                                    <div class="space-y-1">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold border uppercase tracking-wider {{ $statusClasses[$latestAppt->status] ?? 'bg-slate-100 text-slate-700' }}">
                                            {{ $latestAppt->status }}
                                        </span>
                                        <a href="{{ route('agent.appointment.view', $latestAppt->id) }}" class="block text-[11px] font-bold text-[#27797D] hover:underline truncate max-w-[150px]">
                                            #{{ $latestAppt->appointment_code }}
                                        </a>
                                    </div>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-slate-100 text-slate-500">
                                        Pending Admin Schedule
                                    </span>
                                @endif
                            </td>

                            <!-- Date Created -->
                            <td class="py-4 px-4 text-slate-500 whitespace-nowrap">
                                {{ $patient->created_at->format('M d, Y') }}
                            </td>

                            <!-- Action Buttons -->
                            <td class="py-4 px-5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <!-- View Dossier -->
                                    <a 
                                        href="{{ route('agent.patient.view', $patient->id) }}" 
                                        class="p-2 rounded-xl bg-slate-100 hover:bg-[#27797D] hover:text-white text-slate-600 transition-colors"
                                        title="View Patient Dossier"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    <!-- Edit -->
                                    <a 
                                        href="{{ route('agent.patient.update', $patient->id) }}" 
                                        class="p-2 rounded-xl bg-slate-100 hover:bg-amber-500 hover:text-white text-slate-600 transition-colors"
                                        title="Edit Patient Details"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>

                                    <!-- Delete with SweetAlert2 confirmation -->
                                    <form action="{{ route('agent.patient.destroy', $patient->id) }}" method="POST" class="inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmPatientDelete(this, '{{ addslashes($patient->name) }}')"
                                            class="p-2 rounded-xl bg-slate-100 hover:bg-rose-500 hover:text-white text-slate-600 transition-colors cursor-pointer"
                                            title="Delete Patient"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center">
                                <div class="w-14 h-14 rounded-2xl bg-slate-100 text-slate-400 mx-auto flex items-center justify-center mb-3">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </div>
                                <h4 class="text-sm font-bold text-slate-700">No patients found</h4>
                                <p class="text-xs text-slate-400 mt-1">Try adjusting your search filters or register a new patient dossier.</p>
                                <a 
                                    href="{{ route('agent.patient.create') }}" 
                                    class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-xl bg-[#27797D] text-white text-xs font-bold hover:bg-[#1e5f62] transition-colors"
                                >
                                    + Add New Patient
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($patients->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $patients->links() }}
            </div>
        @endif
    </div>

</div>

@push('scripts')
<script>
    function confirmPatientDelete(button, patientName) {
        Swal.fire({
            title: 'Delete Patient?',
            text: `Are you sure you want to delete patient "${patientName}"? All attached diagnostic reports and history will be permanently deleted.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('form').submit();
            }
        });
    }
</script>
@endpush
@endsection
