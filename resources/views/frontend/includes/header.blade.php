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
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-40 shadow-[0_2px_4px_rgba(0,0,0,0.03)] relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-14 gap-4">
                
                <!-- Navigation Links (Desktop) -->
                <div class="hidden lg:flex items-center gap-4 xl:gap-6 text-xs xl:text-sm font-semibold text-gray-700 h-14">
                    <a href="{{ url('/') }}" class="h-14 flex items-center {{ request()->routeIs('home') ? 'text-[#00539C] border-b-2 border-[#00539C]' : 'text-gray-700 hover:text-[#00539C] border-b-2 border-transparent' }} transition-colors">
                        Home
                    </a>

                    <!-- Hospitals Dropdown (Mega Menu) -->
                    <div class="group h-14 flex items-center">
                        <a href="{{ route('hospitals') }}" class="h-14 flex items-center gap-1 {{ request()->routeIs('hospitals') ? 'text-[#00539C] border-b-2 border-[#00539C]' : 'text-gray-700 hover:text-[#00539C] border-b-2 border-transparent' }} group-hover:text-[#00539C] group-hover:border-[#00539C] transition-all cursor-pointer focus:outline-none">
                            <span>Hospitals</span>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#00539C] transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </a>
                        
                        <!-- Hospitals Full-Width Mega Menu -->
                        <div class="absolute left-0 right-0 top-full w-full bg-white border-b border-gray-200 shadow-2xl z-50 hidden group-hover:block transition-all">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7">
                                <div class="grid grid-cols-6 gap-6 xl:gap-8">
                                    
                                    <!-- India -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">India</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-amber-500"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain & Neurosurgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Bone & Joint Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Spine Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Hematology Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Gynecology Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF Centers</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cosmetic Surgery Hospitals</span>
                                            </a>
                                        </div>
                                        <a href="{{ route('hospitals') }}" class="inline-flex items-center text-xs font-bold text-[#00539C] hover:text-[#003d73] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Turkey -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Turkey</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#e13b3f]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cosmetic Surgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Spine Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain & Neurosurgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Bone & Joint Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF Centers</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Dental Centers</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Hospitals</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#00539C] hover:text-[#003d73] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Thailand -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Thailand</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#00539C]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cosmetic Surgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Gynecology Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF Centers</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain & Neurosurgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Bone & Joint Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Spine Hospitals</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#00539C] hover:text-[#003d73] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- UAE -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">UAE</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-emerald-500"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Gynecology Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF Centers</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain & Neurosurgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Bone & Joint Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Spine Hospitals</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#00539C] hover:text-[#003d73] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Germany -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Germany</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#e13b3f]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain & Neurosurgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Hospitals</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#00539C] hover:text-[#003d73] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Egypt -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Egypt</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#00539C]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain & Neurosurgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Bone & Joint Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Spine Hospitals</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#00539C] hover:text-[#003d73] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Doctors Dropdown (Mega Menu) -->
                    <div class="group h-14 flex items-center">
                        <a href="{{ route('doctors') }}" class="h-14 flex items-center gap-1 {{ request()->routeIs('doctors') ? 'text-[#00539C] border-b-2 border-[#00539C]' : 'text-gray-700 hover:text-[#00539C] border-b-2 border-transparent' }} group-hover:text-[#00539C] group-hover:border-[#00539C] transition-all cursor-pointer focus:outline-none">
                            <span>Doctors</span>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#00539C] transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </a>
                        
                        <!-- Doctors Full-Width Mega Menu -->
                        <div class="absolute left-0 right-0 top-full w-full bg-white border-b border-gray-200 shadow-2xl z-50 hidden group-hover:block transition-all">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7">
                                <div class="grid grid-cols-6 gap-6 xl:gap-8">
                                    
                                    <!-- India -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">India</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-amber-500"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cardiac Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Doctors</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Neurologists & Neurosurgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Orthopedic Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Back & Spine Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Hematologists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Gynecologists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF & Fertility Specialists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Aesthetic & Plastic Surgeons</span>
                                            </a>
                                        </div>
                                        <a href="{{ route('doctors') }}" class="inline-flex items-center text-xs font-bold text-[#00539C] hover:text-[#003d73] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Turkey -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Turkey</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#e13b3f]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Aesthetic & Plastic Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Back & Spine Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Neurologists & Neurosurgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Orthopedic Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cardiac Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF & Fertility Specialists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Dentists & Dental Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Doctors</span>
                                            </a>
                                        </div>
                                        <a href="{{ route('doctors') }}" class="inline-flex items-center text-xs font-bold text-[#00539C] hover:text-[#003d73] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Thailand -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Thailand</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#00539C]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Aesthetic & Plastic Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cardiac Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Gynecologists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF & Fertility Specialists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Neurologists & Neurosurgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Back & Spine Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Doctors</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#00539C] hover:text-[#003d73] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- UAE -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">UAE</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-emerald-500"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cardiac Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Gynecologists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF & Fertility Specialists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Neurologists & Neurosurgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Doctors</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Back & Spine Surgeons</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#00539C] hover:text-[#003d73] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Germany -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Germany</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#e13b3f]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Doctors</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Neurologists & Neurosurgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cardiac Surgeons</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#00539C] hover:text-[#003d73] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Egypt -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Egypt</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#00539C]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cardiac Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Doctors</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Neurologists & Neurosurgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Orthopedic Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Back & Spine Surgeons</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#00539C] hover:text-[#003d73] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cost Dropdown (Mega Menu) -->
                    <div class="group h-14 flex items-center">
                        <button type="button" class="h-14 flex items-center gap-1 text-gray-700 hover:text-[#00539C] group-hover:text-[#00539C] border-b-2 border-transparent group-hover:border-[#00539C] transition-all cursor-pointer focus:outline-none">
                            <span>Cost</span>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#00539C] transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        
                        <!-- Cost Full-Width Mega Menu -->
                        <div class="absolute left-0 right-0 top-full w-full bg-white border-b border-gray-200 shadow-2xl z-50 hidden group-hover:block transition-all">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7">
                                <div class="grid grid-cols-6 gap-6 xl:gap-8">
                                    
                                    <!-- Cardiology -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Cardiology</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-amber-500"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Bypass Surgery (CABG)</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Valve Replacement</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Angioplasty and Stent Placement</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>AICD</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Oncology -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Oncology</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#e13b3f]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain Tumor</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>CyberKnife</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Chemotherapy</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Leukemia</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Neurology -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Neurology</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#00539C]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Deep Brain Stimulation</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Craniotomy</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain Hemorrhage</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Epilepsy</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Orthopedics -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Orthopedics</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-emerald-500"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Knee Replacement</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Minimally Invasive Hip Replacement</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>ACL Reconstruction</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Shoulder Replacement</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Spine Surgery -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Spine Surgery</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#e13b3f]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Minimally Invasive Spine Surgery</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Total Disc Replacement</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Spine Decompression Surgery</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Scoliosis</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Other Departments -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Other Departments</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#00539C]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Hair Transplantation</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Weight Loss Surgery</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Bone Marrow Transplant</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#00539C] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#00539C] mr-1.5 select-none font-semibold">›</span>
                                                <span>Kidney Transplant</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Knowledge Dropdown -->
                    <div class="relative group h-14 flex items-center">
                        <button type="button" class="h-14 flex items-center gap-1 text-gray-700 hover:text-[#00539C] group-hover:text-[#00539C] border-b-2 border-transparent group-hover:border-[#00539C] transition-all cursor-pointer focus:outline-none">
                            <span>Knowledge</span>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#00539C] transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 top-full hidden group-hover:block w-48 bg-white border border-gray-100 rounded-xl shadow-xl py-2 z-50">
                            <a href="#quote-form" class="block px-4 py-2 text-xs font-medium text-gray-700 hover:bg-blue-50 hover:text-[#00539C] transition-colors">Blogs</a>
                            <a href="#quote-form" class="block px-4 py-2 text-xs font-medium text-gray-700 hover:bg-blue-50 hover:text-[#00539C] transition-colors">Videos</a>
                            <a href="#quote-form" class="block px-4 py-2 text-xs font-medium text-gray-700 hover:bg-blue-50 hover:text-[#00539C] transition-colors">Medical Visa</a>
                            <a href="#quote-form" class="block px-4 py-2 text-xs font-medium text-gray-700 hover:bg-blue-50 hover:text-[#00539C] transition-colors">News & Updates</a>
                        </div>
                    </div>

                    <a href="#quote-form" class="h-14 flex items-center hover:text-[#00539C] border-b-2 border-transparent hover:border-[#00539C] transition-colors">
                        Patient Stories
                    </a>

                    <a href="#quote-form" class="h-14 flex items-center hover:text-[#00539C] border-b-2 border-transparent hover:border-[#00539C] transition-colors">
                        Wellness
                    </a>

                    <a href="#quote-form" class="h-14 flex items-center hover:text-[#00539C] border-b-2 border-transparent hover:border-emerald-500 transition-colors text-emerald-600 font-bold gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        FREE Consult
                    </a>
                </div>

                <!-- Right: Search Bar -->
                <div class="flex-1 lg:flex-initial flex items-center justify-end">
                    <form action="#quote-form" method="GET" class="w-full max-w-xs md:max-w-sm relative">
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
        <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-200 bg-white px-4 pt-3 pb-6 space-y-2 max-h-[80vh] overflow-y-auto">
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-sm font-semibold text-[#00539C] bg-blue-50">Home</a>
            
            <!-- Mobile Hospitals Accordion -->
            <details class="group/m">
                <summary class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 cursor-pointer list-none">
                    <span>Hospitals</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform group-open/m:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <div class="pl-4 pr-2 py-2 space-y-1 border-l-2 border-blue-100 ml-3 mt-1">
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Top Hospitals in India</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Hospitals in Turkey</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Hospitals in Thailand</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Hospitals in UAE</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Hospitals in Germany</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Hospitals in Egypt</a>
                </div>
            </details>

            <!-- Mobile Doctors Accordion -->
            <details class="group/m">
                <summary class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 cursor-pointer list-none">
                    <span>Doctors</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform group-open/m:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <div class="pl-4 pr-2 py-2 space-y-1 border-l-2 border-blue-100 ml-3 mt-1">
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Cardiac Surgeons</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Cancer Doctors</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Neurologists & Neurosurgeons</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Orthopedic Surgeons</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Back & Spine Surgeons</a>
                </div>
            </details>

            <!-- Mobile Cost Accordion -->
            <details class="group/m">
                <summary class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 cursor-pointer list-none">
                    <span>Cost & Pricing</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform group-open/m:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <div class="pl-4 pr-2 py-2 space-y-1 border-l-2 border-blue-100 ml-3 mt-1">
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Cardiology Costs</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Oncology Treatment Cost</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Neurology & Brain Surgery</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Orthopedic & Knee Replacement</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Spine Surgery Cost</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Other Treatments & Transplants</a>
                </div>
            </details>

            <!-- Mobile Knowledge Accordion -->
            <details class="group/m">
                <summary class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 cursor-pointer list-none">
                    <span>Knowledge & Guides</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform group-open/m:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <div class="pl-4 pr-2 py-2 space-y-1 border-l-2 border-blue-100 ml-3 mt-1">
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Blogs</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Videos</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">Medical Visa Guide</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#00539C]">News & Updates</a>
                </div>
            </details>

            <a href="#quote-form" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Patient Stories</a>
            <a href="#quote-form" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Wellness</a>
            <a href="#quote-form" class="block px-3 py-2 rounded-md text-sm font-bold text-emerald-600 bg-emerald-50">FREE Consult</a>
        </div>
    </nav>

