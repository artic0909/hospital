@extends('agent.layouts.app')

@section('title', 'Patient Dossier: ' . $patient->name . ' - Heal Go Fly Agent Portal')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div class="flex items-center gap-4">
            <div class="relative w-16 h-16 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 shrink-0 shadow-xs">
                @if($patient->image && file_exists(public_path($patient->image)))
                    <img src="{{ asset($patient->image) }}" alt="{{ $patient->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-teal-50 text-[#27797D] font-extrabold text-2xl">
                        {{ strtoupper(substr($patient->name, 0, 1)) }}
                    </div>
                @endif
            </div>
            <div>
                <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                    <a href="{{ route('agent.patient.index') }}" class="text-[#27797D] hover:underline">&larr; Patients Directory</a>
                    <span>&bull;</span>
                    <span class="font-mono text-teal-700 bg-teal-50 px-2 py-0.5 rounded-md font-bold">#PT-{{ str_pad($patient->id, 5, '0', STR_PAD_LEFT) }}</span>
                </div>
                <h1 class="text-2xl font-black text-[#112347] tracking-tight">{{ $patient->name }}</h1>
                <p class="text-xs text-slate-400 mt-0.5">Registered on {{ $patient->created_at->format('M d, Y') }} ({{ $patient->created_at->diffForHumans() }})</p>
            </div>
        </div>

        <div class="flex items-center gap-2 flex-wrap">
            <!-- Upload Medical Report -->
            <button 
                type="button" 
                onclick="openReportModal()" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Upload Report</span>
            </button>

            <!-- Edit Patient -->
            <a 
                href="{{ route('agent.patient.update', $patient->id) }}" 
                class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 transition-colors"
            >
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                <span>Edit Profile</span>
            </a>

            <!-- Delete Patient -->
            <form action="{{ route('agent.patient.destroy', $patient->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button 
                    type="button" 
                    onclick="confirmDelete(this, '{{ addslashes($patient->name) }}')"
                    class="p-2.5 rounded-xl text-rose-600 hover:bg-rose-50 border border-rose-200 transition-colors cursor-pointer"
                    title="Delete Patient"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </button>
            </form>
        </div>
    </div>

    <!-- Main 2-Column Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <!-- LEFT COLUMN: Patient Info & Quick Contact Card (4 cols) -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Quick Contacts Card -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
                <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Direct Contact</h3>
                
                <div class="space-y-4 text-xs">
                    
                    <!-- Phone -->
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div class="flex-1 truncate">
                            <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Phone / WhatsApp</span>
                            @if($patient->phone)
                                <a href="tel:{{ $patient->phone }}" class="font-bold text-[#112347] hover:text-[#27797D] text-sm">
                                    {{ $patient->phone }}
                                </a>
                                <a 
                                    href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $patient->phone) }}" 
                                    target="_blank" 
                                    class="inline-flex items-center gap-1 text-[11px] text-emerald-600 font-bold mt-0.5 hover:underline"
                                >
                                    <span>WhatsApp Chat</span>
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.199.534 1.286.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.302c-.087.087-.179.182-.077.357.101.174.45 0.742.965 1.201.664.591 1.224.774 1.397.86.173.087.275.072.376-.043.101-.116.433-.506.549-.679.116-.173.231-.144.39-.087s1.011.477 1.184.564.289.13.332.202c.044.072.044.419-.1 0.824z"/></svg>
                                </a>
                            @else
                                <span class="text-slate-400 italic">Not provided</span>
                            @endif
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-blue-50 text-[#1D4B6C] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div class="flex-1 truncate">
                            <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Email</span>
                            @if($patient->email)
                                <a href="mailto:{{ $patient->email }}" class="font-bold text-[#112347] hover:text-[#27797D] text-xs truncate block">
                                    {{ $patient->email }}
                                </a>
                            @else
                                <span class="text-slate-400 italic">Not provided</span>
                            @endif
                        </div>
                    </div>

                    <!-- Location / Address -->
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Address</span>
                            <div class="font-bold text-[#112347] text-xs leading-relaxed mt-0.5">
                                @if($patient->address)
                                    <div>{{ $patient->address }}</div>
                                @endif
                                <div class="text-slate-600">
                                    {{ implode(', ', array_filter([$patient->city, $patient->state, $patient->country])) ?: 'Location not set' }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Referring Agent Badge (Account Attribution) -->
            <div class="bg-gradient-to-br from-slate-900 to-[#112347] text-white p-6 rounded-3xl shadow-sm border border-slate-800 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-bold text-amber-400 uppercase tracking-widest">My Referral Account</span>
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#27797D] to-[#EF7415] text-white flex items-center justify-center font-black text-sm shadow-md shrink-0">
                        {{ strtoupper(substr(auth('agent')->user()->name, 0, 2)) }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <h4 class="font-bold text-xs text-white truncate">{{ auth('agent')->user()->name }}</h4>
                        <span class="text-[10px] font-mono text-amber-300">{{ auth('agent')->user()->agent_code }}</span>
                    </div>
                </div>
                <p class="text-[11px] text-slate-300 leading-relaxed border-t border-slate-800 pt-3">
                    This patient dossier is officially linked to your agency profile. All clinical inquiries and admin appointments will reflect your agent details on the Admin dashboard.
                </p>
            </div>

        </div>

        <!-- RIGHT COLUMN: Medical Reports & Appointments (8 cols) -->
        <div class="lg:col-span-8 space-y-6">
            
            <!-- SECTION 1: Diagnostic Medical Reports -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-base font-extrabold text-[#112347]">Medical Reports & Diagnostic Scans</h3>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                                {{ $patient->reports->count() }} Files
                            </span>
                        </div>
                        <p class="text-xs text-slate-500 mt-0.5">Attach medical records, MRIs, biopsy reports, or blood tests for hospital evaluation.</p>
                    </div>

                    <button 
                        type="button" 
                        onclick="openReportModal()" 
                        class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold transition-all shadow-xs cursor-pointer"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        <span>Attach File</span>
                    </button>
                </div>

                @if($patient->reports->count() > 0)
                    <div class="divide-y divide-slate-100">
                        @foreach($patient->reports as $report)
                            <div class="p-4 sm:p-5 flex items-center justify-between gap-4 hover:bg-slate-50 transition-colors">
                                <div class="flex items-center gap-3.5 min-w-0">
                                    <div class="w-10 h-10 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    </div>
                                    <div class="min-w-0">
                                        <h4 class="text-xs sm:text-sm font-bold text-slate-800 truncate">{{ $report->name }}</h4>
                                        <span class="text-[11px] text-slate-400 mt-0.5 block">
                                            Dated: {{ $report->date ? \Carbon\Carbon::parse($report->date)->format('M d, Y') : 'N/A' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 shrink-0">
                                    @if($report->file && file_exists(public_path($report->file)))
                                        <a 
                                            href="{{ asset($report->file) }}" 
                                            target="_blank" 
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-[#27797D] hover:text-white text-slate-700 text-xs font-bold transition-colors"
                                        >
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                            <span>Download</span>
                                        </a>
                                    @endif

                                    <form action="{{ route('agent.patient.reports.destroy', $report->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmReportDelete(this, '{{ addslashes($report->name) }}')"
                                            class="p-1.5 rounded-xl text-rose-500 hover:bg-rose-50 transition-colors cursor-pointer"
                                            title="Delete Report"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-8 text-center">
                        <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] mx-auto flex items-center justify-center mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <h4 class="text-xs font-bold text-slate-700">No medical reports uploaded yet</h4>
                        <p class="text-[11px] text-slate-400 mt-1 max-w-sm mx-auto">Upload test scans or doctor prescriptions to help the HealGoFly medical board give fast opinions.</p>
                        <button 
                            type="button" 
                            onclick="openReportModal()" 
                            class="inline-flex items-center gap-1.5 mt-4 px-4 py-2 rounded-xl bg-[#27797D] text-white text-xs font-bold hover:bg-[#1e5f62] transition-colors"
                        >
                            + Upload First Report
                        </button>
                    </div>
                @endif
            </div>

            <!-- SECTION 2: Care Journey & Hospital Appointments (Updated by Admin) -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-base font-extrabold text-[#112347]">Hospital Appointments & Status</h3>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                {{ $patient->appointments->count() }} Appointments
                            </span>
                        </div>
                        <p class="text-xs text-slate-500 mt-0.5">Real-time status tracking updated by the HealGoFly central clinical administration desk.</p>
                    </div>

                    <a href="{{ route('agent.appointment.index') }}" class="text-xs font-bold text-[#27797D] hover:underline">
                        All Appointments &rarr;
                    </a>
                </div>

                @if($patient->appointments->count() > 0)
                    <div class="divide-y divide-slate-100">
                        @foreach($patient->appointments as $appt)
                            @php
                                $statusClasses = [
                                    'booked' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-800', 'border' => 'border-amber-200', 'step' => 1],
                                    'received' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-800', 'border' => 'border-blue-200', 'step' => 2],
                                    'treatment' => ['bg-indigo-50', 'text' => 'text-indigo-800', 'border' => 'border-indigo-200', 'step' => 3],
                                    'discharge' => ['bg-emerald-50', 'text' => 'text-emerald-800', 'border' => 'border-emerald-200', 'step' => 4],
                                ];
                                $cfg = $statusClasses[$appt->status] ?? ['bg' => 'bg-slate-50', 'text' => 'text-slate-800', 'border' => 'border-slate-200', 'step' => 1];
                            @endphp
                            <div class="p-6 space-y-4">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-3">
                                    <div class="flex items-center gap-2">
                                        <span class="font-mono text-xs font-bold text-[#27797D] bg-teal-50 px-2 py-0.5 rounded-md border border-teal-200">
                                            #{{ $appt->appointment_code }}
                                        </span>
                                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold border uppercase tracking-wider {{ $cfg['bg'] }} {{ $cfg['text'] }} {{ $cfg['border'] }}">
                                            Status: {{ ucfirst($appt->status) }}
                                        </span>
                                    </div>
                                    <span class="text-xs text-slate-500 font-medium">
                                        📅 Date: <strong>{{ $appt->appointment_date ? \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y') : 'Date Pending' }}</strong>
                                    </span>
                                </div>

                                <!-- Hospital & Doctor Info -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                    <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100">
                                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Assigned Hospital</span>
                                        <h4 class="font-bold text-slate-800 mt-0.5">{{ $appt->hospital->name ?? 'Hospital to be confirmed' }}</h4>
                                    </div>
                                    <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100">
                                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Consulting Doctor</span>
                                        <h4 class="font-bold text-slate-800 mt-0.5">
                                            {{ $appt->doctor->name ?? 'Specialist to be confirmed' }}
                                            @if($appt->doctor && $appt->doctor->spaciality)
                                                <span class="text-slate-400 font-normal">({{ $appt->doctor->spaciality }})</span>
                                            @endif
                                        </h4>
                                    </div>
                                </div>

                                <!-- 4-Step Progress Journey Bar -->
                                <div class="pt-2">
                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-2">Stage Progression</span>
                                    <div class="grid grid-cols-4 gap-2 text-center text-[10px] font-bold">
                                        <div class="p-2 rounded-xl border {{ $cfg['step'] >= 1 ? 'bg-amber-50 border-amber-300 text-amber-900' : 'bg-slate-50 border-slate-200 text-slate-400' }}">
                                            1. Booked
                                        </div>
                                        <div class="p-2 rounded-xl border {{ $cfg['step'] >= 2 ? 'bg-blue-50 border-blue-300 text-blue-900' : 'bg-slate-50 border-slate-200 text-slate-400' }}">
                                            2. Received
                                        </div>
                                        <div class="p-2 rounded-xl border {{ $cfg['step'] >= 3 ? 'bg-indigo-50 border-indigo-300 text-indigo-900' : 'bg-slate-50 border-slate-200 text-slate-400' }}">
                                            3. Treatment
                                        </div>
                                        <div class="p-2 rounded-xl border {{ $cfg['step'] >= 4 ? 'bg-emerald-50 border-emerald-300 text-emerald-900' : 'bg-slate-50 border-slate-200 text-slate-400' }}">
                                            4. Discharge
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right pt-1">
                                    <a 
                                        href="{{ route('agent.appointment.view', $appt->id) }}" 
                                        class="inline-flex items-center gap-1.5 text-xs font-bold text-[#27797D] hover:underline"
                                    >
                                        <span>View Appointment Details</span>
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-8 text-center">
                        <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 mx-auto flex items-center justify-center mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <h4 class="text-xs font-bold text-slate-700">No hospital appointments yet</h4>
                        <p class="text-[11px] text-slate-400 mt-1 max-w-md mx-auto">
                            The HealGoFly central admin desk is reviewing this patient's profile. Once a doctor consultation or hospital package is scheduled, the appointment and stage progress will show here automatically.
                        </p>
                    </div>
                @endif
            </div>

        </div>

    </div>

</div>

<!-- Upload Medical Report Modal -->
<div id="report-modal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4">
    <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl border border-slate-200 overflow-hidden transform transition-all">
        <div class="bg-gradient-to-r from-[#112347] to-[#27797D] px-6 py-4 text-white flex items-center justify-between">
            <h3 class="text-sm font-bold">Attach Medical Report</h3>
            <button type="button" onclick="closeReportModal()" class="text-white/80 hover:text-white text-lg font-bold">&times;</button>
        </div>

        <form action="{{ route('agent.patient.reports.store', $patient->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf

            <!-- Document Name -->
            <div>
                <label for="report-name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    Document / Report Title <span class="text-rose-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="report-name" 
                    name="name" 
                    required 
                    placeholder="e.g. Brain MRI Scan, Blood Work CBC" 
                    class="w-full px-3.5 py-2.5 text-xs text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                >
            </div>

            <!-- Report Date -->
            <div>
                <label for="report-date" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    Test / Report Date
                </label>
                <input 
                    type="date" 
                    id="report-date" 
                    name="date" 
                    value="{{ date('Y-m-d') }}"
                    class="w-full px-3.5 py-2.5 text-xs text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                >
            </div>

            <!-- File Upload -->
            <div>
                <label for="report-file" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    Select Document (PDF, JPG, PNG, DOCX up to 10MB) <span class="text-rose-500">*</span>
                </label>
                <input 
                    type="file" 
                    id="report-file" 
                    name="file" 
                    required 
                    accept=".pdf,.jpg,.jpeg,.png,.webp,.doc,.docx"
                    class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                >
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                <button 
                    type="button" 
                    onclick="closeReportModal()" 
                    class="px-4 py-2 rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 text-xs font-bold text-slate-700 transition-colors"
                >
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="px-5 py-2 rounded-xl bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold transition-all shadow-sm"
                >
                    Upload Report
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openReportModal() {
        const modal = document.getElementById('report-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeReportModal() {
        const modal = document.getElementById('report-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function confirmDelete(button, patientName) {
        Swal.fire({
            title: 'Delete Patient?',
            text: `Are you sure you want to delete patient "${patientName}"? All medical reports will be permanently deleted.`,
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

    function confirmReportDelete(button, reportName) {
        Swal.fire({
            title: 'Delete Report?',
            text: `Remove report "${reportName}"?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, remove',
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
