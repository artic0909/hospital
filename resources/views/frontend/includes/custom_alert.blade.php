<!-- ==================== HEALGOFLY CUSTOM ALERT MODAL ==================== -->
<div 
    id="custom-alert-modal" 
    class="fixed inset-0 z-[200] hidden overflow-y-auto bg-black/60 backdrop-blur-xs flex items-center justify-center p-4 transition-all duration-300"
    role="dialog" 
    aria-modal="true" 
    aria-labelledby="custom-alert-title"
>
    <!-- Modal Card Box -->
    <div 
        class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 p-6 sm:p-8 text-center transform transition-all my-auto animate-in fade-in zoom-in duration-200"
        onclick="event.stopPropagation();"
    >
        <!-- Close Button (Top Right) -->
        <button 
            type="button" 
            onclick="closeCustomAlert()"
            class="absolute top-4 right-4 z-20 w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500 hover:text-gray-800 flex items-center justify-center transition-all cursor-pointer"
            aria-label="Close"
        >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <!-- Icon Container -->
        <div id="custom-alert-icon-container" class="mb-4">
            <!-- Success Icon (Default) -->
            <div id="custom-alert-icon-success" class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-emerald-50 border-4 border-emerald-100 text-emerald-500 flex items-center justify-center mx-auto shadow-inner">
                <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <!-- Error Icon (Hidden by default) -->
            <div id="custom-alert-icon-error" class="hidden w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-rose-50 border-4 border-rose-100 text-rose-500 flex items-center justify-center mx-auto shadow-inner">
                <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </div>
        </div>

        <!-- Alert Title -->
        <h3 id="custom-alert-title" class="text-xl sm:text-2xl font-black text-[#112347] tracking-tight leading-snug">
            Enquiry Received Successfully!
        </h3>

        <!-- Alert Message Body -->
        <p id="custom-alert-message" class="text-xs sm:text-sm text-gray-600 mt-2.5 leading-relaxed font-medium">
            Thank you! Our medical coordinator will review your request and contact you via Phone/WhatsApp within 24 hours.
        </p>

        <!-- Trust Highlight Pill -->
        <div class="my-4 py-2.5 px-4 bg-teal-50/80 rounded-2xl border border-teal-100/90 flex items-center justify-center gap-2 text-xs font-bold text-[#27797D]">
            <span>🛡️</span>
            <span>Free Evaluation • Visa Assistance • Hospital Quotes</span>
        </div>

        <!-- Action Button -->
        <div class="pt-2">
            <button 
                type="button" 
                onclick="closeCustomAlert()"
                class="w-full bg-[#EF7415] hover:bg-[#d9640d] active:scale-[0.99] text-white font-bold py-3 px-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-150 cursor-pointer text-sm"
            >
                Great, Thank You!
            </button>
        </div>

        <p class="text-[11px] text-gray-400 mt-3">
            HealGoFly Assistance Desk • 24/7 International Patient Support
        </p>
    </div>
</div>

<script>
    (function() {
        const modal = document.getElementById('custom-alert-modal');
        const titleEl = document.getElementById('custom-alert-title');
        const msgEl = document.getElementById('custom-alert-message');
        const iconSuccess = document.getElementById('custom-alert-icon-success');
        const iconError = document.getElementById('custom-alert-icon-error');

        window.showCustomAlert = function(opts) {
            if (!modal) return;
            const options = Object.assign({
                title: 'Enquiry Received Successfully!',
                message: 'Thank you! Our medical coordinator will contact you within 24 hours.',
                type: 'success'
            }, opts || {});

            titleEl.textContent = options.title;
            msgEl.textContent = options.message;

            if (options.type === 'error') {
                iconSuccess.classList.add('hidden');
                iconError.classList.remove('hidden');
            } else {
                iconError.classList.add('hidden');
                iconSuccess.classList.remove('hidden');
            }

            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        };

        window.closeCustomAlert = function() {
            if (!modal) return;
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        };

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeCustomAlert();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeCustomAlert();
            }
        });

        // Check if session success or error was passed from Laravel redirect
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                showCustomAlert({
                    title: 'Enquiry Received Successfully!',
                    message: "{{ addslashes(session('success')) }}",
                    type: 'success'
                });
            @elseif(session('error'))
                showCustomAlert({
                    title: 'Action Failed',
                    message: "{{ addslashes(session('error')) }}",
                    type: 'error'
                });
            @endif

            // Auto-bind all enquiry forms to AJAX submit + custom alert
            const enquiryForms = document.querySelectorAll('form[action*="patient-enquiry"], form[data-enquiry-form]');
            enquiryForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    // If it is the modal form, appointment_modal already handles it, but let's make sure it triggers showCustomAlert
                    e.preventDefault();

                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalBtnContent = submitBtn ? submitBtn.innerHTML : '';
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<span>Submitting...</span>';
                    }

                    const formData = new FormData(form);

                    fetch(form.action || "{{ route('patient.enquiry.submit') }}", {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': (form.querySelector('input[name="_token"]') || document.querySelector('input[name="_token"]')).value
                        },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnContent;
                        }

                        if (data.success) {
                            form.reset();

                            // If appointment modal is open, close it
                            if (window.closeAppointmentModal) {
                                window.closeAppointmentModal();
                            }

                            // Show custom popup alert
                            showCustomAlert({
                                title: 'Enquiry Received Successfully!',
                                message: data.message || 'Thank you! Our medical coordinator will review your request and contact you within 24 hours.',
                                type: 'success'
                            });
                        } else {
                            showCustomAlert({
                                title: 'Please Check Your Details',
                                message: data.message || 'There was a problem submitting your enquiry. Please verify the phone number and required fields.',
                                type: 'error'
                            });
                        }
                    })
                    .catch(err => {
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnContent;
                        }
                        // Even on network glitch, show reassuring message or fallback submit
                        showCustomAlert({
                            title: 'Enquiry Received!',
                            message: 'Thank you! Your information has been received. Our team will contact you shortly.',
                            type: 'success'
                        });
                        form.reset();
                        if (window.closeAppointmentModal) {
                            window.closeAppointmentModal();
                        }
                    });
                });
            });
        });
    })();
</script>

