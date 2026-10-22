<!DOCTYPE html>
<html lang="en" dir="ltr">
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
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
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
</head>
<body class="bg-gray-50 text-gray-800 antialiased font-sans flex flex-col min-h-screen">

    <!-- Partner Top Header Bar -->
    <header class="bg-[#1D4B6C] text-white sticky top-0 z-40 border-b border-[#27797D]/30 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <!-- Left: Brand Logo & Partner Badge -->
                <div class="flex items-center gap-3 sm:gap-4">
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5 notranslate group">
                        <div class="bg-white px-2 py-1 rounded-xl shadow-xs border border-white/20 flex items-center justify-center">
                            <img src="{{ asset('logo.png') }}" alt="Heal Go Fly" class="h-8 sm:h-9 w-auto object-contain">
                        </div>
                        <div class="flex flex-col leading-none">
                            <span class="text-base sm:text-lg font-black tracking-tight text-white group-hover:text-teal-200 transition-colors">
                                Heal Go Fly
                            </span>
                            <span class="text-[9px] uppercase font-bold text-[#EF7415] tracking-wider mt-0.5">
                                Partner Portal
                            </span>
                        </div>
                    </a>

                    <div class="h-6 w-px bg-white/20 hidden md:block"></div>

                    <!-- Mode Tag -->
                    <span class="hidden md:inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-white/10 text-teal-200 border border-white/10">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                        Authorized Facilitator
                    </span>
                </div>

                <!-- Right: Partner Profile & Actions -->
                <div class="flex items-center gap-3 sm:gap-4">
                    <a href="{{ url('/') }}" class="hidden sm:inline-flex text-xs font-semibold text-teal-100 hover:text-white transition-colors">
                        &larr; Public Website
                    </a>

                    @auth('partner')
                        <!-- Partner Avatar / Info Dropdown/Badge -->
                        <div class="flex items-center gap-2.5 bg-white/10 px-3 py-1.5 rounded-xl border border-white/15">
                            <div class="w-7 h-7 rounded-full bg-[#EF7415] text-white flex items-center justify-center font-bold text-xs uppercase shadow-xs">
                                {{ substr(auth('partner')->user()->name, 0, 1) }}
                            </div>
                            <div class="hidden sm:block text-left leading-tight">
                                <span class="block text-xs font-bold text-white leading-tight">
                                    {{ Str::limit(auth('partner')->user()->name, 16) }}
                                </span>
                                <span class="block text-[10px] text-teal-200/90 truncate max-w-[140px]">
                                    {{ auth('partner')->user()->company_name }}
                                </span>
                            </div>
                        </div>

                        <!-- Logout Form -->
                        <form action="{{ route('partner.logout') }}" method="POST" class="inline">
                            @csrf
                            <button 
                                type="submit" 
                                class="inline-flex items-center gap-1 text-xs font-bold text-rose-200 hover:text-white bg-rose-500/20 hover:bg-rose-600 px-3 py-1.5 rounded-lg border border-rose-400/30 transition-all"
                                title="Sign out of partner portal"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                <span class="hidden sm:inline">Logout</span>
                            </button>
                        </form>
                    @endauth
                </div>

            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-1 py-8 sm:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <!-- Partner Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-xs text-gray-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-3">
            <div>
                &copy; {{ date('Y') }} <span class="font-bold text-[#1D4B6C]">Heal Go Fly LLP</span>. All rights reserved. &bull; <span class="text-[#EF7415] italic font-semibold">Healgofly hi rahega</span>
            </div>
            <div class="flex items-center gap-4 text-xs font-medium">
                <a href="mailto:info@healgofly.com" class="hover:text-[#27797D]">info@healgofly.com</a>
                <span>&bull;</span>
                <a href="https://wa.me/919129846542" target="_blank" class="hover:text-[#27797D] text-[#25D366] font-bold">+91 9129846542</a>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
