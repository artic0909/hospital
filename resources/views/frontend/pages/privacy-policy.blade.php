@extends('frontend.layouts.app')

@section('title', 'Privacy Policy & Patient Data Protection - Heal Go Fly')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-100/80 border-b border-gray-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs font-medium text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-800 font-semibold">Privacy Policy</span>
            </nav>
        </div>
    </div>

    <!-- ==================== HERO SECTION ==================== -->
    <div class="bg-gradient-to-b from-teal-50/70 via-white to-gray-50/40 border-b border-gray-200/70 py-12 sm:py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#27797D]/10 text-[#27797D] border border-[#27797D]/20 text-xs font-extrabold tracking-wide">
                    <span>🛡️</span>
                    <span>Confidentiality & Medical Data Security</span>
                </div>

                <h1 class="text-2xl sm:text-4xl font-black text-[#112347] tracking-tight leading-tight">
                    Privacy Policy & Patient Data Protection
                </h1>

                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    At HealGoFly, your health data and medical records are handled with the highest standards of clinical privacy, cryptographic security, and ethical responsibility.
                </p>

                <div class="pt-2 flex flex-wrap items-center gap-4 text-[11px] text-gray-500 font-medium">
                    <span>Effective Date: January 1, 2026</span>
                    <span>&bull;</span>
                    <span>Last Updated: October 30, 2026</span>
                    <span>&bull;</span>
                    <span class="text-emerald-700 font-bold">100% HIPAA & GDPR Principles Aligned</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== POLICY BODY ==================== -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-3xl border border-gray-200/90 shadow-xs p-8 sm:p-12 space-y-10 text-xs sm:text-sm text-gray-700 leading-relaxed">

            <!-- Highlights Box -->
            <div class="bg-teal-50/60 rounded-2xl border border-teal-100 p-6 space-y-3">
                <h3 class="text-sm font-extrabold text-[#112347] flex items-center gap-2">
                    <span>🔒</span>
                    <span>Our Patient Privacy Pledge</span>
                </h3>
                <ul class="space-y-2 text-xs text-gray-700">
                    <li class="flex items-start gap-2">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>We <strong>never sell, rent, or monetize</strong> your medical records or personal identity to third parties or marketing networks.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>Medical reports, scans, and doctor queries are transmitted via <strong>256-bit encrypted SSL/TLS</strong> protocols directly to accredited partner hospitals.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>You retain full ownership of your data with the right to request <strong>complete deletion or retrieval</strong> at any time.</span>
                    </li>
                </ul>
            </div>

            <!-- Section 1 -->
            <div class="space-y-3">
                <h2 class="text-base sm:text-lg font-black text-[#112347] pb-2 border-b border-gray-100 flex items-center gap-2">
                    <span class="text-[#EF7415]">1.</span>
                    <span>Who We Are & Scope of this Policy</span>
                </h2>
                <p>
                    HealGoFly operates as a specialized medical travel facilitator connecting global patients to internationally accredited healthcare institutes (JCI, NABH, and ISO certified). This Privacy Policy governs all information collected via our website (<a href="{{ route('home') }}" class="text-[#27797D] underline font-semibold">healgofly.com</a>), mobile platforms, direct WhatsApp clinical desks, and email communications.
                </p>
            </div>

            <!-- Section 2 -->
            <div class="space-y-3">
                <h2 class="text-base sm:text-lg font-black text-[#112347] pb-2 border-b border-gray-100 flex items-center gap-2">
                    <span class="text-[#EF7415]">2.</span>
                    <span>Information We Collect</span>
                </h2>
                <p>To deliver second opinions, surgeon consultations, transparent cost estimates, and medical visa assistance, we collect:</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200/80 space-y-1.5">
                        <strong class="text-gray-900 block font-bold">A. Personal Identification Data</strong>
                        <p class="text-gray-600 text-xs">Patient full name, email address, phone/WhatsApp number, country of residence, date of birth, and companion details.</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200/80 space-y-1.5">
                        <strong class="text-gray-900 block font-bold">B. Medical & Clinical Reports</strong>
                        <p class="text-gray-600 text-xs">Diagnostic findings, MRI/CT radiology files, pathology reports, current prescriptions, medical history, and clinical symptoms.</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200/80 space-y-1.5">
                        <strong class="text-gray-900 block font-bold">C. Travel & Visa Records</strong>
                        <p class="text-gray-600 text-xs">Passport copy, flight schedules, and visa status solely required to issue official hospital Visa Invitation Letters (VIL).</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200/80 space-y-1.5">
                        <strong class="text-gray-900 block font-bold">D. Technical & Log Details</strong>
                        <p class="text-gray-600 text-xs">Browser type, IP address, and cookie tokens to preserve language preferences and ensure site security.</p>
                    </div>
                </div>
            </div>

            <!-- Section 3 -->
            <div class="space-y-3">
                <h2 class="text-base sm:text-lg font-black text-[#112347] pb-2 border-b border-gray-100 flex items-center gap-2">
                    <span class="text-[#EF7415]">3.</span>
                    <span>How We Use Your Medical Information</span>
                </h2>
                <p>Your data is processed strictly for the purpose of facilitating patient care:</p>
                <ul class="list-disc pl-5 space-y-1 text-gray-600">
                    <li>Evaluating treatment feasibility with verified medical specialists and surgical boards.</li>
                    <li>Providing itemized hospital quotes, room category estimates, and anticipated length of stay.</li>
                    <li>Generating hospital Visa Invitation Letters (VIL) required by government immigration desks.</li>
                    <li>Organizing complimentary airport pickup, language interpreters, and local hospital concierge services.</li>
                    <li>Post-treatment follow-ups with your treating surgical team.</li>
                </ul>
            </div>

            <!-- Section 4 -->
            <div class="space-y-3">
                <h2 class="text-base sm:text-lg font-black text-[#112347] pb-2 border-b border-gray-100 flex items-center gap-2">
                    <span class="text-[#EF7415]">4.</span>
                    <span>Data Sharing & Clinical Confidentiality</span>
                </h2>
                <p>
                    We do not disclose patient records except to the medical teams directly involved in your care:
                </p>
                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 text-xs space-y-2">
                    <p><strong>Accredited Partner Hospitals:</strong> Scans and histories are shared only with hospitals chosen by you for evaluation.</p>
                    <p><strong>Government Border / Visa Authorities:</strong> Passport and hospital VIL copies are shared with official visa portals upon your application.</p>
                    <p><strong>Legal Requirements:</strong> Disclosures made solely where mandated by court subpoena or statutory public health regulations.</p>
                </div>
            </div>

            <!-- Section 5 -->
            <div class="space-y-3">
                <h2 class="text-base sm:text-lg font-black text-[#112347] pb-2 border-b border-gray-100 flex items-center gap-2">
                    <span class="text-[#EF7415]">5.</span>
                    <span>Security Standards & Storage</span>
                </h2>
                <p>
                    HealGoFly uses enterprise-grade safeguards:
                </p>
                <ul class="list-disc pl-5 space-y-1 text-gray-600">
                    <li>All data transfers are protected by <strong>256-bit TLS/SSL encryption</strong>.</li>
                    <li>Access to patient clinical files is restricted on a strict need-to-know basis to certified medical coordinators.</li>
                    <li>Servers are hosted in ISO 27001-certified data centers with automated vulnerability scanning and firewalls.</li>
                </ul>
            </div>

            <!-- Section 6 -->
            <div class="space-y-3">
                <h2 class="text-base sm:text-lg font-black text-[#112347] pb-2 border-b border-gray-100 flex items-center gap-2">
                    <span class="text-[#EF7415]">6.</span>
                    <span>Your Patient Rights</span>
                </h2>
                <p>Under international patient privacy principles (GDPR, HIPAA guidelines), you possess:</p>
                <ul class="list-disc pl-5 space-y-1 text-gray-600">
                    <li><strong>Right to Access:</strong> Request a full copy of all personal and medical files held in our records.</li>
                    <li><strong>Right to Rectification:</strong> Request correction of outdated medical history or contact details.</li>
                    <li><strong>Right to Erasure ("Right to be Forgotten"):</strong> Request complete deletion of your files from our storage databases.</li>
                    <li><strong>Right to Withdraw Consent:</strong> Halt ongoing sharing of medical records with partner hospitals at any time.</li>
                </ul>
            </div>

            <!-- Section 7 -->
            <div class="space-y-3">
                <h2 class="text-base sm:text-lg font-black text-[#112347] pb-2 border-b border-gray-100 flex items-center gap-2">
                    <span class="text-[#EF7415]">7.</span>
                    <span>Contact Our Data Protection Officer (DPO)</span>
                </h2>
                <p>
                    If you have questions regarding your data privacy, wish to exercise your patient rights, or want to withdraw record sharing, contact our Data Protection Officer:
                </p>
                <div class="bg-gray-50 p-5 rounded-2xl border border-gray-200 text-xs space-y-1.5 font-medium">
                    <p><strong class="text-gray-900">Data Protection Officer:</strong> HealGoFly Clinical & Legal Cell</p>
                    <p><strong class="text-gray-900">Email:</strong> <a href="mailto:{{ $settings->email_support ?: 'support@healgofly.com' }}" class="text-[#27797D] underline font-bold">{{ $settings->email_support ?: 'support@healgofly.com' }}</a></p>
                    <p><strong class="text-gray-900">Phone:</strong> <a href="tel:{{ $settings->phone_primary ?: '+919129846542' }}" class="text-[#27797D] underline font-bold">{{ $settings->phone_primary ?: '+91 9129846542' }}</a></p>
                    <p><strong class="text-gray-900">Office:</strong> {{ $settings->address ?: '274, 2nd Floor, Satra Plaza, Vashi, Navi Mumbai, India' }}</p>
                </div>
            </div>

        </div>
    </div>

@endsection

