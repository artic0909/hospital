@extends('admin.layouts.app')

@section('title', 'Edit Workflow Step - Heal Go Fly Admin')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.how-it-works.index') }}" class="text-[#27797D] hover:underline">&larr; Back to Workflow Steps</a>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Edit Step #{{ $howItWork->step_number }}</h1>
            <p class="text-xs text-slate-500 mt-0.5">Update title, narrative, icons, and order for this workflow step.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs">
        <form action="{{ route('admin.how-it-works.update', $howItWork->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Step Number -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Step Number <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="number" 
                        name="step_number" 
                        value="{{ old('step_number', $howItWork->step_number) }}" 
                        required 
                        min="1" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                    @error('step_number') <p class="text-[11px] text-rose-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <!-- Display Order -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Sort Sequence Order
                    </label>
                    <input 
                        type="number" 
                        name="order" 
                        value="{{ old('order', $howItWork->order) }}" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>

                <!-- Title -->
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Step Title <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        value="{{ old('title', $howItWork->title) }}" 
                        required 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                    @error('title') <p class="text-[11px] text-rose-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <!-- Description -->
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Step Description <span class="text-rose-500">*</span>
                    </label>
                    <textarea 
                        name="description" 
                        rows="3" 
                        required 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >{{ old('description', $howItWork->description) }}</textarea>
                    @error('description') <p class="text-[11px] text-rose-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <!-- Icon Identifier or SVG code -->
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Icon Name / SVG / Class
                    </label>
                    <input 
                        type="text" 
                        name="icon" 
                        value="{{ old('icon', $howItWork->icon) }}" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>

                <!-- Optional Image / Illustration -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Illustration / Icon Image
                    </label>
                    @if ($howItWork->image)
                        <div class="mb-2 flex items-center gap-2 bg-slate-50 p-2 rounded-lg border border-slate-200">
                            <img src="{{ asset($howItWork->image) }}" class="w-10 h-10 object-contain rounded" alt="Step visual">
                            <span class="text-[11px] text-slate-500">Current visual active</span>
                        </div>
                    @endif
                    <input 
                        type="file" 
                        name="image" 
                        accept="image/*"
                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                    >
                </div>

                <!-- Active Toggle -->
                <div class="flex flex-col justify-end">
                    <label class="flex items-center gap-2 cursor-pointer p-2.5 bg-slate-50 border border-slate-200 rounded-xl">
                        <input 
                            type="checkbox" 
                            name="is_active" 
                            value="1" 
                            {{ old('is_active', $howItWork->is_active) ? 'checked' : '' }} 
                            class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D]"
                        >
                        <span class="text-xs font-bold text-slate-700">Publish this Step</span>
                    </label>
                </div>
            </div>

            <!-- Buttons -->
            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a 
                    href="{{ route('admin.how-it-works.index') }}" 
                    class="px-5 py-2.5 rounded-xl border border-slate-200 text-xs font-bold text-slate-600 hover:bg-slate-50 transition-colors"
                >
                    Cancel
                </a>
                <button 
                    type="submit" 
                    class="bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold px-6 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                >
                    Update Step
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

