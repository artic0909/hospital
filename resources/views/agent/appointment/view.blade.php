@extends('agent.layouts.app')

@section('title', 'Appointment #' . $appointment->appointment_code . ' - Heal Go Fly Referral Partner Portal')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('agent.appointment.index') }}" class="text-[#27797D] hover:underline">&larr; Appointments</a>
                <span>&bull;</span>
                <span class="font-mono text-teal-700 bg-teal-50 px-2 py-0.5 rounded-md font-bold">#{{ $appointment->appointment_code }}</span>
                <span>&bull;</span>
                @php
                    $statusClasses = [
                        'booked' => 'bg-amber-50 text-amber-800 border-amber-200',
                        'received' => 'bg-blue-50 text-blue-800 border-blue-200',
                        'treatment' => 'bg-indigo-50 text-indigo-800 border-indigo-200',
                        'discharge' => 'bg-emerald-50 text-emerald-800 border-emerald-200',
                    ];
                    $badge = $statusClasses[$appointment->status] ?? 'bg-slate-100 text-slate-700 border-slate-200';
                @endphp
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold border uppercase tracking-wider {{ $badge }}">
                    {{ ucfirst($appointment->status) }}
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Care Appointment Details</h1>
            <p class="text-xs text-slate-400 mt-0.5">Created on {{ $appointment->created_at->format('M d, Y \a\t h:i A') }} ({{ $appointment->created_at->diffForHumans() }})</p>
        </div>

        <div class="flex items-center gap-2 flex-wrap">
            @if($appointment->patient)
                <a 
                    href="{{ route('agent.patient.view', $appointment->patient->id) }}" 
                    class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs sm:text-sm font-bold shadow-xs transition-colors"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    <span>View Patient Dossier</span>
                </a>
            @endif
        </div>
    </div>

    <!-- Patient Journey Status Timeline Card -->
    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Patient Care Journey</h3>
                <p class="text-xs text-slate-500 mt-0.5">Live clinical milestones administered by HealGoFly</p>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Admin Monitored
            </span>
        </div>
        
        @php
            $stages = [
                'booked' => ['title' => '1. Appointment Booked', 'desc' => 'Initial consultation slot confirmed by admin'],
                'received' => ['title' => '2. Patient Received', 'desc' => 'Patient arrived at hospital / destination'],
                'treatment' => ['title' => '3. Under Treatment', 'desc' => 'Doctor consult / active surgical therapy ongoing'],
                'discharge' => ['title' => '4. Discharged', 'desc' => 'Treatment complete & discharged successfully'],
            ];
            $statusOrder = ['booked', 'received', 'treatment', 'discharge'];
            $currentIndex = array_search($appointment->status, $statusOrder);
            if ($currentIndex === false) { $currentIndex = 0; }
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
            @foreach($statusOrder as $idx => $stKey)
                @php
                    $isDone = $idx <= $currentIndex;
                    $isCurrent = $idx === $currentIndex;
                @endphp
                <div class="p-4 rounded-2xl border transition-all {{ $isCurrent ? 'bg-teal-50/80 border-teal-300 ring-2 ring-teal-500/20 shadow-xs' : ($isDone ? 'bg-slate-50 border-slate-200' : 'bg-white border-dashed border-slate-200 opacity-60') }}">
                    <div class="flex items-center justify-between mb-2">
                        <span class="w-6 h-6 rounded-lg text-xs font-bold flex items-center justify-center {{ $isDone ? 'bg-[#27797D] text-white' : 'bg-slate-200 text-slate-600' }}">
                            {{ $idx + 1 }}
                        </span>
                        @if($isCurrent)
                            <span class="w-2 h-2 rounded-full bg-teal-500 animate-ping"></span>
                        @endif
                    </div>
                    <h4 class="font-bold text-xs text-[#112347]">{{ $stages[$stKey]['title'] }}</h4>
                    <p class="text-[11px] text-slate-400 mt-0.5 leading-relaxed">{{ $stages[$stKey]['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Main Content 2-Column Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <!-- LEFT COLUMN: Patient Overview (4 cols) -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Patient Overview Card -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Patient Profile</h3>
                    @if($appointment->patient)
                        <a href="{{ route('agent.patient.view', $appointment->patient->id) }}" class="text-xs font-bold text-[#27797D] hover:underline">
                            Dossier &rarr;
                        </a>
                    @endif
                </div>

                @if($appointment->patient)
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center font-black text-base border border-slate-200 overflow-hidden shrink-0">
                            @if($appointment->patient->image && file_exists(public_path($appointment->patient->image)))
                                <img src="{{ asset($appointment->patient->image) }}" alt="{{ $appointment->patient->name }}" class="w-full h-full object-cover">
                            @else
                                {{ strtoupper(substr($appointment->patient->name, 0, 1)) }}
                            @endif
                        </div>
                        <div class="min-w-0">
                            <h4 class="font-black text-sm text-[#112347] truncate">{{ $appointment->patient->name }}</h4>
                            <span class="text-[11px] font-mono text-slate-400 block mt-0.5">#PT-{{ str_pad($appointment->patient->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    </div>

                    <div class="space-y-3 pt-2 text-xs divide-y divide-slate-100">
                        <div class="pt-2 flex items-center justify-between">
                            <span class="text-slate-400">Phone:</span>
                            <a href="tel:{{ $appointment->patient->phone }}" class="font-bold text-[#112347] hover:text-[#27797D]">
                                {{ $appointment->patient->phone }}
                            </a>
                        </div>
                        @if($appointment->patient->email)
                            <div class="pt-2 flex items-center justify-between">
                                <span class="text-slate-400">Email:</span>
                                <span class="font-bold text-[#112347] truncate max-w-[170px]">{{ $appointment->patient->email }}</span>
                            </div>
                        @endif
                        @if($appointment->patient->country)
                            <div class="pt-2 flex items-center justify-between">
                                <span class="text-slate-400">Country:</span>
                                <span class="font-bold text-[#112347]">{{ $appointment->patient->country }}</span>
                            </div>
                        @endif
                    </div>
                @else
                    <p class="text-xs text-slate-400 italic">No patient linked to this appointment.</p>
                @endif
            </div>

            <!-- Medical Reports Quick Card -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Diagnostic Reports</h3>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                        {{ $appointment->patient && $appointment->patient->reports ? $appointment->patient->reports->count() : 0 }} Files
                    </span>
                </div>

                @if($appointment->patient && $appointment->patient->reports && $appointment->patient->reports->count() > 0)
                    <div class="space-y-2 pt-1 text-xs">
                        @foreach($appointment->patient->reports->take(3) as $rep)
                            <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                                <span class="font-semibold text-slate-700 truncate max-w-[170px]">{{ $rep->name }}</span>
                                @if($rep->file && file_exists(public_path($rep->file)))
                                    <a href="{{ asset($rep->file) }}" target="_blank" class="text-xs font-bold text-[#27797D] hover:underline">
                                        View &rarr;
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-xs text-slate-400 italic">No reports uploaded yet.</p>
                @endif
            </div>

        </div>

        <!-- RIGHT COLUMN: Appointment Details & Status Logs (8 cols) -->
        <div class="lg:col-span-8 space-y-6">
            
            <!-- Appointment Specifications Card -->
            <div class="bg-white p-6 sm:p-7 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
                <div class="border-b border-slate-100 pb-4">
                    <h3 class="text-base font-bold text-[#112347]">Hospital & Consulting Specialist</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Clinical assignment coordinated by HealGoFly medical board.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Hospital -->
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Medical Facility</span>
                        <h4 class="text-sm font-extrabold text-[#112347] mt-1">
                            {{ $appointment->hospital->name ?? 'Facility to be confirmed' }}
                        </h4>
                        @if($appointment->hospital && $appointment->hospital->address)
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                                📍 {{ $appointment->hospital->address }}
                            </p>
                        @endif
                    </div>

                    <!-- Doctor -->
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Specialist Consultant</span>
                        <h4 class="text-sm font-extrabold text-[#112347] mt-1">
                            {{ $appointment->doctor->name ?? 'Specialist to be assigned' }}
                        </h4>
                        @if($appointment->doctor && $appointment->doctor->spaciality)
                            <p class="text-xs text-teal-700 font-bold mt-1">
                                🩺 {{ $appointment->doctor->spaciality }}
                            </p>
                        @endif
                    </div>

                    <!-- Scheduled Date -->
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Appointment Date</span>
                        <p class="text-sm font-extrabold text-[#112347] mt-1">
                            {{ $appointment->appointment_date ? \Carbon\Carbon::parse($appointment->appointment_date)->format('l, F j, Y') : 'Date to be scheduled' }}
                        </p>
                    </div>

                    <!-- Scheduled Time -->
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Scheduled Slot</span>
                        <p class="text-sm font-extrabold text-[#112347] mt-1">
                            {{ $appointment->appointment_time ? $appointment->appointment_time : 'Time slot pending' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Treatment Status History Timeline -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-extrabold text-[#112347]">Status Updates & Clinical Logs</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Historical log of all care journey stage transitions updated by central admin</p>
                    </div>
                </div>

                @if($appointment->histories && $appointment->histories->count() > 0)
                    <div class="p-6 space-y-4">
                        @foreach($appointment->histories->sortByDesc('created_at') as $history)
                            <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-slate-50 border border-slate-100 text-xs">
                                <div class="w-8 h-8 rounded-xl bg-teal-100 text-[#27797D] flex items-center justify-center font-bold shrink-0">
                                    ✓
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between gap-2 flex-wrap">
                                        <span class="font-bold text-[#112347] uppercase tracking-wider">
                                            Stage: {{ ucfirst($history->status ?? $appointment->status) }}
                                        </span>
                                        <span class="text-[11px] text-slate-400">
                                            {{ $history->created_at->format('M d, Y \a\t h:i A') }}
                                        </span>
                                    </div>
                                    @if($history->notes || $history->remarks)
                                        <p class="text-slate-600 mt-1 leading-relaxed">
                                            {{ $history->notes ?? $history->remarks }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-8 text-center text-xs text-slate-500">
                        <p class="font-bold text-slate-700">Initial appointment state: {{ ucfirst($appointment->status) }}</p>
                        <p class="text-[11px] text-slate-400 mt-1">As the patient arrives, undergoes treatment, and is discharged, notes and time logs entered by the HealGoFly administration will appear here.</p>
                    </div>
                @endif
            </div>

        </div>

    </div>

</div>
@endsection
