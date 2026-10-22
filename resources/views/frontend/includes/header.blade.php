    <div id="google_translate_element" style="position: absolute; top: -9999px; left: -9999px; width: 1px; height: 1px; overflow: hidden;"></div>

    <!-- ==================== HEADER (TOP BAR) ==================== -->
    <header class="bg-[#1D4B6C] text-white py-2.5 px-4 sm:px-6 lg:px-8 shadow-sm relative z-50 border-b border-[#27797D]/30">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-4">
            
            <!-- Left: Logo & Accreditation Badges -->
            <div class="flex items-center gap-3 sm:gap-4 flex-wrap">
                <!-- Brand Logo (Protected from Google translation via notranslate) -->
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5 group notranslate">
                    <div class="bg-white px-2 py-1 rounded-xl shadow-xs border border-white/20 flex items-center justify-center">
                        <img src="{{ asset('logo.png') }}" alt="Heal Go Fly - Medical Value Travel" class="h-9 sm:h-10 w-auto object-contain">
                    </div>
                    <div class="flex flex-col leading-none">
                        <span class="text-xl sm:text-2xl font-black tracking-tight text-white group-hover:text-teal-200 transition-colors">
                            Heal Go Fly
                        </span>
                        <span class="text-[9px] sm:text-[10px] tracking-wider uppercase font-bold text-[#EF7415] mt-0.5">
                            Healgofly hi rahega
                        </span>
                    </div>
                </a>

                <div class="h-8 w-px bg-white/20 hidden sm:block"></div>

                <!-- Accreditation / Quality Badge -->
                <div class="hidden md:flex items-center gap-1.5 bg-white/10 px-2.5 py-1 rounded-full border border-white/20">
                    <div class="w-5 h-5 rounded-full bg-[#EF7415] flex items-center justify-center p-0.5 shadow-sm text-white">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span class="text-[10px] font-bold text-white tracking-wide uppercase">NABH & JCI Certified</span>
                </div>
            </div>

            <!-- Right: Call to Action & Language Selector -->
            <div class="flex items-center gap-2 sm:gap-3">
                <!-- LLP Contact No -->
                <a href="https://wa.me/919129846542" target="_blank" class="hidden md:inline-flex items-center gap-1.5 bg-white/10 hover:bg-white/20 text-white text-xs font-bold px-3 py-2 rounded-md border border-white/20 transition-all shadow-xs" title="Chat on WhatsApp">
                    <svg class="w-3.5 h-3.5 text-[#25D366] fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span>+91 9129846542</span>
                </a>

                <!-- Free Quote Button -->
                <a href="#quote-form" class="inline-flex items-center justify-center bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-3.5 sm:px-5 py-2 sm:py-2.5 rounded-md shadow transition-all duration-150 transform hover:-translate-y-0.5 active:translate-y-0">
                    Get a FREE Quote
                </a>

                <!-- Custom Google Translate Language Dropdown -->
                <div class="relative notranslate" id="lang-dropdown-wrapper">
                    <button 
                        type="button" 
                        id="lang-btn"
                        class="inline-flex items-center gap-1.5 bg-white hover:bg-gray-100 text-[#1D4B6C] text-xs font-semibold px-2.5 sm:px-3 py-1.5 sm:py-2 rounded-md transition-colors shadow-sm focus:outline-none"
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
                            class="w-full text-left flex items-center justify-between px-3.5 py-2 text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors"
                            data-lang="en"
                        >
                            <span>English (Default)</span>
                            <span class="lang-check hidden text-[#27797D]">✓</span>
                        </button>

                        <button 
                            type="button"
                            onclick="translatePage('bn')" 
                            class="w-full text-left flex items-center justify-between px-3.5 py-2 text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors"
                            data-lang="bn"
                        >
                            <span>বাংলা (Bengali)</span>
                            <span class="lang-check hidden text-[#27797D]">✓</span>
                        </button>

                        <button 
                            type="button"
                            onclick="translatePage('ru')" 
                            class="w-full text-left flex items-center justify-between px-3.5 py-2 text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors"
                            data-lang="ru"
                        >
                            <span>Русский (Russian)</span>
                            <span class="lang-check hidden text-[#27797D]">✓</span>
                        </button>

                        <button 
                            type="button"
                            onclick="translatePage('ar')" 
                            class="w-full text-left flex items-center justify-between px-3.5 py-2 text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors"
                            data-lang="ar"
                        >
                            <span>العربية (Arabic)</span>
                            <span class="lang-check hidden text-[#27797D]">✓</span>
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
                    <a href="{{ url('/') }}" class="h-14 flex items-center {{ request()->routeIs('home') ? 'text-[#27797D] border-b-2 border-[#27797D]' : 'text-gray-700 hover:text-[#27797D] border-b-2 border-transparent' }} transition-colors">
                        Home
                    </a>

                    <!-- Hospitals Dropdown (Mega Menu) -->
                    <div class="group h-14 flex items-center">
                        <a href="{{ route('hospitals') }}" class="h-14 flex items-center gap-1 {{ request()->routeIs('hospitals') ? 'text-[#27797D] border-b-2 border-[#27797D]' : 'text-gray-700 hover:text-[#27797D] border-b-2 border-transparent' }} group-hover:text-[#27797D] group-hover:border-[#27797D] transition-all cursor-pointer focus:outline-none">
                            <span>Hospitals</span>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#27797D] transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain & Neurosurgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Bone & Joint Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Spine Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Hematology Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Gynecology Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF Centers</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cosmetic Surgery Hospitals</span>
                                            </a>
                                        </div>
                                        <a href="{{ route('hospitals') }}" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Turkey -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Turkey</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#EF7415]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cosmetic Surgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Spine Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain & Neurosurgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Bone & Joint Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF Centers</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Dental Centers</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Hospitals</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Thailand -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Thailand</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#27797D]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cosmetic Surgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Gynecology Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF Centers</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain & Neurosurgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Bone & Joint Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Spine Hospitals</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- UAE -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">UAE</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-emerald-500"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Gynecology Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF Centers</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain & Neurosurgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Bone & Joint Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Spine Hospitals</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Germany -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Germany</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#EF7415]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain & Neurosurgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Hospitals</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Egypt -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Egypt</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#27797D]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain & Neurosurgery Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Bone & Joint Hospitals</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Spine Hospitals</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Doctors Dropdown (Mega Menu) -->
                    <div class="group h-14 flex items-center">
                        <a href="{{ route('doctors') }}" class="h-14 flex items-center gap-1 {{ request()->routeIs('doctors') ? 'text-[#27797D] border-b-2 border-[#27797D]' : 'text-gray-700 hover:text-[#27797D] border-b-2 border-transparent' }} group-hover:text-[#27797D] group-hover:border-[#27797D] transition-all cursor-pointer focus:outline-none">
                            <span>Doctors</span>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#27797D] transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cardiac Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Doctors</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Neurologists & Neurosurgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Orthopedic Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Back & Spine Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Hematologists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Gynecologists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF & Fertility Specialists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Aesthetic & Plastic Surgeons</span>
                                            </a>
                                        </div>
                                        <a href="{{ route('doctors') }}" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Turkey -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Turkey</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#EF7415]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Aesthetic & Plastic Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Back & Spine Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Neurologists & Neurosurgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Orthopedic Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cardiac Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF & Fertility Specialists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Dentists & Dental Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Doctors</span>
                                            </a>
                                        </div>
                                        <a href="{{ route('doctors') }}" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Thailand -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Thailand</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#27797D]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Aesthetic & Plastic Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cardiac Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Gynecologists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF & Fertility Specialists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Neurologists & Neurosurgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Back & Spine Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Doctors</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- UAE -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">UAE</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-emerald-500"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cardiac Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Gynecologists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF & Fertility Specialists</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Neurologists & Neurosurgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Doctors</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Back & Spine Surgeons</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Germany -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Germany</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#EF7415]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Doctors</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Neurologists & Neurosurgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cardiac Surgeons</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                    <!-- Egypt -->
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Egypt</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#27797D]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cardiac Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Cancer Doctors</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Neurologists & Neurosurgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Orthopedic Surgeons</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Back & Spine Surgeons</span>
                                            </a>
                                        </div>
                                        <a href="#quote-form" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                            View all →
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cost Dropdown (Mega Menu) -->
                    <!-- <div class="group h-14 flex items-center">
                        <button type="button" class="h-14 flex items-center gap-1 text-gray-700 hover:text-[#27797D] group-hover:text-[#27797D] border-b-2 border-transparent group-hover:border-[#27797D] transition-all cursor-pointer focus:outline-none">
                            <span>Cost</span>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#27797D] transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        
                       
                        <div class="absolute left-0 right-0 top-full w-full bg-white border-b border-gray-200 shadow-2xl z-50 hidden group-hover:block transition-all">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7">
                                <div class="grid grid-cols-6 gap-6 xl:gap-8">
                                    
                                   
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Cardiology</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-amber-500"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Heart Bypass Surgery (CABG)</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Valve Replacement</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Angioplasty and Stent Placement</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>AICD</span>
                                            </a>
                                        </div>
                                    </div>

                                    
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Oncology</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#EF7415]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain Tumor</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>CyberKnife</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Chemotherapy</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Leukemia</span>
                                            </a>
                                        </div>
                                    </div>

                                    
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Neurology</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#27797D]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Deep Brain Stimulation</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Craniotomy</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Brain Hemorrhage</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Epilepsy</span>
                                            </a>
                                        </div>
                                    </div>

                                    
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Orthopedics</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-emerald-500"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Knee Replacement</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Minimally Invasive Hip Replacement</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>ACL Reconstruction</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Shoulder Replacement</span>
                                            </a>
                                        </div>
                                    </div>

                                    
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Spine Surgery</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#EF7415]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Minimally Invasive Spine Surgery</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Total Disc Replacement</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Spine Decompression Surgery</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Scoliosis</span>
                                            </a>
                                        </div>
                                    </div>

                                    
                                    <div>
                                        <h4 class="text-sm font-bold text-[#112347] tracking-tight">Other Departments</h4>
                                        <div class="h-[2px] w-full mt-1.5 mb-3.5 bg-[#27797D]"></div>
                                        <div class="space-y-1.5">
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Hair Transplantation</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Weight Loss Surgery</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>IVF</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Bone Marrow Transplant</span>
                                            </a>
                                            <a href="#quote-form" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                <span>Kidney Transplant</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Knowledge Dropdown -->
                    <div class="relative group h-14 flex items-center">
                        <button type="button" class="h-14 flex items-center gap-1 text-gray-700 hover:text-[#27797D] group-hover:text-[#27797D] border-b-2 border-transparent group-hover:border-[#27797D] transition-all cursor-pointer focus:outline-none">
                            <span>Knowledge</span>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#27797D] transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 top-full hidden group-hover:block w-48 bg-white border border-gray-100 rounded-xl shadow-xl py-2 z-50">
                            <!-- <a href="#quote-form" class="block px-4 py-2 text-xs font-medium text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors">Blogs</a> -->
                            <!-- <a href="#quote-form" class="block px-4 py-2 text-xs font-medium text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors">Videos</a> -->
                            <a href="#quote-form" class="block px-4 py-2 text-xs font-medium text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors">Medical Visa</a>
                            <a href="#quote-form" class="block px-4 py-2 text-xs font-medium text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors">News & Updates</a>
                        </div>
                    </div>

                    <a href="#quote-form" class="h-14 flex items-center hover:text-[#27797D] border-b-2 border-transparent hover:border-[#27797D] transition-colors">
                        Patient Stories
                    </a>

                    <a href="#quote-form" class="h-14 flex items-center hover:text-[#27797D] border-b-2 border-transparent hover:border-[#27797D] transition-colors">
                        Free Consult
                    </a>

                    <a href="#quote-form" class="h-14 flex items-center hover:text-[#27797D] border-b-2 border-transparent hover:border-emerald-500 transition-colors text-emerald-600 font-bold gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Partner Login
                    </a>
                </div>

                <!-- Right: Search Bar -->
                <div class="flex-1 lg:flex-initial flex items-center justify-end">
                    <form action="#quote-form" method="GET" class="w-full max-w-xs md:max-w-sm relative">
                        <input 
                            type="text" 
                            placeholder="Search doctors, hospitals, treatments..." 
                            class="w-full bg-gray-50 hover:bg-white focus:bg-white text-xs sm:text-sm text-gray-800 placeholder-gray-400 rounded-full pl-4 pr-10 py-2 border border-gray-300 focus:border-[#27797D] focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all"
                        >
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#27797D] transition-colors">
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
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-sm font-semibold text-[#27797D] bg-blue-50">Home</a>
            
            <!-- Mobile Hospitals Accordion -->
            <details class="group/m">
                <summary class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 cursor-pointer list-none">
                    <span>Hospitals</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform group-open/m:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <div class="pl-4 pr-2 py-2 space-y-1 border-l-2 border-blue-100 ml-3 mt-1">
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Top Hospitals in India</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Hospitals in Turkey</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Hospitals in Thailand</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Hospitals in UAE</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Hospitals in Germany</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Hospitals in Egypt</a>
                </div>
            </details>

            <!-- Mobile Doctors Accordion -->
            <details class="group/m">
                <summary class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 cursor-pointer list-none">
                    <span>Doctors</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform group-open/m:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <div class="pl-4 pr-2 py-2 space-y-1 border-l-2 border-blue-100 ml-3 mt-1">
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Cardiac Surgeons</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Cancer Doctors</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Neurologists & Neurosurgeons</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Orthopedic Surgeons</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Back & Spine Surgeons</a>
                </div>
            </details>

            <!-- Mobile Cost Accordion -->
            <details class="group/m">
                <summary class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 cursor-pointer list-none">
                    <span>Cost & Pricing</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform group-open/m:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <div class="pl-4 pr-2 py-2 space-y-1 border-l-2 border-blue-100 ml-3 mt-1">
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Cardiology Costs</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Oncology Treatment Cost</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Neurology & Brain Surgery</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Orthopedic & Knee Replacement</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Spine Surgery Cost</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Other Treatments & Transplants</a>
                </div>
            </details>

            <!-- Mobile Knowledge Accordion -->
            <details class="group/m">
                <summary class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 cursor-pointer list-none">
                    <span>Knowledge & Guides</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform group-open/m:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <div class="pl-4 pr-2 py-2 space-y-1 border-l-2 border-blue-100 ml-3 mt-1">
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Blogs</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Videos</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">Medical Visa Guide</a>
                    <a href="#quote-form" class="block py-1 text-xs text-gray-600 hover:text-[#27797D]">News & Updates</a>
                </div>
            </details>

            <a href="#quote-form" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Patient Stories</a>
            <a href="#quote-form" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Wellness</a>
            <a href="#quote-form" class="block px-3 py-2 rounded-md text-sm font-bold text-emerald-600 bg-emerald-50">FREE Consult</a>
        </div>
    </nav>

