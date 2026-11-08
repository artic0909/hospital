@extends('admin.layouts.app')

@section('title', 'Agents & Facilitators Management - Admin Portal')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="text-xs font-bold uppercase tracking-wider text-[#27797D]">Agent Network</span>
                <span class="text-slate-300">&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $agents->total() }} Agents
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Agents & Facilitators Directory</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage registered medical travel agents, agency affiliations, direct power login, and track referred patient cases.</p>
        </div>

        <div class="flex items-center gap-3">
            <a 
                href="{{ route('admin.agent.create') }}"
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add Agent</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total Agents -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Total Agents</span>
                <span class="text-2xl sm:text-3xl font-black text-[#112347]">{{ number_format($stats['total'] ?? 0) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
        </div>

        <!-- Active Agents -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Active Accounts</span>
                <span class="text-2xl sm:text-3xl font-black text-emerald-700">{{ number_format($stats['active'] ?? 0) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        <!-- Total Patients Referred -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Referred Patients</span>
                <span class="text-2xl sm:text-3xl font-black text-[#27797D]">{{ number_format($stats['total_patients'] ?? 0) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
        </div>

        <!-- Total Appointments -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Total Appointments</span>
                <span class="text-2xl sm:text-3xl font-black text-amber-600">{{ number_format($stats['total_appointments'] ?? 0) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-[#EF7415] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        
        <!-- Search & Filter Controls -->
        <div class="p-4 sm:p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <form action="{{ route('admin.agent.index') }}" method="GET" class="flex flex-wrap items-center gap-3 w-full lg:w-auto flex-1">
                
                <!-- Search Input -->
                <div class="relative w-full sm:w-64">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Search name, code, company, phone..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2 pl-9 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    >
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <!-- Country Filter -->
                <select 
                    name="country" 
                    onchange="this.form.submit()"
                    class="bg-slate-50 focus:bg-white text-xs px-3 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all cursor-pointer"
                >
                    <option value="">All Countries</option>
                    @foreach($filterCountries as $country)
                        <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                    @endforeach
                </select>

                <!-- Status Filter -->
                <select 
                    name="status" 
                    onchange="this.form.submit()"
                    class="bg-slate-50 focus:bg-white text-xs px-3 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all cursor-pointer"
                >
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="suspended" {{ request('status') === 'suspended' ? 'selected' : '' }}>Suspended</option>
                </select>

                <button type="submit" class="px-3.5 py-2 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold rounded-xl transition-colors cursor-pointer">
                    Filter
                </button>

                @if(request()->hasAny(['search', 'country', 'status']))
                    <a href="{{ route('admin.agent.index') }}" class="px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- Agents Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-3.5 px-5">Agent Code</th>
                        <th class="py-3.5 px-5">Agent Name & Agency</th>
                        <th class="py-3.5 px-4">Contact</th>
                        <th class="py-3.5 px-4">Country</th>
                        <th class="py-3.5 px-4 text-center">Patients</th>
                        <th class="py-3.5 px-4 text-center">Appointments</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($agents as $agent)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            
                            <!-- Agent Code -->
                            <td class="py-3.5 px-5">
                                <a href="{{ route('admin.agent.view', $agent->id) }}" class="font-mono font-bold text-[#27797D] hover:underline">
                                    {{ $agent->agent_code }}
                                </a>
                            </td>

                            <!-- Name & Agency -->
                            <td class="py-3.5 px-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#27797D] to-[#EF7415] text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-2xs">
                                        {{ strtoupper(substr($agent->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.agent.view', $agent->id) }}" class="font-bold text-[#112347] hover:text-[#27797D] block">
                                            {{ $agent->name }}
                                        </a>
                                        @if($agent->company_name)
                                            <span class="text-[11px] text-slate-400 block truncate max-w-[180px]">{{ $agent->company_name }}</span>
                                        @else
                                            <span class="text-[10px] text-slate-400 block italic">Independent Facilitator</span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <!-- Contact -->
                            <td class="py-3.5 px-4">
                                <div class="space-y-0.5">
                                    <a href="tel:{{ $agent->phone }}" class="text-xs font-semibold text-slate-800 hover:text-[#27797D] block">
                                        📞 {{ $agent->phone }}
                                    </a>
                                    <span class="text-[11px] text-slate-400 block truncate max-w-[170px]">
                                        ✉️ {{ $agent->email }}
                                    </span>
                                </div>
                            </td>

                            <!-- Country -->
                            <td class="py-3.5 px-4">
                                <span class="font-medium text-slate-700">{{ $agent->country }}</span>
                                @if($agent->agent_type)
                                    <span class="text-[10px] text-slate-400 block">{{ $agent->agent_type }}</span>
                                @endif
                            </td>

                            <!-- Patients Count -->
                            <td class="py-3.5 px-4 text-center">
                                <a 
                                    href="{{ route('admin.patient.index', ['agent_id' => $agent->id]) }}" 
                                    class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 hover:bg-teal-100 border border-teal-200 transition-colors"
                                    title="View all patients referred by {{ $agent->name }}"
                                >
                                    <span>{{ $agent->patients_count }}</span>
                                </a>
                            </td>

                            <!-- Appointments Count -->
                            <td class="py-3.5 px-4 text-center">
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                    <span>{{ $agent->appointments_count }}</span>
                                </span>
                            </td>

                            <!-- Status -->
                            <td class="py-3.5 px-4">
                                @if($agent->status === 'active')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                        Suspended
                                    </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="py-3.5 px-5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1">
                                    
                                    <!-- Power Button: Direct Login as this Agent -->
                                    <a 
                                        href="{{ route('admin.agent.login-direct', $agent->id) }}"
                                        target="_blank"
                                        class="p-1.5 rounded-lg text-emerald-600 hover:text-white hover:bg-emerald-600 bg-emerald-50/80 border border-emerald-200 transition-all shadow-2xs group/power"
                                        title="Direct Login to Agent Portal as {{ $agent->name }}"
                                    >
                                        <svg class="w-4 h-4 transition-transform group-hover/power:scale-110" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
                                        </svg>
                                    </a>

                                    <!-- View Dossier -->
                                    <a 
                                        href="{{ route('admin.agent.view', $agent->id) }}"
                                        class="p-1.5 rounded-lg text-[#27797D] hover:bg-teal-50 transition-colors"
                                        title="View Agent Dossier"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    <!-- Edit -->
                                    <a 
                                        href="{{ route('admin.agent.update', $agent->id) }}"
                                        class="p-1.5 rounded-lg text-slate-600 hover:bg-slate-100 transition-colors"
                                        title="Edit Agent Details"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('admin.agent.destroy', $agent->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmDelete(this, '{{ addslashes($agent->name) }} ({{ $agent->agent_code }})')"
                                            class="p-1.5 rounded-lg text-rose-500 hover:bg-rose-50 transition-colors cursor-pointer"
                                            title="Delete Agent"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-12 text-center">
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-400 mx-auto flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </div>
                                <h4 class="text-sm font-bold text-slate-700">No agents registered yet</h4>
                                <p class="text-xs text-slate-400 mt-1 max-w-sm mx-auto">Agents who register from the frontend or whom you manually add will appear here.</p>
                                <a 
                                    href="{{ route('admin.agent.create') }}" 
                                    class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-xl bg-[#27797D] text-white text-xs font-bold hover:bg-[#1e5f62] transition-colors"
                                >
                                    + Add New Agent
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($agents->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $agents->links() }}
            </div>
        @endif
    </div>

</div>

@push('scripts')
<script>
    function confirmDelete(button, agentLabel) {
        Swal.fire({
            title: 'Delete Agent?',
            text: `Are you sure you want to delete agent "${agentLabel}"? Associated patient records will be safely unlinked rather than deleted.`,
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
</script>
@endpush
@endsection

