@extends('frontend.layouts.app')

@section('title', 'Best Hospitals in India - Top Rated Hospitals & Cost Comparison | Vaidam.com')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-50/80 border-b border-gray-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium">
                <a href="{{ url('/') }}" class="hover:text-[#00539C] transition-colors">Home</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('hospitals') }}" class="hover:text-[#00539C] transition-colors">Hospitals</a>
                <span class="text-gray-400">›</span>
                <span class="text-[#112347] font-semibold" id="breadcrumb-country">India</span>
            </nav>
        </div>
    </div>

    <!-- ==================== PAGE TITLE ==================== -->
    <div class="py-6 sm:py-9 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#112347] tracking-tight" id="page-heading">
                Best Hospitals in India
            </h1>
            <p class="text-xs sm:text-sm text-[#5a6a85] mt-2 max-w-2xl mx-auto leading-relaxed">
                Compare NABH & JCI accredited multi-specialty hospitals in India. View doctors, bed capacity, medical procedures, and request free cost estimates.
            </p>
        </div>
    </div>

    <!-- ==================== SEARCH & FILTER CONTAINER ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 mb-8 sm:mb-12">
        <div class="rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.06)] border border-gray-200/90 overflow-hidden bg-white">
            
            <!-- Card Top Blue Bar -->
            <div class="bg-[#00539C] text-white px-5 sm:px-6 py-3.5 flex items-center justify-between">
                <div class="flex items-center gap-2.5 font-bold text-sm sm:text-base tracking-wide">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <span>Find the Right Hospital</span>
                </div>
                
                <span id="applied-filters-badge" class="bg-white/20 text-white text-xs px-3 py-1 rounded-full font-medium tracking-wide">
                    1 filter applied
                </span>
            </div>
            
            <!-- Card Body Inputs -->
            <div class="p-5 sm:p-6 bg-white space-y-4 sm:space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
                    
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
                            <select id="filter-country" class="w-full h-11 pl-3.5 pr-14 text-sm font-semibold text-gray-800 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00539C] focus:border-transparent transition-all appearance-none cursor-pointer">
                                <option value="India" selected>India</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Germany">Germany</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Egypt">Egypt</option>
                                <option value="Malaysia">Malaysia</option>
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
                            <select id="filter-city" class="w-full h-11 pl-3.5 pr-10 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00539C] focus:border-transparent transition-all appearance-none cursor-pointer">
                                <option value="">Select city...</option>
                                <option value="New Delhi">New Delhi</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Gurgaon">Gurgaon / Gurugram</option>
                                <option value="Chennai">Chennai</option>
                                <option value="Bangalore">Bangalore / Bengaluru</option>
                                <option value="Hyderabad">Hyderabad</option>
                                <option value="Kolkata">Kolkata</option>
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
                            <select id="filter-dept" class="w-full h-11 pl-3.5 pr-10 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00539C] focus:border-transparent transition-all appearance-none cursor-pointer">
                                <option value="">Select dept...</option>
                                <option value="Cardiology">Cardiology & Cardiac Surgery</option>
                                <option value="Oncology">Oncology & Cancer Care</option>
                                <option value="Orthopedics">Orthopedics & Joint Replacement</option>
                                <option value="Neurology">Neurology & Neurosurgery</option>
                                <option value="Spine">Spine Surgery</option>
                                <option value="Transplant">Organ Transplant (Liver / Kidney)</option>
                                <option value="Bone Marrow">Bone Marrow Transplant</option>
                                <option value="IVF">IVF & Infertility</option>
                                <option value="Cosmetic">Cosmetic & Plastic Surgery</option>
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
                    
                    <button type="button" id="search-hospitals-btn" class="inline-flex items-center gap-2 bg-[#f0f7fe] hover:bg-[#00539C] text-[#00539C] hover:text-white border border-blue-200 hover:border-transparent text-xs sm:text-sm font-bold px-6 py-2.5 rounded-lg shadow-xs hover:shadow transition-all duration-150 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                        <span>Search Hospitals</span>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- ==================== MAIN SECTION: LEFT SCROLLING LIST & RIGHT STICKY FORM ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        
        <!-- Two Column Grid: items-start is essential for sticky sidebar! -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">
            
            <!-- ==================== LEFT COLUMN: HOSPITAL CARDS (SCROLLABLE) ==================== -->
            <div class="lg:col-span-8 space-y-5">
                
                <!-- Results Bar & Quick City Pills -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-gray-200/80 shadow-xs space-y-3.5">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <span class="text-sm font-bold text-gray-900">
                                Showing <span id="visible-count" class="text-[#00539C]">8</span> Best Hospitals in India
                            </span>
                            <p class="text-xs text-gray-500 mt-0.5">Accredited by JCI, NABH, and international healthcare boards</p>
                        </div>

                        <!-- Sort By Dropdown -->
                        <div class="flex items-center gap-2 text-xs">
                            <span class="text-gray-500 font-medium">Sort by:</span>
                            <select id="sort-hospitals" class="bg-gray-50 border border-gray-300 text-gray-700 text-xs rounded-md px-2.5 py-1.5 focus:outline-none focus:ring-1 focus:ring-[#00539C] cursor-pointer">
                                <option value="recommended">Recommended</option>
                                <option value="rating">Highest Rated</option>
                                <option value="beds">Most Beds</option>
                                <option value="established">Most Established</option>
                            </select>
                        </div>
                    </div>

                    <!-- Quick City Filter Pills -->
                    <div class="flex items-center gap-2 overflow-x-auto pb-1 pt-1 no-scrollbar text-xs">
                        <span class="text-gray-400 font-bold uppercase text-[10px] tracking-wider whitespace-nowrap">City:</span>
                        <button type="button" class="city-pill active px-3 py-1 rounded-full font-semibold bg-[#00539C] text-white transition-colors" data-city="all">All</button>
                        <button type="button" class="city-pill px-3 py-1 rounded-full font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors" data-city="New Delhi">New Delhi</button>
                        <button type="button" class="city-pill px-3 py-1 rounded-full font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors" data-city="Mumbai">Mumbai</button>
                        <button type="button" class="city-pill px-3 py-1 rounded-full font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors" data-city="Gurgaon">Gurgaon</button>
                        <button type="button" class="city-pill px-3 py-1 rounded-full font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors" data-city="Chennai">Chennai</button>
                        <button type="button" class="city-pill px-3 py-1 rounded-full font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors" data-city="Bangalore">Bangalore</button>
                    </div>
                </div>

                <!-- Hospital Cards List -->
                <div id="hospitals-list" class="space-y-5">

                    <!-- CARD 1: Indraprastha Apollo Hospital, New Delhi -->
                    <div class="hospital-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="India" data-city="New Delhi" data-dept="Transplant,Cardiology,Oncology,Spine,Orthopedics,IVF" data-rating="4.3" data-beds="710" data-established="1995">
                        
                        <!-- Top Details Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <!-- Left: Thumbnail + Title, Rating & Seals -->
                            <div class="md:col-span-7 flex flex-col sm:flex-row gap-4 items-start">
                                <!-- Thumbnail -->
                                <div class="w-32 sm:w-36 h-28 sm:h-28 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/60">
                                    <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=400&q=80" 
                                         alt="Indraprastha Apollo Hospital, New Delhi" 
                                         class="w-full h-full object-cover">
                                </div>

                                <!-- Title & Accreditation Emblems -->
                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#00539C] leading-tight">
                                            <a href="{{ route('hospital.details') }}" class="hover:underline">Indraprastha Apollo Hospital, New Delhi</a>
                                        </h2>
                                        <!-- Verified Checkmark Icon -->
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Hospital">✓</span>
                                        <!-- Featured Badge -->
                                        <span class="bg-[#e13b3f] text-white text-[10px] font-bold px-2 py-0.5 rounded-full tracking-wide">Featured</span>
                                    </div>

                                    <!-- Rating -->
                                    <div class="flex items-center gap-1.5 text-xs text-gray-600">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★<span class="text-gray-300">★</span>
                                        </div>
                                        <span class="font-bold text-gray-800">4.3</span>
                                        <span class="text-gray-500">(86 Ratings)</span>
                                    </div>

                                    <!-- Accreditation Seals -->
                                    <div class="flex items-center gap-2 pt-1">
                                        <!-- Gold JCI Medal -->
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-amber-400 to-yellow-200 border-2 border-amber-500 flex items-center justify-center shadow-xs text-amber-800" title="JCI Accredited">
                                            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                        </div>
                                        <!-- NABH Certified Seal -->
                                        <div class="w-7 h-7 rounded-full border-2 border-red-500 bg-white flex items-center justify-center p-0.5 shadow-xs" title="NABH Certified">
                                            <div class="w-full h-full rounded-full bg-blue-600 flex items-center justify-center text-white text-[8px] font-extrabold">N</div>
                                        </div>
                                        <!-- Green Medical Seal -->
                                        <div class="w-7 h-7 rounded-full bg-teal-50 border-2 border-teal-500 text-teal-700 flex items-center justify-center shadow-xs text-[9px] font-bold" title="NABL Accredited">
                                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right: Key Specs & Two Stacked Buttons -->
                            <div class="md:col-span-5 flex flex-col justify-between h-full space-y-3">
                                <div class="space-y-1.5 text-xs text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        <span>Established in: <strong class="text-gray-800 font-semibold">1995</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M2 4v16M2 8h18a2 2 0 0 1 2 2v10M2 17h20M6 8v9"/></svg>
                                        <span>Number of Beds: <strong class="text-gray-800 font-semibold">710</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 2v20M2 12h20"/></svg>
                                        <span><strong class="text-gray-800 font-semibold">Multi Specialty</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                        <span>Location: <strong class="text-gray-800 font-semibold">New Delhi, India</strong></span>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="space-y-2 pt-1">
                                    <a href="#evaluation-form" class="w-full bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                        Book Appointment
                                    </a>
                                    <a href="https://wa.me/919999999999?text=Hello%20Vaidam,%20I%20am%20interested%20in%20Indraprastha%20Apollo%20Hospital%20New%20Delhi" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>WhatsApp Us</span>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <!-- Bottom Description & Show More -->
                        <div class="pt-2 border-t border-gray-100 flex flex-col sm:flex-row sm:items-end justify-between gap-2">
                            <p class="text-xs text-gray-500 leading-relaxed flex-1 hospital-desc">
                                Indraprastha Apollo Hospital, the Apollo Hospitals Group's flagship, is India's premier multi-super specialty hospital. It was founded as a joint venture with the Government of Delhi and has constantly ranked at the top of medical quality....
                            </p>
                            <button type="button" class="show-more-btn text-[#00539C] hover:underline font-bold text-xs whitespace-nowrap self-end sm:self-auto cursor-pointer">
                                Show More
                            </button>
                        </div>

                    </div>

                    <!-- CARD 2: Kokilaben Dhirubhai Ambani Hospital, Mumbai -->
                    <div class="hospital-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="India" data-city="Mumbai" data-dept="Oncology,Cardiology,Neurology,Orthopedics,Transplant,Cosmetic" data-rating="3.5" data-beds="750" data-established="2008">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <div class="md:col-span-7 flex flex-col sm:flex-row gap-4 items-start">
                                <div class="w-32 sm:w-36 h-28 sm:h-28 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/60">
                                    <img src="https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?auto=format&fit=crop&w=400&q=80" 
                                         alt="Kokilaben Dhirubhai Ambani Hospital, Mumbai" 
                                         class="w-full h-full object-cover">
                                </div>

                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#00539C] hover:underline cursor-pointer leading-tight">
                                            Kokilaben Dhirubhai Ambani Hospital, Mumbai
                                        </h2>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Hospital">✓</span>
                                    </div>

                                    <div class="flex items-center gap-1.5 text-xs text-gray-600">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★<span class="text-gray-300">★★</span>
                                        </div>
                                        <span class="font-bold text-gray-800">3.5</span>
                                        <span class="text-gray-500">(77 Ratings)</span>
                                    </div>

                                    <div class="flex items-center gap-2 pt-1">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-amber-400 to-yellow-200 border-2 border-amber-500 flex items-center justify-center shadow-xs text-amber-800" title="JCI Accredited">
                                            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                        </div>
                                        <div class="w-7 h-7 rounded-full border-2 border-red-500 bg-white flex items-center justify-center p-0.5 shadow-xs" title="NABH Certified">
                                            <div class="w-full h-full rounded-full bg-blue-600 flex items-center justify-center text-white text-[8px] font-extrabold">N</div>
                                        </div>
                                        <div class="w-7 h-7 rounded-full bg-teal-50 border-2 border-teal-500 text-teal-700 flex items-center justify-center shadow-xs text-[9px] font-bold" title="NABL Accredited">
                                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-5 flex flex-col justify-between h-full space-y-3">
                                <div class="space-y-1.5 text-xs text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        <span>Established in: <strong class="text-gray-800 font-semibold">2008</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M2 4v16M2 8h18a2 2 0 0 1 2 2v10M2 17h20M6 8v9"/></svg>
                                        <span>Number of Beds: <strong class="text-gray-800 font-semibold">750</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 2v20M2 12h20"/></svg>
                                        <span><strong class="text-gray-800 font-semibold">Multi Specialty</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                        <span>Location: <strong class="text-gray-800 font-semibold">Mumbai, India</strong></span>
                                    </div>
                                </div>

                                <div class="space-y-2 pt-1">
                                    <a href="#evaluation-form" class="w-full bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                        Book Appointment
                                    </a>
                                    <a href="https://wa.me/919999999999?text=Hello%20Vaidam,%20I%20am%20interested%20in%20Kokilaben%20Hospital%20Mumbai" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>WhatsApp Us</span>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="pt-2 border-t border-gray-100 flex flex-col sm:flex-row sm:items-end justify-between gap-2">
                            <p class="text-xs text-gray-500 leading-relaxed flex-1 hospital-desc">
                                Kokilaben Dhirubhai Ambani Hospital, one of the most modern and state-of-the-art multi-speciality tertiary care hospitals in Mumbai, was launched in 2008 by Reliance Group. It is the only hospital in Mumbai with all four renowned accreditations, including the National...
                            </p>
                            <button type="button" class="show-more-btn text-[#00539C] hover:underline font-bold text-xs whitespace-nowrap self-end sm:self-auto cursor-pointer">
                                Show More
                            </button>
                        </div>

                    </div>

                    <!-- CARD 3: Medanta - The Medicity, Gurgaon -->
                    <div class="hospital-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="India" data-city="Gurgaon" data-dept="Cardiology,Oncology,Transplant,Orthopedics,Neurology" data-rating="3.8" data-beds="1600" data-established="2009">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <div class="md:col-span-7 flex flex-col sm:flex-row gap-4 items-start">
                                <div class="w-32 sm:w-36 h-28 sm:h-28 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/60">
                                    <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=400&q=80" 
                                         alt="Medanta - The Medicity, Gurgaon" 
                                         class="w-full h-full object-cover">
                                </div>

                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#00539C] hover:underline cursor-pointer leading-tight">
                                            Medanta - The Medicity, Gurgaon
                                        </h2>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Hospital">✓</span>
                                        <span class="bg-[#e13b3f] text-white text-[10px] font-bold px-2 py-0.5 rounded-full tracking-wide">Featured</span>
                                    </div>

                                    <div class="flex items-center gap-1.5 text-xs text-gray-600">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★<span class="text-gray-300">★</span>
                                        </div>
                                        <span class="font-bold text-gray-800">3.8</span>
                                        <span class="text-gray-500">(69 Ratings)</span>
                                    </div>

                                    <div class="flex items-center gap-2 pt-1">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-amber-400 to-yellow-200 border-2 border-amber-500 flex items-center justify-center shadow-xs text-amber-800" title="JCI Accredited">
                                            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                        </div>
                                        <div class="w-7 h-7 rounded-full border-2 border-red-500 bg-white flex items-center justify-center p-0.5 shadow-xs" title="NABH Certified">
                                            <div class="w-full h-full rounded-full bg-blue-600 flex items-center justify-center text-white text-[8px] font-extrabold">N</div>
                                        </div>
                                        <div class="w-7 h-7 rounded-full bg-teal-50 border-2 border-teal-500 text-teal-700 flex items-center justify-center shadow-xs text-[9px] font-bold" title="NABL Accredited">
                                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-5 flex flex-col justify-between h-full space-y-3">
                                <div class="space-y-1.5 text-xs text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        <span>Established in: <strong class="text-gray-800 font-semibold">2009</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M2 4v16M2 8h18a2 2 0 0 1 2 2v10M2 17h20M6 8v9"/></svg>
                                        <span>Number of Beds: <strong class="text-gray-800 font-semibold">1,600</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 2v20M2 12h20"/></svg>
                                        <span><strong class="text-gray-800 font-semibold">Super Specialty</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                        <span>Location: <strong class="text-gray-800 font-semibold">Gurgaon, Haryana, India</strong></span>
                                    </div>
                                </div>

                                <div class="space-y-2 pt-1">
                                    <a href="#evaluation-form" class="w-full bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                        Book Appointment
                                    </a>
                                    <a href="https://wa.me/919999999999?text=Hello%20Vaidam,%20I%20am%20interested%20in%20Medanta%20Gurgaon" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>WhatsApp Us</span>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="pt-2 border-t border-gray-100 flex flex-col sm:flex-row sm:items-end justify-between gap-2">
                            <p class="text-xs text-gray-500 leading-relaxed flex-1 hospital-desc">
                                Founded by eminent cardiac surgeon Dr. Naresh Trehan, Medanta - The Medicity is one of India's largest multi-super specialty institutes. Spread across 43 acres with over 800 doctors, it features CyberKnife, Da Vinci robotic surgery...
                            </p>
                            <button type="button" class="show-more-btn text-[#00539C] hover:underline font-bold text-xs whitespace-nowrap self-end sm:self-auto cursor-pointer">
                                Show More
                            </button>
                        </div>

                    </div>

                    <!-- CARD 4: Fortis Memorial Research Institute (FMRI), Gurgaon -->
                    <div class="hospital-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="India" data-city="Gurgaon" data-dept="Bone Marrow,Oncology,Neurology,Orthopedics,Transplant" data-rating="4.9" data-beds="1000" data-established="2013">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <div class="md:col-span-7 flex flex-col sm:flex-row gap-4 items-start">
                                <div class="w-32 sm:w-36 h-28 sm:h-28 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/60">
                                    <img src="https://images.unsplash.com/photo-1512678080530-7760d81faba6?auto=format&fit=crop&w=400&q=80" 
                                         alt="Fortis Memorial Research Institute, Gurgaon" 
                                         class="w-full h-full object-cover">
                                </div>

                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#00539C] hover:underline cursor-pointer leading-tight">
                                            Fortis Memorial Research Institute (FMRI), Gurgaon
                                        </h2>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Hospital">✓</span>
                                    </div>

                                    <div class="flex items-center gap-1.5 text-xs text-gray-600">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★★
                                        </div>
                                        <span class="font-bold text-gray-800">4.9</span>
                                        <span class="text-gray-500">(980+ Ratings)</span>
                                    </div>

                                    <div class="flex items-center gap-2 pt-1">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-amber-400 to-yellow-200 border-2 border-amber-500 flex items-center justify-center shadow-xs text-amber-800" title="JCI Accredited">
                                            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                        </div>
                                        <div class="w-7 h-7 rounded-full border-2 border-red-500 bg-white flex items-center justify-center p-0.5 shadow-xs" title="NABH Certified">
                                            <div class="w-full h-full rounded-full bg-blue-600 flex items-center justify-center text-white text-[8px] font-extrabold">N</div>
                                        </div>
                                        <div class="w-7 h-7 rounded-full bg-teal-50 border-2 border-teal-500 text-teal-700 flex items-center justify-center shadow-xs text-[9px] font-bold" title="NABL Accredited">
                                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-5 flex flex-col justify-between h-full space-y-3">
                                <div class="space-y-1.5 text-xs text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        <span>Established in: <strong class="text-gray-800 font-semibold">2013</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M2 4v16M2 8h18a2 2 0 0 1 2 2v10M2 17h20M6 8v9"/></svg>
                                        <span>Number of Beds: <strong class="text-gray-800 font-semibold">1,000</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 2v20M2 12h20"/></svg>
                                        <span><strong class="text-gray-800 font-semibold">Super Specialty</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                        <span>Location: <strong class="text-gray-800 font-semibold">Gurgaon, Haryana, India</strong></span>
                                    </div>
                                </div>

                                <div class="space-y-2 pt-1">
                                    <a href="#evaluation-form" class="w-full bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                        Book Appointment
                                    </a>
                                    <a href="https://wa.me/919999999999?text=Hello%20Vaidam,%20I%20am%20interested%20in%20Fortis%20FMRI%20Gurgaon" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>WhatsApp Us</span>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="pt-2 border-t border-gray-100 flex flex-col sm:flex-row sm:items-end justify-between gap-2">
                            <p class="text-xs text-gray-500 leading-relaxed flex-1 hospital-desc">
                                Often called the "Mecca of Healthcare" for the Asia-Pacific region, FMRI is ranked second globally among technologically advanced hospitals. Celebrated for pediatric cardiac surgery, adult bone marrow transplants, and neuro-oncology...
                            </p>
                            <button type="button" class="show-more-btn text-[#00539C] hover:underline font-bold text-xs whitespace-nowrap self-end sm:self-auto cursor-pointer">
                                Show More
                            </button>
                        </div>

                    </div>

                    <!-- CARD 5: Max Super Speciality Hospital, Saket, New Delhi -->
                    <div class="hospital-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="India" data-city="New Delhi" data-dept="Oncology,Cardiology,Neurology,Orthopedics,Cosmetic" data-rating="4.8" data-beds="550" data-established="2006">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <div class="md:col-span-7 flex flex-col sm:flex-row gap-4 items-start">
                                <div class="w-32 sm:w-36 h-28 sm:h-28 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/60">
                                    <img src="https://images.unsplash.com/photo-1538108149393-fbbd81895907?auto=format&fit=crop&w=400&q=80" 
                                         alt="Max Super Speciality Hospital, Saket, New Delhi" 
                                         class="w-full h-full object-cover">
                                </div>

                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#00539C] hover:underline cursor-pointer leading-tight">
                                            Max Super Speciality Hospital, Saket, New Delhi
                                        </h2>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Hospital">✓</span>
                                    </div>

                                    <div class="flex items-center gap-1.5 text-xs text-gray-600">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★<span class="text-amber-500">★</span>
                                        </div>
                                        <span class="font-bold text-gray-800">4.8</span>
                                        <span class="text-gray-500">(1,450+ Ratings)</span>
                                    </div>

                                    <div class="flex items-center gap-2 pt-1">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-amber-400 to-yellow-200 border-2 border-amber-500 flex items-center justify-center shadow-xs text-amber-800" title="JCI Accredited">
                                            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                        </div>
                                        <div class="w-7 h-7 rounded-full border-2 border-red-500 bg-white flex items-center justify-center p-0.5 shadow-xs" title="NABH Certified">
                                            <div class="w-full h-full rounded-full bg-blue-600 flex items-center justify-center text-white text-[8px] font-extrabold">N</div>
                                        </div>
                                        <div class="w-7 h-7 rounded-full bg-teal-50 border-2 border-teal-500 text-teal-700 flex items-center justify-center shadow-xs text-[9px] font-bold" title="NABL Accredited">
                                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-5 flex flex-col justify-between h-full space-y-3">
                                <div class="space-y-1.5 text-xs text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        <span>Established in: <strong class="text-gray-800 font-semibold">2006</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M2 4v16M2 8h18a2 2 0 0 1 2 2v10M2 17h20M6 8v9"/></svg>
                                        <span>Number of Beds: <strong class="text-gray-800 font-semibold">550</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 2v20M2 12h20"/></svg>
                                        <span><strong class="text-gray-800 font-semibold">Super Specialty</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                        <span>Location: <strong class="text-gray-800 font-semibold">New Delhi, India</strong></span>
                                    </div>
                                </div>

                                <div class="space-y-2 pt-1">
                                    <a href="#evaluation-form" class="w-full bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                        Book Appointment
                                    </a>
                                    <a href="https://wa.me/919999999999?text=Hello%20Vaidam,%20I%20am%20interested%20in%20Max%20Saket%20New%20Delhi" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>WhatsApp Us</span>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="pt-2 border-t border-gray-100 flex flex-col sm:flex-row sm:items-end justify-between gap-2">
                            <p class="text-xs text-gray-500 leading-relaxed flex-1 hospital-desc">
                                Premier multi-specialty tertiary care hospital with Asia's first BrainSUITE intraoperative MRI-equipped neurosurgical theatre. Famous for Novalis Tx radiosurgery and high-volume joint replacements...
                            </p>
                            <button type="button" class="show-more-btn text-[#00539C] hover:underline font-bold text-xs whitespace-nowrap self-end sm:self-auto cursor-pointer">
                                Show More
                            </button>
                        </div>

                    </div>

                    <!-- CARD 6: Apollo Hospitals, Greams Road, Chennai -->
                    <div class="hospital-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="India" data-city="Chennai" data-dept="Cardiology,Oncology,Transplant,Orthopedics,Neurology" data-rating="4.9" data-beds="600" data-established="1983">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <div class="md:col-span-7 flex flex-col sm:flex-row gap-4 items-start">
                                <div class="w-32 sm:w-36 h-28 sm:h-28 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/60">
                                    <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=400&q=80" 
                                         alt="Apollo Hospitals, Greams Road, Chennai" 
                                         class="w-full h-full object-cover">
                                </div>

                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#00539C] hover:underline cursor-pointer leading-tight">
                                            Apollo Hospitals, Greams Road, Chennai
                                        </h2>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Hospital">✓</span>
                                        <span class="bg-[#e13b3f] text-white text-[10px] font-bold px-2 py-0.5 rounded-full tracking-wide">Featured</span>
                                    </div>

                                    <div class="flex items-center gap-1.5 text-xs text-gray-600">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★★
                                        </div>
                                        <span class="font-bold text-gray-800">4.9</span>
                                        <span class="text-gray-500">(3,200+ Ratings)</span>
                                    </div>

                                    <div class="flex items-center gap-2 pt-1">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-amber-400 to-yellow-200 border-2 border-amber-500 flex items-center justify-center shadow-xs text-amber-800" title="JCI Accredited">
                                            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                        </div>
                                        <div class="w-7 h-7 rounded-full border-2 border-red-500 bg-white flex items-center justify-center p-0.5 shadow-xs" title="NABH Certified">
                                            <div class="w-full h-full rounded-full bg-blue-600 flex items-center justify-center text-white text-[8px] font-extrabold">N</div>
                                        </div>
                                        <div class="w-7 h-7 rounded-full bg-teal-50 border-2 border-teal-500 text-teal-700 flex items-center justify-center shadow-xs text-[9px] font-bold" title="NABL Accredited">
                                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-5 flex flex-col justify-between h-full space-y-3">
                                <div class="space-y-1.5 text-xs text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        <span>Established in: <strong class="text-gray-800 font-semibold">1983</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M2 4v16M2 8h18a2 2 0 0 1 2 2v10M2 17h20M6 8v9"/></svg>
                                        <span>Number of Beds: <strong class="text-gray-800 font-semibold">600</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 2v20M2 12h20"/></svg>
                                        <span><strong class="text-gray-800 font-semibold">Multi Specialty</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                        <span>Location: <strong class="text-gray-800 font-semibold">Chennai, Tamil Nadu, India</strong></span>
                                    </div>
                                </div>

                                <div class="space-y-2 pt-1">
                                    <a href="#evaluation-form" class="w-full bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                        Book Appointment
                                    </a>
                                    <a href="https://wa.me/919999999999?text=Hello%20Vaidam,%20I%20am%20interested%20in%20Apollo%20Chennai" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>WhatsApp Us</span>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="pt-2 border-t border-gray-100 flex flex-col sm:flex-row sm:items-end justify-between gap-2">
                            <p class="text-xs text-gray-500 leading-relaxed flex-1 hospital-desc">
                                The flagship institution of Apollo Hospitals Group. Features South Asia's first Proton Beam Cancer Therapy Centre, robotic cardiac surgery, and one of the highest cardiac bypass success rates globally (99.6%)...
                            </p>
                            <button type="button" class="show-more-btn text-[#00539C] hover:underline font-bold text-xs whitespace-nowrap self-end sm:self-auto cursor-pointer">
                                Show More
                            </button>
                        </div>

                    </div>

                    <!-- CARD 7: BLK-Max Super Speciality Hospital, New Delhi -->
                    <div class="hospital-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="India" data-city="New Delhi" data-dept="Bone Marrow,Oncology,IVF,Cardiology,Transplant" data-rating="4.7" data-beds="650" data-established="1959">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <div class="md:col-span-7 flex flex-col sm:flex-row gap-4 items-start">
                                <div class="w-32 sm:w-36 h-28 sm:h-28 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/60">
                                    <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=400&q=80" 
                                         alt="BLK-Max Super Speciality Hospital, New Delhi" 
                                         class="w-full h-full object-cover">
                                </div>

                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#00539C] hover:underline cursor-pointer leading-tight">
                                            BLK-Max Super Speciality Hospital, New Delhi
                                        </h2>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Hospital">✓</span>
                                    </div>

                                    <div class="flex items-center gap-1.5 text-xs text-gray-600">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★<span class="text-amber-500">★</span>
                                        </div>
                                        <span class="font-bold text-gray-800">4.7</span>
                                        <span class="text-gray-500">(1,150+ Ratings)</span>
                                    </div>

                                    <div class="flex items-center gap-2 pt-1">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-amber-400 to-yellow-200 border-2 border-amber-500 flex items-center justify-center shadow-xs text-amber-800" title="JCI Accredited">
                                            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                        </div>
                                        <div class="w-7 h-7 rounded-full border-2 border-red-500 bg-white flex items-center justify-center p-0.5 shadow-xs" title="NABH Certified">
                                            <div class="w-full h-full rounded-full bg-blue-600 flex items-center justify-center text-white text-[8px] font-extrabold">N</div>
                                        </div>
                                        <div class="w-7 h-7 rounded-full bg-teal-50 border-2 border-teal-500 text-teal-700 flex items-center justify-center shadow-xs text-[9px] font-bold" title="NABL Accredited">
                                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-5 flex flex-col justify-between h-full space-y-3">
                                <div class="space-y-1.5 text-xs text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        <span>Established in: <strong class="text-gray-800 font-semibold">1959</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M2 4v16M2 8h18a2 2 0 0 1 2 2v10M2 17h20M6 8v9"/></svg>
                                        <span>Number of Beds: <strong class="text-gray-800 font-semibold">650</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 2v20M2 12h20"/></svg>
                                        <span><strong class="text-gray-800 font-semibold">Super Specialty</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                        <span>Location: <strong class="text-gray-800 font-semibold">Central Delhi, India</strong></span>
                                    </div>
                                </div>

                                <div class="space-y-2 pt-1">
                                    <a href="#evaluation-form" class="w-full bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                        Book Appointment
                                    </a>
                                    <a href="https://wa.me/919999999999?text=Hello%20Vaidam,%20I%20am%20interested%20in%20BLK%20Hospital%20Delhi" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>WhatsApp Us</span>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="pt-2 border-t border-gray-100 flex flex-col sm:flex-row sm:items-end justify-between gap-2">
                            <p class="text-xs text-gray-500 leading-relaxed flex-1 hospital-desc">
                                Houses one of Asia's largest dedicated Bone Marrow Transplant centres with over 1,000+ successful BMTs performed. Comprehensive robotic surgery program and high IVF success rates...
                            </p>
                            <button type="button" class="show-more-btn text-[#00539C] hover:underline font-bold text-xs whitespace-nowrap self-end sm:self-auto cursor-pointer">
                                Show More
                            </button>
                        </div>

                    </div>

                    <!-- CARD 8: Manipal Hospital, Bangalore -->
                    <div class="hospital-card bg-white rounded-xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4"
                         data-country="India" data-city="Bangalore" data-dept="Oncology,Cardiology,Transplant,Neurology,Orthopedics" data-rating="4.8" data-beds="600" data-established="1991">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                            
                            <div class="md:col-span-7 flex flex-col sm:flex-row gap-4 items-start">
                                <div class="w-32 sm:w-36 h-28 sm:h-28 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/60">
                                    <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=400&q=80" 
                                         alt="Manipal Hospital, Old Airport Road, Bangalore" 
                                         class="w-full h-full object-cover">
                                </div>

                                <div class="space-y-1.5 flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h2 class="text-base sm:text-lg font-bold text-[#00539C] hover:underline cursor-pointer leading-tight">
                                            Manipal Hospital, Old Airport Road, Bangalore
                                        </h2>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Hospital">✓</span>
                                    </div>

                                    <div class="flex items-center gap-1.5 text-xs text-gray-600">
                                        <div class="flex text-amber-500 text-sm">
                                            ★★★★<span class="text-amber-500">★</span>
                                        </div>
                                        <span class="font-bold text-gray-800">4.8</span>
                                        <span class="text-gray-500">(1,620+ Ratings)</span>
                                    </div>

                                    <div class="flex items-center gap-2 pt-1">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-amber-400 to-yellow-200 border-2 border-amber-500 flex items-center justify-center shadow-xs text-amber-800" title="JCI Accredited">
                                            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                        </div>
                                        <div class="w-7 h-7 rounded-full border-2 border-red-500 bg-white flex items-center justify-center p-0.5 shadow-xs" title="NABH Certified">
                                            <div class="w-full h-full rounded-full bg-blue-600 flex items-center justify-center text-white text-[8px] font-extrabold">N</div>
                                        </div>
                                        <div class="w-7 h-7 rounded-full bg-teal-50 border-2 border-teal-500 text-teal-700 flex items-center justify-center shadow-xs text-[9px] font-bold" title="NABL Accredited">
                                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-5 flex flex-col justify-between h-full space-y-3">
                                <div class="space-y-1.5 text-xs text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        <span>Established in: <strong class="text-gray-800 font-semibold">1991</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M2 4v16M2 8h18a2 2 0 0 1 2 2v10M2 17h20M6 8v9"/></svg>
                                        <span>Number of Beds: <strong class="text-gray-800 font-semibold">600</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 2v20M2 12h20"/></svg>
                                        <span><strong class="text-gray-800 font-semibold">Quaternary Care</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                        <span>Location: <strong class="text-gray-800 font-semibold">Bengaluru, Karnataka, India</strong></span>
                                    </div>
                                </div>

                                <div class="space-y-2 pt-1">
                                    <a href="#evaluation-form" class="w-full bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center block transition-all">
                                        Book Appointment
                                    </a>
                                    <a href="https://wa.me/919999999999?text=Hello%20Vaidam,%20I%20am%20interested%20in%20Manipal%20Bangalore" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-lg shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>WhatsApp Us</span>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="pt-2 border-t border-gray-100 flex flex-col sm:flex-row sm:items-end justify-between gap-2">
                            <p class="text-xs text-gray-500 leading-relaxed flex-1 hospital-desc">
                                Karnataka's flagship multi-specialty institution known as Bengaluru's premier medical hub. World-class transplant programs, precision oncology, and comprehensive pediatric sub-specialties...
                            </p>
                            <button type="button" class="show-more-btn text-[#00539C] hover:underline font-bold text-xs whitespace-nowrap self-end sm:self-auto cursor-pointer">
                                Show More
                            </button>
                        </div>

                    </div>

                </div>

                <!-- Pagination Bar -->
                <div class="flex items-center justify-center gap-2 pt-6">
                    <button class="w-9 h-9 rounded-lg bg-[#00539C] text-white font-bold text-xs shadow-xs">1</button>
                    <button class="w-9 h-9 rounded-lg bg-white hover:bg-gray-100 text-gray-700 font-semibold text-xs border border-gray-200 transition-colors">2</button>
                    <button class="w-9 h-9 rounded-lg bg-white hover:bg-gray-100 text-gray-700 font-semibold text-xs border border-gray-200 transition-colors">3</button>
                    <button class="w-9 h-9 rounded-lg bg-white hover:bg-gray-100 text-gray-700 font-semibold text-xs border border-gray-200 transition-colors">4</button>
                    <span class="text-gray-400 text-xs px-1">...</span>
                    <button class="px-3 h-9 rounded-lg bg-white hover:bg-gray-100 text-gray-700 font-semibold text-xs border border-gray-200 transition-colors inline-flex items-center gap-1">
                        <span>Next</span>
                        <span>›</span>
                    </button>
                </div>

            </div>

            <!-- ==================== RIGHT COLUMN: STICKY EVALUATION FORM & TRUST ==================== -->
            <div class="lg:col-span-4 lg:sticky lg:top-20 z-30 space-y-4">
                
                <!-- The Blue "Get FREE Evaluation" Card (Exact Match to Screenshot) -->
                <div id="evaluation-form" class="bg-[#00539C] rounded-2xl p-5 sm:p-6 text-white shadow-xl border border-blue-400/20">
                    
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
                    <form action="#" method="POST" class="space-y-3" onsubmit="event.preventDefault(); alert('Thank you! Your free evaluation request has been submitted. Our medical team will contact you within 2 days with hospital quotes.');">
                        @csrf
                        
                        <!-- 1. Patient Name -->
                        <div>
                            <input type="text" name="patient_name" required placeholder="Patient Name" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#e13b3f]">
                        </div>

                        <!-- 2. Country Dropdown -->
                        <div class="relative">
                            <select name="country" class="w-full text-xs text-gray-900 bg-white px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#e13b3f] appearance-none cursor-pointer font-medium">
                                <option value="India" selected>India</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Russia">Russia</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Kenya">Kenya</option>
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
                            <input type="text" name="city" placeholder="Select City" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#e13b3f]">
                        </div>

                        <!-- 4. Phone with Country Code (+91) -->
                        <div class="flex gap-2">
                            <div class="w-16 bg-white rounded-lg flex items-center justify-center text-xs font-bold text-gray-700 px-2 flex-shrink-0">
                                +91
                            </div>
                            <input type="tel" name="phone" required placeholder="Your Phone number" class="flex-1 text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#e13b3f]">
                        </div>

                        <!-- 5. Medical Problem Textarea -->
                        <div>
                            <textarea name="problem" rows="3" placeholder="Describe The Current Medical Problem.." class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#e13b3f]"></textarea>
                        </div>

                        <!-- 6. Age or DOB -->
                        <div>
                            <input type="text" name="age_dob" placeholder="Example: 30 Yrs or 29-05-1985" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#e13b3f]">
                        </div>

                        <!-- 7. Red Continue Button -->
                        <button type="submit" class="w-full bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-sm font-bold py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 transform hover:-translate-y-0.5">
                            Continue →
                        </button>
                    </form>

                    <!-- Terms & Privacy -->
                    <p class="text-[11px] text-blue-100/90 text-center mt-3 leading-snug">
                        By submitting I agree to the <a href="#terms" class="underline hover:text-white font-medium">Terms of Use</a> and <a href="#privacy" class="underline hover:text-white font-medium">Privacy Policy</a> of Vaidam Health.
                    </p>
                </div>

                <!-- Trust Badges Below The Sticky Form (Exact Match to Screenshot) -->
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
        const searchBtn = document.getElementById('search-hospitals-btn');
        const clearBtn = document.getElementById('clear-filters-btn');
        const clearCountryIcon = document.getElementById('clear-country-icon');
        const appliedBadge = document.getElementById('applied-filters-badge');
        const visibleCountSpan = document.getElementById('visible-count');
        const pageHeading = document.getElementById('page-heading');
        const breadcrumbCountry = document.getElementById('breadcrumb-country');
        const cityPills = document.querySelectorAll('.city-pill');
        const sortSelect = document.getElementById('sort-hospitals');
        const hospitalCards = document.querySelectorAll('.hospital-card');

        // Update Applied Filters Count
        function updateFilterBadge() {
            let count = 0;
            if (countrySelect && countrySelect.value) count++;
            if (citySelect && citySelect.value) count++;
            if (deptSelect && deptSelect.value) count++;

            if (appliedBadge) {
                appliedBadge.textContent = count + (count === 1 ? ' filter applied' : ' filters applied');
            }
        }

        // Filter and display cards
        function filterHospitals() {
            const country = countrySelect ? countrySelect.value.toLowerCase().trim() : '';
            const city = citySelect ? citySelect.value.toLowerCase().trim() : '';
            const dept = deptSelect ? deptSelect.value.toLowerCase().trim() : '';

            // Update heading and breadcrumb
            if (countrySelect && countrySelect.value) {
                pageHeading.textContent = 'Best Hospitals in ' + countrySelect.value;
                breadcrumbCountry.textContent = countrySelect.value;
            } else {
                pageHeading.textContent = 'Best Hospitals';
                breadcrumbCountry.textContent = 'All';
            }

            let visible = 0;
            hospitalCards.forEach(card => {
                const cardCountry = (card.getAttribute('data-country') || '').toLowerCase();
                const cardCity = (card.getAttribute('data-city') || '').toLowerCase();
                const cardDept = (card.getAttribute('data-dept') || '').toLowerCase();

                let matchCountry = !country || cardCountry.includes(country);
                let matchCity = !city || cardCity.includes(city);
                let matchDept = !dept || cardDept.includes(dept);

                if (matchCountry && matchCity && matchDept) {
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

        // Clear Country Helper
        window.clearCountry = function(e) {
            if (e) e.stopPropagation();
            if (countrySelect) {
                countrySelect.value = '';
                filterHospitals();
            }
        };

        if (clearCountryIcon) {
            clearCountryIcon.addEventListener('click', (e) => {
                window.clearCountry(e);
            });
        }

        // Clear all filters
        if (clearBtn) {
            clearBtn.addEventListener('click', () => {
                if (countrySelect) countrySelect.value = 'India';
                if (citySelect) citySelect.value = '';
                if (deptSelect) deptSelect.value = '';
                cityPills.forEach(p => {
                    if (p.getAttribute('data-city') === 'all') {
                        p.classList.add('bg-[#00539C]', 'text-white');
                        p.classList.remove('bg-gray-100', 'text-gray-700');
                    } else {
                        p.classList.remove('bg-[#00539C]', 'text-white');
                        p.classList.add('bg-gray-100', 'text-gray-700');
                    }
                });
                filterHospitals();
            });
        }

        // Search button triggers filter
        if (searchBtn) {
            searchBtn.addEventListener('click', filterHospitals);
        }

        // Change listeners
        if (countrySelect) countrySelect.addEventListener('change', filterHospitals);
        if (citySelect) {
            citySelect.addEventListener('change', () => {
                cityPills.forEach(p => {
                    if (p.getAttribute('data-city').toLowerCase() === citySelect.value.toLowerCase()) {
                        p.classList.add('bg-[#00539C]', 'text-white');
                        p.classList.remove('bg-gray-100', 'text-gray-700');
                    } else {
                        p.classList.remove('bg-[#00539C]', 'text-white');
                        p.classList.add('bg-gray-100', 'text-gray-700');
                    }
                });
                filterHospitals();
            });
        }
        if (deptSelect) deptSelect.addEventListener('change', filterHospitals);

        // City Pills Click
        cityPills.forEach(pill => {
            pill.addEventListener('click', () => {
                cityPills.forEach(p => {
                    p.classList.remove('bg-[#00539C]', 'text-white');
                    p.classList.add('bg-gray-100', 'text-gray-700');
                });
                pill.classList.add('bg-[#00539C]', 'text-white');
                pill.classList.remove('bg-gray-100', 'text-gray-700');

                const chosenCity = pill.getAttribute('data-city');
                if (chosenCity === 'all') {
                    if (citySelect) citySelect.value = '';
                } else {
                    if (citySelect) citySelect.value = chosenCity;
                }
                filterHospitals();
            });
        });

        // Sorting
        if (sortSelect) {
            sortSelect.addEventListener('change', () => {
                const criteria = sortSelect.value;
                const container = document.getElementById('hospitals-list');
                const cardsArray = Array.from(hospitalCards);

                cardsArray.sort((a, b) => {
                    if (criteria === 'rating') {
                        return parseFloat(b.getAttribute('data-rating')) - parseFloat(a.getAttribute('data-rating'));
                    } else if (criteria === 'beds') {
                        return parseInt(b.getAttribute('data-beds')) - parseInt(a.getAttribute('data-beds'));
                    } else if (criteria === 'established') {
                        return parseInt(a.getAttribute('data-established')) - parseInt(b.getAttribute('data-established'));
                    }
                    return 0; // default / recommended
                });

                cardsArray.forEach(card => container.appendChild(card));
            });
        }

        // Show More Toggle on Description
        document.querySelectorAll('.show-more-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const desc = btn.parentElement.querySelector('.hospital-desc');
                if (desc) {
                    if (desc.classList.contains('line-clamp-none')) {
                        desc.classList.remove('line-clamp-none');
                        btn.textContent = 'Show More';
                    } else {
                        desc.classList.add('line-clamp-none');
                        btn.textContent = 'Show Less';
                    }
                }
            });
        });

        // Initialize
        updateFilterBadge();
    });
</script>
@endpush
