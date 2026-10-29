@extends('partner.layouts.app')

@section('title', 'Patient Appointments - Partner Portal')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('partner.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $appointments->total() }} Appointments
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Patient Appointments</h1>
            <p class="text-xs text-slate-500 mt-0.5">Track incoming patient consultations, hospital arrivals, treatments, and discharge updates.</p>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-3.5 sm:gap-4">
        <!-- Total -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Total</span>
                <span class="text-xl sm:text-2xl font-black text-[#112347]">{{ number_format($stats['total']) }}</span>
            </div>
            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </div>

        <!-- Booked -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-blue-500 block mb-0.5">Booked</span>
                <span class="text-xl sm:text-2xl font-black text-[#1D4B6C]">{{ number_format($stats['booked']) }}</span>
            </div>
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1D4B6C] flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        <!-- Received -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-amber-500 block mb-0.5">Received</span>
                <span class="text-xl sm:text-2xl font-black text-amber-700">{{ number_format($stats['received']) }}</span>
            </div>
            <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        <!-- Treatment -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-purple-500 block mb-0.5">In Treatment</span>
                <span class="text-xl sm:text-2xl font-black text-purple-700">{{ number_format($stats['treatment']) }}</span>
            </div>
            <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
            </div>
        </div>

        <!-- Discharge -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-emerald-500 block mb-0.5">Discharged</span>
                <span class="text-xl sm:text-2xl font-black text-emerald-700">{{ number_format($stats['discharge']) }}</span>
            </div>
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs">
        <form action="{{ route('partner.appointment.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <div class="sm:col-span-5 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search code, patient name, doctor..." 
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 pl-9 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium text-slate-700"
                >
                <div class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <div class="sm:col-span-3">
                <select 
                    name="status" 
                    onchange="this.form.submit()"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer"
                >
                    <option value="">All Statuses</option>
                    <option value="booked" {{ request('status') == 'booked' ? 'selected' : '' }}>Booked</option>
                    <option value="received" {{ request('status') == 'received' ? 'selected' : '' }}>Received</option>
                    <option value="treatment" {{ request('status') == 'treatment' ? 'selected' : '' }}>In Treatment</option>
                    <option value="discharge" {{ request('status') == 'discharge' ? 'selected' : '' }}>Discharged</option>
                </select>
            </div>

            <div class="sm:col-span-3">
                <input 
                    type="date" 
                    name="date" 
                    value="{{ request('date') }}" 
                    onchange="this.form.submit()"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer"
                    title="Filter Date"
                >
            </div>

            <div class="sm:col-span-1 flex items-center justify-end">
                @if(request()->hasAny(['search', 'status', 'date']))
                <a 
                    href="{{ route('partner.appointment.index') }}" 
                    class="p-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold transition-all shrink-0 cursor-pointer"
                    title="Reset Filters"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </a>
                @endif
            </div>

        </form>
    </div>

    <!-- Data Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-200 text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                        <th class="py-3.5 px-4">Code</th>
                        <th class="py-3.5 px-4">Patient</th>
                        <th class="py-3.5 px-4">Doctor</th>
                        <th class="py-3.5 px-4">Hospital</th>
                        <th class="py-3.5 px-4">Schedule</th>
                        <th class="py-3.5 px-4 text-center">Status</th>
                        <th class="py-3.5 px-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($appointments as $apt)
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        
                        <td class="py-3.5 px-4 font-mono font-bold text-[#27797D]">
                            #{{ $apt->appointment_code }}
                        </td>

                        <td class="py-3.5 px-4">
                            @if($apt->patient)
                                <div class="font-bold text-[#112347]">{{ $apt->patient->name }}</div>
                                <div class="text-[11px] font-mono text-[#27797D]">#PT-{{ str_pad($apt->patient->id, 5, '0', STR_PAD_LEFT) }}</div>
                            @else
                                <span class="text-slate-400 italic">Unknown Patient</span>
                            @endif
                        </td>

                        <td class="py-3.5 px-4">
                            @if($apt->doctor)
                                <div class="font-bold text-[#112347]">👨‍⚕️ {{ $apt->doctor->name }}</div>
                                <div class="text-[11px] text-[#27797D]">{{ $apt->doctor->spaciality ?: 'Consultant' }}</div>
                            @else
                                <span class="text-slate-400 italic">Unassigned</span>
                            @endif
                        </td>

                        <td class="py-3.5 px-4 font-semibold text-slate-800">
                            {{ $apt->hospital ? $apt->hospital->name : 'Facility N/A' }}
                        </td>

                        <td class="py-3.5 px-4 text-slate-600">
                            <div>{{ $apt->appointment_date ? $apt->appointment_date->format('M d, Y') : 'Date TBD' }}</div>
                            <div class="text-[11px] text-slate-400">{{ $apt->appointment_time ?: 'Standard OPD' }}</div>
                        </td>

                        <td class="py-3.5 px-4 text-center">
                            <span class="inline-block px-3 py-1 rounded-xl text-[11px] font-bold {{ $apt->status_badge_class }}">
                                {{ ucfirst($apt->status) }}
                            </span>        
                        </td>

                        <td class="py-3.5 px-4 text-center">
                            <button 
                                type="button" 
                                onclick="openAppointmentModal({{ $apt->id }})"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-teal-50 hover:bg-[#27797D] text-[#27797D] hover:text-white border border-teal-200/80 text-xs font-bold transition-all shadow-xs cursor-pointer group"
                                title="View Patient Timeline & Status History"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <span>View Status</span>
                            </button>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-14 text-center">
                            <div class="max-w-sm mx-auto space-y-2">
                                <span class="text-3xl">📅</span>
                                <h3 class="text-sm font-bold text-slate-800">No appointments recorded</h3>
                                <p class="text-xs text-slate-400">Consultation bookings through admin or facilitator referral desk will appear here.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($appointments->hasPages())
        <div class="p-4 border-t border-slate-100 flex items-center justify-between">
            <span class="text-xs text-slate-400 font-medium">
                Showing {{ $appointments->firstItem() }} to {{ $appointments->lastItem() }} of {{ $appointments->total() }} appointments
            </span>
            <div>
                {{ $appointments->links() }}
            </div>
        </div>
        @endif
    </div>

    <!-- ==================== APPOINTMENT & STATUS HISTORY VIEW MODAL ==================== -->
    <div 
        id="appointment-history-modal" 
        class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4 hidden transition-opacity duration-200"
        aria-modal="true"
        role="dialog"
    >
        <div 
            class="bg-white rounded-3xl shadow-2xl border border-slate-100 max-w-3xl w-full overflow-hidden flex flex-col max-h-[90vh] transform transition-all duration-200 scale-95 opacity-0"
            id="appointment-modal-card"
        >
            <!-- Modal Header -->
            <div class="px-6 py-5 bg-slate-50/80 border-b border-slate-200/80 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-teal-50 text-[#27797D] border border-teal-200/60 flex items-center justify-center font-bold text-base shrink-0">
                        📋
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-base font-black text-[#112347]" id="modal-patient-name">Patient Name</h3>
                            <span class="font-mono text-[11px] font-bold text-[#27797D] bg-teal-50 px-2 py-0.5 rounded-md border border-teal-200/60" id="modal-patient-code">#PT-00001</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-slate-500 mt-0.5">
                            <span>Appointment: <strong class="font-mono text-slate-700" id="modal-appointment-code">#APT-XXXX</strong></span>
                            <span>&bull;</span>
                            <span id="modal-patient-phone">📞 +91...</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <span id="modal-current-status-badge" class="px-3 py-1 rounded-xl text-xs font-bold border">
                        Status
                    </span>
                    <button 
                        type="button" 
                        onclick="closeAppointmentModal()"
                        class="p-2 rounded-xl text-slate-400 hover:text-slate-700 hover:bg-slate-200/60 transition-colors cursor-pointer"
                        aria-label="Close modal"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="p-6 overflow-y-auto space-y-6 text-xs">
                
                <!-- Key Info Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5">
                    <div class="p-3.5 bg-slate-50 rounded-2xl border border-slate-100">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Attending Doctor</span>
                        <p class="font-extrabold text-slate-800 text-xs" id="modal-doctor-name">—</p>
                        <p class="text-[11px] text-[#27797D] font-semibold mt-0.5" id="modal-doctor-speciality">—</p>
                    </div>
                    <div class="p-3.5 bg-slate-50 rounded-2xl border border-slate-100">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Medical Facility</span>
                        <p class="font-extrabold text-slate-800 text-xs" id="modal-hospital-name">—</p>
                        <p class="text-[11px] text-slate-500 mt-0.5" id="modal-hospital-phone">—</p>
                    </div>
                    <div class="p-3.5 bg-slate-50 rounded-2xl border border-slate-100">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Scheduled Slot</span>
                        <p class="font-extrabold text-slate-800 text-xs" id="modal-schedule-date">—</p>
                        <p class="text-[11px] text-slate-500 mt-0.5" id="modal-schedule-time">—</p>
                    </div>
                </div>

                <!-- Clinical Notes (if available) -->
                <div id="modal-notes-container" class="hidden">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Clinical Notes & Complaints</span>
                    <p class="p-3.5 rounded-2xl bg-amber-50/60 border border-amber-200/70 text-slate-700 leading-relaxed" id="modal-notes-text"></p>
                </div>

                <!-- Patient Status-Wise History Table -->
                <div class="space-y-3">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                        <div>
                            <h4 class="text-xs font-black uppercase tracking-wider text-[#112347]">Patient Status-Wise History</h4>
                            <p class="text-[11px] text-slate-400">Date and time recorded for each stage milestone</p>
                        </div>
                        <span class="px-2 py-0.5 rounded-lg bg-teal-50 text-[#27797D] font-mono font-bold text-[11px]" id="modal-history-count">0 stages</span>
                    </div>

                    <div class="border border-slate-200/80 rounded-2xl overflow-hidden shadow-2xs">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200 text-[10px] font-extrabold uppercase tracking-wider text-slate-500">
                                    <th class="py-2.5 px-3.5">Status / Stage</th>
                                    <th class="py-2.5 px-3.5">Date</th>
                                    <th class="py-2.5 px-3.5">Time</th>
                                    <th class="py-2.5 px-3.5">Updated By</th>
                                    <th class="py-2.5 px-3.5">Remarks</th>
                                </tr>
                            </thead>
                            <tbody id="modal-history-tbody" class="divide-y divide-slate-100">
                                <!-- Dynamic rows inserted by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 bg-slate-50/80 border-t border-slate-200/80 flex items-center justify-between">
                <span class="text-[11px] text-slate-400 font-medium">Heal Go Fly Patient Care Portal</span>
                <button 
                    type="button" 
                    onclick="closeAppointmentModal()"
                    class="px-5 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-100 text-xs font-bold text-slate-700 transition-colors cursor-pointer"
                >
                    Close Dossier
                </button>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    const appointmentsModalDataset = @json($appointmentsModalData);

    const modalEl = document.getElementById('appointment-history-modal');
    const modalCard = document.getElementById('appointment-modal-card');

    function openAppointmentModal(appointmentId) {
        const data = appointmentsModalDataset[appointmentId];
        if (!data) return;

        // Populate Patient info
        document.getElementById('modal-patient-name').textContent = data.patient.name;
        document.getElementById('modal-patient-code').textContent = data.patient.code || '';
        document.getElementById('modal-appointment-code').textContent = '#' + data.code;
        document.getElementById('modal-patient-phone').textContent = data.patient.phone ? ('📞 ' + data.patient.phone) : 'No phone';

        // Populate Status Badge
        const badgeEl = document.getElementById('modal-current-status-badge');
        badgeEl.className = 'px-3 py-1 rounded-xl text-xs font-bold border ' + (data.status_badge || 'bg-slate-100 text-slate-700');
        badgeEl.textContent = data.status_label || data.status;

        // Populate Doctor info
        document.getElementById('modal-doctor-name').textContent = '👨‍⚕️ ' + data.doctor.name;
        document.getElementById('modal-doctor-speciality').textContent = data.doctor.speciality + (data.doctor.fee ? ' • ' + data.doctor.fee : '');

        // Populate Hospital info
        document.getElementById('modal-hospital-name').textContent = '🏥 ' + data.hospital.name;
        document.getElementById('modal-hospital-phone').textContent = data.hospital.phone ? ('📞 ' + data.hospital.phone) : (data.hospital.address || '');

        // Populate Schedule
        document.getElementById('modal-schedule-date').textContent = data.date;
        document.getElementById('modal-schedule-time').textContent = data.time;

        // Populate Notes
        const notesContainer = document.getElementById('modal-notes-container');
        const notesText = document.getElementById('modal-notes-text');
        if (data.notes && data.notes.trim()) {
            notesText.textContent = data.notes;
            notesContainer.classList.remove('hidden');
        } else {
            notesContainer.classList.add('hidden');
        }

        // Populate Status Histories Table
        const tbody = document.getElementById('modal-history-tbody');
        tbody.innerHTML = '';

        if (data.histories && data.histories.length > 0) {
            document.getElementById('modal-history-count').textContent = data.histories.length + (data.histories.length === 1 ? ' stage' : ' stages');
            
            data.histories.forEach(h => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-50/70 transition-colors';
                tr.innerHTML = `
                    <td class="py-2.5 px-3.5">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-lg text-[11px] font-bold border ${h.badge_class || 'bg-slate-100 text-slate-700'}">
                            <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                            ${h.status_label || h.status}
                        </span>
                    </td>
                    <td class="py-2.5 px-3.5 font-semibold text-slate-800 text-[11px]">${h.date}</td>
                    <td class="py-2.5 px-3.5 font-mono text-slate-600 font-medium text-[11px]">${h.time}</td>
                    <td class="py-2.5 px-3.5 font-bold text-slate-700 text-[11px]">${h.updated_by}</td>
                    <td class="py-2.5 px-3.5 text-slate-500 text-[11px]">${h.notes}</td>
                `;
                tbody.appendChild(tr);
            });
        } else {
            document.getElementById('modal-history-count').textContent = '1 stage';
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td class="py-2.5 px-3.5">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-lg text-[11px] font-bold border ${data.status_badge || 'bg-blue-50 text-blue-700'}">
                        <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                        ${data.status_label || data.status}
                    </span>
                </td>
                <td class="py-2.5 px-3.5 font-semibold text-slate-800 text-[11px]">${data.date}</td>
                <td class="py-2.5 px-3.5 font-mono text-slate-600 font-medium text-[11px]">${data.time}</td>
                <td class="py-2.5 px-3.5 font-bold text-slate-700 text-[11px]">System Booking</td>
                <td class="py-2.5 px-3.5 text-slate-500 text-[11px]">Initial registration</td>
            `;
            tbody.appendChild(tr);
        }

        // Show modal with animation
        modalEl.classList.remove('hidden');
        setTimeout(() => {
            modalCard.classList.remove('scale-95', 'opacity-0');
            modalCard.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeAppointmentModal() {
        modalCard.classList.remove('scale-100', 'opacity-100');
        modalCard.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modalEl.classList.add('hidden');
        }, 150);
    }

    // Close on backdrop click
    modalEl.addEventListener('click', function(e) {
        if (e.target === modalEl) {
            closeAppointmentModal();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modalEl.classList.contains('hidden')) {
            closeAppointmentModal();
        }
    });
</script>
@endpush
@endsection

