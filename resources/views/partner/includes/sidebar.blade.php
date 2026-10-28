<!-- Mobile Backdrop Overlay -->
<div 
    id="partner-sidebar-backdrop" 
    class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs z-40 lg:hidden transition-opacity duration-300 opacity-0 pointer-events-none"
></div>

<!-- Left Admin Sidebar -->
<aside 
    id="partner-sidebar" 
    class="fixed inset-y-0 left-0 z-50 w-64 bg-[#112347] text-slate-300 flex flex-col transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0 border-r border-slate-800 shadow-xl lg:shadow-none"
>
    <!-- Sidebar Header / Brand Logo -->
    <div class="h-16 px-5 flex items-center justify-between border-b border-slate-800/80 bg-[#0d1b36] shrink-0">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5 notranslate group">
            <div class="bg-white px-2 py-1 rounded-xl shadow-xs border border-white/20 flex items-center justify-center shrink-0">
                <img src="{{ asset('logo.png') }}" alt="Heal Go Fly" class="h-8 w-auto object-contain">
            </div>
            <div class="flex flex-col leading-none">
                <span class="text-base font-black tracking-tight text-white group-hover:text-teal-200 transition-colors">
                    HealGoFly
                </span>
                <span class="text-[9px] uppercase font-bold text-[#EF7415] tracking-wider mt-0.5">
                    Partner Desk
                </span>
            </div>
        </a>

        <!-- Mobile Close Button -->
        <button 
            id="partner-sidebar-close-btn" 
            type="button" 
            class="lg:hidden p-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800 transition-colors"
            aria-label="Close Sidebar"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Partner Status Ribbon -->
    <div class="px-5 py-2.5 bg-gradient-to-r from-[#1D4B6C] to-[#27797D] text-white flex items-center justify-between text-[11px] font-semibold shrink-0">
        <div class="flex items-center gap-1.5 truncate">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span class="truncate">#HGF-{{ str_pad(auth('partner')->user()->id ?? 1, 5, '0', STR_PAD_LEFT) }}</span>
        </div>
        <span class="bg-black/20 px-2 py-0.5 rounded text-[10px] uppercase font-bold tracking-wider text-teal-200">
            Verified
        </span>
    </div>

    <!-- Scrollable Navigation Menu -->
    <nav class="flex-1 overflow-y-auto px-3.5 py-4 space-y-6 text-xs font-semibold">
        
        <!-- SECTION 1: CORE / CASES -->
        <div>
            <span class="px-3 text-[10px] font-extrabold uppercase tracking-widest text-slate-400 block mb-2">
                Main Overview
            </span>
            <div class="space-y-1">
                <!-- Dashboard -->
                <a 
                    href="{{ route('partner.dashboard') }}" 
                    class="flex items-center justify-between px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('partner.dashboard') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ request()->routeIs('partner.dashboard') ? 'text-teal-100' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                    @if(request()->routeIs('partner.dashboard'))
                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                    @endif
                </a>

                <!-- Patients & Reports -->
                <a 
                    href="{{ route('partner.patient.index') }}" 
                    class="flex items-center justify-between px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('partner.patient*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ request()->routeIs('partner.patient*') ? 'text-teal-100' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span>Patients</span>
                    </div>
                    @if(request()->routeIs('partner.patient*'))
                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                    @else
                        <span class="px-1.5 py-0.5 rounded text-[9px] font-extrabold bg-[#EF7415]/20 text-[#EF7415]">Reports</span>
                    @endif
                </a>

                <a 
                    href="{{ route('partner.dashboard') }}" 
                    class="flex items-center justify-between px-3 py-2.5 rounded-xl transition-all text-slate-300 hover:text-white hover:bg-slate-800/80"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Appointments</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- SECTION: HOSPITAL CRUD MANAGEMENT -->
        <div>
            <span class="px-3 text-[10px] font-extrabold uppercase tracking-widest text-teal-300/90 block mb-2 flex items-center justify-between">
                <span>Hospital Management</span>
                <span class="px-1.5 py-0.2 rounded text-[8px] bg-teal-500/20 text-teal-300 font-mono">CRUD</span>
            </span>
            <div class="space-y-1">
                <!-- Doctors & OPD -->
                <a 
                    href="{{ route('partner.doctor.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl transition-all {{ request()->routeIs('partner.doctor*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">👨‍⚕️</span>
                        <span>Doctors & OPD</span>
                    </div>
                    <span class="px-1.5 py-0.5 rounded text-[9px] font-extrabold {{ request()->routeIs('partner.doctor*') ? 'bg-white/20 text-white' : 'bg-teal-500/20 text-teal-300' }}">Slots</span>
                </a>

                <!-- Facilities -->
                <a 
                    href="{{ route('partner.facility.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl transition-all {{ request()->routeIs('partner.facility*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">🏥</span>
                        <span>Hospital Facilities</span>
                    </div>
                </a>

                <!-- Images / Gallery -->
                <a 
                    href="{{ route('partner.image.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl transition-all {{ request()->routeIs('partner.image*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">📸</span>
                        <span>Photo Gallery</span>
                    </div>
                </a>

                <!-- Infrastructure -->
                <a 
                    href="{{ route('partner.infrustructure.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl transition-all {{ request()->routeIs('partner.infrustructure*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">🏗️</span>
                        <span>Infrastructure</span>
                    </div>
                    <span class="px-1.5 py-0.5 rounded text-[9px] font-extrabold bg-[#EF7415] text-white">Quill</span>
                </a>

                <!-- Services -->
                <a 
                    href="{{ route('partner.service.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl transition-all {{ request()->routeIs('partner.service*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">🛎️</span>
                        <span>Hospital Services</span>
                    </div>
                    <span class="px-1.5 py-0.5 rounded text-[9px] font-extrabold bg-teal-500/20 text-teal-300">7 Cats</span>
                </a>

                <!-- Location Guide -->
                <a 
                    href="{{ route('partner.locationguide.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl transition-all {{ request()->routeIs('partner.locationguide*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">🗺️</span>
                        <span>Location Guide</span>
                    </div>
                </a>

                <!-- Reviews -->
                <a 
                    href="{{ route('partner.review.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl transition-all {{ request()->routeIs('partner.review*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">⭐</span>
                        <span>Patient Reviews</span>
                    </div>
                </a>
            </div>
        </div>

    </nav>

    <!-- Sidebar Bottom: Partner Profile Card & Logout -->
    @auth('partner')
    <div class="p-3.5 border-t border-slate-800/80 bg-[#0d1b36] shrink-0">
        <div class="flex items-center justify-between gap-2">
            <div class="flex items-center gap-2.5 truncate">
                <div class="w-8 h-8 rounded-xl bg-[#EF7415] text-white flex items-center justify-center font-bold text-xs uppercase shrink-0">
                    {{ strtoupper(substr(auth('partner')->user()->name, 0, 1)) }}
                </div>
                <div class="truncate leading-tight">
                    <span class="block text-xs font-bold text-white truncate">
                        {{ auth('partner')->user()->name }}
                    </span>
                    <span class="block text-[10px] text-slate-400 truncate">
                        {{ auth('partner')->user()->company_name }}
                    </span>
                </div>
            </div>

            <form action="{{ route('partner.logout') }}" method="POST">
                @csrf
                <button 
                    type="submit" 
                    class="p-1.5 rounded-lg text-slate-400 hover:text-rose-400 hover:bg-slate-800 transition-colors"
                    title="Sign Out"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
    @endauth

</aside>
