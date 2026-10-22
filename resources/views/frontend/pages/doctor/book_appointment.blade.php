@extends('frontend.layouts.app')

@section('title', 'Book Appointment with Dr. Y K Mishra | Heal Go Fly')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-50/80 border-b border-gray-200/70">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-3">
            <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium overflow-x-auto whitespace-nowrap">
                <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('doctors') }}" class="hover:text-[#27797D] transition-colors">Doctors</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('doctor.details') }}" class="hover:text-[#27797D] transition-colors">Dr. Y K Mishra</a>
                <span class="text-gray-400">›</span>
                <span class="text-[#112347] font-semibold">Book Appointment</span>
            </nav>
        </div>
    </div>

    <!-- ==================== MAIN APPOINTMENT CONTAINER ==================== -->
    <div class="min-h-screen bg-white sm:bg-gray-50/50 py-6 sm:py-10">
        <div class="max-w-2xl mx-auto px-4 sm:px-6">
            
            <!-- Page Header (Screenshot 4) -->
            <div class="mb-5 sm:mb-6 space-y-1">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-[#112347] tracking-tight">
                    Book Appointment with Dr. Y K Mishra
                </h1>
                <p class="text-xs sm:text-sm text-gray-500">
                    Book appointments with minimum wait-time & verified doctor details
                </p>
                <p class="text-xs text-gray-600 font-medium pt-1">
                    You're booking an appointment with <strong>Dr. Y K Mishra</strong>. Continue to the next step.
                </p>
            </div>

            <!-- Main Appointment Card (Screenshot 4) -->
            <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-5 sm:p-7 space-y-6">
                
                <!-- STEP 1: DATE & TIME SLOT SELECTION -->
                <div id="doctor-step-1" class="space-y-6">
                    
                    <!-- Doctor Profile Header -->
                    <div class="flex items-center gap-3.5 pb-5 border-b border-gray-100">
                        <img 
                            src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=200&q=80" 
                            alt="Dr. Y K Mishra" 
                            class="w-14 h-14 rounded-full object-cover border border-gray-200 shadow-xs flex-shrink-0"
                        >
                        <div class="space-y-0.5">
                            <div class="flex items-center gap-1.5">
                                <h3 class="text-sm sm:text-base font-bold text-[#27797D]">
                                    Dr. Y K Mishra
                                </h3>
                                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full border border-red-500 text-red-500 text-[10px] font-bold">
                                    ✓
                                </span>
                            </div>
                            <p class="text-xs text-gray-500">Cardiac Surgeon</p>
                            <div class="flex items-center gap-1 text-[11px] text-gray-500">
                                <svg class="w-3 h-3 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                <span>New Delhi, India</span>
                            </div>
                        </div>
                    </div>

                    <!-- Select Appointment Date -->
                    <div class="space-y-3">
                        <label class="block text-xs sm:text-sm font-bold text-gray-900">
                            Select Appointment Date
                        </label>

                        <!-- Date Pills Row -->
                        <div class="flex items-center gap-2 overflow-x-auto pb-1.5 scrollbar-none" id="doctor-date-pills">
                            <button type="button" class="doc-date-pill active-pill px-3.5 py-2 rounded-xl border-2 border-[#27797D] bg-blue-50/70 text-[#27797D] font-semibold text-xs flex-shrink-0 transition-all shadow-xs" data-date="Fri, 16-Oct">
                                Fri, 16-Oct
                            </button>
                            <button type="button" class="doc-date-pill px-3.5 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs flex-shrink-0 hover:border-gray-300 transition-all" data-date="Sat, 17-Oct">
                                Sat, 17-Oct
                            </button>
                            <button type="button" class="doc-date-pill px-3.5 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs flex-shrink-0 hover:border-gray-300 transition-all" data-date="Mon, 19-Oct">
                                Mon, 19-Oct
                            </button>
                            <button type="button" class="doc-date-pill px-3.5 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs flex-shrink-0 hover:border-gray-300 transition-all" data-date="Tue, 20-Oct">
                                Tue, 20-Oct
                            </button>
                            <button type="button" class="doc-date-pill px-3.5 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs flex-shrink-0 hover:border-gray-300 transition-all" data-date="Wed, 21-Oct">
                                Wed, 21-Oct
                            </button>
                            <button type="button" class="doc-date-pill px-3.5 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs flex-shrink-0 hover:border-gray-300 transition-all" data-date="Thu, 22-Oct">
                                Thu, 22-Oct
                            </button>
                        </div>
                    </div>

                    <!-- Preferred Time Slots (Screenshot 4) -->
                    <div class="space-y-4 pt-1">
                        <div class="flex items-center gap-1.5 text-xs sm:text-sm font-bold text-gray-900">
                            <span>Preferred Time Slots</span>
                            <span class="text-gray-400 text-xs font-normal" title="Slots indicate preferred arrival window">ⓘ</span>
                        </div>

                        <!-- MORNING SLOTS -->
                        <div class="space-y-2">
                            <span class="block text-[11px] font-extrabold uppercase tracking-wider text-gray-400">
                                Morning
                            </span>
                            <div class="flex flex-wrap items-center gap-2.5">
                                <button type="button" class="time-slot-pill active-slot px-4 py-2 rounded-xl border-2 border-[#27797D] bg-blue-50/70 text-[#27797D] font-semibold text-xs transition-all shadow-xs" data-time="10:00 AM">
                                    10:00 AM
                                </button>
                                <button type="button" class="time-slot-pill px-4 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs hover:border-gray-300 transition-all" data-time="10:30 AM">
                                    10:30 AM
                                </button>
                                <button type="button" class="time-slot-pill px-4 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs hover:border-gray-300 transition-all" data-time="11:00 AM">
                                    11:00 AM
                                </button>
                            </div>
                        </div>

                        <!-- AFTERNOON SLOTS -->
                        <div class="space-y-2 pt-1">
                            <span class="block text-[11px] font-extrabold uppercase tracking-wider text-gray-400">
                                Afternoon
                            </span>
                            <div class="flex flex-wrap items-center gap-2.5">
                                <button type="button" class="time-slot-pill px-4 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs hover:border-gray-300 transition-all" data-time="02:00 PM">
                                    02:00 PM
                                </button>
                                <button type="button" class="time-slot-pill px-4 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs hover:border-gray-300 transition-all" data-time="02:30 PM">
                                    02:30 PM
                                </button>
                                <button type="button" class="time-slot-pill px-4 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs hover:border-gray-300 transition-all" data-time="03:00 PM">
                                    03:00 PM
                                </button>
                                <button type="button" class="time-slot-pill px-4 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs hover:border-gray-300 transition-all" data-time="03:30 PM">
                                    03:30 PM
                                </button>
                                <button type="button" class="time-slot-pill px-4 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs hover:border-gray-300 transition-all" data-time="04:00 PM">
                                    04:00 PM
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- Next Button -->
                    <div class="pt-4 border-t border-gray-100">
                        <button 
                            type="button" 
                            id="btn-doc-next" 
                            class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-sm sm:text-base font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-150 transform hover:-translate-y-0.5 text-center"
                        >
                            Next →
                        </button>
                    </div>

                </div>

                <!-- STEP 2: PATIENT DETAILS -->
                <div id="doctor-step-2" class="hidden space-y-6">
                    
                    <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                        <button type="button" id="btn-doc-back" class="text-xs sm:text-sm text-[#27797D] hover:underline font-bold flex items-center gap-1.5">
                            <span>←</span>
                            <span>Change Date & Slot</span>
                        </button>
                        <span class="text-xs font-semibold text-gray-500">Step 2 of 2</span>
                    </div>

                    <!-- Selected Schedule Summary -->
                    <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center justify-between text-xs sm:text-sm">
                        <div class="flex items-center gap-2.5">
                            <span class="text-lg">🗓️</span>
                            <div>
                                <span class="font-bold text-[#112347]" id="summary-doc-schedule">Fri, 16-Oct at 10:00 AM</span>
                                <span class="text-gray-500 block text-xs">with Dr. Y K Mishra (Manipal Hospitals Dwarka)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Patient Form -->
                    <form id="doc-patient-form" onsubmit="event.preventDefault(); handleDoctorAppointmentSubmit();" class="space-y-4">
                        
                        <!-- Patient Name -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Patient Full Name <span class="text-red-500">*</span></label>
                            <input type="text" id="doc-pat-name" required placeholder="Enter patient name" class="w-full text-xs sm:text-sm text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                            <div class="flex gap-2">
                                <select class="w-24 bg-gray-50 text-xs font-bold text-gray-700 px-2 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D]">
                                    <option value="+91" selected>🇮🇳 +91</option>
                                    <option value="+880">🇧🇩 +880</option>
                                    <option value="+971">🇦🇪 +971</option>
                                    <option value="+966">🇸🇦 +966</option>
                                    <option value="+234">🇳🇬 +234</option>
                                    <option value="+254">🇰🇪 +254</option>
                                    <option value="+44">🇬🇧 +44</option>
                                    <option value="+1">🇺🇸 +1</option>
                                </select>
                                <input type="tel" id="doc-pat-phone" required placeholder="Phone number" class="flex-1 text-xs sm:text-sm text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100">
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Email Address <span class="text-gray-400 text-[11px]">(Optional)</span></label>
                            <input type="email" placeholder="patient@example.com" class="w-full text-xs sm:text-sm text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100">
                        </div>

                        <!-- Concern -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Describe Medical Concern</label>
                            <textarea rows="3" placeholder="Briefly describe heart symptoms, bypass inquiries or consultation notes..." class="w-full text-xs sm:text-sm text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-blue-100"></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="pt-2">
                            <button 
                                type="submit" 
                                class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-sm sm:text-base font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-150 transform hover:-translate-y-0.5 text-center"
                            >
                                Confirm Consultation with Dr. Y K Mishra
                            </button>
                        </div>

                    </form>

                </div>

                <!-- STEP 3: CONFIRMATION SUCCESS -->
                <div id="doctor-step-success" class="hidden text-center py-8 space-y-4">
                    <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto text-3xl font-bold">
                        ✓
                    </div>
                    <div class="space-y-1">
                        <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347]">
                            Appointment Confirmed!
                        </h2>
                        <p class="text-xs sm:text-sm text-gray-600 max-w-md mx-auto">
                            Your consultation request with <strong class="text-gray-900">Dr. Y K Mishra</strong> at Manipal Hospitals Dwarka has been successfully registered.
                        </p>
                    </div>

                    <div class="bg-gray-50 border border-gray-200/80 rounded-xl p-4 max-w-sm mx-auto text-xs text-left space-y-1.5">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Doctor:</span>
                            <span class="font-bold text-gray-900">Dr. Y K Mishra</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Patient:</span>
                            <span class="font-bold text-gray-900" id="conf-doc-pat">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Date & Slot:</span>
                            <span class="font-bold text-gray-900" id="conf-doc-slot">-</span>
                        </div>
                    </div>

                    <div class="pt-3 flex flex-col sm:flex-row items-center justify-center gap-3">
                        <a href="{{ route('doctor.details') }}" class="w-full sm:w-auto bg-[#27797D] hover:bg-[#15364e] text-white text-xs sm:text-sm font-bold py-2.5 px-6 rounded-lg transition-all">
                            Back to Doctor Profile
                        </a>
                        <button type="button" onclick="location.reload()" class="w-full sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs sm:text-sm font-semibold py-2.5 px-5 rounded-lg transition-all">
                            Book Another Slot
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
        let chosenDate = "Fri, 16-Oct";
        let chosenTime = "10:00 AM";

        // Date pill toggling
        const datePills = document.querySelectorAll('.doc-date-pill');
        datePills.forEach(pill => {
            pill.addEventListener('click', () => {
                datePills.forEach(p => {
                    p.className = "doc-date-pill px-3.5 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs flex-shrink-0 hover:border-gray-300 transition-all";
                });
                pill.className = "doc-date-pill active-pill px-3.5 py-2 rounded-xl border-2 border-[#27797D] bg-blue-50/70 text-[#27797D] font-semibold text-xs flex-shrink-0 transition-all shadow-xs";
                chosenDate = pill.getAttribute('data-date');
            });
        });

        // Time slot toggling
        const timePills = document.querySelectorAll('.time-slot-pill');
        timePills.forEach(pill => {
            pill.addEventListener('click', () => {
                timePills.forEach(p => {
                    p.className = "time-slot-pill px-4 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium text-xs hover:border-gray-300 transition-all";
                });
                pill.className = "time-slot-pill active-slot px-4 py-2 rounded-xl border-2 border-[#27797D] bg-blue-50/70 text-[#27797D] font-semibold text-xs transition-all shadow-xs";
                chosenTime = pill.getAttribute('data-time');
            });
        });

        // Step navigation
        const step1 = document.getElementById('doctor-step-1');
        const step2 = document.getElementById('doctor-step-2');
        const stepSuccess = document.getElementById('doctor-step-success');
        const btnNext = document.getElementById('btn-doc-next');
        const btnBack = document.getElementById('btn-doc-back');
        const summarySchedule = document.getElementById('summary-doc-schedule');

        btnNext.addEventListener('click', () => {
            summarySchedule.textContent = `${chosenDate} at ${chosenTime}`;
            step1.classList.add('hidden');
            step2.classList.remove('hidden');
            window.scrollTo({ top: 120, behavior: 'smooth' });
        });

        btnBack.addEventListener('click', () => {
            step2.classList.add('hidden');
            step1.classList.remove('hidden');
            window.scrollTo({ top: 120, behavior: 'smooth' });
        });

        window.handleDoctorAppointmentSubmit = function() {
            const patName = document.getElementById('doc-pat-name').value;
            document.getElementById('conf-doc-pat').textContent = patName;
            document.getElementById('conf-doc-slot').textContent = `${chosenDate} at ${chosenTime}`;

            step2.classList.add('hidden');
            stepSuccess.classList.remove('hidden');
            window.scrollTo({ top: 100, behavior: 'smooth' });
        };
    });
</script>
@endpush
