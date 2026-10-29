@extends('admin.layouts.app')

@section('title', 'Add Hero Slide - Heal Go Fly Admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.hero-section.index') }}" class="text-[#27797D] hover:underline">&larr; Back to Hero Slides</a>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Create Hero Banner Slide</h1>
            <p class="text-xs text-slate-500 mt-0.5">Configure main banner headline, badges, CTAs, metrics, and background image.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs">
        <form action="{{ route('admin.hero-section.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- 1. Headings & Tagline -->
            <div class="space-y-4">
                <h3 class="text-sm font-black uppercase tracking-wider text-[#112347] border-b border-slate-100 pb-2">
                    1. Banner Headings & Copy
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Title -->
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Main Heading (Title) <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="title" 
                            value="{{ old('title') }}" 
                            required 
                            placeholder="e.g. Medical Treatment With Unmatched Personal Care" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                        @error('title') <p class="text-[11px] text-rose-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Highlight Text -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Accent / Highlighted Words
                        </label>
                        <input 
                            type="text" 
                            name="highlight_text" 
                            value="{{ old('highlight_text') }}" 
                            placeholder="e.g. Personal Care" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>

                    <!-- Top Pill / Badge -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Top Badge / Pill Text
                        </label>
                        <input 
                            type="text" 
                            name="badge" 
                            value="{{ old('badge') }}" 
                            placeholder="e.g. World-Class Healthcare Partner" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>

                    <!-- Subheading -->
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Subheading / Description
                        </label>
                        <textarea 
                            name="subheading" 
                            rows="2" 
                            placeholder="e.g. World's Most Trusted Medical Travel Assistance Platform connecting global patients..." 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >{{ old('subheading') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- 2. Call To Action Buttons -->
            <div class="space-y-4 pt-2">
                <h3 class="text-sm font-black uppercase tracking-wider text-[#112347] border-b border-slate-100 pb-2">
                    2. Action Buttons
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Primary CTA -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Primary Button Label
                        </label>
                        <input 
                            type="text" 
                            name="primary_btn_text" 
                            value="{{ old('primary_btn_text', 'Get a FREE Quote') }}" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Primary Button URL / Target
                        </label>
                        <input 
                            type="text" 
                            name="primary_btn_url" 
                            value="{{ old('primary_btn_url', '#quote-form') }}" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>

                    <!-- Secondary CTA -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Secondary Button Label
                        </label>
                        <input 
                            type="text" 
                            name="secondary_btn_text" 
                            value="{{ old('secondary_btn_text', 'WhatsApp Us') }}" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Secondary Button URL / Target
                        </label>
                        <input 
                            type="text" 
                            name="secondary_btn_url" 
                            value="{{ old('secondary_btn_url', 'https://wa.me/919129846542') }}" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>
                </div>
            </div>

            <!-- 3. Social Proof & Metrics -->
            <div class="space-y-4 pt-2">
                <h3 class="text-sm font-black uppercase tracking-wider text-[#112347] border-b border-slate-100 pb-2">
                    3. Proof Metrics & Rating
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Patient Assisted Counter
                        </label>
                        <input 
                            type="text" 
                            name="patient_count" 
                            value="{{ old('patient_count', '1,00,000+') }}" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Counter Label
                        </label>
                        <input 
                            type="text" 
                            name="patient_count_label" 
                            value="{{ old('patient_count_label', 'Patients Assisted Since 2016') }}" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Rating Score
                        </label>
                        <input 
                            type="text" 
                            name="rating" 
                            value="{{ old('rating', '4.7') }}" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Rating Label
                        </label>
                        <input 
                            type="text" 
                            name="rating_label" 
                            value="{{ old('rating_label', 'Google Rating (500+ Reviews)') }}" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>
                </div>
            </div>

            <!-- 4. Media & Display Settings -->
            <div class="space-y-4 pt-2">
                <h3 class="text-sm font-black uppercase tracking-wider text-[#112347] border-b border-slate-100 pb-2">
                    4. Visual & Status
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Hero Background Visual (Image)
                        </label>
                        <input 
                            type="file" 
                            name="image" 
                            accept="image/*"
                            class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                        >
                        <p class="text-[11px] text-slate-400 mt-1">Recommended: 1920x800px landscape image (JPG, PNG, WebP up to 5MB).</p>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Display Order
                            </label>
                            <input 
                                type="number" 
                                name="order" 
                                value="{{ old('order', 1) }}" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                            >
                        </div>

                        <div class="flex flex-col justify-end">
                            <label class="flex items-center gap-2 cursor-pointer p-2.5 bg-slate-50 border border-slate-200 rounded-xl">
                                <input 
                                    type="checkbox" 
                                    name="is_active" 
                                    value="1" 
                                    {{ old('is_active', true) ? 'checked' : '' }} 
                                    class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D]"
                                >
                                <span class="text-xs font-bold text-slate-700">Active Slide</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a 
                    href="{{ route('admin.hero-section.index') }}" 
                    class="px-5 py-2.5 rounded-xl border border-slate-200 text-xs font-bold text-slate-600 hover:bg-slate-50 transition-colors"
                >
                    Cancel
                </a>
                <button 
                    type="submit" 
                    class="bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold px-6 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                >
                    Create Hero Slide
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

