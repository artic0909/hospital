@extends('partner.layouts.app')

@section('title', 'Appointment #' . $appointment->appointment_code . ' - Partner Portal')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('partner.appointment.index') }}" class="text-[#27797D] hover:underline">&larr; Appointments</a>
                <span>&bull;</span>
                <span class="font-mono text-teal-700 font-bold">#{{ $appointment->appointment_code }}</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Appointment Details</h1>
            <p class="text-xs text-slate-400 mt-0.5">Consultation record for {{ $appointment->patient ? $appointment->patient->name : 'Patient' }}</p>
        </div>

        <div>
            <span class="px-3 py-1 rounded-xl text-xs font-bold border {{ $appointment->status_badge_class }}">
                {{ $appointment->status_label }}
            </span>
        </div>
    </div>

    <!-- Details Card -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 text-xs">
            <div>
                <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Patient</span>
                <p class="font-bold text-sm text-[#112347]">{{ $appointment->patient->name ?? 'N/A' }}</p>
                <p class="text-slate-500 mt-0.5">{{ $appointment->patient->phone ?? '' }}</p>
            </div>
            <div>
                <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Attending Doctor</span>
                <p class="font-bold text-sm text-[#112347]">{{ $appointment->doctor->name ?? 'N/A' }}</p>
                <p class="text-[#27797D] font-semibold mt-0.5">{{ $appointment->doctor->spaciality ?? '' }}</p>
            </div>
            <div>
                <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Date & Time</span>
                <p class="font-bold text-slate-800">{{ $appointment->appointment_date ? $appointment->appointment_date->format('M d, Y') : 'TBD' }}</p>
                <p class="text-slate-500 mt-0.5">{{ $appointment->appointment_time ?: 'Standard OPD' }}</p>
            </div>
            <div>
                <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Hospital</span>
                <p class="font-bold text-slate-800">{{ $appointment->hospital->name ?? 'N/A' }}</p>
                <p class="text-slate-500 mt-0.5">{{ $appointment->hospital->address ?? '' }}</p>
            </div>
        </div>

        @if($appointment->notes)
        <div class="pt-4 border-t border-slate-100 text-xs">
            <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Clinical Notes</span>
            <p class="p-4 rounded-2xl bg-slate-50 text-slate-700 leading-relaxed">{{ $appointment->notes }}</p>
        </div>
        @endif
    </div>
</div>
@endsection

