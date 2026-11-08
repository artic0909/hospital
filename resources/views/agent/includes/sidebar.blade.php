@php
    $agent = Auth::guard('agent')->user();
    $myPatientCount = \App\Models\Patient::where('agent_id', $agent->id)->count();
    $myAppointmentCount = \App\Models\Appointment::where('agent_id', $agent->id)
        ->orWhereHas('patient', fn($q) => $q->where('agent_id', $agent->id))
        ->count();
@endphp

<!-- Sidebar Backdrop (Mobile) -->
<div id="sidebar-backdrop" onclick="toggleAgentSidebar()" class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-xs hidden lg:hidden transition-opacity"></div>

<!-- Sidebar Container -->
<aside id="agent-sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-[#112347] text-white flex flex-col justify-between transition-transform duration-300 transform -translate-x-full lg:translate-x-0 shadow-2xl lg:shadow-none border-r border-slate-800">
    
    <!-- Top Brand & Agent Badge -->
    <div>
        <!-- Brand Header -->
        <div class="h-16 px-5 flex items-center justify-between border-b border-slate-800/80 bg-[#0e1d3a]">
            <a href="{{ route('agent.dashboard') }}" class="flex items-center gap-2.5">
                <img src="{{ asset('logo.png') }}" alt="Heal Go Fly" class="h-8 w-auto object-contain bg-white rounded-lg px-2 py-0.5">
                <div class="leading-none">
                    <span class="text-xs font-black tracking-tight text-white block">HEAL GO FLY</span>
                    <span class="text-[9px] font-bold text-amber-400 uppercase tracking-widest block mt-0.5">Agent Portal</span>
                </div>
            </a>

            <!-- Close button for mobile -->
            <button type="button" onclick="toggleAgentSidebar()" class="lg:hidden text-slate-400 hover:text-white p-1 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Agent Identification Pill -->
        <div class="p-4 mx-3 my-3 rounded-2xl bg-gradient-to-br from-slate-800/90 to-slate-800/40 border border-slate-700/60">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#27797D] to-[#EF7415] text-white flex items-center justify-center font-black text-sm shadow-md shrink-0">
                    {{ strtoupper(substr($agent->name, 0, 2)) }}
                </div>
                <div class="truncate flex-1 min-w-0">
                    <h4 class="font-bold text-xs text-white truncate">{{ $agent->name }}</h4>
                    <div class="flex items-center gap-1.5 mt-0.5">
                        <span class="text-[10px] font-mono font-bold text-amber-400 bg-amber-500/10 px-1.5 py-0.2 rounded border border-amber-500/20">
                            {{ $agent->agent_code }}
                        </span>
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    </div>
                </div>
            </div>
            @if($agent->company_name)
                <p class="text-[10px] text-slate-400 mt-2 truncate font-medium">
                    🏢 {{ $agent->company_name }}
                </p>
            @endif
        </div>

        <!-- Navigation Menu -->
        <nav class="px-3 space-y-1">
            
            <!-- Dashboard -->
            <a 
                href="{{ route('agent.dashboard') }}" 
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('agent.dashboard') ? 'bg-[#27797D] text-white shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/70' }}"
            >
                <div class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 {{ request()->routeIs('agent.dashboard') ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Dashboard</span>
                </div>
            </a>

            <!-- Patients Management -->
            <a 
                href="{{ route('agent.patient.index') }}" 
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('agent.patient*') ? 'bg-[#27797D] text-white shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/70' }}"
            >
                <div class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 {{ request()->routeIs('agent.patient*') ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    <span>My Patients</span>
                </div>
                @if($myPatientCount > 0)
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-black {{ request()->routeIs('agent.patient*') ? 'bg-white text-[#27797D]' : 'bg-slate-800 text-teal-300 border border-teal-500/30' }}">
                        {{ $myPatientCount }}
                    </span>
                @endif
            </a>

            <!-- Appointments / Care Journey -->
            <a 
                href="{{ route('agent.appointment.index') }}" 
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('agent.appointment*') ? 'bg-[#27797D] text-white shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/70' }}"
            >
                <div class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 {{ request()->routeIs('agent.appointment*') ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Appointments & Status</span>
                </div>
                @if($myAppointmentCount > 0)
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-black {{ request()->routeIs('agent.appointment*') ? 'bg-white text-[#27797D]' : 'bg-amber-500/20 text-amber-300 border border-amber-500/30' }}">
                        {{ $myAppointmentCount }}
                    </span>
                @endif
            </a>

            <!-- Quick Action: Register Patient -->
            <div class="pt-4">
                <a 
                    href="{{ route('agent.patient.create') }}" 
                    class="flex items-center justify-center gap-2 w-full py-2.5 px-3 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    <span>Add New Patient</span>
                </a>
            </div>

        </nav>
    </div>

    <!-- Bottom Actions: User profile & Logout -->
    <div class="p-3 border-t border-slate-800/80 bg-[#0e1d3a]">
        <div class="flex items-center justify-between">
            <div class="truncate">
                <span class="text-[10px] text-slate-400 uppercase font-bold tracking-wider block">Logged in as</span>
                <span class="text-xs font-bold text-white truncate block">{{ $agent->email }}</span>
            </div>
            
            <form action="{{ route('agent.logout') }}" method="POST">
                @csrf
                <button 
                    type="submit" 
                    title="Log Out" 
                    class="p-2 rounded-xl text-slate-400 hover:text-rose-400 hover:bg-slate-800 transition-colors cursor-pointer"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                </button>
            </form>
        </div>
    </div>

</aside>

