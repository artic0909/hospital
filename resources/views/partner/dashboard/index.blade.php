@extends('partner.layouts.app')

@section('title', 'Partner Dashboard - Heal Go Fly Management Portal')

@section('content')
<div class="space-y-6 sm:space-y-8">
    
    <!-- ==================== 1. WELCOME HERO BANNER ==================== -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#112347] via-[#1D4B6C] to-[#27797D] p-6 sm:p-8 text-white shadow-xl shadow-[#112347]/10 border border-slate-700/50">
        <!-- Background Lighting Glows -->
        <div class="absolute -right-12 -bottom-12 w-72 h-72 bg-[#27797D]/30 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute right-1/3 -top-16 w-56 h-56 bg-[#EF7415]/20 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            
            <!-- Left: Avatar + Title & Meta -->
            <div class="flex items-start sm:items-center gap-4 sm:gap-5">
                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-2xl sm:text-3xl font-extrabold text-[#EF7415] shadow-inner shrink-0">
                    {{ strtoupper(substr($partner->name ?? 'P', 0, 1)) }}
                </div>
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-1.5">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            {{ ucfirst($partner->status ?? 'Active') }} Partner
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white/15 text-white border border-white/20">
                            ID: #HGF-{{ str_pad($partner->id ?? 1, 5, '0', STR_PAD_LEFT) }}
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#EF7415] text-white">
                            {{ $partner->partner_type ?? 'Healthcare Facilitator' }}
                        </span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-black tracking-tight text-white">
                        Welcome, {{ $partner->name ?? 'Partner' }}
                    </h1>
                    <p class="text-teal-100 text-xs sm:text-sm mt-0.5 font-medium flex items-center gap-2 flex-wrap">
                        <span class="font-bold text-white">{{ $partner->company_name ?? 'Heal Go Fly Facilitator' }}</span>
                        @if($partner->country)
                            <span>&bull;</span>
                            <span>{{ $partner->country }}</span>
                        @endif
                        <span>&bull;</span>
                        <span class="italic text-orange-200 font-semibold">"Healgofly hi rahega"</span>
                    </p>
                </div>
            </div>

            <!-- Right: Quick CTA Buttons -->
            <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                <button 
                    type="button"
                    onclick="openReferralModal()"
                    class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white px-5 py-3 rounded-xl font-bold text-sm shadow-lg shadow-[#EF7415]/30 transition-all hover:-translate-y-0.5 cursor-pointer"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Patient Case</span>
                </button>

                <a 
                    href="https://wa.me/919129846542?text=Hello%20Heal%20Go%20Fly%20Partner%20Desk,%20I%20am%20Partner%20{{ urlencode($partner->company_name ?? 'Partner') }}%20(ID:%20HGF-{{ str_pad($partner->id ?? 1, 5, '0', STR_PAD_LEFT) }}).%20I%20have%20an%20urgent%20case%20inquiry." 
                    target="_blank"
                    class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 bg-[#25D366] hover:bg-[#20b858] text-white px-5 py-3 rounded-xl font-bold text-sm shadow-md transition-all hover:-translate-y-0.5"
                >
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span>WhatsApp</span>
                </a>
            </div>

        </div>
    </div>

    <!-- ==================== 2. STATIC KPI COUNTING BOXES (6 CARDS) ==================== -->
    <div id="kpi-section" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 sm:gap-5">
        
        <!-- KPI 1: Total Referrals -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Total Referrals</span>
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1D4B6C] flex items-center justify-center group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-2.5">
                <h3 class="text-2xl sm:text-3xl font-black text-[#112347] tracking-tight">148</h3>
                <div class="mt-2 flex items-center gap-1.5 text-[11px] font-semibold text-emerald-600">
                    <span>&uarr; 18.4%</span>
                    <span class="text-slate-400 font-normal">vs last month</span>
                </div>
            </div>
        </div>

        <!-- KPI 2: Hospital Admissions -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Admissions</span>
                <div class="w-10 h-10 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
            </div>
            <div class="mt-2.5">
                <h3 class="text-2xl sm:text-3xl font-black text-[#27797D] tracking-tight">68</h3>
                <div class="mt-2 flex items-center gap-1.5 text-[11px] font-semibold text-teal-600">
                    <span class="w-1.5 h-1.5 rounded-full bg-teal-500 animate-pulse"></span>
                    <span>32 Admitted Now</span>
                </div>
            </div>
        </div>

        <!-- KPI 3: Medical Visas Issued -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Visas Issued</span>
                <div class="w-10 h-10 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h4m-5 5h10a2 2 0 002-2V5a2 2 0 00-2-2H6a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-2.5">
                <h3 class="text-2xl sm:text-3xl font-black text-[#112347] tracking-tight">89</h3>
                <div class="mt-2 flex items-center gap-1.5 text-[11px] font-semibold text-emerald-600">
                    <span>✓ 98.2%</span>
                    <span class="text-slate-400 font-normal">Approved</span>
                </div>
            </div>
        </div>

        <!-- KPI 4: Doctor Opinions Given -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Doctor Opinions</span>
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-2.5">
                <h3 class="text-2xl sm:text-3xl font-black text-purple-700 tracking-tight">112</h3>
                <div class="mt-2 flex items-center gap-1.5 text-[11px] font-semibold text-purple-600">
                    <span>SLA: &lt; 24h</span>
                    <span class="text-slate-400 font-normal">Turnaround</span>
                </div>
            </div>
        </div>

        <!-- KPI 5: Accrued Commission / Payouts -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Total Earnings</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-2.5">
                <h3 class="text-2xl sm:text-3xl font-black text-emerald-600 tracking-tight">₹4.82L</h3>
                <div class="mt-2 flex items-center gap-1.5 text-[11px] font-semibold text-emerald-600">
                    <span>&uarr; 24.5%</span>
                    <span class="text-slate-400 font-normal">this quarter</span>
                </div>
            </div>
        </div>

        <!-- KPI 6: Patient Satisfaction Rate -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Patient Rating</span>
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-2.5">
                <h3 class="text-2xl sm:text-3xl font-black text-[#EF7415] tracking-tight">4.9<span class="text-xs text-slate-400 font-bold">/5.0</span></h3>
                <div class="mt-2 flex items-center gap-1.5 text-[11px] font-semibold text-amber-600">
                    <span>★★★★★</span>
                    <span class="text-slate-400 font-normal">130+ cases</span>
                </div>
            </div>
        </div>

    </div>

    <!-- ==================== 3. CHARTS ROW 1: BAR CHART & PIE / DONUT CHART ==================== -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Left 7 Cols: Bar Chart (Monthly Referrals vs Admissions) -->
        <div class="lg:col-span-7 bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-xs flex flex-col justify-between">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
                <div>
                    <h3 class="text-base font-bold text-[#112347]">
                        Monthly Patient Referrals & Admissions
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Performance comparison across the last 10 months (Jan - Oct)
                    </p>
                </div>
                <!-- Mini Metric Badge -->
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold bg-teal-50 text-[#27797D] border border-teal-200/60">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#27797D]"></span>
                        45.9% Conversion
                    </span>
                </div>
            </div>

            <!-- ApexChart Container -->
            <div id="chart-referrals-bar" class="w-full"></div>
        </div>

        <!-- Right 5 Cols: Donut / Pie Chart (Specialty Distribution) -->
        <div class="lg:col-span-5 bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-xs flex flex-col justify-between">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-base font-bold text-[#112347]">
                        Cases by Medical Specialty
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Breakdown of patient queries by clinical department
                    </p>
                </div>
                <span class="text-xs font-semibold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-lg">
                    148 Cases
                </span>
            </div>

            <!-- ApexChart Container -->
            <div id="chart-specialty-donut" class="w-full"></div>
        </div>

    </div>

    <!-- ==================== 4. CHARTS ROW 2: PYRAMID / FUNNEL & DESTINATIONS GAUGE ==================== -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Left 7 Cols: Patient Referral Pipeline Funnel (Pyramid / Funnel Chart) -->
        <div class="lg:col-span-7 bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-xs flex flex-col justify-between">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
                <div>
                    <h3 class="text-base font-bold text-[#112347]">
                        Patient Pipeline Conversion Pyramid
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Step-by-step patient journey from initial inquiry to hospital discharge
                    </p>
                </div>
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    High Retention
                </span>
            </div>

            <!-- ApexChart Container -->
            <div id="chart-pipeline-pyramid" class="w-full"></div>
        </div>

        <!-- Right 5 Cols: Destination Breakdown & Target Radial Gauge -->
        <div class="lg:col-span-5 bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-xs flex flex-col justify-between">
            <div class="flex items-center justify-between mb-2">
                <div>
                    <h3 class="text-base font-bold text-[#112347]">
                        Monthly Quota & Hub Distribution
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Quota completion & top destination hospitals
                    </p>
                </div>
                <span class="text-xs font-bold text-[#EF7415] bg-orange-50 px-2.5 py-1 rounded-lg">
                    October 2026
                </span>
            </div>

            <!-- Radial Gauge Chart -->
            <div id="chart-target-radial" class="w-full -mt-2 -mb-4"></div>

            <!-- Destination Progress Bars -->
            <div class="space-y-3 pt-3 border-t border-slate-100 text-xs">
                <div>
                    <div class="flex justify-between font-bold text-slate-700 mb-1">
                        <span>🇮🇳 India (Medanta, Apollo, Fortis)</span>
                        <span class="text-[#27797D]">58% (86 cases)</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
                        <div class="bg-[#27797D] h-2 rounded-full" style="width: 58%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between font-bold text-slate-700 mb-1">
                        <span>🇹🇷 Turkey (Medicana, Memorial, Acibadem)</span>
                        <span class="text-[#EF7415]">24% (36 cases)</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
                        <div class="bg-[#EF7415] h-2 rounded-full" style="width: 24%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between font-bold text-slate-700 mb-1">
                        <span>🇹🇭 Thailand & 🇦🇪 UAE</span>
                        <span class="text-slate-600">18% (26 cases)</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
                        <div class="bg-cyan-500 h-2 rounded-full" style="width: 18%"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- ==================== 5. RECENT REFERRALS DATA TABLE ==================== -->
    <div id="referrals-table" class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        
        <!-- Table Header & Controls -->
        <div class="p-5 sm:p-6 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <h3 class="text-lg font-bold text-[#112347]">
                        Recent Patient Referrals & Case Status
                    </h3>
                    <span class="bg-teal-50 text-[#27797D] font-bold text-xs px-2.5 py-0.5 rounded-full border border-teal-200">
                        Live Tracking
                    </span>
                </div>
                <p class="text-xs text-slate-400 mt-1">
                    Track case timelines, doctor second opinions, medical visas, and commission accruals
                </p>
            </div>

            <!-- Filters -->
            <div class="flex flex-wrap items-center gap-2.5">
                <!-- Search -->
                <div class="relative w-full sm:w-56">
                    <input 
                        type="text" 
                        id="table-filter-search" 
                        placeholder="Filter by name, ID, hospital..." 
                        class="w-full bg-slate-50 text-xs px-3 py-2 pl-8 border border-slate-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#27797D]"
                    >
                    <svg class="w-3.5 h-3.5 text-slate-400 absolute left-2.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <!-- Status Select -->
                <select 
                    id="table-status-filter" 
                    class="bg-slate-50 text-xs font-semibold text-slate-700 px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:border-[#27797D] cursor-pointer"
                >
                    <option value="all">All Statuses</option>
                    <option value="admitted">Admitted & In Treatment</option>
                    <option value="visa">Visa Issued</option>
                    <option value="opinion">Doctor Opinion Ready</option>
                    <option value="discharged">Completed & Discharged</option>
                </select>

                <button 
                    type="button" 
                    onclick="openReferralModal()"
                    class="bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold px-3.5 py-2 rounded-xl flex items-center gap-1.5 transition-colors cursor-pointer"
                >
                    <span>+ New Case</span>
                </button>
            </div>
        </div>

        <!-- Table View -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3.5 px-4 sm:px-6">Case ID & Patient</th>
                        <th class="py-3.5 px-4">Hospital & Destination</th>
                        <th class="py-3.5 px-4">Specialty & Procedure</th>
                        <th class="py-3.5 px-4">Current Stage</th>
                        <th class="py-3.5 px-4">Est. Treatment</th>
                        <th class="py-3.5 px-4">Facilitator Accrual</th>
                        <th class="py-3.5 px-4 sm:px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    
                    <!-- Row 1: Farhana Begum -->
                    <tr class="referral-table-row hover:bg-slate-50/70 transition-colors" data-status="admitted">
                        <td class="py-3.5 px-4 sm:px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-teal-50 text-[#27797D] flex items-center justify-center font-bold text-xs shrink-0">
                                    FB
                                </div>
                                <div>
                                    <span class="block font-bold text-slate-900">Farhana Begum</span>
                                    <span class="block text-[11px] text-slate-400">#HGF-P-1042 &bull; 🇧🇩 Bangladesh</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="font-bold text-slate-900 block">Medanta - The Medicity</span>
                            <span class="text-slate-400 text-[11px]">Gurgaon, India</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="block font-semibold text-slate-800">Cardiology</span>
                            <span class="text-slate-500 text-[11px]">CABG Bypass Surgery</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                Admitted (OT Today)
                            </span>
                        </td>
                        <td class="py-3.5 px-4 font-bold text-slate-900">
                            ₹4,80,000
                        </td>
                        <td class="py-3.5 px-4 font-bold text-emerald-600">
                            ₹48,000 <span class="text-[10px] text-slate-400 font-normal">(10%)</span>
                        </td>
                        <td class="py-3.5 px-4 sm:px-6 text-right">
                            <a href="https://wa.me/919129846542?text=Hello,%20Case%20HGF-P-1042%20status%20inquiry" target="_blank" class="text-[#27797D] hover:underline font-bold text-xs inline-flex items-center gap-1">
                                <span>Desk</span> &rarr;
                            </a>
                        </td>
                    </tr>

                    <!-- Row 2: Rustam Aliyev -->
                    <tr class="referral-table-row hover:bg-slate-50/70 transition-colors" data-status="visa">
                        <td class="py-3.5 px-4 sm:px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-xs shrink-0">
                                    RA
                                </div>
                                <div>
                                    <span class="block font-bold text-slate-900">Rustam Aliyev</span>
                                    <span class="block text-[11px] text-slate-400">#HGF-P-1039 &bull; 🇺🇿 Uzbekistan</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="font-bold text-slate-900 block">Medicana International</span>
                            <span class="text-slate-400 text-[11px]">Istanbul, Turkey</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="block font-semibold text-slate-800">Neurosurgery</span>
                            <span class="text-slate-500 text-[11px]">Deep Brain Stimulation (DBS)</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-blue-50 text-blue-700 border border-blue-200">
                                Visa Letter Issued
                            </span>
                        </td>
                        <td class="py-3.5 px-4 font-bold text-slate-900">
                            $18,500
                        </td>
                        <td class="py-3.5 px-4 font-bold text-emerald-600">
                            $1,850 <span class="text-[10px] text-slate-400 font-normal">(10%)</span>
                        </td>
                        <td class="py-3.5 px-4 sm:px-6 text-right">
                            <a href="https://wa.me/919129846542?text=Hello,%20Case%20HGF-P-1039%20visa%20check" target="_blank" class="text-[#27797D] hover:underline font-bold text-xs inline-flex items-center gap-1">
                                <span>Desk</span> &rarr;
                            </a>
                        </td>
                    </tr>

                    <!-- Row 3: Mohammed Al-Harbi -->
                    <tr class="referral-table-row hover:bg-slate-50/70 transition-colors" data-status="opinion">
                        <td class="py-3.5 px-4 sm:px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 text-[#EF7415] flex items-center justify-center font-bold text-xs shrink-0">
                                    MH
                                </div>
                                <div>
                                    <span class="block font-bold text-slate-900">Mohammed Al-Harbi</span>
                                    <span class="block text-[11px] text-slate-400">#HGF-P-1035 &bull; 🇸🇦 Saudi Arabia</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="font-bold text-slate-900 block">Indraprastha Apollo</span>
                            <span class="text-slate-400 text-[11px]">New Delhi, India</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="block font-semibold text-slate-800">Oncology</span>
                            <span class="text-slate-500 text-[11px]">Targeted Immunotherapy</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                3 Quotes Sent
                            </span>
                        </td>
                        <td class="py-3.5 px-4 font-bold text-slate-900">
                            ₹8,50,000
                        </td>
                        <td class="py-3.5 px-4 font-bold text-slate-500">
                            Pending Patient Choice
                        </td>
                        <td class="py-3.5 px-4 sm:px-6 text-right">
                            <a href="https://wa.me/919129846542?text=Hello,%20Case%20HGF-P-1035%20followup" target="_blank" class="text-[#27797D] hover:underline font-bold text-xs inline-flex items-center gap-1">
                                <span>Desk</span> &rarr;
                            </a>
                        </td>
                    </tr>

                    <!-- Row 4: Olumide Adeleke -->
                    <tr class="referral-table-row hover:bg-slate-50/70 transition-colors" data-status="discharged">
                        <td class="py-3.5 px-4 sm:px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0">
                                    OA
                                </div>
                                <div>
                                    <span class="block font-bold text-slate-900">Olumide Adeleke</span>
                                    <span class="block text-[11px] text-slate-400">#HGF-P-1028 &bull; 🇳🇬 Nigeria</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="font-bold text-slate-900 block">Fortis Memorial Research</span>
                            <span class="text-slate-400 text-[11px]">Gurgaon, India</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="block font-semibold text-slate-800">Orthopedics</span>
                            <span class="text-slate-500 text-[11px]">Bilateral Robotic Knee Repl.</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-purple-50 text-purple-700 border border-purple-200">
                                ✓ Discharged / Cleared
                            </span>
                        </td>
                        <td class="py-3.5 px-4 font-bold text-slate-900">
                            ₹6,20,000
                        </td>
                        <td class="py-3.5 px-4 font-bold text-emerald-600">
                            ₹62,000 <span class="text-[10px] text-emerald-700 font-bold">(Paid)</span>
                        </td>
                        <td class="py-3.5 px-4 sm:px-6 text-right">
                            <a href="https://wa.me/919129846542?text=Hello,%20Case%20HGF-P-1028%20invoice" target="_blank" class="text-emerald-700 hover:underline font-bold text-xs inline-flex items-center gap-1">
                                <span>Receipt</span> &rarr;
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Table Footer Pagination / Summary -->
        <div class="p-4 bg-slate-50/60 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-3">
            <span>Showing <strong class="text-slate-800">4</strong> of <strong class="text-slate-800">148</strong> total patient records</span>
            <div class="flex items-center gap-1.5">
                <button class="px-2.5 py-1 rounded border border-slate-200 bg-white hover:bg-slate-50 disabled:opacity-50 font-medium">Prev</button>
                <button class="px-2.5 py-1 rounded bg-[#27797D] text-white font-bold">1</button>
                <button class="px-2.5 py-1 rounded border border-slate-200 bg-white hover:bg-slate-50 font-medium">2</button>
                <button class="px-2.5 py-1 rounded border border-slate-200 bg-white hover:bg-slate-50 font-medium">3</button>
                <button class="px-2.5 py-1 rounded border border-slate-200 bg-white hover:bg-slate-50 font-medium">Next</button>
            </div>
        </div>

    </div>

</div>

<!-- ==================== 6. MODAL: REFER NEW PATIENT ==================== -->
<div 
    id="partner-referral-modal" 
    class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs overflow-y-auto"
>
    <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-slate-200 overflow-hidden my-8">
        
        <!-- Modal Top Bar -->
        <div class="bg-gradient-to-r from-[#112347] to-[#27797D] text-white p-5 flex items-center justify-between">
            <div>
                <h3 class="text-base font-bold">Submit New Patient Case</h3>
                <p class="text-xs text-teal-100 mt-0.5">Assigned to Partner Desk &bull; 24-48h Quote SLA</p>
            </div>
            <button 
                type="button" 
                onclick="closeReferralModal()"
                class="w-7 h-7 rounded-full bg-white/20 hover:bg-white/30 text-white flex items-center justify-center text-xs font-bold transition-colors cursor-pointer"
            >
                ✕
            </button>
        </div>

        <!-- Modal Form -->
        <form 
            action="#" 
            method="POST" 
            class="p-5 sm:p-6 space-y-4 text-xs" 
            onsubmit="event.preventDefault(); alert('Success! Patient referral has been submitted. Our Medical Board is preparing the treatment quotes.'); closeReferralModal();"
        >
            @csrf

            <!-- Patient Name -->
            <div>
                <label class="block font-bold text-slate-700 mb-1">Patient Full Name <span class="text-rose-500">*</span></label>
                <input type="text" required placeholder="e.g. John Doe" class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:border-[#27797D]">
            </div>

            <!-- Country & City -->
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Patient Country <span class="text-rose-500">*</span></label>
                    <input type="text" required placeholder="e.g. Bangladesh, Nigeria..." class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:border-[#27797D]">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Age / Gender <span class="text-rose-500">*</span></label>
                    <input type="text" required placeholder="e.g. 45 M" class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:border-[#27797D]">
                </div>
            </div>

            <!-- Medical Problem / Diagnosis -->
            <div>
                <label class="block font-bold text-slate-700 mb-1">Current Diagnosis / Chief Complaint <span class="text-rose-500">*</span></label>
                <textarea rows="3" required placeholder="Describe clinical symptoms, past treatments, diagnosis..." class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:border-[#27797D]"></textarea>
            </div>

            <!-- Destination Preference -->
            <div>
                <label class="block font-bold text-slate-700 mb-1">Preferred Destination Hub</label>
                <select class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:border-[#27797D] cursor-pointer font-medium">
                    <option value="India" selected>India (Top Choice - NABH/JCI)</option>
                    <option value="Turkey">Turkey (Istanbul/Ankara)</option>
                    <option value="Thailand">Thailand (Bangkok)</option>
                    <option value="UAE">United Arab Emirates (Dubai)</option>
                    <option value="Best Price">Best Quote Globally</option>
                </select>
            </div>

            <!-- File Upload Simulation -->
            <div>
                <label class="block font-bold text-slate-700 mb-1">Attach Medical Reports / MRI / Scans</label>
                <input type="file" multiple class="w-full text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer">
                <span class="text-[10px] text-slate-400 mt-1 block">PDF, JPG, PNG, DICOM up to 25MB (or send directly to WhatsApp)</span>
            </div>

            <!-- Actions -->
            <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2.5">
                <button 
                    type="button" 
                    onclick="closeReferralModal()"
                    class="px-4 py-2 rounded-xl text-slate-600 hover:bg-slate-100 font-semibold transition-colors cursor-pointer"
                >
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="px-5 py-2 rounded-xl bg-[#EF7415] hover:bg-[#d9640d] text-white font-bold shadow-sm transition-all cursor-pointer"
                >
                    Submit Referral Case &rarr;
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
