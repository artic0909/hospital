@extends('admin.layouts.app')

@section('title', 'Patient Stories & Testimonials - Heal Go Fly Admin')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $stats['total'] }} Stories
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Patient Stories & Testimonials</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage inspiring international patient journeys, clinical outcomes, and hospital experiences.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <a 
                href="{{ route('admin.patient-stories.create') }}" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add Patient Story</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <!-- Total -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Total Stories</span>
                <span class="text-2xl sm:text-3xl font-black text-[#112347]">{{ number_format($stats['total']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </div>

        <!-- Active -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Active on Site</span>
                <span class="text-2xl sm:text-3xl font-black text-emerald-600">{{ number_format($stats['active']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>

        <!-- Featured -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Featured Highlights</span>
                <span class="text-2xl sm:text-3xl font-black text-amber-500">{{ number_format($stats['featured']) }}</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs">
        <form method="GET" action="{{ route('admin.patient-stories.index') }}" class="flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ $search }}" 
                    placeholder="Search by patient name, country, hospital, or treatment..." 
                    class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 placeholder-slate-400 pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                >
            </div>

            <div class="w-full sm:w-48">
                <select 
                    name="status" 
                    class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    onchange="this.form.submit()"
                >
                    <option value="">All Statuses</option>
                    <option value="1" {{ $status === '1' ? 'selected' : '' }}>Active Only</option>
                    <option value="0" {{ $status === '0' ? 'selected' : '' }}>Inactive Only</option>
                </select>
            </div>

            <button type="submit" class="bg-[#27797D] hover:bg-[#1f6063] text-white text-xs font-bold px-5 py-2.5 rounded-xl transition-all cursor-pointer">
                Filter
            </button>

            @if($search || $status !== null && $status !== '')
                <a href="{{ route('admin.patient-stories.index') }}" class="inline-flex items-center justify-center bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold px-4 py-2.5 rounded-xl transition-all">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Stories Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-200/80 bg-slate-50/60 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-3.5 px-5">Patient & Photo</th>
                        <th class="py-3.5 px-5">Headline & Story Preview</th>
                        <th class="py-3.5 px-5">Hospital & Treatment</th>
                        <th class="py-3.5 px-4 text-center">Status</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse ($stories as $story)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <!-- Patient Photo & Name -->
                            <td class="py-4 px-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 shrink-0">
                                        <img src="{{ $story->image_url }}" alt="{{ $story->name }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="min-w-0">
                                        <div class="font-extrabold text-[#112347] flex items-center gap-1.5">
                                            <span>{{ $story->name }}</span>
                                            @if($story->is_featured)
                                                <span class="inline-flex items-center text-[10px] bg-amber-50 text-amber-700 border border-amber-200 px-1.5 py-0.2 rounded font-bold">Featured</span>
                                            @endif
                                        </div>
                                        <div class="text-[11px] text-slate-400 mt-0.5 flex items-center gap-1">
                                            <span>🌍</span>
                                            <span>{{ $story->country ?: 'International' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Headline & Story -->
                            <td class="py-4 px-5 max-w-sm">
                                <div class="font-bold text-slate-800 line-clamp-1 mb-1">
                                    {{ $story->headline ?: 'Patient Treatment Experience' }}
                                </div>
                                <p class="text-[11px] text-slate-500 line-clamp-2 leading-relaxed">
                                    {{ $story->story }}
                                </p>
                            </td>

                            <!-- Hospital & Treatment -->
                            <td class="py-4 px-5">
                                <div class="space-y-1">
                                    <span class="inline-block text-[11px] font-bold text-[#27797D] bg-teal-50 px-2 py-0.5 rounded-lg border border-teal-100">
                                        🏥 {{ $story->hospital_name ?: 'Partner Hospital' }}
                                    </span>
                                    @if($story->treatment_name)
                                        <div class="text-[11px] text-slate-500">
                                            🩺 {{ $story->treatment_name }}
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <!-- Status Toggle -->
                            <td class="py-4 px-4 text-center">
                                <form action="{{ route('admin.patient-stories.toggle-status', $story->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button 
                                        type="submit" 
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold cursor-pointer transition-all {{ $story->status ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-slate-100 text-slate-600 border border-slate-200 hover:bg-slate-200' }}"
                                        title="Click to toggle active status"
                                    >
                                        <span class="w-1.5 h-1.5 rounded-full {{ $story->status ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                        <span>{{ $story->status ? 'Active' : 'Inactive' }}</span>
                                    </button>
                                </form>
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a 
                                        href="{{ route('admin.patient-stories.edit', $story->id) }}" 
                                        class="p-2 text-slate-500 hover:text-[#27797D] hover:bg-teal-50 rounded-xl transition-all"
                                        title="Edit Patient Story"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                                    <form 
                                        action="{{ route('admin.patient-stories.destroy', $story->id) }}" 
                                        method="POST" 
                                        onsubmit="return confirm('Are you sure you want to delete this patient story? This action cannot be undone.');"
                                        class="inline"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all cursor-pointer"
                                            title="Delete Story"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400">
                                <div class="max-w-xs mx-auto space-y-2">
                                    <div class="text-3xl">💬</div>
                                    <p class="font-semibold text-slate-700">No patient stories found</p>
                                    <p class="text-[11px] text-slate-400">Add authentic patient experiences to establish clinical trust for prospective international patients.</p>
                                    <a href="{{ route('admin.patient-stories.create') }}" class="inline-block mt-2 text-xs font-bold text-[#27797D] underline">
                                        + Add the first story
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($stories->hasPages())
            <div class="p-5 border-t border-slate-100">
                {{ $stories->links() }}
            </div>
        @endif
    </div>

</div>
@endsection

