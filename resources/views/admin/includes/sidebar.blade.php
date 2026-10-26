<!-- Mobile Backdrop Overlay -->
<div 
    id="admin-sidebar-backdrop" 
    class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs z-40 lg:hidden transition-opacity duration-300 opacity-0 pointer-events-none"
></div>

<!-- Left Admin Sidebar -->
<aside 
    id="admin-sidebar" 
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
                    Heal Go Fly
                </span>
                <span class="text-[9px] uppercase font-bold text-[#EF7415] tracking-wider mt-0.5">
                    Admin Panel
                </span>
            </div>
        </a>

        <!-- Mobile Close Button -->
        <button 
            id="admin-sidebar-close-btn" 
            type="button" 
            class="lg:hidden p-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800 transition-colors"
            aria-label="Close Sidebar"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Admin Status Ribbon -->
    <div class="px-5 py-2.5 bg-gradient-to-r from-[#1D4B6C] to-[#27797D] text-white flex items-center justify-between text-[11px] font-semibold shrink-0">
        <div class="flex items-center gap-1.5 truncate">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span class="truncate">#HGF-ADMIN-01</span>
        </div>
        <span class="bg-black/20 px-2 py-0.5 rounded text-[10px] uppercase font-bold tracking-wider text-teal-200">
            Super Admin
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
                <!-- Dashboard (Active) -->
                <a 
                    href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : (Route::has('admin') ? route('admin') : url('/admin/dashboard')) }}" 
                    class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20 transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-teal-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                    <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                </a>

                <!-- Patient Referrals -->
                <a 
                    href="#referrals-table" 
                    class="flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span>Patient Referrals</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#EF7415] text-white">
                        148
                    </span>
                </a>

                <!-- Doctor Opinions & Quotes -->
                <a 
                    href="#referrals-table" 
                    class="flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>Doctor Opinions</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-teal-500/20 text-teal-300 border border-teal-500/30">
                        12 New
                    </span>
                </a>

                <!-- Medical Visa Letters -->
                <a 
                    href="#referrals-table" 
                    class="flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        <span>Medical Visa Letters</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/20 text-emerald-300">
                        89
                    </span>
                </a>

                <!-- Tele-Consultations -->
                <a 
                    href="https://wa.me/919129846542?text=Hello%20Heal%20Go%20Fly,%20I%20want%20to%20schedule%20a%20doctor%20video%20consultation." 
                    target="_blank"
                    class="flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <span>Tele-Consults</span>
                    </div>
                    <span class="px-1.5 py-0.5 rounded text-[9px] font-extrabold uppercase bg-emerald-500 text-white">
                        Live
                    </span>
                </a>
            </div>
        </div>

        <!-- SECTION 2: HOSPITAL & DOCTOR NETWORK -->
        <div>
            <span class="px-3 text-[10px] font-extrabold uppercase tracking-widest text-slate-400 block mb-2">
                Network & Directory
            </span>
            <div class="space-y-1">
                <a 
                    href="{{ route('hospitals') }}" 
                    target="_blank"
                    class="flex items-center justify-between px-3 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <span>Partner Hospitals</span>
                    </div>
                    <span class="text-slate-500 text-[10px]">&nearr;</span>
                </a>

                <a 
                    href="{{ route('doctors') }}" 
                    target="_blank"
                    class="flex items-center justify-between px-3 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>Doctor Specialists</span>
                    </div>
                    <span class="text-slate-500 text-[10px]">&nearr;</span>
                </a>
            </div>
        </div>

        <!-- SECTION 3: FINANCIALS -->
        <div>
            <span class="px-3 text-[10px] font-extrabold uppercase tracking-widest text-slate-400 block mb-2">
                Earnings & Payouts
            </span>
            <div class="space-y-1">
                <a 
                    href="#kpi-section" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Commission Ledger</span>
                    </div>
                    <span class="font-bold text-emerald-400 text-[11px]">₹4.82L</span>
                </a>
            </div>
        </div>

        <!-- SECTION 4: ADMIN HELPLINE & OPS DESK -->
        <div class="p-3 bg-gradient-to-br from-[#1D4B6C]/80 to-[#27797D]/60 rounded-2xl border border-teal-500/20 text-white">
            <span class="text-[9px] font-black uppercase tracking-wider text-teal-200 block mb-1">
                24/7 Priority Operations Desk
            </span>
            <p class="text-[11px] text-slate-200 font-medium leading-snug mb-2.5">
                Direct WhatsApp liaison for urgent patient & hospital cases.
            </p>
            <a 
                href="https://wa.me/919129846542?text=Hello%20Heal%20Go%20Fly%20Admin%20Desk,%20I%20need%20assistance%20with%20an%20urgent%20case." 
                target="_blank"
                class="w-full bg-[#25D366] hover:bg-[#20b858] text-white font-bold py-1.5 px-3 rounded-lg text-center flex items-center justify-center gap-1.5 text-xs transition-colors shadow-xs"
            >
                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                <span>WhatsApp Desk</span>
            </a>
        </div>

    </nav>

    <!-- Sidebar Bottom: Admin Profile Card & Logout -->
    @php
        $sidebarAdmin = auth('admin')->user() ?? auth()->user();
        $adminDisplayName = $sidebarAdmin->name ?? 'Super Administrator';
        $logoutRoute = Route::has('admin.logout') ? route('admin.logout') : (Route::has('logout') ? route('logout') : url('/logout'));
    @endphp
    <div class="p-3.5 border-t border-slate-800/80 bg-[#0d1b36] shrink-0">
        <div class="flex items-center justify-between gap-2">
            <div class="flex items-center gap-2.5 truncate">
                <div class="w-8 h-8 rounded-xl bg-[#EF7415] text-white flex items-center justify-center font-bold text-xs uppercase shrink-0">
                    {{ strtoupper(substr($adminDisplayName, 0, 1)) }}
                </div>
                <div class="truncate leading-tight">
                    <span class="block text-xs font-bold text-white truncate">
                        {{ $adminDisplayName }}
                    </span>
                    <span class="block text-[10px] text-slate-400 truncate">
                        Central Command
                    </span>
                </div>
            </div>

            <form action="{{ $logoutRoute }}" method="POST">
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

</aside>
