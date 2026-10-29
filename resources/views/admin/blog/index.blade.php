@extends('admin.layouts.app')

@section('title', 'Blogs & Press News - Heal Go Fly Admin')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $stats['total'] }} Articles
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Blogs & Press Releases</h1>
            <p class="text-xs text-slate-500 mt-0.5">Publish medical news, patient travel guides, clinical features, and press coverage.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <a 
                href="{{ route('admin.blogs.create') }}" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Write New Article</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Total Posts</span>
                <span class="text-2xl sm:text-3xl font-black text-[#112347]">{{ number_format($stats['total']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
        </div>

        <!-- Published -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Published</span>
                <span class="text-2xl sm:text-3xl font-black text-emerald-600">{{ number_format($stats['published']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>

        <!-- Drafts -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Drafts</span>
                <span class="text-2xl sm:text-3xl font-black text-amber-600">{{ number_format($stats['draft']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
        </div>

        <!-- Featured -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Featured News</span>
                <span class="text-2xl sm:text-3xl font-black text-[#EF7415]">{{ number_format($stats['featured']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-orange-50 text-[#EF7415] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Search & Filters Bar -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-xs">
        <form method="GET" action="{{ route('admin.blogs.index') }}" class="flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ $search }}" 
                    placeholder="Search by article title, author, source, excerpt..." 
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                >
            </div>

            <!-- Status Filter -->
            <select 
                name="status" 
                class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30"
            >
                <option value="">All Statuses</option>
                <option value="published" {{ $status === 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ $status === 'draft' ? 'selected' : '' }}>Draft</option>
            </select>

            <button 
                type="submit" 
                class="bg-[#112347] hover:bg-[#1a3363] text-white text-xs font-bold px-5 py-2.5 rounded-xl transition-all shadow-xs"
            >
                Filter
            </button>
            @if($search || $status || $category)
                <a 
                    href="{{ route('admin.blogs.index') }}" 
                    class="bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold px-4 py-2.5 rounded-xl transition-all text-center"
                >
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Blogs Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200/80 text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                        <th class="py-4 px-4 w-16">Visual</th>
                        <th class="py-4 px-4">Article Title & Details</th>
                        <th class="py-4 px-4">Category & Source</th>
                        <th class="py-4 px-4">Author & Published</th>
                        <th class="py-4 px-4 text-center">Status</th>
                        <th class="py-4 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs font-medium text-slate-700">
                    @forelse ($blogs as $blog)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <!-- Thumbnail -->
                            <td class="py-4 px-4">
                                <div class="w-14 h-14 rounded-xl overflow-hidden bg-slate-100 border border-slate-200 shrink-0">
                                    @if ($blog->image)
                                        <img 
                                            src="{{ asset($blog->image) }}" 
                                            alt="{{ $blog->title }}" 
                                            class="w-full h-full object-cover"
                                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=150&q=80';"
                                        >
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-400 bg-slate-50">
                                            <svg class="w-5 h-5 stroke-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2"/></svg>
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <!-- Title & Excerpt -->
                            <td class="py-4 px-4 max-w-sm">
                                <div class="flex items-center gap-1.5 mb-0.5">
                                    @if ($blog->is_featured)
                                        <span class="px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-wider bg-orange-100 text-[#EF7415] border border-orange-200">
                                            Featured
                                        </span>
                                    @endif
                                    <span class="text-[11px] text-slate-400 font-mono">/{{ $blog->slug }}</span>
                                </div>
                                <h3 class="text-sm font-bold text-[#112347] line-clamp-2 hover:text-[#27797D] transition-colors">
                                    {{ $blog->title }}
                                </h3>
                                @if ($blog->excerpt)
                                    <p class="text-[11px] text-slate-500 line-clamp-1 mt-0.5">
                                        {{ $blog->excerpt }}
                                    </p>
                                @endif
                            </td>

                            <!-- Category & Source -->
                            <td class="py-4 px-4 space-y-1">
                                <div>
                                    <span class="px-2 py-0.5 rounded-md bg-teal-50 text-[#27797D] text-[11px] font-bold border border-teal-200">
                                        {{ $blog->category ?? 'General' }}
                                    </span>
                                </div>
                                @if ($blog->publisher_or_source)
                                    <p class="text-[11px] text-slate-500">
                                        Source: <strong class="text-slate-700">{{ $blog->publisher_or_source }}</strong>
                                    </p>
                                @endif
                                <p class="text-[10px] text-slate-400">
                                    ⏱ {{ $blog->reading_time ?? '3 min read' }}
                                </p>
                            </td>

                            <!-- Author & Date -->
                            <td class="py-4 px-4">
                                <span class="font-bold text-slate-800 block">
                                    {{ $blog->author_name ?? 'HealGoFly' }}
                                </span>
                                <span class="text-[11px] text-slate-400 block mt-0.5">
                                    {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Draft (Not published)' }}
                                </span>
                            </td>

                            <!-- Status Toggle -->
                            <td class="py-4 px-4 text-center">
                                <form action="{{ route('admin.blogs.toggle-status', $blog->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button 
                                        type="submit" 
                                        class="px-2.5 py-1 rounded-full text-[11px] font-bold inline-flex items-center gap-1 transition-all cursor-pointer {{ $blog->status === 'published' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100' }}"
                                        title="Click to toggle status"
                                    >
                                        <span class="w-1.5 h-1.5 rounded-full {{ $blog->status === 'published' ? 'bg-emerald-500' : 'bg-amber-400' }}"></span>
                                        {{ ucfirst($blog->status) }}
                                    </button>
                                </form>
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-4 text-right">
                                <div class="inline-flex items-center gap-1.5">
                                    <a 
                                        href="{{ route('admin.blogs.edit', $blog->id) }}" 
                                        class="p-2 rounded-xl text-slate-500 hover:text-[#27797D] hover:bg-teal-50 transition-colors"
                                        title="Edit Article"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                                    <form 
                                        action="{{ route('admin.blogs.destroy', $blog->id) }}" 
                                        method="POST" 
                                        class="inline-block"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmDelete(this)"
                                            class="p-2 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors"
                                            title="Delete Article"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <svg class="w-12 h-12 mx-auto mb-3 stroke-1 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2"/></svg>
                                <p class="text-sm font-semibold text-slate-600">No blog articles found</p>
                                <p class="text-xs text-slate-400 mt-0.5">Click "Write New Article" above to publish your first post.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($blogs->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>

</div>

<script>
function confirmDelete(button) {
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: 'Delete this blog article?',
            text: 'This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('form').submit();
            }
        });
    } else {
        if (confirm('Delete this article?')) {
            button.closest('form').submit();
        }
    }
}
</script>
@endsection

