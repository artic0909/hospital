<!DOCTYPE html>
<html lang="en" dir="ltr" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Partner Dashboard - Heal Go Fly')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN with typography & forms plugins -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            teal: '#27797D',
                            navy: '#1D4B6C',
                            darknavy: '#112347',
                            orange: '#EF7415',
                            tealhover: '#1e5f62',
                            navyhover: '#15364e',
                            orangehover: '#d9640d'
                        }
                    }
                }
            }
        }
    </script>

    <!-- ApexCharts Library (Local asset with CDN fallback) -->
    <script src="{{ asset('js/apexcharts.min.js') }}"></script>
    <script>
        if (typeof ApexCharts === 'undefined') {
            document.write('<script src="https://cdn.jsdelivr.net/npm/apexcharts"><\/script>');
        }
    </script>

    <!-- SweetAlert2 CDN for Confirmation Dialogs & Flash Toasts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Custom scrollbar for dashboard */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Rich content typography styling for live previews */
        .rich-content h1, .rich-content h2, .rich-content h3 {
            color: #112347;
            font-weight: 800;
            margin-top: 1.25rem;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }
        .rich-content h1 { font-size: 1.35rem; }
        .rich-content h2 { font-size: 1.15rem; }
        .rich-content h3 { font-size: 1rem; }
        .rich-content p {
            margin-bottom: 0.75rem;
            line-height: 1.7;
            color: #334155;
        }
        .rich-content ul {
            list-style-type: disc;
            margin-left: 1.25rem;
            margin-bottom: 0.75rem;
            color: #334155;
        }
        .rich-content ol {
            list-style-type: decimal;
            margin-left: 1.25rem;
            margin-bottom: 0.75rem;
            color: #334155;
        }
        .rich-content li {
            margin-bottom: 0.35rem;
            line-height: 1.6;
        }
        .rich-content strong {
            font-weight: 700;
            color: #0f172a;
        }
        .rich-content a {
            color: #27797D;
            text-decoration: underline;
        }
        .rich-content blockquote {
            border-left: 3px solid #27797D;
            padding-left: 0.85rem;
            font-style: italic;
            color: #475569;
            margin: 0.75rem 0;
        }
    </style>

    @stack('styles')
</head>
<body class="h-full bg-slate-50 text-slate-800 antialiased font-sans">

    <div class="min-h-full flex flex-col">

        <!-- ==================== SIDEBAR COMPONENT ==================== -->
        @include('partner.includes.sidebar')

        <!-- ==================== MAIN CONTENT WRAPPER (OFFSET BY SIDEBAR ON LG) ==================== -->
        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">

            @if(session('impersonated_by_admin') || auth('admin')->check())
                <!-- Admin Impersonation Notice Bar -->
                <div class="bg-gradient-to-r from-amber-600 via-[#EF7415] to-amber-700 text-white px-4 py-2 text-xs font-bold flex items-center justify-between shadow-xs sticky top-0 z-40">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-white animate-ping"></span>
                        <span>⚡ <strong>Admin Impersonation Mode:</strong> Viewing Partner Desk as <u>{{ auth('partner')->user()->name ?? 'Partner' }}</u></span>
                    </div>
                    <a 
                        href="{{ route('admin.hospital.index') }}" 
                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-white/20 hover:bg-white text-white hover:text-slate-900 text-[11px] font-extrabold transition-all"
                    >
                        <span>&larr; Return to Admin</span>
                    </a>
                </div>
            @endif

            <!-- Top Header Bar -->
            <header class="sticky top-0 z-30 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
                <div class="px-4 sm:px-6 lg:px-8 py-3">
                    <div class="flex items-center justify-between gap-4">
                        
                        <!-- Left: Mobile Menu Toggle & Breadcrumbs -->
                        <div class="flex items-center gap-3">
                            <!-- Mobile Sidebar Button -->
                            <button 
                                id="partner-sidebar-toggle-btn" 
                                type="button" 
                                class="lg:hidden p-2 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none transition-colors"
                                aria-label="Open Sidebar Menu"
                            >
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </button>

                            <!-- Dashboard Title & Live Badge -->
                            <div class="flex items-center gap-2.5">
                                <h1 class="text-base sm:text-lg font-extrabold text-[#112347] tracking-tight">
                                    Partner Portal
                                </h1>
                                <span class="hidden sm:inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Live Sync
                                </span>
                            </div>
                        </div>

                        <!-- Right: Actions & User Avatar -->
                        <div class="flex items-center gap-2.5 sm:gap-4">
                            
                            <!-- Search Bar (Desktop) -->
                            <div class="hidden md:block relative w-64 lg:w-72">
                                <input 
                                    type="text" 
                                    id="partner-quick-search"
                                    placeholder="Search patient, ID, hospital..." 
                                    class="w-full bg-slate-100 hover:bg-slate-50 focus:bg-white text-xs text-slate-800 placeholder-slate-400 rounded-xl pl-9 pr-4 py-2 border border-slate-200 focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 focus:outline-none transition-all"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Fast-Track New Referral CTA -->
                            <button 
                                type="button"
                                onclick="openReferralModal()"
                                class="inline-flex items-center gap-1.5 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold px-3 sm:px-4 py-2 rounded-xl shadow-sm hover:shadow transition-all duration-150 transform hover:-translate-y-0.5"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span><span class="hidden sm:inline">Refer</span> Patient</span>
                            </button>

                            <!-- Public Website Link -->
                            <a 
                                href="{{ url('/') }}" 
                                target="_blank"
                                class="hidden xl:inline-flex items-center gap-1 text-xs font-semibold text-slate-600 hover:text-[#27797D] px-2.5 py-1.5 rounded-lg hover:bg-slate-100 transition-colors"
                            >
                                <span>Website</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>

                            <!-- Notification Bell with Ping -->
                            <div class="relative">
                                <button 
                                    type="button" 
                                    class="p-2 rounded-xl text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition-colors relative"
                                    title="Notifications"
                                    onclick="alert('Notifications: 3 new patient updates received today.')"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                    </svg>
                                    <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-[#EF7415] ring-2 ring-white"></span>
                                </button>
                            </div>

                            <!-- Partner User Avatar & Info -->
                            @auth('partner')
                                <div class="flex items-center gap-2 pl-2 border-l border-slate-200">
                                    <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-[#1D4B6C] to-[#27797D] text-white flex items-center justify-center font-bold text-xs uppercase shadow-xs">
                                        {{ strtoupper(substr(auth('partner')->user()->name, 0, 1)) }}
                                    </div>
                                    <div class="hidden md:block text-left leading-tight">
                                        <span class="block text-xs font-bold text-[#112347]">
                                            {{ Str::limit(auth('partner')->user()->name, 14) }}
                                        </span>
                                        <span class="block text-[10px] text-slate-400 truncate max-w-[120px]">
                                            {{ auth('partner')->user()->company_name ?: (auth('partner')->user()->partner_type ?? 'Partner') }}
                                        </span>
                                    </div>
                                </div>
                            @endauth

                        </div>

                    </div>
                </div>
            </header>

            <!-- Main Page Content -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-slate-200/80 py-4 px-4 sm:px-6 lg:px-8 text-xs text-slate-500">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                    <div>
                        &copy; {{ date('Y') }} <span class="font-bold text-[#112347]">Heal Go Fly LLP</span>. Partner Management System. &bull; <span class="text-[#EF7415] italic font-semibold">Healgofly hi rahega</span>
                    </div>
                    <div class="flex items-center gap-4 text-xs font-medium">
                        <span class="text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">JCI & NABH Hospital Liaison</span>
                        <a href="https://wa.me/919129846542" target="_blank" class="hover:text-[#27797D] text-[#25D366] font-bold">+91 9129846542</a>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <!-- ==================== SCRIPTS COMPONENT ==================== -->
    @include('partner.includes.script')

    <script>
        // Global SweetAlert Toast & Dialog Helper
        window.confirmAction = function(formId, title, text, confirmButtonText = 'Yes, Proceed') {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: title || 'Are you sure?',
                    text: text || 'This action cannot be undone!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#EF7415',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: confirmButtonText,
                    borderRadius: '16px'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById(formId);
                        if (form) form.submit();
                    }
                });
            } else {
                if (confirm((title ? title + "\n" : "") + (text || "Are you sure?"))) {
                    const form = document.getElementById(formId);
                    if (form) form.submit();
                }
            }
        };

        @if (session('success'))
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true
                });
            }
        @endif

        @if (session('error'))
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: 'Action Failed',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#EF7415',
                    borderRadius: '16px'
                });
            }
        @endif
    </script>

    @stack('scripts')
</body>
</html>
