@extends('admin.layouts.app')

@section('title', 'Edit Blog Article - Heal Go Fly Admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.blogs.index') }}" class="text-[#27797D] hover:underline">&larr; Back to Blog Articles</a>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Edit Article</h1>
            <p class="text-xs text-slate-500 mt-0.5">Modify article text, image, metadata, category, and publication status.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs">
        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

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
                            value="{{ old('title', $blog->title) }}" 
                            required 
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
                            value="{{ old('slug', $blog->slug) }}" 
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
                            value="{{ old('category', $blog->category) }}" 
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
                            value="{{ old('author_name', $blog->author_name) }}" 
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
                            value="{{ old('publisher_or_source', $blog->publisher_or_source) }}" 
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
                            value="{{ old('reading_time', $blog->reading_time) }}" 
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
                            value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d') : '') }}" 
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
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >{{ old('excerpt', $blog->excerpt) }}</textarea>
                    </div>

                    <!-- Full Content -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Full Article Content
                        </label>
                        <textarea 
                            name="content" 
                            rows="8" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                        >{{ old('content', $blog->content) }}</textarea>
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
                        @if ($blog->image)
                            <div class="mb-3 flex items-center gap-3 bg-slate-50 p-2.5 rounded-xl border border-slate-200">
                                <img 
                                    src="{{ asset($blog->image) }}" 
                                    alt="Current Visual" 
                                    class="w-14 h-14 object-cover rounded-lg border border-slate-200"
                                    onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=150&q=80';"
                                >
                                <span class="text-[11px] text-slate-600 truncate flex-1">Current thumbnail active</span>
                            </div>
                        @endif
                        <input 
                            type="file" 
                            name="image" 
                            accept="image/*"
                            class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                        >
                        <p class="text-[11px] text-slate-400 mt-1">Leave empty to keep existing image. JPG, PNG, WebP up to 5MB.</p>
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
                                <option value="published" {{ old('status', $blog->status) === 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ old('status', $blog->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>

                        <div class="flex flex-col justify-end">
                            <label class="flex items-center gap-2 cursor-pointer p-2.5 bg-slate-50 border border-slate-200 rounded-xl">
                                <input 
                                    type="checkbox" 
                                    name="is_featured" 
                                    value="1" 
                                    {{ old('is_featured', $blog->is_featured) ? 'checked' : '' }} 
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
                    Update Article
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

