@extends('admin.layouts.app')

@section('title', 'Hero Section Management - Heal Go Fly Admin')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $stats['total'] }} Slides
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Hero Section Slides</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage homepage banner headlines, subtext, call-to-actions, stats badges, and hero visuals.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <a 
                href="{{ route('admin.hero-section.create') }}" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add Hero Slide</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <!-- Total -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Total Slides</span>
                <span class="text-2xl sm:text-3xl font-black text-[#112347]">{{ number_format($stats['total']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-slate-100 text-[#112347] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>

        <!-- Active -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Active Slides</span>
                <span class="text-2xl sm:text-3xl font-black text-emerald-600">{{ number_format($stats['active']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>

        <!-- Inactive -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Inactive / Draft</span>
                <span class="text-2xl sm:text-3xl font-black text-amber-600">{{ number_format($stats['inactive']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-xs">
        <form method="GET" action="{{ route('admin.hero-section.index') }}" class="flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ $search }}" 
                    placeholder="Search hero title, badge, or subheading..." 
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                >
            </div>
            <button 
                type="submit" 
                class="bg-[#112347] hover:bg-[#1a3363] text-white text-xs font-bold px-5 py-2.5 rounded-xl transition-all shadow-xs"
            >
                Search
            </button>
            @if($search)
                <a 
                    href="{{ route('admin.hero-section.index') }}" 
                    class="bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold px-4 py-2.5 rounded-xl transition-all text-center"
                >
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Hero Slides Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200/80 text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                        <th class="py-4 px-4 text-center w-14">Order</th>
                        <th class="py-4 px-4">Banner Preview</th>
                        <th class="py-4 px-4">Heading & Tagline</th>
                        <th class="py-4 px-4">CTAs & Stats</th>
                        <th class="py-4 px-4 text-center">Status</th>
                        <th class="py-4 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs font-medium text-slate-700">
                    @forelse ($heroes as $hero)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <!-- Order -->
                            <td class="py-4 px-4 text-center">
                                <span class="w-7 h-7 rounded-lg bg-slate-100 text-slate-700 font-black text-xs inline-flex items-center justify-center">
                                    {{ $hero->order }}
                                </span>
                            </td>

                            <!-- Visual Preview -->
                            <td class="py-4 px-4">
                                <div class="w-24 h-16 rounded-xl overflow-hidden bg-slate-100 border border-slate-200 shrink-0 relative group">
                                    @if ($hero->image)
                                        <img 
                                            src="{{ asset($hero->image) }}" 
                                            alt="{{ $hero->title }}" 
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform"
                                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=300&q=80';"
                                        >
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 bg-slate-50">
                                            <svg class="w-6 h-6 stroke-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            <span class="text-[9px]">No visual</span>
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <!-- Title & Subheading -->
                            <td class="py-4 px-4 max-w-sm">
                                @if ($hero->badge)
                                    <span class="inline-block text-[10px] font-bold uppercase tracking-wider text-[#27797D] bg-teal-50 px-2 py-0.5 rounded-md border border-teal-200 mb-1">
                                        {{ $hero->badge }}
                                    </span>
                                @endif
                                <h3 class="text-sm font-bold text-[#112347] line-clamp-1">
                                    {{ $hero->title }}
                                </h3>
                                <p class="text-[11px] text-slate-500 line-clamp-2 mt-0.5">
                                    {{ $hero->subheading ?? 'No subtitle provided.' }}
                                </p>
                            </td>

                            <!-- CTAs & Stats -->
                            <td class="py-4 px-4 space-y-1">
                                <div class="flex items-center gap-2">
                                    <span class="text-[10px] font-bold text-slate-400 uppercase">CTA:</span>
                                    <span class="px-2 py-0.5 rounded bg-orange-50 text-[#EF7415] font-bold text-[11px] border border-orange-200">
                                        {{ $hero->primary_btn_text ?? 'Quote' }}
                                    </span>
                                    @if ($hero->secondary_btn_text)
                                        <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 font-bold text-[11px] border border-emerald-200">
                                            {{ $hero->secondary_btn_text }}
                                        </span>
                                    @endif
                                </div>
                                <div class="text-[11px] text-slate-500">
                                    <span class="font-bold text-slate-700">{{ $hero->patient_count }}</span> patients &bull;
                                    <span class="font-bold text-amber-600">★ {{ $hero->rating }}</span> rating
                                </div>
                            </td>

                            <!-- Status Toggle -->
                            <td class="py-4 px-4 text-center">
                                <form action="{{ route('admin.hero-section.toggle-status', $hero->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button 
                                        type="submit" 
                                        class="px-2.5 py-1 rounded-full text-[11px] font-bold inline-flex items-center gap-1 transition-all cursor-pointer {{ $hero->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-slate-100 text-slate-500 border border-slate-200 hover:bg-slate-200' }}"
                                        title="Click to toggle status"
                                    >
                                        <span class="w-1.5 h-1.5 rounded-full {{ $hero->is_active ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                        {{ $hero->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-4 text-right">
                                <div class="inline-flex items-center gap-1.5">
                                    <a 
                                        href="{{ route('admin.hero-section.edit', $hero->id) }}" 
                                        class="p-2 rounded-xl text-slate-500 hover:text-[#27797D] hover:bg-teal-50 transition-colors"
                                        title="Edit Slide"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                                    <form 
                                        action="{{ route('admin.hero-section.destroy', $hero->id) }}" 
                                        method="POST" 
                                        class="inline-block delete-form"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmDelete(this)"
                                            class="p-2 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors"
                                            title="Delete Slide"
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
                                <svg class="w-12 h-12 mx-auto mb-3 stroke-1 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <p class="text-sm font-semibold text-slate-600">No Hero slides found</p>
                                <p class="text-xs text-slate-400 mt-0.5">Click "Add Hero Slide" above to create your first homepage banner.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($heroes->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $heroes->links() }}
            </div>
        @endif
    </div>

</div>

<script>
function confirmDelete(button) {
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: 'Delete this Hero slide?',
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
        if (confirm('Delete this hero slide?')) {
            button.closest('form').submit();
        }
    }
}
</script>
@endsection

