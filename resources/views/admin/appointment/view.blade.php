@extends('admin.layouts.app')

@section('title', 'Appointment #' . $appointment->appointment_code . ' - Heal Go Fly Admin')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.appointment.index') }}" class="text-[#27797D] hover:underline">&larr; Appointments</a>
                <span>&bull;</span>
                <span class="font-mono text-teal-700 bg-teal-50 px-2 py-0.5 rounded-md font-bold">#{{ $appointment->appointment_code }}</span>
                <span>&bull;</span>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold border {{ $appointment->status_badge_class }}">
                    {{ $appointment->status_label }}
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Appointment Dossier</h1>
            <p class="text-xs text-slate-400 mt-0.5">Scheduled on {{ $appointment->created_at->format('M d, Y \a\t h:i A') }} ({{ $appointment->created_at->diffForHumans() }})</p>
        </div>

        <div class="flex items-center gap-2 flex-wrap">
            
            <!-- Quick Status Updater Dropdown -->
            <form action="{{ route('admin.appointment.update-status', $appointment->id) }}" method="POST" class="inline">
                @csrf
                @method('PATCH')
                <select 
                    name="status" 
                    onchange="this.form.submit()" 
                    class="text-xs font-bold px-3 py-2.5 rounded-xl border cursor-pointer focus:outline-none transition-all {{ $appointment->status_badge_class }}"
                >
                    <option value="booked" {{ $appointment->status === 'booked' ? 'selected' : '' }}>Stage: Booked</option>
                    <option value="received" {{ $appointment->status === 'received' ? 'selected' : '' }}>Stage: Received</option>
                    <option value="treatment" {{ $appointment->status === 'treatment' ? 'selected' : '' }}>Stage: In Treatment</option>
                    <option value="discharge" {{ $appointment->status === 'discharge' ? 'selected' : '' }}>Stage: Discharged</option>
                </select>
            </form>

            <!-- Edit Button -->
            <a 
                href="{{ route('admin.appointment.update', $appointment->id) }}" 
                class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 transition-colors"
            >
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                <span>Edit Appointment</span>
            </a>

            <!-- Delete Button -->
            <button 
                type="button" 
                onclick="confirmDelete('{{ route('admin.appointment.destroy', $appointment->id) }}', '{{ $appointment->appointment_code }}')"
                class="p-2.5 rounded-xl text-rose-600 hover:bg-rose-50 border border-rose-200 transition-colors cursor-pointer"
                title="Delete Appointment"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </button>
        </div>
    </div>

    <!-- Patient Journey Status Timeline Card -->
    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400 mb-5">Patient Care Journey</h3>
        
        @php
            $stages = [
                'booked' => ['title' => 'Appointment Booked', 'desc' => 'Initial consultation slot confirmed'],
                'received' => ['title' => 'Patient Received', 'desc' => 'Arrived at medical facility'],
                'treatment' => ['title' => 'In Treatment', 'desc' => 'Doctor consult / surgery / procedure ongoing'],
                'discharge' => ['title' => 'Discharged', 'desc' => 'Treatment complete & discharged'],
            ];
            $statusOrder = ['booked', 'received', 'treatment', 'discharge'];
            $currentIndex = array_search($appointment->status, $statusOrder);
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
            @foreach($statusOrder as $idx => $stKey)
                @php
                    $isDone = $idx <= $currentIndex;
                    $isCurrent = $idx === $currentIndex;
                @endphp
                <div class="p-4 rounded-2xl border transition-all {{ $isCurrent ? 'bg-teal-50/70 border-teal-300 ring-2 ring-teal-500/20 shadow-xs' : ($isDone ? 'bg-slate-50 border-slate-200' : 'bg-white border-dashed border-slate-200 opacity-60') }}">
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
        
        <!-- LEFT COLUMN: Patient & Schedule Card (5 cols) -->
        <div class="lg:col-span-5 space-y-6">
            
            <!-- Patient Profile Card -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Patient Details</span>
                    @if($appointment->patient)
                    <a href="{{ route('admin.patient.view', $appointment->patient->id) }}" class="text-xs font-bold text-[#27797D] hover:underline">
                        View Dossier &rarr;
                    </a>
                    @endif
                </div>

                @if($appointment->patient)
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 shrink-0">
                        <img 
                            src="{{ $appointment->patient->image_url }}" 
                            alt="{{ $appointment->patient->name }}" 
                            class="w-full h-full object-cover"
                            onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($appointment->patient->name) }}&background=27797D&color=fff';"
                        >
                    </div>
                    <div class="truncate flex-1">
                        <h3 class="font-extrabold text-base text-[#112347] truncate">{{ $appointment->patient->name }}</h3>
                        <span class="font-mono text-xs text-teal-700 bg-teal-50 px-2 py-0.5 rounded font-bold">
                            #PT-{{ str_pad($appointment->patient->id, 5, '0', STR_PAD_LEFT) }}
                        </span>
                    </div>
                </div>

                <div class="space-y-3 pt-2 text-xs border-t border-slate-100">
                    <div class="flex items-center justify-between">
                        <span class="text-slate-400 font-medium">Phone / WhatsApp:</span>
                        <span class="font-bold text-slate-800">{{ $appointment->patient->phone ?: 'Not provided' }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-400 font-medium">Email Address:</span>
                        <span class="font-bold text-slate-800 truncate max-w-[200px]">{{ $appointment->patient->email ?: 'Not provided' }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-400 font-medium">Location:</span>
                        <span class="font-bold text-slate-800">{{ $appointment->patient->country ?? 'Global' }}</span>
                    </div>
                </div>
                @else
                    <p class="text-xs text-slate-400 italic">No patient record linked to this appointment.</p>
                @endif
            </div>

            <!-- Schedule & Visit Timing Card -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
                <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400 block border-b border-slate-100 pb-3">
                    Scheduled Timing
                </span>

                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div class="p-3.5 bg-slate-50 rounded-2xl border border-slate-100">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Consultation Date</span>
                        <span class="font-black text-sm text-[#112347]">
                            {{ $appointment->appointment_date ? $appointment->appointment_date->format('M d, Y') : 'Date TBD' }}
                        </span>
                    </div>
                    <div class="p-3.5 bg-slate-50 rounded-2xl border border-slate-100">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Time Slot</span>
                        <span class="font-black text-sm text-[#27797D]">
                            {{ $appointment->appointment_time ?: 'Standard OPD' }}
                        </span>
                    </div>
                </div>

                @if($appointment->notes)
                <div class="pt-2">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Clinical Notes & Complaints</span>
                    <p class="p-3.5 rounded-2xl bg-amber-50/50 border border-amber-200/60 text-xs text-slate-700 leading-relaxed">
                        {{ $appointment->notes }}
                    </p>
                </div>
                @endif
            </div>

        </div>

        <!-- RIGHT COLUMN: Doctor, Hospital & Partner Information (7 cols) -->
        <div class="lg:col-span-7 space-y-6">
            
            <!-- Doctor Details Card -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Assigned Doctor</span>
                    <span class="text-xs font-bold text-teal-700 bg-teal-50 px-2 py-0.5 rounded-full">
                        {{ $appointment->doctor ? ($appointment->doctor->spaciality ?: 'Consultant') : 'Unassigned' }}
                    </span>
                </div>

                @if($appointment->doctor)
                <div class="flex items-start gap-4">
                    <div class="w-16 h-16 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 shrink-0 shadow-xs">
                        <img 
                            src="{{ $appointment->doctor->image_url ?? asset('assets/images/doctor-placeholder.png') }}" 
                            alt="{{ $appointment->doctor->name }}" 
                            class="w-full h-full object-cover"
                            onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($appointment->doctor->name) }}&background=1D4B6C&color=fff';"
                        >
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-black text-[#112347]">{{ $appointment->doctor->name }}</h3>
                        <p class="text-xs text-[#27797D] font-bold mt-0.5">{{ $appointment->doctor->designation ?: 'Specialist Doctor' }}</p>
                        @if($appointment->doctor->experience)
                            <span class="inline-block mt-1 text-[11px] text-slate-500 font-semibold bg-slate-100 px-2 py-0.5 rounded-md">
                                {{ $appointment->doctor->experience }} Years Experience
                            </span>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3 pt-3 border-t border-slate-100 text-xs">
                    <div class="p-3 bg-slate-50 rounded-xl">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">OPD Consultation Fee</span>
                        <span class="font-extrabold text-[#EF7415] text-sm mt-0.5 block">
                            {{ $appointment->doctor->OPD_fee ? '₹' . number_format($appointment->doctor->OPD_fee) : 'Hospital Standard' }}
                        </span>
                    </div>
                    <div class="p-3 bg-slate-50 rounded-xl">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Clinical Speciality</span>
                        <span class="font-bold text-slate-800 text-xs mt-0.5 block truncate">
                            {{ $appointment->doctor->spaciality ?: 'General Consultation' }}
                        </span>
                    </div>
                </div>
                @else
                    <p class="text-xs text-slate-400 italic">No doctor assigned to this appointment.</p>
                @endif
            </div>

            <!-- Hospital & Healthcare Partner Card -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
                <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400 block border-b border-slate-100 pb-3">
                    Medical Facility & Partner
                </span>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    
                    <!-- Hospital -->
                    <div class="p-4 rounded-2xl bg-teal-50/50 border border-teal-100">
                        <div class="flex items-center gap-2 mb-1.5">
                            <span class="text-base">🏥</span>
                            <span class="text-[10px] font-extrabold uppercase tracking-wider text-[#27797D]">Hospital / Center</span>
                        </div>
                        @if($appointment->hospital)
                            <h4 class="font-extrabold text-sm text-[#112347]">{{ $appointment->hospital->name }}</h4>
                            <p class="text-[11px] text-slate-500 mt-1">
                                {{ $appointment->hospital->address ?: ($appointment->hospital->city->name ?? 'India') }}
                            </p>
                            @if($appointment->hospital->contact)
                                <a href="tel:{{ $appointment->hospital->contact }}" class="inline-block mt-2 text-[11px] font-bold text-[#27797D] hover:underline">
                                    📞 {{ $appointment->hospital->contact }}
                                </a>
                            @endif
                        @else
                            <p class="text-slate-400 italic">Hospital profile unassigned.</p>
                        @endif
                    </div>

                    <!-- Partner -->
                    <div class="p-4 rounded-2xl bg-orange-50/40 border border-orange-100">
                        <div class="flex items-center gap-2 mb-1.5">
                            <span class="text-base">🤝</span>
                            <span class="text-[10px] font-extrabold uppercase tracking-wider text-[#EF7415]">Partner Facilitator</span>
                        </div>
                        @if($appointment->partner)
                            <h4 class="font-extrabold text-sm text-[#112347]">
                                {{ $appointment->partner->company_name ?: $appointment->partner->name }}
                            </h4>
                            <p class="text-[11px] text-slate-500 mt-1">
                                Contact: {{ $appointment->partner->name }} ({{ $appointment->partner->country ?? 'Global' }})
                            </p>
                            @if($appointment->partner->phone)
                                <a href="tel:{{ $appointment->partner->phone }}" class="inline-block mt-2 text-[11px] font-bold text-[#EF7415] hover:underline">
                                    📞 {{ $appointment->partner->phone }}
                                </a>
                            @endif
                        @else
                            <p class="text-slate-400 italic">Booked directly by Admin Central Command.</p>
                        @endif
                    </div>

                </div>
            </div>

        </div>

    </div>

    <!-- CARD: Status-Wise History Audit Trail -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
            <div>
                <h3 class="text-sm font-extrabold text-[#112347]">Patient Status-Wise History & Timeline</h3>
                <p class="text-xs text-slate-400">Complete audit trail of all patient admission and clinical consultation stage transitions</p>
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
                        <th class="py-3 px-4">Notes / Remarks</th>
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
                        <td class="py-3 px-4">
                            <span class="font-bold text-slate-700">{{ $history->changed_by_name ?: ucfirst($history->changed_by_type) }}</span>
                            <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">({{ ucfirst($history->changed_by_type) }})</span>
                        </td>
                        <td class="py-3 px-4 text-slate-600">
                            {{ $history->notes ?: '—' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-slate-400 italic">No history records logged yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Hidden Form for Deletion -->
    <form id="single-delete-form" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</div>

@push('scripts')
<script>
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
</script>
@endpush
@endsection

