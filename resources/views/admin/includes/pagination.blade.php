@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-semibold">
        <!-- Result count description -->
        <div class="text-slate-500">
            <span>Showing</span>
            <span class="font-bold text-slate-800">{{ $paginator->firstItem() ?? 0 }}</span>
            <span>to</span>
            <span class="font-bold text-slate-800">{{ $paginator->lastItem() ?? 0 }}</span>
            <span>of</span>
            <span class="font-bold text-slate-800">{{ $paginator->total() }}</span>
            <span>results</span>
        </div>

        <!-- Navigation Buttons -->
        <div class="inline-flex items-center -space-x-px rounded-xl shadow-xs overflow-hidden border border-slate-200 bg-white">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-3 py-2 text-slate-300 bg-slate-50 cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-3 py-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="relative inline-flex items-center px-3.5 py-2 text-slate-400 bg-white select-none">
                        {{ $element }}
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="relative z-10 inline-flex items-center px-3.5 py-2 bg-[#27797D] text-white font-extrabold shadow-inner">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="relative inline-flex items-center px-3.5 py-2 text-slate-600 hover:text-[#27797D] hover:bg-slate-50 transition-colors">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-3 py-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            @else
                <span class="relative inline-flex items-center px-3 py-2 text-slate-300 bg-slate-50 cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            @endif
        </div>
    </nav>
@else
    <div class="text-xs text-slate-500 font-semibold">
        <span>Showing all</span>
        <span class="font-bold text-slate-800">{{ $paginator->total() }}</span>
        <span>results</span>
    </div>
@endif
