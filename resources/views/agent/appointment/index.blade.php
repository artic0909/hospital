@extends('agent.layouts.app')

@section('title', 'Appointments & Status Tracking - Heal Go Fly Referral Partner Portal')

@section('content')
<div class="space-y-6">

    <!-- Header Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('agent.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                    {{ $appointments->total() }} Appointments
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Appointments & Treatment Journey</h1>
            <p class="text-xs text-slate-500 mt-0.5">Real-time status tracking for your referred patients, updated directly by HealGoFly clinical admin desk.</p>
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

    <!-- Quick Stats Cards (Clickable Filter Pills) -->
    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
        <!-- All -->
        <a href="{{ route('agent.appointment.index') }}" class="p-4 rounded-2xl border transition-all {{ !request('status') ? 'bg-[#112347] text-white border-[#112347] shadow-sm' : 'bg-white border-slate-200 hover:border-slate-300' }}">
            <span class="text-[10px] uppercase font-bold tracking-wider block {{ !request('status') ? 'text-teal-200' : 'text-slate-400' }}">All</span>
            <span class="text-xl font-black block mt-0.5">{{ number_format($stats['total'] ?? 0) }}</span>
        </a>

        <!-- Booked -->
        <a href="{{ route('agent.appointment.index', ['status' => 'booked']) }}" class="p-4 rounded-2xl border transition-all {{ request('status') === 'booked' ? 'bg-amber-500 text-white border-amber-500 shadow-sm' : 'bg-white border-slate-200 hover:border-amber-300' }}">
            <span class="text-[10px] uppercase font-bold tracking-wider block {{ request('status') === 'booked' ? 'text-amber-100' : 'text-amber-700' }}">1. Booked</span>
            <span class="text-xl font-black block mt-0.5">{{ number_format($stats['booked'] ?? 0) }}</span>
        </a>

        <!-- Received -->
        <a href="{{ route('agent.appointment.index', ['status' => 'received']) }}" class="p-4 rounded-2xl border transition-all {{ request('status') === 'received' ? 'bg-blue-600 text-white border-blue-600 shadow-sm' : 'bg-white border-slate-200 hover:border-blue-300' }}">
            <span class="text-[10px] uppercase font-bold tracking-wider block {{ request('status') === 'received' ? 'text-blue-100' : 'text-blue-700' }}">2. Received</span>
            <span class="text-xl font-black block mt-0.5">{{ number_format($stats['received'] ?? 0) }}</span>
        </a>

        <!-- In Treatment -->
        <a href="{{ route('agent.appointment.index', ['status' => 'treatment']) }}" class="p-4 rounded-2xl border transition-all {{ request('status') === 'treatment' ? 'bg-indigo-600 text-white border-indigo-600 shadow-sm' : 'bg-white border-slate-200 hover:border-indigo-300' }}">
            <span class="text-[10px] uppercase font-bold tracking-wider block {{ request('status') === 'treatment' ? 'text-indigo-100' : 'text-indigo-700' }}">3. Treatment</span>
            <span class="text-xl font-black block mt-0.5">{{ number_format($stats['treatment'] ?? 0) }}</span>
        </a>

        <!-- Discharged -->
        <a href="{{ route('agent.appointment.index', ['status' => 'discharge']) }}" class="p-4 rounded-2xl border transition-all {{ request('status') === 'discharge' ? 'bg-emerald-600 text-white border-emerald-600 shadow-sm' : 'bg-white border-slate-200 hover:border-emerald-300' }}">
            <span class="text-[10px] uppercase font-bold tracking-wider block {{ request('status') === 'discharge' ? 'text-emerald-100' : 'text-emerald-700' }}">4. Discharged</span>
            <span class="text-xl font-black block mt-0.5">{{ number_format($stats['discharge'] ?? 0) }}</span>
        </a>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white p-4 sm:p-5 rounded-3xl border border-slate-200/80 shadow-xs">
        <form method="GET" action="{{ route('agent.appointment.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <!-- Search bar -->
            <div class="sm:col-span-5 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search by code, patient name, doctor, hospital..." 
                    class="w-full pl-10 pr-4 py-2.5 text-xs text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                >
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <!-- Status Filter -->
            <div class="sm:col-span-3">
                <select 
                    name="status" 
                    class="w-full px-3 py-2.5 text-xs text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                    onchange="this.form.submit()"
                >
                    <option value="">All Care Stages</option>
                    <option value="booked" {{ request('status') === 'booked' ? 'selected' : '' }}>1. Booked</option>
                    <option value="received" {{ request('status') === 'received' ? 'selected' : '' }}>2. Received / Arrived</option>
                    <option value="treatment" {{ request('status') === 'treatment' ? 'selected' : '' }}>3. Under Treatment</option>
                    <option value="discharge" {{ request('status') === 'discharge' ? 'selected' : '' }}>4. Discharged</option>
                </select>
            </div>

            <!-- Date Filter -->
            <div class="sm:col-span-2">
                <input 
                    type="date" 
                    name="date" 
                    value="{{ request('date') }}"
                    class="w-full px-3 py-2 text-xs text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                    onchange="this.form.submit()"
                >
            </div>

            <!-- Submit & Reset Buttons -->
            <div class="sm:col-span-2 flex items-center gap-2 justify-end">
                <button 
                    type="submit" 
                    class="px-4 py-2.5 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold rounded-xl transition-colors cursor-pointer w-full sm:w-auto text-center"
                >
                    Filter
                </button>
                @if(request()->hasAny(['search', 'status', 'date']))
                    <a 
                        href="{{ route('agent.appointment.index') }}" 
                        class="px-3 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors whitespace-nowrap"
                        title="Clear filters"
                    >
                        Reset
                    </a>
                @endif
            </div>

        </form>
    </div>

    <!-- Appointments Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-4 px-5">Appointment Code</th>
                        <th class="py-4 px-4">Patient</th>
                        <th class="py-4 px-4">Hospital</th>
                        <th class="py-4 px-4">Doctor / Specialty</th>
                        <th class="py-4 px-4">Schedule Date</th>
                        <th class="py-4 px-4">Care Journey Status</th>
                        <th class="py-4 px-5 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($appointments as $appt)
                        @php
                            $statusClasses = [
                                'booked' => 'bg-amber-50 text-amber-800 border-amber-200',
                                'received' => 'bg-blue-50 text-blue-800 border-blue-200',
                                'treatment' => 'bg-indigo-50 text-indigo-800 border-indigo-200',
                                'discharge' => 'bg-emerald-50 text-emerald-800 border-emerald-200',
                            ];
                            $badge = $statusClasses[$appt->status] ?? 'bg-slate-100 text-slate-700 border-slate-200';
                        @endphp
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            
                            <!-- Appointment Code -->
                            <td class="py-4 px-5">
                                <a href="{{ route('agent.appointment.view', $appt->id) }}" class="font-mono font-bold text-[#27797D] hover:underline text-xs sm:text-sm">
                                    #{{ $appt->appointment_code }}
                                </a>
                            </td>

                            <!-- Patient -->
                            <td class="py-4 px-4">
                                @if($appt->patient)
                                    <div>
                                        <a href="{{ route('agent.patient.view', $appt->patient->id) }}" class="font-bold text-[#112347] hover:text-[#27797D]">
                                            {{ $appt->patient->name }}
                                        </a>
                                        <span class="block text-[10px] text-slate-400 mt-0.5">📞 {{ $appt->patient->phone }}</span>
                                    </div>
                                @else
                                    <span class="text-slate-400 italic">Not set</span>
                                @endif
                            </td>

                            <!-- Hospital -->
                            <td class="py-4 px-4">
                                <div class="font-semibold text-slate-800">
                                    {{ $appt->hospital->name ?? 'Hospital to be confirmed' }}
                                </div>
                            </td>

                            <!-- Doctor -->
                            <td class="py-4 px-4">
                                <div class="font-semibold text-slate-800">
                                    {{ $appt->doctor->name ?? 'Doctor to be confirmed' }}
                                </div>
                                @if($appt->doctor && $appt->doctor->spaciality)
                                    <span class="text-[10px] text-slate-400 block">{{ $appt->doctor->spaciality }}</span>
                                @endif
                            </td>

                            <!-- Date / Time -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div class="font-bold text-[#112347]">
                                    {{ $appt->appointment_date ? \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y') : 'Pending' }}
                                </div>
                                @if($appt->appointment_time)
                                    <span class="text-[10px] text-slate-400 block">⏰ {{ $appt->appointment_time }}</span>
                                @endif
                            </td>

                            <!-- Care Status Badge -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold border uppercase tracking-wider {{ $badge }}">
                                    {{ ucfirst($appt->status) }}
                                </span>
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-5 text-right whitespace-nowrap">
                                <a 
                                    href="{{ route('agent.appointment.view', $appt->id) }}" 
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-[#27797D] hover:text-white text-xs font-bold text-slate-700 transition-colors"
                                >
                                    <span>Details</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center">
                                <div class="w-14 h-14 rounded-2xl bg-slate-100 text-slate-400 mx-auto flex items-center justify-center mb-3">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <h4 class="text-sm font-bold text-slate-700">No appointments scheduled</h4>
                                <p class="text-xs text-slate-400 mt-1 max-w-sm mx-auto">
                                    When HealGoFly medical administration coordinates appointments or hospital admissions for your registered patients, they will be listed here.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($appointments->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $appointments->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
