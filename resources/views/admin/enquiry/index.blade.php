@extends('admin.layouts.app')

@section('title', 'Patient Enquiries & Leads - Heal Go Fly Admin')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $stats['total'] }} Enquiries Received
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Patient Inquiries & Consultation Requests</h1>
            <p class="text-xs text-slate-500 mt-0.5">Track incoming leads, hospital consultation requests, and doctor appointment queries.</p>
        </div>

        @if($stats['pending'] > 0)
            <div class="inline-flex items-center gap-2 bg-amber-50 text-amber-800 border border-amber-200 px-4 py-2.5 rounded-2xl text-xs font-bold shadow-2xs">
                <span class="w-2 h-2 rounded-full bg-amber-500 animate-ping"></span>
                <span>{{ $stats['pending'] }} New Pending Review</span>
            </div>
        @endif
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Total Leads</span>
                <span class="text-2xl sm:text-3xl font-black text-[#112347]">{{ number_format($stats['total']) }}</span>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                📋
            </div>
        </div>

        <!-- Pending -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Pending</span>
                <span class="text-2xl sm:text-3xl font-black text-amber-600">{{ number_format($stats['pending']) }}</span>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                ⏳
            </div>
        </div>

        <!-- With Hospital -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Hospital Specific</span>
                <span class="text-2xl sm:text-3xl font-black text-[#27797D]">{{ number_format($stats['with_hospital']) }}</span>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                🏥
            </div>
        </div>

        <!-- With Doctor -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Doctor Specific</span>
                <span class="text-2xl sm:text-3xl font-black text-[#EF7415]">{{ number_format($stats['with_doctor']) }}</span>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0">
                👨‍⚕️
            </div>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs">
        <form method="GET" action="{{ route('admin.enquiries.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3 items-center">
            <!-- Search -->
            <div class="lg:col-span-4 relative">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ $search }}" 
                    placeholder="Search name, phone, problem, city..." 
                    class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 placeholder-slate-400 pl-10 pr-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                >
            </div>

            <!-- Status Filter -->
            <div class="lg:col-span-3">
                <select 
                    name="status" 
                    class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    onchange="this.form.submit()"
                >
                    <option value="">All Statuses</option>
                    <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Pending Review</option>
                    <option value="contacted" {{ $status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="in_treatment" {{ $status === 'in_treatment' ? 'selected' : '' }}>In Treatment</option>
                    <option value="closed" {{ $status === 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <!-- Hospital Filter -->
            <div class="lg:col-span-3">
                <select 
                    name="hospital_id" 
                    class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    onchange="this.form.submit()"
                >
                    <option value="">All Hospitals</option>
                    @foreach($hospitals as $hosp)
                        <option value="{{ $hosp->id }}" {{ $hospitalId == $hosp->id ? 'selected' : '' }}>
                            {{ $hosp->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit & Reset -->
            <div class="lg:col-span-2 flex items-center gap-2">
                <button type="submit" class="w-full bg-[#27797D] hover:bg-[#1f6063] text-white text-xs font-bold py-2.5 px-4 rounded-xl transition-all cursor-pointer text-center">
                    Filter
                </button>
                @if($search || $status || $hospitalId || $hasDoctor)
                    <a href="{{ route('admin.enquiries.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold py-2.5 px-3 rounded-xl transition-all" title="Reset Filters">
                        ✕
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Enquiries Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-200/80 bg-slate-50/60 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-3.5 px-5">Patient & Contact</th>
                        <th class="py-3.5 px-5">Medical Problem & Age</th>
                        <th class="py-3.5 px-5">Target Hospital & Doctor</th>
                        <th class="py-3.5 px-4 text-center">Status</th>
                        <th class="py-3.5 px-4">Date</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse ($enquiries as $item)
                        @php
                            $badge = $item->status_badge;
                        @endphp
                        <tr class="hover:bg-slate-50/60 transition-colors {{ $item->status === 'pending' ? 'bg-amber-50/20' : '' }}">
                            <!-- Patient Info -->
                            <td class="py-4 px-5">
                                <div class="font-extrabold text-[#112347] text-sm">
                                    {{ $item->name }}
                                </div>
                                <div class="text-[11px] text-slate-600 font-semibold mt-0.5 flex items-center gap-1.5">
                                    <span class="text-emerald-600">📞</span>
                                    <a href="tel:{{ $item->phone }}" class="hover:underline">{{ $item->phone }}</a>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->phone) }}" target="_blank" class="text-emerald-500 hover:text-emerald-600 text-xs font-bold" title="WhatsApp Chat">💬</a>
                                </div>
                                <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1">
                                    <span>📍</span>
                                    <span>{{ collect([$item->city, $item->country])->filter()->implode(', ') ?: 'International' }}</span>
                                </div>
                            </td>

                            <!-- Medical Problem & Age -->
                            <td class="py-4 px-5 max-w-xs">
                                <div class="text-slate-800 line-clamp-2 leading-relaxed">
                                    {{ $item->problem ?: 'General consultation request' }}
                                </div>
                                @if($item->age_or_dob)
                                    <div class="text-[11px] text-slate-400 font-semibold mt-1">
                                        🎂 Age/DOB: <span class="text-slate-700">{{ $item->age_or_dob }}</span>
                                    </div>
                                @endif
                            </td>

                            <!-- Associated Hospital & Doctor -->
                            <td class="py-4 px-5">
                                <div class="space-y-1.5">
                                    @if($item->hospital)
                                        <div class="flex items-center gap-1.5">
                                            <span class="inline-flex items-center gap-1 bg-teal-50 text-[#27797D] border border-teal-200 px-2 py-0.5 rounded-lg text-[11px] font-bold">
                                                <span>🏥</span>
                                                <span class="truncate max-w-[170px]">{{ $item->hospital->name }}</span>
                                            </span>
                                        </div>
                                    @endif

                                    @if($item->doctor)
                                        <div class="flex items-center gap-1.5">
                                            <span class="inline-flex items-center gap-1 bg-orange-50 text-[#EF7415] border border-orange-200 px-2 py-0.5 rounded-lg text-[11px] font-bold">
                                                <span>👨‍⚕️</span>
                                                <span class="truncate max-w-[170px]">Dr. {{ $item->doctor->name }}</span>
                                            </span>
                                        </div>
                                    @endif

                                    @if(!$item->hospital && !$item->doctor)
                                        <span class="text-[11px] text-slate-400 italic">
                                            General Website Lead
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <!-- Status -->
                            <td class="py-4 px-4 text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold border {{ $badge['class'] }}">
                                    {{ $badge['label'] }}
                                </span>
                            </td>

                            <!-- Date -->
                            <td class="py-4 px-4 text-slate-400 text-[11px] whitespace-nowrap">
                                <div>{{ $item->created_at->format('M d, Y') }}</div>
                                <div class="text-[10px] text-slate-400">{{ $item->created_at->format('h:i A') }}</div>
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-5 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1.5">
                                    <a 
                                        href="{{ route('admin.enquiries.show', $item->id) }}" 
                                        class="p-2 text-slate-500 hover:text-[#27797D] hover:bg-teal-50 rounded-xl transition-all"
                                        title="View Full Details & Associations"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    <form 
                                        action="{{ route('admin.enquiries.destroy', $item->id) }}" 
                                        method="POST" 
                                        onsubmit="return confirm('Are you sure you want to delete this enquiry?');"
                                        class="inline"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all cursor-pointer"
                                            title="Delete Lead"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <div class="max-w-xs mx-auto space-y-2">
                                    <div class="text-3xl">📋</div>
                                    <p class="font-semibold text-slate-700">No Patient Enquiries Found</p>
                                    <p class="text-[11px] text-slate-400">When patients submit the consultation or book appointment forms, enquiries will appear here instantly.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($enquiries->hasPages())
            <div class="p-5 border-t border-slate-100">
                {{ $enquiries->links() }}
            </div>
        @endif
    </div>

</div>
@endsection

