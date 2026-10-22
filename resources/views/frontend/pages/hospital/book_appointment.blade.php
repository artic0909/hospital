@extends('frontend.layouts.app')

@section('title', 'Book an Appointment - Indraprastha Apollo Hospital, New Delhi | Heal Go Fly')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-50/80 border-b border-gray-200/70">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-3">
            <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium overflow-x-auto whitespace-nowrap">
                <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('hospitals') }}" class="hover:text-[#27797D] transition-colors">Hospitals</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('hospital.details') }}" class="hover:text-[#27797D] transition-colors">Indraprastha Apollo Hospital</a>
                <span class="text-gray-400">›</span>
                <span class="text-[#112347] font-semibold">Book an Appointment</span>
            </nav>
        </div>
    </div>

    <!-- ==================== MAIN APPOINTMENT CONTAINER ==================== -->
    <div class="min-h-screen bg-white sm:bg-gray-50/50 py-6 sm:py-10">
        <div class="max-w-2xl mx-auto px-4 sm:px-6">
            
            <!-- Page Header -->
            <div class="mb-5 sm:mb-6">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-[#112347] tracking-tight">
                    Book an Appointment
                </h1>
                <p class="text-xs sm:text-sm text-gray-500 mt-1">
                    Book appointments with minimum wait-time & verified doctor details
                </p>
            </div>

            <!-- Hospital Info Card (Indraprastha Apollo Hospital) -->
            <div class="bg-white rounded-2xl border border-gray-200/90 shadow-xs p-4 sm:p-5 flex items-center gap-4 mb-6">
                <img 
                    src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=300&q=80" 
                    alt="Indraprastha Apollo Hospital, New Delhi" 
                    class="w-16 h-16 sm:w-18 sm:h-18 rounded-xl object-cover border border-gray-100 flex-shrink-0 shadow-xs"
                >
                <div class="space-y-1">
                    <a href="{{ route('hospital.details') }}" class="block font-bold text-sm sm:text-base text-[#27797D] hover:underline leading-snug">
                        Indraprastha Apollo Hospital, New Delhi
                    </a>
                    <div class="flex items-center text-xs text-amber-500 font-semibold">
                        ★★★★<span class="text-gray-300">★</span>
                        <span class="text-gray-700 ml-1.5 font-bold">4.3</span>
                        <span class="text-gray-500 ml-1">(86 Ratings)</span>
                    </div>
                    <div class="flex items-center gap-1 text-xs text-gray-500">
                        <svg class="w-3.5 h-3.5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        <span>New Delhi, India</span>
                    </div>
                </div>
            </div>

            <!-- Main Appointment Form Card -->
            <div class="bg-white rounded-2xl sm:border sm:border-gray-200/90 sm:shadow-sm p-4 sm:p-7">
                
                <!-- STEP 1: DOCTOR / SPECIALITY SELECTION -->
                <div id="step-1-container" class="space-y-6">
                    
                    <!-- Choose Mode Header & Radio Pills -->
                    <div class="space-y-3">
                        <label class="block text-xs sm:text-sm font-bold text-gray-900">
                            Choose how you want to find your doctor
                        </label>

                        <!-- Two Radio Pills -->
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                            <!-- Pill 1: I know the doctor -->
                            <label id="pill-doctor" class="finder-pill active-pill flex-1 flex items-center gap-2.5 px-4 sm:px-5 py-3 rounded-full border-2 border-[#27797D] bg-blue-50/70 text-[#27797D] font-semibold text-xs sm:text-sm cursor-pointer transition-all shadow-xs">
                                <input type="radio" name="doctor_find_mode" value="doctor" checked class="hidden mode-radio">
                                <span class="radio-dot w-4 h-4 rounded-full border-2 border-[#27797D] flex items-center justify-center flex-shrink-0">
                                    <span class="dot-inner w-2 h-2 rounded-full bg-[#27797D]"></span>
                                </span>
                                <span>I know the doctor</span>
                            </label>

                            <!-- Pill 2: Search by speciality -->
                            <label id="pill-speciality" class="finder-pill flex-1 flex items-center gap-2.5 px-4 sm:px-5 py-3 rounded-full border border-gray-200 bg-white text-gray-700 font-semibold text-xs sm:text-sm cursor-pointer hover:border-gray-300 transition-all">
                                <input type="radio" name="doctor_find_mode" value="speciality" class="hidden mode-radio">
                                <span class="radio-dot w-4 h-4 rounded-full border-2 border-gray-300 flex items-center justify-center flex-shrink-0">
                                    <span class="dot-inner w-2 h-2 rounded-full bg-transparent"></span>
                                </span>
                                <span>Search by speciality</span>
                            </label>
                        </div>
                    </div>

                    <!-- ==================== MODE A: I KNOW THE DOCTOR ==================== -->
                    <div id="mode-doctor-section" class="space-y-4">
                        
                        <!-- Doctor Selection Input with Search Dropdown -->
                        <div class="relative">
                            <label class="block text-xs sm:text-sm font-semibold text-gray-800 mb-1.5">
                                Select Doctor (<span id="total-doctors-count">136</span> Doctors) <span class="text-red-500">*</span>
                            </label>
                            
                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="doctor-search-input" 
                                    placeholder="Search doctor by name." 
                                    autocomplete="off"
                                    class="w-full text-xs sm:text-sm text-gray-900 bg-white placeholder-gray-400 px-3.5 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100 transition-all"
                                >
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                </div>
                            </div>

                            <!-- Doctor Dropdown Menu (Screenshot 2) -->
                            <div id="doctor-dropdown-menu" class="hidden absolute left-0 right-0 mt-1 max-h-60 overflow-y-auto bg-white border border-gray-200 rounded-xl shadow-xl z-50 py-1.5 text-xs sm:text-sm">
                                <!-- Populated dynamically by JS -->
                            </div>
                        </div>

                    </div>

                    <!-- ==================== MODE B: SEARCH BY SPECIALITY ==================== -->
                    <div id="mode-speciality-section" class="hidden space-y-4">
                        
                        <!-- Step B1: Speciality Select (Screenshot 3) -->
                        <div class="relative">
                            <label class="block text-xs sm:text-sm font-semibold text-gray-800 mb-1.5">
                                Select Speciality <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="speciality-search-input" 
                                    placeholder="Search speciality" 
                                    autocomplete="off"
                                    class="w-full text-xs sm:text-sm text-gray-900 bg-white placeholder-gray-400 px-3.5 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100 cursor-pointer transition-all"
                                >
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400" id="speciality-chevron">
                                    <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>

                            <!-- Speciality Dropdown Menu (Screenshot 3) -->
                            <div id="speciality-dropdown-menu" class="hidden absolute left-0 right-0 mt-1 max-h-60 overflow-y-auto bg-white border border-gray-200 rounded-xl shadow-xl z-50 py-1.5 text-xs sm:text-sm">
                                <!-- Populated dynamically by JS -->
                            </div>
                        </div>

                        <!-- Step B2: Filtered Doctors under selected Speciality (Screenshots 4 & 5) -->
                        <div id="speciality-doctor-container" class="hidden relative pt-1">
                            <label class="block text-xs sm:text-sm font-semibold text-gray-800 mb-1.5">
                                Select Doctor (<span id="spec-doctor-count">3</span> Doctors) <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="spec-doctor-search-input" 
                                    placeholder="Search doctor by name." 
                                    autocomplete="off"
                                    class="w-full text-xs sm:text-sm text-gray-900 bg-white placeholder-gray-400 px-3.5 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100 transition-all"
                                >
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                </div>
                            </div>

                            <!-- Speciality Doctor Dropdown (Screenshot 5) -->
                            <div id="spec-doctor-dropdown-menu" class="hidden absolute left-0 right-0 mt-1 max-h-60 overflow-y-auto bg-white border border-gray-200 rounded-xl shadow-xl z-50 py-1.5 text-xs sm:text-sm">
                                <!-- Populated dynamically by JS -->
                            </div>
                        </div>

                    </div>

                    <!-- Common Checkbox: "Your doctor not in the list?" -->
                    <div class="pt-1">
                        <label class="inline-flex items-center gap-2 cursor-pointer select-none text-xs sm:text-sm text-gray-700">
                            <input type="checkbox" id="doctor-not-in-list" class="w-4 h-4 rounded text-[#27797D] border-gray-300 focus:ring-[#27797D]">
                            <span>Your doctor not in the list?</span>
                        </label>

                        <!-- Optional custom doctor input when checked -->
                        <div id="custom-doctor-box" class="hidden mt-2.5">
                            <input 
                                type="text" 
                                id="custom-doctor-name" 
                                placeholder="Enter your preferred doctor's name" 
                                class="w-full text-xs sm:text-sm text-gray-900 bg-gray-50/80 placeholder-gray-400 px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100"
                            >
                        </div>
                    </div>

                    <!-- Selected Doctor Profile Card & Date Picker (Screenshots 1 & 2) -->
                    <div id="doctor-appointment-card" class="hidden bg-white border border-gray-200/90 rounded-2xl p-4 sm:p-5 shadow-xs space-y-4">
                        
                        <!-- Doctor Info -->
                        <div class="flex items-center gap-3.5">
                            <img 
                                id="card-doctor-photo"
                                src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=200&q=80" 
                                alt="Doctor Photo"
                                class="w-14 h-14 rounded-full object-cover border border-gray-100 flex-shrink-0 shadow-xs"
                            >
                            <div class="space-y-0.5">
                                <div class="flex items-center gap-1.5">
                                    <h3 class="text-sm sm:text-base font-bold text-[#27797D]" id="card-doctor-name">Dr. Kuldeep Singh</h3>
                                    <!-- Red verified badge circle with check -->
                                    <span class="inline-flex items-center justify-center w-4 h-4 rounded-full border border-red-500 text-red-500 text-[10px] font-bold">
                                        ✓
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500" id="card-doctor-spec">Aesthetic and Plastic Surgeon</p>
                                <div class="flex items-center gap-1 text-[11px] text-gray-500">
                                    <svg class="w-3 h-3 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                    <span>New Delhi, India</span>
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="border-t border-gray-100"></div>

                        <!-- Select Appointment Date -->
                        <div class="space-y-3">
                            <label class="block text-xs sm:text-sm font-bold text-gray-900">
                                Select Appointment Date
                            </label>

                            <!-- Date Pills Row -->
                            <div class="relative">
                                <div class="flex items-center gap-2 overflow-x-auto pb-1.5 scrollbar-none" id="date-pills-row">
                                    <button type="button" class="date-pill flex-shrink-0 px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-xs text-gray-700 hover:border-gray-300 font-medium transition-all" data-date="19-10-2026">
                                        Mon, 19-Oct
                                    </button>
                                    <button type="button" class="date-pill flex-shrink-0 px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-xs text-gray-700 hover:border-gray-300 font-medium transition-all" data-date="20-10-2026">
                                        Tue, 20-Oct
                                    </button>
                                    <button type="button" class="date-pill flex-shrink-0 px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-xs text-gray-700 hover:border-gray-300 font-medium transition-all" data-date="21-10-2026">
                                        Wed, 21-Oct
                                    </button>
                                    <button type="button" class="date-pill flex-shrink-0 px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-xs text-gray-700 hover:border-gray-300 font-medium transition-all" data-date="22-10-2026">
                                        Thu, 22-Oct
                                    </button>
                                    <button type="button" class="date-pill flex-shrink-0 px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-xs text-gray-700 hover:border-gray-300 font-medium transition-all" data-date="23-10-2026">
                                        Fri, 23-Oct
                                    </button>
                                    <button type="button" class="date-pill active-date-pill flex-shrink-0 px-3 py-1.5 rounded-lg border-2 border-[#27797D] bg-blue-50/60 text-[#27797D] text-xs font-semibold shadow-xs" data-date="custom">
                                        Custom date
                                    </button>
                                </div>
                            </div>

                            <!-- Choose another date input -->
                            <div id="custom-date-container" class="space-y-1.5 pt-1">
                                <label class="block text-xs text-gray-600 font-medium">Choose another date</label>
                                <div class="relative">
                                    <input 
                                        type="date" 
                                        id="appointment-custom-date" 
                                        value="2026-10-30" 
                                        class="w-full text-xs sm:text-sm text-gray-900 bg-white px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100"
                                    >
                                </div>
                                <p class="text-[11px] text-gray-500">
                                    We'll confirm availability for this date — a time is optional.
                                </p>
                            </div>

                        </div>

                    </div>

                    <!-- Red Action Button: Next → -->
                    <div class="pt-2">
                        <button 
                            type="button" 
                            id="btn-goto-step-2" 
                            class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-sm sm:text-base font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-150 transform hover:-translate-y-0.5 text-center flex items-center justify-center gap-2"
                        >
                            <span>Next →</span>
                        </button>
                    </div>

                </div>

                <!-- STEP 2: PATIENT DETAILS & PREFERENCES (Revealed after clicking Next) -->
                <div id="step-2-container" class="hidden space-y-6">
                    
                    <!-- Back Button & Selected Summary -->
                    <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                        <button type="button" id="btn-back-to-step-1" class="text-xs sm:text-sm text-[#27797D] hover:underline font-bold flex items-center gap-1.5">
                            <span>←</span>
                            <span>Change Doctor / Speciality</span>
                        </button>
                        <span class="text-xs font-semibold text-gray-500">Step 2 of 2</span>
                    </div>

                    <!-- Appointment Summary Banner -->
                    <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-blue-100 text-[#27797D] flex items-center justify-center font-bold text-sm flex-shrink-0">
                            👨‍⚕️
                        </div>
                        <div class="text-xs sm:text-sm">
                            <span class="block text-gray-500">Appointment with:</span>
                            <span class="font-bold text-[#112347]" id="summary-doctor-name">Dr. P. L. Dhingra</span>
                            <span class="text-gray-500 text-xs ml-1" id="summary-doctor-spec">(ENT Specialist)</span>
                        </div>
                    </div>

                    <!-- Patient Form -->
                    <form id="appointment-final-form" onsubmit="event.preventDefault(); handleAppointmentSubmit();" class="space-y-4">
                        
                        <!-- 1. Patient Name -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Patient Full Name <span class="text-red-500">*</span></label>
                            <input type="text" id="patient-name-input" required placeholder="Enter patient name" class="w-full text-xs sm:text-sm text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100">
                        </div>

                        <!-- 2. Phone with Country Code Selector -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                            <div class="flex gap-2">
                                <select class="w-24 bg-gray-50 text-xs font-bold text-gray-700 px-2.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D]">
                                    <option value="+91" selected>🇮🇳 +91</option>
                                    <option value="+880">🇧🇩 +880</option>
                                    <option value="+971">🇦🇪 +971</option>
                                    <option value="+966">🇸🇦 +966</option>
                                    <option value="+7">🇷🇺 +7</option>
                                    <option value="+234">🇳🇬 +234</option>
                                    <option value="+254">🇰🇪 +254</option>
                                    <option value="+44">🇬🇧 +44</option>
                                    <option value="+1">🇺🇸 +1</option>
                                </select>
                                <input type="tel" id="patient-phone-input" required placeholder="Phone number" class="flex-1 text-xs sm:text-sm text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100">
                            </div>
                        </div>

                        <!-- 3. Email Address -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Email Address <span class="text-gray-400 text-[11px]">(Optional)</span></label>
                            <input type="email" placeholder="patient@example.com" class="w-full text-xs sm:text-sm text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100">
                        </div>

                        <!-- 4. Preferred Consultation Date -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1">Preferred Date <span class="text-red-500">*</span></label>
                                <input type="date" required value="{{ date('Y-m-d', strtotime('+1 day')) }}" class="w-full text-xs sm:text-sm text-gray-900 bg-white px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D]">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1">Preferred Time Slot</label>
                                <select class="w-full text-xs sm:text-sm text-gray-900 bg-white px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D]">
                                    <option value="morning">Morning (09:00 AM - 12:00 PM)</option>
                                    <option value="afternoon" selected>Afternoon (12:00 PM - 04:00 PM)</option>
                                    <option value="evening">Evening (04:00 PM - 07:00 PM)</option>
                                </select>
                            </div>
                        </div>

                        <!-- 5. Current Medical Problem -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Describe Medical Concern</label>
                            <textarea rows="3" placeholder="Briefly describe symptoms, history or medical inquiry..." class="w-full text-xs sm:text-sm text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button 
                                type="submit" 
                                class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-sm sm:text-base font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-150 transform hover:-translate-y-0.5 text-center"
                            >
                                Confirm & Book Appointment
                            </button>
                        </div>

                        <p class="text-[11px] text-gray-500 text-center leading-snug">
                            By booking, you agree to Heal Go Fly's Terms of Use & Privacy Policy. A patient coordinator will contact you within 24 hours.
                        </p>

                    </form>

                </div>

                <!-- STEP 3: SUCCESS MODAL / CONFIRMATION -->
                <div id="appointment-success-box" class="hidden text-center py-8 space-y-4">
                    <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto text-3xl font-bold">
                        ✓
                    </div>
                    <div class="space-y-1">
                        <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347]">
                            Appointment Requested Successfully!
                        </h2>
                        <p class="text-xs sm:text-sm text-gray-600 max-w-md mx-auto">
                            Thank you! Your appointment request for <strong class="text-gray-900">Indraprastha Apollo Hospital</strong> has been forwarded to our clinical concierge desk.
                        </p>
                    </div>

                    <div class="bg-gray-50 border border-gray-200/80 rounded-xl p-4 max-w-sm mx-auto text-xs text-left space-y-1.5">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Doctor:</span>
                            <span class="font-bold text-gray-900" id="confirmed-doc-name">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Hospital:</span>
                            <span class="font-bold text-gray-900">Apollo Hospital, New Delhi</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Patient:</span>
                            <span class="font-bold text-gray-900" id="confirmed-pat-name">-</span>
                        </div>
                    </div>

                    <div class="pt-3 flex flex-col sm:flex-row items-center justify-center gap-3">
                        <a href="{{ route('hospital.details') }}" class="w-full sm:w-auto bg-[#27797D] hover:bg-[#15364e] text-white text-xs sm:text-sm font-bold py-2.5 px-6 rounded-lg transition-all">
                            Back to Hospital Details
                        </a>
                        <button type="button" onclick="location.reload()" class="w-full sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs sm:text-sm font-semibold py-2.5 px-5 rounded-lg transition-all">
                            Book Another Appointment
                        </button>
                    </div>
                </div>

            </div>



        </div>
    </div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {

        // ==================== DATA LISTS ====================
        const allDoctors = [
            { name: "Dr. P. L. Dhingra", spec: "ENT Specialist" },
            { name: "Dr. Shakti Bhan Khanna", spec: "Obstetrician and Gynaecologist" },
            { name: "Dr. Subhash Wangnoo", spec: "Endocrinologist" },
            { name: "Dr. Arun Prasad", spec: "Obesity and Bariatric Surgeon" },
            { name: "Dr. Prita Trehan", spec: "Neonatologist" },
            { name: "Dr. Kuldeep Singh", spec: "Aesthetic and Plastic Surgeon" },
            { name: "Dr. Rakesh Kumar Watts", spec: "Aesthetic and Plastic Surgeon" },
            { name: "Dr Pankaj Mehta", spec: "Aesthetic and Plastic Surgeon" },
            { name: "Dr. Naresh Trehan", spec: "Cardiac Surgeon" },
            { name: "Dr. Ashok Vaid", spec: "Oncologist" },
            { name: "Dr. Sandeep Vaishya", spec: "Neurologist and Neurosurgeon" },
            { name: "Dr. Bipul Roy", spec: "General Surgeon" },
            { name: "Dr. Vikram Kalra", spec: "Nephrologist" },
            { name: "Dr. Ananya Sharma", spec: "Pediatrician" },
            { name: "Dr. Meena Agarwal", spec: "Dermatologist" },
            { name: "Dr. Rajesh Gupta", spec: "Orthopedic Surgeon" },
            { name: "Dr. Alok Sharma", spec: "Spine Surgeon" },
            { name: "Dr. Amit Ghosh", spec: "Gastroenterologist" },
            { name: "Dr. Sanjay Gogoi", spec: "Urologist" },
            { name: "Dr. Rajiv Chhabra", spec: "Pulmonologist" },
            { name: "Dr. Sunita Kapoor", spec: "Ophthalmologist" }
        ];

        const specialities = [
            "Aesthetic and Plastic Surgeon",
            "Arthroscopy and Sports Medicine",
            "Cardiac Surgeon",
            "Cataract Surgeon",
            "Colorectal Surgeon",
            "Dermatologist",
            "Endocrinologist",
            "ENT Surgeon",
            "Gastroenterologist",
            "General Surgeon",
            "Gynecologist",
            "Hematologist",
            "Nephrologist",
            "Neurologist and Neurosurgeon",
            "Oncologist",
            "Ophthalmologist",
            "Orthopedic Surgeon",
            "Pediatrician",
            "Pulmonologist",
            "Rheumatologist",
            "Spine Surgeon",
            "Urologist",
            "Vascular Surgeon"
        ];

        // State
        let selectedDoctor = null;
        let selectedSpeciality = null;

        // Elements
        const pillDoctor = document.getElementById('pill-doctor');
        const pillSpeciality = document.getElementById('pill-speciality');
        const modeDoctorSection = document.getElementById('mode-doctor-section');
        const modeSpecialitySection = document.getElementById('mode-speciality-section');

        // Mode Switcher Pills
        function setMode(mode) {
            if (mode === 'doctor') {
                pillDoctor.className = "finder-pill active-pill flex-1 flex items-center gap-2.5 px-4 sm:px-5 py-3 rounded-full border-2 border-[#27797D] bg-blue-50/70 text-[#27797D] font-semibold text-xs sm:text-sm cursor-pointer transition-all shadow-xs";
                pillDoctor.querySelector('.radio-dot').className = "radio-dot w-4 h-4 rounded-full border-2 border-[#27797D] flex items-center justify-center flex-shrink-0";
                pillDoctor.querySelector('.dot-inner').className = "dot-inner w-2 h-2 rounded-full bg-[#27797D]";

                pillSpeciality.className = "finder-pill flex-1 flex items-center gap-2.5 px-4 sm:px-5 py-3 rounded-full border border-gray-200 bg-white text-gray-700 font-semibold text-xs sm:text-sm cursor-pointer hover:border-gray-300 transition-all";
                pillSpeciality.querySelector('.radio-dot').className = "radio-dot w-4 h-4 rounded-full border-2 border-gray-300 flex items-center justify-center flex-shrink-0";
                pillSpeciality.querySelector('.dot-inner').className = "dot-inner w-2 h-2 rounded-full bg-transparent";

                modeDoctorSection.classList.remove('hidden');
                modeSpecialitySection.classList.add('hidden');
            } else {
                pillSpeciality.className = "finder-pill active-pill flex-1 flex items-center gap-2.5 px-4 sm:px-5 py-3 rounded-full border-2 border-[#27797D] bg-blue-50/70 text-[#27797D] font-semibold text-xs sm:text-sm cursor-pointer transition-all shadow-xs";
                pillSpeciality.querySelector('.radio-dot').className = "radio-dot w-4 h-4 rounded-full border-2 border-[#27797D] flex items-center justify-center flex-shrink-0";
                pillSpeciality.querySelector('.dot-inner').className = "dot-inner w-2 h-2 rounded-full bg-[#27797D]";

                pillDoctor.className = "finder-pill flex-1 flex items-center gap-2.5 px-4 sm:px-5 py-3 rounded-full border border-gray-200 bg-white text-gray-700 font-semibold text-xs sm:text-sm cursor-pointer hover:border-gray-300 transition-all";
                pillDoctor.querySelector('.radio-dot').className = "radio-dot w-4 h-4 rounded-full border-2 border-gray-300 flex items-center justify-center flex-shrink-0";
                pillDoctor.querySelector('.dot-inner').className = "dot-inner w-2 h-2 rounded-full bg-transparent";

                modeSpecialitySection.classList.remove('hidden');
                modeDoctorSection.classList.add('hidden');
            }
        }

        pillDoctor.addEventListener('click', () => setMode('doctor'));
        pillSpeciality.addEventListener('click', () => setMode('speciality'));

        // ==================== MODE A: DOCTOR SEARCH DROPDOWN ====================
        const docInput = document.getElementById('doctor-search-input');
        const docMenu = document.getElementById('doctor-dropdown-menu');

        function renderDoctorMenu(filterText = '') {
            const cleanFilter = filterText.toLowerCase().trim();
            const filtered = allDoctors.filter(d => 
                d.name.toLowerCase().includes(cleanFilter) || 
                d.spec.toLowerCase().includes(cleanFilter)
            );

            if (filtered.length === 0) {
                docMenu.innerHTML = `<div class="px-4 py-3 text-gray-500 text-xs">No doctors found matching "${filterText}".</div>`;
            } else {
                docMenu.innerHTML = filtered.map(d => `
                    <div class="doc-item px-4 py-2.5 hover:bg-blue-50 cursor-pointer flex items-center justify-between text-xs sm:text-sm transition-colors border-b border-gray-50 last:border-0" data-name="${d.name}" data-spec="${d.spec}">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-gray-900">${d.name}</span>
                            <span class="text-gray-400">—</span>
                            <span class="text-gray-500 text-xs">${d.spec}</span>
                        </div>
                    </div>
                `).join('');
            }
        }

        renderDoctorMenu();

        docInput.addEventListener('focus', () => {
            renderDoctorMenu(docInput.value);
            docMenu.classList.remove('hidden');
        });

        docInput.addEventListener('input', () => {
            renderDoctorMenu(docInput.value);
            docMenu.classList.remove('hidden');
        });

        docMenu.addEventListener('click', (e) => {
            const item = e.target.closest('.doc-item');
            if (item) {
                const name = item.getAttribute('data-name');
                const spec = item.getAttribute('data-spec');
                selectDoctorOption(name, spec);
                docMenu.classList.add('hidden');
            }
        });

        // ==================== MODE B: SPECIALITY DROPDOWN ====================
        const specInput = document.getElementById('speciality-search-input');
        const specMenu = document.getElementById('speciality-dropdown-menu');
        const specDoctorContainer = document.getElementById('speciality-doctor-container');
        const specDoctorCount = document.getElementById('spec-doctor-count');
        const specDocInput = document.getElementById('spec-doctor-search-input');
        const specDocMenu = document.getElementById('spec-doctor-dropdown-menu');

        function renderSpecialityMenu(filterText = '') {
            const clean = filterText.toLowerCase().trim();
            const filtered = specialities.filter(s => s.toLowerCase().includes(clean));

            if (filtered.length === 0) {
                specMenu.innerHTML = `<div class="px-4 py-3 text-gray-500 text-xs">No speciality found matching "${filterText}".</div>`;
            } else {
                specMenu.innerHTML = filtered.map(s => `
                    <div class="spec-item px-4 py-2.5 hover:bg-blue-50 cursor-pointer text-xs sm:text-sm text-gray-800 hover:text-[#27797D] transition-colors border-b border-gray-50 last:border-0" data-spec="${s}">
                        <span>${s}</span>
                    </div>
                `).join('');
            }
        }

        renderSpecialityMenu();

        specInput.addEventListener('focus', () => {
            renderSpecialityMenu(specInput.value);
            specMenu.classList.remove('hidden');
        });

        specInput.addEventListener('input', () => {
            renderSpecialityMenu(specInput.value);
            specMenu.classList.remove('hidden');
        });

        specMenu.addEventListener('click', (e) => {
            const item = e.target.closest('.spec-item');
            if (item) {
                const spec = item.getAttribute('data-spec');
                selectedSpeciality = spec;
                specInput.value = spec;
                specMenu.classList.add('hidden');

                // Filter doctors belonging to this speciality
                let docsInSpec = allDoctors.filter(d => d.spec.toLowerCase().includes(spec.toLowerCase()) || spec.toLowerCase().includes(d.spec.toLowerCase()));
                if (docsInSpec.length === 0) {
                    docsInSpec = [
                        { name: "Dr. Kuldeep Singh", spec: spec },
                        { name: "Dr. Rakesh Kumar Watts", spec: spec },
                        { name: "Dr Pankaj Mehta", spec: spec }
                    ];
                }

                specDoctorCount.textContent = docsInSpec.length;
                specDoctorContainer.classList.remove('hidden');
                specDocInput.value = '';

                renderSpecialityDoctorMenu(docsInSpec);
            }
        });

        function renderSpecialityDoctorMenu(doctors, filterText = '') {
            const clean = filterText.toLowerCase().trim();
            const filtered = doctors.filter(d => d.name.toLowerCase().includes(clean));

            if (filtered.length === 0) {
                specDocMenu.innerHTML = `<div class="px-4 py-3 text-gray-500 text-xs">No doctors found.</div>`;
            } else {
                specDocMenu.innerHTML = filtered.map(d => `
                    <div class="spec-doc-item px-4 py-2.5 hover:bg-blue-50 cursor-pointer flex items-center justify-between text-xs sm:text-sm transition-colors border-b border-gray-50 last:border-0" data-name="${d.name}" data-spec="${d.spec}">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-gray-900">${d.name}</span>
                            <span class="text-gray-400">—</span>
                            <span class="text-gray-500 text-xs">${d.spec}</span>
                        </div>
                    </div>
                `).join('');
            }
        }

        specDocInput.addEventListener('focus', () => {
            specDocMenu.classList.remove('hidden');
        });

        specDocInput.addEventListener('input', () => {
            let docsInSpec = allDoctors.filter(d => selectedSpeciality && (d.spec.toLowerCase().includes(selectedSpeciality.toLowerCase()) || selectedSpeciality.toLowerCase().includes(d.spec.toLowerCase())));
            if (docsInSpec.length === 0) {
                docsInSpec = [
                    { name: "Dr. Kuldeep Singh", spec: selectedSpeciality },
                    { name: "Dr. Rakesh Kumar Watts", spec: selectedSpeciality },
                    { name: "Dr Pankaj Mehta", spec: selectedSpeciality }
                ];
            }
            renderSpecialityDoctorMenu(docsInSpec, specDocInput.value);
            specDocMenu.classList.remove('hidden');
        });

        specDocMenu.addEventListener('click', (e) => {
            const item = e.target.closest('.spec-doc-item');
            if (item) {
                const name = item.getAttribute('data-name');
                const spec = item.getAttribute('data-spec');
                selectDoctorOption(name, spec);
                specDocMenu.classList.add('hidden');
            }
        });

        // Common select doctor handler
        const doctorAppointmentCard = document.getElementById('doctor-appointment-card');
        const cardDoctorName = document.getElementById('card-doctor-name');
        const cardDoctorSpec = document.getElementById('card-doctor-spec');
        const totalDocCount = document.getElementById('total-doctors-count');
        const specDocCountEl = document.getElementById('spec-doctor-count');

        function selectDoctorOption(name, spec) {
            selectedDoctor = { name, spec };
            docInput.value = name;
            specDocInput.value = name;

            // Update doctor counts to 1 (as shown in user screenshots)
            if (totalDocCount) totalDocCount.textContent = "1";
            if (specDocCountEl) specDocCountEl.textContent = "1";

            // Update doctor card details
            cardDoctorName.textContent = name;
            cardDoctorSpec.textContent = spec;
            doctorAppointmentCard.classList.remove('hidden');

            // Scroll slightly so the doctor card and date picker are visible
            setTimeout(() => {
                doctorAppointmentCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 50);
        }

        // ==================== DATE SELECTION LOGIC ====================
        const datePills = document.querySelectorAll('.date-pill');
        const customDateInput = document.getElementById('appointment-custom-date');
        let selectedDate = "custom";

        datePills.forEach(pill => {
            pill.addEventListener('click', () => {
                datePills.forEach(p => {
                    p.className = "date-pill flex-shrink-0 px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-xs text-gray-700 hover:border-gray-300 font-medium transition-all";
                });

                pill.className = "date-pill active-date-pill flex-shrink-0 px-3 py-1.5 rounded-lg border-2 border-[#27797D] bg-blue-50/60 text-[#27797D] text-xs font-semibold shadow-xs";

                selectedDate = pill.getAttribute('data-date');
                if (selectedDate === 'custom') {
                    customDateInput.focus();
                } else {
                    // Update custom date picker value
                    const parts = selectedDate.split('-');
                    if (parts.length === 3) {
                        customDateInput.value = `${parts[2]}-${parts[1]}-${parts[0]}`;
                    }
                }
            });
        });

        // Doctor not in list toggle
        const notInListCheckbox = document.getElementById('doctor-not-in-list');
        const customDoctorBox = document.getElementById('custom-doctor-box');
        const customDoctorInput = document.getElementById('custom-doctor-name');

        notInListCheckbox.addEventListener('change', () => {
            if (notInListCheckbox.checked) {
                customDoctorBox.classList.remove('hidden');
                customDoctorInput.focus();
                doctorAppointmentCard.classList.remove('hidden');
                cardDoctorName.textContent = customDoctorInput.value || "Your Preferred Doctor";
                cardDoctorSpec.textContent = selectedSpeciality || "Specialist Consultant";
            } else {
                customDoctorBox.classList.add('hidden');
                if (!selectedDoctor) {
                    doctorAppointmentCard.classList.add('hidden');
                }
            }
        });

        customDoctorInput.addEventListener('input', () => {
            cardDoctorName.textContent = customDoctorInput.value || "Your Preferred Doctor";
        });

        // Close dropdowns on outside click
        document.addEventListener('click', (e) => {
            if (!docInput.contains(e.target) && !docMenu.contains(e.target)) {
                docMenu.classList.add('hidden');
            }
            if (!specInput.contains(e.target) && !specMenu.contains(e.target)) {
                specMenu.classList.add('hidden');
            }
            if (!specDocInput.contains(e.target) && !specDocMenu.contains(e.target)) {
                specDocMenu.classList.add('hidden');
            }
        });

        // ==================== STEP TRANSITION ====================
        const step1Container = document.getElementById('step-1-container');
        const step2Container = document.getElementById('step-2-container');
        const btnGotoStep2 = document.getElementById('btn-goto-step-2');
        const btnBackToStep1 = document.getElementById('btn-back-to-step-1');
        const summaryDoctorName = document.getElementById('summary-doctor-name');
        const summaryDoctorSpec = document.getElementById('summary-doctor-spec');

        btnGotoStep2.addEventListener('click', () => {
            let docName = "";
            let docSpec = "";

            if (notInListCheckbox.checked && customDoctorInput.value.trim() !== '') {
                docName = customDoctorInput.value.trim();
                docSpec = selectedSpeciality || "Specialist Consultant";
            } else if (selectedDoctor) {
                docName = selectedDoctor.name;
                docSpec = selectedDoctor.spec;
            } else if (docInput.value.trim() !== '') {
                docName = docInput.value.trim();
                docSpec = "Specialist Consultant";
            } else if (specDocInput.value.trim() !== '') {
                docName = specDocInput.value.trim();
                docSpec = selectedSpeciality || "Specialist Consultant";
            } else {
                alert("Please select a doctor or check 'Your doctor not in the list?' to continue.");
                return;
            }

            summaryDoctorName.textContent = docName;
            summaryDoctorSpec.textContent = `(${docSpec})`;

            step1Container.classList.add('hidden');
            step2Container.classList.remove('hidden');
            window.scrollTo({ top: 120, behavior: 'smooth' });
        });

        btnBackToStep1.addEventListener('click', () => {
            step2Container.classList.add('hidden');
            step1Container.classList.remove('hidden');
            window.scrollTo({ top: 120, behavior: 'smooth' });
        });

        // ==================== FINAL FORM SUBMISSION ====================
        window.handleAppointmentSubmit = function() {
            const patientName = document.getElementById('patient-name-input').value;
            const docName = summaryDoctorName.textContent;

            document.getElementById('confirmed-doc-name').textContent = docName;
            document.getElementById('confirmed-pat-name').textContent = patientName;

            step2Container.classList.add('hidden');
            document.getElementById('appointment-success-box').classList.remove('hidden');
            window.scrollTo({ top: 100, behavior: 'smooth' });
        };

    });
</script>
@endpush
