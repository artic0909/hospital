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

    <!-- ==================== MAIN CONTENT: LEFT DOCTOR CARDS & RIGHT STICKY FORM ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        
        <!-- Two Column Grid: items-start is critical for sticky behavior -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">
            
            <!-- ==================== LEFT COLUMN: DOCTORS LIST (SCROLLABLE) ==================== -->
            <div class="lg:col-span-8 space-y-5">
                
                <!-- Results Bar & Quick Specialty Filter -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-gray-200/80 shadow-xs space-y-3.5">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <span class="text-sm font-bold text-gray-900">
                                Showing <span id="visible-count" class="text-[#27797D]">6</span> Best Doctors
                            </span>
                            <p class="text-xs text-gray-500 mt-0.5">Board-certified specialists & surgeons with international patient expertise</p>
                        </div>

                        <!-- Filter by Specialty Dropdown -->
                        <div class="flex items-center gap-2 text-xs">
                            <span class="text-gray-500 font-medium">Specialty:</span>
                            <div class="relative">
                                <select id="specialty-subfilter" class="bg-gray-50 border border-gray-300 text-gray-700 text-xs rounded-md pl-2.5 pr-7 py-1.5 focus:outline-none focus:ring-1 focus:ring-[#27797D] appearance-none cursor-pointer font-medium">
                                    <option value="all">All Specialties</option>
                                    <option value="Urologist">Urologist</option>
                                    <option value="Neurosurgeon">Neurosurgeon</option>
                                    <option value="Cardiac">Cardiac Surgeon</option>
                                    <option value="Oncologist">Oncologist</option>
                                    <option value="Orthopedic">Orthopedic Surgeon</option>
                                    <option value="Bariatric">Bariatric Surgeon</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none text-gray-400">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Specialty Filter Pills -->
                    <div class="flex items-center gap-2 overflow-x-auto pb-1 pt-1 no-scrollbar text-xs">
                        <span class="text-gray-400 font-bold uppercase text-[10px] tracking-wider whitespace-nowrap">Specialty:</span>
                        <button type="button" class="specialty-pill active px-3 py-1 rounded-full font-semibold bg-[#27797D] text-white transition-colors cursor-pointer" data-specialty="all">All</button>
                        <button type="button" class="specialty-pill px-3 py-1 rounded-full font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors cursor-pointer" data-specialty="Urologist">Urologist</button>
                        <button type="button" class="specialty-pill px-3 py-1 rounded-full font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors cursor-pointer" data-specialty="Neurosurgeon">Neurosurgeon</button>
                        <button type="button" class="specialty-pill px-3 py-1 rounded-full font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors cursor-pointer" data-specialty="Cardiac">Cardiac</button>
                        <button type="button" class="specialty-pill px-3 py-1 rounded-full font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors cursor-pointer" data-specialty="Oncologist">Oncology</button>
                        <button type="button" class="specialty-pill px-3 py-1 rounded-full font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors cursor-pointer" data-specialty="Orthopedic">Orthopedic</button>
                        <button type="button" class="specialty-pill px-3 py-1 rounded-full font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors cursor-pointer" data-specialty="Bariatric">Bariatric</button>
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
        const specialtyFilter = document.getElementById('specialty-subfilter');
        const specialtyPills = document.querySelectorAll('.specialty-pill');
        const visibleCountSpan = document.getElementById('visible-count');
        const doctorCards = document.querySelectorAll('.doctor-card');

        // Filter doctors purely by specialty
        function filterDoctors(specValue) {
            const spec = (specValue !== undefined ? specValue : (specialtyFilter ? specialtyFilter.value : 'all')).toLowerCase().trim();

            // Sync dropdown value if needed
            if (specialtyFilter && specialtyFilter.value.toLowerCase() !== spec) {
                for (let i = 0; i < specialtyFilter.options.length; i++) {
                    if (specialtyFilter.options[i].value.toLowerCase() === spec) {
                        specialtyFilter.selectedIndex = i;
                        break;
                    }
                }
            }

            // Sync pills active styling
            specialtyPills.forEach(pill => {
                const pillSpec = (pill.getAttribute('data-specialty') || '').toLowerCase();
                const isActive = (pillSpec === spec) || (spec === 'all' && pillSpec === 'all');
                if (isActive) {
                    pill.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                    pill.classList.add('bg-[#27797D]', 'text-white', 'active');
                } else {
                    pill.classList.remove('bg-[#27797D]', 'text-white', 'active');
                    pill.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                }
            });

            // Filter doctor cards
            let visible = 0;
            doctorCards.forEach(card => {
                const cardSpec = (card.getAttribute('data-specialty') || '').toLowerCase();
                const matchSpec = spec === 'all' || cardSpec.includes(spec);

                if (matchSpec) {
                    card.style.display = 'block';
                    visible++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (visibleCountSpan) {
                visibleCountSpan.textContent = visible;
            }
        }

        // Dropdown change listener
        if (specialtyFilter) {
            specialtyFilter.addEventListener('change', () => {
                filterDoctors(specialtyFilter.value);
            });
        }

        // Specialty pills click listener
        specialtyPills.forEach(pill => {
            pill.addEventListener('click', () => {
                const spec = pill.getAttribute('data-specialty') || 'all';
                filterDoctors(spec);
            });
        });

        // Show More / Show Less toggle on bullet items
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

        // Initialize with default state
        filterDoctors('all');
    });
</script>
@endpush
