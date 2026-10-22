@extends('frontend.layouts.app')

@section('title', 'Dr. Y K Mishra - Best Cardiac Surgeon in India | Manipal Hospital Dwarka')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-50/80 border-b border-gray-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium overflow-x-auto whitespace-nowrap">
                <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('doctors') }}" class="hover:text-[#27797D] transition-colors">Doctors</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('doctors') }}" class="hover:text-[#27797D] transition-colors">India</a>
                <span class="text-gray-400">›</span>
                <span class="text-gray-500">New Delhi</span>
                <span class="text-gray-400">›</span>
                <span class="text-[#112347] font-semibold">Dr. Y K Mishra</span>
            </nav>
        </div>
    </div>

    <!-- ==================== MAIN CONTAINER ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-2">
        
        <!-- ==================== 1. TOP DOCTOR HERO OVERVIEW CARD ==================== -->
        <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-5 sm:p-7 space-y-6">
            <div class="flex flex-col md:flex-row gap-6 items-start">
                
                <!-- Doctor Image -->
                <div class="w-28 h-28 sm:w-36 sm:h-36 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200 flex-shrink-0 shadow-xs relative">
                    <img 
                        src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=400&q=80" 
                        alt="Dr. Y K Mishra - Cardiac Surgeon" 
                        class="w-full h-full object-cover"
                    >
                    <span class="absolute top-2 right-2 w-5 h-5 rounded-full bg-red-500 text-white flex items-center justify-center text-[10px] font-bold shadow-xs">
                        ✓
                    </span>
                </div>

                <!-- Info Details -->
                <div class="flex-1 space-y-2.5">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <div>
                            <div class="flex items-center gap-2">
                                <h1 class="text-2xl sm:text-3xl font-extrabold text-[#112347] tracking-tight">
                                    Dr. Y K Mishra
                                </h1>
                                <span class="inline-flex items-center justify-center w-5 h-5 rounded-full border border-red-500 text-red-500 text-xs font-bold" title="Verified Specialist">
                                    ✓
                                </span>
                            </div>
                            <p class="text-sm font-semibold text-[#27797D] mt-0.5">
                                Chief of Cardiac Surgery & Head of Clinical Services
                            </p>
                        </div>

                        <!-- 4.9 Rating Pill -->
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-900 rounded-xl px-3.5 py-1.5 flex items-center gap-2 self-start sm:self-auto shadow-xs">
                            <span class="text-amber-500 text-sm">★</span>
                            <span class="text-xs font-bold text-gray-900">4.9</span>
                            <span class="text-xs text-emerald-700">(271 Ratings)</span>
                        </div>
                    </div>

                    <!-- Meta Badges -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-y-2 gap-x-4 text-xs text-gray-600 pt-1">
                        <div class="flex items-center gap-2">
                            <span class="text-blue-500 font-bold">🩺</span>
                            <span><strong>Speciality:</strong> Cardiac Surgery</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-blue-500 font-bold">⏳</span>
                            <span><strong>Experience:</strong> 44+ Years</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-blue-500 font-bold">🏥</span>
                            <span><strong>Hospital:</strong> Manipal Hospitals Dwarka</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                            <span>New Delhi, India</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-emerald-500 font-bold">💵</span>
                            <span><strong>OPD Fee:</strong> INR 1000 /-</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-amber-500 font-bold">⭐</span>
                            <span>Over 19,000+ Surgeries</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-3 flex flex-col sm:flex-row items-center gap-3">
                        <a href="{{ route('doctor.appointment') }}" class="w-full sm:w-auto bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-2.5 px-6 rounded-lg shadow-sm hover:shadow text-center transition-all">
                            Book Appointment
                        </a>
                        <a href="https://wa.me/919129846542?text=Hello%20Heal%20Go%20Fly,%20I%20want%20to%20consult%20Dr.%20Y%20K%20Mishra" target="_blank" class="w-full sm:w-auto bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-6 rounded-lg shadow-sm hover:shadow flex items-center justify-center gap-2 transition-all">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            <span>WhatsApp Us</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- ==================== 2. DOCTOR SUB-NAV ANCHORS BAR (STICKY BELOW HERO) ==================== -->
    <div class="sticky top-0 z-30 bg-white/95 backdrop-blur-sm border-y border-gray-200 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-6 sm:gap-8 overflow-x-auto whitespace-nowrap text-xs font-semibold py-3 text-gray-600" id="doctor-subnav">
                <a href="#about-section" class="doc-subnav-item text-[#27797D] font-bold border-b-2 border-[#27797D] pb-3 -mb-3 transition-colors">About</a>
                <a href="#opd-section" class="doc-subnav-item hover:text-[#27797D] transition-colors pb-3 -mb-3">OPD schedule</a>
                <a href="#education-section" class="doc-subnav-item hover:text-[#27797D] transition-colors pb-3 -mb-3">Education</a>
                <a href="#education-section" class="doc-subnav-item hover:text-[#27797D] transition-colors pb-3 -mb-3">Awards</a>
                <a href="#location-section" class="doc-subnav-item hover:text-[#27797D] transition-colors pb-3 -mb-3">Location</a>
                <a href="#reviews-section" class="doc-subnav-item hover:text-[#27797D] transition-colors pb-3 -mb-3">Reviews</a>
            </nav>
        </div>
    </div>

    <!-- ==================== 3. TWO-COLUMN BODY (LEFT CONTENT & RIGHT STICKY FORM) ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- ==================== LEFT COLUMN (8 COLS): DETAILED SECTIONS ==================== -->
            <div class="lg:col-span-8 space-y-8">
                
                <!-- SECTION 1: ABOUT DR. Y K MISHRA (Screenshot 1) -->
                <div id="about-section" class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-4 scroll-mt-20">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        About Dr. Y K Mishra
                    </h2>

                    <p class="text-xs sm:text-sm text-gray-700 leading-relaxed">
                        Dr. Y.K. Mishra is a distinguished Cardiac Surgeon, recognised as a pioneer in minimally invasive cardiac surgery in India, with over four decades of experience improving heart health. He has successfully performed over 19,000 open-heart and robotic surgeries and is a leading expert in minimally invasive techniques, complex cardiac repairs, and valve replacements.
                    </p>

                    <div class="space-y-2 pt-2">
                        <h3 class="text-sm font-bold text-gray-900">Why Choose Dr. Y.K. Mishra?</h3>
                        
                        <div class="space-y-2.5 text-xs sm:text-sm text-gray-700">
                            <div class="flex items-start gap-2.5">
                                <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                <span><strong>Expert in Minimally Invasive Cardiac Surgery:</strong> With over 44 years of experience, Dr. Y.K. Mishra is a pioneer in minimally invasive cardiac surgery in India, performing complex bypass and valve surgeries through tiny incisions with faster recovery.</span>
                            </div>
                            <div class="flex items-start gap-2.5">
                                <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                <span><strong>Vast Surgical Track Record:</strong> Has independently conducted more than 19,000 open heart operations, including coronary artery bypass grafting (CABG), redo surgeries, and heart valve repairs with world-class success rates.</span>
                            </div>
                            <div class="flex items-start gap-2.5">
                                <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                <span><strong>International Recognition:</strong> Guest faculty and speaker at leading cardiovascular institutions across USA, Europe, and Asia; trainer to hundreds of cardiothoracic fellows worldwide.</span>
                            </div>
                        </div>

                        <div class="pt-2 text-right">
                            <a href="#education-section" class="text-xs font-bold text-[#27797D] hover:underline">+ Read More</a>
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: OPD SCHEDULE & FEE OF DR. Y K MISHRA (Screenshot 1) -->
                <div id="opd-section" class="space-y-4 scroll-mt-20">
                    
                    <!-- Header with Title and Book Appointment CTA -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight">
                            OPD Schedule & Fee Of Dr. Y K Mishra
                        </h2>
                        <a href="{{ route('doctor.appointment') }}" class="bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-2.5 px-5 rounded-lg shadow-sm hover:shadow self-start sm:self-auto transition-all">
                            Book Appointment
                        </a>
                    </div>

                    <!-- OPD Schedule Card (Matching Screenshot 1 UI) -->
                    <div class="bg-[#f0f9f9] border border-blue-100 rounded-2xl p-5 sm:p-6 shadow-xs space-y-4">
                        
                        <!-- Top Subheader of Card -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3.5 border-b border-blue-200/60">
                            <div class="flex items-center gap-2">
                                <div class="w-4 h-4 rounded bg-[#27797D] text-white flex items-center justify-center text-[10px] font-bold">
                                    +
                                </div>
                                <span class="text-xs sm:text-sm font-bold text-[#112347]">
                                    Manipal Hospitals Dwarka, Delhi
                                </span>
                            </div>
                            <div class="text-xs sm:text-sm font-extrabold text-[#27797D]">
                                Fees: INR 1000 /-
                            </div>
                        </div>

                        <!-- Schedule Rows & Illustration Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                            
                            <!-- Left: Timetable Rows (Clean airy rows without thick borders) -->
                            <div class="md:col-span-8 space-y-3 text-xs">
                                
                                <div class="flex items-center justify-between gap-2">
                                    <span class="font-bold text-gray-700 w-24">Monday</span>
                                    <div class="flex items-center gap-2 flex-1 justify-end">
                                        <span class="bg-white/90 text-[#27797D] font-semibold px-3 py-1.5 rounded-lg border border-blue-100/80 shadow-xs">10:00 AM - 11:00 AM</span>
                                        <span class="bg-white/90 text-[#27797D] font-semibold px-3 py-1.5 rounded-lg border border-blue-100/80 shadow-xs">02:00 PM - 04:00 PM</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between gap-2">
                                    <span class="font-bold text-gray-700 w-24">Tuesday</span>
                                    <div class="flex items-center gap-2 flex-1 justify-end">
                                        <span class="bg-white/90 text-[#27797D] font-semibold px-3 py-1.5 rounded-lg border border-blue-100/80 shadow-xs">10:00 AM - 11:00 AM</span>
                                        <span class="bg-white/90 text-[#27797D] font-semibold px-3 py-1.5 rounded-lg border border-blue-100/80 shadow-xs">02:00 PM - 04:00 PM</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between gap-2">
                                    <span class="font-bold text-gray-700 w-24">Wednesday</span>
                                    <div class="flex items-center gap-2 flex-1 justify-end">
                                        <span class="bg-white/90 text-[#27797D] font-semibold px-3 py-1.5 rounded-lg border border-blue-100/80 shadow-xs">10:00 AM - 11:00 AM</span>
                                        <span class="bg-white/90 text-[#27797D] font-semibold px-3 py-1.5 rounded-lg border border-blue-100/80 shadow-xs">02:00 PM - 04:00 PM</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between gap-2">
                                    <span class="font-bold text-gray-700 w-24">Thursday</span>
                                    <div class="flex items-center gap-2 flex-1 justify-end">
                                        <span class="bg-white/90 text-[#27797D] font-semibold px-3 py-1.5 rounded-lg border border-blue-100/80 shadow-xs">10:00 AM - 11:00 AM</span>
                                        <span class="bg-white/90 text-[#27797D] font-semibold px-3 py-1.5 rounded-lg border border-blue-100/80 shadow-xs">02:00 PM - 04:00 PM</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between gap-2">
                                    <span class="font-bold text-gray-700 w-24">Friday</span>
                                    <div class="flex items-center gap-2 flex-1 justify-end">
                                        <span class="bg-white/90 text-[#27797D] font-semibold px-3 py-1.5 rounded-lg border border-blue-100/80 shadow-xs">10:00 AM - 11:00 AM</span>
                                        <span class="bg-white/90 text-[#27797D] font-semibold px-3 py-1.5 rounded-lg border border-blue-100/80 shadow-xs">02:00 PM - 04:00 PM</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between gap-2">
                                    <span class="font-bold text-gray-700 w-24">Saturday</span>
                                    <div class="flex items-center gap-2 flex-1 justify-end">
                                        <span class="bg-white/90 text-[#27797D] font-semibold px-3 py-1.5 rounded-lg border border-blue-100/80 shadow-xs">10:00 AM - 11:00 AM</span>
                                        <span class="bg-white/90 text-[#27797D] font-semibold px-3 py-1.5 rounded-lg border border-blue-100/80 shadow-xs">02:00 PM - 04:00 PM</span>
                                    </div>
                                </div>

                            </div>

                            <!-- Right: Smartphone & Doctor Booking Illustration (Screenshot 1) -->
                            <div class="md:col-span-4 flex items-center justify-center p-2">
                                <div class="relative w-44 bg-white rounded-2xl border border-blue-200/80 p-3 shadow-sm text-center space-y-2">
                                    <div class="w-8 h-1 bg-gray-300 rounded-full mx-auto"></div>
                                    <span class="block text-[10px] font-bold text-[#27797D] uppercase tracking-wider">
                                        Appointment Booking
                                    </span>
                                    
                                    <!-- Mini Calendar Matrix -->
                                    <div class="grid grid-cols-7 gap-0.5 text-[8px] text-gray-400 py-1 border-b border-gray-100">
                                        <span class="text-red-400 font-bold">S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span>
                                    </div>

                                    <!-- Patient Slot Cards -->
                                    <div class="space-y-1.5 py-1 text-left">
                                        <div class="bg-blue-50/70 p-1.5 rounded-lg flex items-center justify-between text-[8px]">
                                            <div class="flex items-center gap-1">
                                                <span class="w-3.5 h-3.5 rounded-full bg-blue-200 text-[#27797D] font-bold flex items-center justify-center text-[7px]">✓</span>
                                                <span class="font-bold text-gray-800">Confirmed</span>
                                            </div>
                                            <span class="text-emerald-700 font-bold">BOOK</span>
                                        </div>
                                        <div class="bg-gray-50 p-1.5 rounded-lg flex items-center justify-between text-[8px]">
                                            <span class="text-gray-600">Priority Slot</span>
                                            <span class="text-blue-600 font-bold">OPEN</span>
                                        </div>
                                    </div>

                                    <div class="pt-1">
                                        <a href="{{ route('doctor.appointment') }}" class="block w-full bg-[#27797D] hover:bg-[#15364e] text-white text-[9px] font-bold py-1.5 rounded-md transition-all">
                                            Select Time Slot
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- SECTION 3: LOCATION (Screenshot 2) -->
                <div id="location-section" class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-4 scroll-mt-20">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        Location
                    </h2>

                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <!-- Hospital Exterior Photo -->
                        <div class="w-full md:w-1/2 h-52 sm:h-56 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200 shadow-xs">
                            <img 
                                src="https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?auto=format&fit=crop&w=700&q=80" 
                                alt="Manipal Hospitals Dwarka, Delhi" 
                                class="w-full h-full object-cover"
                            >
                        </div>

                        <!-- Location Info -->
                        <div class="w-full md:w-1/2 space-y-3">
                            <div class="flex items-start gap-2.5">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                <div>
                                    <h3 class="text-base sm:text-lg font-bold text-[#112347]">
                                        Manipal Hospitals Dwarka, Delhi
                                    </h3>
                                    <p class="text-xs text-gray-500 mt-0.5">
                                        Sector 6, Dwarka, New Delhi, Delhi 110075, India
                                    </p>
                                </div>
                            </div>

                            <p class="text-xs text-gray-600 leading-relaxed">
                                Manipal Hospital Dwarka is a multi-speciality tertiary care healthcare center, providing world-class healthcare with state-of-the-art infrastructure and personalized attention.
                            </p>

                            <div class="pt-2">
                                <a href="{{ route('hospital.details') }}" class="text-xs font-bold text-[#27797D] hover:underline">
                                    View Full Hospital Details →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 4: EDUCATION & HONOURS AWARDS TABS (Screenshot 2) -->
                <div id="education-section" class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-6 scroll-mt-20">
                    
                    <!-- Tabs Bar -->
                    <div class="flex items-center gap-6 border-b border-gray-200 text-xs sm:text-sm font-semibold">
                        <button type="button" class="tab-btn-doc pb-3 text-gray-500 hover:text-[#27797D] transition-all" data-target="tab-education">
                            Education & Training
                        </button>
                        <button type="button" class="tab-btn-doc active-doc-tab pb-3 text-[#27797D] font-bold border-b-2 border-[#27797D] transition-all" data-target="tab-awards">
                            Honours & Awards
                        </button>
                        <button type="button" class="tab-btn-doc pb-3 text-gray-500 hover:text-[#27797D] transition-all" data-target="tab-experience">
                            Work Experience
                        </button>
                    </div>

                    <!-- Panel 1: Education & Training -->
                    <div id="tab-education" class="doc-tab-panel hidden space-y-3 text-xs sm:text-sm text-gray-700">
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span><strong>MBBS:</strong> S.S. Medical College, Rewa, Madhya Pradesh (1979)</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span><strong>MS (General Surgery):</strong> S.S. Medical College, Rewa, Madhya Pradesh (1983)</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span><strong>M.Ch (Cardiothoracic Surgery):</strong> King George's Medical University, Lucknow (1986)</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span><strong>Fellowship in Cardiovascular Surgery:</strong> Thorax Centre, University Hospital Rotterdam, Netherlands</span>
                        </div>
                    </div>

                    <!-- Panel 2: Honours & Awards (Screenshot 2) -->
                    <div id="tab-awards" class="doc-tab-panel space-y-3 text-xs sm:text-sm text-gray-700">
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Rashtriya Ratan Award by International Study Circle in 2005</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Lifetime Achievement Award by World Congress on Clinical and Preventive Cardiology (WCCPC) conferred by Dr A. P. J. Abdul Kalam in 2006</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Honoris Causa Doctorate (Doctor of Science) conferred by Governor of Madhya Pradesh and Chancellor of Rani Durgavati Vishwavidyalaya</span>
                        </div>
                    </div>

                    <!-- Panel 3: Work Experience -->
                    <div id="tab-experience" class="doc-tab-panel hidden space-y-3 text-xs sm:text-sm text-gray-700">
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Chief of Cardiac Surgery & Head of Clinical Services, Manipal Hospitals Dwarka, New Delhi</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Director & Head of Cardiac Surgery, Fortis Escorts Heart Institute, Okhla, New Delhi (16+ years)</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Senior Consultant Cardiothoracic Surgeon, Indraprastha Apollo Hospitals, New Delhi</span>
                        </div>
                    </div>

                </div>

                <!-- SECTION 5: PATIENT'S REVIEWS (Screenshot 3) -->
                <div id="reviews-section" class="space-y-4 scroll-mt-20">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight">
                            Patient's Reviews
                        </h2>
                        <div class="flex items-center text-xs font-semibold text-gray-700 gap-1.5 self-start sm:self-auto">
                            <span class="text-amber-500 text-sm">★</span>
                            <span class="font-bold text-gray-900">4.9</span>
                            <span class="text-gray-400">·</span>
                            <span class="text-gray-500">271 verified reviews</span>
                        </div>
                    </div>

                    <!-- Reviews Carousel Card -->
                    <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-7 space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            
                            <!-- Review 1 -->
                            <div class="bg-gray-50/70 rounded-xl p-4 border border-gray-200/70 space-y-3">
                                <div class="flex items-center text-amber-500 text-xs">★★★★★</div>
                                <p class="text-xs text-gray-600 leading-relaxed">
                                    "Dr. Y K Mishra performed my father's minimally invasive bypass surgery at Manipal Hospital. His recovery was remarkably fast and Dr. Mishra's bedside manner gave us complete confidence."
                                </p>
                                <div class="flex items-center gap-2.5 pt-2 border-t border-gray-200/60">
                                    <div class="w-7 h-7 rounded-full bg-blue-100 text-[#27797D] font-bold text-xs flex items-center justify-center">
                                        R
                                    </div>
                                    <div class="text-xs">
                                        <span class="font-bold text-gray-900 block leading-tight">Rohit Malhotra</span>
                                        <span class="text-gray-500 text-[11px]">Delhi, India</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Review 2 -->
                            <div class="bg-gray-50/70 rounded-xl p-4 border border-gray-200/70 space-y-3">
                                <div class="flex items-center text-amber-500 text-xs">★★★★★</div>
                                <p class="text-xs text-gray-600 leading-relaxed">
                                    "We traveled from Kenya for valve replacement. Dr. Mishra and the international patient desk made the whole surgery smooth and painless. A true maestro in heart surgery."
                                </p>
                                <div class="flex items-center gap-2.5 pt-2 border-t border-gray-200/60">
                                    <div class="w-7 h-7 rounded-full bg-blue-100 text-[#27797D] font-bold text-xs flex items-center justify-center">
                                        E
                                    </div>
                                    <div class="text-xs">
                                        <span class="font-bold text-gray-900 block leading-tight">Emmanuel Kiprono</span>
                                        <span class="text-gray-500 text-[11px]">Kenya</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- ==================== RIGHT COLUMN (4 COLS): STICKY INQUIRY FORM ==================== -->
            <div class="lg:col-span-4 lg:sticky lg:top-16 z-20 space-y-4" id="enquiry-box">
                
                <!-- Send Your Enquiry Box (Screenshots 1 & 2) -->
                <div class="bg-[#27797D] rounded-2xl p-5 sm:p-6 text-white shadow-xl border border-blue-400/20 space-y-4">
                    
                    <!-- Header -->
                    <div>
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-white p-1 flex-shrink-0">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 8v8M8 12h8"/></svg>
                            </div>
                            <h3 class="text-lg font-bold text-white tracking-tight">Send Your Enquiry</h3>
                        </div>
                        <p class="text-xs text-blue-100 mt-1">Fill in your details and our medical experts will contact you within 24 hours.</p>
                    </div>

                    <!-- Form -->
                    <form action="#" method="POST" class="space-y-3" onsubmit="event.preventDefault(); alert('Thank you! Your enquiry for Dr. Y K Mishra has been submitted. Our team will contact you within 24 hours.');">
                        @csrf
                        
                        <!-- Patient Name -->
                        <div>
                            <input type="text" name="patient_name" required placeholder="Patient Name" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- Country Dropdown -->
                        <div class="relative">
                            <select name="country" class="w-full text-xs text-gray-900 bg-white px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415] appearance-none cursor-pointer font-medium">
                                <option value="India" selected>India</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Russia">Russia</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Other">Other Country</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>

                        <!-- Select City -->
                        <div>
                            <input type="text" name="city" placeholder="Select City" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- Phone with Country Code (+91) -->
                        <div class="flex gap-2">
                            <div class="w-16 bg-white rounded-lg flex items-center justify-center text-xs font-bold text-gray-700 px-2 flex-shrink-0">
                                +91
                            </div>
                            <input type="tel" name="phone" required placeholder="Your Phone number" class="flex-1 text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- Medical Problem Textarea -->
                        <div>
                            <textarea name="problem" rows="3" placeholder="Describe The Current Medical Problem.." class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]"></textarea>
                        </div>

                        <!-- Age / DOB -->
                        <div>
                            <input type="text" name="age_dob" placeholder="Example: 30 Yrs or 29-05-1985" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- Continue Button -->
                        <button type="submit" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-sm font-bold py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 transform hover:-translate-y-0.5">
                            Continue →
                        </button>
                    </form>

                    <!-- Terms & Privacy -->
                    <p class="text-[11px] text-blue-100/90 text-center mt-3 leading-snug">
                        By submitting I agree to the <a href="#terms" class="underline hover:text-white font-medium">Terms of Use</a> and <a href="#privacy" class="underline hover:text-white font-medium">Privacy Policy</a> of Heal Go Fly.
                    </p>
                </div>

                <!-- Trust Box -->
                <div class="bg-white rounded-xl border border-gray-200/90 p-4 space-y-3.5 shadow-xs">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0 text-red-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-gray-900">Direct Doctor Access</span>
                            <span class="block text-[11px] text-gray-500">No mediator or extra fee</span>
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
        // Education & Awards Tab Switching
        const tabBtns = document.querySelectorAll('.tab-btn-doc');
        const panels = document.querySelectorAll('.doc-tab-panel');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const target = btn.getAttribute('data-target');

                tabBtns.forEach(b => {
                    b.classList.remove('active-doc-tab', 'text-[#27797D]', 'font-bold', 'border-b-2', 'border-[#27797D]');
                    b.classList.add('text-gray-500');
                });

                btn.classList.add('active-doc-tab', 'text-[#27797D]', 'font-bold', 'border-b-2', 'border-[#27797D]');
                btn.classList.remove('text-gray-500');

                panels.forEach(p => p.classList.add('hidden'));
                const activePanel = document.getElementById(target);
                if (activePanel) {
                    activePanel.classList.remove('hidden');
                }
            });
        });

        // Doctor Subnav Active State Highlighting
        const subnavLinks = document.querySelectorAll('.doc-subnav-item');
        subnavLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                subnavLinks.forEach(l => {
                    l.classList.remove('text-[#27797D]', 'font-bold', 'border-b-2', 'border-[#27797D]');
                    l.classList.add('text-gray-600');
                });
                link.classList.add('text-[#27797D]', 'font-bold', 'border-b-2', 'border-[#27797D]');
                link.classList.remove('text-gray-600');
            });
        });
    });
</script>
@endpush
