@extends('admin.layouts.app')

@section('title', 'Website & Contact Details - Heal Go Fly Admin')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="text-slate-400">Website Configuration</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Website & Contact Details</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage hotline phone numbers, support emails, office addresses, WhatsApp contact, and social links.</p>
        </div>
    </div>

    <!-- Main Settings Form -->
    <form action="{{ route('admin.settings.contact.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- 1. Contact Numbers & WhatsApp -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
            <div class="flex items-center gap-3 border-b border-slate-100 pb-3">
                <div class="w-10 h-10 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-black uppercase tracking-wider text-[#112347]">
                        1. Phone Numbers & WhatsApp Concierge
                    </h3>
                    <p class="text-[11px] text-slate-400">Displayed in top header bar, footer, and mobile patient contact triggers.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                <!-- Primary Phone -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Primary Hotline Phone
                    </label>
                    <input 
                        type="text" 
                        name="phone_primary" 
                        value="{{ old('phone_primary', $settings->phone_primary) }}" 
                        placeholder="e.g. +91 9129846542" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>

                <!-- Secondary Phone -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Direct Desk / LLP Phone
                    </label>
                    <input 
                        type="text" 
                        name="phone_secondary" 
                        value="{{ old('phone_secondary', $settings->phone_secondary) }}" 
                        placeholder="e.g. 9129846542" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>

                <!-- WhatsApp -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        WhatsApp Number (With Country Code)
                    </label>
                    <input 
                        type="text" 
                        name="whatsapp_number" 
                        value="{{ old('whatsapp_number', $settings->whatsapp_number) }}" 
                        placeholder="e.g. +91 9129846542" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>
            </div>
        </div>

        <!-- 2. Email Addresses -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
            <div class="flex items-center gap-3 border-b border-slate-100 pb-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-black uppercase tracking-wider text-[#112347]">
                        2. Official Email Addresses
                    </h3>
                    <p class="text-[11px] text-slate-400">Emails shown in footer and contact sections for patient inquiries.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <!-- Primary Email -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        General Inquiries Email
                    </label>
                    <input 
                        type="email" 
                        name="email_primary" 
                        value="{{ old('email_primary', $settings->email_primary) }}" 
                        placeholder="e.g. info@healgofly.com" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>

                <!-- Support Email -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Support & Medical Case Reports Email
                    </label>
                    <input 
                        type="email" 
                        name="email_support" 
                        value="{{ old('email_support', $settings->email_support) }}" 
                        placeholder="e.g. support@healgofly.com" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>
            </div>
        </div>

        <!-- 3. Physical Office Address & Working Hours -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
            <div class="flex items-center gap-3 border-b border-slate-100 pb-3">
                <div class="w-10 h-10 rounded-xl bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-black uppercase tracking-wider text-[#112347]">
                        3. Office Location & Working Hours
                    </h3>
                    <p class="text-[11px] text-slate-400">Headquarters location displayed on website footer & contact pages.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <!-- Street Address -->
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Street Address / LLP Office Building
                    </label>
                    <textarea 
                        name="address" 
                        rows="2" 
                        placeholder="e.g. 274, 2nd Floor, Satra Plaza, Palm Beach Rd, Phase 2, Sector 19D" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >{{ old('address', $settings->address) }}</textarea>
                </div>

                <!-- City, State, Country -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        City, State, Pincode & Country
                    </label>
                    <input 
                        type="text" 
                        name="city_state_country" 
                        value="{{ old('city_state_country', $settings->city_state_country) }}" 
                        placeholder="e.g. Vashi, Navi Mumbai, Maharashtra 400703, India" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>

                <!-- Working Hours -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Operating / Working Hours
                    </label>
                    <input 
                        type="text" 
                        name="working_hours" 
                        value="{{ old('working_hours', $settings->working_hours) }}" 
                        placeholder="e.g. 24/7 Support Assistance" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>

                <!-- Google Map Embed Iframe -->
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Google Maps Embed URL / Iframe Code
                    </label>
                    <input 
                        type="text" 
                        name="google_map_iframe" 
                        value="{{ old('google_map_iframe', $settings->google_map_iframe) }}" 
                        placeholder="Paste Google Maps iframe HTML or embed link here..." 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>
            </div>
        </div>

        <!-- 4. Social Media Links -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
            <div class="flex items-center gap-3 border-b border-slate-100 pb-3">
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-black uppercase tracking-wider text-[#112347]">
                        4. Social Media Profiles
                    </h3>
                    <p class="text-[11px] text-slate-400">Icons and URLs shown in header, footer, and community bars.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <!-- Facebook -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Facebook URL
                    </label>
                    <input 
                        type="url" 
                        name="facebook_url" 
                        value="{{ old('facebook_url', $settings->facebook_url) }}" 
                        placeholder="https://facebook.com/..." 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>

                <!-- Twitter / X -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Twitter / X URL
                    </label>
                    <input 
                        type="url" 
                        name="twitter_url" 
                        value="{{ old('twitter_url', $settings->twitter_url) }}" 
                        placeholder="https://twitter.com/..." 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>

                <!-- Instagram -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Instagram URL
                    </label>
                    <input 
                        type="url" 
                        name="instagram_url" 
                        value="{{ old('instagram_url', $settings->instagram_url) }}" 
                        placeholder="https://instagram.com/..." 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>

                <!-- LinkedIn -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        LinkedIn URL
                    </label>
                    <input 
                        type="url" 
                        name="linkedin_url" 
                        value="{{ old('linkedin_url', $settings->linkedin_url) }}" 
                        placeholder="https://linkedin.com/company/..." 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>

                <!-- YouTube -->
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        YouTube Channel URL
                    </label>
                    <input 
                        type="url" 
                        name="youtube_url" 
                        value="{{ old('youtube_url', $settings->youtube_url) }}" 
                        placeholder="https://youtube.com/..." 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>
            </div>
        </div>

        <!-- 5. Footer & Copyright -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
            <div class="flex items-center gap-3 border-b border-slate-100 pb-3">
                <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-black uppercase tracking-wider text-[#112347]">
                        5. Footer Brand Narrative & Copyright
                    </h3>
                    <p class="text-[11px] text-slate-400">Brief about blurb and copyright notice at the bottom of all frontend pages.</p>
                </div>
            </div>

            <div class="space-y-4 pt-2">
                <!-- Footer About -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Footer "About HealGoFly" Narrative
                    </label>
                    <textarea 
                        name="footer_about" 
                        rows="3" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >{{ old('footer_about', $settings->footer_about) }}</textarea>
                </div>

                <!-- Copyright Text -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Copyright Notice Line
                    </label>
                    <input 
                        type="text" 
                        name="copyright_text" 
                        value="{{ old('copyright_text', $settings->copyright_text) }}" 
                        placeholder="e.g. © Copyright HealGoFly. All rights reserved." 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end">
            <button 
                type="submit" 
                class="bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-8 py-3 rounded-xl shadow-lg shadow-[#EF7415]/20 transition-all cursor-pointer transform hover:-translate-y-0.5"
            >
                Save All Website Settings
            </button>
        </div>
    </form>

</div>
@endsection

