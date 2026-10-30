    <div id="google_translate_element" style="position: absolute; top: -9999px; left: -9999px; width: 1px; height: 1px; overflow: hidden;"></div>

    <!-- ==================== HEADER (TOP BAR) ==================== -->
    <header class="bg-[#1D4B6C] text-white py-2.5 px-3 sm:px-6 lg:px-8 shadow-sm relative z-50 border-b border-[#27797D]/30">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-2 sm:gap-4">
            
            <!-- Left: Logo & Accreditation Badges (Never squished) -->
            <div class="flex items-center gap-2 sm:gap-3 flex-shrink-0 min-w-0">
                <!-- Brand Logo (Protected from Google translation via notranslate) -->
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 sm:gap-2.5 group notranslate">
                    <div class="bg-white p-1 sm:p-1.5 rounded-xl shadow-xs border border-white/20 flex items-center justify-center shrink-0">
                        <img src="{{ asset('logo.png') }}" alt="HealGoFly - Medical Value Travel" class="h-7 sm:h-9 w-auto object-contain">
                    </div>
                    <div class="flex flex-col leading-none">
                        <span class="text-base sm:text-xl lg:text-2xl font-black tracking-tight text-white group-hover:text-teal-200 transition-colors whitespace-nowrap">
                            HealGoFly
                        </span>
                        
                    </div>
                </a>

                <!-- Accreditation / Quality Badge (Desktop Only) -->
                <div class="hidden xl:flex items-center gap-1.5 bg-white/10 px-2.5 py-1 rounded-full border border-white/20">
                    <div class="w-4 h-4 rounded-full bg-[#EF7415] flex items-center justify-center p-0.5 shadow-sm text-white">
                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span class="text-[10px] font-bold text-white tracking-wide uppercase">NABH & JCI Certified</span>
                </div>
            </div>

            <!-- Right Desktop: Call to Action & Language Selector -->
            <div class="hidden lg:flex items-center gap-2.5 xl:gap-3">
                <!-- LLP Contact No -->
                <a href="https://wa.me/919129846542" target="_blank" class="inline-flex items-center gap-1.5 bg-white/10 hover:bg-white/20 text-white text-xs font-bold px-3 py-2 rounded-lg border border-white/20 transition-all shadow-xs" title="Chat on WhatsApp">
                    <svg class="w-3.5 h-3.5 text-[#25D366] fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span>+91 9129846542</span>
                </a>

                <!-- Free Quote Button -->
                <a href="#quote-form" class="inline-flex items-center justify-center bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-lg shadow transition-all duration-150 transform hover:-translate-y-0.5 active:translate-y-0 whitespace-nowrap">
                    Get a FREE Quote
                </a>

                <!-- Custom Google Translate Language Dropdown -->
                <div class="relative notranslate" id="lang-dropdown-wrapper">
                    <button 
                        type="button" 
                        id="lang-btn"
                        class="inline-flex items-center gap-1.5 bg-white hover:bg-gray-100 text-[#1D4B6C] text-xs font-semibold px-2.5 sm:px-3 py-2 rounded-lg transition-colors shadow-sm focus:outline-none"
                        aria-expanded="false"
                    >
                        <svg class="w-3.5 h-3.5 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke-width="2"/>
                            <path stroke-width="2" d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                        </svg>
                        <span id="current-lang-text">English</span>
                        <svg class="w-3 h-3 text-gray-500 transition-transform duration-200" id="lang-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Language Menu -->
                    <div 
                        id="lang-menu" 
                        class="hidden absolute right-0 mt-1.5 w-44 bg-white border border-gray-200 rounded-lg shadow-xl py-1.5 z-50 text-xs font-medium"
                    >
                        <button type="button" onclick="translatePage('en')" class="w-full text-left flex items-center justify-between px-3.5 py-2 text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors" data-lang="en">
                            <span>English (Default)</span>
                            <span class="lang-check hidden text-[#27797D]">✓</span>
                        </button>
                        <button type="button" onclick="translatePage('bn')" class="w-full text-left flex items-center justify-between px-3.5 py-2 text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors" data-lang="bn">
                            <span>বাংলা (Bengali)</span>
                            <span class="lang-check hidden text-[#27797D]">✓</span>
                        </button>
                        <button type="button" onclick="translatePage('ru')" class="w-full text-left flex items-center justify-between px-3.5 py-2 text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors" data-lang="ru">
                            <span>Русский (Russian)</span>
                            <span class="lang-check hidden text-[#27797D]">✓</span>
                        </button>
                        <button type="button" onclick="translatePage('ar')" class="w-full text-left flex items-center justify-between px-3.5 py-2 text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors" data-lang="ar">
                            <span>العربية (Arabic)</span>
                            <span class="lang-check hidden text-[#27797D]">✓</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Mobile: Clean action buttons (without burger menu, since sub-nav has it) -->
            <div class="flex lg:hidden items-center gap-1.5 sm:gap-2">
                <!-- WhatsApp Quick Chat -->
                <a href="https://wa.me/919129846542" target="_blank" class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 text-[#25D366] flex items-center justify-center transition-colors" title="WhatsApp Chat">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                </a>

                <!-- Compact Free Quote Button -->
                <a href="#quote-form" class="inline-flex items-center justify-center bg-[#EF7415] hover:bg-[#d9640d] text-white text-[11px] sm:text-xs font-bold px-3 py-1.5 rounded-lg shadow-xs transition-all whitespace-nowrap">
                    Quote
                </a>
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
                                @php
                                    $accentColors = ['bg-amber-500', 'bg-[#EF7415]', 'bg-[#27797D]', 'bg-emerald-500', 'bg-sky-500', 'bg-rose-500'];
                                    $displayedCountries = $headerCountries ?? collect();
                                @endphp

                                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 xl:gap-8">
                                    @forelse($displayedCountries as $country)
                                        @php
                                            $accent = $accentColors[$loop->index % count($accentColors)];
                                            // Extract unique hospital categories belonging to hospitals in this country
                                            $countryHospitals = $country->hospitals ?? collect();
                                            $categories = $countryHospitals
                                                ->pluck('category')
                                                ->filter()
                                                ->unique('id');

                                            if ($categories->isEmpty() && isset($allHospitalCategories)) {
                                                $categories = $allHospitalCategories->take(8);
                                            }
                                        @endphp
                                        <div>
                                            <div class="flex items-center justify-between">
                                                <h4 class="text-sm font-bold text-[#112347] tracking-tight">{{ $country->name }}</h4>
                                                
                                            </div>
                                            <div class="h-[2px] w-full mt-1.5 mb-3.5 {{ $accent }}"></div>
                                            
                                            <div class="space-y-1.5">
                                                @forelse($categories->take(8) as $cat)
                                                    <a href="{{ route('hospitals', ['country' => $country->name, 'category' => $cat->name]) }}" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5" title="{{ $cat->name }} in {{ $country->name }}">
                                                        <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                        <span class="truncate">{{ $cat->name }}</span>
                                                    </a>
                                                @empty
                                                    <a href="{{ route('hospitals', ['country' => $country->name]) }}" class="flex items-start text-xs text-[#5a6a85] hover:text-[#27797D] leading-snug group/link transition-colors py-0.5">
                                                        <span class="text-gray-400 group-hover/link:text-[#27797D] mr-1.5 select-none font-semibold">›</span>
                                                        <span>Multi-Specialty Hospitals</span>
                                                    </a>
                                                @endforelse
                                            </div>
                                            
                                            <a href="{{ route('hospitals', ['country' => $country->name]) }}" class="inline-flex items-center text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline mt-2.5 transition-colors">
                                                View all in {{ $country->name }} &rarr;
                                            </a>
                                        </div>
                                    @empty
                                        <div class="col-span-full py-6 text-center text-gray-500 text-xs">
                                            <p class="font-semibold text-gray-700">No network hospital locations available currently.</p>
                                            <a href="{{ route('hospitals') }}" class="text-[#27797D] underline mt-1 inline-block">Browse all hospitals</a>
                                        </div>
                                    @endforelse
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
                                <!-- Top Header within Mega Menu -->
                                <div class="flex items-center justify-between pb-3.5 mb-5 border-b border-gray-100">
                                    <div>
                                        <h3 class="text-sm font-extrabold text-[#112347] tracking-tight flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-[#EF7415]"></span>
                                            <span>Consult Top Medical Specialists & Surgeons</span>
                                        </h3>
                                        <p class="text-xs text-[#5a6a85] mt-0.5">Find internationally certified doctors by medical speciality & surgical expertise</p>
                                    </div>
                                    <a href="{{ route('doctors') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#27797D] hover:text-[#1e5f62] hover:underline transition-colors">
                                        <span>View All Doctors & Specialists</span>
                                        <span>&rarr;</span>
                                    </a>
                                </div>

                                <!-- Specialists Grid (4 Columns) -->
                                @php
                                    $displayedSpecialities = $headerSpecialities ?? collect();
                                @endphp
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3.5">
                                    @forelse($displayedSpecialities as $speciality)
                                        @php
                                            $specialityImg = !empty($speciality->image)
                                                ? (\Illuminate\Support\Str::startsWith($speciality->image, ['http://', 'https://']) ? $speciality->image : asset($speciality->image))
                                                : asset('icons/cardio.svg');
                                        @endphp
                                        <a href="{{ route('doctors', ['speciality' => $speciality->name]) }}" class="group/item flex items-center gap-3 p-2.5 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-white hover:border-teal-200 hover:shadow-sm transition-all duration-200">
                                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-50 to-blue-50/70 p-2 flex items-center justify-center shrink-0 border border-teal-100/70 group-hover/item:scale-105 group-hover/item:bg-teal-100/70 group-hover/item:border-teal-300 transition-all">
                                                <img src="{{ $specialityImg }}" alt="{{ $speciality->name }}" class="w-full h-full object-contain" onerror="this.onerror=null; this.src='{{ asset('icons/cardio.svg') }}';">
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="flex items-center justify-between gap-1">
                                                    <h4 class="text-xs font-bold text-gray-800 group-hover/item:text-[#27797D] transition-colors leading-tight truncate">
                                                        {{ $speciality->name }}
                                                    </h4>
                                                    @if(!empty($speciality->doctors_count))
                                                        <span class="text-[10px] font-bold text-[#27797D] bg-teal-50 px-1.5 py-0.2 rounded-full border border-teal-200/60 shrink-0">
                                                            {{ $speciality->doctors_count }}
                                                        </span>
                                                    @endif
                                                </div>
                                                <p class="text-[11px] text-gray-400 mt-0.5 truncate leading-none">
                                                    @if(!empty($speciality->description))
                                                        {{ $speciality->description }}
                                                    @elseif($speciality->treatments_count > 0)
                                                        {{ $speciality->treatments_count }} {{ \Illuminate\Support\Str::plural('Procedure', $speciality->treatments_count) }}
                                                    @else
                                                        Specialized Consultations
                                                    @endif
                                                </p>
                                            </div>
                                            <span class="text-gray-300 group-hover/item:text-[#27797D] text-xs font-bold shrink-0 transition-colors">›</span>
                                        </a>
                                    @empty
                                        <div class="col-span-full py-6 text-center text-gray-500 text-xs">
                                            <p class="font-semibold text-gray-700">No medical specialities registered yet.</p>
                                            <a href="{{ route('doctors') }}" class="text-[#27797D] underline mt-1 inline-block">Browse all doctors</a>
                                        </div>
                                    @endforelse
                                </div>

                                <!-- Bottom Quick Filter Bar: Doctors by Country -->
                                @if(isset($headerCountries) && $headerCountries->isNotEmpty())
                                    <div class="mt-5 pt-3.5 border-t border-gray-100 flex flex-wrap items-center justify-between gap-3 text-xs">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span class="text-gray-400 font-bold uppercase text-[10px] tracking-wider">Top Medical Destinations:</span>
                                            @foreach($headerCountries as $countryItem)
                                                <a href="{{ route('doctors', ['country' => $countryItem->name]) }}" class="text-[#5a6a85] hover:text-[#27797D] font-semibold hover:underline">
                                                    Doctors in {{ $countryItem->name }}
                                                </a>
                                                @if(!$loop->last)
                                                    <span class="text-gray-300">&bull;</span>
                                                @endif
                                            @endforeach
                                        </div>
                                        <a href="{{ route('doctors') }}" class="font-bold text-[#EF7415] hover:text-[#d9640d] hover:underline flex items-center gap-1 whitespace-nowrap">
                                            <span>Explore All Doctors</span>
                                            <span>&rarr;</span>
                                        </a>
                                    </div>
                                @endif

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

                    <a href="{{ route('medical.visa') }}" class="h-14 flex items-center {{ request()->routeIs('medical.visa') ? 'text-[#27797D] border-b-2 border-[#27797D]' : 'text-gray-700 hover:text-[#27797D] border-b-2 border-transparent' }} hover:border-[#27797D] transition-colors">
                        Medical Visa
                    </a>

                    <a href="{{ route('patient.stories') }}" class="h-14 flex items-center {{ request()->routeIs('patient.stories') ? 'text-[#27797D] border-b-2 border-[#27797D]' : 'text-gray-700 hover:text-[#27797D] border-b-2 border-transparent' }} hover:border-[#27797D] transition-colors">
                        Patient Stories
                    </a>

                    <a href="#quote-form" class="h-14 flex items-center">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200/80 shadow-2xs hover:shadow transition-all duration-150">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                            <span>Free Consult</span>
                        </span>
                    </a>

                    <!-- Agent Dropdown -->
                    <div class="relative group h-14 flex items-center">
                        <button type="button" class="h-14 flex items-center gap-1 text-gray-700 hover:text-[#27797D] group-hover:text-[#27797D] border-b-2 border-transparent group-hover:border-[#27797D] transition-all cursor-pointer focus:outline-none">
                            @auth('partner')
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>Partner ({{ Str::limit(auth('partner')->user()->name, 10) }})</span>
                            @else
                                <span>Become a Partner</span>
                            @endauth
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-[#27797D] transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 top-full hidden group-hover:block w-48 bg-white border border-gray-100 rounded-xl shadow-xl py-2 z-50">
                            @auth('partner')
                                <div class="px-4 py-2 border-b border-gray-100 bg-gray-50/50">
                                    <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Signed in as</p>
                                    <p class="text-xs font-bold text-[#112347] truncate">{{ auth('partner')->user()->name }}</p>
                                </div>
                                <a href="{{ route('partner.dashboard') }}" class="flex items-center gap-2 px-4 py-2 text-xs font-semibold text-[#EF7415] hover:bg-orange-50 transition-colors">
                                    <svg class="w-3.5 h-3.5 text-[#EF7415]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                    <span>Dashboard</span>
                                </a>
                                <form method="POST" action="{{ route('partner.logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-xs font-semibold text-red-600 hover:bg-red-50 transition-colors">
                                        <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('partner.login') }}" class="flex items-center gap-2 px-4 py-2 text-xs font-medium text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors">
                                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                                    <span>Partner Login</span>
                                </a>
                                <a href="{{ route('partner.register') }}" class="flex items-center gap-2 px-4 py-2 text-xs font-medium text-gray-700 hover:bg-blue-50 hover:text-[#27797D] transition-colors">
                                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                                    <span>Become a Partner</span>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Right: Search Bar -->
                <div class="flex-1 lg:flex-initial flex items-center justify-end">
                    <form action="{{ route('search') }}" method="GET" class="w-full max-w-xs md:max-w-sm relative">
                        <input 
                            type="text" 
                            name="q"
                            value="{{ request('q', request('search')) }}"
                            placeholder="Search doctors, hospitals, treatments..." 
                            class="w-full bg-gray-50 hover:bg-white focus:bg-white text-xs sm:text-sm text-gray-800 placeholder-gray-400 rounded-full pl-4 pr-10 py-2 border border-gray-300 focus:border-[#27797D] focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all"
                            required
                        >
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#27797D] transition-colors" title="Search">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Mobile Secondary Menu Trigger -->
                <div class="lg:hidden flex items-center">
                    <button type="button" class="mobile-sidebar-toggle-btn p-2 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none transition-colors" aria-label="Open Navigation Sidebar">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </nav>

    <!-- ==================== MOBILE SLIDE-OVER SIDEBAR DRAWER (OFF-CANVAS) ==================== -->
    <!-- Backdrop Overlay -->
    <div id="mobile-sidebar-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-xs z-[9998] transition-opacity duration-300 opacity-0 pointer-events-none"></div>

    <!-- Slide-over Drawer Panel -->
    <aside id="mobile-sidebar" class="fixed inset-y-0 right-0 w-[86%] max-w-sm bg-white shadow-2xl z-[9999] flex flex-col transform transition-transform duration-300 ease-in-out translate-x-full">
        
        <!-- Drawer Header -->
        <div class="p-4 bg-gradient-to-r from-[#1D4B6C] to-[#27797D] text-white flex items-center justify-between border-b border-white/10 shrink-0">
            <div class="flex items-center gap-2.5 notranslate">
                <div class="bg-white p-1 rounded-xl shadow-xs">
                    <img src="{{ asset('logo.png') }}" alt="HealGoFly" class="h-7 w-auto object-contain">
                </div>
                <div class="leading-none">
                    <span class="text-base font-black tracking-tight text-white block">HealGoFly</span>
                </div>
            </div>

            <!-- Close Button (X) -->
            <button id="mobile-sidebar-close-btn" type="button" class="w-8 h-8 rounded-full bg-white/15 hover:bg-white/25 text-white flex items-center justify-center focus:outline-none transition-colors" aria-label="Close Navigation Menu">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Drawer Content (Scrollable) -->
        <div class="flex-1 overflow-y-auto p-4 space-y-4">

            <!-- Mobile Search Bar -->
            <form action="{{ route('search') }}" method="GET" class="relative">
                <input 
                    type="text" 
                    name="q"
                    value="{{ request('q', request('search')) }}"
                    placeholder="Search doctors, hospitals..." 
                    class="w-full bg-gray-50 focus:bg-white text-xs text-gray-800 placeholder-gray-400 rounded-xl pl-3.5 pr-9 py-2.5 border border-gray-200 focus:border-[#27797D] focus:outline-none transition-all"
                    required
                >
                <button type="submit" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#27797D]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
            </form>
            
            <!-- Quick CTA Buttons -->
            <div class="space-y-2">
                <a href="#quote-form" class="mobile-sidebar-link w-full bg-[#EF7415] hover:bg-[#d9640d] text-white font-bold py-2.5 px-4 rounded-xl text-xs sm:text-sm text-center flex items-center justify-center gap-2 shadow-sm transition-all">
                    <span>Get a FREE Quote</span>
                    <span class="text-sm">&rarr;</span>
                </a>

                <a href="https://wa.me/919129846542" target="_blank" class="w-full bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 font-bold py-2 px-3 rounded-xl text-xs text-center flex items-center justify-center gap-2 transition-all">
                    <svg class="w-4 h-4 text-[#25D366] fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span>WhatsApp: +91 9129846542</span>
                </a>
            </div>

            <!-- Language Switcher in Sidebar -->
            <div class="bg-gray-50 p-3 rounded-2xl border border-gray-100 notranslate">
                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block mb-2">Select Language</span>
                <div class="grid grid-cols-2 gap-1.5">
                    <button type="button" onclick="translatePage('en')" class="px-2.5 py-1.5 rounded-lg text-xs font-semibold text-gray-700 bg-white border border-gray-200 hover:border-[#27797D] text-left transition-colors">
                        English
                    </button>
                    <button type="button" onclick="translatePage('bn')" class="px-2.5 py-1.5 rounded-lg text-xs font-semibold text-gray-700 bg-white border border-gray-200 hover:border-[#27797D] text-left transition-colors">
                        বাংলা (Bengali)
                    </button>
                    <button type="button" onclick="translatePage('ru')" class="px-2.5 py-1.5 rounded-lg text-xs font-semibold text-gray-700 bg-white border border-gray-200 hover:border-[#27797D] text-left transition-colors">
                        Русский (Russian)
                    </button>
                    <button type="button" onclick="translatePage('ar')" class="px-2.5 py-1.5 rounded-lg text-xs font-semibold text-gray-700 bg-white border border-gray-200 hover:border-[#27797D] text-left transition-colors">
                        العربية (Arabic)
                    </button>
                </div>
            </div>

            <!-- Menu Navigation Accordions & Links -->
            <div class="space-y-1 pt-2 border-t border-gray-100">
                <a href="{{ url('/') }}" class="mobile-sidebar-link flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('home') ? 'bg-[#27797D]/10 text-[#27797D]' : 'text-gray-800 hover:bg-gray-50' }}">
                    <span>Home</span>
                    <span class="text-gray-400">&rsaquo;</span>
                </a>

                <!-- Hospitals Accordion -->
                <details class="group/sub">
                    <summary class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-bold text-gray-800 hover:bg-gray-50 cursor-pointer list-none select-none">
                        <span>Hospitals</span>
                        <svg class="w-3.5 h-3.5 text-gray-400 transition-transform group-open/sub:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <div class="pl-3 pr-1 py-1 space-y-1 ml-2 border-l-2 border-[#27797D]/30 mt-0.5">
                        <a href="{{ route('hospitals') }}" class="mobile-sidebar-link block px-2.5 py-1.5 text-xs text-[#27797D] font-bold">View All Hospitals &rarr;</a>
                        @forelse($headerCountries ?? collect() as $country)
                            @php
                                $countryHospitals = $country->hospitals ?? collect();
                                $mobileCategories = $countryHospitals
                                    ->pluck('category')
                                    ->filter()
                                    ->unique('id');

                                if ($mobileCategories->isEmpty() && isset($allHospitalCategories)) {
                                    $mobileCategories = $allHospitalCategories->take(4);
                                }
                            @endphp
                            <details class="group/nested">
                                <summary class="flex items-center justify-between px-2.5 py-1 text-xs text-gray-700 font-semibold hover:text-[#27797D] cursor-pointer list-none">
                                    <span>Hospitals in {{ $country->name }}</span>
                                    <svg class="w-3 h-3 text-gray-400 transition-transform group-open/nested:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </summary>
                                <div class="pl-2 space-y-0.5 mt-0.5 border-l border-gray-200 ml-1">
                                    @foreach($mobileCategories->take(6) as $mCat)
                                        <a href="{{ route('hospitals', ['country' => $country->name, 'category' => $mCat->name]) }}" class="mobile-sidebar-link block px-2 py-0.5 text-[11px] text-gray-500 hover:text-[#27797D] truncate">
                                            &bull; {{ $mCat->name }}
                                        </a>
                                    @endforeach
                                    <a href="{{ route('hospitals', ['country' => $country->name]) }}" class="mobile-sidebar-link block px-2 py-0.5 text-[11px] font-bold text-[#27797D]">
                                        View all in {{ $country->name }} &rarr;
                                    </a>
                                </div>
                            </details>
                        @empty
                            <a href="{{ route('hospitals') }}" class="mobile-sidebar-link block px-2.5 py-1 text-xs text-gray-600 hover:text-[#27797D]">Network Hospitals</a>
                        @endforelse
                    </div>
                </details>

                <!-- Doctors Accordion -->
                <details class="group/sub">
                    <summary class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-bold text-gray-800 hover:bg-gray-50 cursor-pointer list-none select-none">
                        <span>Doctors</span>
                        <svg class="w-3.5 h-3.5 text-gray-400 transition-transform group-open/sub:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <div class="pl-3 pr-1 py-1 space-y-1 ml-2 border-l-2 border-[#27797D]/30 mt-0.5">
                        <a href="{{ route('doctors') }}" class="mobile-sidebar-link block px-2.5 py-1.5 text-xs text-[#27797D] font-bold">View All Doctors &rarr;</a>
                        @forelse($headerSpecialities ?? collect() as $speciality)
                            <a href="{{ route('doctors', ['speciality' => $speciality->name]) }}" class="mobile-sidebar-link block px-2.5 py-1 text-xs text-gray-600 hover:text-[#27797D] truncate">
                                {{ $speciality->name }}
                            </a>
                        @empty
                            <a href="{{ route('doctors') }}" class="mobile-sidebar-link block px-2.5 py-1 text-xs text-gray-600 hover:text-[#27797D]">Specialists</a>
                        @endforelse
                    </div>
                </details>

                <a href="{{ route('medical.visa') }}" class="mobile-sidebar-link flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('medical.visa') ? 'bg-[#27797D]/10 text-[#27797D]' : 'text-gray-800 hover:bg-gray-50' }}">
                    <span>Medical Visa Guidance</span>
                    <span class="text-gray-400">&rsaquo;</span>
                </a>

                <!-- Cost & Pricing Accordion -->
                <details class="group/sub">
                    <summary class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-bold text-gray-800 hover:bg-gray-50 cursor-pointer list-none select-none">
                        <span>Cost & Pricing</span>
                        <svg class="w-3.5 h-3.5 text-gray-400 transition-transform group-open/sub:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <div class="pl-3 pr-1 py-1 space-y-1 ml-2 border-l-2 border-[#27797D]/30 mt-0.5">
                        <a href="#quote-form" class="mobile-sidebar-link block px-2.5 py-1 text-xs text-gray-600 hover:text-[#27797D]">Cardiology Costs</a>
                        <a href="#quote-form" class="mobile-sidebar-link block px-2.5 py-1 text-xs text-gray-600 hover:text-[#27797D]">Oncology Treatment Cost</a>
                        <a href="#quote-form" class="mobile-sidebar-link block px-2.5 py-1 text-xs text-gray-600 hover:text-[#27797D]">Neurology & Brain Surgery</a>
                        <a href="#quote-form" class="mobile-sidebar-link block px-2.5 py-1 text-xs text-gray-600 hover:text-[#27797D]">Orthopedic & Knee Replacement</a>
                        <a href="#quote-form" class="mobile-sidebar-link block px-2.5 py-1 text-xs text-gray-600 hover:text-[#27797D]">Spine Surgery Cost</a>
                    </div>
                </details>

                <!-- Knowledge & Guides Accordion -->
                <details class="group/sub">
                    <summary class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-bold text-gray-800 hover:bg-gray-50 cursor-pointer list-none select-none">
                        <span>Knowledge & Guides</span>
                        <svg class="w-3.5 h-3.5 text-gray-400 transition-transform group-open/sub:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <div class="pl-3 pr-1 py-1 space-y-1 ml-2 border-l-2 border-[#27797D]/30 mt-0.5">
                        <a href="#quote-form" class="mobile-sidebar-link block px-2.5 py-1 text-xs text-gray-600 hover:text-[#27797D]">Blogs & Medical Guides</a>
                        <a href="#quote-form" class="mobile-sidebar-link block px-2.5 py-1 text-xs text-gray-600 hover:text-[#27797D]">Medical Visa Guidelines</a>
                        <a href="#quote-form" class="mobile-sidebar-link block px-2.5 py-1 text-xs text-gray-600 hover:text-[#27797D]">Patient Travel Videos</a>
                    </div>
                </details>

                <a href="{{ route('patient.stories') }}" class="mobile-sidebar-link flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('patient.stories') ? 'bg-[#27797D]/10 text-[#27797D]' : 'text-gray-800 hover:bg-gray-50' }}">
                    <span>Patient Stories</span>
                    <span class="text-gray-400">&rsaquo;</span>
                </a>

                <a href="#quote-form" class="mobile-sidebar-link flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200/60 transition-colors">
                    <span class="flex items-center gap-2">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        <span>Free Consult</span>
                    </span>
                </a>

                <!-- Agent Accordion -->
                <details class="group/sub">
                    <summary class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-bold text-gray-800 hover:bg-gray-50 cursor-pointer list-none select-none">
                        <span class="flex items-center gap-2">
                            @auth('partner')
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>Partner ({{ Str::limit(auth('partner')->user()->name, 12) }})</span>
                            @else
                                <span>Become a Partner</span>
                            @endauth
                        </span>
                        <svg class="w-3.5 h-3.5 text-gray-400 transition-transform group-open/sub:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <div class="pl-3 pr-1 py-1 space-y-1 ml-2 border-l-2 border-[#27797D]/30 mt-0.5">
                        @auth('partner')
                            <a href="{{ route('partner.dashboard') }}" class="mobile-sidebar-link block px-2.5 py-1.5 text-xs text-[#EF7415] font-bold">Partner Dashboard &rarr;</a>
                            <form method="POST" action="{{ route('partner.logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left mobile-sidebar-link block px-2.5 py-1 text-xs text-red-600 font-semibold">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('partner.login') }}" class="mobile-sidebar-link block px-2.5 py-1.5 text-xs text-gray-700 hover:text-[#27797D] font-medium">Partner Login</a>
                            <a href="{{ route('partner.register') }}" class="mobile-sidebar-link block px-2.5 py-1.5 text-xs text-gray-700 hover:text-[#27797D] font-medium">Become a Partner</a>
                        @endauth
                    </div>
                </details>
            </div>

        </div>

        <!-- Drawer Footer -->
        <div class="p-3.5 bg-gray-50 border-t border-gray-100 text-center text-xs shrink-0">
            <p class="text-[11px] font-bold text-[#1D4B6C]">HealGoFly LLP</p>
            <p class="text-[10px] text-gray-500 mt-0.5">info@healgofly.com &bull; +91 9129846542</p>
            <span class="inline-block mt-1 text-[9px] uppercase tracking-wider font-extrabold text-[#EF7415]">NABH & JCI Certified Network</span>
        </div>

    </aside>
    </nav>

