@extends('admin.layouts.app')

@section('title', 'Referral Partner Dossier: ' . $agent->name . ' (' . $agent->agent_code . ') - Admin Portal')

@section('content')
<div class="space-y-6">

    <!-- Top Navigation & Profile Hero Banner -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs relative overflow-hidden">
        <!-- Subtle background accent -->
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-teal-500/5 rounded-full blur-2xl pointer-events-none"></div>

        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 relative z-10">
            <!-- Left Info -->
            <div class="flex items-start gap-4">
                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-3xl bg-gradient-to-br from-[#27797D] to-[#112347] text-white flex items-center justify-center font-black text-2xl sm:text-3xl shadow-md shrink-0">
                    {{ strtoupper(substr($agent->name, 0, 1)) }}
                </div>
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-1">
                        <span class="text-xs font-bold text-slate-400">
                            <a href="{{ route('admin.agent.index') }}" class="text-[#27797D] hover:underline">&larr; Referral Partners Directory</a>
                        </span>
                        <span class="text-slate-300">&bull;</span>
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-mono font-bold bg-teal-50 text-teal-800 border border-teal-200">
                            {{ $agent->agent_code }}
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold {{ $agent->status === 'active' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-rose-50 text-rose-700 border border-rose-200' }}">
                            {{ ucfirst($agent->status) }}
                        </span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-black text-[#112347] tracking-tight">
                        {{ $agent->name }}
                    </h1>

                    @if($agent->company_name)
                        <p class="text-sm font-semibold text-slate-600 mt-0.5 flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <span>{{ $agent->company_name }}</span>
                        </p>
                    @endif

                    <div class="flex flex-wrap items-center gap-4 mt-2 text-xs text-slate-500 font-medium">
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            {{ $agent->email }}
                        </span>
                        <span class="flex items-center gap-1 font-mono">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            {{ $agent->phone }}
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $agent->country }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Right Action CTAs (Power Login + Edit + Delete) -->
            <div class="flex flex-wrap items-center gap-3 shrink-0">
                <!-- Power Login Direct CTA -->
                <a 
                    href="{{ route('admin.agent.login-direct', $agent->id) }}" 
                    target="_blank"
                    class="px-4 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-white text-xs font-black shadow-md shadow-amber-500/20 hover:shadow-lg transition-all transform hover:-translate-y-0.5 inline-flex items-center gap-2 cursor-pointer"
                    title="Direct impersonation login into this partner's portal"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span>⚡ Power Direct Login</span>
                </a>

                <!-- Edit Profile CTA -->
                <a 
                    href="{{ route('admin.agent.update', $agent->id) }}" 
                    class="px-4 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 transition-colors shadow-2xs inline-flex items-center gap-1.5"
                >
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span>Edit Profile</span>
                </a>

                <!-- Delete Action -->
                <form 
                    action="{{ route('admin.agent.destroy', $agent->id) }}" 
                    method="POST" 
                    class="inline-block"
                    onsubmit="return confirmDeleteAgent(event, '{{ $agent->name }}', '{{ $agent->agent_code }}')"
                >
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        class="px-3.5 py-2.5 rounded-xl border border-rose-200 bg-rose-50/50 hover:bg-rose-100/80 text-xs font-bold text-rose-700 transition-colors cursor-pointer inline-flex items-center gap-1.5"
                        title="Delete this partner"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        <span class="hidden sm:inline">Delete</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Quick Metrics Overview -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total Patients -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Referred Patients</span>
                <span class="text-2xl sm:text-3xl font-black text-[#112347]">{{ number_format($agent->patients_count ?? 0) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
        </div>

        <!-- Total Appointments -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Appointments</span>
                <span class="text-2xl sm:text-3xl font-black text-amber-600">{{ number_format($agent->appointments_count ?? 0) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </div>

        <!-- Facilitator Type -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Facilitator Type</span>
                <span class="text-sm font-black text-slate-800 line-clamp-1" title="{{ $agent->agent_type }}">{{ $agent->agent_type }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
        </div>

        <!-- Country -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Country</span>
                <span class="text-sm font-black text-slate-800 line-clamp-1" title="{{ $agent->country }}">{{ $agent->country }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left Column: Referral Partner Dossier Specifications -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
                <h3 class="text-sm font-black uppercase tracking-wider text-[#112347] pb-3 border-b border-slate-100 flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#27797D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>
                    <span>Partner Profile Details</span>
                </h3>

                <div class="space-y-4 text-xs">
                    <!-- Partner Code -->
                    <div>
                        <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Partner Reference ID</span>
                        <span class="font-mono font-bold text-slate-800 text-sm">{{ $agent->agent_code }}</span>
                    </div>

                    <!-- Full Name -->
                    <div>
                        <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Full Name</span>
                        <span class="font-bold text-slate-800">{{ $agent->name }}</span>
                    </div>

                    <!-- Company -->
                    <div>
                        <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Agency / Company</span>
                        <span class="font-semibold text-slate-700">{{ $agent->company_name ?: 'Individual Facilitator' }}</span>
                    </div>

                    <!-- Email -->
                    <div>
                        <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Email (Login ID)</span>
                        <a href="mailto:{{ $agent->email }}" class="text-[#27797D] font-medium hover:underline">{{ $agent->email }}</a>
                    </div>

                    <!-- Phone -->
                    <div>
                        <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Phone / WhatsApp</span>
                        <span class="font-mono font-bold text-slate-800">{{ $agent->phone }}</span>
                    </div>

                    <!-- Country -->
                    <div>
                        <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Country</span>
                        <span class="font-semibold text-slate-700">{{ $agent->country }}</span>
                    </div>

                    <!-- Website -->
                    <div>
                        <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Website</span>
                        @if($agent->website)
                            <a href="{{ $agent->website }}" target="_blank" class="text-[#27797D] font-medium hover:underline flex items-center gap-1">
                                <span>{{ $agent->website }}</span>
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        @else
                            <span class="text-slate-400 italic">None provided</span>
                        @endif
                    </div>

                    <!-- Office Address -->
                    <div>
                        <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Office Address</span>
                        <p class="text-slate-700 mt-0.5 leading-relaxed font-medium whitespace-pre-line">{{ $agent->address ?: 'None provided' }}</p>
                    </div>

                    <!-- Registration Timestamp -->
                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400">
                        <span>Registered On:</span>
                        <span class="font-mono font-semibold text-slate-600">{{ $agent->created_at->format('M d, Y H:i') }}</span>
                    </div>
                </div>

                <!-- Direct Login Card Box -->
                <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200/80 text-amber-900 space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="text-base">⚡</span>
                        <h4 class="text-xs font-black">Admin Impersonation Mode</h4>
                    </div>
                    <p class="text-[11px] text-amber-800 leading-relaxed">
                        Log directly into this partner's dashboard to add patients, view referred appointments, or verify records.
                    </p>
                    <a 
                        href="{{ route('admin.agent.login-direct', $agent->id) }}" 
                        target="_blank"
                        class="block w-full py-2 px-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold text-center transition-colors shadow-xs"
                    >
                        Launch Partner Portal &rarr;
                    </a>
                </div>

            </div>
        </div>

        <!-- Right Column: Referred Patients & Appointments -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Referred Patients Card -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="p-5 sm:p-6 border-b border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center font-bold text-sm">
                            👥
                        </div>
                        <div>
                            <h3 class="text-sm font-black text-[#112347]">Referred Patients</h3>
                            <p class="text-[11px] text-slate-400">Patients registered by or attributed to this partner.</p>
                        </div>
                    </div>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-700">
                        {{ $patients->count() }} of {{ $agent->patients_count }}
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                <th class="py-3 px-4">Patient Code</th>
                                <th class="py-3 px-4">Name</th>
                                <th class="py-3 px-4">Contact</th>
                                <th class="py-3 px-4">Country</th>
                                <th class="py-3 px-4">Reports</th>
                                <th class="py-3 px-4 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs">
                            @forelse($patients as $patient)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="py-3.5 px-4 font-mono font-bold text-slate-700">
                                        <a href="{{ route('admin.patient.view', $patient->id) }}" class="text-[#27797D] hover:underline">
                                            {{ $patient->patient_code ?? ('#PT-' . $patient->id) }}
                                        </a>
                                    </td>
                                    <td class="py-3.5 px-4 font-bold text-[#112347]">
                                        <div class="flex items-center gap-2">
                                            <span>{{ $patient->name }}</span>
                                            @if($patient->gender)
                                                <span class="text-[10px] text-slate-400 font-normal">({{ ucfirst($patient->gender) }})</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono text-slate-600">
                                        {{ $patient->phone }}
                                    </td>
                                    <td class="py-3.5 px-4 text-slate-600 font-medium">
                                        {{ $patient->country ?: '—' }}
                                    </td>
                                    <td class="py-3.5 px-4">
                                        <span class="px-2 py-0.5 rounded-md text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                                            {{ $patient->reports_count ?? 0 }} Reports
                                        </span>
                                    </td>
                                    <td class="py-3.5 px-4 text-right">
                                        <a 
                                            href="{{ route('admin.patient.view', $patient->id) }}" 
                                            class="px-2.5 py-1.5 rounded-lg bg-slate-100 hover:bg-[#27797D] hover:text-white text-slate-700 text-[11px] font-bold transition-colors inline-block"
                                        >
                                            View &rarr;
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-8 text-center text-slate-400 text-xs">
                                        No patients registered by this partner yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Referred Appointments Card -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="p-5 sm:p-6 border-b border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-sm">
                            📅
                        </div>
                        <div>
                            <h3 class="text-sm font-black text-[#112347]">Appointments</h3>
                            <p class="text-[11px] text-slate-400">Scheduled clinical appointments for this partner's referred cases.</p>
                        </div>
                    </div>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-700">
                        {{ $appointments->count() }} of {{ $agent->appointments_count }}
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                <th class="py-3 px-4">Code</th>
                                <th class="py-3 px-4">Patient</th>
                                <th class="py-3 px-4">Doctor / Hospital</th>
                                <th class="py-3 px-4">Date</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs">
                            @forelse($appointments as $appt)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="py-3.5 px-4 font-mono font-bold text-slate-700">
                                        <a href="{{ route('admin.appointment.view', $appt->id) }}" class="text-[#27797D] hover:underline">
                                            {{ $appt->appointment_code ?? ('#AP-' . $appt->id) }}
                                        </a>
                                    </td>
                                    <td class="py-3.5 px-4 font-bold text-[#112347]">
                                        {{ $appt->patient?->name ?? 'Guest Patient' }}
                                    </td>
                                    <td class="py-3.5 px-4">
                                        <div class="text-slate-800 font-semibold">{{ $appt->doctor?->name ?? 'Specialist' }}</div>
                                        <div class="text-[11px] text-slate-400">{{ $appt->hospital?->name ?? 'Partner Hospital' }}</div>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono text-slate-600">
                                        {{ $appt->appointment_date ? \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y') : 'Pending' }}
                                    </td>
                                    <td class="py-3.5 px-4">
                                        @php
                                            $badgeClass = match($appt->status) {
                                                'confirmed' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                                'cancelled' => 'bg-rose-50 text-rose-700 border-rose-200',
                                                'completed' => 'bg-blue-50 text-blue-700 border-blue-200',
                                                default => 'bg-amber-50 text-amber-700 border-amber-200',
                                            };
                                        @endphp
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase border {{ $badgeClass }}">
                                            {{ ucfirst($appt->status ?? 'pending') }}
                                        </span>
                                    </td>
                                    <td class="py-3.5 px-4 text-right">
                                        <a 
                                            href="{{ route('admin.appointment.view', $appt->id) }}" 
                                            class="px-2.5 py-1.5 rounded-lg bg-slate-100 hover:bg-[#27797D] hover:text-white text-slate-700 text-[11px] font-bold transition-colors inline-block"
                                        >
                                            View &rarr;
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-8 text-center text-slate-400 text-xs">
                                        No appointments booked for this partner's patients yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

</div>

<script>
function confirmDeleteAgent(e, name, code) {
    e.preventDefault();
    const form = e.target;
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: 'Delete Referral Partner Account?',
            html: `Are you sure you want to permanently delete partner <strong>${name}</strong> (${code})?<br><br><span class="text-xs text-slate-500">Referred patient dossiers will be preserved safely.</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, Delete Partner',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    } else {
        if (confirm(`Are you sure you want to permanently delete partner ${name} (${code})?`)) {
            form.submit();
        }
    }
    return false;
}
</script>
@endsection

