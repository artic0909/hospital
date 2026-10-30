<!-- ==================== GLOBAL BOOK APPOINTMENT MODAL ==================== -->
@php
    $modalCountries = \App\Models\Country::orderBy('name')->get();
@endphp

<div 
    id="appointment-modal" 
    class="fixed inset-0 z-[100] hidden overflow-y-auto bg-black/60 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4 md:p-6 transition-all duration-300"
    role="dialog" 
    aria-modal="true" 
    aria-labelledby="modal-title"
>
    <!-- Modal Card Box -->
    <div 
        class="relative w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 transform transition-all flex flex-col md:flex-row my-auto"
        onclick="event.stopPropagation();"
    >
        <!-- Close Button (Top Right) -->
        <button 
            type="button" 
            id="modal-close-btn" 
            class="absolute top-4 right-4 z-20 w-9 h-9 rounded-full bg-black/10 hover:bg-black/20 text-gray-700 flex items-center justify-center transition-all cursor-pointer"
            aria-label="Close modal"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <!-- ==================== LEFT COLUMN: IMAGE & INSPIRING VALUE PROPOSITION ==================== -->
        <div class="md:w-5/12 relative text-white p-6 sm:p-8 flex flex-col justify-between overflow-hidden min-h-[280px] md:min-h-[560px]">
            <!-- Background Image with Medical Blue Gradient Overlay -->
            <div class="absolute inset-0 z-0">
                <img 
                    src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=1000&q=80" 
                    alt="Doctor caring for patient" 
                    class="w-full h-full object-cover object-center"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-[#112347] via-[#1D4B6C]/90 to-[#27797D]/80 mix-blend-multiply"></div>
            </div>

            <!-- Top Header in Left Column -->
            <div class="relative z-10 space-y-3">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/15 backdrop-blur-md text-[11px] font-bold text-teal-200 border border-white/20 uppercase tracking-wider">
                    <span>🛡️</span>
                    <span>HealGoFly Assistance</span>
                </div>

                <h2 class="text-2xl sm:text-3xl font-black tracking-tight leading-tight text-white drop-shadow-sm">
                    We Handle the <br class="hidden sm:inline">Planning, <br>
                    <span class="text-teal-300">You Focus on Recovery</span>
                </h2>

                <p class="text-xs sm:text-sm text-blue-100/90 leading-relaxed drop-shadow-xs">
                    From Medical Visa assistance to airport pick-up and local stay, HealGoFly manages your entire medical trip.
                </p>
            </div>

            <!-- Bottom Key Feature Highlights -->
            <div class="relative z-10 space-y-2.5 pt-6 border-t border-white/15 text-xs text-blue-100">
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 rounded-full bg-emerald-400 text-gray-900 flex items-center justify-center text-[10px] font-black shrink-0">✓</span>
                    <span>Free Evaluation & Accurate Cost Quotes</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 rounded-full bg-emerald-400 text-gray-900 flex items-center justify-center text-[10px] font-black shrink-0">✓</span>
                    <span>Priority OPD & Surgery Scheduling</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 rounded-full bg-emerald-400 text-gray-900 flex items-center justify-center text-[10px] font-black shrink-0">✓</span>
                    <span>Fast-Track Medical Visa Invitation Letter (VIL)</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 rounded-full bg-emerald-400 text-gray-900 flex items-center justify-center text-[10px] font-black shrink-0">✓</span>
                    <span>Airport Transfer & Dedicated Personal Care</span>
                </div>
            </div>
        </div>

        <!-- ==================== RIGHT COLUMN: CONSULTATION ENQUIRY FORM ==================== -->
        <div class="md:w-7/12 bg-[#005596] p-6 sm:p-8 text-white flex flex-col justify-between">
            
            <!-- Header -->
            <div class="mb-4">
                <div class="flex items-center gap-2">
                    <div class="w-5 h-5 flex-shrink-0 text-white">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                    </div>
                    <h3 id="modal-title" class="text-xl sm:text-[22px] font-bold text-white tracking-tight">
                        Let Us Help You
                    </h3>
                </div>
                <p class="text-xs text-blue-100 mt-1">
                    Fill in your details and our medical experts will contact you within 24 hours.
                </p>

                <!-- Context Target Badge (Dynamically populated by JS if opened for specific doctor or hospital) -->
                <div id="modal-context-badge" class="hidden mt-2.5 p-2 rounded-xl bg-white/10 border border-white/20 text-xs flex items-center gap-2">
                    <span id="modal-context-icon">🏥</span>
                    <div class="min-w-0">
                        <span class="text-[10px] text-blue-200 uppercase font-bold tracking-wider block">Consulting For:</span>
                        <strong id="modal-context-text" class="text-white text-xs font-bold truncate block"></strong>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form id="global-appointment-form" action="{{ route('patient.enquiry.submit') }}" method="POST" class="space-y-3">
                @csrf
                
                <!-- Hidden associations -->
                <input type="hidden" name="hospital_id" id="modal_hospital_id" value="">
                <input type="hidden" name="doctor_id" id="modal_doctor_id" value="">
                <input type="hidden" name="source_page" id="modal_source_page" value="">

                <!-- 1. Patient Name -->
                <div>
                    <input 
                        type="text" 
                        name="patient_name" 
                        placeholder="Patient Name" 
                        required 
                        class="w-full bg-white text-gray-900 placeholder-gray-400 text-sm rounded-lg px-3.5 py-2.5 sm:py-3 border border-transparent focus:ring-2 focus:ring-[#EF7415] focus:outline-none transition-all shadow-inner"
                    >
                </div>

                <!-- 2. Dynamic Country Dropdown -->
                <div class="relative">
                    <select 
                        name="country" 
                        class="w-full bg-white text-gray-900 text-sm rounded-lg px-3.5 py-2.5 sm:py-3 border border-transparent focus:ring-2 focus:ring-[#EF7415] focus:outline-none transition-all shadow-inner appearance-none cursor-pointer pr-10 font-medium"
                    >
                        <option value="India" selected>India</option>
                        @foreach($modalCountries as $c)
                            @if($c->name !== 'India')
                                <option value="{{ $c->name }}">{{ $c->name }}</option>
                            @endif
                        @endforeach
                        <option value="United States">United States</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Oman">Oman</option>
                        <option value="Other">Other Country</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>

                <!-- 3. City -->
                <div>
                    <input 
                        type="text" 
                        name="city" 
                        placeholder="Select City" 
                        class="w-full bg-white text-gray-900 placeholder-gray-400 text-sm rounded-lg px-3.5 py-2.5 sm:py-3 border border-transparent focus:ring-2 focus:ring-[#EF7415] focus:outline-none transition-all shadow-inner"
                    >
                </div>

                <!-- 4. Phone with Country Code Dropdown -->
                <div class="flex rounded-lg overflow-hidden bg-white shadow-inner focus-within:ring-2 focus-within:ring-[#EF7415] border border-transparent transition-all notranslate" dir="ltr">
                    <div class="relative bg-gray-100/90 border-r border-gray-200 select-none flex items-center shrink-0">
                        <select 
                            name="country_code" 
                            class="bg-transparent text-gray-800 text-xs sm:text-sm font-bold pl-2.5 pr-6 py-2.5 sm:py-3 focus:outline-none appearance-none cursor-pointer max-w-[115px]"
                        >
                            @include('frontend.includes.country_code_options')
                        </select>
                        <div class="pointer-events-none absolute right-1.5 inset-y-0 flex items-center text-gray-500">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </div>
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
                        class="w-full bg-white text-gray-900 placeholder-gray-400 text-sm rounded-lg px-3.5 py-2.5 sm:py-3 border border-transparent focus:ring-2 focus:ring-[#EF7415] focus:outline-none transition-all shadow-inner"
                    >
                </div>

                <!-- 6. Date of Birth Picker -->
                <div class="relative flex items-center bg-white rounded-lg shadow-inner border border-transparent focus-within:ring-2 focus-within:ring-[#EF7415] transition-all">
                    <label for="modal_dob" class="pl-3.5 pr-2 py-2.5 sm:py-3 text-xs sm:text-sm font-semibold text-gray-500 flex items-center gap-1.5 shrink-0 select-none cursor-pointer">
                        <svg class="w-4 h-4 text-[#27797D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>DOB:</span>
                    </label>
                    <input 
                        type="date" 
                        id="modal_dob"
                        name="dob" 
                        max="{{ date('Y-m-d') }}"
                        class="w-full bg-transparent text-gray-900 text-xs sm:text-sm pr-3 py-2.5 sm:py-3 focus:outline-none cursor-pointer font-medium"
                    >
                </div>

                <!-- 7. Submit Button -->
                <div class="pt-1">
                    <button 
                        type="submit" 
                        id="modal-submit-btn"
                        class="w-full bg-[#EF7415] hover:bg-[#d9640d] active:scale-[0.99] text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 flex items-center justify-center gap-2 text-base cursor-pointer"
                    >
                        <span>Continue</span>
                        <span class="text-lg leading-none">&rarr;</span>
                    </button>
                </div>

                <!-- Feedback Toast inside Modal -->
                <div id="modal-feedback-msg" class="hidden p-3 rounded-lg text-xs font-bold text-center"></div>
            </form>

            <!-- Disclaimer -->
            <p class="text-[11px] text-blue-100/80 text-center mt-3 leading-snug">
                By submitting I agree to the <a href="{{ route('privacy') }}" class="underline hover:text-white font-medium">Terms of Use</a> and <a href="{{ route('privacy') }}" class="underline hover:text-white font-medium">Privacy Policy</a> of Heal Go Fly.
            </p>

        </div>

    </div>
</div>

<!-- Modal Controller Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('appointment-modal');
        const closeBtn = document.getElementById('modal-close-btn');
        const form = document.getElementById('global-appointment-form');
        const hospitalIdInput = document.getElementById('modal_hospital_id');
        const doctorIdInput = document.getElementById('modal_doctor_id');
        const sourcePageInput = document.getElementById('modal_source_page');
        const contextBadge = document.getElementById('modal-context-badge');
        const contextIcon = document.getElementById('modal-context-icon');
        const contextText = document.getElementById('modal-context-text');
        const submitBtn = document.getElementById('modal-submit-btn');
        const feedbackMsg = document.getElementById('modal-feedback-msg');

        if (!modal) return;

        // Open Modal Function
        window.openAppointmentModal = function (opts = {}) {
            // Set hidden fields
            hospitalIdInput.value = opts.hospitalId || '';
            doctorIdInput.value = opts.doctorId || '';
            sourcePageInput.value = opts.sourcePage || window.location.href;

            // Context Badge
            if (opts.doctorName) {
                contextIcon.textContent = '👨‍⚕️';
                contextText.textContent = 'Dr. ' + opts.doctorName + (opts.hospitalName ? ' (' + opts.hospitalName + ')' : '');
                contextBadge.classList.remove('hidden');
            } else if (opts.hospitalName) {
                contextIcon.textContent = '🏥';
                contextText.textContent = opts.hospitalName;
                contextBadge.classList.remove('hidden');
            } else {
                contextBadge.classList.add('hidden');
            }

            // Reset form alerts
            if (feedbackMsg) {
                feedbackMsg.classList.add('hidden');
                feedbackMsg.textContent = '';
            }

            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        };

        // Close Modal Function
        window.closeAppointmentModal = function () {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        };

        // Event listeners to close
        closeBtn.addEventListener('click', closeAppointmentModal);
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                closeAppointmentModal();
            }
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeAppointmentModal();
            }
        });

        // Global delegate: Any link or button with data-book-appointment or .open-appointment-modal
        document.addEventListener('click', function (e) {
            const trigger = e.target.closest('[data-book-appointment], .open-appointment-modal, a[href*="book-appointment"], a[href*="doctor-appointment"]');
            if (trigger) {
                e.preventDefault();
                openAppointmentModal({
                    hospitalId: trigger.getAttribute('data-hospital-id') || '',
                    hospitalName: trigger.getAttribute('data-hospital-name') || '',
                    doctorId: trigger.getAttribute('data-doctor-id') || '',
                    doctorName: trigger.getAttribute('data-doctor-name') || '',
                    sourcePage: trigger.getAttribute('data-source') || window.location.pathname,
                });
            }
        });

        // AJAX Form Submission
        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const originalBtnHtml = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>Submitting...</span>';

                const formData = new FormData(form);

                fetch("{{ route('patient.enquiry.submit') }}", {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnHtml;

                    if (data.success) {
                        form.reset();
                        closeAppointmentModal();
                        if (window.showCustomAlert) {
                            window.showCustomAlert({
                                title: 'Enquiry Received Successfully!',
                                message: data.message || 'Thank you! Our medical coordinator will contact you within 24 hours.',
                                type: 'success'
                            });
                        }
                    } else {
                        if (window.showCustomAlert) {
                            window.showCustomAlert({
                                title: 'Please Check Your Details',
                                message: data.message || 'Please check your inputs and try again.',
                                type: 'error'
                            });
                        }
                    }
                })
                .catch(err => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnHtml;
                    closeAppointmentModal();
                    if (window.showCustomAlert) {
                        window.showCustomAlert({
                            title: 'Enquiry Received!',
                            message: 'Thank you! Our medical team will contact you shortly.',
                            type: 'success'
                        });
                    }
                });
            });
        }
    });
</script>

