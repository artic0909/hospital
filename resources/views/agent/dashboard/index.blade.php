@extends('agent.layouts.app')

@section('title', 'Referral Partner Dashboard - Heal Go Fly')

@section('content')
<div class="space-y-6 sm:space-y-8">
    
    <!-- ==================== 1. WELCOME HERO BANNER ==================== -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#112347] via-[#1D4B6C] to-[#27797D] p-6 sm:p-8 text-white shadow-xl shadow-[#112347]/10 border border-slate-700/50">
        <!-- Background Lighting Glows -->
        <div class="absolute -right-12 -bottom-12 w-72 h-72 bg-[#27797D]/30 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute right-1/3 -top-16 w-56 h-56 bg-[#EF7415]/20 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            
            <!-- Left: Avatar + Title & Meta -->
            <div class="flex items-start sm:items-center gap-4 sm:gap-5">
                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-2xl sm:text-3xl font-extrabold text-[#EF7415] shadow-inner shrink-0">
                    {{ strtoupper(substr($agent->name ?? 'A', 0, 1)) }}
                </div>
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-1.5">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            {{ ucfirst($agent->status ?? 'active') }} Referral Partner
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-mono font-bold bg-amber-400 text-[#112347] border border-amber-300">
                            {{ $agent->agent_code }}
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white/15 text-white border border-white/20">
                            {{ $agent->agent_type ?? 'Healthcare Facilitator' }}
                        </span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-black tracking-tight text-white">
                        Welcome, {{ $agent->name ?? 'Partner' }}
                    </h1>
                    <p class="text-teal-100 text-xs sm:text-sm mt-0.5 font-medium flex items-center gap-2 flex-wrap">
                        <span class="font-bold text-white">{{ $agent->company_name ?? 'Authorized Referral Partner / Business Head' }}</span>
                        @if($agent->country)
                            <span>&bull;</span>
                            <span>{{ $agent->country }}</span>
                        @endif
                        <span>&bull;</span>
                        <span class="text-teal-200">{{ $agent->email }}</span>
                    </p>
                </div>
            </div>

            <!-- Right: Fast Actions -->
            <div class="flex items-center gap-3 w-full lg:w-auto shrink-0">
                <a 
                    href="{{ route('agent.patient.create') }}" 
                    class="flex-1 lg:flex-initial inline-flex items-center justify-center gap-2 px-5 py-3 rounded-2xl bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-extrabold shadow-lg shadow-[#EF7415]/30 transition-all transform hover:-translate-y-0.5 cursor-pointer whitespace-nowrap"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    <span>Register Patient</span>
                </a>
                <a 
                    href="{{ route('agent.patient.index') }}" 
                    class="flex-1 lg:flex-initial inline-flex items-center justify-center gap-2 px-4 py-3 rounded-2xl bg-white/10 hover:bg-white/20 text-white text-xs sm:text-sm font-bold border border-white/20 backdrop-blur-md transition-all whitespace-nowrap"
                >
                    <span>My Patients</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

        </div>
    </div>

    <!-- ==================== 2. PRIMARY METRICS ==================== -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        
        <!-- Total Patients -->
        <a href="{{ route('agent.patient.index') }}" class="group bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all hover:border-[#27797D]/50 flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Total Patients</span>
                <span class="text-2xl sm:text-3xl font-black text-[#112347] group-hover:text-[#27797D] transition-colors">
                    {{ number_format($stats['total_patients'] ?? 0) }}
                </span>
                <span class="text-[11px] text-teal-600 font-bold block mt-1">Managed Dossiers &rarr;</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
        </a>

        <!-- Total Appointments -->
        <a href="{{ route('agent.appointment.index') }}" class="group bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all hover:border-[#EF7415]/50 flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Appointments</span>
                <span class="text-2xl sm:text-3xl font-black text-[#112347] group-hover:text-[#EF7415] transition-colors">
                    {{ number_format($stats['total_appointments'] ?? 0) }}
                </span>
                <span class="text-[11px] text-amber-600 font-bold block mt-1">Care Tracking &rarr;</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </a>

        <!-- Under Treatment -->
        <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Under Treatment</span>
                <span class="text-2xl sm:text-3xl font-black text-indigo-700">
                    {{ number_format($stats['in_treatment'] ?? 0) }}
                </span>
                <span class="text-[11px] text-slate-400 font-medium block mt-1">Active hospital admissions</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
            </div>
        </div>

        <!-- Discharged / Completed -->
        <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Discharged</span>
                <span class="text-2xl sm:text-3xl font-black text-emerald-700">
                    {{ number_format($stats['discharged'] ?? 0) }}
                </span>
                <span class="text-[11px] text-slate-400 font-medium block mt-1">Successfully treated</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

    </div>

    <!-- ==================== 3. REAL-TIME CARE PIPELINE ==================== -->
    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-sm font-bold text-[#112347] uppercase tracking-wider">Patient Care Pipeline</h3>
                <p class="text-xs text-slate-500">Live treatment stage progression monitored and updated by HealGoFly clinical admin</p>
            </div>
            <a href="{{ route('agent.appointment.index') }}" class="text-xs font-bold text-[#27797D] hover:underline">
                View All Appointments &rarr;
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <!-- Stage 1: Booked -->
            <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200/60">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-amber-800">1. Booked</span>
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                </div>
                <div class="text-2xl font-black text-amber-900">{{ $stats['booked'] ?? 0 }}</div>
                <p class="text-[11px] text-amber-700 mt-1">Appointment confirmed</p>
            </div>

            <!-- Stage 2: Received -->
            <div class="p-4 rounded-2xl bg-blue-50/70 border border-blue-200/60">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-blue-800">2. Received / Arrived</span>
                    <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                </div>
                <div class="text-2xl font-black text-blue-900">{{ $stats['received'] ?? 0 }}</div>
                <p class="text-[11px] text-blue-700 mt-1">Arrived at destination hospital</p>
            </div>

            <!-- Stage 3: Treatment -->
            <div class="p-4 rounded-2xl bg-indigo-50/70 border border-indigo-200/60">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-indigo-800">3. Under Treatment</span>
                    <span class="w-2.5 h-2.5 rounded-full bg-indigo-500"></span>
                </div>
                <div class="text-2xl font-black text-indigo-900">{{ $stats['in_treatment'] ?? 0 }}</div>
                <p class="text-[11px] text-indigo-700 mt-1">Active surgery / therapy</p>
            </div>

            <!-- Stage 4: Discharge -->
            <div class="p-4 rounded-2xl bg-emerald-50/70 border border-emerald-200/60">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-emerald-800">4. Discharged</span>
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                </div>
                <div class="text-2xl font-black text-emerald-900">{{ $stats['discharged'] ?? 0 }}</div>
                <p class="text-[11px] text-emerald-700 mt-1">Recovered & discharged</p>
            </div>
        </div>
    </div>

    <!-- ==================== 4. RECENT PATIENTS & RECENT APPOINTMENTS ==================== -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8">
        
        <!-- Recent Patients Card -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden flex flex-col justify-between">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-base font-extrabold text-[#112347]">My Recent Patients</h3>
                    <p class="text-xs text-slate-500">Your registered international patients</p>
                </div>
                <a href="{{ route('agent.patient.index') }}" class="text-xs font-bold text-[#27797D] hover:underline">
                    View All ({{ $stats['total_patients'] ?? 0 }}) &rarr;
                </a>
            </div>

            <div class="divide-y divide-slate-100 flex-1">
                @forelse($recentPatients as $patient)
                    <div class="p-4 hover:bg-slate-50 transition-colors flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-10 h-10 rounded-xl bg-slate-100 border border-slate-200 overflow-hidden shrink-0">
                                @if($patient->image && file_exists(public_path($patient->image)))
                                    <img src="{{ asset($patient->image) }}" alt="{{ $patient->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-teal-50 text-[#27797D] font-bold text-sm">
                                        {{ strtoupper(substr($patient->name, 0, 1)) }}
                                    </div>
                                @endif
                            </div>
                            <div class="min-w-0">
                                <h4 class="text-xs font-bold text-slate-800 truncate">{{ $patient->name }}</h4>
                                <div class="flex items-center gap-2 text-[11px] text-slate-500 mt-0.5 flex-wrap">
                                    <span>📞 {{ $patient->phone }}</span>
                                    @if($patient->country)
                                        <span>&bull;</span>
                                        <span>🌍 {{ $patient->country }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 shrink-0">
                            @if($patient->reports_count > 0)
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                                    {{ $patient->reports_count }} {{ Str::plural('report', $patient->reports_count) }}
                                </span>
                            @endif
                            <a 
                                href="{{ route('agent.patient.view', $patient->id) }}" 
                                class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-[#27797D] hover:text-white text-xs font-bold text-slate-700 transition-colors"
                            >
                                View
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center">
                        <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-400 mx-auto flex items-center justify-center mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                        <p class="text-xs font-bold text-slate-700">No patients registered yet</p>
                        <p class="text-[11px] text-slate-400 mt-1 max-w-xs mx-auto">Register your first patient dossier to start receiving hospital quotes and appointments.</p>
                        <a 
                            href="{{ route('agent.patient.create') }}" 
                            class="inline-flex items-center gap-1.5 mt-4 px-4 py-2 rounded-xl bg-[#27797D] text-white text-xs font-bold hover:bg-[#1e5f62] transition-colors"
                        >
                            + Add Patient
                        </a>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Appointments Card -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden flex flex-col justify-between">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-base font-extrabold text-[#112347]">Recent Care Appointments</h3>
                    <p class="text-xs text-slate-500">Live clinical appointments managed by Admin</p>
                </div>
                <a href="{{ route('agent.appointment.index') }}" class="text-xs font-bold text-[#27797D] hover:underline">
                    View All ({{ $stats['total_appointments'] ?? 0 }}) &rarr;
                </a>
            </div>

            <div class="divide-y divide-slate-100 flex-1">
                @forelse($recentAppointments as $appointment)
                    <div class="p-4 hover:bg-slate-50 transition-colors flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="font-mono text-xs font-bold text-[#27797D]">#{{ $appointment->appointment_code }}</span>
                                @php
                                    $statusClasses = [
                                        'booked' => 'bg-amber-50 text-amber-700 border-amber-200',
                                        'received' => 'bg-blue-50 text-blue-700 border-blue-200',
                                        'treatment' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                                        'discharge' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                    ];
                                    $badge = $statusClasses[$appointment->status] ?? 'bg-slate-100 text-slate-700 border-slate-200';
                                @endphp
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold border uppercase tracking-wider {{ $badge }}">
                                    {{ $appointment->status }}
                                </span>
                            </div>
                            <h4 class="text-xs font-bold text-slate-800 truncate">
                                {{ $appointment->patient->name ?? 'Patient' }}
                            </h4>
                            <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                                {{ $appointment->hospital->name ?? 'Hospital' }} &bull; {{ $appointment->doctor->name ?? 'Doctor' }}
                            </p>
                        </div>

                        <div class="text-right shrink-0">
                            <span class="text-xs font-bold text-slate-700 block">
                                {{ $appointment->appointment_date ? \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') : 'Date TBD' }}
                            </span>
                            <a 
                                href="{{ route('agent.appointment.view', $appointment->id) }}" 
                                class="inline-block mt-1 text-[11px] font-bold text-[#27797D] hover:underline"
                            >
                                Details &rarr;
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center">
                        <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-400 mx-auto flex items-center justify-center mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <p class="text-xs font-bold text-slate-700">No appointments scheduled yet</p>
                        <p class="text-[11px] text-slate-400 mt-1 max-w-xs mx-auto">When HealGoFly admin coordinates doctor consultations or hospital admissions for your patients, they will appear here in real-time.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
