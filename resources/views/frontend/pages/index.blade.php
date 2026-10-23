@extends('frontend.layouts.app')

@section('title', 'Heal Go Fly - Medical Treatment With Unmatched Personal Care')

@section('content')
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
                                    class="w-full bg-[#EF7415] hover:bg-[#d9640d] active:scale-[0.99] text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 flex items-center justify-center gap-2 text-base"
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
                                    of Heal Go Fly.
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
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#27797D] hover:text-[#27797D] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
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
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#27797D] hover:text-[#27797D] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
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
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#27797D] hover:text-[#27797D] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
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
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#27797D] hover:text-[#27797D] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
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
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#27797D] hover:text-[#27797D] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
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
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#27797D] hover:text-[#27797D] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
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
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#27797D] hover:text-[#27797D] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
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
                <a href="#quote-form" class="inline-flex items-center gap-2.5 bg-white border border-gray-200/90 hover:border-[#27797D] hover:text-[#27797D] px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-gray-700 shadow-sm hover:shadow transition-all duration-150">
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
                    <a href="#quote-form" class="group bg-white rounded-xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-3.5 sm:gap-4 pr-2 sm:pr-3 min-w-0">
                            <!-- Icon -->
                            <div class="w-12 h-12 rounded-xl bg-blue-50/80 p-2.5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                                <img src="{{ asset('icons/onco.svg') }}" alt="Oncology" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-200">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                    Oncology
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Advanced cancer treatments with proven results.
                                </p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs group-hover:scale-110 group-hover:bg-[#d9640d] transition-all self-center ml-2">
                            <svg class="w-3.5 h-3.5 text-white stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </a>

                    <!-- 2. Neurosurgery -->
                    <a href="#quote-form" class="group bg-white rounded-xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-3.5 sm:gap-4 pr-2 sm:pr-3 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-blue-50/80 p-2.5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                                <img src="{{ asset('icons/neuro.png') }}" alt="Neurosurgery" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-200">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                    Neurosurgery
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Comprehensive neurosurgical care for adults and children.
                                </p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs group-hover:scale-110 group-hover:bg-[#d9640d] transition-all self-center ml-2">
                            <svg class="w-3.5 h-3.5 text-white stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </a>

                    <!-- 3. Spine Surgery -->
                    <a href="#quote-form" class="group bg-white rounded-xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-3.5 sm:gap-4 pr-2 sm:pr-3 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-blue-50/80 p-2.5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                                <img src="{{ asset('icons/spine.svg') }}" alt="Spine Surgery" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-200">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                    Spine Surgery
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Precision spine surgeries for better mobility.
                                </p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs group-hover:scale-110 group-hover:bg-[#d9640d] transition-all self-center ml-2">
                            <svg class="w-3.5 h-3.5 text-white stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </a>

                    <!-- 4. Cardiology -->
                    <a href="#quote-form" class="group bg-white rounded-xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-3.5 sm:gap-4 pr-2 sm:pr-3 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-blue-50/80 p-2.5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                                <img src="{{ asset('icons/cardio.svg') }}" alt="Cardiology" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-200">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                    Cardiology
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    World-class heart care for adults and children.
                                </p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs group-hover:scale-110 group-hover:bg-[#d9640d] transition-all self-center ml-2">
                            <svg class="w-3.5 h-3.5 text-white stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </a>

                    <!-- 5. Orthopedics -->
                    <a href="#quote-form" class="group bg-white rounded-xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-3.5 sm:gap-4 pr-2 sm:pr-3 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-blue-50/80 p-2.5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                                <img src="{{ asset('icons/ortho.svg') }}" alt="Orthopedics" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-200">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                    Orthopedics
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Expert joint replacements and bone deformity solutions.
                                </p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs group-hover:scale-110 group-hover:bg-[#d9640d] transition-all self-center ml-2">
                            <svg class="w-3.5 h-3.5 text-white stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </a>

                    <!-- 6. IVF -->
                    <a href="#quote-form" class="group bg-white rounded-xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-3.5 sm:gap-4 pr-2 sm:pr-3 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-blue-50/80 p-2.5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                                <img src="{{ asset('icons/ivf.svg') }}" alt="IVF" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-200">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                    IVF
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Leading fertility treatments with high success rates.
                                </p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs group-hover:scale-110 group-hover:bg-[#d9640d] transition-all self-center ml-2">
                            <svg class="w-3.5 h-3.5 text-white stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </a>

                    <!-- 7. Gynecology -->
                    <a href="#quote-form" class="group bg-white rounded-xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-3.5 sm:gap-4 pr-2 sm:pr-3 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-blue-50/80 p-2.5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                                <img src="{{ asset('icons/heno.svg') }}" alt="Gynecology" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-200">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                    Gynecology
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Specialized women's health services.
                                </p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs group-hover:scale-110 group-hover:bg-[#d9640d] transition-all self-center ml-2">
                            <svg class="w-3.5 h-3.5 text-white stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </a>

                    <!-- 8. Cosmetic -->
                    <a href="#quote-form" class="group bg-white rounded-xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-3.5 sm:gap-4 pr-2 sm:pr-3 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-blue-50/80 p-2.5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                                <img src="{{ asset('icons/cosmatic.svg') }}" alt="Cosmetic" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-200">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                    Cosmetic
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Aesthetic procedures for a new you.
                                </p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs group-hover:scale-110 group-hover:bg-[#d9640d] transition-all self-center ml-2">
                            <svg class="w-3.5 h-3.5 text-white stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </a>

                    <!-- 9. Weight Loss -->
                    <a href="#quote-form" class="group bg-white rounded-xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-3.5 sm:gap-4 pr-2 sm:pr-3 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-blue-50/80 p-2.5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                                <img src="{{ asset('icons/weightloss.svg') }}" alt="Weight Loss" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-200">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                    Weight Loss
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Specialized weight loss surgery options.
                                </p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs group-hover:scale-110 group-hover:bg-[#d9640d] transition-all self-center ml-2">
                            <svg class="w-3.5 h-3.5 text-white stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </a>

                    <!-- 10. Liver Transplant -->
                    <a href="#quote-form" class="group bg-white rounded-xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-3.5 sm:gap-4 pr-2 sm:pr-3 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-blue-50/80 p-2.5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                                <img src="{{ asset('icons/liver.svg') }}" alt="Liver Transplant" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-200">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                    Liver Transplant
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Liver transplant procedures of varying complexity.
                                </p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs group-hover:scale-110 group-hover:bg-[#d9640d] transition-all self-center ml-2">
                            <svg class="w-3.5 h-3.5 text-white stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </a>

                    <!-- 11. Kidney Transplant -->
                    <a href="#quote-form" class="group bg-white rounded-xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-3.5 sm:gap-4 pr-2 sm:pr-3 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-blue-50/80 p-2.5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                                <img src="{{ asset('icons/kidneytransplant.svg') }}" alt="Kidney Transplant" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-200">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                    Kidney Transplant
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Expert renal care and transplants.
                                </p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs group-hover:scale-110 group-hover:bg-[#d9640d] transition-all self-center ml-2">
                            <svg class="w-3.5 h-3.5 text-white stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </a>

                    <!-- 12. Bone Marrow -->
                    <a href="#quote-form" class="group bg-white rounded-xl p-4 sm:p-5 border border-gray-200/80 shadow-[0_2px_8px_rgba(0,0,0,0.03)] hover:shadow-lg hover:border-blue-300 transition-all duration-200 flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-3.5 sm:gap-4 pr-2 sm:pr-3 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-blue-50/80 p-2.5 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                                <img src="{{ asset('icons/bonemarrow.svg') }}" alt="Bone Marrow" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-200">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                    Bone Marrow
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                    Bone marrow transplant options for matched and non-matched donors.
                                </p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs group-hover:scale-110 group-hover:bg-[#d9640d] transition-all self-center ml-2">
                            <svg class="w-3.5 h-3.5 text-white stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </a>

                </div>

                <!-- Bottom Action Buttons: Need Assistance? & WhatsApp Chat -->
                <div class="flex flex-wrap items-center justify-center gap-3.5 sm:gap-4 mt-10 sm:mt-12">
                    <a 
                        href="#quote-form" 
                        class="bg-[#EF7415] hover:bg-[#d9640d] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-7 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center"
                    >
                        Need Assistance?
                    </a>
                    
                    <a 
                        href="https://wa.me/919129846542" 
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
                            <div class="w-14 h-14 rounded-full bg-[#f0f9f9] border border-blue-100/80 flex items-center justify-center text-[#27797D] group-hover:bg-[#27797D] group-hover:text-white transition-all duration-200 shadow-xs">
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
                            <div class="w-14 h-14 rounded-full bg-[#f0f9f9] border border-blue-100/80 flex items-center justify-center text-[#27797D] group-hover:bg-[#27797D] group-hover:text-white transition-all duration-200 shadow-xs">
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
                            <div class="w-14 h-14 rounded-full bg-[#f0f9f9] border border-blue-100/80 flex items-center justify-center text-[#27797D] group-hover:bg-[#27797D] group-hover:text-white transition-all duration-200 shadow-xs">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="16" rx="2"/>
                                    <path d="M3 10h18"/>
                                    <path d="m9 15 3-3 3 3"/>
                                    <path d="M12 12v6"/>
                                    <circle cx="18" cy="16" r="2.5" fill="#27797D" class="fill-[#27797D] stroke-white"/>
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
                            <div class="w-14 h-14 rounded-full bg-[#f0f9f9] border border-blue-100/80 flex items-center justify-center text-[#27797D] group-hover:bg-[#27797D] group-hover:text-white transition-all duration-200 shadow-xs">
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
                            class="bg-[#EF7415] hover:bg-[#d9640d] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-8 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center"
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
                            title="Medical Treatment Abroad - Heal Go Fly" 
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



    <!-- ==================== LOWEST QUOTES ASSURED ==================== -->
    <section class="py-14 sm:py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#27797D] tracking-tight">
                    Lowest Quotes Assured
                </h2>
                <p class="text-xs sm:text-sm text-[#5a6a85] mt-2.5 max-w-2xl mx-auto leading-relaxed">
                    We constantly negotiate better prices and alternatives without compromising treatment quality. Our prices are consistently lower.
                </p>
            </div>

            <!-- Quotes 4-Column Grid (12 Items) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                
                <!-- 1. Knee Replacement -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/RHEUMATOLOGY-51.svg') }}" alt="Knee Replacement" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Knee Replacement
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$4,000</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#EF7415] hover:text-[#d9640d] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 2. Hip Replacement -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Hip-Replecement.svg') }}" alt="Hip Replacement" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Hip Replacement
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$5,500</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#EF7415] hover:text-[#d9640d] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 3. Brain Tumor -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Brain-Tumor.svg') }}" alt="Brain Tumor" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Brain Tumor
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$5,000</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#EF7415] hover:text-[#d9640d] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 4. Heart Bypass Surgery -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Heart-Bypass-Surgery.svg') }}" alt="Heart Bypass Surgery" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Heart Bypass Surgery
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$4,500</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#EF7415] hover:text-[#d9640d] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 5. Valve Replacement -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Valve-Replacement.svg') }}" alt="Valve Replacement" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Valve Replacement
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$9,500</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#EF7415] hover:text-[#d9640d] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 6. Breast Cancer -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Breast-Cancer.svg') }}" alt="Breast Cancer" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Breast Cancer
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$5,000</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#EF7415] hover:text-[#d9640d] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 7. Lung Cancer -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Lung-Cancer.svg') }}" alt="Lung Cancer" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Lung Cancer
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$5,500</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#EF7415] hover:text-[#d9640d] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 8. Rhinoplasty -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Rhinoplasty.svg') }}" alt="Rhinoplasty" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Rhinoplasty
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$1,800</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#EF7415] hover:text-[#d9640d] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 9. Breast Implants -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Breast-Cancer (1).svg') }}" alt="Breast Implants" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Breast Implants
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$2,750</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#EF7415] hover:text-[#d9640d] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 10. Hair Transplant -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Hair-Transpalnt.svg') }}" alt="Hair Transplant" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Hair Transplant
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$1,400</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#EF7415] hover:text-[#d9640d] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 11. Cervical Cancer -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Cervical-Cancer.svg') }}" alt="Cervical Cancer" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Cervical Cancer
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$4,500</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#EF7415] hover:text-[#d9640d] mt-1 group-hover:underline">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- 12. Hysterectomy -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-3.5 sm:p-4 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-3.5 group cursor-pointer">
                    <img src="{{ asset('icons/Hysterectomy.svg') }}" alt="Hysterectomy" class="w-12 h-12 flex-shrink-0 group-hover:scale-105 transition-transform object-contain">
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Hysterectomy
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Starting <span class="font-bold text-gray-900">$3,000</span>
                        </p>
                        <a href="#quote-form" class="inline-block text-xs font-semibold text-[#EF7415] hover:text-[#d9640d] mt-1 group-hover:underline">
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
                        class="bg-[#EF7415] hover:bg-[#d9640d] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-7 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center"
                    >
                        Get Quote
                    </a>
                    
                    <a 
                        href="https://wa.me/919129846542" 
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
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10 9 9 9 8 9"/>
                            <path d="M10 13l2 2 4-4" stroke="#EF7415" stroke-width="2"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Medical Opinion
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Expert opinions and cost estimates.
                        </p>
                    </div>
                </div>

                <!-- 2. Pre-Travel Consultations -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M22 6c0 1.66-1.34 3-3 3h-.5L17 11v-2c-1.66 0-3-1.34-3-3s1.34-3 3-3h2c1.66 0 3 1.34 3 3z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Pre-Travel Consultations
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Understand your procedure before traveling.
                        </p>
                    </div>
                </div>

                <!-- 3. Visa Assistance -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="5" y="3" width="14" height="18" rx="2"/>
                            <line x1="9" y1="7" x2="15" y2="7"/>
                            <circle cx="12" cy="13" r="3"/>
                            <path d="M12 11v4M10 13h4" stroke="#EF7415" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Visa Assistance
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Complete medical visa assistance.
                        </p>
                    </div>
                </div>

                <!-- 4. Money Exchange -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform">
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
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Money Exchange
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Convenient currency exchange services in your city.
                        </p>
                    </div>
                </div>

                <!-- 5. Interpreters -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform">
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
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Interpreters
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Fluent professionals to break language barriers at every step.
                        </p>
                    </div>
                </div>

                <!-- 6. Transportation -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="1" y="3" width="15" height="13" rx="2"/>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
                            <circle cx="5.5" cy="18.5" r="2.5"/>
                            <circle cx="18.5" cy="18.5" r="2.5"/>
                            <path d="M7 8h4M9 6v4" stroke="#EF7415" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Transportation
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Complimentary airport transfers.
                        </p>
                    </div>
                </div>

                <!-- 7. Accommodation Options -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 21h18"/>
                            <path d="M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16"/>
                            <path d="M9 7h1M9 11h1M9 15h1M14 7h1M14 11h1M14 15h1"/>
                            <path d="M10 21v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Accommodation Options
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Near the hospital and matching your budget and needs.
                        </p>
                    </div>
                </div>

                <!-- 8. Hospital Coordination -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                            <rect x="8" y="2" width="8" height="4" rx="1"/>
                            <path d="M9 14h6M9 18h4"/>
                            <path d="M12 8v4M10 10h4" stroke="#EF7415" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
                            Hospital Coordination
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Full coordination of medical logistics.
                        </p>
                    </div>
                </div>

                <!-- 9. Private Duty Nursing -->
                <div class="bg-[#f0f9f9] hover:bg-[#edf6f9] rounded-2xl p-4 sm:p-5 border border-blue-100/60 hover:border-blue-300/80 shadow-xs hover:shadow-md transition-all duration-200 flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs border border-blue-100/80 flex items-center justify-center flex-shrink-0 text-[#27797D] group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            <path d="M12 8v6M9 11h6" stroke="#EF7415" stroke-width="1.8"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#112347] leading-snug group-hover:text-[#27797D] transition-colors">
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
                    class="bg-[#EF7415] hover:bg-[#d9640d] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-7 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center"
                >
                    Get Quote
                </a>
                
                <a 
                    href="https://wa.me/919129846542" 
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
                                    <span class="block text-[11px] sm:text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">
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
                                    <span class="block text-[11px] sm:text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">
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
                                    <span class="block text-[11px] sm:text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">
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
                                    <span class="block text-[11px] sm:text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">
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
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">Medical Park, Istanbul</span>
                                    </div>
                                </div>
                                <!-- Memorial Hospitals, Istanbul -->
                                <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                    <div class="aspect-[16/11] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1512678080530-7760d81faba6?auto=format&fit=crop&w=400&q=80" alt="Memorial Hospitals, Istanbul" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    </div>
                                    <div class="py-2 px-1 text-center bg-white border-t border-gray-100">
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">Memorial Hospitals, Istanbul</span>
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
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">Burjeel, Abu Dhabi</span>
                                    </div>
                                </div>
                                <!-- Saudi German, Dubai -->
                                <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                    <div class="aspect-[16/11] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=400&q=80" alt="Saudi German, Dubai" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    </div>
                                    <div class="py-2 px-1 text-center bg-white border-t border-gray-100">
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">Saudi German, Dubai</span>
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
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">Bumrungrad, Bangkok</span>
                                    </div>
                                </div>
                                <!-- Bangkok Hospital -->
                                <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                    <div class="aspect-[16/11] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=400&q=80" alt="Bangkok Hospital" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    </div>
                                    <div class="py-2 px-1 text-center bg-white border-t border-gray-100">
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">Bangkok Hospital</span>
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
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">Charite, Berlin</span>
                                    </div>
                                </div>
                                <!-- Heidelberg University -->
                                <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                    <div class="aspect-[16/11] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=400&q=80" alt="Heidelberg University" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                    </div>
                                    <div class="py-2 px-1 text-center bg-white border-t border-gray-100">
                                        <span class="block text-[10px] sm:text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">Heidelberg University</span>
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
                                    <span class="block text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">Arab Contractors Medical Centre, Cairo</span>
                                </div>
                            </div>
                            <!-- As-Salam International Hospital, Cairo -->
                            <div class="group bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all">
                                <div class="aspect-[21/9] sm:aspect-[16/8] overflow-hidden bg-gray-100">
                                    <img src="https://images.unsplash.com/photo-1538108149393-fbbd81895907?auto=format&fit=crop&w=500&q=80" alt="As-Salam International Hospital, Cairo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                </div>
                                <div class="py-2.5 px-2 text-center bg-white border-t border-gray-100">
                                    <span class="block text-xs font-bold text-gray-800 group-hover:text-[#27797D] transition-colors line-clamp-1">As-Salam International Hospital, Cairo</span>
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
                <div class="bg-[#27797D] text-white font-bold text-[9px] px-1.5 py-0.5 rounded shadow-xs" title="ISO 9001">
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
                    class="bg-[#EF7415] hover:bg-[#d9640d] active:scale-[0.99] text-white text-sm sm:text-base font-bold px-7 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 inline-flex items-center justify-center"
                >
                    Contact Hospital
                </a>
                
                <a 
                    href="https://wa.me/919129846542" 
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

    <!-- ==================== HEAL GO FLY IN NEWS ==================== -->
    <section class="py-14 sm:py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header with Left Title and Right Nav Controls -->
            <div class="flex items-center justify-between mb-8 sm:mb-10">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#112347] tracking-tight">
                    Heal Go Fly In News
                </h2>
                
                <!-- Slider Nav Arrows -->
                <div class="flex items-center gap-2">
                    <button 
                        type="button" 
                        id="news-slider-prev" 
                        class="w-9 h-9 rounded-full border border-gray-300 hover:border-[#27797D] text-gray-500 hover:text-[#27797D] flex items-center justify-center transition-all bg-white shadow-xs active:scale-95"
                        aria-label="Previous News"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button 
                        type="button" 
                        id="news-slider-next" 
                        class="w-9 h-9 rounded-full border border-gray-300 hover:border-[#27797D] text-gray-500 hover:text-[#27797D] flex items-center justify-center transition-all bg-white shadow-xs active:scale-95"
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
                                <span class="text-[9px] font-black tracking-tight text-[#27797D]">Bio<span class="text-amber-500">Spectrum</span></span>
                            </div>
                            <!-- Angled Wave Banner at Bottom -->
                            <div class="absolute bottom-0 inset-x-0 h-8 flex items-end">
                                <svg viewBox="0 0 400 50" preserveAspectRatio="none" class="absolute inset-0 w-full h-full text-[#27797D] fill-current">
                                    <path d="M0,25 Q150,50 300,20 Q360,5 400,0 L400,50 L0,50 Z"></path>
                                </svg>
                                <span class="relative z-10 text-[10px] font-extrabold uppercase tracking-wider text-white pl-3 pb-1 flex items-center gap-1.5">
                                    News Article
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3.5 sm:p-4">
                            <h3 class="text-xs font-bold text-[#27797D] hover:underline leading-snug line-clamp-3">
                                BioSpectrumIndia: Heal Go Fly's CancerRounds Acquisition Featured in a Leading Life Sciences Industry Story
                            </h3>
                            <p class="text-[11px] text-gray-500 mt-2 line-clamp-3 leading-relaxed">
                                Heal Go Fly's CancerRounds Acquisition Featured in BioSpectrum Industry Story
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
                                <svg viewBox="0 0 400 50" preserveAspectRatio="none" class="absolute inset-0 w-full h-full text-[#27797D] fill-current">
                                    <path d="M0,25 Q150,50 300,20 Q360,5 400,0 L400,50 L0,50 Z"></path>
                                </svg>
                                <span class="relative z-10 text-[10px] font-extrabold uppercase tracking-wider text-white pl-3 pb-1 flex items-center gap-1.5">
                                    News Article
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3.5 sm:p-4">
                            <h3 class="text-xs font-bold text-[#27797D] hover:underline leading-snug line-clamp-3">
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
                                <svg viewBox="0 0 400 50" preserveAspectRatio="none" class="absolute inset-0 w-full h-full text-[#27797D] fill-current">
                                    <path d="M0,25 Q150,50 300,20 Q360,5 400,0 L400,50 L0,50 Z"></path>
                                </svg>
                                <span class="relative z-10 text-[10px] font-extrabold uppercase tracking-wider text-white pl-3 pb-1 flex items-center gap-1.5">
                                    News Article
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3.5 sm:p-4">
                            <h3 class="text-xs font-bold text-[#27797D] hover:underline leading-snug line-clamp-3">
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
                                <svg viewBox="0 0 400 50" preserveAspectRatio="none" class="absolute inset-0 w-full h-full text-[#27797D] fill-current">
                                    <path d="M0,25 Q150,50 300,20 Q360,5 400,0 L400,50 L0,50 Z"></path>
                                </svg>
                                <span class="relative z-10 text-[10px] font-extrabold uppercase tracking-wider text-white pl-3 pb-1 flex items-center gap-1.5">
                                    News Article
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3.5 sm:p-4">
                            <h3 class="text-xs font-bold text-[#27797D] hover:underline leading-snug line-clamp-3">
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
                                <span class="text-[9px] font-black tracking-tight text-[#27797D]">CII</span>
                            </div>
                            <!-- Angled Wave Banner at Bottom -->
                            <div class="absolute bottom-0 inset-x-0 h-8 flex items-end">
                                <svg viewBox="0 0 400 50" preserveAspectRatio="none" class="absolute inset-0 w-full h-full text-[#27797D] fill-current">
                                    <path d="M0,25 Q150,50 300,20 Q360,5 400,0 L400,50 L0,50 Z"></path>
                                </svg>
                                <span class="relative z-10 text-[10px] font-extrabold uppercase tracking-wider text-white pl-3 pb-1 flex items-center gap-1.5">
                                    News Article
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3.5 sm:p-4">
                            <h3 class="text-xs font-bold text-[#27797D] hover:underline leading-snug line-clamp-3">
                                Exploring AI, Digital Innovation and the Future of Cross-Border Healthcare
                            </h3>
                            <p class="text-[11px] text-gray-500 mt-2 line-clamp-3 leading-relaxed">
                                Pankaj Chandna Highlights Heal Go Fly's Vision at the 5th CII Digital Health Summit
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Dots Indicator -->
            <div class="flex items-center justify-center gap-1.5 mt-6 sm:mt-8">
                <span class="w-2 h-2 rounded-full bg-[#27797D]"></span>
                <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                <span class="w-2 h-2 rounded-full bg-gray-300"></span>
            </div>

        </div>
    </section>




@endsection
