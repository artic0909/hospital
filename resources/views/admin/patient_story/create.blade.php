@extends('admin.layouts.app')

@section('title', 'Add Patient Story - Heal Go Fly Admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Ribbon -->
    <div class="flex items-center justify-between bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.patient-stories.index') }}" class="text-[#27797D] hover:underline">&larr; Patient Stories</a>
                <span>&bull;</span>
                <span>Create New</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Add New Patient Story</h1>
            <p class="text-xs text-slate-500 mt-0.5">Share how HealGoFly and our partner hospitals transformed a patient's life.</p>
        </div>
        <a 
            href="{{ route('admin.patient-stories.index') }}" 
            class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold px-4 py-2.5 rounded-xl transition-all"
        >
            Cancel
        </a>
    </div>

    <!-- Create Form -->
    <form action="{{ route('admin.patient-stories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Core Patient Info & Story -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-[#112347] pb-3 border-b border-slate-100 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#EF7415]"></span>
                <span>Patient Information & Testimonial</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Patient Name -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Patient Name <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}" 
                        placeholder="e.g. Michael Thornton" 
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 placeholder-slate-400 px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all @error('name') border-rose-400 @enderror"
                    >
                    @error('name')
                        <p class="text-[11px] text-rose-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Patient Origin Country -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Patient's Home Country
                    </label>
                    <input 
                        type="text" 
                        name="country" 
                        value="{{ old('country') }}" 
                        placeholder="e.g. United Kingdom, Oman, Kenya" 
                        class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 placeholder-slate-400 px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    >
                </div>
            </div>

            <!-- Story Headline / Title -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">
                    Story Headline / Summary Title
                </label>
                <input 
                    type="text" 
                    name="headline" 
                    value="{{ old('headline') }}" 
                    placeholder="e.g. Successful Double Bypass Surgery with Fast Recovery at Medanta" 
                    class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 placeholder-slate-400 px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                >
            </div>

            <!-- Full Patient Story -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">
                    Patient Story & Experience <span class="text-rose-500">*</span>
                </label>
                <textarea 
                    name="story" 
                    rows="6" 
                    placeholder="Describe their medical condition, why they chose to travel, their consultation and hospital experience, doctor care, and recovery outcome..."
                    required 
                    class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 placeholder-slate-400 p-3.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all leading-relaxed @error('story') border-rose-400 @enderror"
                >{{ old('story') }}</textarea>
                @error('story')
                    <p class="text-[11px] text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Clinical Treatment & Hospital Info -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-[#112347] pb-3 border-b border-slate-100 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#27797D]"></span>
                <span>Hospital & Clinical Details</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Treated Hospital -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Hospital Name
                    </label>
                    <input 
                        type="text" 
                        name="hospital_name" 
                        value="{{ old('hospital_name') }}" 
                        placeholder="e.g. Medanta - The Medicity, Apollo Hospitals" 
                        class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 placeholder-slate-400 px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    >
                </div>

                <!-- Procedure / Treatment -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Procedure / Medical Speciality
                    </label>
                    <input 
                        type="text" 
                        name="treatment_name" 
                        value="{{ old('treatment_name') }}" 
                        placeholder="e.g. Living Donor Liver Transplant, Robotic Knee Replacement" 
                        class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 placeholder-slate-400 px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    >
                </div>

                <!-- Patient Rating -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Patient Rating
                    </label>
                    <select 
                        name="rating" 
                        class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    >
                        <option value="5" {{ old('rating', 5) == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ 5 Stars (Exceptional)</option>
                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ 4 Stars (Very Good)</option>
                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐ 3 Stars (Good)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Media / Photos Upload -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-[#112347] pb-3 border-b border-slate-100 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                <span>Patient Photos & Gallery</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Primary Image -->
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700">
                        Primary Patient Photo
                    </label>
                    <p class="text-[11px] text-slate-400">Headshot or hospital recovery photo of the patient (JPEG, PNG, WEBP, max 5MB).</p>
                    <input 
                        type="file" 
                        name="image" 
                        accept="image/*" 
                        class="block w-full text-xs text-slate-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                    >
                    @error('image')
                        <p class="text-[11px] text-rose-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Additional Gallery Images -->
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700">
                        Additional Gallery Photos (Multiple)
                    </label>
                    <p class="text-[11px] text-slate-400">Hospital discharge photos, before/after records, or team photos with surgeons.</p>
                    <input 
                        type="file" 
                        name="images[]" 
                        multiple 
                        accept="image/*" 
                        class="block w-full text-xs text-slate-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                    >
                    @error('images')
                        <p class="text-[11px] text-rose-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Visibility & Status -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="space-y-2">
                <label class="inline-flex items-center gap-2.5 cursor-pointer">
                    <input 
                        type="checkbox" 
                        name="status" 
                        value="1" 
                        {{ old('status', '1') == '1' ? 'checked' : '' }}
                        class="w-4 h-4 text-[#27797D] rounded border-slate-300 focus:ring-[#27797D]"
                    >
                    <span class="text-xs font-bold text-slate-800">Publish Immediately (Active on Website)</span>
                </label>
                <div class="block">
                    <label class="inline-flex items-center gap-2.5 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="is_featured" 
                            value="1" 
                            {{ old('is_featured') ? 'checked' : '' }}
                            class="w-4 h-4 text-amber-500 rounded border-slate-300 focus:ring-amber-500"
                        >
                        <span class="text-xs font-bold text-slate-800">Feature this story at the top of the stories page</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a 
                    href="{{ route('admin.patient-stories.index') }}" 
                    class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold px-5 py-3 rounded-xl transition-all"
                >
                    Cancel
                </a>
                <button 
                    type="submit" 
                    class="bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold px-6 py-3 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                >
                    Save & Publish Story
                </button>
            </div>
        </div>

    </form>

</div>
@endsection

