<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vaidam.com - Medical Treatment With Unmatched Personal Care</title>
    
    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" sizes="any">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Noto+Sans+Bengali:wght@400;500;600;700&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', '"Noto Sans Bengali"', '"Tajawal"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        vaidam: {
                            blue: '#00539C',
                            darkblue: '#00407a',
                            cardblue: '#005596',
                            red: '#e13b3f',
                            redhover: '#cf2a2e',
                            gold: '#f59e0b',
                            textdark: '#112347',
                            textmuted: '#5a6a85'
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Noto Sans Bengali', 'Tajawal', sans-serif;
            top: 0px !important;
        }

        /* Move Google Translate Top Banner off-screen so it is completely hidden without breaking its JavaScript engine */
        .goog-te-banner-frame,
        .goog-te-banner-frame.skiptranslate,
        iframe.goog-te-banner-frame,
        iframe[class*="VIpgJd"],
        iframe[id*=":1."],
        iframe[id*=":2."],
        .VIpgJd-ZVi9od-ORHb-OEVmcd,
        .VIpgJd-ZVi9od-aZ2wEe-wOHMyf,
        .VIpgJd-ZVi9od-xl07Ob-OEVmcd {
            position: absolute !important;
            top: -9999px !important;
            left: -9999px !important;
            visibility: hidden !important;
            width: 0px !important;
            height: 0px !important;
            opacity: 0 !important;
            pointer-events: none !important;
            z-index: -9999 !important;
            border: none !important;
        }

        /* Prevent Google Translate from pushing body down */
        body {
            top: 0px !important;
            position: static !important;
        }

        /* Prevent Google Translate from pushing body down by 40px */
        html, body {
            top: 0px !important;
            position: static !important;
            margin-top: 0px !important;
            padding-top: 0px !important;
        }

        .goog-te-gadget {
            display: none !important;
        }
        .goog-tooltip,
        .goog-tooltip:hover {
            display: none !important;
        }
        .goog-text-highlight {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased selection:bg-red-500 selection:text-white">

    <!-- Google Translate Element (kept alive off-screen so Google renders the translation combo) -->
    <div id="google_translate_element" style="position: absolute; top: -9999px; left: -9999px; width: 1px; height: 1px; overflow: hidden;"></div>

    <!-- ==================== HEADER (TOP BAR) ==================== -->
    <header class="bg-[#00539C] text-white py-2.5 px-4 sm:px-6 lg:px-8 shadow-sm relative z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-4">
            
            <!-- Left: Logo & Accreditation Badges -->
            <div class="flex items-center gap-3 sm:gap-5 flex-wrap">
                <!-- Brand Logo (Protected from Google translation via notranslate) -->
                <a href="{{ url('/') }}" class="flex flex-col group leading-none notranslate">
                    <span class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white group-hover:text-blue-100 transition-colors">
                        Vaidam<span class="text-white">.com</span>
                    </span>
                    <span class="text-[9px] sm:text-[10px] tracking-widest uppercase font-semibold text-[#ffd25a] mt-0.5">
                        FOR MEDICAL PROCEDURES
                    </span>
                </a>

                <div class="h-8 w-px bg-white/20 hidden sm:block"></div>

                <!-- 10 Years Badge -->
                <div class="hidden sm:flex items-center gap-1.5 text-yellow-300">
                    <svg class="w-7 h-7 text-yellow-400 drop-shadow-sm" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h-2v-6h2v6zm4 0h-2V7h2v10z" opacity="0.1"/>
                        <path d="M7.05 6.05a7 7 0 0 0 0 9.9 1 1 0 0 1-1.41 1.41 9 9 0 0 1 0-12.72 1 1 0 0 1 1.41 1.41zm9.9 0a1 1 0 0 1 1.41-1.41 9 9 0 0 1 0 12.72 1 1 0 0 1-1.41-1.41 7 7 0 0 0 0-9.9z" fill="#ffd700"/>
                        <circle cx="12" cy="12" r="3" fill="#ffd700" opacity="0.3"/>
                    </svg>
                    <div class="leading-tight text-center">
                        <span class="block text-xs font-black text-yellow-300 tracking-wider">10</span>
                        <span class="block text-[8px] font-bold text-yellow-200 uppercase tracking-widest">Years</span>
                    </div>
                </div>

                <!-- NABH / Quality Accreditation Badge -->
                <div class="hidden md:flex items-center gap-1.5 bg-white/10 px-2.5 py-1 rounded-full border border-white/20">
                    <div class="w-6 h-6 rounded-full bg-white flex items-center justify-center p-0.5 shadow-sm">
                        <svg class="w-full h-full text-red-600" viewBox="0 0 24 24" fill="currentColor">
                            <circle cx="12" cy="12" r="10" fill="#dc2626"/>
                            <circle cx="12" cy="12" r="7" fill="#ffffff"/>
                            <circle cx="12" cy="12" r="5" fill="#00539C"/>
                            <path d="M12 9v6M9 12h6" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold text-white tracking-wide uppercase">NABH Certified</span>
                </div>
            </div>

            <!-- Right: Call to Action & Language Selector -->
            <div class="flex items-center gap-2 sm:gap-3">
                <!-- Free Quote Button -->
                <a href="#quote-form" class="inline-flex items-center justify-center bg-[#e13b3f] hover:bg-[#c92a2e] text-white text-xs sm:text-sm font-bold px-3.5 sm:px-5 py-2 sm:py-2.5 rounded-md shadow transition-all duration-150 transform hover:-translate-y-0.5 active:translate-y-0">
                    Get a FREE Quote
                </a>

                <!-- Custom Google Translate Language Dropdown -->
                <div class="relative notranslate" id="lang-dropdown-wrapper">
                    <button 
                        type="button" 
                        id="lang-btn"
                        class="inline-flex items-center gap-1.5 bg-white hover:bg-gray-100 text-[#00539C] text-xs font-semibold px-2.5 sm:px-3 py-1.5 sm:py-2 rounded-md transition-colors shadow-sm focus:outline-none"
                        aria-expanded="false"
                    >
                        <!-- Globe Icon -->
                        <svg class="w-3.5 h-3.5 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke-width="2"/>
                            <path stroke-width="2" d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                        </svg>
                        <span id="current-lang-text">English</span>
                        <svg class="w-3 h-3 text-gray-500 transition-transform duration-200" id="lang-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Language Menu (Supports English, Bengali, Russian, Arabic) -->
                    <div 
                        id="lang-menu" 
                        class="hidden absolute right-0 mt-1.5 w-44 bg-white border border-gray-200 rounded-lg shadow-xl py-1.5 z-50 text-xs font-medium"
                    >
                        <button 
                            type="button"
                            onclick="translatePage('en')" 
                            class="w-full text-left flex items-center justify-between px-3.5 py-2 text-gray-700 hover:bg-blue-50 hover:text-[#00539C] transition-colors"
                            data-lang="en"
                        >
                            <span>English (Default)</span>
                            <span class="lang-check hidden text-[#00539C]">✓</span>
                        </button>

                        <button 
                            type="button"
                            onclick="translatePage('bn')" 
                            class="w-full text-left flex items-center justify-between px-3.5 py-2 text-gray-700 hover:bg-blue-50 hover:text-[#00539C] transition-colors"
                            data-lang="bn"
                        >
                            <span>বাংলা (Bengali)</span>
                            <span class="lang-check hidden text-[#00539C]">✓</span>
                        </button>

                        <button 
                            type="button"
                            onclick="translatePage('ru')" 
                            class="w-full text-left flex items-center justify-between px-3.5 py-2 text-gray-700 hover:bg-blue-50 hover:text-[#00539C] transition-colors"
                            data-lang="ru"
                        >
                            <span>Русский (Russian)</span>
                            <span class="lang-check hidden text-[#00539C]">✓</span>
                        </button>

                        <button 
                            type="button"
                            onclick="translatePage('ar')" 
                            class="w-full text-left flex items-center justify-between px-3.5 py-2 text-gray-700 hover:bg-blue-50 hover:text-[#00539C] transition-colors"
                            data-lang="ar"
                        >
                            <span>العربية (Arabic)</span>
                            <span class="lang-check hidden text-[#00539C]">✓</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <!-- ==================== SUB-HEADER (MAIN NAVIGATION) ==================== -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-40 shadow-[0_2px_4px_rgba(0,0,0,0.03)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-14 gap-4">
                
                <!-- Navigation Links (Desktop) -->
                <div class="hidden lg:flex items-center gap-4 xl:gap-6 text-xs xl:text-sm font-semibold text-gray-700">
                    <a href="{{ url('/') }}" class="text-[#00539C] hover:text-[#003d73] transition-colors py-4 border-b-2 border-[#00539C]">
                        Home
                    </a>

                    <!-- Hospitals Dropdown -->
                    <div class="relative group py-4">
                        <button class="flex items-center gap-1 hover:text-[#00539C] transition-colors">
                            <span>Hospitals</span>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#00539C] transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 top-full hidden group-hover:block w-56 bg-white border border-gray-100 rounded-lg shadow-xl py-2 z-50">
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Top Hospitals in India</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Hospitals in Turkey</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Hospitals in Thailand</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">NABH / JCI Accredited</a>
                        </div>
                    </div>

                    <!-- Doctors Dropdown -->
                    <div class="relative group py-4">
                        <button class="flex items-center gap-1 hover:text-[#00539C] transition-colors">
                            <span>Doctors</span>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#00539C] transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 top-full hidden group-hover:block w-60 bg-white border border-gray-100 rounded-lg shadow-xl py-2 z-50">
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Cardiologists</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Oncologists (Cancer)</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Orthopedic Surgeons</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Neurologists</a>
                        </div>
                    </div>

                    <!-- Cost Dropdown -->
                    <div class="relative group py-4">
                        <button class="flex items-center gap-1 hover:text-[#00539C] transition-colors">
                            <span>Cost</span>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#00539C] transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 top-full hidden group-hover:block w-56 bg-white border border-gray-100 rounded-lg shadow-xl py-2 z-50">
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Heart Surgery Cost</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Knee Replacement Cost</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Cancer Treatment Cost</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Dental & Cosmetic Cost</a>
                        </div>
                    </div>

                    <!-- Knowledge Dropdown -->
                    <div class="relative group py-4">
                        <button class="flex items-center gap-1 hover:text-[#00539C] transition-colors">
                            <span>Knowledge</span>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#00539C] transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 top-full hidden group-hover:block w-56 bg-white border border-gray-100 rounded-lg shadow-xl py-2 z-50">
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Medical Visa Guide</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Travel Checklist</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-50 hover:text-[#00539C]">Treatment FAQs</a>
                        </div>
                    </div>

                    <a href="#" class="hover:text-[#00539C] transition-colors py-4">
                        Patient Stories
                    </a>

                    <a href="#" class="hover:text-[#00539C] transition-colors py-4">
                        Wellness
                    </a>

                    <a href="#quote-form" class="hover:text-[#00539C] transition-colors py-4 text-emerald-600 font-bold flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        FREE Consult
                    </a>
                </div>

                <!-- Right: Search Bar -->
                <div class="flex-1 lg:flex-initial flex items-center justify-end">
                    <form action="#" method="GET" class="w-full max-w-xs md:max-w-sm relative">
                        <input 
                            type="text" 
                            placeholder="Search doctors, hospitals, treatments..." 
                            class="w-full bg-gray-50 hover:bg-white focus:bg-white text-xs sm:text-sm text-gray-800 placeholder-gray-400 rounded-full pl-4 pr-10 py-2 border border-gray-300 focus:border-[#00539C] focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all"
                        >
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#00539C] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center">
                    <button id="mobile-menu-btn" type="button" class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none">
                        <svg id="menu-icon-bars" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg id="menu-icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Drawer Navigation -->
        <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-200 bg-white px-4 pt-3 pb-6 space-y-2">
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-sm font-semibold text-[#00539C] bg-blue-50">Home</a>
            <a href="#" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Hospitals</a>
            <a href="#" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Doctors</a>
            <a href="#" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Cost & Pricing</a>
            <a href="#" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Knowledge & Guides</a>
            <a href="#" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Patient Stories</a>
            <a href="#" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Wellness</a>
            <a href="#quote-form" class="block px-3 py-2 rounded-md text-sm font-bold text-emerald-600 bg-emerald-50">FREE Consult</a>
        </div>
    </nav>


    <!-- ==================== HERO SECTION ==================== -->
    <section class="relative bg-white overflow-hidden min-h-[580px] lg:min-h-[640px] flex items-center">
        
        <!-- Background Image Container -->
        <div class="absolute inset-0 z-0">
            <img 
                src="{{ asset('images/hero_medical_care.jpg') }}" 
                alt="Medical Treatment Personal Care" 
                class="w-full h-full object-cover object-center lg:object-[80%_center]"
                onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1920&q=80';"
            >
            <!-- Gradient Overlay: Soft white fade for maximum text readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-white via-white/95 sm:via-white/90 lg:via-white/80 to-white/40 lg:to-transparent"></div>
            <!-- Bottom subtle fade -->
            <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
        </div>

        <!-- Content Container -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Left Column: Titles, Stats & Proof -->
                <div class="lg:col-span-7 space-y-6 sm:space-y-8">
                    
                    <!-- Main Headings -->
                    <div class="space-y-3 sm:space-y-4 max-w-2xl">
                        <h1 class="text-3xl sm:text-4xl lg:text-[46px] font-extrabold text-[#112347] tracking-tight leading-[1.18]">
                            Medical Treatment With Unmatched Personal Care
                        </h1>
                        <p class="text-base sm:text-lg lg:text-xl text-[#5a6a85] font-normal leading-relaxed">
                            World's Most Trusted Medical Travel Assistance Platform
                        </p>
                    </div>

                    <!-- Social Proof / Assisted Counter -->
                    <div class="pt-2">
                        <!-- Avatars Group -->
                        <div class="flex items-center -space-x-2.5 overflow-hidden">
                            <img class="inline-block h-10 w-10 sm:h-12 sm:w-12 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80" alt="Patient">
                            <img class="inline-block h-10 w-10 sm:h-12 sm:w-12 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" alt="Doctor">
                            <img class="inline-block h-10 w-10 sm:h-12 sm:w-12 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=150&q=80" alt="Doctor">
                            <img class="inline-block h-10 w-10 sm:h-12 sm:w-12 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=150&q=80" alt="Patient">
                            <img class="inline-block h-10 w-10 sm:h-12 sm:w-12 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=150&q=80" alt="Patient">
                        </div>

                        <!-- Counter text -->
                        <div class="mt-2.5">
                            <p class="text-xs sm:text-sm text-gray-700">
                                <span class="font-bold text-[#112347] text-sm sm:text-base">1,00,000+</span> 
                                <span class="text-[#5a6a85] font-medium">Patients Assisted Since 2016</span>
                            </p>
                        </div>
                    </div>

                    <!-- Google Rating Card -->
                    <div class="pt-2 flex items-center gap-3">
                        <!-- Google Logo SVG -->
                        <div class="w-9 h-9 sm:w-10 sm:h-10 flex-shrink-0">
                            <svg viewBox="0 0 24 24" class="w-full h-full drop-shadow-sm">
                                <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z"/>
                                <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.25v3.15C3.26 21.36 7.35 24 12 24z"/>
                                <path fill="#FBBC05" d="M5.28 14.27c-.25-.72-.38-1.49-.38-2.27s.13-1.55.38-2.27V6.58H1.25C.45 8.18 0 10.04 0 12s.45 3.82 1.25 5.42l4.03-3.15z"/>
                                <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.35 0 3.26 2.64 1.25 6.58l4.03 3.15c.95-2.83 3.6-4.98 6.72-4.98z"/>
                            </svg>
                        </div>

                        <!-- Rating & Stars -->
                        <div class="flex items-center gap-2">
                            <span class="text-base sm:text-lg font-bold text-gray-900 leading-none">4.7</span>
                            <!-- 5 Stars -->
                            <div class="flex items-center text-amber-500">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Inquiry Floating Card -->
                <div class="lg:col-span-5 flex justify-center lg:justify-end">
                    
                    <div id="quote-form" class="w-full max-w-md bg-[#005596] rounded-2xl p-5 sm:p-7 shadow-[0_20px_50px_rgba(0,40,90,0.35)] border border-blue-400/20 text-white relative backdrop-blur-sm">
                        
                        <!-- Card Header -->
                        <div class="mb-4">
                            <div class="flex items-center gap-2">
                                <div class="w-5 h-5 flex-shrink-0 text-white">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                        <path d="m9 12 2 2 4-4"/>
                                    </svg>
                                </div>
                                <h2 class="text-xl sm:text-[22px] font-bold text-white tracking-tight">
                                    Let Us Help You
                                </h2>
                            </div>
                            <p class="text-xs text-blue-100 font-normal mt-1 leading-snug">
                                Fill in your details and our medical experts will contact you within 24 hours.
                            </p>
                        </div>

                        <!-- Form -->
                        <form action="#" method="POST" class="space-y-3" onsubmit="event.preventDefault(); alert('Thank you! Our medical expert will contact you shortly.');">
                            @csrf
                            
                            <!-- 1. Patient Name -->
                            <div>
                                <input 
                                    type="text" 
                                    name="patient_name" 
                                    placeholder="Patient Name" 
                                    required 
                                    class="w-full bg-white text-gray-900 placeholder-gray-400 text-sm rounded-lg px-3.5 py-2.5 sm:py-3 border border-transparent focus:border-red-500 focus:ring-2 focus:ring-red-400/40 focus:outline-none transition-all shadow-inner"
                                >
                            </div>

                            <!-- 2. Country Dropdown -->
                            <div class="relative">
                                <select 
                                    name="country" 
                                    class="w-full bg-white text-gray-900 text-sm rounded-lg px-3.5 py-2.5 sm:py-3 border border-transparent focus:border-red-500 focus:ring-2 focus:ring-red-400/40 focus:outline-none transition-all shadow-inner appearance-none cursor-pointer pr-10"
                                >
                                    <option value="India" selected>India</option>
                                    <option value="United States">United States</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Other">Other Country</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-gray-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- 3. City -->
                            <div>
                                <input 
                                    type="text" 
                                    name="city" 
                                    placeholder="Select City" 
                                    class="w-full bg-white text-gray-900 placeholder-gray-400 text-sm rounded-lg px-3.5 py-2.5 sm:py-3 border border-transparent focus:border-red-500 focus:ring-2 focus:ring-red-400/40 focus:outline-none transition-all shadow-inner"
                                >
                            </div>

                            <!-- 4. Phone with Country Code -->
                            <div class="flex rounded-lg overflow-hidden bg-white shadow-inner focus-within:ring-2 focus-within:ring-red-400/40 border border-transparent focus-within:border-red-500 transition-all notranslate" dir="ltr">
                                <div class="bg-gray-100/90 text-gray-700 text-sm font-semibold px-3 flex items-center border-r border-gray-200 select-none">
                                    +91
                                </div>
                                <input 
                                    type="tel" 
                                    name="phone" 
                                    placeholder="Your Phone number" 
                                    required 
                                    class="w-full bg-white text-gray-900 placeholder-gray-400 text-sm px-3.5 py-2.5 sm:py-3 focus:outline-none"
                                >
                            </div>

                            <!-- 5. Medical Problem -->
                            <div>
                                <input 
                                    type="text" 
                                    name="medical_problem" 
                                    placeholder="Describe The Current Medical Problem..." 
                                    class="w-full bg-white text-gray-900 placeholder-gray-400 text-sm rounded-lg px-3.5 py-2.5 sm:py-3 border border-transparent focus:border-red-500 focus:ring-2 focus:ring-red-400/40 focus:outline-none transition-all shadow-inner"
                                >
                            </div>

                            <!-- 6. Age or DOB -->
                            <div>
                                <input 
                                    type="text" 
                                    name="age_or_dob" 
                                    placeholder="Example: 30 Yrs or 29-05-1985" 
                                    class="w-full bg-white text-gray-900 placeholder-gray-400 text-sm rounded-lg px-3.5 py-2.5 sm:py-3 border border-transparent focus:border-red-500 focus:ring-2 focus:ring-red-400/40 focus:outline-none transition-all shadow-inner"
                                >
                            </div>

                            <!-- 7. Submit Button -->
                            <div class="pt-1">
                                <button 
                                    type="submit" 
                                    class="w-full bg-[#e13b3f] hover:bg-[#cf2a2e] active:scale-[0.99] text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 flex items-center justify-center gap-2 text-base"
                                >
                                    <span>Continue</span>
                                    <span class="text-lg leading-none">&rarr;</span>
                                </button>
                            </div>

                            <!-- 8. Disclaimer -->
                            <div class="pt-1 text-center">
                                <p class="text-[11px] text-blue-100/90 leading-tight">
                                    By submitting I agree to the 
                                    <a href="#" class="underline hover:text-white transition-colors">Terms of Use</a> 
                                    and 
                                    <a href="#" class="underline hover:text-white transition-colors">Privacy Policy</a> 
                                    of Vaidam Health.
                                </p>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </section>

    <!-- ==================== GOOGLE TRANSLATOR INITIALIZATION & INTERACTION ==================== -->
    <script type="text/javascript">
        // Google Translate Element Init callback
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,bn,ru,ar',
                autoDisplay: false,
                multilanguagePage: true
            }, 'google_translate_element');
        }

        const languagesMap = {
            'en': 'English',
            'bn': 'বাংলা (Bengali)',
            'ru': 'Русский (Russian)',
            'ar': 'العربية (Arabic)'
        };

        // Read Google Translate Cookie (googtrans)
        function getCookie(name) {
            const v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
            return v ? v[2] : null;
        }

        // Get currently active language
        function getCurrentLanguage() {
            const googtrans = getCookie('googtrans');
            if (googtrans) {
                const parts = googtrans.split('/');
                if (parts.length > 2 && languagesMap[parts[2]]) {
                    return parts[2];
                }
            }
            return 'en';
        }

        // Translate the whole website dynamically using Google Translate
        function translatePage(lang) {
            const cookieVal = '/en/' + lang;
            
            // Set cookie across path and host
            document.cookie = "googtrans=" + cookieVal + "; path=/;";
            try {
                if (window.location.hostname) {
                    document.cookie = "googtrans=" + cookieVal + "; domain=" + window.location.hostname + "; path=/;";
                    document.cookie = "googtrans=" + cookieVal + "; domain=." + window.location.hostname + "; path=/;";
                }
            } catch (e) {}

            // Apply RTL dynamically for Arabic
            if (lang === 'ar') {
                document.documentElement.setAttribute('dir', 'rtl');
            } else {
                document.documentElement.setAttribute('dir', 'ltr');
            }

            // Update UI text and checkmarks
            updateLanguageUI(lang);

            // Trigger Google Translate
            const select = document.querySelector('.goog-te-combo');
            if (select) {
                select.value = lang;
                select.dispatchEvent(new Event('change'));
            } else {
                setTimeout(() => {
                    const retrySelect = document.querySelector('.goog-te-combo');
                    if (retrySelect) {
                        retrySelect.value = lang;
                        retrySelect.dispatchEvent(new Event('change'));
                    } else {
                        window.location.reload();
                    }
                }, 300);
            }
        }

        // Update active checkmarks and button label
        function updateLanguageUI(lang) {
            const currentText = document.getElementById('current-lang-text');
            if (currentText && languagesMap[lang]) {
                currentText.textContent = languagesMap[lang].split(' ')[0]; // E.g. "English", "বাংলা"
            }

            // Checkmarks
            document.querySelectorAll('[data-lang]').forEach(btn => {
                const check = btn.querySelector('.lang-check');
                if (btn.getAttribute('data-lang') === lang) {
                    btn.classList.add('bg-blue-50/80', 'font-bold', 'text-[#00539C]');
                    if (check) check.classList.remove('hidden');
                } else {
                    btn.classList.remove('bg-blue-50/80', 'font-bold', 'text-[#00539C]');
                    if (check) check.classList.add('hidden');
                }
            });

            // Set direction
            if (lang === 'ar') {
                document.documentElement.setAttribute('dir', 'rtl');
            } else {
                document.documentElement.setAttribute('dir', 'ltr');
            }
        }

        // Prevent body shift without deleting Google Translate's execution frame
        function resetBodyTop() {
            if (document.body && document.body.style.top !== '0px') {
                document.body.style.top = '0px';
                document.body.style.position = 'static';
            }
            if (document.documentElement && document.documentElement.style.top !== '0px') {
                document.documentElement.style.top = '0px';
            }
        }

        // Run UI check on load and keep body pinned to top
        document.addEventListener('DOMContentLoaded', () => {
            const currentLang = getCurrentLanguage();
            updateLanguageUI(currentLang);
            resetBodyTop();

            // Observe body style to keep top: 0px without destroying iframe communication
            const bodyObserver = new MutationObserver(() => {
                resetBodyTop();
            });

            bodyObserver.observe(document.body, {
                attributes: true,
                attributeFilter: ['style']
            });

            const interval = setInterval(resetBodyTop, 200);
            setTimeout(() => clearInterval(interval), 4000);
        });

        // Dropdown toggle
        const langBtn = document.getElementById('lang-btn');
        const langMenu = document.getElementById('lang-menu');
        const langArrow = document.getElementById('lang-arrow');
        const langWrapper = document.getElementById('lang-dropdown-wrapper');

        if (langBtn && langMenu) {
            langBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isHidden = langMenu.classList.contains('hidden');
                if (isHidden) {
                    langMenu.classList.remove('hidden');
                    langArrow.classList.add('rotate-180');
                } else {
                    langMenu.classList.add('hidden');
                    langArrow.classList.remove('rotate-180');
                }
            });

            document.addEventListener('click', (e) => {
                if (langWrapper && !langWrapper.contains(e.target)) {
                    langMenu.classList.add('hidden');
                    langArrow.classList.remove('rotate-180');
                }
            });
        }

        // Mobile Menu Toggle
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const iconBars = document.getElementById('menu-icon-bars');
        const iconClose = document.getElementById('menu-icon-close');

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                const isHidden = mobileMenu.classList.contains('hidden');
                if (isHidden) {
                    mobileMenu.classList.remove('hidden');
                    iconBars.classList.add('hidden');
                    iconClose.classList.remove('hidden');
                } else {
                    mobileMenu.classList.add('hidden');
                    iconBars.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                }
            });
        }
    </script>

    <!-- Load Google Translate API Script Asynchronously -->
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>
