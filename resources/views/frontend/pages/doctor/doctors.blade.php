@extends('frontend.layouts.app')

@section('title', 'Best Doctors in Turkey - Top Rated Specialists & Surgeons | Heal Go Fly')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-50/80 border-b border-gray-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium">
                <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('doctors') }}" class="hover:text-[#27797D] transition-colors">Doctors</a>
                <span class="text-gray-400">›</span>
                <span class="text-[#112347] font-semibold" id="breadcrumb-country">Turkey</span>
            </nav>
        </div>
    </div>

    <!-- ==================== PAGE TITLE ==================== -->
    <div class="py-6 sm:py-9 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#112347] tracking-tight" id="page-heading">
                Best Doctors in Turkey
            </h1>
            <p class="text-xs sm:text-sm text-[#5a6a85] mt-2 max-w-2xl mx-auto leading-relaxed">
                Find and consult world-class specialists and surgeons in Turkey. View doctor credentials, surgical experience, patient ratings, and book appointments directly.
            </p>
        </div>
    </div>

    <!-- ==================== SEARCH & FILTER CONTAINER (4 COLUMNS) ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 mb-8 sm:mb-12">
        <div class="rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.06)] border border-gray-200/90 overflow-hidden bg-white">
            
            <!-- Card Top Blue Bar -->
            <div class="bg-[#27797D] text-white px-5 sm:px-6 py-3.5 flex items-center justify-between">
                <div class="flex items-center gap-2.5 font-bold text-sm sm:text-base tracking-wide">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <span>Find the Right Doctor</span>
                </div>
                
                <span id="applied-filters-badge" class="bg-white/20 text-white text-xs px-3 py-1 rounded-full font-medium tracking-wide">
                    1 filter applied
                </span>
            </div>
            
            <!-- Card Body Inputs (4 Columns) -->
            <div class="p-5 sm:p-6 bg-white space-y-4 sm:space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                    
                    <!-- 1. COUNTRY -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="2" y1="12" x2="22" y2="12"/>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                            </svg>
                            <span>COUNTRY</span>
                        </label>
                        <div class="relative">
                            <select id="filter-country" class="w-full h-11 pl-3.5 pr-14 text-sm font-semibold text-gray-800 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#27797D] focus:border-transparent transition-all appearance-none cursor-pointer">
                                <option value="Turkey" selected>Turkey</option>
                                <option value="India">India</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Germany">Germany</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Egypt">Egypt</option>
                            </select>
                            
                            <!-- Clear X button & Chevron -->
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none gap-1.5">
                                <span id="clear-country-icon" class="w-4 h-4 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-[10px] pointer-events-auto cursor-pointer hover:bg-gray-300 transition-colors" title="Clear country">✕</span>
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- 2. CITY -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="4" y="2" width="16" height="20" rx="2" ry="2"/>
                                <line x1="9" y1="22" x2="9" y2="22.01"/>
                                <line x1="15" y1="22" x2="15" y2="22.01"/>
                                <line x1="8" y1="6" x2="8" y2="6.01"/>
                                <line x1="16" y1="6" x2="16" y2="6.01"/>
                                <line x1="8" y1="10" x2="8" y2="10.01"/>
                                <line x1="16" y1="10" x2="16" y2="10.01"/>
                                <line x1="8" y1="14" x2="8" y2="14.01"/>
                                <line x1="16" y1="14" x2="16" y2="14.01"/>
                            </svg>
                            <span>CITY</span>
                        </label>
                        <div class="relative">
                            <select id="filter-city" class="w-full h-11 pl-3.5 pr-10 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#27797D] focus:border-transparent transition-all appearance-none cursor-pointer">
                                <option value="">Select city...</option>
                                <option value="Istanbul">Istanbul</option>
                                <option value="Ankara">Ankara</option>
                                <option value="Antalya">Antalya</option>
                                <option value="Izmir">Izmir</option>
                                <option value="Bursa">Bursa</option>
                                <option value="New Delhi">New Delhi</option>
                                <option value="Gurgaon">Gurgaon</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Chennai">Chennai</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                    </div>

                    <!-- 3. DEPARTMENT -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                            </svg>
                            <span>DEPARTMENT</span>
                        </label>
                        <div class="relative">
                            <select id="filter-dept" class="w-full h-11 pl-3.5 pr-10 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#27797D] focus:border-transparent transition-all appearance-none cursor-pointer">
                                <option value="">Select dept...</option>
                                <option value="Urology">Urology & Andrology</option>
                                <option value="Neurosurgery">Neurosurgery & Spine</option>
                                <option value="Cardiology">Cardiology & Cardiac Surgery</option>
                                <option value="Oncology">Oncology & Cancer Care</option>
                                <option value="Orthopedics">Orthopedics & Joint Surgery</option>
                                <option value="Cosmetic">Cosmetic & Plastic Surgery</option>
                                <option value="Bariatric">Bariatric & Weight Loss</option>
                                <option value="Transplant">Organ & Bone Marrow Transplant</option>
                                <option value="IVF">IVF & Reproductive Medicine</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                    </div>

                    <!-- 4. HOSPITAL -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M3 21h18M5 21V7l8-4v18M13 21V3l6 4v14"/>
                            </svg>
                            <span>HOSPITAL</span>
                        </label>
                        <div class="relative">
                            <select id="filter-hospital" class="w-full h-11 pl-3.5 pr-10 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#27797D] focus:border-transparent transition-all appearance-none cursor-pointer">
                                <option value="">Select hospital...</option>
                                <option value="Medicana">Medicana International Hospital</option>
                                <option value="Medipol">Medipol Mega University Hospital</option>
                                <option value="Memorial">Memorial Healthcare Group</option>
                                <option value="Acibadem">Acibadem Healthcare Group</option>
                                <option value="Anadolu">Anadolu Medical Center</option>
                                <option value="Medanta">Medanta - The Medicity</option>
                                <option value="Apollo">Apollo Hospitals</option>
                                <option value="Fortis">Fortis Healthcare</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Bottom Bar: Clear filters & Search button -->
                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                    <button type="button" id="clear-filters-btn" class="text-xs text-gray-500 hover:text-red-600 font-medium inline-flex items-center gap-1.5 transition-colors cursor-pointer">
                        <span>✕</span>
                        <span>Clear filters</span>
                    </button>
                    
                    <button type="button" id="search-doctors-btn" class="inline-flex items-center gap-2 bg-[#f0f9f9] hover:bg-[#27797D] text-[#27797D] hover:text-white border border-blue-200 hover:border-transparent text-xs sm:text-sm font-bold px-6 py-2.5 rounded-lg shadow-xs hover:shadow transition-all duration-150 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                        <span>Search Doctors</span>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- ==================== MAIN CONTENT: LEFT DOCTOR CARDS & RIGHT STICKY FORM ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        
        <!-- Two Column Grid: items-start is critical for sticky behavior -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">
            
            <!-- ==================== LEFT COLUMN: DOCTORS LIST (SCROLLABLE) ==================== -->
            <div class="lg:col-span-8 space-y-5">
                
                <!-- Sub Filter: Filter by Specialty & Results Header -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-gray-200/80 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Filter by Specialty</label>
                        <div class="relative w-56">
                            <select id="specialty-subfilter" class="w-full text-xs font-medium text-gray-700 bg-gray-50 border border-gray-300 rounded-lg px-3 py-2 pr-8 focus:outline-none focus:ring-1 focus:ring-[#27797D] appearance-none cursor-pointer">
                                <option value="all">All specialties</option>
                                <option value="Urologist">Urologist</option>
                                <option value="Neurosurgeon">Neurosurgeon</option>
                                <option value="Cardiac">Cardiac Surgeon</option>
                                <option value="Oncologist">Oncologist</option>
                                <option value="Orthopedic">Orthopedic Surgeon</option>
                                <option value="Bariatric">Bariatric Surgeon</option>
                                <option value="Cosmetic">Plastic & Cosmetic Surgeon</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2.5 pointer-events-none text-gray-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="text-right sm:self-end">
                        <span class="text-xs text-gray-500 font-medium">
                            Showing <strong id="visible-count" class="text-[#27797D] font-bold">6</strong> Specialists
                        </span>
                    </div>
                </div>

                <!-- Doctor Cards Container -->
                <div id="doctors-list" class="space-y-5">

                    <!-- CARD 1: Prof. Dr. Remzi Saglam (Urologist) -->
                    <div class="doctor-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="Turkey" data-city="Istanbul,Ankara" data-dept="Urology" data-specialty="Urologist" data-hospital="Medicana" data-experience="46" data-rating="4.7">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <!-- Left: Photo, Name, Badge, Specs & Rating -->
                            <div class="md:col-span-8 flex flex-col sm:flex-row gap-4 items-start">
                                <!-- Photo -->
                                <div class="w-32 sm:w-36 h-36 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/70 relative">
                                    <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=400&q=80" 
                                         alt="Prof. Dr. Remzi Saglam" 
                                         class="w-full h-full object-cover">
                                    <span class="absolute bottom-1.5 right-1.5 text-[9px] font-bold bg-white/90 text-gray-500 px-1.5 py-0.5 rounded shadow-xs notranslate">Heal Go Fly</span>
                                </div>

                                <!-- Doctor Details -->
                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#27797D] hover:underline cursor-pointer leading-tight">
                                            Prof. Dr. Remzi Saglam
                                        </h2>
                                        <!-- Verified Checkmark -->
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Specialist">✓</span>
                                    </div>

                                    <!-- Specialty Pill -->
                                    <div>
                                        <span class="inline-block bg-sky-50 text-[#27797D] text-xs font-semibold px-3 py-0.5 rounded-full border border-blue-100">
                                            Urologist
                                        </span>
                                    </div>

                                    <!-- Specs with Subtle Gray Icons -->
                                    <div class="space-y-1 text-xs text-gray-600 pt-1">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                            <span>Istanbul, Turkey</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            <span><strong>46+ years</strong> of experience</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                            <span>Senior Consultant</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18M15 3v18M3 9h18M3 15h18"/></svg>
                                            <span>Works At: <a href="{{ route('hospitals') }}" class="text-[#27797D] font-semibold hover:underline">Medicana International Ankara</a></span>
                                        </div>
                                    </div>

                                    <!-- Rating -->
                                    <div class="flex items-center gap-1.5 text-xs text-gray-600 pt-0.5">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★<span class="text-amber-500">★</span>
                                        </div>
                                        <span class="font-bold text-gray-800">4.7</span>
                                        <span class="text-gray-500">(126 Ratings)</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Right: Two Action Buttons -->
                            <div class="md:col-span-4 flex flex-col justify-center space-y-2.5 pt-2 md:pt-0">
                                <a href="#evaluation-form" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                    Contact Doctor
                                </a>
                                <a href="https://wa.me/919129846542?text=Hello%20Heal%20Go%20Fly,%20I%20want%20to%20consult%20Prof.%20Dr.%20Remzi%20Saglam" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                    <span>WhatsApp Us</span>
                                </a>
                            </div>

                        </div>

                        <!-- Bottom Bullet Points with Green Checkmarks -->
                        <div class="pt-3 border-t border-gray-100 space-y-2 text-xs text-gray-600 leading-relaxed">
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>Prof. Dr. Remzi Saglam is a reputed <strong>Urologist</strong> with <strong>42+ years</strong> of experience in the field.</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>He is the General Manager and <strong>Chairman of the Board of Directors</strong>. He was a founding member and chairman of the Endourology Association and the editor of the Journal of Endourology.</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>He graduated from Cerrahpaşa Medical Faculty in 1970 and after working as an Intern at Gülhane Military Medical Academy between 1970-1971, he was appointed as an Air Force in Eskişehir....</span>
                            </div>
                            
                            <div class="pt-1">
                                <button type="button" class="text-[#27797D] hover:underline font-bold text-xs cursor-pointer">
                                    Show more
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- CARD 2: Prof. Dr. Nejat Akalan (Neurosurgeon) -->
                    <div class="doctor-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="Turkey" data-city="Istanbul" data-dept="Neurosurgery" data-specialty="Neurosurgeon" data-hospital="Medipol" data-experience="36" data-rating="4.8">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <div class="md:col-span-8 flex flex-col sm:flex-row gap-4 items-start">
                                <div class="w-32 sm:w-36 h-36 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/70 relative">
                                    <img src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=400&q=80" 
                                         alt="Prof. Dr. Nejat Akalan" 
                                         class="w-full h-full object-cover">
                                    <span class="absolute bottom-1.5 right-1.5 text-[9px] font-bold bg-white/90 text-gray-500 px-1.5 py-0.5 rounded shadow-xs notranslate">Heal Go Fly</span>
                                </div>

                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#27797D] hover:underline cursor-pointer leading-tight">
                                            Prof. Dr. Nejat Akalan
                                        </h2>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Specialist">✓</span>
                                    </div>

                                    <div>
                                        <span class="inline-block bg-sky-50 text-[#27797D] text-xs font-semibold px-3 py-0.5 rounded-full border border-blue-100">
                                            Neurosurgeon
                                        </span>
                                    </div>

                                    <div class="space-y-1 text-xs text-gray-600 pt-1">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                            <span>Istanbul, Turkey</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            <span><strong>36+ years</strong> of experience</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                            <span>Senior Consultant</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18M15 3v18M3 9h18M3 15h18"/></svg>
                                            <span>Works At: <a href="{{ route('hospitals') }}" class="text-[#27797D] font-semibold hover:underline">Medipol Mega University Hospital</a></span>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-1.5 text-xs text-gray-600 pt-0.5">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★<span class="text-amber-500">★</span>
                                        </div>
                                        <span class="font-bold text-gray-800">4.8</span>
                                        <span class="text-gray-500">(142 Ratings)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-4 flex flex-col justify-center space-y-2.5 pt-2 md:pt-0">
                                <a href="#evaluation-form" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                    Contact Doctor
                                </a>
                                <a href="https://wa.me/919129846542?text=Hello%20Heal%20Go%20Fly,%20I%20want%20to%20consult%20Prof.%20Dr.%20Nejat%20Akalan" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                    <span>WhatsApp Us</span>
                                </a>
                            </div>

                        </div>

                        <div class="pt-3 border-t border-gray-100 space-y-2 text-xs text-gray-600 leading-relaxed">
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>Prof. Dr. Nejat Akalan is a globally renowned <strong>Neurosurgeon</strong> with <strong>36+ years</strong> of specialized surgical practice.</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>Specialized in complex pediatric neurosurgery, skull base surgery, brain tumor resections, and epilepsy surgery.</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>Fellow of the European Association of Neurosurgical Societies (EANS) and American Association of Neurological Surgeons (AANS)....</span>
                            </div>
                            
                            <div class="pt-1">
                                <button type="button" class="text-[#27797D] hover:underline font-bold text-xs cursor-pointer">
                                    Show more
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- CARD 3: Prof. Dr. Alper Celik (Bariatric & Metabolic Surgeon) -->
                    <div class="doctor-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="Turkey" data-city="Istanbul" data-dept="Bariatric" data-specialty="Bariatric" data-hospital="Acibadem" data-experience="24" data-rating="4.9">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <div class="md:col-span-8 flex flex-col sm:flex-row gap-4 items-start">
                                <div class="w-32 sm:w-36 h-36 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/70 relative">
                                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=400&q=80" 
                                         alt="Prof. Dr. Alper Celik" 
                                         class="w-full h-full object-cover">
                                    <span class="absolute bottom-1.5 right-1.5 text-[9px] font-bold bg-white/90 text-gray-500 px-1.5 py-0.5 rounded shadow-xs notranslate">Heal Go Fly</span>
                                </div>

                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#27797D] hover:underline cursor-pointer leading-tight">
                                            Prof. Dr. Alper Celik
                                        </h2>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Specialist">✓</span>
                                    </div>

                                    <div>
                                        <span class="inline-block bg-sky-50 text-[#27797D] text-xs font-semibold px-3 py-0.5 rounded-full border border-blue-100">
                                            Bariatric & Metabolic Surgeon
                                        </span>
                                    </div>

                                    <div class="space-y-1 text-xs text-gray-600 pt-1">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                            <span>Istanbul, Turkey</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            <span><strong>24+ years</strong> of experience</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                            <span>Chief of Metabolic Surgery</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18M15 3v18M3 9h18M3 15h18"/></svg>
                                            <span>Works At: <a href="{{ route('hospitals') }}" class="text-[#27797D] font-semibold hover:underline">Acibadem Healthcare Group</a></span>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-1.5 text-xs text-gray-600 pt-0.5">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★★
                                        </div>
                                        <span class="font-bold text-gray-800">4.9</span>
                                        <span class="text-gray-500">(210 Ratings)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-4 flex flex-col justify-center space-y-2.5 pt-2 md:pt-0">
                                <a href="#evaluation-form" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                    Contact Doctor
                                </a>
                                <a href="https://wa.me/919129846542?text=Hello%20Heal%20Go%20Fly,%20I%20want%20to%20consult%20Prof.%20Dr.%20Alper%20Celik" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                    <span>WhatsApp Us</span>
                                </a>
                            </div>

                        </div>

                        <div class="pt-3 border-t border-gray-100 space-y-2 text-xs text-gray-600 leading-relaxed">
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>Pioneer in <strong>Type 2 Diabetes Metabolic Surgery</strong> and laparoscopic bariatric procedures with over <strong>5,000+</strong> successful operations.</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>President of the Turkish Metabolic Surgery Academy and frequent keynote speaker across European medical congresses.</span>
                            </div>
                            
                            <div class="pt-1">
                                <button type="button" class="text-[#27797D] hover:underline font-bold text-xs cursor-pointer">
                                    Show more
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- CARD 4: Dr. Naresh Trehan (Cardiac Surgeon) -->
                    <div class="doctor-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="India" data-city="Gurgaon,New Delhi" data-dept="Cardiology" data-specialty="Cardiac" data-hospital="Medanta" data-experience="48" data-rating="4.9">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <div class="md:col-span-8 flex flex-col sm:flex-row gap-4 items-start">
                                <div class="w-32 sm:w-36 h-36 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/70 relative">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80" 
                                         alt="Dr. Naresh Trehan" 
                                         class="w-full h-full object-cover">
                                    <span class="absolute bottom-1.5 right-1.5 text-[9px] font-bold bg-white/90 text-gray-500 px-1.5 py-0.5 rounded shadow-xs notranslate">Heal Go Fly</span>
                                </div>

                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#27797D] hover:underline cursor-pointer leading-tight">
                                            Dr. Naresh Trehan
                                        </h2>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Specialist">✓</span>
                                    </div>

                                    <div>
                                        <span class="inline-block bg-sky-50 text-[#27797D] text-xs font-semibold px-3 py-0.5 rounded-full border border-blue-100">
                                            Cardiovascular & Cardiothoracic Surgeon
                                        </span>
                                    </div>

                                    <div class="space-y-1 text-xs text-gray-600 pt-1">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                            <span>Gurgaon, India</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            <span><strong>48+ years</strong> of experience</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                            <span>Chairman & Managing Director</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18M15 3v18M3 9h18M3 15h18"/></svg>
                                            <span>Works At: <a href="{{ route('hospitals') }}" class="text-[#27797D] font-semibold hover:underline">Medanta - The Medicity, Gurgaon</a></span>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-1.5 text-xs text-gray-600 pt-0.5">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★★
                                        </div>
                                        <span class="font-bold text-gray-800">4.9</span>
                                        <span class="text-gray-500">(540 Ratings)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-4 flex flex-col justify-center space-y-2.5 pt-2 md:pt-0">
                                <a href="#evaluation-form" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                    Contact Doctor
                                </a>
                                <a href="https://wa.me/919129846542?text=Hello%20Heal%20Go%20Fly,%20I%20want%20to%20consult%20Dr.%20Naresh%20Trehan" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                    <span>WhatsApp Us</span>
                                </a>
                            </div>

                        </div>

                        <div class="pt-3 border-t border-gray-100 space-y-2 text-xs text-gray-600 leading-relaxed">
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>World-renowned cardiovascular surgeon with over <strong>48,000+</strong> open-heart surgeries performed successfully.</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>Trained at New York University Medical Center (NYU), USA; recipient of Padma Bhushan and Padma Shri awards by the President of India.</span>
                            </div>
                            
                            <div class="pt-1">
                                <button type="button" class="text-[#27797D] hover:underline font-bold text-xs cursor-pointer">
                                    Show more
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- CARD 5: Prof. Dr. Omer Faruk Bilgen (Orthopedic Surgeon) -->
                    <div class="doctor-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="Turkey" data-city="Bursa,Istanbul" data-dept="Orthopedics" data-specialty="Orthopedic" data-hospital="Memorial" data-experience="33" data-rating="4.8">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <div class="md:col-span-8 flex flex-col sm:flex-row gap-4 items-start">
                                <div class="w-32 sm:w-36 h-36 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/70 relative">
                                    <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=400&q=80" 
                                         alt="Prof. Dr. Omer Faruk Bilgen" 
                                         class="w-full h-full object-cover">
                                    <span class="absolute bottom-1.5 right-1.5 text-[9px] font-bold bg-white/90 text-gray-500 px-1.5 py-0.5 rounded shadow-xs notranslate">Heal Go Fly</span>
                                </div>

                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#27797D] hover:underline cursor-pointer leading-tight">
                                            Prof. Dr. Omer Faruk Bilgen
                                        </h2>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Specialist">✓</span>
                                    </div>

                                    <div>
                                        <span class="inline-block bg-sky-50 text-[#27797D] text-xs font-semibold px-3 py-0.5 rounded-full border border-blue-100">
                                            Orthopedics & Joint Replacement Surgeon
                                        </span>
                                    </div>

                                    <div class="space-y-1 text-xs text-gray-600 pt-1">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                            <span>Bursa / Istanbul, Turkey</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            <span><strong>33+ years</strong> of experience</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                            <span>Senior Orthopedic Consultant</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18M15 3v18M3 9h18M3 15h18"/></svg>
                                            <span>Works At: <a href="{{ route('hospitals') }}" class="text-[#27797D] font-semibold hover:underline">Memorial Healthcare Group</a></span>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-1.5 text-xs text-gray-600 pt-0.5">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★<span class="text-amber-500">★</span>
                                        </div>
                                        <span class="font-bold text-gray-800">4.8</span>
                                        <span class="text-gray-500">(178 Ratings)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-4 flex flex-col justify-center space-y-2.5 pt-2 md:pt-0">
                                <a href="#evaluation-form" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                    Contact Doctor
                                </a>
                                <a href="https://wa.me/919129846542?text=Hello%20Heal%20Go%20Fly,%20I%20want%20to%20consult%20Prof.%20Dr.%20Omer%20Faruk%20Bilgen" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                    <span>WhatsApp Us</span>
                                </a>
                            </div>

                        </div>

                        <div class="pt-3 border-t border-gray-100 space-y-2 text-xs text-gray-600 leading-relaxed">
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>Master surgeon in robotic knee and hip joint replacements, complex revision arthroplasty, and sports trauma.</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>Member of the American Academy of Orthopaedic Surgeons (AAOS) and European Federation of National Associations of Orthopaedics and Traumatology (EFORT).</span>
                            </div>
                            
                            <div class="pt-1">
                                <button type="button" class="text-[#27797D] hover:underline font-bold text-xs cursor-pointer">
                                    Show more
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- CARD 6: Dr. Ashok Vaid (Medical Oncologist) -->
                    <div class="doctor-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="India" data-city="Gurgaon,New Delhi" data-dept="Oncology" data-specialty="Oncologist" data-hospital="Medanta" data-experience="38" data-rating="4.8">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <div class="md:col-span-8 flex flex-col sm:flex-row gap-4 items-start">
                                <div class="w-32 sm:w-36 h-36 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/70 relative">
                                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80" 
                                         alt="Dr. Ashok Vaid" 
                                         class="w-full h-full object-cover">
                                    <span class="absolute bottom-1.5 right-1.5 text-[9px] font-bold bg-white/90 text-gray-500 px-1.5 py-0.5 rounded shadow-xs notranslate">Heal Go Fly</span>
                                </div>

                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#27797D] hover:underline cursor-pointer leading-tight">
                                            Dr. Ashok Vaid
                                        </h2>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Specialist">✓</span>
                                    </div>

                                    <div>
                                        <span class="inline-block bg-sky-50 text-[#27797D] text-xs font-semibold px-3 py-0.5 rounded-full border border-blue-100">
                                            Medical Oncologist & Bone Marrow Transplant Specialist
                                        </span>
                                    </div>

                                    <div class="space-y-1 text-xs text-gray-600 pt-1">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                            <span>Gurgaon, India</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            <span><strong>38+ years</strong> of experience</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                            <span>Chairman - Medical & Pediatric Oncology</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18M15 3v18M3 9h18M3 15h18"/></svg>
                                            <span>Works At: <a href="{{ route('hospitals') }}" class="text-[#27797D] font-semibold hover:underline">Medanta Cancer Institute</a></span>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-1.5 text-xs text-gray-600 pt-0.5">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★<span class="text-amber-500">★</span>
                                        </div>
                                        <span class="font-bold text-gray-800">4.8</span>
                                        <span class="text-gray-500">(165 Ratings)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-4 flex flex-col justify-center space-y-2.5 pt-2 md:pt-0">
                                <a href="#evaluation-form" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                    Contact Doctor
                                </a>
                                <a href="https://wa.me/919129846542?text=Hello%20Heal%20Go%20Fly,%20I%20want%20to%20consult%20Dr.%20Ashok%20Vaid" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                    <span>WhatsApp Us</span>
                                </a>
                            </div>

                        </div>

                        <div class="pt-3 border-t border-gray-100 space-y-2 text-xs text-gray-600 leading-relaxed">
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>Pioneered 25+ clinical research trials in targeted immunotherapy and autologous/allogeneic bone marrow transplantation.</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="text-emerald-500 font-bold flex-shrink-0">✓</span>
                                <span>Conferred with Padma Shri by the President of India in 2009 for distinguished contributions to oncology.</span>
                            </div>
                            
                            <div class="pt-1">
                                <button type="button" class="text-[#27797D] hover:underline font-bold text-xs cursor-pointer">
                                    Show more
                                </button>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Pagination Bar -->
                <div class="flex items-center justify-center gap-2 pt-6">
                    <button class="w-9 h-9 rounded-lg bg-[#27797D] text-white font-bold text-xs shadow-xs">1</button>
                    <button class="w-9 h-9 rounded-lg bg-white hover:bg-gray-100 text-gray-700 font-semibold text-xs border border-gray-200 transition-colors">2</button>
                    <button class="w-9 h-9 rounded-lg bg-white hover:bg-gray-100 text-gray-700 font-semibold text-xs border border-gray-200 transition-colors">3</button>
                    <span class="text-gray-400 text-xs px-1">...</span>
                    <button class="px-3 h-9 rounded-lg bg-white hover:bg-gray-100 text-gray-700 font-semibold text-xs border border-gray-200 transition-colors inline-flex items-center gap-1">
                        <span>Next</span>
                        <span>›</span>
                    </button>
                </div>

            </div>

            <!-- ==================== RIGHT COLUMN: STICKY EVALUATION FORM & TRUST ==================== -->
            <div class="lg:col-span-4 lg:sticky lg:top-20 z-30 space-y-4">
                
                <!-- The Blue "Get FREE Evaluation" Card -->
                <div id="evaluation-form" class="bg-[#27797D] rounded-2xl p-5 sm:p-6 text-white shadow-xl border border-blue-400/20">
                    
                    <!-- Header -->
                    <div class="mb-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-white p-1 flex-shrink-0">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                    <path d="M12 8v8M8 12h8"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-white tracking-tight">Get FREE Evaluation</h3>
                        </div>
                        <p class="text-xs text-blue-100 mt-1">Treatment plan and quote within 2 days</p>
                    </div>

                    <!-- Evaluation Form -->
                    <form action="#" method="POST" class="space-y-3" onsubmit="event.preventDefault(); alert('Thank you! Your free evaluation request has been submitted. Our medical team will contact you within 2 days with doctor recommendations.');">
                        @csrf
                        
                        <!-- 1. Patient Name -->
                        <div>
                            <input type="text" name="patient_name" required placeholder="Patient Name" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- 2. Country Dropdown -->
                        <div class="relative">
                            <select name="country" class="w-full text-xs text-gray-900 bg-white px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415] appearance-none cursor-pointer font-medium">
                                <option value="Turkey" selected>Turkey</option>
                                <option value="India">India</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Russia">Russia</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="Other">Other Country</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>

                        <!-- 3. Select City -->
                        <div>
                            <input type="text" name="city" placeholder="Select City" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- 4. Phone with Country Code (+91 or +90) -->
                        <div class="flex gap-2">
                            <div class="w-16 bg-white rounded-lg flex items-center justify-center text-xs font-bold text-gray-700 px-2 flex-shrink-0">
                                +90
                            </div>
                            <input type="tel" name="phone" required placeholder="Your Phone number" class="flex-1 text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- 5. Medical Problem Textarea -->
                        <div>
                            <textarea name="problem" rows="3" placeholder="Describe The Current Medical Problem.." class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]"></textarea>
                        </div>

                        <!-- 6. Age or DOB -->
                        <div>
                            <input type="text" name="age_dob" placeholder="Example: 30 Yrs or 29-05-1985" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- 7. Red Continue Button -->
                        <button type="submit" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-sm font-bold py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 transform hover:-translate-y-0.5">
                            Continue →
                        </button>
                    </form>

                    <!-- Terms & Privacy -->
                    <p class="text-[11px] text-blue-100/90 text-center mt-3 leading-snug">
                        By submitting I agree to the <a href="#terms" class="underline hover:text-white font-medium">Terms of Use</a> and <a href="#privacy" class="underline hover:text-white font-medium">Privacy Policy</a> of Heal Go Fly.
                    </p>
                </div>

                <!-- Trust Badges Below The Sticky Form -->
                <div class="bg-white rounded-xl border border-gray-200/90 p-4 space-y-3.5 shadow-xs">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0 text-red-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-gray-900">Data Privacy Guaranteed</span>
                            <span class="block text-[11px] text-gray-500">Your information is secure</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-2.5 border-t border-gray-100">
                        <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0 text-red-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M3 18v-6a9 9 0 0 1 18 0v6"/>
                                <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-gray-900">24/7 Patient Support</span>
                            <span class="block text-[11px] text-gray-500">Get assistance anytime</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const countrySelect = document.getElementById('filter-country');
        const citySelect = document.getElementById('filter-city');
        const deptSelect = document.getElementById('filter-dept');
        const hospitalSelect = document.getElementById('filter-hospital');
        const specialtyFilter = document.getElementById('specialty-subfilter');
        const searchBtn = document.getElementById('search-doctors-btn');
        const clearBtn = document.getElementById('clear-filters-btn');
        const clearCountryIcon = document.getElementById('clear-country-icon');
        const appliedBadge = document.getElementById('applied-filters-badge');
        const visibleCountSpan = document.getElementById('visible-count');
        const pageHeading = document.getElementById('page-heading');
        const breadcrumbCountry = document.getElementById('breadcrumb-country');
        const doctorCards = document.querySelectorAll('.doctor-card');

        // Update Applied Filters Count
        function updateFilterBadge() {
            let count = 0;
            if (countrySelect && countrySelect.value) count++;
            if (citySelect && citySelect.value) count++;
            if (deptSelect && deptSelect.value) count++;
            if (hospitalSelect && hospitalSelect.value) count++;

            if (appliedBadge) {
                appliedBadge.textContent = count + (count === 1 ? ' filter applied' : ' filters applied');
            }
        }

        // Filter doctors
        function filterDoctors() {
            const country = countrySelect ? countrySelect.value.toLowerCase().trim() : '';
            const city = citySelect ? citySelect.value.toLowerCase().trim() : '';
            const dept = deptSelect ? deptSelect.value.toLowerCase().trim() : '';
            const hosp = hospitalSelect ? hospitalSelect.value.toLowerCase().trim() : '';
            const spec = specialtyFilter ? specialtyFilter.value.toLowerCase().trim() : 'all';

            // Heading & Breadcrumbs
            if (countrySelect && countrySelect.value) {
                pageHeading.textContent = 'Best Doctors in ' + countrySelect.value;
                breadcrumbCountry.textContent = countrySelect.value;
            } else {
                pageHeading.textContent = 'Best Doctors';
                breadcrumbCountry.textContent = 'All';
            }

            let visible = 0;
            doctorCards.forEach(card => {
                const cardCountry = (card.getAttribute('data-country') || '').toLowerCase();
                const cardCity = (card.getAttribute('data-city') || '').toLowerCase();
                const cardDept = (card.getAttribute('data-dept') || '').toLowerCase();
                const cardHosp = (card.getAttribute('data-hospital') || '').toLowerCase();
                const cardSpec = (card.getAttribute('data-specialty') || '').toLowerCase();

                let matchCountry = !country || cardCountry.includes(country);
                let matchCity = !city || cardCity.includes(city);
                let matchDept = !dept || cardDept.includes(dept);
                let matchHosp = !hosp || cardHosp.includes(hosp);
                let matchSpec = spec === 'all' || cardSpec.includes(spec);

                if (matchCountry && matchCity && matchDept && matchHosp && matchSpec) {
                    card.style.display = 'block';
                    visible++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (visibleCountSpan) {
                visibleCountSpan.textContent = visible;
            }
            updateFilterBadge();
        }

        // Clear Country
        if (clearCountryIcon) {
            clearCountryIcon.addEventListener('click', (e) => {
                e.stopPropagation();
                if (countrySelect) {
                    countrySelect.value = '';
                    filterDoctors();
                }
            });
        }

        // Clear all
        if (clearBtn) {
            clearBtn.addEventListener('click', () => {
                if (countrySelect) countrySelect.value = 'Turkey';
                if (citySelect) citySelect.value = '';
                if (deptSelect) deptSelect.value = '';
                if (hospitalSelect) hospitalSelect.value = '';
                if (specialtyFilter) specialtyFilter.value = 'all';
                filterDoctors();
            });
        }

        // Listeners
        if (searchBtn) searchBtn.addEventListener('click', filterDoctors);
        if (countrySelect) countrySelect.addEventListener('change', filterDoctors);
        if (citySelect) citySelect.addEventListener('change', filterDoctors);
        if (deptSelect) deptSelect.addEventListener('change', filterDoctors);
        if (hospitalSelect) hospitalSelect.addEventListener('change', filterDoctors);
        if (specialtyFilter) specialtyFilter.addEventListener('change', filterDoctors);

        // Show More toggle on bullets
        document.querySelectorAll('.doctor-card button').forEach(btn => {
            btn.addEventListener('click', () => {
                const text = btn.textContent.trim().toLowerCase();
                if (text.includes('more')) {
                    btn.textContent = 'Show less';
                } else if (text.includes('less')) {
                    btn.textContent = 'Show more';
                }
            });
        });

        // Initialize
        updateFilterBadge();
    });
</script>
@endpush
