@extends('admin.layouts.app')

@section('title', 'Write New Blog Article - Heal Go Fly Admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.blogs.index') }}" class="text-[#27797D] hover:underline">&larr; Back to Blog Articles</a>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Draft New Article</h1>
            <p class="text-xs text-slate-500 mt-0.5">Author a medical news release, hospital announcement, or treatment advisory.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs">
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- 1. Title & Classification -->
            <div class="space-y-4">
                <h3 class="text-sm font-black uppercase tracking-wider text-[#112347] border-b border-slate-100 pb-2">
                    1. Article Information
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Title -->
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Article Title <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="title" 
                            value="{{ old('title') }}" 
                            required 
                            placeholder="e.g. BioSpectrumIndia: Heal Go Fly Acquires Oncology Portal CancerRounds" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                        @error('title') <p class="text-[11px] text-rose-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Custom Slug (URL identifier)
                        </label>
                        <input 
                            type="text" 
                            name="slug" 
                            value="{{ old('slug') }}" 
                            placeholder="leave empty to auto-generate from title" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                        @error('slug') <p class="text-[11px] text-rose-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Category / Tag
                        </label>
                        <input 
                            type="text" 
                            name="category" 
                            value="{{ old('category', 'News Article') }}" 
                            placeholder="e.g. News Article, Clinical Insights, Travel Guide" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>

                    <!-- Author Name -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Author Name
                        </label>
                        <input 
                            type="text" 
                            name="author_name" 
                            value="{{ old('author_name', auth('admin')->user()->name ?? 'HealGoFly Team') }}" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>

                    <!-- Publisher / Media Source -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Publisher / Media Source
                        </label>
                        <input 
                            type="text" 
                            name="publisher_or_source" 
                            value="{{ old('publisher_or_source') }}" 
                            placeholder="e.g. BioSpectrum, Financial Express, HealGoFly News" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>

                    <!-- Reading Time -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Estimated Reading Time
                        </label>
                        <input 
                            type="text" 
                            name="reading_time" 
                            value="{{ old('reading_time', '4 min read') }}" 
                            placeholder="e.g. 4 min read" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>

                    <!-- Publication Date -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Publish Date
                        </label>
                        <input 
                            type="date" 
                            name="published_at" 
                            value="{{ old('published_at', date('Y-m-d')) }}" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >
                    </div>
                </div>
            </div>

            <!-- 2. Content & Excerpt -->
            <div class="space-y-4 pt-2">
                <h3 class="text-sm font-black uppercase tracking-wider text-[#112347] border-b border-slate-100 pb-2">
                    2. Article Body & Summary
                </h3>

                <div class="space-y-4">
                    <!-- Short Excerpt -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Short Excerpt / Teaser
                        </label>
                        <textarea 
                            name="excerpt" 
                            rows="2" 
                            placeholder="Brief summary appearing on homepage cards and search results..." 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >{{ old('excerpt') }}</textarea>
                    </div>

                    <!-- Full Content -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Full Article Content
                        </label>
                        <textarea 
                            name="content" 
                            rows="8" 
                            placeholder="Write complete article details, clinical case commentary, or press interview transcripts..." 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >{{ old('content') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- 3. Featured Image & Publication Status -->
            <div class="space-y-4 pt-2">
                <h3 class="text-sm font-black uppercase tracking-wider text-[#112347] border-b border-slate-100 pb-2">
                    3. Cover Visual & Status
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Featured Thumbnail (Image)
                        </label>
                        <input 
                            type="file" 
                            name="image" 
                            accept="image/*"
                            class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                        >
                        <p class="text-[11px] text-slate-400 mt-1">Recommended: 800x500px landscape visual (JPG, PNG, WebP up to 5MB).</p>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Post Status <span class="text-rose-500">*</span>
                            </label>
                            <select 
                                name="status" 
                                required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30"
                            >
                                <option value="published" {{ old('status', 'published') === 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>

                        <div class="flex flex-col justify-end">
                            <label class="flex items-center gap-2 cursor-pointer p-2.5 bg-slate-50 border border-slate-200 rounded-xl">
                                <input 
                                    type="checkbox" 
                                    name="is_featured" 
                                    value="1" 
                                    {{ old('is_featured') ? 'checked' : '' }} 
                                    class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D]"
                                >
                                <span class="text-xs font-bold text-slate-700">Feature on Home</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a 
                    href="{{ route('admin.blogs.index') }}" 
                    class="px-5 py-2.5 rounded-xl border border-slate-200 text-xs font-bold text-slate-600 hover:bg-slate-50 transition-colors"
                >
                    Cancel
                </a>
                <button 
                    type="submit" 
                    class="bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold px-6 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                >
                    Save & Publish Article
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

