@extends('admin.layouts.app')

@section('title', 'How It Works (Workflow Steps) - Heal Go Fly Admin')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $stats['total'] }} Steps
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">How We Work (Workflow Steps)</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage the medical travel journey steps displayed on the homepage process section.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <a 
                href="{{ route('admin.how-it-works.create') }}" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add Step</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <!-- Total -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Total Steps</span>
                <span class="text-2xl sm:text-3xl font-black text-[#112347]">{{ number_format($stats['total']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
            </div>
        </div>

        <!-- Active -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Active Steps</span>
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
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Inactive Steps</span>
                <span class="text-2xl sm:text-3xl font-black text-amber-600">{{ number_format($stats['inactive']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-xs">
        <form method="GET" action="{{ route('admin.how-it-works.index') }}" class="flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ $search }}" 
                    placeholder="Search step title, description, or step number..." 
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
                    href="{{ route('admin.how-it-works.index') }}" 
                    class="bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold px-4 py-2.5 rounded-xl transition-all text-center"
                >
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Steps Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200/80 text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                        <th class="py-4 px-4 text-center w-16">Step #</th>
                        <th class="py-4 px-4">Title & Description</th>
                        <th class="py-4 px-4">Icon / Illustration</th>
                        <th class="py-4 px-4 text-center w-24">Order</th>
                        <th class="py-4 px-4 text-center">Status</th>
                        <th class="py-4 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs font-medium text-slate-700">
                    @forelse ($steps as $step)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <!-- Step Number Badge -->
                            <td class="py-4 px-4 text-center">
                                <span class="w-8 h-8 rounded-xl bg-gradient-to-br from-[#1D4B6C] to-[#27797D] text-white font-black text-xs inline-flex items-center justify-center shadow-xs">
                                    {{ $step->step_number }}
                                </span>
                            </td>

                            <!-- Title & Description -->
                            <td class="py-4 px-4 max-w-md">
                                <h3 class="text-sm font-bold text-[#112347]">
                                    {{ $step->title }}
                                </h3>
                                <p class="text-[11px] text-slate-500 line-clamp-2 mt-0.5 leading-relaxed">
                                    {{ $step->description }}
                                </p>
                            </td>

                            <!-- Icon / Image -->
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-2">
                                    @if ($step->image)
                                        <img 
                                            src="{{ asset($step->image) }}" 
                                            alt="{{ $step->title }}" 
                                            class="w-8 h-8 rounded-lg object-contain bg-slate-50 border border-slate-200 p-0.5"
                                        >
                                    @endif
                                    @if ($step->icon)
                                        <span class="px-2 py-0.5 rounded-md bg-teal-50 text-[#27797D] text-[11px] font-semibold border border-teal-200">
                                            {{ Str::limit($step->icon, 20) }}
                                        </span>
                                    @else
                                        <span class="text-slate-400 text-[11px] italic">Default Icon</span>
                                    @endif
                                </div>
                            </td>

                            <!-- Order -->
                            <td class="py-4 px-4 text-center">
                                <span class="font-bold text-slate-700">
                                    {{ $step->order }}
                                </span>
                            </td>

                            <!-- Status Toggle -->
                            <td class="py-4 px-4 text-center">
                                <form action="{{ route('admin.how-it-works.toggle-status', $step->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button 
                                        type="submit" 
                                        class="px-2.5 py-1 rounded-full text-[11px] font-bold inline-flex items-center gap-1 transition-all cursor-pointer {{ $step->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-slate-100 text-slate-500 border border-slate-200 hover:bg-slate-200' }}"
                                        title="Click to toggle status"
                                    >
                                        <span class="w-1.5 h-1.5 rounded-full {{ $step->is_active ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                        {{ $step->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-4 text-right">
                                <div class="inline-flex items-center gap-1.5">
                                    <a 
                                        href="{{ route('admin.how-it-works.edit', $step->id) }}" 
                                        class="p-2 rounded-xl text-slate-500 hover:text-[#27797D] hover:bg-teal-50 transition-colors"
                                        title="Edit Step"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                                    <form 
                                        action="{{ route('admin.how-it-works.destroy', $step->id) }}" 
                                        method="POST" 
                                        class="inline-block"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmDelete(this)"
                                            class="p-2 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors"
                                            title="Delete Step"
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
                                <svg class="w-12 h-12 mx-auto mb-3 stroke-1 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                <p class="text-sm font-semibold text-slate-600">No workflow steps found</p>
                                <p class="text-xs text-slate-400 mt-0.5">Click "Add Step" above to configure your 4-step treatment journey.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($steps->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $steps->links() }}
            </div>
        @endif
    </div>

</div>

<script>
function confirmDelete(button) {
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: 'Delete this workflow step?',
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
        if (confirm('Delete this step?')) {
            button.closest('form').submit();
        }
    }
}
</script>
@endsection

