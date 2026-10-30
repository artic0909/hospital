@extends('frontend.layouts.app')

@section('title', 'Contact Us - Office Locations, Phone, WhatsApp & Support | Heal Go Fly')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-100/80 border-b border-gray-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs font-medium text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-800 font-semibold">Contact Us</span>
            </nav>
        </div>
    </div>

    <!-- ==================== HERO SECTION ==================== -->
    <div class="bg-gradient-to-b from-teal-50/70 via-white to-gray-50/40 border-b border-gray-200/70 py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#27797D]/10 text-[#27797D] border border-[#27797D]/20 text-xs font-extrabold tracking-wide">
                    <span>📞</span>
                    <span>24/7 Global Patient Support & Office Locations</span>
                </div>

                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-[#112347] tracking-tight leading-tight">
                    Get in Touch with <br class="hidden sm:inline">
                    <span class="text-[#27797D]">HealGoFly Medical Assistance</span>
                </h1>

                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Have questions about hospital admissions, specialist doctors, treatment estimates, or medical visas? Reach our international coordinators directly through phone, WhatsApp, or email.
                </p>

                <!-- Quick Working Hours & Response Time -->
                <div class="pt-2 flex flex-wrap items-center gap-6 text-xs text-gray-600">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="font-bold text-gray-900">{{ $settings->working_hours ?: '24/7 Assistance Desk' }}</span>
                    </div>
                    <div class="w-px h-4 bg-gray-300"></div>
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-[#27797D]">Avg. Response Time:</span>
                        <span class="text-gray-500">Under 15 Minutes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== MAIN CONTACT DETAILS ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">

        <!-- 1. Direct Contact Channel Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- WhatsApp Card -->
            @php
                $cleanWhatsapp = preg_replace('/[^0-9]/', '', $settings->whatsapp_number ?: '919129846542');
            @endphp
            <div class="bg-white rounded-3xl border border-emerald-100 p-6 sm:p-7 shadow-xs hover:shadow-md transition-all space-y-4 relative overflow-hidden group">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 border border-emerald-100 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                </div>
                <div>
                    <h3 class="text-base font-extrabold text-[#112347]">WhatsApp Chat Support</h3>
                    <p class="text-xs text-gray-500 mt-1">Instant medical report review and dedicated patient coordinator assistance.</p>
                </div>
                <div class="pt-2">
                    <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('Hello HealGoFly, I would like to consult about hospital treatment.') }}" target="_blank" class="block w-full text-center bg-[#25D366] hover:bg-[#20ba59] text-white text-xs font-bold py-3 px-4 rounded-xl shadow-xs transition-all">
                        Chat on {{ $settings->whatsapp_number ?: '+91 9129846542' }}
                    </a>
                </div>
            </div>

            <!-- Phone Direct Card -->
            <div class="bg-white rounded-3xl border border-orange-100 p-6 sm:p-7 shadow-xs hover:shadow-md transition-all space-y-4 relative overflow-hidden group">
                <div class="w-12 h-12 rounded-2xl bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0 border border-orange-100 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <div>
                    <h3 class="text-base font-extrabold text-[#112347]">Phone Helplines</h3>
                    <p class="text-xs text-gray-500 mt-1">Speak directly with our clinical desk for hospital admission & doctor bookings.</p>
                </div>
                <div class="pt-2 space-y-2">
                    <a href="tel:{{ $settings->phone_primary ?: '+919129846542' }}" class="block w-full text-center bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold py-3 px-4 rounded-xl shadow-xs transition-all">
                        Call {{ $settings->phone_primary ?: '+91 9129846542' }}
                    </a>
                    @if($settings->phone_secondary && $settings->phone_secondary !== $settings->phone_primary)
                        <a href="tel:{{ $settings->phone_secondary }}" class="block w-full text-center bg-gray-50 hover:bg-gray-100 text-gray-700 text-xs font-semibold py-2 px-3 rounded-lg border border-gray-200 transition-all">
                            Alt: {{ $settings->phone_secondary }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Email Support Card -->
            <div class="bg-white rounded-3xl border border-teal-100 p-6 sm:p-7 shadow-xs hover:shadow-md transition-all space-y-4 relative overflow-hidden group">
                <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0 border border-teal-100 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h3 class="text-base font-extrabold text-[#112347]">Official Email Inquiries</h3>
                    <p class="text-xs text-gray-500 mt-1">Send your detailed medical history, scans, and visa documentation inquiries.</p>
                </div>
                <div class="pt-2 space-y-2">
                    <a href="mailto:{{ $settings->email_primary ?: 'info@healgofly.com' }}" class="block w-full text-center bg-[#27797D] hover:bg-[#1f6063] text-white text-xs font-bold py-3 px-4 rounded-xl shadow-xs transition-all">
                        {{ $settings->email_primary ?: 'info@healgofly.com' }}
                    </a>
                    @if($settings->email_support && $settings->email_support !== $settings->email_primary)
                        <a href="mailto:{{ $settings->email_support }}" class="block w-full text-center bg-gray-50 hover:bg-gray-100 text-gray-700 text-xs font-semibold py-2 px-3 rounded-lg border border-gray-200 transition-all">
                            Support: {{ $settings->email_support }}
                        </a>
                    @endif
                </div>
            </div>

        </div>

        <!-- 2. Two-Column Office & Support Structure -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <!-- Left (7 Cols): Head Office & Operating Structure -->
            <div class="lg:col-span-7 space-y-6">

                <!-- Primary Corporate Address Card -->
                <div class="bg-white rounded-3xl border border-gray-200/90 p-7 sm:p-8 shadow-xs space-y-6">
                    <div class="flex items-start justify-between gap-4 pb-4 border-b border-gray-100">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-[#EF7415] bg-orange-50 px-2.5 py-1 rounded-full border border-orange-100">
                                Corporate Headquarters
                            </span>
                            <h2 class="text-xl sm:text-2xl font-black text-[#112347] tracking-tight mt-2">
                                Head Office Location
                            </h2>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                            📍
                        </div>
                    </div>

                    <div class="space-y-4 text-xs sm:text-sm text-gray-700">
                        <div class="flex items-start gap-3">
                            <span class="text-base text-[#27797D] shrink-0 mt-0.5">🏢</span>
                            <div>
                                <strong class="text-gray-900 block font-bold">HealGoFly Medical Services</strong>
                                <p class="text-gray-600 mt-0.5 leading-relaxed">
                                    {{ $settings->address ?: '274, 2nd Floor, Satra Plaza, Palm Beach Rd, Phase 2, Sector 19D' }}
                                </p>
                                <p class="text-gray-500 font-semibold mt-0.5">
                                    {{ $settings->city_state_country ?: 'Vashi, Navi Mumbai, Maharashtra 400703, India' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 pt-3 border-t border-gray-100">
                            <span class="text-base text-[#27797D] shrink-0 mt-0.5">🕒</span>
                            <div>
                                <strong class="text-gray-900 block font-bold">Operating Hours</strong>
                                <p class="text-gray-600 mt-0.5">
                                    {{ $settings->working_hours ?: '24/7 Support Assistance Available (365 Days)' }}
                                </p>
                                <p class="text-[11px] text-gray-400 mt-0.5">Emergency Patient Desk: Active Round The Clock</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="pt-4 border-t border-gray-100 space-y-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block">
                            Connect on Social Channels
                        </span>
                        <div class="flex items-center gap-3 flex-wrap">
                            @if($settings->facebook_url)
                                <a href="{{ $settings->facebook_url }}" target="_blank" class="w-9 h-9 rounded-xl bg-[#1877F2]/10 hover:bg-[#1877F2] text-[#1877F2] hover:text-white flex items-center justify-center transition-all" title="Facebook">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                            @endif

                            @if($settings->linkedin_url)
                                <a href="{{ $settings->linkedin_url }}" target="_blank" class="w-9 h-9 rounded-xl bg-[#0077b5]/10 hover:bg-[#0077b5] text-[#0077b5] hover:text-white flex items-center justify-center transition-all" title="LinkedIn">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76c.94 0 1.7-.76 1.7-1.7s-.76-1.7-1.7-1.7-1.7.76-1.7 1.7.76 1.7 1.7 1.7m1.4 9.74v-8.37H5.06v8.37h2.8z"/></svg>
                                </a>
                            @endif

                            @if($settings->instagram_url)
                                <a href="{{ $settings->instagram_url }}" target="_blank" class="w-9 h-9 rounded-xl bg-[#E4405F]/10 hover:bg-[#E4405F] text-[#E4405F] hover:text-white flex items-center justify-center transition-all" title="Instagram">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            @endif

                            @if($settings->twitter_url)
                                <a href="{{ $settings->twitter_url }}" target="_blank" class="w-9 h-9 rounded-xl bg-slate-900/10 hover:bg-slate-900 text-slate-800 hover:text-white flex items-center justify-center transition-all" title="Twitter / X">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                            @endif

                            @if($settings->youtube_url)
                                <a href="{{ $settings->youtube_url }}" target="_blank" class="w-9 h-9 rounded-xl bg-[#FF0000]/10 hover:bg-[#FF0000] text-[#FF0000] hover:text-white flex items-center justify-center transition-all" title="YouTube">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Specialized Support Desks -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Desk 1: Visa Support -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-200/80 shadow-xs space-y-2">
                        <span class="text-xs font-extrabold text-[#27797D] flex items-center gap-1.5">
                            <span>✈️</span>
                            <span>Medical Visa Letter Desk</span>
                        </span>
                        <p class="text-[11px] text-gray-500 leading-relaxed">
                            Need hospital Visa Invitation Letters (VIL) or attendant clearances? Our visa desk issues documents within 24–48 hours.
                        </p>
                        <a href="{{ route('medical.visa') }}" class="inline-block text-xs font-bold text-[#27797D] hover:underline">
                            View Visa Guidelines &rarr;
                        </a>
                    </div>

                    <!-- Desk 2: Emergency Consultations -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-200/80 shadow-xs space-y-2">
                        <span class="text-xs font-extrabold text-[#EF7415] flex items-center gap-1.5">
                            <span>🚨</span>
                            <span>Emergency / Quaternary Care</span>
                        </span>
                        <p class="text-[11px] text-gray-500 leading-relaxed">
                            For urgent transplants, cardiac emergencies, or urgent cancer evaluations, call our 24/7 priority line directly.
                        </p>
                        <a href="tel:{{ $settings->phone_primary ?: '+919129846542' }}" class="inline-block text-xs font-bold text-[#EF7415] hover:underline">
                            Call Priority Line &rarr;
                        </a>
                    </div>
                </div>

            </div>

            <!-- Right (5 Cols): Interactive Google Map & Regional Desks -->
            <div class="lg:col-span-5 space-y-6">

                <!-- Interactive Map Embed -->
                <div class="bg-white rounded-3xl border border-gray-200/90 shadow-xs overflow-hidden">
                    <div class="p-5 border-b border-gray-100 flex items-center justify-between">
                        <h3 class="text-sm font-extrabold text-[#112347] flex items-center gap-2">
                            <span>🗺️</span>
                            <span>Office Location Map</span>
                        </h3>
                        <span class="text-[11px] font-bold text-[#27797D]">Navi Mumbai, India</span>
                    </div>

                    <div class="w-full h-80 bg-gray-100">
                        @if(!empty($settings->google_map_iframe))
                            {!! $settings->google_map_iframe !!}
                        @else
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.835926593922!2d73.0031830759052!3d19.070940382133465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c139366c8f35%3A0xe54fb93c3c137452!2sSatra%20Plaza%2C%20Palm%20Beach%20Rd%2C%20Phase%202%2C%20Sector%2019D%2C%20Vashi%2C%20Navi%20Mumbai%2C%20Maharashtra%20400703!5e0!3m2!1sen!2sin!4v1714470000000!5m2!1sen!2sin" 
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        @endif
                    </div>
                </div>

                <!-- Global Destination Desks -->
                <div class="bg-gradient-to-br from-teal-50/70 to-blue-50/50 rounded-3xl border border-teal-100/80 p-6 space-y-3">
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-[#27797D]">
                        International Patient Coordinators
                    </span>
                    <h4 class="text-sm font-extrabold text-[#112347]">
                        Coordinators Available For:
                    </h4>
                    <div class="grid grid-cols-2 gap-2.5 text-xs text-gray-700 font-semibold pt-1">
                        <div class="flex items-center gap-2 bg-white/80 p-2.5 rounded-xl border border-teal-100">
                            <span>🇮🇳</span>
                            <span>India Desk</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white/80 p-2.5 rounded-xl border border-teal-100">
                            <span>🇦🇪</span>
                            <span>UAE / Dubai Desk</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white/80 p-2.5 rounded-xl border border-teal-100">
                            <span>🇹🇷</span>
                            <span>Turkey Desk</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white/80 p-2.5 rounded-xl border border-teal-100">
                            <span>🇹🇭</span>
                            <span>Thailand Desk</span>
                        </div>
                    </div>
                    <p class="text-[11px] text-gray-500 pt-2 leading-relaxed">
                        Multilingual support available in English, Arabic, Bengali, Russian, and French for overseas consultations.
                    </p>
                </div>

            </div>

        </div>

    </div>

@endsection

