@extends('frontend.layouts.app')

@section('title', ($blog->title ?? 'News Story') . ' - Heal Go Fly In News')

@push('styles')
<style>
    .blog-prose p {
        margin-bottom: 1.25rem;
        line-height: 1.8;
        color: #334155;
        font-size: 1.0625rem;
    }
    .blog-prose h2 {
        font-size: 1.625rem;
        font-weight: 800;
        color: #112347;
        margin-top: 2rem;
        margin-bottom: 1rem;
        line-height: 1.3;
    }
    .blog-prose h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #112347;
        margin-top: 1.75rem;
        margin-bottom: 0.75rem;
    }
    .blog-prose ul {
        list-style-type: disc;
        margin-left: 1.5rem;
        margin-bottom: 1.25rem;
        color: #334155;
    }
    .blog-prose ol {
        list-style-type: decimal;
        margin-left: 1.5rem;
        margin-bottom: 1.25rem;
        color: #334155;
    }
    .blog-prose li {
        margin-bottom: 0.5rem;
        line-height: 1.7;
    }
    .blog-prose blockquote {
        border-left: 4px solid #27797D;
        background-color: #f0f9f9;
        padding: 1rem 1.25rem;
        border-radius: 0 0.75rem 0.75rem 0;
        font-style: italic;
        color: #1e3a5f;
        margin: 1.5rem 0;
    }
    .blog-prose strong {
        color: #112347;
        font-weight: 700;
    }
    .blog-prose a {
        color: #27797D;
        text-decoration: underline;
        font-weight: 600;
    }
</style>
@endpush

@section('content')

<!-- ==================== BREADCRUMBS ==================== -->
<div class="bg-gray-50/90 border-b border-gray-200/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5">
        <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium overflow-x-auto whitespace-nowrap">
            <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors flex items-center gap-1">
                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Home</span>
            </a>
            <span class="text-gray-300">/</span>
            <a href="{{ url('/') }}#news-section" class="hover:text-[#27797D] transition-colors">HealGoFly In News</a>
            <span class="text-gray-300">/</span>
            <span class="text-[#27797D] font-bold">{{ $blog->category ?? 'News Article' }}</span>
            <span class="text-gray-300">/</span>
            <span class="text-[#112347] font-semibold truncate max-w-xs">{{ Str::limit($blog->title, 45) }}</span>
        </nav>
    </div>
</div>

<!-- ==================== MAIN BLOG ARTICLE SECTION ==================== -->
<section class="py-10 sm:py-14 lg:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- LEFT COLUMN: Article Content (8 cols) -->
            <article class="lg:col-span-8 space-y-6">
                
                <!-- Category & Publisher Header -->
                <div class="flex flex-wrap items-center gap-2.5">
                    @if(!empty($blog->category))
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-teal-50 text-[#27797D] border border-teal-200">
                            <span class="w-2 h-2 rounded-full bg-[#EF7415] animate-pulse"></span>
                            {{ $blog->category }}
                        </span>
                    @endif

                    @if(!empty($blog->publisher_or_source))
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                            <svg class="w-3.5 h-3.5 text-[#27797D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            Source: {{ $blog->publisher_or_source }}
                        </span>
                    @endif

                    @if(!empty($blog->reading_time))
                        <span class="text-xs text-gray-500 font-medium ml-auto flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $blog->reading_time }}
                        </span>
                    @endif
                </div>

                <!-- Main Title -->
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#112347] tracking-tight leading-tight">
                    {{ $blog->title }}
                </h1>

                <!-- Meta Details Bar -->
                <div class="flex flex-wrap items-center justify-between gap-3 py-3.5 border-y border-gray-100 text-xs text-gray-500">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-[#112347] text-white flex items-center justify-center font-bold text-xs shadow-xs">
                            {{ strtoupper(substr($blog->author_name ?? 'HealGoFly', 0, 1)) }}
                        </div>
                        <div>
                            <span class="block font-bold text-gray-900">{{ $blog->author_name ?? 'Editorial Desk' }}</span>
                            <span class="text-[11px] text-gray-400">Published on {{ ($blog->published_at ?? $blog->created_at)->format('F d, Y') }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 text-gray-400">
                        <span class="flex items-center gap-1 text-[11px]">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            {{ number_format($blog->views ?? 0) }} Views
                        </span>
                    </div>
                </div>

                <!-- Featured Image -->
                @php
                    $blogHeroImg = $blog->image ? (Str::startsWith($blog->image, ['http://', 'https://']) ? $blog->image : asset($blog->image)) : 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80';
                @endphp
                <div class="rounded-3xl overflow-hidden border border-gray-200/80 shadow-md bg-gray-100">
                    <img 
                        src="{{ $blogHeroImg }}" 
                        alt="{{ $blog->title }}" 
                        class="w-full h-auto max-h-[460px] object-cover"
                        onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80';"
                    >
                </div>

                <!-- Excerpt Highlight Box -->
                @if(!empty($blog->excerpt))
                    <div class="bg-gradient-to-r from-teal-50/70 via-blue-50/50 to-white p-5 rounded-2xl border-l-4 border-[#27797D] text-[#112347] text-sm sm:text-base font-medium leading-relaxed shadow-2xs">
                        {{ $blog->excerpt }}
                    </div>
                @endif

                <!-- Article Body Content -->
                <div class="blog-prose pt-4 leading-relaxed text-gray-700">
                    {!! $blog->content !!}
                </div>

                <!-- Share & Interaction Bar -->
                <div class="mt-10 pt-6 border-t border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Share this article:</span>
                    </div>

                    @php
                        $articleUrl = urlencode(url()->current());
                        $articleTitle = urlencode($blog->title);
                    @endphp

                    <div class="flex items-center gap-2">
                        <!-- WhatsApp -->
                        <a 
                            href="https://api.whatsapp.com/send?text={{ $articleTitle }}%20{{ $articleUrl }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="w-9 h-9 rounded-xl bg-[#25D366]/10 text-[#25D366] hover:bg-[#25D366] hover:text-white transition-all flex items-center justify-center shadow-xs" 
                            title="Share on WhatsApp"
                        >
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>

                        <!-- Facebook -->
                        <a 
                            href="https://www.facebook.com/sharer/sharer.php?u={{ $articleUrl }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all flex items-center justify-center shadow-xs" 
                            title="Share on Facebook"
                        >
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>

                        <!-- Twitter / X -->
                        <a 
                            href="https://twitter.com/intent/tweet?text={{ $articleTitle }}&url={{ $articleUrl }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="w-9 h-9 rounded-xl bg-slate-100 text-slate-800 hover:bg-black hover:text-white transition-all flex items-center justify-center shadow-xs" 
                            title="Share on X"
                        >
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>

                        <!-- LinkedIn -->
                        <a 
                            href="https://www.linkedin.com/sharing/share-offsite/?url={{ $articleUrl }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="w-9 h-9 rounded-xl bg-sky-50 text-sky-700 hover:bg-sky-700 hover:text-white transition-all flex items-center justify-center shadow-xs" 
                            title="Share on LinkedIn"
                        >
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.761-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>

                        <!-- Copy Link -->
                        <button 
                            type="button" 
                            onclick="navigator.clipboard.writeText(window.location.href); alert('Article link copied to clipboard!');" 
                            class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition-all shadow-xs cursor-pointer"
                        >
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            <span>Copy Link</span>
                        </button>
                    </div>
                </div>

            </article>

            <!-- RIGHT COLUMN: Sidebar (4 cols) -->
            <aside class="lg:col-span-4 space-y-6 lg:sticky lg:top-24">
                
                <!-- 1. Quick Free Medical Quote Inquiry Box -->
                <div class="bg-gradient-to-br from-[#112347] to-[#1D4B6C] text-white rounded-3xl p-6 sm:p-7 shadow-xl border border-blue-400/20 relative overflow-hidden">
                    <div class="absolute -top-12 -right-12 w-40 h-40 bg-[#27797D]/20 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-[#EF7415]/20 rounded-full blur-2xl"></div>

                    <div class="relative z-10 space-y-4">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 text-teal-300 border border-white/15 text-[11px] font-bold uppercase tracking-wider">
                            <span class="w-2 h-2 rounded-full bg-[#EF7415] animate-ping"></span>
                            Free Consultation
                        </div>

                        <h3 class="text-xl font-black text-white tracking-tight leading-snug">
                            Need Expert Medical Advice Abroad?
                        </h3>

                        <p class="text-xs text-blue-100/90 leading-relaxed">
                            Share your case details. Get treated by world-renowned specialists with zero service fee.
                        </p>

                        <a 
                            href="{{ url('/') }}#quote-form" 
                            class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-3 px-4 rounded-xl shadow-lg shadow-[#EF7415]/30 transition-all flex items-center justify-center gap-2 group text-center"
                        >
                            <span>Get Free Treatment Quote</span>
                            <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                        </a>

                        <a 
                            href="https://wa.me/919129846542?text=Hello%20HealGoFly%20Team%2C%20I%20am%20reading%20the%20article%3A%20{{ $articleTitle }}" 
                            target="_blank" 
                            class="w-full bg-[#25D366] hover:bg-[#20ba5a] text-white text-xs sm:text-sm font-bold py-3 px-4 rounded-xl shadow-md transition-all flex items-center justify-center gap-2"
                        >
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            <span>Chat on WhatsApp</span>
                        </a>
                    </div>
                </div>

                <!-- 2. Recent Stories Card -->
                @if($recentBlogs->isNotEmpty())
                    <div class="bg-white rounded-3xl p-6 border border-gray-200/80 shadow-xs">
                        <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-100">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-[#112347]">
                                Recent Stories
                            </h3>
                            <span class="text-xs text-[#27797D] font-semibold">Latest News</span>
                        </div>

                        <div class="space-y-4">
                            @foreach($recentBlogs as $recent)
                                @php
                                    $recentImg = $recent->image ? (Str::startsWith($recent->image, ['http://', 'https://']) ? $recent->image : asset($recent->image)) : 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=300&q=80';
                                @endphp
                                <a href="{{ route('blog.show', $recent->slug) }}" class="flex items-start gap-3.5 group">
                                    <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0 border border-gray-200/70">
                                        <img src="{{ $recentImg }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <span class="text-[10px] font-bold text-[#EF7415] uppercase tracking-wider block">
                                            {{ $recent->category ?? 'News' }}
                                        </span>
                                        <h4 class="text-xs font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug line-clamp-2 mt-0.5">
                                            {{ $recent->title }}
                                        </h4>
                                        <span class="text-[10px] text-gray-400 mt-1 block">
                                            {{ ($recent->published_at ?? $recent->created_at)->format('M d, Y') }}
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 3. Why Choose Heal Go Fly Trust Badges -->
                <div class="bg-gradient-to-b from-[#f0f9f9] to-white rounded-3xl p-6 border border-teal-100/80 shadow-xs space-y-4">
                    <h3 class="text-sm font-bold text-[#112347]">Why Patients Choose Heal Go Fly</h3>
                    
                    <div class="space-y-3 text-xs text-gray-600">
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-teal-100 text-[#27797D] flex items-center justify-center font-bold flex-shrink-0">
                                ✓
                            </div>
                            <span><strong>1,00,000+</strong> Global Patients Assisted</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-teal-100 text-[#27797D] flex items-center justify-center font-bold flex-shrink-0">
                                ✓
                            </div>
                            <span><strong>500+ Accredited</strong> Partner Hospitals</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-teal-100 text-[#27797D] flex items-center justify-center font-bold flex-shrink-0">
                                ✓
                            </div>
                            <span><strong>Free Assistance:</strong> Zero Hidden Service Charges</span>
                        </div>
                    </div>
                </div>

            </aside>

        </div>

    </div>
</section>

@endsection

