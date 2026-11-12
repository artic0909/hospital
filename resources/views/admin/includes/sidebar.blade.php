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

    <!-- Scrollable Navigation Menu -->
    <nav class="flex-1 overflow-y-auto px-3.5 py-4 space-y-4 text-xs font-semibold">
        
        <!-- ==================== SECTION 1: MAIN OVERVIEW (NOT COLLAPSIBLE) ==================== -->
        <div>
            <span class="px-3 text-[10px] font-extrabold uppercase tracking-widest text-slate-400 block mb-2">
                Main Overview
            </span>
            <div class="space-y-1">
                @php
                    $isDashboardActive = request()->routeIs('admin.dashboard');
                @endphp
                <!-- Dashboard (Active ONLY when current route is admin.dashboard) -->
                <a 
                    href="{{ route('admin.dashboard') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isDashboardActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isDashboardActive ? 'text-teal-100' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                    @if($isDashboardActive)
                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                    @endif
                </a>
            </div>
        </div>

        <!-- ==================== SECTION 2: PATIENT CARE & NETWORK (COLLAPSIBLE) ==================== -->
        @php
            $isPatientGroupActive = request()->routeIs('admin.patient.*', 'admin.agent*', 'admin.appointment*', 'admin.enquiries*');
            $sidebarPatientCount  = \App\Models\Patient::count();
            $sidebarAgentCount    = \App\Models\Agent::count();
            $pendingEnquiryCount  = \App\Models\PatientEnquiry::where('status', 'pending')->count();
        @endphp
        <details class="group/nav" {{ $isPatientGroupActive ? 'open' : '' }}>
            <summary class="flex items-center justify-between px-3 py-1.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/60 transition-all cursor-pointer select-none list-none [&::-webkit-details-marker]:hidden">
                <span class="text-[10px] font-extrabold uppercase tracking-widest text-teal-300/90 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>Patient Care & Network</span>
                </span>
                <svg class="w-3.5 h-3.5 text-slate-400 group-open/nav:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </summary>
            
            <div class="mt-1 pl-2 space-y-1 border-l border-slate-800 ml-3.5">
                <!-- Patients Management -->
                @php $isPatActive = request()->routeIs('admin.patient.*'); @endphp
                <a 
                    href="{{ route('admin.patient.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isPatActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isPatActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>Patients Directory</span>
                    </div>
                    @if($sidebarPatientCount > 0)
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-black {{ $isPatActive ? 'bg-white text-[#27797D]' : 'bg-slate-800 text-teal-300 border border-teal-500/40' }}">
                            {{ $sidebarPatientCount }}
                        </span>
                    @endif
                </a>

                <!-- Referral Partners / Business Heads -->
                @php $isAgtActive = request()->routeIs('admin.agent*'); @endphp
                <a 
                    href="{{ route('admin.agent.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isAgtActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isAgtActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>Referral Partners / Business Heads</span>
                    </div>
                    @if($sidebarAgentCount > 0)
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-black {{ $isAgtActive ? 'bg-white text-[#27797D]' : 'bg-slate-800 text-teal-300 border border-teal-500/40' }}">
                            {{ $sidebarAgentCount }}
                        </span>
                    @endif
                </a>

                <!-- Appointments -->
                @php $isApptActive = request()->routeIs('admin.appointment*'); @endphp
                <a 
                    href="{{ route('admin.appointment.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isApptActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isApptActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Appointments</span>
                    </div>
                </a>

                <!-- Patient Enquiries -->
                @php $isEnqActive = request()->routeIs('admin.enquiries*'); @endphp
                <a 
                    href="{{ route('admin.enquiries.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isEnqActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isEnqActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                        <span>Patient Enquiries</span>
                    </div>
                    @if($pendingEnquiryCount > 0)
                        <span class="px-1.5 py-0.5 rounded-full text-[10px] font-black bg-[#EF7415] text-white">
                            {{ $pendingEnquiryCount }}
                        </span>
                    @endif
                </a>
            </div>
        </details>

        <!-- ==================== SECTION 3: HOSPITALS & DOCTORS (COLLAPSIBLE) ==================== -->
        @php
            $isHospitalGroupActive = request()->routeIs('admin.hospital*', 'admin.doctor*', 'admin.utilities.doctor-spaciality*', 'admin.utilities.hospital-category*');
        @endphp
        <details class="group/nav" {{ $isHospitalGroupActive ? 'open' : '' }}>
            <summary class="flex items-center justify-between px-3 py-1.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/60 transition-all cursor-pointer select-none list-none [&::-webkit-details-marker]:hidden">
                <span class="text-[10px] font-extrabold uppercase tracking-widest text-teal-300/90 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span>Hospitals & Doctors</span>
                </span>
                <svg class="w-3.5 h-3.5 text-slate-400 group-open/nav:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </summary>

            <div class="mt-1 pl-2 space-y-1 border-l border-slate-800 ml-3.5">
                <!-- Hospitals Management -->
                @php $isHospActive = request()->routeIs('admin.hospital*'); @endphp
                <a 
                    href="{{ route('admin.hospital.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isHospActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isHospActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <span>Hospitals Directory</span>
                    </div>
                </a>

                <!-- Doctor Specialities (with SVG icon instead of emoji) -->
                @php $isSpecActive = request()->routeIs('admin.utilities.doctor-spaciality*'); @endphp
                <a 
                    href="{{ route('admin.utilities.doctor-spaciality') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isSpecActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isSpecActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <span>Doctor Specialities</span>
                    </div>
                </a>

                <!-- Hospital Categories (with SVG icon instead of emoji) -->
                @php $isCatActive = request()->routeIs('admin.utilities.hospital-category*'); @endphp
                <a 
                    href="{{ route('admin.utilities.hospital-category') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isCatActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isCatActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        <span>Hospital Categories</span>
                    </div>
                </a>
            </div>
        </details>

        <!-- ==================== SECTION 4: TREATMENTS & DEPARTMENTS (COLLAPSIBLE) ==================== -->
        @php
            $isTreatmentGroupActive = request()->routeIs('admin.utilities.department*', 'admin.utilities.treatment*');
        @endphp
        <details class="group/nav" {{ $isTreatmentGroupActive ? 'open' : '' }}>
            <summary class="flex items-center justify-between px-3 py-1.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/60 transition-all cursor-pointer select-none list-none [&::-webkit-details-marker]:hidden">
                <span class="text-[10px] font-extrabold uppercase tracking-widest text-teal-300/90 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                    </svg>
                    <span>Treatments & Medical</span>
                </span>
                <svg class="w-3.5 h-3.5 text-slate-400 group-open/nav:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </summary>

            <div class="mt-1 pl-2 space-y-1 border-l border-slate-800 ml-3.5">
                <!-- Departments (with SVG icon instead of emoji) -->
                @php $isDeptActive = request()->routeIs('admin.utilities.department*'); @endphp
                <a 
                    href="{{ route('admin.utilities.department') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isDeptActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isDeptActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        <span>Departments</span>
                    </div>
                </a>

                <!-- Treatments (with SVG icon instead of emoji) -->
                @php $isTreatActive = request()->routeIs('admin.utilities.treatment*'); @endphp
                <a 
                    href="{{ route('admin.utilities.treatment') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isTreatActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isTreatActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>Treatments & Pricing</span>
                    </div>
                </a>
            </div>
        </details>

        <!-- ==================== SECTION 5: MANAGE UTILITIES / GEOGRAPHY (COLLAPSIBLE) ==================== -->
        @php
            $isGeographyGroupActive = request()->routeIs('admin.utilities.country*', 'admin.utilities.state*', 'admin.utilities.city*');
        @endphp
        <details class="group/nav" {{ $isGeographyGroupActive ? 'open' : '' }}>
            <summary class="flex items-center justify-between px-3 py-1.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/60 transition-all cursor-pointer select-none list-none [&::-webkit-details-marker]:hidden">
                <span class="text-[10px] font-extrabold uppercase tracking-widest text-teal-300/90 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Locations & Geography</span>
                </span>
                <svg class="w-3.5 h-3.5 text-slate-400 group-open/nav:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </summary>

            <div class="mt-1 pl-2 space-y-1 border-l border-slate-800 ml-3.5">
                <!-- Countries (with SVG icon instead of emoji) -->
                @php $isCountryActive = request()->routeIs('admin.utilities.country*'); @endphp
                <a 
                    href="{{ route('admin.utilities.country') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isCountryActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isCountryActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Countries</span>
                    </div>
                </a>

                <!-- States (with SVG icon instead of emoji) -->
                @php $isStateActive = request()->routeIs('admin.utilities.state*'); @endphp
                <a 
                    href="{{ route('admin.utilities.state') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isStateActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isStateActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                        <span>States / Provinces</span>
                    </div>
                </a>

                <!-- Cities (with SVG icon instead of emoji) -->
                @php $isCityActive = request()->routeIs('admin.utilities.city*'); @endphp
                <a 
                    href="{{ route('admin.utilities.city') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isCityActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isCityActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <span>Cities</span>
                    </div>
                </a>
            </div>
        </details>

        <!-- ==================== SECTION 6: WEBSITE CMS & PAGE SETUP (COLLAPSIBLE) ==================== -->
        @php
            $isCmsGroupActive = request()->routeIs('admin.hero-section*', 'admin.how-it-works*', 'admin.blogs*', 'admin.patient-stories*', 'admin.settings*');
        @endphp
        <details class="group/nav" {{ $isCmsGroupActive ? 'open' : '' }}>
            <summary class="flex items-center justify-between px-3 py-1.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/60 transition-all cursor-pointer select-none list-none [&::-webkit-details-marker]:hidden">
                <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Website CMS & Setup</span>
                </span>
                <svg class="w-3.5 h-3.5 text-slate-400 group-open/nav:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </summary>

            <div class="mt-1 pl-2 space-y-1 border-l border-slate-800 ml-3.5">
                <!-- Hero Section (with SVG icon instead of emoji) -->
                @php $isHeroActive = request()->routeIs('admin.hero-section*'); @endphp
                <a 
                    href="{{ route('admin.hero-section.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isHeroActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isHeroActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Hero Banner</span>
                    </div>
                </a>

                <!-- How It Works (with SVG icon instead of emoji) -->
                @php $isHowActive = request()->routeIs('admin.how-it-works*'); @endphp
                <a 
                    href="{{ route('admin.how-it-works.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isHowActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isHowActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        <span>How It Works Steps</span>
                    </div>
                </a>

                <!-- Blogs & News (with SVG icon instead of emoji) -->
                @php $isBlogActive = request()->routeIs('admin.blogs*'); @endphp
                <a 
                    href="{{ route('admin.blogs.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isBlogActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isBlogActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                        <span>Blogs & News</span>
                    </div>
                </a>

                <!-- Patient Stories (with SVG icon instead of emoji) -->
                @php $isStoryActive = request()->routeIs('admin.patient-stories*'); @endphp
                <a 
                    href="{{ route('admin.patient-stories.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isStoryActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isStoryActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span>Patient Stories</span>
                    </div>
                </a>

                <!-- Contact & Social Details (with SVG icon instead of emoji) -->
                @php $isContactActive = request()->routeIs('admin.settings.contact*'); @endphp
                <a 
                    href="{{ route('admin.settings.contact') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isContactActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ $isContactActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>Website & Contact</span>
                    </div>
                </a>
            </div>
        </details>

        <!-- ==================== SECTION 7: ADMIN SETTINGS & PROFILE ==================== -->
        <div>
            @php $isProfileActive = request()->routeIs('admin.profile*'); @endphp
            <a 
                href="{{ route('admin.profile.edit') }}" 
                class="flex items-center justify-between px-3 py-2 rounded-xl {{ $isProfileActive ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
            >
                <div class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 {{ $isProfileActive ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Admin Profile & Settings</span>
                </div>
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
            <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-2.5 truncate hover:opacity-85 transition-opacity" title="Manage Profile Settings">
                <div class="w-8 h-8 rounded-xl bg-[#EF7415] text-white flex items-center justify-center font-bold text-xs uppercase shrink-0 overflow-hidden">
                    @if (!empty($sidebarAdmin->avatar))
                        <img src="{{ asset($sidebarAdmin->avatar) }}" alt="{{ $adminDisplayName }}" class="w-full h-full object-cover">
                    @else
                        {{ strtoupper(substr($adminDisplayName, 0, 1)) }}
                    @endif
                </div>
                <div class="truncate leading-tight">
                    <span class="block text-xs font-bold text-white truncate">
                        {{ $adminDisplayName }}
                    </span>
                    <span class="block text-[10px] text-slate-400 truncate">
                        Central Command &bull; Edit
                    </span>
                </div>
            </a>

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
