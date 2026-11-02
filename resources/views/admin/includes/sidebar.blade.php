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

                 <a 
                    href="{{ route('admin.hospital.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.hospital*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.hospital*') ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <span>Hospitals Management</span>
                    </div>
                </a>

                <!-- Patients Management -->
                <a 
                    href="{{ route('admin.patient.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.patient*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.patient*') ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span>Patients Management</span>
                    </div>
                </a>

                <!-- Appointments Management -->
                <a 
                    href="{{ route('admin.appointment.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.appointment*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.appointment*') ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Appointments</span>
                    </div>
                </a>

                <!-- Patient Enquiries -->
                @php
                    $pendingEnquiryCount = \App\Models\PatientEnquiry::where('status', 'pending')->count();
                @endphp
                <a 
                    href="{{ route('admin.enquiries.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.enquiries*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.enquiries*') ? 'text-teal-200' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        </div>

        <!-- SECTION: MANAGE UTILITIES -->
        <div>
            <span class="px-3 text-[10px] font-extrabold uppercase tracking-widest text-teal-300/80 block mb-2 flex items-center justify-between">
                <span>Manage Utilities</span>
            </span>
            <div class="space-y-1">
                <!-- Countries -->
                <a 
                    href="{{ route('admin.utilities.country') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.utilities.country*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">🌐</span>
                        <span>Countries</span>
                    </div>
                </a>

                <!-- States -->
                <a 
                    href="{{ route('admin.utilities.state') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.utilities.state*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">🗺️</span>
                        <span>States</span>
                    </div>
                </a>

                <!-- Cities -->
                <a 
                    href="{{ route('admin.utilities.city') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.utilities.city*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">🏙️</span>
                        <span>Cities</span>
                    </div>
                </a>

                <!-- Departments -->
                <a 
                    href="{{ route('admin.utilities.department') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.utilities.department*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">🏥</span>
                        <span>Departments</span>
                    </div>
                </a>

                <!-- Doctor Specialities -->
                <a 
                    href="{{ route('admin.utilities.doctor-spaciality') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.utilities.doctor-spaciality*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">🩺</span>
                        <span>Doctor Specialities</span>
                    </div>
                </a>

                <!-- Hospital Categories -->
                <a 
                    href="{{ route('admin.utilities.hospital-category') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.utilities.hospital-category*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">🏷️</span>
                        <span>Hospital Categories</span>
                    </div>
                </a>

                <!-- Treatments -->
                <a 
                    href="{{ route('admin.utilities.treatment') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.utilities.treatment*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">💊</span>
                        <span>Treatments & Pricing</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Frontend Dynamic -->
        <div>
            <span class="px-3 text-[10px] font-extrabold uppercase tracking-widest text-slate-400 block mb-2">
                Page Setup & Dynamic
            </span>
            <div class="space-y-1">
                <!-- Hero Section -->
                <a 
                    href="{{ route('admin.hero-section.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.hero-section*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">🖼️</span>
                        <span>Hero Section</span>
                    </div>
                </a>

                <!-- How It Works -->
                <a 
                    href="{{ route('admin.how-it-works.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.how-it-works*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">🔄</span>
                        <span>How It Works</span>
                    </div>
                </a>

                <!-- Blogs & News -->
                <a 
                    href="{{ route('admin.blogs.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.blogs*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">📰</span>
                        <span>Blogs & News</span>
                    </div>
                </a>

                <!-- Patient Stories -->
                <a 
                    href="{{ route('admin.patient-stories.index') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.patient-stories*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">💬</span>
                        <span>Patient Stories</span>
                    </div>
                </a>

                <!-- Contact & Social Details -->
                <a 
                    href="{{ route('admin.settings.contact') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.settings.contact*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">📞</span>
                        <span>Website & Contact</span>
                    </div>
                </a>

                <!-- Admin Profile Settings -->
                <a 
                    href="{{ route('admin.profile.edit') }}" 
                    class="flex items-center justify-between px-3 py-2 rounded-xl {{ request()->routeIs('admin.profile*') ? 'bg-[#27797D] text-white font-bold shadow-md shadow-[#27797D]/20' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }} transition-all"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs">👤</span>
                        <span>Admin Profile</span>
                    </div>
                </a>
            </div>
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
