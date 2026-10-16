@extends('frontend.layouts.app')

@section('title', 'Indraprastha Apollo Hospital, New Delhi - Doctors, Cost & Facilities | Vaidam.com')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-50/80 border-b border-gray-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium overflow-x-auto whitespace-nowrap">
                <a href="{{ url('/') }}" class="hover:text-[#00539C] transition-colors">Home</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('hospitals') }}" class="hover:text-[#00539C] transition-colors">Hospitals</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('hospitals') }}" class="hover:text-[#00539C] transition-colors">India</a>
                <span class="text-gray-400">›</span>
                <span class="text-gray-500">New Delhi</span>
                <span class="text-gray-400">›</span>
                <span class="text-[#112347] font-semibold">Indraprastha Apollo Hospital, New Delhi</span>
            </nav>
        </div>
    </div>

    <!-- ==================== MAIN CONTAINER ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 space-y-8">
        
        <!-- ==================== 1. TOP HERO OVERVIEW CARD ==================== -->
        <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-5 sm:p-7 space-y-6">
            
            <!-- Top Tag & Header Row -->
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <div class="space-y-1.5">
                    <div class="flex items-center gap-1.5 text-xs font-bold text-red-600">
                        <span class="text-amber-500 text-sm">★</span>
                        <span>You are viewing our top rated Hospital</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl lg:text-[34px] font-extrabold text-[#112347] tracking-tight leading-tight">
                        Indraprastha Apollo Hospital, New Delhi
                    </h1>
                    <div class="flex flex-wrap items-center gap-4 text-xs text-gray-500 pt-0.5">
                        <div class="flex items-center text-amber-500 text-sm">
                            ★★★★<span class="text-gray-300">★</span>
                            <span class="text-xs font-bold text-gray-800 ml-1.5">4.3</span>
                            <span class="text-gray-500 ml-1">(86 Ratings)</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                            <span>New Delhi, India</span>
                        </div>
                    </div>
                </div>

                <!-- 96% Patients Recommendation Pill -->
                <div class="bg-emerald-50/80 border border-emerald-200 text-emerald-900 rounded-2xl px-5 py-3.5 flex items-center gap-3.5 shadow-xs self-start lg:self-auto">
                    <div class="w-9 h-9 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>
                    </div>
                    <div>
                        <span class="block text-base font-extrabold text-emerald-800 leading-none">96% Patients</span>
                        <span class="block text-xs text-emerald-600 font-medium mt-0.5">recommended this hospital</span>
                    </div>
                </div>
            </div>

            <!-- Two-Column Hero: Image + Quick Info Table -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center pt-2">
                
                <!-- Left: Big Hospital Photo -->
                <div class="lg:col-span-6 h-72 sm:h-80 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200/80 shadow-xs relative">
                    <img 
                        src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=1000&q=80" 
                        alt="Indraprastha Apollo Hospital Grand Lobby, New Delhi" 
                        class="w-full h-full object-cover"
                    >
                    <span class="absolute bottom-3 left-3 bg-black/60 text-white text-xs px-2.5 py-1 rounded-md backdrop-blur-xs font-medium">
                        Grand Atrium & International Desk
                    </span>
                </div>

                <!-- Right: Quick Specs Grid (2 columns x 4 rows) -->
                <div class="lg:col-span-6 bg-gray-50/70 rounded-2xl p-5 sm:p-6 border border-gray-200/70">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-6 text-xs">
                        
                        <!-- Row 1 -->
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Doctors List</span>
                                <a href="#doctors-section" class="text-[#00539C] font-bold hover:underline">Click Here</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2a8 8 0 0 0-8 8c0 5.25 8 12 8 12s8-6.75 8-12a8 8 0 0 0-8-8z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Location</span>
                                <strong class="text-gray-900 font-semibold">New Delhi, India</strong>
                            </div>
                        </div>

                        <!-- Row 2 -->
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Established in</span>
                                <strong class="text-gray-900 font-semibold">1995</strong>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Accreditations</span>
                                <div class="flex items-center gap-2 mt-0.5">
                                    <div class="flex items-center gap-1">
                                        <div class="w-5 h-5 rounded-full bg-gradient-to-tr from-amber-400 to-yellow-200 border border-amber-500 flex items-center justify-center text-amber-800 text-[8px] font-bold">★</div>
                                        <span class="font-bold text-gray-800">JCI</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <div class="w-5 h-5 rounded-full bg-teal-50 border border-teal-500 text-teal-700 flex items-center justify-center text-[8px] font-bold">✓</div>
                                        <span class="font-bold text-gray-800">NABL</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 3 -->
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M2 12h20"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Specialty</span>
                                <strong class="text-gray-900 font-semibold">Multi Specialty</strong>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Images</span>
                                <a href="#gallery-section" class="text-[#00539C] font-bold hover:underline">Click Here</a>
                            </div>
                        </div>

                        <!-- Row 4 -->
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 4v16M2 8h18a2 2 0 0 1 2 2v10M2 17h20M6 8v9"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Number of beds</span>
                                <strong class="text-gray-900 font-semibold">710</strong>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Facilities</span>
                                <a href="#facilities-section" class="text-[#00539C] font-bold hover:underline">Click Here</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Two Main Action CTAs -->
            <div class="pt-4 border-t border-gray-100 flex flex-col sm:flex-row items-center gap-3.5">
                <a href="{{ route('hospital.appointment') }}" class="w-full sm:flex-1 bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-xs sm:text-sm font-bold py-3 px-6 rounded-lg shadow-sm hover:shadow text-center transition-all">
                    Book Appointment for Indraprastha Apollo Hospital, New Delhi
                </a>
                <a href="https://wa.me/919999999999?text=Hello%20Vaidam,%20I%20want%20to%20consult%20Indraprastha%20Apollo%20Hospital%20New%20Delhi" target="_blank" class="w-full sm:w-auto bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-3 px-6 rounded-lg shadow-sm hover:shadow flex items-center justify-center gap-2 transition-all">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span>WhatsApp Us</span>
                </a>
            </div>

        </div>

        <!-- ==================== 2. TWO-COLUMN BODY (LEFT CONTENT & RIGHT STICKY FORM) ==================== -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- ==================== LEFT COLUMN (8 COLS): DETAILED SECTIONS ==================== -->
            <div class="lg:col-span-8 space-y-8">
                
                <!-- SECTION A: About Indraprastha Apollo Hospital -->
                <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-5">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        About Indraprastha Apollo Hospital, New Delhi
                    </h2>

                    <div class="space-y-4 text-xs sm:text-sm text-gray-600 leading-relaxed">
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Indraprastha Apollo Hospital, the Apollo Hospitals Group's flagship, is India's premier multi-super specialty hospital. It was founded as a joint venture with the Government of Delhi and has constantly ranked at the top of medical quality.</span>
                        </div>

                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Indraprastha Apollo, India's first hospital to be globally recognised by JCI in 2005, has established itself as a worldwide leader in organ transplantation and cardiac sciences.</span>
                        </div>

                        <div class="space-y-2 pt-1">
                            <div class="flex items-start gap-2.5">
                                <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                <span class="font-semibold text-gray-800">Indraprastha Apollo has earned numerous prestigious awards and recognitions, including:</span>
                            </div>
                            <div class="pl-6 space-y-2">
                                <div class="flex items-start gap-2">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span>It is the first hospital in India to be accredited by JCI (2005) and has been consecutively re-accredited.</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span>Featured among the World's Best Hospitals in the Newsweek survey (2025).</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span>FICCI Medical Value Travel Award for the Best Private Hospital for Medical Tourism (2019).</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span>Golden Peacock Award for excellence in Risk Management.</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2 pt-1">
                            <div class="flex items-start gap-2.5">
                                <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                <span class="font-semibold text-gray-800">The hospital has achieved many groundbreaking milestones and holds extensive records in clinical excellence, such as:</span>
                            </div>
                            <div class="pl-6 space-y-2">
                                <div class="flex items-start gap-2">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span>Performed India's first successful paediatric liver transplant in 1998.</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span>One of the world's busiest solid organ transplant centres, with over 500 paediatric liver transplants performed by 2011.</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span>Achieved a 99.6% success rate in cardiac bypass (CABG) surgeries, with 91% performed on a beating heart.</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span>A pioneer in robotic surgery across multiple specialties.</span>
                                </div>
                            </div>
                        </div>

                        <!-- International Patient Services Highlight -->
                        <div class="mt-4 p-4 rounded-xl bg-blue-50/60 border border-blue-100 space-y-2">
                            <h4 class="text-xs font-bold text-[#00539C] uppercase tracking-wider">International Patient Services</h4>
                            <p class="text-xs text-gray-700 leading-relaxed">
                                Indraprastha Apollo is a preferred destination for international patients, offering comprehensive and personalised care: Pre-arrival Consultation and Case Review, Visa Assistance, Dedicated Interpreters, Airport Transfers, and Concierge Services.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- SECTION B: List Of Top Doctors at Indraprastha Apollo Hospital -->
                <div id="doctors-section" class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-gray-100">
                        <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight">
                            List Of Top Doctors at Indraprastha Apollo Hospital, New Delhi
                        </h2>
                        <a href="{{ route('doctors') }}" class="text-xs font-bold text-[#00539C] hover:underline">View All Specialists →</a>
                    </div>

                    <!-- 3-Column Specialties Doctor Directory Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3.5">
                        
                        <!-- 1. Cardiology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🫀
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Cardiology And Cardiac Surgery</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">10 Doctors ›</span>
                        </a>

                        <!-- 2. Cosmetic -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    💄
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Cosmetic And Plastic Surgery</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">6 Doctors ›</span>
                        </a>

                        <!-- 3. Dental -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🦷
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Dental Treatment</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">2 Doctors ›</span>
                        </a>

                        <!-- 4. Dermatology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🧴
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Dermatology</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">2 Doctors ›</span>
                        </a>

                        <!-- 5. Endocrinology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🩺
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Endocrinology</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">8 Doctors ›</span>
                        </a>

                        <!-- 6. ENT Surgery -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    👂
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Ent Surgery</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">6 Doctors ›</span>
                        </a>

                        <!-- 7. Gastroenterology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🔬
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Gastroenterology</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">14 Doctors ›</span>
                        </a>

                        <!-- 8. General Surgery -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    💉
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">General Surgery</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">15 Doctors ›</span>
                        </a>

                        <!-- 9. Gynecology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🤰
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Gynecology</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">7 Doctors ›</span>
                        </a>

                        <!-- 10. Hematology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🩸
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Hematology</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">2 Doctors ›</span>
                        </a>

                        <!-- 11. Hepatology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🧪
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Hepatology</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">4 Doctors ›</span>
                        </a>

                        <!-- 12. IVF -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🍼
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Ivf And Infertility</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">2 Doctors ›</span>
                        </a>

                        <!-- 13. Nephrology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🧬
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Nephrology</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">7 Doctors ›</span>
                        </a>

                        <!-- 14. Neurology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🧠
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Neurology And Neurosurgery</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">13 Doctors ›</span>
                        </a>

                        <!-- 15. Bariatric -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    ⚖️
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Obesity Or Bariatric Surgery</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">14 Doctors ›</span>
                        </a>

                        <!-- 16. Oncology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🎗️
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Oncology And Oncosurgery</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">19 Doctors ›</span>
                        </a>

                        <!-- 17. Ophthalmology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    👁️
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Ophthalmology</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">3 Doctors ›</span>
                        </a>

                        <!-- 18. Orthopedics -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🦴
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Orthopedics</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">15 Doctors ›</span>
                        </a>

                        <!-- 19. Pediatric Cardiology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    👶
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Pediatric Cardiology</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">1 Doctor ›</span>
                        </a>

                        <!-- 20. Pediatrics -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🧸
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Pediatrics & Pediatric Surgery</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">9 Doctors ›</span>
                        </a>

                        <!-- 21. Pulmonology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🫁
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Pulmonology</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">4 Doctors ›</span>
                        </a>

                        <!-- 22. Rheumatology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🦵
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Rheumatology</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">1 Doctor ›</span>
                        </a>

                        <!-- 23. Health Check Ups -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    📋
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Routine Health Check Ups</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">1 Doctor ›</span>
                        </a>

                        <!-- 24. Spine Surgery -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🦴
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Spine Surgery</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">6 Doctors ›</span>
                        </a>

                        <!-- 25. Transplant Surgery -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🫀
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Transplant Surgery</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">8 Doctors ›</span>
                        </a>

                        <!-- 26. Urology -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🚻
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Urology Treatment</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">10 Doctors ›</span>
                        </a>

                        <!-- 27. Vascular Surgery -->
                        <a href="{{ route('doctors') }}" class="bg-[#f0f7fe]/70 hover:bg-[#e3f0fc] border border-blue-100/80 rounded-xl p-3 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-2.5 min-w-0 pr-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-[#00539C] flex-shrink-0">
                                    🩸
                                </div>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#00539C] truncate">Vascular Surgery</span>
                            </div>
                            <span class="text-xs text-blue-600 font-bold whitespace-nowrap">2 Doctors ›</span>
                        </a>

                    </div>
                </div>

                <!-- SECTION C: Team & Specialities -->
                <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-5">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        Team & Specialities
                    </h2>

                    <div class="space-y-4 text-xs sm:text-sm text-gray-600 leading-relaxed">
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Indraprastha Apollo Hospitals engages top consultants through a rigorous credentialing process and supports them with regular training programs, conferences, and continuing medical education. This ensures that the staff remains knowledgeable about the latest medical advancements and provides the best care to patients.</span>
                        </div>

                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>The facility offers <strong>52 specialities</strong> under one roof, including the major specialities being anaesthesia, cardiology, cardiac surgery, cancer, paediatrics, critical care, emergency care, foetal medicine, gastroenterology and hepatology, obstetrics & gynaecology, interventional radiology, IVF, liver and kidney transplant, nuclear medicine, nephrology, neurosciences, ophthalmology, orthopaedics, otolaryngology (ENT), paediatrics, paediatric surgery, psychiatry and clinical psychology, plastic & reconstructive surgery, respiratory & sleep medicine, rheumatology, spine surgery, urology and andrology and vascular and endovascular surgery.</span>
                        </div>

                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>It has dedicated <strong>Centres of Excellence</strong> for Cardiology, Oncology, Emergency Care, Gastroenterology, Neurology/Neurosurgery, Orthopedics, Robotic Surgery, and Transplant Services. These centres focus on delivering specialised care with the latest technologies and techniques.</span>
                        </div>

                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>The Apollo Heart Institutes at the Indraprastha Apollo Hospital is part of one of the largest cardiovascular groups in the world with over <strong>1,70,000+ heart surgeries</strong>, which include complicated coronary artery bypass operations, surgery for all types of valvular heart disease, and infant and neonatal heart surgery - with success rates comparable to international standards.</span>
                        </div>

                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>The facility offers a comprehensive range of advanced medical procedures, including Brain Tumour Surgery, Bone Marrow Transplant, Bioresorbable Vascular Scaffold (BVS), Breast Cancer Treatments, Chemotherapy, Cosmetic Surgery, Coronary Artery Bypass Graft (CABG), CyberKnife® for precise cancer treatment, Da Vinci® Robotic Surgical System for minimally invasive surgeries, Endoscopic Carpal Tunnel Release, Fractional Flow Reserve (FFR), Hand Microsurgery, Hip Arthroscopy, Kidney and Liver Transplants, Minimally Invasive Coronary Bypass Surgery, Novalis Tx for advanced cancer treatment, Optical Coherence Tomography (OCT), Oral & Maxillofacial Surgery, Proton Therapy, Radiation Therapy, Radixact X9 Tomotherapy, Spine Surgery, Surgery for Parkinson's Disease, Total Hip Replacement (THR), Total Knee Replacement (TKR), and TrueBeam STX with 320 Slice Advanced Technology.</span>
                        </div>
                    </div>
                </div>

                <!-- SECTION D: Facilities at Indraprastha Apollo Hospital, New Delhi -->
                <div id="facilities-section" class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-5">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        Facilities at Indraprastha Apollo Hospital, New Delhi
                    </h2>

                    <!-- 4-Column Facilities Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#00539C] text-sm">🚑</div>
                            <span class="text-xs font-bold text-gray-800">Ambulance</span>
                        </div>
                        <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#00539C] text-sm">🩸</div>
                            <span class="text-xs font-bold text-gray-800">Blood Bank</span>
                        </div>
                        <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#00539C] text-sm">🩺</div>
                            <span class="text-xs font-bold text-gray-800">Dialysis</span>
                        </div>
                        <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#00539C] text-sm">🏥</div>
                            <span class="text-xs font-bold text-gray-800">ICU</span>
                        </div>
                        <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#00539C] text-sm">👶</div>
                            <span class="text-xs font-bold text-gray-800">NICU</span>
                        </div>
                        <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#00539C] text-sm">🔬</div>
                            <span class="text-xs font-bold text-gray-800">Operation Theater</span>
                        </div>
                        <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#00539C] text-sm">💊</div>
                            <span class="text-xs font-bold text-gray-800">Pharmacy</span>
                        </div>
                        <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#00539C] text-sm">🧸</div>
                            <span class="text-xs font-bold text-gray-800">PICU</span>
                        </div>
                    </div>
                </div>

                <!-- SECTION E: Interactive Services Tabs -->
                <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-6">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        Services at Indraprastha Apollo Hospital, New Delhi
                    </h2>

                    <style>
                        .service-tab.active {
                            background-color: #00539C !important;
                            color: #ffffff !important;
                            font-weight: 700 !important;
                            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
                        }
                        .service-tab.active:hover {
                            background-color: #00407a !important;
                            color: #ffffff !important;
                        }
                        .service-tab:not(.active) {
                            background-color: #f8fafc !important;
                            color: #334155 !important;
                            font-weight: 600 !important;
                        }
                        .service-tab:not(.active):hover {
                            background-color: #e0f2fe !important;
                            color: #00539C !important;
                        }
                    </style>

                    <!-- Tabbed Layout: Left Categories + Right Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                        
                        <!-- Left Navigation Tabs -->
                        <div class="md:col-span-4 space-y-2" id="services-tabs">
                            <button type="button" class="service-tab active w-full text-left px-4 py-3 rounded-xl text-xs flex items-center justify-between transition-colors" data-category="comfort">
                                <span>Comfort During Stay</span>
                                <span class="text-sm">›</span>
                            </button>
                            <button type="button" class="service-tab w-full text-left px-4 py-3 rounded-xl text-xs flex items-center justify-between transition-colors" data-category="food">
                                <span>Food Services</span>
                                <span class="text-sm">›</span>
                            </button>
                            <button type="button" class="service-tab w-full text-left px-4 py-3 rounded-xl text-xs flex items-center justify-between transition-colors" data-category="money">
                                <span>Money Matters</span>
                                <span class="text-sm">›</span>
                            </button>
                            <button type="button" class="service-tab w-full text-left px-4 py-3 rounded-xl text-xs flex items-center justify-between transition-colors" data-category="patient">
                                <span>Patient Support</span>
                                <span class="text-sm">›</span>
                            </button>
                            <button type="button" class="service-tab w-full text-left px-4 py-3 rounded-xl text-xs flex items-center justify-between transition-colors" data-category="transport">
                                <span>Transportation</span>
                                <span class="text-sm">›</span>
                            </button>
                            <button type="button" class="service-tab w-full text-left px-4 py-3 rounded-xl text-xs flex items-center justify-between transition-colors" data-category="diagnostics">
                                <span>Diagnostics</span>
                                <span class="text-sm">›</span>
                            </button>
                            <button type="button" class="service-tab w-full text-left px-4 py-3 rounded-xl text-xs flex items-center justify-between transition-colors" data-category="language">
                                <span>Language Support</span>
                                <span class="text-sm">›</span>
                            </button>
                        </div>

                        <!-- Right Services Grid -->
                        <div class="md:col-span-8 min-h-[300px]">
                            
                            <!-- 1. Comfort Services (Default Active) -->
                            <div class="service-panel grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2.5 text-xs text-gray-700" id="panel-comfort">
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Business centre services</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Café</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Dedicated smoking areas</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Dry cleaning</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Family accommodation</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Free Wifi</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Laundry</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Mobility accessible rooms</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Nursery / Nanny services</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Parking available</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Personal concierge</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Phone in Room</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Private rooms</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Religious facilities</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Safe in the room</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Shop & Pharmacy</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Spa and wellness</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Special group offer</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>TV in room</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Welcome Package</span>
                                </div>
                            </div>

                            <!-- 2. Food Services -->
                            <div class="service-panel hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2.5 text-xs text-gray-700" id="panel-food">
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Dietitian-custom meals</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>International Multi-cuisine</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Certified Halal Food</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Pure Vegetarian Options</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>24/7 In-Room Dining</span>
                                </div>
                            </div>

                            <!-- 3. Money Matters -->
                            <div class="service-panel hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2.5 text-xs text-gray-700" id="panel-money">
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Currency Exchange Counter</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>International Credit Cards</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Online Wire Transfers</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Medical Insurance Desk</span>
                                </div>
                            </div>

                            <!-- 4. Patient Support -->
                            <div class="service-panel hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2.5 text-xs text-gray-700" id="panel-patient">
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Dedicated Case Manager</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Post-Discharge Followup</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Teleconsultation Services</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Visa Invitation in 24h</span>
                                </div>
                            </div>

                            <!-- 5. Transportation -->
                            <div class="service-panel hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2.5 text-xs text-gray-700" id="panel-transport">
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Complimentary Airport Pickup</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Airport Drop Service</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Local Taxi / Shuttle</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Air Ambulance Facilitation</span>
                                </div>
                            </div>

                            <!-- 6. Diagnostics -->
                            <div class="service-panel hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2.5 text-xs text-gray-700" id="panel-diagnostics">
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>3 Tesla MRI</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>128-Slice CT Scan</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>PET-CT & SPECT Scan</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Advanced Robotic Lab</span>
                                </div>
                            </div>

                            <!-- 7. Language Support -->
                            <div class="service-panel hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2.5 text-xs text-gray-700" id="panel-language">
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Arabic Translators (مترجم)</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Russian Translators (Переводчик)</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>French Translators (Traducteur)</span>
                                </div>
                                <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span>Bengali Support (দোভাষী)</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- SECTION F: Infrastructure -->
                <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-5">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        Infrastructure
                    </h2>
                    <div class="space-y-3.5 text-xs sm:text-sm text-gray-700 leading-relaxed">
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Located in the heart of the capital, the facility spans over 15 acres with a built-up area of over 600,000 square feet and offers 710 beds.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>It boasts the largest number of ICU beds among private hospitals in India.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Apollo Cancer Institute offers comprehensive cancer care with a multi-specialty approach and advanced Radiation Oncology services.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>State-of-the-art technologies for advanced cancer care include the Da Vinci Robotic Surgery System, BrainLab Navigation System, and NovalisTx.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>The facility features cutting-edge diagnostic equipment, such as PET-MR, PET-CT, a Portable CT Scanner, a 3 Tesla MRI, and a 128-slice CT Scanner.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Other notable technologies include Cobalt-based HDR Brachytherapy, Tilting MRI, DSA Lab, Hyperbaric Chamber, Fibroscan, and Endosonography.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>A dedicated 6-bed bone marrow transplant unit with stringent infection control practices is available.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>It has one of Asia's largest Sleep Labs and one of India's largest Dialysis Units.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Additional facilities include car parking, a temple, and an on-site gift shop.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>A communication centre, ATM, and food court are provided for convenience.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Patients can enjoy private rooms with TV and free Wi-Fi.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Food can be ordered from the food court, and wheelchairs are accessible for ease of movement.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Attendant accommodation and laundry services are also available.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>The facility offers health insurance options, including Indian and international health insurance.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Patients have access to a prayer room, language translators, and a pharmacy.</span>
                        </div>
                    </div>
                </div>

                <!-- SECTION G: Address & Location -->
                <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-6">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        Address & Location
                    </h2>
                    <div class="space-y-5 text-xs sm:text-sm text-gray-700">
                        
                        <!-- Airport -->
                        <div class="space-y-2">
                            <h3 class="font-bold text-gray-900 text-sm">Airport (Indira Gandhi International Airport (DEL)):</h3>
                            <div class="space-y-1.5 pl-1">
                                <div class="flex items-center gap-2">
                                    <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                    <span>Distance: 22 Km</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                    <span>Duration: 30-40 mins by car</span>
                                </div>
                            </div>
                        </div>

                        <!-- Metro -->
                        <div class="space-y-2 pt-1">
                            <h3 class="font-bold text-gray-900 text-sm">Metro (Indraprastha Metro Station):</h3>
                            <div class="space-y-1.5 pl-1">
                                <div class="flex items-center gap-2">
                                    <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                    <span>Distance: 2.5 Km</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                    <span>Duration: 5-10 minutes by car</span>
                                </div>
                            </div>
                        </div>

                        <!-- Railway -->
                        <div class="space-y-2 pt-1">
                            <h3 class="font-bold text-gray-900 text-sm">Railway Station (New Delhi Railway Station):</h3>
                            <div class="space-y-1.5 pl-1">
                                <div class="flex items-center gap-2">
                                    <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                    <span>Distance: 8 Km</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                    <span>Duration: 15-25 minutes by car</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- SECTION H: Global Trust CTA Banner -->
                <div class="bg-[#004f98] rounded-2xl p-5 sm:p-6 text-white shadow-md flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="space-y-1 text-center sm:text-left">
                        <h3 class="text-base sm:text-lg font-bold tracking-tight">
                            Patients From 105+ Countries Trust Indraprastha Apollo Hospital, New Delhi
                        </h3>
                        <p class="text-xs text-blue-100">
                            Get a free, no-obligation second opinion from our medical experts.
                        </p>
                    </div>
                    <a href="#appointment-box" class="w-full sm:w-auto flex-shrink-0 bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-xs sm:text-sm font-bold py-2.5 px-6 rounded-lg shadow-sm hover:shadow text-center transition-all whitespace-nowrap">
                        Book Appointment
                    </a>
                </div>

                <!-- SECTION I: Reviews Section -->
                <div class="space-y-4">
                    
                    <!-- Header with Rating Score -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight">
                            Reviews of Indraprastha Apollo Hospital, New Delhi
                        </h2>
                        <div class="flex items-center text-xs font-semibold text-gray-700 gap-1.5 self-start sm:self-auto">
                            <span class="text-amber-500 text-sm">★</span>
                            <span class="font-bold text-gray-900">4.3</span>
                            <span class="text-gray-400">·</span>
                            <span class="text-gray-500">86 verified reviews</span>
                        </div>
                    </div>

                    <!-- Patient Reviews Container Card -->
                    <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-7 space-y-6">
                        
                        <!-- Sub-header with Navigation Arrows -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 text-[#00539C] flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-[#112347]">Patient Reviews</h3>
                            </div>

                            <!-- Carousel Prev / Next Buttons -->
                            <div class="flex items-center gap-2">
                                <button type="button" id="review-prev" class="w-8 h-8 rounded-full border border-gray-200 hover:border-[#00539C] hover:text-[#00539C] text-gray-500 flex items-center justify-center transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                                </button>
                                <button type="button" id="review-next" class="w-8 h-8 rounded-full border border-gray-200 hover:border-[#00539C] hover:text-[#00539C] text-gray-500 flex items-center justify-center transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </button>
                            </div>
                        </div>

                        <!-- Carousel Track Wrapper (Smooth scrolling & responsive cards) -->
                        <div id="reviews-carousel" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Review 1 -->
                            <div class="bg-gray-50/70 hover:bg-gray-50 rounded-2xl p-5 border border-gray-200/70 flex flex-col justify-between space-y-4">
                                <div class="space-y-3">
                                    <div class="text-2xl text-blue-300 font-serif leading-none">“</div>
                                    <div class="flex items-center text-amber-500 text-xs">
                                        ★★★★★
                                    </div>
                                    <p class="text-xs text-gray-600 leading-relaxed line-clamp-4">
                                        At Indraprastha Apollo Hospital, we underwent a series of diagnostic tests and consultations with specialists as part of our comprehensive health check-up. The entire process was seamless and efficient.
                                    </p>
                                </div>
                                <div class="flex items-center gap-3 pt-3 border-t border-gray-200/60">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 text-[#00539C] font-bold text-xs flex items-center justify-center flex-shrink-0">
                                        M
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-gray-900 leading-tight">Mr. Rajendra Kumar Gautam</h4>
                                        <div class="flex items-center gap-1 text-[11px] text-gray-500 mt-0.5">
                                            <svg class="w-3 h-3 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                            <span>Nepal</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Review 2 -->
                            <div class="bg-gray-50/70 hover:bg-gray-50 rounded-2xl p-5 border border-gray-200/70 flex flex-col justify-between space-y-4">
                                <div class="space-y-3">
                                    <div class="text-2xl text-blue-300 font-serif leading-none">“</div>
                                    <div class="flex items-center text-amber-500 text-xs">
                                        ★★★★★
                                    </div>
                                    <p class="text-xs text-gray-600 leading-relaxed line-clamp-4">
                                        Dr. Lubat Rajender Seth carefully examined my condition and recommended eye laser surgery to help improve my vision. Her guidance and experience gave me immense confidence throughout the recovery.
                                    </p>
                                </div>
                                <div class="flex items-center gap-3 pt-3 border-t border-gray-200/60">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 text-[#00539C] font-bold text-xs flex items-center justify-center flex-shrink-0">
                                        M
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-gray-900 leading-tight">Mr. Gilbert Lesseni</h4>
                                        <div class="flex items-center gap-1 text-[11px] text-gray-500 mt-0.5">
                                            <svg class="w-3 h-3 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                            <span>Tanzania</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Review 3 -->
                            <div class="bg-gray-50/70 hover:bg-gray-50 rounded-2xl p-5 border border-gray-200/70 flex flex-col justify-between space-y-4">
                                <div class="space-y-3">
                                    <div class="text-2xl text-blue-300 font-serif leading-none">“</div>
                                    <div class="flex items-center text-amber-500 text-xs">
                                        ★★★★★
                                    </div>
                                    <p class="text-xs text-gray-600 leading-relaxed line-clamp-4">
                                        I faced no problems throughout my stay, and everything was well-arranged. My spine surgery at Apollo Hospital also went very well, and I am grateful for that. For anyone traveling from abroad, Apollo is top tier.
                                    </p>
                                </div>
                                <div class="flex items-center gap-3 pt-3 border-t border-gray-200/60">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 text-[#00539C] font-bold text-xs flex items-center justify-center flex-shrink-0">
                                        D
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-gray-900 leading-tight">Dipa Mandal</h4>
                                        <div class="flex items-center gap-1 text-[11px] text-gray-500 mt-0.5">
                                            <svg class="w-3 h-3 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                            <span>Bangladesh</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination Dots -->
                        <div class="flex items-center justify-center gap-1.5 pt-2" id="reviews-dots">
                            <button type="button" class="dot-btn w-6 h-1.5 bg-[#00539C] rounded-full transition-all" data-index="0"></button>
                            <button type="button" class="dot-btn w-1.5 h-1.5 bg-gray-300 rounded-full hover:bg-gray-400 transition-all" data-index="1"></button>
                            <button type="button" class="dot-btn w-1.5 h-1.5 bg-gray-300 rounded-full hover:bg-gray-400 transition-all" data-index="2"></button>
                        </div>

                    </div>

                </div>

            </div>

            <!-- ==================== RIGHT COLUMN (4 COLS): STICKY INQUIRY & APPOINTMENT ==================== -->
            <div class="lg:col-span-4 lg:sticky lg:top-20 z-30 space-y-4" id="appointment-box">
                
                <!-- Card 1: Top Direct CTA Box -->
                <div class="bg-[#004f98] rounded-2xl p-5 text-white shadow-md text-center space-y-3">
                    <h3 class="text-base font-bold tracking-tight">
                        Contact Indraprastha Apollo Hospital, New Delhi
                    </h3>
                    <p class="text-xs text-blue-100">
                        Our team responds within 24 hours
                    </p>
                    <a href="#evaluation-form" class="w-full bg-[#e13b3f] hover:bg-[#cf2a2e] text-white text-xs sm:text-sm font-extrabold py-2.5 px-4 rounded-lg shadow-sm hover:shadow block uppercase tracking-wider transition-all">
                        Book Appointment
                    </a>
                    <p class="text-[10px] text-blue-200">
                        By submitting I agree to the Terms & Privacy Policy.
                    </p>
                </div>

                <!-- Card 2: Contact Hospital Form (Matching User's Screenshot) -->
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
                            <h3 class="text-lg font-bold text-white tracking-tight">Contact Hospital</h3>
                        </div>
                        <p class="text-xs text-blue-100 mt-1">Treatment plan and quote within 2 days</p>
                    </div>

                    <!-- Evaluation Form -->
                    <form action="#" method="POST" class="space-y-3" onsubmit="event.preventDefault(); alert('Thank you! Your appointment request for Indraprastha Apollo Hospital has been sent. Our coordinator will contact you within 24 hours.');">
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

                <!-- Card 3: Trust Badges -->
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
        // 1. Services Tab Switcher (Uses CSS .active and hover rules cleanly)
        const tabs = document.querySelectorAll('.service-tab');
        const panels = document.querySelectorAll('.service-panel');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const category = tab.getAttribute('data-category');

                // Toggle active state
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                // Toggle panels
                panels.forEach(panel => {
                    panel.classList.add('hidden');
                });

                const activePanel = document.getElementById('panel-' + category);
                if (activePanel) {
                    activePanel.classList.remove('hidden');
                }
            });
        });

        // 2. Reviews Carousel Controls
        const reviewPrev = document.getElementById('review-prev');
        const reviewNext = document.getElementById('review-next');
        const dots = document.querySelectorAll('.dot-btn');
        let currentDotIndex = 0;

        function updateDots(index) {
            currentDotIndex = index;
            dots.forEach((dot, i) => {
                if (i === currentDotIndex) {
                    dot.className = 'dot-btn w-6 h-1.5 bg-[#00539C] rounded-full transition-all';
                } else {
                    dot.className = 'dot-btn w-1.5 h-1.5 bg-gray-300 rounded-full hover:bg-gray-400 transition-all';
                }
            });
        }

        if (reviewPrev && reviewNext) {
            reviewPrev.addEventListener('click', () => {
                const nextIndex = (currentDotIndex - 1 + dots.length) % dots.length;
                updateDots(nextIndex);
            });

            reviewNext.addEventListener('click', () => {
                const nextIndex = (currentDotIndex + 1) % dots.length;
                updateDots(nextIndex);
            });
        }

        dots.forEach((dot, idx) => {
            dot.addEventListener('click', () => updateDots(idx));
        });
    });
</script>
@endpush
