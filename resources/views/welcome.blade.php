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

    <!-- ==================== TOP MEDICAL DESTINATIONS & MULTI-SPECIALTY FOCUS ==================== -->
    <section class="py-14 sm:py-20 bg-gray-50/60 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- 1. TOP MEDICAL DESTINATIONS -->
            <div class="text-center max-w-3xl mx-auto mb-8 sm:mb-10">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#112347] tracking-tight">
                    Top Medical Destinations
                </h2>
                <p class="text-xs sm:text-sm text-[#5a6a85] mt-2.5 leading-relaxed">
                    Our network spans the top medical tourism hubs worldwide — giving you the choice of cities, doctors and price.
                </p>
            </div>

            <!-- Destinations Pills List -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3.5 max-w-5xl mx-auto">
                
                <!-- India -->
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#00539C] hover:text-[#00539C] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
                    <!-- Flag India -->
                    <span class="w-5 h-3.5 rounded-sm overflow-hidden flex-shrink-0 inline-block shadow-xs border border-gray-100">
                        <svg viewBox="0 0 900 600" class="w-full h-full object-cover">
                            <rect width="900" height="200" fill="#FF9933"/>
                            <rect y="200" width="900" height="200" fill="#FFFFFF"/>
                            <rect y="400" width="900" height="200" fill="#128807"/>
                            <circle cx="450" cy="300" r="80" fill="#000080"/>
                            <circle cx="450" cy="300" r="70" fill="#FFFFFF"/>
                            <circle cx="450" cy="300" r="25" fill="#000080"/>
                        </svg>
                    </span>
                    <span>India</span>
                </a>

                <!-- Turkey -->
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#00539C] hover:text-[#00539C] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
                    <span class="w-5 h-3.5 rounded-sm overflow-hidden flex-shrink-0 inline-block shadow-xs">
                        <svg viewBox="0 0 1200 800" class="w-full h-full object-cover">
                            <rect width="1200" height="800" fill="#E30A17"/>
                            <circle cx="425" cy="400" r="200" fill="#FFFFFF"/>
                            <circle cx="475" cy="400" r="160" fill="#E30A17"/>
                            <polygon points="630,400 575,417 596,362 552,393 605,379" fill="#FFFFFF" transform="scale(1.2) translate(-90, -70)"/>
                        </svg>
                    </span>
                    <span>Turkey</span>
                </a>

                <!-- Thailand -->
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#00539C] hover:text-[#00539C] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
                    <span class="w-5 h-3.5 rounded-sm overflow-hidden flex-shrink-0 inline-block shadow-xs">
                        <svg viewBox="0 0 900 600" class="w-full h-full object-cover">
                            <rect width="900" height="600" fill="#A51931"/>
                            <rect y="100" width="900" height="400" fill="#F4F5F8"/>
                            <rect y="200" width="900" height="200" fill="#2D2A4A"/>
                        </svg>
                    </span>
                    <span>Thailand</span>
                </a>

                <!-- Germany -->
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#00539C] hover:text-[#00539C] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
                    <span class="w-5 h-3.5 rounded-sm overflow-hidden flex-shrink-0 inline-block shadow-xs">
                        <svg viewBox="0 0 5 3" class="w-full h-full object-cover">
                            <rect width="5" height="1" y="0" fill="#000000"/>
                            <rect width="5" height="1" y="1" fill="#DD0000"/>
                            <rect width="5" height="1" y="2" fill="#FFCE00"/>
                        </svg>
                    </span>
                    <span>Germany</span>
                </a>

                <!-- United Arab Emirates -->
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#00539C] hover:text-[#00539C] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
                    <span class="w-5 h-3.5 rounded-sm overflow-hidden flex-shrink-0 inline-block shadow-xs">
                        <svg viewBox="0 0 1200 600" class="w-full h-full object-cover">
                            <rect width="1200" height="200" fill="#00732F"/>
                            <rect y="200" width="1200" height="200" fill="#FFFFFF"/>
                            <rect y="400" width="1200" height="200" fill="#000000"/>
                            <rect width="300" height="600" fill="#FF0000"/>
                        </svg>
                    </span>
                    <span>United Arab Emirates</span>
                </a>

                <!-- Egypt -->
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#00539C] hover:text-[#00539C] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
                    <span class="w-5 h-3.5 rounded-sm overflow-hidden flex-shrink-0 inline-block shadow-xs">
                        <svg viewBox="0 0 900 600" class="w-full h-full object-cover">
                            <rect width="900" height="200" fill="#CE1126"/>
                            <rect y="200" width="900" height="200" fill="#FFFFFF"/>
                            <rect y="400" width="900" height="200" fill="#000000"/>
                            <circle cx="450" cy="300" r="30" fill="#C09300"/>
                        </svg>
                    </span>
                    <span>Egypt</span>
                </a>

                <!-- Oman -->
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#00539C] hover:text-[#00539C] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
                    <span class="w-5 h-3.5 rounded-sm overflow-hidden flex-shrink-0 inline-block shadow-xs">
                        <svg viewBox="0 0 600 300" class="w-full h-full object-cover">
                            <rect width="600" height="100" fill="#FFFFFF"/>
                            <rect y="100" width="600" height="100" fill="#DB161B"/>
                            <rect y="200" width="600" height="100" fill="#008000"/>
                            <rect width="150" height="300" fill="#DB161B"/>
                        </svg>
                    </span>
                    <span>Oman</span>
                </a>

                <!-- Saudi Arabia -->
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#00539C] hover:text-[#00539C] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
                    <span class="w-5 h-3.5 rounded-sm overflow-hidden flex-shrink-0 inline-block shadow-xs">
                        <svg viewBox="0 0 900 600" class="w-full h-full object-cover">
                            <rect width="900" height="600" fill="#006C35"/>
                            <path d="M300 360h300v12H300z" fill="#FFFFFF"/>
                        </svg>
                    </span>
                    <span>Saudi Arabia</span>
                </a>

            </div>

            <!-- 2. MULTI-SPECIALTY FOCUS -->
            <div class="mt-16 sm:mt-24">
                
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-8 sm:mb-12">
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#112347] tracking-tight">
                        Multi-Specialty Focus
                    </h2>
                    <p class="text-xs sm:text-sm text-[#5a6a85] mt-2.5">
                        We cover all medical needs, from hair transplants to heart transplants.
                    </p>
                </div>

                <!-- Specialties Grid (3 Columns on Desktop, 2 on Tablet, 1 on Mobile) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                    
                    <!-- 1. Oncology -->
                    <div class="group bg-white rounded-xl p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-start justify-between cursor-pointer">
                        <div class="flex items-start gap-4 pr-3">
                            <!-- Icon -->
                            <div class="w-11 h-11 rounded-lg bg-blue-50/80 text-[#00539C] flex items-center justify-center flex-shrink-0 group-hover:bg-[#00539C] group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 8c0 4.5-6 9-6 9s-6-4.5-6-9a6 6 0 0 1 12 0z"/>
                                    <circle cx="12" cy="8" r="2"/>
                                    <path d="M4 19c2-2 5-2 8 0 3-2 6-2 8 0"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#00539C] transition-colors leading-snug">
                                    Oncology
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Advanced cancer treatments with proven results.
                                </p>
                            </div>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-[#e13b3f] text-white flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-xs group-hover:scale-110 transition-transform">
                            +
                        </div>
                    </div>

                    <!-- 2. Neurosurgery -->
                    <div class="group bg-white rounded-xl p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-start justify-between cursor-pointer">
                        <div class="flex items-start gap-4 pr-3">
                            <div class="w-11 h-11 rounded-lg bg-blue-50/80 text-[#00539C] flex items-center justify-center flex-shrink-0 group-hover:bg-[#00539C] group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9.5 2A2.5 2.5 0 0 1 12 4.5v15a2.5 2.5 0 0 1-4.96.44 2.5 2.5 0 0 1-2.96-3.08 3 3 0 0 1-.34-5.58 2.5 2.5 0 0 1 1.32-4.24 2.5 2.5 0 0 1 4.44-2.04z"/>
                                    <path d="M14.5 2A2.5 2.5 0 0 0 12 4.5v15a2.5 2.5 0 0 0 4.96.44 2.5 2.5 0 0 0 2.96-3.08 3 3 0 0 0 .34-5.58 2.5 2.5 0 0 0-1.32-4.24 2.5 2.5 0 0 0-4.44-2.04z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#00539C] transition-colors leading-snug">
                                    Neurosurgery
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Comprehensive neurosurgical care for adults and children.
                                </p>
                            </div>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-[#e13b3f] text-white flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-xs group-hover:scale-110 transition-transform">
                            +
                        </div>
                    </div>

                    <!-- 3. Spine Surgery -->
                    <div class="group bg-white rounded-xl p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-start justify-between cursor-pointer">
                        <div class="flex items-start gap-4 pr-3">
                            <div class="w-11 h-11 rounded-lg bg-blue-50/80 text-[#00539C] flex items-center justify-center flex-shrink-0 group-hover:bg-[#00539C] group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M8 5h8M8 9h8M8 13h8M8 17h8M12 2v20"/>
                                    <circle cx="12" cy="5" r="2" fill="currentColor"/>
                                    <circle cx="12" cy="9" r="2" fill="currentColor"/>
                                    <circle cx="12" cy="13" r="2" fill="currentColor"/>
                                    <circle cx="12" cy="17" r="2" fill="currentColor"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#00539C] transition-colors leading-snug">
                                    Spine Surgery
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Precision spine surgeries for better mobility.
                                </p>
                            </div>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-[#e13b3f] text-white flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-xs group-hover:scale-110 transition-transform">
                            +
                        </div>
                    </div>

                    <!-- 4. Cardiology -->
                    <div class="group bg-white rounded-xl p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-start justify-between cursor-pointer">
                        <div class="flex items-start gap-4 pr-3">
                            <div class="w-11 h-11 rounded-lg bg-blue-50/80 text-[#00539C] flex items-center justify-center flex-shrink-0 group-hover:bg-[#00539C] group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                                    <path d="M12 9v4m-2-2h4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#00539C] transition-colors leading-snug">
                                    Cardiology
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    World-class heart care for adults and children.
                                </p>
                            </div>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-[#e13b3f] text-white flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-xs group-hover:scale-110 transition-transform">
                            +
                        </div>
                    </div>

                    <!-- 5. Orthopedics -->
                    <div class="group bg-white rounded-xl p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-start justify-between cursor-pointer">
                        <div class="flex items-start gap-4 pr-3">
                            <div class="w-11 h-11 rounded-lg bg-blue-50/80 text-[#00539C] flex items-center justify-center flex-shrink-0 group-hover:bg-[#00539C] group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 10c.7-.7 1.6-1 2.5-1a3.5 3.5 0 1 1 0 7c-.9 0-1.8-.3-2.5-1l-6-6c-.7-.7-1-1.6-1-2.5a3.5 3.5 0 1 1 7 0c0 .9-.3 1.8-1 2.5Z"/>
                                    <path d="M6 14l-2 2a2.8 2.8 0 0 0 4 4l2-2"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#00539C] transition-colors leading-snug">
                                    Orthopedics
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Expert joint replacements and bone deformity solutions.
                                </p>
                            </div>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-[#e13b3f] text-white flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-xs group-hover:scale-110 transition-transform">
                            +
                        </div>
                    </div>

                    <!-- 6. IVF -->
                    <div class="group bg-white rounded-xl p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-start justify-between cursor-pointer">
                        <div class="flex items-start gap-4 pr-3">
                            <div class="w-11 h-11 rounded-lg bg-blue-50/80 text-[#00539C] flex items-center justify-center flex-shrink-0 group-hover:bg-[#00539C] group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m18 2 4 4"/>
                                    <path d="m17 7 3-3"/>
                                    <path d="M19 9 8.7 19.3c-1 1-2.5 1-3.4 0l-.6-.6c-1-1-1-2.5 0-3.4L15 5"/>
                                    <path d="m9 11 4 4"/>
                                    <path d="m5 19-3 3"/>
                                    <path d="m14 4 6 6"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#00539C] transition-colors leading-snug">
                                    IVF
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Leading fertility treatments with high success rates.
                                </p>
                            </div>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-[#e13b3f] text-white flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-xs group-hover:scale-110 transition-transform">
                            +
                        </div>
                    </div>

                    <!-- 7. Gynecology -->
                    <div class="group bg-white rounded-xl p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-start justify-between cursor-pointer">
                        <div class="flex items-start gap-4 pr-3">
                            <div class="w-11 h-11 rounded-lg bg-blue-50/80 text-[#00539C] flex items-center justify-center flex-shrink-0 group-hover:bg-[#00539C] group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="5"/>
                                    <path d="M12 13v9M9 18h6"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#00539C] transition-colors leading-snug">
                                    Gynecology
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Specialized women's health services.
                                </p>
                            </div>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-[#e13b3f] text-white flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-xs group-hover:scale-110 transition-transform">
                            +
                        </div>
                    </div>

                    <!-- 8. Cosmetic -->
                    <div class="group bg-white rounded-xl p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-start justify-between cursor-pointer">
                        <div class="flex items-start gap-4 pr-3">
                            <div class="w-11 h-11 rounded-lg bg-blue-50/80 text-[#00539C] flex items-center justify-center flex-shrink-0 group-hover:bg-[#00539C] group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M9 10h.01M15 10h.01M9.5 15a3.5 3.5 0 0 0 5 0"/>
                                    <path d="M8 3.5c1.5 1.5 3 2 4 2s2.5-.5 4-2"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#00539C] transition-colors leading-snug">
                                    Cosmetic
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Aesthetic procedures for a new you.
                                </p>
                            </div>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-[#e13b3f] text-white flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-xs group-hover:scale-110 transition-transform">
                            +
                        </div>
                    </div>

                    <!-- 9. Weight Loss -->
                    <div class="group bg-white rounded-xl p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-start justify-between cursor-pointer">
                        <div class="flex items-start gap-4 pr-3">
                            <div class="w-11 h-11 rounded-lg bg-blue-50/80 text-[#00539C] flex items-center justify-center flex-shrink-0 group-hover:bg-[#00539C] group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 4h12a2 2 0 0 1 2 2v2a6 6 0 0 1-6 6h-4a6 6 0 0 1-6-6V6a2 2 0 0 1 2-2Z"/>
                                    <path d="M6 14c0 3 2.5 6 6 6s6-3 6-6"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#00539C] transition-colors leading-snug">
                                    Weight Loss
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Specialized weight loss surgery options.
                                </p>
                            </div>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-[#e13b3f] text-white flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-xs group-hover:scale-110 transition-transform">
                            +
                        </div>
                    </div>

                    <!-- 10. Liver Transplant -->
                    <div class="group bg-white rounded-xl p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-start justify-between cursor-pointer">
                        <div class="flex items-start gap-4 pr-3">
                            <div class="w-11 h-11 rounded-lg bg-blue-50/80 text-[#00539C] flex items-center justify-center flex-shrink-0 group-hover:bg-[#00539C] group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 8c2-3 8-4 13-1 3 2 4 6 2 9-2 3-8 5-11 3-3-2-5-7-4-11Z"/>
                                    <path d="M12 9v4m-2-2h4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#00539C] transition-colors leading-snug">
                                    Liver Transplant
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Liver transplant procedures of varying complexity.
                                </p>
                            </div>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-[#e13b3f] text-white flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-xs group-hover:scale-110 transition-transform">
                            +
                        </div>
                    </div>

                    <!-- 11. Kidney Transplant -->
                    <div class="group bg-white rounded-xl p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-start justify-between cursor-pointer">
                        <div class="flex items-start gap-4 pr-3">
                            <div class="w-11 h-11 rounded-lg bg-blue-50/80 text-[#00539C] flex items-center justify-center flex-shrink-0 group-hover:bg-[#00539C] group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M7 5a4 4 0 0 0-4 4c0 4 3 8 5 9 1.5.8 3 .5 3-1.5 0-3-1-4-2-6-1-2-.5-4.5-2-5.5Z"/>
                                    <path d="M17 5a4 4 0 0 1 4 4c0 4-3 8-5 9-1.5.8-3 .5-3-1.5 0-3 1-4 2-6 1-2 .5-4.5 2-5.5Z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#00539C] transition-colors leading-snug">
                                    Kidney Transplant
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Expert renal care and transplants.
                                </p>
                            </div>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-[#e13b3f] text-white flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-xs group-hover:scale-110 transition-transform">
                            +
                        </div>
                    </div>

                    <!-- 12. Bone Marrow -->
                    <div class="group bg-white rounded-xl p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-start justify-between cursor-pointer">
                        <div class="flex items-start gap-4 pr-3">
                            <div class="w-11 h-11 rounded-lg bg-blue-50/80 text-[#00539C] flex items-center justify-center flex-shrink-0 group-hover:bg-[#00539C] group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m14 14 6 6"/>
                                    <circle cx="10" cy="10" r="7"/>
                                    <path d="M10 7a3 3 0 0 1 3 3"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#00539C] transition-colors leading-snug">
                                    Bone Marrow
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Bone marrow transplant options for matched and non-matched donors.
                                </p>
                            </div>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-[#e13b3f] text-white flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-xs group-hover:scale-110 transition-transform">
                            +
                        </div>
                    </div>

                </div>

                <!-- Bottom Action Buttons: Need Assistance? & WhatsApp Chat -->
                <div class="flex flex-wrap items-center justify-center gap-3.5 sm:gap-4 mt-10 sm:mt-12">
                    <a 
                        href="#quote-form" 
                        class="bg-[#e13b3f] hover:bg-[#cf2a2e] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-7 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center"
                    >
                        Need Assistance?
                    </a>
                    
                    <a 
                        href="https://wa.me/919999999999" 
                        target="_blank" 
                        class="bg-[#25D366] hover:bg-[#20ba5a] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-7 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center gap-2"
                    >
                        <!-- WhatsApp SVG Icon -->
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        <span>Chat</span>
                    </a>
                </div>

            </div>

        </div>
    </section>

    <!-- ==================== NETWORK OF TOP HOSPITALS ==================== -->
    <section class="py-14 sm:py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#112347] tracking-tight">
                    Network of Top Hospitals
                </h2>
                <p class="text-xs sm:text-sm text-[#5a6a85] mt-2.5 leading-relaxed">
                    We rigorously vet hospitals before adding to our panel, ensuring you receive the best care. We have in-depth knowledge of hospitals in every country we operate in.
                </p>
            </div>

            <!-- Asymmetric Hospitals Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 sm:gap-6 items-start">
                
                <!-- LEFT COLUMN: India (IN) - 4 Hospitals (2x2 Grid) -->
                <div class="lg:col-span-5 bg-gray-50/70 rounded-2xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_12px_rgba(0,0,0,0.02)] h-full flex flex-col justify-between">
                    <div>
                        <!-- Header -->
                        <div class="flex items-center justify-between mb-4 px-1">
                            <h3 class="text-base sm:text-lg font-bold text-gray-900 tracking-tight">India</h3>
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">IN</span>
                        </div>

                        <!-- 2x2 Grid -->
                        <div class="grid grid-cols-2 gap-3 sm:gap-4">
                            
                            <!-- 1. Medanta, Gurgaon -->
                            <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200">
                                <div class="aspect-[16/11] overflow-hidden bg-gray-100 relative">
                                    <img 
                                        src="https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?auto=format&fit=crop&w=400&q=80" 
                                        alt="Medanta, Gurgaon" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                        loading="lazy"
                                    >
                                </div>
                                <div class="py-2.5 px-2 text-center bg-white border-t border-gray-100">
                                    <span class="block text-[11px] sm:text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">
                                        Medanta, Gurgaon
                                    </span>
                                </div>
                            </div>

                            <!-- 2. Kokilaben, Mumbai -->
                            <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200">
                                <div class="aspect-[16/11] overflow-hidden bg-gray-100 relative">
                                    <img 
                                        src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=400&q=80" 
                                        alt="Kokilaben, Mumbai" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                        loading="lazy"
                                    >
                                </div>
                                <div class="py-2.5 px-2 text-center bg-white border-t border-gray-100">
                                    <span class="block text-[11px] sm:text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">
                                        Kokilaben, Mumbai
                                    </span>
                                </div>
                            </div>

                            <!-- 3. Indraprastha Apollo, New Delhi -->
                            <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200">
                                <div class="aspect-[16/11] overflow-hidden bg-gray-100 relative">
                                    <img 
                                        src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=400&q=80" 
                                        alt="Indraprastha Apollo, New Delhi" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                        loading="lazy"
                                    >
                                </div>
                                <div class="py-2.5 px-2 text-center bg-white border-t border-gray-100">
                                    <span class="block text-[11px] sm:text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">
                                        Indraprastha Apollo, New Delhi
                                    </span>
                                </div>
                            </div>

                            <!-- 4. Apollo, Chennai -->
                            <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200">
                                <div class="aspect-[16/11] overflow-hidden bg-gray-100 relative">
                                    <img 
                                        src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=400&q=80" 
                                        alt="Apollo, Chennai" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                        loading="lazy"
                                    >
                                </div>
                                <div class="py-2.5 px-2 text-center bg-white border-t border-gray-100">
                                    <span class="block text-[11px] sm:text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">
                                        Apollo, Chennai
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Turkey, UAE, Thailand, Germany, Egypt -->
                <div class="lg:col-span-7 space-y-5 sm:space-y-6">
                    
                    <!-- Row 1: Turkey (TR) & UAE (AE) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                        
                        <!-- Turkey -->
                        <div class="bg-gray-50/70 rounded-2xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_12px_rgba(0,0,0,0.02)]">
                            <div class="flex items-center justify-between mb-3.5 px-1">
                                <h3 class="text-base font-bold text-gray-900 tracking-tight">Turkey</h3>
                                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">TR</span>
                            </div>
                            <div class="grid grid-cols-2 gap-2.5 sm:gap-3">
                                <!-- Medical Park, Istanbul -->
                                <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                    <div class="aspect-[16/11] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1538108149393-fbbd81895907?auto=format&fit=crop&w=400&q=80" alt="Medical Park, Istanbul" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    </div>
                                    <div class="py-2 px-1 text-center bg-white border-t border-gray-100">
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">Medical Park, Istanbul</span>
                                    </div>
                                </div>
                                <!-- Memorial Hospitals, Istanbul -->
                                <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                    <div class="aspect-[16/11] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1512678080530-7760d81faba6?auto=format&fit=crop&w=400&q=80" alt="Memorial Hospitals, Istanbul" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    </div>
                                    <div class="py-2 px-1 text-center bg-white border-t border-gray-100">
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">Memorial Hospitals, Istanbul</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- UAE -->
                        <div class="bg-gray-50/70 rounded-2xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_12px_rgba(0,0,0,0.02)]">
                            <div class="flex items-center justify-between mb-3.5 px-1">
                                <h3 class="text-base font-bold text-gray-900 tracking-tight">UAE</h3>
                                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">AE</span>
                            </div>
                            <div class="grid grid-cols-2 gap-2.5 sm:gap-3">
                                <!-- Burjeel, Abu Dhabi -->
                                <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                    <div class="aspect-[16/11] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=400&q=80" alt="Burjeel, Abu Dhabi" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    </div>
                                    <div class="py-2 px-1 text-center bg-white border-t border-gray-100">
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">Burjeel, Abu Dhabi</span>
                                    </div>
                                </div>
                                <!-- Saudi German, Dubai -->
                                <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                    <div class="aspect-[16/11] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=400&q=80" alt="Saudi German, Dubai" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    </div>
                                    <div class="py-2 px-1 text-center bg-white border-t border-gray-100">
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">Saudi German, Dubai</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Row 2: Thailand (TH) & Germany (DE) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                        
                        <!-- Thailand -->
                        <div class="bg-gray-50/70 rounded-2xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_12px_rgba(0,0,0,0.02)]">
                            <div class="flex items-center justify-between mb-3.5 px-1">
                                <h3 class="text-base font-bold text-gray-900 tracking-tight">Thailand</h3>
                                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">TH</span>
                            </div>
                            <div class="grid grid-cols-2 gap-2.5 sm:gap-3">
                                <!-- Bumrungrad, Bangkok -->
                                <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                    <div class="aspect-[16/11] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?auto=format&fit=crop&w=400&q=80" alt="Bumrungrad, Bangkok" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    </div>
                                    <div class="py-2 px-1 text-center bg-white border-t border-gray-100">
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">Bumrungrad, Bangkok</span>
                                    </div>
                                </div>
                                <!-- Bangkok Hospital -->
                                <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                    <div class="aspect-[16/11] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=400&q=80" alt="Bangkok Hospital" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    </div>
                                    <div class="py-2 px-1 text-center bg-white border-t border-gray-100">
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">Bangkok Hospital</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Germany -->
                        <div class="bg-gray-50/70 rounded-2xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_12px_rgba(0,0,0,0.02)]">
                            <div class="flex items-center justify-between mb-3.5 px-1">
                                <h3 class="text-base font-bold text-gray-900 tracking-tight">Germany</h3>
                                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">DE</span>
                            </div>
                            <div class="grid grid-cols-2 gap-2.5 sm:gap-3">
                                <!-- Charite, Berlin -->
                                <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                    <div class="aspect-[16/11] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=400&q=80" alt="Charite, Berlin" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    </div>
                                    <div class="py-2 px-1 text-center bg-white border-t border-gray-100">
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">Charite, Berlin</span>
                                    </div>
                                </div>
                                <!-- Heidelberg University -->
                                <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                    <div class="aspect-[16/11] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=400&q=80" alt="Heidelberg University" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    </div>
                                    <div class="py-2 px-1 text-center bg-white border-t border-gray-100">
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">Heidelberg University</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Row 3: Egypt (EG) - Full Width across Right Column -->
                    <div class="bg-gray-50/70 rounded-2xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_12px_rgba(0,0,0,0.02)]">
                        <div class="flex items-center justify-between mb-3.5 px-1">
                            <h3 class="text-base font-bold text-gray-900 tracking-tight">Egypt</h3>
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">EG</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                            <!-- Arab Contractors Medical Centre, Cairo -->
                            <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                <div class="aspect-[21/9] sm:aspect-[16/8] overflow-hidden bg-gray-100">
                                    <img src="https://images.unsplash.com/photo-1512678080530-7760d81faba6?auto=format&fit=crop&w=500&q=80" alt="Arab Contractors Medical Centre, Cairo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                </div>
                                <div class="py-2.5 px-2 text-center bg-white border-t border-gray-100">
                                    <span class="block text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">Arab Contractors Medical Centre, Cairo</span>
                                </div>
                            </div>
                            <!-- As-Salam International Hospital, Cairo -->
                            <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                <div class="aspect-[21/9] sm:aspect-[16/8] overflow-hidden bg-gray-100">
                                    <img src="https://images.unsplash.com/photo-1538108149393-fbbd81895907?auto=format&fit=crop&w=500&q=80" alt="As-Salam International Hospital, Cairo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                </div>
                                <div class="py-2.5 px-2 text-center bg-white border-t border-gray-100">
                                    <span class="block text-xs font-bold text-gray-800 group-hover:text-[#00539C] transition-colors line-clamp-1">As-Salam International Hospital, Cairo</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Accreditations Strip -->
            <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-4 mt-10 sm:mt-12 text-center">
                <!-- JCI Gold Medal Emblem -->
                <div class="w-6 h-6 rounded-full bg-gradient-to-tr from-amber-500 to-yellow-300 p-0.5 shadow-xs flex items-center justify-center text-white" title="JCI Accredited">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                </div>

                <!-- NABH Circular Seal -->
                <div class="w-6 h-6 rounded-full bg-blue-600 p-0.5 shadow-xs flex items-center justify-center text-white font-bold text-[9px] border-2 border-red-500" title="NABH">
                    <span>N</span>
                </div>

                <!-- ESMO Logo -->
                <div class="bg-emerald-700 text-white font-black text-[9px] tracking-tighter px-1.5 py-0.5 rounded shadow-xs" title="ESMO">
                    ESMO
                </div>

                <!-- Medical Seal -->
                <div class="w-6 h-6 rounded-full bg-teal-50 border border-teal-300 text-teal-700 flex items-center justify-center text-[9px] font-bold shadow-xs" title="QHA Trent">
                    <svg class="w-3.5 h-3.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path d="m9 12 2 2 4-4" stroke-width="2"/></svg>
                </div>

                <!-- ISO Seal -->
                <div class="bg-[#00539C] text-white font-bold text-[9px] px-1.5 py-0.5 rounded shadow-xs" title="ISO 9001">
                    ISO
                </div>

                <span class="text-xs text-gray-500 font-medium ml-1">
                    Hospitals with highest accreditation
                </span>
            </div>

            <!-- Bottom CTAs -->
            <div class="flex flex-wrap items-center justify-center gap-3.5 sm:gap-4 mt-8 sm:mt-10">
                <a 
                    href="#quote-form" 
                    class="bg-[#e13b3f] hover:bg-[#cf2a2e] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-7 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center"
                >
                    Contact Hospital
                </a>
                
                <a 
                    href="https://wa.me/919999999999" 
                    target="_blank" 
                    class="bg-[#25D366] hover:bg-[#20ba5a] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-7 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center gap-2"
                >
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>Chat</span>
                </a>
            </div>

        </div>
    </section>

    <!-- ==================== LOWEST QUOTES ASSURED ==================== -->
    <section class="py-14 sm:py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#00539C] tracking-tight">
                    Lowest Quotes Assured
                </h2>
                <p class="text-xs sm:text-sm text-[#5a6a85] mt-2.5 max-w-2xl mx-auto leading-relaxed">
                    We constantly negotiate better prices and alternatives without compromising treatment quality. Our prices are consistently lower.
                </p>
            </div>

            <!-- Quotes 4-Column Grid (12 Items) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                
                <!-- 1. Knee Replacement -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/RHEUMATOLOGY-51.svg') }}" alt="Knee Replacement" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Knee Replacement
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$4,000</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#e13b3f] hover:text-[#c92a2e] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 2. Hip Replacement -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Hip-Replecement.svg') }}" alt="Hip Replacement" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Hip Replacement
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$5,500</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#e13b3f] hover:text-[#c92a2e] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 3. Brain Tumor -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Brain-Tumor.svg') }}" alt="Brain Tumor" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Brain Tumor
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$5,000</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#e13b3f] hover:text-[#c92a2e] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 4. Heart Bypass Surgery -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Heart-Bypass-Surgery.svg') }}" alt="Heart Bypass Surgery" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Heart Bypass Surgery
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$4,500</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#e13b3f] hover:text-[#c92a2e] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 5. Valve Replacement -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Valve-Replacement.svg') }}" alt="Valve Replacement" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Valve Replacement
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$9,500</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#e13b3f] hover:text-[#c92a2e] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 6. Breast Cancer -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Breast-Cancer.svg') }}" alt="Breast Cancer" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Breast Cancer
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$5,000</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#e13b3f] hover:text-[#c92a2e] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 7. Lung Cancer -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Lung-Cancer.svg') }}" alt="Lung Cancer" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Lung Cancer
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$5,500</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#e13b3f] hover:text-[#c92a2e] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 8. Rhinoplasty -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Rhinoplasty.svg') }}" alt="Rhinoplasty" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Rhinoplasty
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$1,800</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#e13b3f] hover:text-[#c92a2e] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 9. Breast Implants -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Breast-Cancer (1).svg') }}" alt="Breast Implants" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Breast Implants
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$2,750</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#e13b3f] hover:text-[#c92a2e] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 10. Hair Transplant -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Hair-Transpalnt.svg') }}" alt="Hair Transplant" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Hair Transplant
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$1,400</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#e13b3f] hover:text-[#c92a2e] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 11. Cervical Cancer -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Cervical-Cancer.svg') }}" alt="Cervical Cancer" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Cervical Cancer
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$4,500</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#e13b3f] hover:text-[#c92a2e] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 12. Hysterectomy -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Hysterectomy.svg') }}" alt="Hysterectomy" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Hysterectomy
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$3,000</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#e13b3f] hover:text-[#c92a2e] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bottom Center Actions -->
            <div class="mt-12 sm:mt-14 text-center">
                <p class="text-xs sm:text-sm text-gray-500 font-medium mb-3.5">
                    Discover what we offer!
                </p>
                <div class="flex flex-wrap items-center justify-center gap-3.5 sm:gap-4">
                    <a 
                        href="#quote-form" 
                        class="bg-[#e13b3f] hover:bg-[#cf2a2e] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-7 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center"
                    >
                        Get Quote
                    </a>
                    
                    <a 
                        href="https://wa.me/919999999999" 
                        target="_blank" 
                        class="bg-[#25D366] hover:bg-[#20ba5a] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-7 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center gap-2"
                    >
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        <span>Chat</span>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- ==================== HOW DO WE WORK? ==================== -->
    <section class="py-14 sm:py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#112347] tracking-tight">
                    How do we work?
                </h2>
            </div>

            <!-- Two Columns: Left 4 Steps & CTA, Right Video Card -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                
                <!-- LEFT COLUMN: 4 Workflow Steps & Get Started Button (6 cols) -->
                <div class="lg:col-span-6 flex flex-col justify-between h-full">
                    
                    <!-- 2x2 Steps Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 sm:gap-x-8 gap-y-9 sm:gap-y-12">
                        
                        <!-- Step 1: Contact Us -->
                        <div class="flex flex-col items-center text-center group">
                            <!-- Circular Icon -->
                            <div class="w-14 h-14 rounded-full bg-[#f0f7fe] border border-blue-100/80 flex items-center justify-center text-[#00539C] group-hover:bg-[#00539C] group-hover:text-white transition-all duration-200 shadow-xs">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                    <path d="M14 2a6 6 0 0 1 6 6"/>
                                    <path d="M14 6a2 2 0 0 1 2 2"/>
                                </svg>
                            </div>
                            <!-- Description -->
                            <p class="text-xs sm:text-[13px] text-gray-500 text-center leading-relaxed mt-3.5 max-w-[210px] mx-auto">
                                Contact us, share your case details and our team will get in touch with you.
                            </p>
                        </div>

                        <!-- Step 2: Medical Opinion & Estimate -->
                        <div class="flex flex-col items-center text-center group">
                            <!-- Circular Icon -->
                            <div class="w-14 h-14 rounded-full bg-[#f0f7fe] border border-blue-100/80 flex items-center justify-center text-[#00539C] group-hover:bg-[#00539C] group-hover:text-white transition-all duration-200 shadow-xs">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                    <line x1="16" y1="13" x2="8" y2="13"/>
                                    <line x1="16" y1="17" x2="8" y2="17"/>
                                    <polyline points="10 9 9 9 8 9"/>
                                    <circle cx="12" cy="13" r="1" fill="currentColor"/>
                                </svg>
                            </div>
                            <!-- Description -->
                            <p class="text-xs sm:text-[13px] text-gray-500 text-center leading-relaxed mt-3.5 max-w-[210px] mx-auto">
                                Receive medical opinion and cost estimate within 48 Hours.
                            </p>
                        </div>

                        <!-- Step 3: Book Flights & Airport Reception -->
                        <div class="flex flex-col items-center text-center group">
                            <!-- Circular Icon -->
                            <div class="w-14 h-14 rounded-full bg-[#f0f7fe] border border-blue-100/80 flex items-center justify-center text-[#00539C] group-hover:bg-[#00539C] group-hover:text-white transition-all duration-200 shadow-xs">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="16" rx="2"/>
                                    <path d="M3 10h18"/>
                                    <path d="m9 15 3-3 3 3"/>
                                    <path d="M12 12v6"/>
                                    <circle cx="18" cy="16" r="2.5" fill="#00539C" class="fill-[#00539C] stroke-white"/>
                                    <path d="m17 16 1 1 1.5-1.5" stroke="white" stroke-width="1.2"/>
                                </svg>
                            </div>
                            <!-- Description -->
                            <p class="text-xs sm:text-[13px] text-gray-500 text-center leading-relaxed mt-3.5 max-w-[210px] mx-auto">
                                Book flights and get received by our team at the airport.
                            </p>
                        </div>

                        <!-- Step 4: Treatment & Follow Ups -->
                        <div class="flex flex-col items-center text-center group">
                            <!-- Circular Icon -->
                            <div class="w-14 h-14 rounded-full bg-[#f0f7fe] border border-blue-100/80 flex items-center justify-center text-[#00539C] group-hover:bg-[#00539C] group-hover:text-white transition-all duration-200 shadow-xs">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 11l3 3L22 4"/>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                                    <path d="M7 16h6"/>
                                </svg>
                            </div>
                            <!-- Description -->
                            <p class="text-xs sm:text-[13px] text-gray-500 text-center leading-relaxed mt-3.5 max-w-[210px] mx-auto">
                                Get treated and fly back. We stay in touch with you for follow ups.
                            </p>
                        </div>

                    </div>

                    <!-- Get Started CTA Button -->
                    <div class="mt-9 sm:mt-11 text-center">
                        <a 
                            href="#quote-form" 
                            class="bg-[#e13b3f] hover:bg-[#cf2a2e] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-8 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center"
                        >
                            Get Started
                        </a>
                    </div>

                </div>

                <!-- RIGHT COLUMN: Video Player Card (6 cols) -->
                <div class="lg:col-span-6">
                    <div class="relative w-full aspect-[16/10] sm:aspect-[16/9.5] rounded-2xl sm:rounded-3xl overflow-hidden shadow-lg border border-gray-200/80 bg-gray-900 group">
                        <iframe 
                            class="w-full h-full object-cover" 
                            src="https://www.youtube.com/embed/XZtyGhf5LJ8" 
                            title="Medical Treatment Abroad - Vaidam Health" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen 
                            loading="lazy"
                        ></iframe>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ==================== OUR SERVICES COVER EVERY NEED ==================== -->
    <section class="py-14 sm:py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#112347] tracking-tight">
                    Our Services Cover Every Need
                </h2>
                <p class="text-xs sm:text-sm text-[#5a6a85] mt-2.5 max-w-2xl mx-auto leading-relaxed">
                    You will be assisted by a dedicated case manager from our team. List of services you can expect from us, for FREE!
                </p>
            </div>

            <!-- 9 Services Grid (3 Columns) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                
                <!-- 1. Medical Opinion -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#00539C] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10 9 9 9 8 9"/>
                            <path d="M10 13l2 2 4-4" stroke="#e13b3f" stroke-width="2"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Medical Opinion
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Expert opinions and cost estimates.
                        </p>
                    </div>
                </div>

                <!-- 2. Pre-Travel Consultations -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#00539C] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M22 6c0 1.66-1.34 3-3 3h-.5L17 11v-2c-1.66 0-3-1.34-3-3s1.34-3 3-3h2c1.66 0 3 1.34 3 3z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Pre-Travel Consultations
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Understand your procedure before traveling.
                        </p>
                    </div>
                </div>

                <!-- 3. Visa Assistance -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#00539C] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="5" y="3" width="14" height="18" rx="2"/>
                            <line x1="9" y1="7" x2="15" y2="7"/>
                            <circle cx="12" cy="13" r="3"/>
                            <path d="M12 11v4M10 13h4" stroke="#e13b3f" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Visa Assistance
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Complete medical visa assistance.
                        </p>
                    </div>
                </div>

                <!-- 4. Money Exchange -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#00539C] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="8" cy="8" r="5"/>
                            <path d="M8 6v4M7 7h2"/>
                            <circle cx="16" cy="16" r="5"/>
                            <path d="M15 15h2a1 1 0 0 1 0 2h-2v-4h2"/>
                            <path d="M18 7l-2-2m0 0l-2 2m2-2v4"/>
                            <path d="M6 17l2 2m0 0l2-2m-2 2v-4"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Money Exchange
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Convenient currency exchange services in your city.
                        </p>
                    </div>
                </div>

                <!-- 5. Interpreters -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#00539C] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m5 8 6 6"/>
                            <path d="m4 14 6-6 2-3"/>
                            <path d="M2 5h12"/>
                            <path d="M7 2h1"/>
                            <path d="m22 22-5-10-5 10"/>
                            <path d="M14 18h6"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Interpreters
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Fluent professionals to break language barriers at every step.
                        </p>
                    </div>
                </div>

                <!-- 6. Transportation -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#00539C] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="1" y="3" width="15" height="13" rx="2"/>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
                            <circle cx="5.5" cy="18.5" r="2.5"/>
                            <circle cx="18.5" cy="18.5" r="2.5"/>
                            <path d="M7 8h4M9 6v4" stroke="#e13b3f" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Transportation
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Complimentary airport transfers.
                        </p>
                    </div>
                </div>

                <!-- 7. Accommodation Options -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#00539C] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 21h18"/>
                            <path d="M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16"/>
                            <path d="M9 7h1M9 11h1M9 15h1M14 7h1M14 11h1M14 15h1"/>
                            <path d="M10 21v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Accommodation Options
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Near the hospital and matching your budget and needs.
                        </p>
                    </div>
                </div>

                <!-- 8. Hospital Coordination -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#00539C] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                            <rect x="8" y="2" width="8" height="4" rx="1"/>
                            <path d="M9 14h6M9 18h4"/>
                            <path d="M12 8v4M10 10h4" stroke="#e13b3f" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Hospital Coordination
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Full coordination of medical logistics.
                        </p>
                    </div>
                </div>

                <!-- 9. Private Duty Nursing -->
                <div class="bg-[#f0f7fe] hover:bg-[#e5f1fc] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#00539C] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            <path d="M12 8v6M9 11h6" stroke="#e13b3f" stroke-width="1.8"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#00539C] transition-colors">
                            Private Duty Nursing
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Arrangements of private nursing care as needed.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Bottom Action Buttons: Get Quote & WhatsApp Chat -->
            <div class="flex flex-wrap items-center justify-center gap-3.5 sm:gap-4 mt-10 sm:mt-12">
                <a 
                    href="#quote-form" 
                    class="bg-[#e13b3f] hover:bg-[#cf2a2e] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-7 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center"
                >
                    Get Quote
                </a>
                
                <a 
                    href="https://wa.me/919999999999" 
                    target="_blank" 
                    class="bg-[#25D366] hover:bg-[#20ba5a] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-7 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center gap-2"
                >
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>Chat</span>
                </a>
            </div>

        </div>
    </section>

    <!-- ==================== VAIDAM IN NEWS ==================== -->
    <section class="py-14 sm:py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header with Left Title and Right Nav Controls -->
            <div class="flex items-center justify-between mb-8 sm:mb-10">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#112347] tracking-tight">
                    Vaidam In News
                </h2>
                
                <!-- Slider Nav Arrows -->
                <div class="flex items-center gap-2">
                    <button 
                        type="button" 
                        id="news-slider-prev" 
                        class="w-9 h-9 rounded-full border border-gray-300 hover:border-[#00539C] text-gray-500 hover:text-[#00539C] flex items-center justify-center transition-all bg-white shadow-xs active:scale-95"
                        aria-label="Previous News"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button 
                        type="button" 
                        id="news-slider-next" 
                        class="w-9 h-9 rounded-full border border-gray-300 hover:border-[#00539C] text-gray-500 hover:text-[#00539C] flex items-center justify-center transition-all bg-white shadow-xs active:scale-95"
                        aria-label="Next News"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

            <!-- News Cards Container / Carousel -->
            <div 
                id="news-cards-container" 
                class="flex gap-4 sm:gap-5 overflow-x-auto pb-4 pt-1 snap-x scroll-smooth"
                style="scrollbar-width: none; -ms-overflow-style: none;"
            >
                
                <!-- Card 1: BioSpectrum -->
                <div class="flex-shrink-0 w-[270px] sm:w-[290px] lg:w-[calc(20%-16px)] min-w-[240px] snap-start bg-white rounded-2xl overflow-hidden border border-blue-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex flex-col justify-between group">
                    <div>
                        <!-- Image with Overlay -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                            <img 
                                src="https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?auto=format&fit=crop&w=500&q=80" 
                                alt="BioSpectrum Story" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                loading="lazy"
                            >
                            <!-- Logo Badge Top-Left -->
                            <div class="absolute top-2.5 left-2.5 bg-white px-2 py-0.5 rounded shadow-xs border border-gray-100 flex items-center gap-1">
                                <span class="text-[9px] font-black tracking-tight text-[#00539C]">Bio<span class="text-amber-500">Spectrum</span></span>
                            </div>
                            <!-- Angled Wave Banner at Bottom -->
                            <div class="absolute bottom-0 inset-x-0 h-8 flex items-end">
                                <svg viewBox="0 0 400 50" preserveAspectRatio="none" class="absolute inset-0 w-full h-full text-[#00539C] fill-current">
                                    <path d="M0,25 Q150,50 300,20 Q360,5 400,0 L400,50 L0,50 Z"></path>
                                </svg>
                                <span class="relative z-10 text-[10px] font-extrabold uppercase tracking-wider text-white pl-3 pb-1 flex items-center gap-1.5">
                                    News Article
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3.5 sm:p-4">
                            <h3 class="text-xs font-bold text-[#00539C] hover:underline leading-snug line-clamp-3">
                                BioSpectrumIndia: Vaidam Health's CancerRounds Acquisition Featured in a Leading Life Sciences Industry Story
                            </h3>
                            <p class="text-[11px] text-gray-500 mt-2 line-clamp-3 leading-relaxed">
                                Vaidam Health's CancerRounds Acquisition Featured in BioSpectrum Industry Story
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Financial Express -->
                <div class="flex-shrink-0 w-[270px] sm:w-[290px] lg:w-[calc(20%-16px)] min-w-[240px] snap-start bg-white rounded-2xl overflow-hidden border border-blue-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex flex-col justify-between group">
                    <div>
                        <!-- Image with Overlay -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                            <img 
                                src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=500&q=80" 
                                alt="Financial Express Story" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                loading="lazy"
                            >
                            <!-- Logo Badge Top-Left -->
                            <div class="absolute top-2.5 left-2.5 bg-white px-2 py-0.5 rounded shadow-xs border border-gray-100 flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>
                                <span class="text-[8px] font-extrabold tracking-tight text-gray-800 uppercase">Financial Express</span>
                            </div>
                            <!-- Angled Wave Banner at Bottom -->
                            <div class="absolute bottom-0 inset-x-0 h-8 flex items-end">
                                <svg viewBox="0 0 400 50" preserveAspectRatio="none" class="absolute inset-0 w-full h-full text-[#00539C] fill-current">
                                    <path d="M0,25 Q150,50 300,20 Q360,5 400,0 L400,50 L0,50 Z"></path>
                                </svg>
                                <span class="relative z-10 text-[10px] font-extrabold uppercase tracking-wider text-white pl-3 pb-1 flex items-center gap-1.5">
                                    News Article
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3.5 sm:p-4">
                            <h3 class="text-xs font-bold text-[#00539C] hover:underline leading-snug line-clamp-3">
                                Financial Express | Medical Tourism Startups Await Their Funding Cure
                            </h3>
                            <p class="text-[11px] text-gray-500 mt-2 line-clamp-3 leading-relaxed">
                                India's Medical Tourism Boom: Can Startups Find Their Funding Cure?
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Business Today -->
                <div class="flex-shrink-0 w-[270px] sm:w-[290px] lg:w-[calc(20%-16px)] min-w-[240px] snap-start bg-white rounded-2xl overflow-hidden border border-blue-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex flex-col justify-between group">
                    <div>
                        <!-- Image with Overlay -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                            <img 
                                src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?auto=format&fit=crop&w=500&q=80" 
                                alt="Business Today Story" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                loading="lazy"
                            >
                            <!-- Logo Badge Top-Left -->
                            <div class="absolute top-2.5 left-2.5 bg-white px-2 py-0.5 rounded shadow-xs border border-gray-100 flex items-center gap-1">
                                <span class="bg-blue-600 text-white font-bold text-[8px] px-1 rounded-xs">bt</span>
                                <span class="text-[8px] font-bold text-gray-800">Business Today</span>
                            </div>
                            <!-- Angled Wave Banner at Bottom -->
                            <div class="absolute bottom-0 inset-x-0 h-8 flex items-end">
                                <svg viewBox="0 0 400 50" preserveAspectRatio="none" class="absolute inset-0 w-full h-full text-[#00539C] fill-current">
                                    <path d="M0,25 Q150,50 300,20 Q360,5 400,0 L400,50 L0,50 Z"></path>
                                </svg>
                                <span class="relative z-10 text-[10px] font-extrabold uppercase tracking-wider text-white pl-3 pb-1 flex items-center gap-1.5">
                                    News Article
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3.5 sm:p-4">
                            <h3 class="text-xs font-bold text-[#00539C] hover:underline leading-snug line-clamp-3">
                                Business Today | Bridging Language Barriers to Strengthen India's Medical Tourism Ecosystem
                            </h3>
                            <p class="text-[11px] text-gray-500 mt-2 line-clamp-3 leading-relaxed">
                                Why Language Translators Are the Key to India's Medical Tourism Ecosystem
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Forbes -->
                <div class="flex-shrink-0 w-[270px] sm:w-[290px] lg:w-[calc(20%-16px)] min-w-[240px] snap-start bg-white rounded-2xl overflow-hidden border border-blue-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex flex-col justify-between group">
                    <div>
                        <!-- Image with Overlay -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                            <img 
                                src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=500&q=80" 
                                alt="Forbes Story" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                loading="lazy"
                            >
                            <!-- Logo Badge Top-Left -->
                            <div class="absolute top-2.5 left-2.5 bg-white px-2 py-0.5 rounded shadow-xs border border-gray-100 flex items-center gap-1">
                                <span class="text-[9px] font-serif font-black tracking-tight text-gray-900">Forbes</span>
                            </div>
                            <!-- Angled Wave Banner at Bottom -->
                            <div class="absolute bottom-0 inset-x-0 h-8 flex items-end">
                                <svg viewBox="0 0 400 50" preserveAspectRatio="none" class="absolute inset-0 w-full h-full text-[#00539C] fill-current">
                                    <path d="M0,25 Q150,50 300,20 Q360,5 400,0 L400,50 L0,50 Z"></path>
                                </svg>
                                <span class="relative z-10 text-[10px] font-extrabold uppercase tracking-wider text-white pl-3 pb-1 flex items-center gap-1.5">
                                    News Article
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3.5 sm:p-4">
                            <h3 class="text-xs font-bold text-[#00539C] hover:underline leading-snug line-clamp-3">
                                Forbes India: Influential Leaders Creating a Lasting Impact in India
                            </h3>
                            <p class="text-[11px] text-gray-500 mt-2 line-clamp-3 leading-relaxed">
                                Pankaj Chandna: Driving Innovation and Creating a Lasting Impact in India
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 5: CII -->
                <div class="flex-shrink-0 w-[270px] sm:w-[290px] lg:w-[calc(20%-16px)] min-w-[240px] snap-start bg-white rounded-2xl overflow-hidden border border-blue-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex flex-col justify-between group">
                    <div>
                        <!-- Image with Overlay -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                            <img 
                                src="https://images.unsplash.com/photo-1526256262350-7da7584cf5eb?auto=format&fit=crop&w=500&q=80" 
                                alt="CII Story" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                loading="lazy"
                            >
                            <!-- Logo Badge Top-Left -->
                            <div class="absolute top-2.5 left-2.5 bg-white px-2 py-0.5 rounded shadow-xs border border-gray-100 flex items-center gap-1">
                                <span class="text-[9px] font-black tracking-tight text-[#00539C]">CII</span>
                            </div>
                            <!-- Angled Wave Banner at Bottom -->
                            <div class="absolute bottom-0 inset-x-0 h-8 flex items-end">
                                <svg viewBox="0 0 400 50" preserveAspectRatio="none" class="absolute inset-0 w-full h-full text-[#00539C] fill-current">
                                    <path d="M0,25 Q150,50 300,20 Q360,5 400,0 L400,50 L0,50 Z"></path>
                                </svg>
                                <span class="relative z-10 text-[10px] font-extrabold uppercase tracking-wider text-white pl-3 pb-1 flex items-center gap-1.5">
                                    News Article
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3.5 sm:p-4">
                            <h3 class="text-xs font-bold text-[#00539C] hover:underline leading-snug line-clamp-3">
                                Exploring AI, Digital Innovation and the Future of Cross-Border Healthcare
                            </h3>
                            <p class="text-[11px] text-gray-500 mt-2 line-clamp-3 leading-relaxed">
                                Pankaj Chandna Highlights Vaidam Health's Vision at the 5th CII Digital Health Summit
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Dots Indicator -->
            <div class="flex items-center justify-center gap-1.5 mt-6 sm:mt-8">
                <span class="w-2 h-2 rounded-full bg-[#00539C]"></span>
                <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                <span class="w-2 h-2 rounded-full bg-gray-300"></span>
            </div>

        </div>
    </section>

    <!-- ==================== UPDATES & EVENTS / LATEST BLOGS ==================== -->
    <section class="py-14 sm:py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
                
                <!-- LEFT COLUMN: Updates and Events (5 cols) -->
                <div class="lg:col-span-5 flex flex-col justify-between h-full">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight mb-5 sm:mb-6">
                        Updates and Events
                    </h2>

                    <!-- Event Banner Card -->
                    <div class="relative bg-white rounded-2xl overflow-hidden border border-gray-200/90 shadow-md flex flex-col">
                        
                        <!-- Top Banner with Blue Background -->
                        <div class="bg-gradient-to-b from-[#0a4b8f] to-[#003875] text-white p-4 sm:p-5 relative">
                            
                            <!-- Header with Brand on Left and Hospital Logos on Right -->
                            <div class="flex items-center justify-between gap-2 pb-3 border-b border-blue-400/30">
                                <div>
                                    <span class="text-base sm:text-lg font-black tracking-tight text-white">Vaidam<span class="text-blue-300 font-normal">.com</span></span>
                                    <span class="block text-[8px] uppercase tracking-wider text-blue-200">For Medical Procedures</span>
                                </div>
                                <div class="flex items-center gap-1.5 sm:gap-2 bg-white/95 px-2 py-1 rounded shadow-xs">
                                    <span class="text-[9px] font-bold text-red-600">Health+</span>
                                    <span class="text-[9px] font-bold text-blue-800">ZENS</span>
                                    <span class="text-[9px] font-bold text-gray-900">BLK-MAX</span>
                                </div>
                            </div>

                            <!-- Main Event Headline -->
                            <h3 class="text-sm sm:text-base font-extrabold text-center text-white mt-3.5 leading-snug">
                                Consult Leading Kidney &amp; Urinary Doctor from India in Fiji
                            </h3>

                            <!-- Event Locations & Red CTA -->
                            <div class="grid grid-cols-1 sm:grid-cols-12 gap-2.5 mt-3.5 items-center">
                                <div class="sm:col-span-7 space-y-1.5">
                                    <!-- Location 1 -->
                                    <div class="flex items-start gap-1.5 text-[10px] text-blue-100">
                                        <svg class="w-3.5 h-3.5 text-red-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
                                        <span>Zens Medical Centre, Nadi Town, Fiji<br><strong class="text-white">2nd November 2026 (11:00 AM - 6:00 PM)</strong></span>
                                    </div>
                                    <!-- Location 2 -->
                                    <div class="flex items-start gap-1.5 text-[10px] text-blue-100">
                                        <svg class="w-3.5 h-3.5 text-red-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
                                        <span>Health Plus Diagnostics, Suva, Fiji<br><strong class="text-white">3rd November 2026 (10:00 AM - 6:00 PM)</strong></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-5 text-center">
                                    <a href="#quote-form" class="inline-block bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-[11px] font-bold px-3 py-2 rounded-lg shadow-sm hover:shadow transition-all leading-tight">
                                        For Appointment and Details Click here »
                                    </a>
                                </div>
                            </div>

                            <!-- Slider Overlay Arrow Left -->
                            <button type="button" class="absolute left-2 top-1/2 -translate-y-1/2 w-7 h-7 rounded-full bg-black/40 hover:bg-black/60 text-white flex items-center justify-center transition-all" aria-label="Previous event">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <!-- Slider Overlay Arrow Right -->
                            <button type="button" class="absolute right-2 top-1/2 -translate-y-1/2 w-7 h-7 rounded-full bg-black/40 hover:bg-black/60 text-white flex items-center justify-center transition-all" aria-label="Next event">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                            </button>

                        </div>

                        <!-- Bottom Doctor Profile with Flags Backdrop -->
                        <div class="relative bg-white pt-6 pb-4 px-4 text-center">
                            <!-- Background Flag Ribbons Effect -->
                            <div class="absolute inset-x-0 top-0 h-7 opacity-25 bg-repeat-x" style="background-image: repeating-linear-gradient(90deg, #68BFE5 0px, #68BFE5 35px, #FFFFFF 35px, #FFFFFF 45px, #C8102E 45px, #C8102E 65px);"></div>
                            
                            <!-- Doctor Circular Portrait -->
                            <div class="relative -mt-11 mx-auto w-22 h-22 rounded-full border-4 border-white shadow-md overflow-hidden bg-gray-100 ring-2 ring-blue-500">
                                <img 
                                    src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=300&q=80" 
                                    alt="Dr. Yajvender Pratap Singh Rana" 
                                    class="w-full h-full object-cover"
                                    loading="lazy"
                                >
                            </div>

                            <!-- Doctor Name & Designation -->
                            <h4 class="text-sm font-extrabold text-gray-900 mt-2">
                                Dr. Yajvender Pratap Singh Rana
                            </h4>
                            <p class="text-[11px] text-gray-500 font-medium mt-0.5 max-w-sm mx-auto leading-relaxed">
                                Senior Director - Urology, Uro-Oncology, Andrology and Kidney Transplant
                            </p>
                        </div>

                    </div>

                    <!-- Pagination Dots -->
                    <div class="flex items-center justify-center gap-1.5 mt-4">
                        <span class="w-2 h-2 rounded-full bg-[#00539C]"></span>
                        <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                        <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                    </div>

                </div>

                <!-- RIGHT COLUMN: Latest Blogs (7 cols) -->
                <div class="lg:col-span-7 flex flex-col justify-between h-full">
                    
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight mb-5 sm:mb-6">
                        Latest Blogs
                    </h2>

                    <!-- 2x2 Blogs Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        
                        <!-- Blog 1 -->
                        <div class="bg-[#f0f7fe] hover:bg-[#e6f2fc] rounded-2xl p-3.5 border border-blue-100/70 hover:border-blue-300 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                            <div class="w-18 h-18 sm:w-20 sm:h-20 rounded-xl overflow-hidden bg-white flex-shrink-0 shadow-xs">
                                <img 
                                    src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=200&q=80" 
                                    alt="Bladder Cancer Treatment" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    loading="lazy"
                                >
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-[10px] font-semibold text-[#00539C] block">Published On: 06 Oct 2026</span>
                                <h3 class="text-xs sm:text-[13px] font-bold text-[#112347] group-hover:text-[#00539C] transition-colors leading-snug mt-1 line-clamp-2">
                                    Bladder Cancer Treatment in Germany | Options &amp; Cost
                                </h3>
                            </div>
                        </div>

                        <!-- Blog 2 -->
                        <div class="bg-[#f0f7fe] hover:bg-[#e6f2fc] rounded-2xl p-3.5 border border-blue-100/70 hover:border-blue-300 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                            <div class="w-18 h-18 sm:w-20 sm:h-20 rounded-xl overflow-hidden bg-white flex-shrink-0 shadow-xs">
                                <img 
                                    src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=200&q=80" 
                                    alt="Radiotherapy in Germany" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    loading="lazy"
                                >
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-[10px] font-semibold text-[#00539C] block">Published On: 06 Oct 2026</span>
                                <h3 class="text-xs sm:text-[13px] font-bold text-[#112347] group-hover:text-[#00539C] transition-colors leading-snug mt-1 line-clamp-2">
                                    Radiotherapy in Germany | Techniques, Duration &amp; Cost
                                </h3>
                            </div>
                        </div>

                        <!-- Blog 3 -->
                        <div class="bg-[#f0f7fe] hover:bg-[#e6f2fc] rounded-2xl p-3.5 border border-blue-100/70 hover:border-blue-300 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                            <div class="w-18 h-18 sm:w-20 sm:h-20 rounded-xl overflow-hidden bg-white flex-shrink-0 shadow-xs">
                                <img 
                                    src="https://images.unsplash.com/photo-1530497610245-94d3c16cda28?auto=format&fit=crop&w=200&q=80" 
                                    alt="Pancreatic Cancer Treatment" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    loading="lazy"
                                >
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-[10px] font-semibold text-[#00539C] block">Published On: 06 Oct 2026</span>
                                <h3 class="text-xs sm:text-[13px] font-bold text-[#112347] group-hover:text-[#00539C] transition-colors leading-snug mt-1 line-clamp-2">
                                    Pancreatic Cancer Treatment in Germany | Surgery &amp; Cost
                                </h3>
                            </div>
                        </div>

                        <!-- Blog 4 -->
                        <div class="bg-[#f0f7fe] hover:bg-[#e6f2fc] rounded-2xl p-3.5 border border-blue-100/70 hover:border-blue-300 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                            <div class="w-18 h-18 sm:w-20 sm:h-20 rounded-xl overflow-hidden bg-white flex-shrink-0 shadow-xs">
                                <img 
                                    src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=200&q=80" 
                                    alt="CAR-T Cell Therapy" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    loading="lazy"
                                >
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-[10px] font-semibold text-[#00539C] block">Published On: 06 Oct 2026</span>
                                <h3 class="text-xs sm:text-[13px] font-bold text-[#112347] group-hover:text-[#00539C] transition-colors leading-snug mt-1 line-clamp-2">
                                    CAR-T Cell Therapy in Germany | Eligibility, Centres, Cost
                                </h3>
                            </div>
                        </div>

                    </div>

                    <!-- View All Blogs Button Right-Aligned -->
                    <div class="mt-6 text-right">
                        <a 
                            href="#quote-form" 
                            class="bg-[#e13b3f] hover:bg-[#cf2a2e] active:scale-[0.99] text-white text-xs sm:text-sm font-bold px-6 py-2.5 rounded-lg shadow-sm hover:shadow transition-all inline-flex items-center justify-center"
                        >
                            View All Blogs
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- ==================== FOOTER ==================== -->
    <footer class="bg-[#004f98] text-white pt-14 sm:pt-16 pb-10 border-t border-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Top Section: 5 Columns Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-8 pb-10">
                
                <!-- Col 1: Brand & About (3 cols) -->
                <div class="lg:col-span-3 space-y-4">
                    <!-- Logo & 10 Years Badge -->
                    <a href="/" class="inline-flex items-center gap-2 group">
                        <div>
                            <span class="text-2xl font-black text-white tracking-tight">Vaidam<span class="text-blue-200">.com</span></span>
                            <span class="block text-[8px] uppercase tracking-widest text-blue-200 font-bold -mt-0.5">For Medical Procedures</span>
                        </div>
                        <!-- 10 Years Golden Emblem -->
                        <div class="flex items-center justify-center w-8 h-8 rounded-full border-2 border-amber-400 bg-amber-400/20 text-amber-300 font-extrabold text-[9px] leading-tight text-center" title="10 Years of Excellence">
                            10<br><span class="text-[6px] font-semibold">YRS</span>
                        </div>
                    </a>
                    
                    <p class="text-xs text-blue-100/80 leading-relaxed max-w-sm">
                        Vaidam Health is the world's most trusted medical travel assistance platform. We connect international patients to the best hospitals and doctors worldwide.
                    </p>
                </div>

                <!-- Col 2: Quick Links (2 cols) -->
                <div class="lg:col-span-2">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-white mb-4">
                        Quick Links
                    </h3>
                    <ul class="space-y-2 text-xs text-blue-100/80">
                        <li><a href="#about" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#services" class="hover:text-white transition-colors">Our Services</a></li>
                        <li><a href="#offices" class="hover:text-white transition-colors">Our Offices</a></li>
                        <li><a href="#vision" class="hover:text-white transition-colors">Vision</a></li>
                        <li><a href="#team" class="hover:text-white transition-colors">Team</a></li>
                        <li><a href="#faq" class="hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#contact" class="hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="#career" class="hover:text-white transition-colors">Career</a></li>
                    </ul>
                </div>

                <!-- Col 3: Useful Links (2 cols) -->
                <div class="lg:col-span-2">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-white mb-4">
                        Useful Links
                    </h3>
                    <ul class="space-y-2 text-xs text-blue-100/80">
                        <li><a href="#hospitals" class="hover:text-white transition-colors">Hospital Services</a></li>
                        <li><a href="#camps" class="hover:text-white transition-colors">OPD Camps</a></li>
                        <li><a href="#doctors" class="hover:text-white transition-colors">Doctor Services</a></li>
                        <li><a href="#refer" class="hover:text-white transition-colors">Refer to Us</a></li>
                        <li><a href="#privacy" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="#editorial" class="hover:text-white transition-colors">Editorial Policy</a></li>
                        <li><a href="#terms" class="hover:text-white transition-colors">Terms of Use</a></li>
                        <li><a href="#board" class="hover:text-white transition-colors">Medical Reviewer Board</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact Us (2.5 cols) -->
                <div class="lg:col-span-2 space-y-4">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-white mb-4">
                        Contact Us
                    </h3>
                    <div class="space-y-3 text-xs text-blue-100/90">
                        <!-- WhatsApp -->
                        <a href="https://wa.me/919971616131" target="_blank" class="flex items-center gap-2 hover:text-white transition-colors">
                            <span class="w-6 h-6 rounded-full bg-[#25D366] text-white flex items-center justify-center flex-shrink-0 shadow-xs">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            </span>
                            <span class="font-semibold">+91-9971616131</span>
                        </a>
                        
                        <!-- Email -->
                        <a href="mailto:hello@vaidam.com" class="flex items-center gap-2 hover:text-white transition-colors">
                            <span class="w-6 h-6 rounded-full bg-blue-900/80 text-white flex items-center justify-center flex-shrink-0 border border-blue-400/40">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </span>
                            <span>hello@vaidam.com</span>
                        </a>

                        <!-- Social Media Icons -->
                        <div class="flex items-center gap-2 pt-2">
                            <!-- YouTube -->
                            <a href="https://youtube.com/@Vaidam" target="_blank" class="w-7 h-7 rounded-full bg-[#FF0000] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-xs" title="YouTube">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                            <!-- LinkedIn -->
                            <a href="https://linkedin.com/company/vaidam" target="_blank" class="w-7 h-7 rounded-full bg-[#0077b5] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-xs" title="LinkedIn">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76c.94 0 1.7-.76 1.7-1.7s-.76-1.7-1.7-1.7-1.7.76-1.7 1.7.76 1.7 1.7 1.7m1.4 9.74v-8.37H5.06v8.37h2.8z"/></svg>
                            </a>
                            <!-- Facebook -->
                            <a href="https://facebook.com/vaidam" target="_blank" class="w-7 h-7 rounded-full bg-[#1877F2] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-xs" title="Facebook">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <!-- Instagram -->
                            <a href="https://instagram.com/vaidam" target="_blank" class="w-7 h-7 rounded-full bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 text-white flex items-center justify-center hover:scale-110 transition-transform shadow-xs" title="Instagram">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Col 5: Our Offices (3 cols) -->
                <div class="lg:col-span-3 space-y-3.5">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-white mb-4">
                        Our Offices
                    </h3>
                    <div class="space-y-3 text-xs text-blue-100/80 leading-relaxed">
                        <p>
                            <strong class="text-white">India :</strong> 98, 2nd Floor Sector 44, Gurgaon, Haryana 122001
                        </p>
                        <p>
                            <strong class="text-white">UAE :</strong> Vaidam Health FZC LLC, P.O.Box 85570, Sharjah, UAE
                        </p>
                        <p>
                            <strong class="text-white">USA :</strong> 8 The Green, Suite B, Dover, Delaware, 19901
                        </p>
                    </div>
                </div>

            </div>

            <!-- Middle Strip: Accreditations Badges -->
            <div class="py-6 border-t border-b border-white/15 flex items-center justify-center gap-5 sm:gap-8">
                <!-- Great Place To Work -->
                <div class="w-16 h-20 bg-[#D91B24] rounded-sm p-1.5 flex flex-col justify-between text-white shadow-sm border border-white/20 text-center">
                    <div class="text-[8px] font-black leading-tight uppercase tracking-tight">
                        Great<br>Place<br>To<br>Work<span class="text-[6px] font-normal lowercase block">®</span>
                    </div>
                    <div class="bg-[#1D3E6E] text-center text-[7px] font-bold py-0.5 rounded-2xs uppercase tracking-tighter">
                        Certified
                    </div>
                </div>

                <!-- Quality Accreditation Certificate -->
                <div class="w-16 h-20 bg-white rounded-sm p-1.5 flex flex-col justify-between text-gray-800 shadow-sm border border-gray-200 text-center">
                    <div class="border-b border-gray-200 pb-1">
                        <span class="block text-[6px] font-black uppercase text-[#00539C] tracking-tight">Accreditation</span>
                        <span class="block text-[5px] text-gray-500">Quality Certified</span>
                    </div>
                    <div class="my-auto flex items-center justify-center">
                        <div class="w-7 h-7 rounded-full bg-blue-50 border border-blue-400 flex items-center justify-center text-[#00539C]">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        </div>
                    </div>
                    <div class="text-[5px] text-gray-400 font-mono">
                        NABH / ISO
                    </div>
                </div>
            </div>

            <!-- Bottom Disclaimer & Copyright -->
            <div class="pt-6 text-center space-y-3">
                <p class="text-[10px] text-blue-200/80 leading-relaxed max-w-4xl mx-auto">
                    Note: Vaidam Health does not provide medical advice, diagnosis or treatment. The services and information offered on www.vaidam.com are intended solely for informational purposes and cannot replace the professional consultation or treatment by a physician. Vaidam Health discourages copying, cloning of its webpages and its content and it will follow the legal procedures to protect its intellectual property.
                </p>
                <p class="text-[11px] text-blue-200/90 font-medium">
                    &copy; Copyrights 2026 Vaidam.com. All rights reserved.
                </p>
            </div>

        </div>
    </footer>

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

        // News Slider Carousel Navigation
        const newsContainer = document.getElementById('news-cards-container');
        const newsPrev = document.getElementById('news-slider-prev');
        const newsNext = document.getElementById('news-slider-next');

        if (newsContainer && newsPrev && newsNext) {
            newsPrev.addEventListener('click', () => {
                const scrollAmount = newsContainer.clientWidth * 0.75;
                newsContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            });
            newsNext.addEventListener('click', () => {
                const scrollAmount = newsContainer.clientWidth * 0.75;
                newsContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
        }
    </script>

    <!-- Load Google Translate API Script Asynchronously -->
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>
