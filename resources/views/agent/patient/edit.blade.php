@extends('agent.layouts.app')

@section('title', 'Edit Patient: ' . $patient->name . ' - Heal Go Fly Agent Portal')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Navigation -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('agent.patient.index') }}" class="text-[#27797D] hover:underline">&larr; Patients Directory</a>
                <span>&bull;</span>
                <a href="{{ route('agent.patient.view', $patient->id) }}" class="text-slate-600 hover:underline">{{ $patient->name }}</a>
                <span>&bull;</span>
                <span class="text-slate-400">Edit Profile</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Edit Patient Profile</h1>
            <p class="text-xs text-slate-500 mt-0.5">Update contact details, location, and photos for <strong>{{ $patient->name }}</strong>.</p>
        </div>

        <div class="flex items-center gap-2">
            <a 
                href="{{ route('agent.patient.view', $patient->id) }}" 
                class="px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 text-xs font-bold text-slate-700 transition-colors"
            >
                View Dossier
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <form action="{{ route('agent.patient.update.submit', $patient->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Patient Primary Information Card -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
            <div class="border-b border-slate-100 pb-4">
                <h3 class="text-base font-bold text-[#112347]">Primary Identity & Contact</h3>
                <p class="text-xs text-slate-400 mt-0.5">Update demographics and contact details.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                
                <!-- Patient Full Name -->
                <div class="sm:col-span-2">
                    <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Patient Full Name <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name', $patient->name) }}"
                        required
                        class="w-full px-4 py-3 text-xs sm:text-sm text-slate-800 bg-slate-50/70 border border-slate-200 rounded-2xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('name') border-rose-300 bg-rose-50/30 @enderror"
                    >
                    @error('name')
                        <p class="text-xs text-rose-500 font-medium mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone / WhatsApp Number -->
                <div>
                    <label for="phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Phone / WhatsApp <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="tel" 
                        name="phone" 
                        id="phone" 
                        value="{{ old('phone', $patient->phone) }}"
                        required
                        class="w-full px-4 py-3 text-xs sm:text-sm text-slate-800 bg-slate-50/70 border border-slate-200 rounded-2xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('phone') border-rose-300 bg-rose-50/30 @enderror"
                    >
                    @error('phone')
                        <p class="text-xs text-rose-500 font-medium mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Email Address <span class="text-slate-400 font-normal lowercase">(optional)</span>
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email', $patient->email) }}"
                        placeholder="patient@example.com" 
                        class="w-full px-4 py-3 text-xs sm:text-sm text-slate-800 bg-slate-50/70 border border-slate-200 rounded-2xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all @error('email') border-rose-300 bg-rose-50/30 @enderror"
                    >
                    @error('email')
                        <p class="text-xs text-rose-500 font-medium mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Country Selection -->
                <div>
                    <label for="country" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Country of Residence
                    </label>
                    <select 
                        name="country" 
                        id="country" 
                        class="w-full px-4 py-3 text-xs sm:text-sm text-slate-800 bg-slate-50/70 border border-slate-200 rounded-2xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                    >
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->name }}" {{ old('country', $patient->country) == $country->name ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('country')
                        <p class="text-xs text-rose-500 font-medium mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- State / Province -->
                <div>
                    <label for="state" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        State / Province
                    </label>
                    <input 
                        type="text" 
                        name="state" 
                        id="state" 
                        value="{{ old('state', $patient->state) }}"
                        class="w-full px-4 py-3 text-xs sm:text-sm text-slate-800 bg-slate-50/70 border border-slate-200 rounded-2xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                    >
                    @error('state')
                        <p class="text-xs text-rose-500 font-medium mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- City -->
                <div>
                    <label for="city" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        City
                    </label>
                    <input 
                        type="text" 
                        name="city" 
                        id="city" 
                        value="{{ old('city', $patient->city) }}"
                        class="w-full px-4 py-3 text-xs sm:text-sm text-slate-800 bg-slate-50/70 border border-slate-200 rounded-2xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                    >
                    @error('city')
                        <p class="text-xs text-rose-500 font-medium mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Full Street Address -->
                <div class="sm:col-span-2">
                    <label for="address" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Street Address <span class="text-slate-400 font-normal lowercase">(optional)</span>
                    </label>
                    <textarea 
                        name="address" 
                        id="address" 
                        rows="2"
                        class="w-full px-4 py-3 text-xs sm:text-sm text-slate-800 bg-slate-50/70 border border-slate-200 rounded-2xl focus:bg-white focus:outline-none focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 transition-all"
                    >{{ old('address', $patient->address) }}</textarea>
                    @error('address')
                        <p class="text-xs text-rose-500 font-medium mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        <!-- Patient Photo Card -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
            <div class="border-b border-slate-100 pb-4">
                <h3 class="text-base font-bold text-[#112347]">Patient Photo</h3>
                <p class="text-xs text-slate-400 mt-0.5">Upload a new photo to replace current photo.</p>
            </div>

            <div class="flex items-center gap-6">
                <div class="w-20 h-20 rounded-2xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-400 overflow-hidden shrink-0" id="photo-preview-container">
                    @if($patient->image && file_exists(public_path($patient->image)))
                        <img src="{{ asset($patient->image) }}" alt="{{ $patient->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-teal-50 text-[#27797D] font-bold text-lg">
                            {{ strtoupper(substr($patient->name, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div class="flex-1">
                    <input 
                        type="file" 
                        name="image" 
                        id="patient-photo-input" 
                        accept="image/*"
                        class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                        onchange="previewImage(event)"
                    >
                    <p class="text-[11px] text-slate-400 mt-1">Leave blank to keep existing photo.</p>
                </div>
            </div>
            @error('image')
                <p class="text-xs text-rose-500 font-medium mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Form Submission Button -->
        <div class="flex items-center justify-end gap-3 pt-2">
            <a 
                href="{{ route('agent.patient.view', $patient->id) }}" 
                class="px-5 py-3 rounded-2xl border border-slate-200 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 transition-colors"
            >
                Cancel
            </a>
            <button 
                type="submit" 
                class="px-6 py-3 rounded-2xl bg-gradient-to-r from-[#27797D] to-[#1D4B6C] hover:from-[#1e5f62] hover:to-[#15364e] text-white text-xs sm:text-sm font-bold shadow-md shadow-[#27797D]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer flex items-center gap-2"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                <span>Save Changes</span>
            </button>
        </div>

    </form>

</div>

@push('scripts')
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const container = document.getElementById('photo-preview-container');
                container.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
@endsection

