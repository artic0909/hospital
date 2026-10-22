@extends('partner.layouts.app')

@section('title', 'Partner Dashboard - Heal Go Fly')

@section('content')
<div class="space-y-8">
    
    <!-- Welcome Header / Partner Profile Overview Banner -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#1D4B6C] via-[#27797D] to-[#1D4B6C] p-6 sm:p-8 text-white shadow-xl shadow-[#1D4B6C]/10">
        <!-- Background Decorative Orbs -->
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
        <div class="absolute right-1/3 -top-12 w-48 h-48 bg-[#EF7415]/20 rounded-full blur-xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            <div class="flex items-start sm:items-center gap-4 sm:gap-5">
                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-white/15 backdrop-blur-md border border-white/25 flex items-center justify-center text-2xl sm:text-3xl font-extrabold text-[#EF7415] shadow-inner shrink-0">
                    {{ strtoupper(substr($partner->name ?? 'P', 0, 1)) }}
                </div>
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-1.5">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-200 border border-emerald-400/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            {{ ucfirst($partner->status ?? 'Active') }} Partner
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white/15 text-white border border-white/20">
                            ID: #HGF-{{ str_pad($partner->id ?? 1, 5, '0', STR_PAD_LEFT) }}
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#EF7415]/90 text-white">
                            {{ $partner->partner_type ?? 'Healthcare Facilitator' }}
                        </span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-black tracking-tight text-white">
                        Welcome, {{ $partner->name }}
                    </h1>
                    <p class="text-teal-100 text-sm mt-0.5 font-medium flex items-center gap-2 flex-wrap">
                        <span class="font-semibold text-white">{{ $partner->company_name }}</span>
                        @if($partner->country)
                            <span>&bull;</span>
                            <span>{{ $partner->country }}</span>
                        @endif
                        <span>&bull;</span>
                        <span class="italic text-orange-200 font-semibold">"Healgofly hi rahega"</span>
                    </p>
                </div>
            </div>

            <!-- Quick Action Buttons -->
            <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                <a 
                    href="https://wa.me/919129846542?text=Hello%20Heal%20Go%20Fly%20Partner%20Desk,%20I%20am%20Partner%20{{ urlencode($partner->company_name) }}%20(ID:%20HGF-{{ str_pad($partner->id ?? 1, 5, '0', STR_PAD_LEFT) }}).%20I%20have%20a%20new%20patient%20referral." 
                    target="_blank"
                    class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white px-5 py-3 rounded-xl font-bold text-sm shadow-lg shadow-[#EF7415]/30 transition-all hover:-translate-y-0.5"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.199.534 1.286.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.302c-.087.087-.179.182-.077.357.101.174.45 0.742.965 1.201.664.591 1.224.774 1.397.86.173.087.275.072.376-.043.101-.116.433-.506.549-.679.116-.173.231-.144.39-.087s1.011.477 1.184.564.289.13.332.202c.044.072.044.419-.1 0.824z"/></svg>
                    <span>Instant Referral via WhatsApp</span>
                </a>

                <a 
                    href="{{ url('/') }}"
                    class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white border border-white/25 px-5 py-3 rounded-xl font-bold text-sm transition-all"
                >
                    <svg class="w-4 h-4 text-teal-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span>Browse Hospital Network</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Stat Card 1 -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Referrals</p>
                    <h3 class="text-2xl font-black text-[#1D4B6C] mt-1">0</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-[#1D4B6C] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-1.5 text-xs text-gray-500 font-medium">
                <span class="text-emerald-600 font-bold">Active Facilitator</span>
                <span>&bull; Ready for cases</span>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Doctor Opinions</p>
                    <h3 class="text-2xl font-black text-[#27797D] mt-1">0</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-1.5 text-xs text-gray-500 font-medium">
                <span class="text-[#27797D] font-bold">24-48h SLA</span>
                <span>for cost estimates</span>
            </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Admitted Patients</p>
                    <h3 class="text-2xl font-black text-[#EF7415] mt-1">0</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-orange-50 text-[#EF7415] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-1.5 text-xs text-gray-500 font-medium">
                <span class="text-orange-600 font-bold">VIP Desk</span>
                <span>Airport pickup & visa</span>
            </div>
        </div>

        <!-- Stat Card 4 -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Facilitator Accruals</p>
                    <h3 class="text-2xl font-black text-gray-800 mt-1">₹0.00</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-1.5 text-xs text-gray-500 font-medium">
                <span class="text-emerald-600 font-bold">Transparent</span>
                <span>Direct bank settlement</span>
            </div>
        </div>
    </div>

    <!-- Main Content 2-Column: Left Side Process & Cases, Right Side Partner Info & Support -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left 2 Cols: Referrals / Patient Management -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Patient Referral Quick Guide -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-100">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-[#27797D]/10 text-[#27797D] flex items-center justify-center font-bold">
                            1
                        </div>
                        <h2 class="text-base font-bold text-[#1D4B6C]">How to Refer a Patient via Heal Go Fly</h2>
                    </div>
                    <span class="text-xs font-semibold text-[#EF7415] bg-[#EF7415]/10 px-2.5 py-1 rounded-full">
                        Fast-Track 24h
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 text-left">
                        <div class="w-7 h-7 rounded-lg bg-[#1D4B6C] text-white flex items-center justify-center text-xs font-bold mb-2.5">
                            A
                        </div>
                        <h4 class="text-xs font-bold text-gray-900 mb-1">Share Medical Reports</h4>
                        <p class="text-[11px] text-gray-500 leading-relaxed">
                            Send patient scans, MRI, discharge summaries to our medical board via WhatsApp or email.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 text-left">
                        <div class="w-7 h-7 rounded-lg bg-[#27797D] text-white flex items-center justify-center text-xs font-bold mb-2.5">
                            B
                        </div>
                        <h4 class="text-xs font-bold text-gray-900 mb-1">Get 3 Treatment Plans</h4>
                        <p class="text-[11px] text-gray-500 leading-relaxed">
                            Receive top hospital opinions, doctor credentials, and official cost estimates within 24 hours.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 text-left">
                        <div class="w-7 h-7 rounded-lg bg-[#EF7415] text-white flex items-center justify-center text-xs font-bold mb-2.5">
                            C
                        </div>
                        <h4 class="text-xs font-bold text-gray-900 mb-1">Visa & VIP Arrival</h4>
                        <p class="text-[11px] text-gray-500 leading-relaxed">
                            We issue medical visa letters, organize free airport transfers, translators, and accommodation.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Patient Inquiries Table -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="p-6 flex items-center justify-between border-b border-gray-100">
                    <div>
                        <h2 class="text-base font-bold text-[#1D4B6C]">Recent Patient Referrals & Inquiries</h2>
                        <p class="text-xs text-gray-400 mt-0.5">Track case status, medical visas, and discharge summaries</p>
                    </div>
                    <a 
                        href="https://wa.me/919129846542?text=Hi%20Heal%20Go%20Fly,%20I%20would%20like%20to%20submit%20a%20new%20patient%20case." 
                        target="_blank"
                        class="inline-flex items-center gap-1.5 text-xs font-bold text-[#27797D] hover:text-[#1D4B6C] bg-[#27797D]/10 hover:bg-[#27797D]/20 px-3.5 py-2 rounded-xl transition-colors"
                    >
                        <span>+ New Case</span>
                    </a>
                </div>

                <!-- Empty State -->
                <div class="py-12 px-6 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gray-50 border border-gray-200 flex items-center justify-center text-gray-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h3 class="text-sm font-bold text-gray-800">No Patient Referrals Yet</h3>
                    <p class="text-xs text-gray-500 max-w-sm mx-auto mt-1 mb-5">
                        Start referring international or domestic patients seeking advanced medical care in India. We handle everything from consultation to post-op care.
                    </p>
                    <a 
                        href="https://wa.me/919129846542?text=Hello,%20I%20want%20to%20refer%20my%20first%20patient%20under%20partner%20ID%20HGF-{{ str_pad($partner->id ?? 1, 5, '0', STR_PAD_LEFT) }}" 
                        target="_blank"
                        class="inline-flex items-center gap-2 bg-[#1D4B6C] hover:bg-[#27797D] text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all shadow-sm"
                    >
                        <span>Submit Your First Patient Query</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

        </div>

        <!-- Right 1 Col: Partner Details & Dedicated Desk -->
        <div class="space-y-6">

            <!-- Partner Profile Summary Card -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-4 pb-2 border-b border-gray-100">
                    Partner Credentials
                </h3>

                <div class="space-y-3.5 text-xs">
                    <div>
                        <span class="text-gray-400 block text-[11px]">Primary Contact</span>
                        <span class="font-bold text-gray-900 text-sm">{{ $partner->name }}</span>
                    </div>

                    <div>
                        <span class="text-gray-400 block text-[11px]">Organization / Agency</span>
                        <span class="font-bold text-gray-900">{{ $partner->company_name }}</span>
                    </div>

                    <div>
                        <span class="text-gray-400 block text-[11px]">Email Address</span>
                        <span class="font-medium text-gray-800">{{ $partner->email }}</span>
                    </div>

                    @if($partner->phone)
                    <div>
                        <span class="text-gray-400 block text-[11px]">Phone / WhatsApp</span>
                        <span class="font-medium text-gray-800">{{ $partner->phone }}</span>
                    </div>
                    @endif

                    @if($partner->country)
                    <div>
                        <span class="text-gray-400 block text-[11px]">Country / Base</span>
                        <span class="font-medium text-gray-800">{{ $partner->country }}</span>
                    </div>
                    @endif

                    @if($partner->website)
                    <div>
                        <span class="text-gray-400 block text-[11px]">Official Website</span>
                        <a href="{{ Str::startsWith($partner->website, 'http') ? $partner->website : 'https://' . $partner->website }}" target="_blank" class="text-[#27797D] hover:underline font-medium break-all">
                            {{ $partner->website }} &nearr;
                        </a>
                    </div>
                    @endif

                    @if($partner->address)
                    <div>
                        <span class="text-gray-400 block text-[11px]">Office Address</span>
                        <span class="text-gray-600 leading-relaxed block">{{ $partner->address }}</span>
                    </div>
                    @endif
                </div>

                <div class="mt-5 pt-4 border-t border-gray-100 flex items-center justify-between text-[11px] text-gray-400">
                    <span>Registered on {{ $partner->created_at ? $partner->created_at->format('M d, Y') : 'Active' }}</span>
                    <span class="font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">Verified</span>
                </div>
            </div>

            <!-- Dedicated Partner Helpline Desk -->
            <div class="bg-gradient-to-br from-[#1D4B6C] to-[#27797D] rounded-2xl p-6 text-white shadow-md relative overflow-hidden">
                <div class="relative z-10">
                    <span class="inline-block text-[10px] font-bold uppercase tracking-wider bg-[#EF7415] text-white px-2 py-0.5 rounded-full mb-2">
                        Priority Desk
                    </span>
                    <h3 class="text-lg font-bold text-white leading-tight">
                        Heal Go Fly LLP Partner Support
                    </h3>
                    <p class="text-teal-100 text-xs mt-1 mb-4">
                        Direct assistance for hospital estimates, doctor tele-consultations & patient logistics.
                    </p>

                    <div class="space-y-3 text-xs">
                        <a 
                            href="https://wa.me/919129846542" 
                            target="_blank"
                            class="flex items-center gap-2.5 bg-white/10 hover:bg-white/20 p-2.5 rounded-xl border border-white/15 transition-all text-white font-medium"
                        >
                            <span class="w-6 h-6 rounded-lg bg-[#25D366] text-white flex items-center justify-center shrink-0 font-bold">
                                &#9990;
                            </span>
                            <div class="truncate">
                                <span class="block text-[10px] text-teal-200">LLP Helpline / WhatsApp</span>
                                <span class="font-bold text-sm tracking-wide">+91 9129846542</span>
                            </div>
                        </a>

                        <a 
                            href="mailto:info@healgofly.com" 
                            class="flex items-center gap-2.5 bg-white/10 hover:bg-white/20 p-2.5 rounded-xl border border-white/15 transition-all text-white font-medium"
                        >
                            <span class="w-6 h-6 rounded-lg bg-[#EF7415] text-white flex items-center justify-center shrink-0 font-bold">
                                &#9993;
                            </span>
                            <div class="truncate">
                                <span class="block text-[10px] text-teal-200">Official Facilitator Email</span>
                                <span class="font-bold">info@healgofly.com</span>
                            </div>
                        </a>

                        <div class="bg-black/15 p-2.5 rounded-xl border border-white/10 text-[11px] leading-relaxed text-teal-100">
                            <span class="font-bold text-white block text-[10px] uppercase text-[#EF7415]">Headquarters</span>
                            274, 2nd Floor, Satra Plaza, Palm Beach Rd, Phase 2, Sector 19D, Vashi, Navi Mumbai, Maharashtra 400703
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
