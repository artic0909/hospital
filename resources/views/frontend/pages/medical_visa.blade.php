@extends('frontend.layouts.app')

@section('title', 'Medical Visa Assistance & Step-by-Step Application Guide | Heal Go Fly')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-50/80 border-b border-gray-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium">
                <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-400">›</span>
                <span class="text-[#112347] font-semibold">Medical Visa Guidelines</span>
            </nav>
        </div>
    </div>

    <!-- ==================== HERO SECTION ==================== -->
    <div class="bg-gradient-to-b from-[#1D4B6C] to-[#27797D] text-white py-10 sm:py-14 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl space-y-4">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-xs px-3.5 py-1.5 rounded-full border border-white/20 text-xs font-bold text-amber-300">
                    <span>🛂 Official Medical Travel Assistance</span>
                </div>
                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight">
                    Medical Visa Guidance & Fast-Track Invitation Assistance
                </h1>
                <p class="text-xs sm:text-sm text-blue-100 leading-relaxed max-w-2xl">
                    Everything international patients need to know about getting a Medical Visa (and Medical Attendant Visa) for treatment in India, UAE, Turkey, and Thailand. Get your verified hospital invitation letter within 24 to 48 hours.
                </p>

                <div class="pt-2 flex flex-wrap gap-3">
                    <a href="#visa-application-form" class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-5 py-3 rounded-xl shadow-lg transition-all">
                        <span>Request Hospital Visa Letter</span>
                        <span>&rarr;</span>
                    </a>
                    <a href="https://wa.me/{{ $siteSettings->clean_whatsapp }}?text={{ urlencode('Hello HealGoFly, I need urgent Medical Visa invitation assistance for patient treatment.') }}" target="_blank" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs sm:text-sm font-bold px-5 py-3 rounded-xl shadow-lg transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>Instant WhatsApp Help</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== MAIN CONTENT SECTION ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left 8 Columns: Comprehensive Guide -->
            <div class="lg:col-span-8 space-y-10">
                
                <!-- 1. What is a Medical Visa? -->
                <div class="bg-white rounded-3xl border border-gray-200/90 shadow-xs p-6 sm:p-8 space-y-4">
                    <div class="flex items-center gap-3 pb-3 border-b border-gray-100">
                        <div class="w-10 h-10 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center font-bold text-lg">
                            🏥
                        </div>
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-[#112347] tracking-tight">
                                What is a Medical Visa (MED Visa)?
                            </h2>
                            <p class="text-xs text-gray-500">Understanding entry categories for medical travel</p>
                        </div>
                    </div>

                    <div class="space-y-3.5 text-xs sm:text-sm text-gray-700 leading-relaxed">
                        <p>
                            A <strong>Medical Visa (MED Visa / e-Medical Visa)</strong> is a specialized short-to-medium term visa granted to international citizens seeking specialized medical care, surgical operations, or clinical consultations in accredited hospitals abroad (such as in India, Turkey, Thailand, or UAE).
                        </p>
                        <p>
                            Unlike a tourist visa, a Medical Visa grants <strong>Triple Entry</strong> privileges, higher priority processing, and allows up to <strong>two Medical Attendants (MED X Visas)</strong> to accompany the patient during treatment and recovery.
                        </p>

                        <!-- Highlights Box -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                            <div class="bg-blue-50/60 border border-blue-100 p-3.5 rounded-2xl">
                                <span class="text-xs font-bold text-[#27797D] block mb-0.5">Triple Entry Privilege</span>
                                <span class="text-[11px] text-gray-600">Allows multiple entries for follow-ups and secondary clinical sessions.</span>
                            </div>
                            <div class="bg-emerald-50/60 border border-emerald-100 p-3.5 rounded-2xl">
                                <span class="text-xs font-bold text-emerald-800 block mb-0.5">Attendant Allowance</span>
                                <span class="text-[11px] text-gray-600">Up to 2 family members can obtain Medical Attendant (MED-X) Visas.</span>
                            </div>
                            <div class="bg-orange-50/60 border border-orange-100 p-3.5 rounded-2xl">
                                <span class="text-xs font-bold text-[#EF7415] block mb-0.5">Fast-Track e-Visa</span>
                                <span class="text-[11px] text-gray-600">Issued online within 72 hours for eligible nationalities.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Step-by-Step Medical Visa Process -->
                <div class="bg-white rounded-3xl border border-gray-200/90 shadow-xs p-6 sm:p-8 space-y-6">
                    <div class="pb-3 border-b border-gray-100">
                        <h2 class="text-xl sm:text-2xl font-black text-[#112347] tracking-tight">
                            Step-by-Step: How to Obtain Your Medical Visa
                        </h2>
                        <p class="text-xs text-gray-500 mt-0.5">Follow this simple roadmap from consultation to arrival</p>
                    </div>

                    <div class="space-y-6">
                        
                        <!-- Step 1 -->
                        <div class="flex items-start gap-4">
                            <div class="w-9 h-9 rounded-2xl bg-[#27797D] text-white flex items-center justify-center font-black text-sm shrink-0 shadow-sm">
                                1
                            </div>
                            <div class="space-y-1 flex-1">
                                <h3 class="text-sm sm:text-base font-bold text-[#112347]">
                                    Share Medical Reports & Preliminary Review
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                    Send your recent medical records, scans, and physician diagnoses to HealGoFly. Our medical board consults super-specialist doctors at partner hospitals to establish a comprehensive treatment proposal and cost quote.
                                </p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex items-start gap-4">
                            <div class="w-9 h-9 rounded-2xl bg-[#27797D] text-white flex items-center justify-center font-black text-sm shrink-0 shadow-sm">
                                2
                            </div>
                            <div class="space-y-1 flex-1">
                                <h3 class="text-sm sm:text-base font-bold text-[#112347]">
                                    Receive Official Hospital Visa Invitation Letter (VIL)
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                    The selected accredited hospital issues an official, stamped <strong>Visa Invitation Letter (VIL)</strong> on hospital letterhead. This letter names the patient, attendant(s), passport numbers, expected treatment duration, and doctor in charge. HealGoFly facilitates this within 24–48 hours.
                                </p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="flex items-start gap-4">
                            <div class="w-9 h-9 rounded-2xl bg-[#27797D] text-white flex items-center justify-center font-black text-sm shrink-0 shadow-sm">
                                3
                            </div>
                            <div class="space-y-1 flex-1">
                                <h3 class="text-sm sm:text-base font-bold text-[#112347]">
                                    Submit Online e-Visa Application / Embassy Submission
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                    Complete the official government portal form (or submit via the local embassy/consulate). Upload your passport copy, recent photograph, and the official hospital invitation letter.
                                </p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="flex items-start gap-4">
                            <div class="w-9 h-9 rounded-2xl bg-[#27797D] text-white flex items-center justify-center font-black text-sm shrink-0 shadow-sm">
                                4
                            </div>
                            <div class="space-y-1 flex-1">
                                <h3 class="text-sm sm:text-base font-bold text-[#112347]">
                                    Receive Electronic Travel Authorization (ETA) & Fly
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                    Once approved (usually 3 to 4 business days), your Electronic Travel Authorization (ETA) is emailed to you. Print your approval, book flights, and inform HealGoFly for airport ambulance or cab pickup.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- 3. Key Documents Required -->
                <div class="bg-white rounded-3xl border border-gray-200/90 shadow-xs p-6 sm:p-8 space-y-4">
                    <h2 class="text-xl sm:text-2xl font-black text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        Checklist of Required Documents
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 text-xs sm:text-sm text-gray-700">
                        <div class="flex items-start gap-2.5 bg-gray-50/70 p-3 rounded-2xl border border-gray-200/60">
                            <span class="text-emerald-500 font-bold text-base">✓</span>
                            <span><strong>Original Passport:</strong> Minimum 6 months validity with at least two blank visa pages.</span>
                        </div>
                        <div class="flex items-start gap-2.5 bg-gray-50/70 p-3 rounded-2xl border border-gray-200/60">
                            <span class="text-emerald-500 font-bold text-base">✓</span>
                            <span><strong>Hospital Invitation Letter:</strong> Official stamped invitation from our accredited partner hospital.</span>
                        </div>
                        <div class="flex items-start gap-2.5 bg-gray-50/70 p-3 rounded-2xl border border-gray-200/60">
                            <span class="text-emerald-500 font-bold text-base">✓</span>
                            <span><strong>Local Medical Records:</strong> Diagnostic tests, doctor referral letters, and lab investigation reports.</span>
                        </div>
                        <div class="flex items-start gap-2.5 bg-gray-50/70 p-3 rounded-2xl border border-gray-200/60">
                            <span class="text-emerald-500 font-bold text-base">✓</span>
                            <span><strong>Passport Size Photographs:</strong> Recent color photos with white background (2 x 2 inches).</span>
                        </div>
                        <div class="flex items-start gap-2.5 bg-gray-50/70 p-3 rounded-2xl border border-gray-200/60">
                            <span class="text-emerald-500 font-bold text-base">✓</span>
                            <span><strong>Proof of Financial Solvency:</strong> Bank statement or medical insurance guarantee.</span>
                        </div>
                        <div class="flex items-start gap-2.5 bg-gray-50/70 p-3 rounded-2xl border border-gray-200/60">
                            <span class="text-emerald-500 font-bold text-base">✓</span>
                            <span><strong>Attendant Relationship Proof:</strong> Birth / marriage certificate demonstrating familial relationship.</span>
                        </div>
                    </div>
                </div>

                <!-- 4. Official Government Portals & Visa Links -->
                <div class="bg-white rounded-3xl border border-gray-200/90 shadow-xs p-6 sm:p-8 space-y-5">
                    <div>
                        <h2 class="text-xl sm:text-2xl font-black text-[#112347] tracking-tight">
                            Official Government Visa Portals
                        </h2>
                        <p class="text-xs text-gray-500 mt-0.5">Direct portals authorized to process official Medical e-Visas</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                        
                        <!-- India Official e-Visa Portal -->
                        <div class="border border-gray-200 rounded-2xl p-4 space-y-2.5 bg-gradient-to-br from-white to-gray-50 hover:border-[#27797D] transition-all group">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-sm text-[#112347] flex items-center gap-2">
                                    <span>🇮🇳</span>
                                    <span>India e-Medical Visa</span>
                                </span>
                                <span class="text-[10px] bg-emerald-100 text-emerald-800 font-bold px-2 py-0.5 rounded-full">Government Portal</span>
                            </div>
                            <p class="text-xs text-gray-600">
                                Official Ministry of Home Affairs & Bureau of Immigration e-Visa portal for patients traveling to India.
                            </p>
                            <a href="https://indianvisaonline.gov.in/evisa/tvoa.html" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#27797D] group-hover:underline">
                                <span>Visit indianvisaonline.gov.in</span>
                                <span>&rarr;</span>
                            </a>
                        </div>

                        <!-- Turkey e-Visa Portal -->
                        <!-- <div class="border border-gray-200 rounded-2xl p-4 space-y-2.5 bg-gradient-to-br from-white to-gray-50 hover:border-[#27797D] transition-all group">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-sm text-[#112347] flex items-center gap-2">
                                    <span>🇹🇷</span>
                                    <span>Turkey Official e-Visa</span>
                                </span>
                                <span class="text-[10px] bg-emerald-100 text-emerald-800 font-bold px-2 py-0.5 rounded-full">Government Portal</span>
                            </div>
                            <p class="text-xs text-gray-600">
                                Electronic Visa Application System by Ministry of Foreign Affairs, Republic of Turkey.
                            </p>
                            <a href="https://www.evisa.gov.tr/en/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#27797D] group-hover:underline">
                                <span>Visit evisa.gov.tr</span>
                                <span>&rarr;</span>
                            </a>
                        </div> -->

                        <!-- UAE / Dubai GDRFA Portal -->
                        <!-- <div class="border border-gray-200 rounded-2xl p-4 space-y-2.5 bg-gradient-to-br from-white to-gray-50 hover:border-[#27797D] transition-all group">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-sm text-[#112347] flex items-center gap-2">
                                    <span>🇦🇪</span>
                                    <span>Dubai / UAE Entry Permits</span>
                                </span>
                                <span class="text-[10px] bg-emerald-100 text-emerald-800 font-bold px-2 py-0.5 rounded-full">Government Portal</span>
                            </div>
                            <p class="text-xs text-gray-600">
                                General Directorate of Residency and Foreigners Affairs (GDRFA) and ICP official medical permit services.
                            </p>
                            <a href="https://smartservices.icp.gov.ae/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#27797D] group-hover:underline">
                                <span>Visit smartservices.icp.gov.ae</span>
                                <span>&rarr;</span>
                            </a>
                        </div> -->

                        <!-- Thailand Official e-Visa Portal -->
                        <!-- <div class="border border-gray-200 rounded-2xl p-4 space-y-2.5 bg-gradient-to-br from-white to-gray-50 hover:border-[#27797D] transition-all group">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-sm text-[#112347] flex items-center gap-2">
                                    <span>🇹🇭</span>
                                    <span>Thailand Official e-Visa</span>
                                </span>
                                <span class="text-[10px] bg-emerald-100 text-emerald-800 font-bold px-2 py-0.5 rounded-full">Government Portal</span>
                            </div>
                            <p class="text-xs text-gray-600">
                                Official Thai e-Visa portal under the Ministry of Foreign Affairs of Thailand.
                            </p>
                            <a href="https://www.thaievisa.go.th/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#27797D] group-hover:underline">
                                <span>Visit thaievisa.go.th</span>
                                <span>&rarr;</span>
                            </a>
                        </div> -->

                    </div>
                </div>

            </div>

            <!-- Right 4 Columns: Sticky Visa Request Form & Quick Helpline -->
            <div class="lg:col-span-4 lg:sticky lg:top-20 z-30 space-y-6" id="visa-application-form">
                
                <!-- Main Assistance Card -->
                <div class="bg-[#27797D] rounded-3xl p-6 text-white shadow-xl border border-blue-400/20 space-y-4">
                    <div>
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-white/20 flex items-center justify-center text-white p-1 shrink-0">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 8v8M8 12h8"/></svg>
                            </div>
                            <h3 class="text-lg font-bold text-white tracking-tight">Need Visa Invitation Letter?</h3>
                        </div>
                        <p class="text-xs text-blue-100 mt-1">Our hospital liaison desk arranges official stamped visa letters within 24 to 48 hours.</p>
                    </div>

                    <form action="{{ route('patient.enquiry.submit') }}" method="POST" class="space-y-3" data-enquiry-form>
                        @csrf
                        <input type="hidden" name="source_page" value="Medical Visa Page - Invitation Letter Request">
                        <div>
                            <label class="block text-[10px] font-bold text-blue-100 uppercase tracking-wider mb-1">Patient Full Name</label>
                            <input type="text" name="name" required placeholder="Name as in passport" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-blue-100 uppercase tracking-wider mb-1">Patient Nationality / Country</label>
                            <input type="text" name="country" required placeholder="e.g. Bangladesh, Kenya, Oman..." class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-blue-100 uppercase tracking-wider mb-1">WhatsApp / Phone Number</label>
                            <div class="flex rounded-xl overflow-hidden bg-white focus-within:ring-2 focus-within:ring-[#EF7415] transition-all notranslate" dir="ltr">
                                <div class="relative bg-gray-100 border-r border-gray-200 select-none flex items-center shrink-0">
                                    <select 
                                        name="country_code" 
                                        class="bg-transparent text-gray-800 text-xs font-bold pl-2 pr-5 py-2.5 focus:outline-none appearance-none cursor-pointer max-w-[105px]"
                                    >
                                        @include('frontend.includes.country_code_options')
                                    </select>
                                    <div class="pointer-events-none absolute right-1 inset-y-0 flex items-center text-gray-500">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>
                                <input 
                                    type="tel" 
                                    name="phone" 
                                    required 
                                    placeholder="Phone number" 
                                    class="flex-1 min-w-0 text-xs text-gray-900 bg-white placeholder-gray-400 px-3 py-2.5 border-0 focus:outline-none"
                                >
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-blue-100 uppercase tracking-wider mb-1">Date of Birth</label>
                            <input 
                                type="date" 
                                name="dob" 
                                max="{{ date('Y-m-d') }}"
                                class="w-full text-xs text-gray-900 bg-white px-3.5 py-2.5 rounded-xl border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415] cursor-pointer"
                            >
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-blue-100 uppercase tracking-wider mb-1">Medical Condition or Surgery</label>
                            <textarea name="treatment" rows="3" required placeholder="Describe condition, cardiac, transplant, oncology..." class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415] resize-none"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white font-bold py-3 px-4 rounded-xl text-xs sm:text-sm shadow-md transition-all cursor-pointer">
                            Request Visa Assistance & Quote
                        </button>
                    </form>

                    <div class="pt-3 border-t border-white/10 flex items-center justify-between text-[11px] text-blue-100">
                        <span>🔒 100% Confidential</span>
                        <span>⚡ 24hr Official VIL</span>
                    </div>
                </div>

                <!-- 24/7 WhatsApp Helpline Card -->
                <div class="bg-white rounded-3xl border border-gray-200/90 p-5 shadow-xs text-center space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-[#25D366] flex items-center justify-center mx-auto text-2xl font-bold">
                        💬
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-[#112347]">Direct Visa Officer Helpline</h4>
                        <p class="text-xs text-gray-500 mt-0.5">Chat instantly on WhatsApp for emergency visa inquiries</p>
                    </div>
                    <a href="https://wa.me/{{ $siteSettings->clean_whatsapp }}?text={{ urlencode('Hello HealGoFly, I need urgent Medical Visa assistance.') }}" target="_blank" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-4 rounded-xl text-xs flex items-center justify-center gap-2 transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>WhatsApp: {{ $siteSettings->display_whatsapp }}</span>
                    </a>
                </div>

            </div>

        </div>

    </div>

@endsection

