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

    <!-- Status History Table Card -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
            <div>
                <h3 class="text-sm font-extrabold text-[#112347]">Patient Care Status Timeline</h3>
                <p class="text-xs text-slate-400">Chronological history of patient visits and treatment stages</p>
            </div>
            <span class="px-2.5 py-1 rounded-xl bg-slate-100 text-slate-600 font-bold text-xs font-mono">
                {{ $appointment->histories->count() }} Stage Updates
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200/80 text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                        <th class="py-3 px-4">Stage / Status</th>
                        <th class="py-3 px-4">Date</th>
                        <th class="py-3 px-4">Time</th>
                        <th class="py-3 px-4">Updated By</th>
                        <th class="py-3 px-4">Remarks</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($appointment->histories as $history)
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        <td class="py-3 px-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl text-xs font-bold border {{ $history->status_badge_class }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                {{ $history->status_label }}
                            </span>
                        </td>
                        <td class="py-3 px-4 font-semibold text-slate-800">
                            {{ $history->status_at ? $history->status_at->format('M d, Y') : $history->created_at->format('M d, Y') }}
                        </td>
                        <td class="py-3 px-4 font-mono font-medium text-slate-600">
                            {{ $history->status_at ? $history->status_at->format('h:i A') : $history->created_at->format('h:i A') }}
                        </td>
                        <td class="py-3 px-4 font-bold text-slate-700">
                            {{ $history->changed_by_name ?: ucfirst($history->changed_by_type) }}
                        </td>
                        <td class="py-3 px-4 text-slate-600">
                            {{ $history->notes ?: '—' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-slate-400 italic">No stage history recorded yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

