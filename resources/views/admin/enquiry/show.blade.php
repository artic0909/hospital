@extends('admin.layouts.app')

@section('title', 'Enquiry Details: ' . $enquiry->name . ' - Heal Go Fly Admin')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- Header Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.enquiries.index') }}" class="text-[#27797D] hover:underline">&larr; Back to Enquiries</a>
                <span>&bull;</span>
                <span>Enquiry #{{ $enquiry->id }}</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Patient Lead: {{ $enquiry->name }}</h1>
            <p class="text-xs text-slate-500 mt-0.5">Submitted on {{ $enquiry->created_at->format('M d, Y \a\t h:i A') }} ({{ $enquiry->created_at->diffForHumans() }})</p>
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
            <a 
                href="{{ route('admin.patient.create', ['enquiry_id' => $enquiry->id]) }}" 
                class="inline-flex items-center gap-2 bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-xs transition-all cursor-pointer"
            >
                <span>👤 Convert to Patient</span>
            </a>
            <a 
                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $enquiry->phone) }}?text={{ urlencode('Hello ' . $enquiry->name . ', this is HealGoFly patient coordinator following up on your medical enquiry.') }}" 
                target="_blank" 
                class="inline-flex items-center gap-2 bg-[#25D366] hover:bg-[#20ba59] text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-xs transition-all"
            >
                <span>💬 WhatsApp</span>
            </a>
            <a 
                href="tel:{{ $enquiry->phone }}" 
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-xs transition-all"
            >
                <span>📞 Call Now</span>
            </a>
        </div>
    </div>

    <!-- Main 2-Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <!-- Left (7 Cols): Patient Info & Medical Problem -->
        <div class="lg:col-span-7 space-y-6">
            
            <!-- Patient Contact & Profile -->
            <div class="bg-white p-6 sm:p-7 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
                <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400 pb-3 border-b border-slate-100 flex items-center justify-between">
                    <span>Patient Profile</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold border {{ $enquiry->status_badge['class'] }}">
                        {{ $enquiry->status_badge['label'] }}
                    </span>
                </h3>

                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-slate-400 block mb-0.5">Patient Name</span>
                        <strong class="text-slate-900 text-sm font-black">{{ $enquiry->name }}</strong>
                    </div>

                    <div>
                        <span class="text-slate-400 block mb-0.5">Phone Number</span>
                        <strong class="text-slate-900 text-sm font-bold font-mono">{{ $enquiry->phone }}</strong>
                    </div>

                    <div>
                        <span class="text-slate-400 block mb-0.5">Country</span>
                        <strong class="text-slate-800 font-semibold">{{ $enquiry->country ?: 'Not Specified' }}</strong>
                    </div>

                    <div>
                        <span class="text-slate-400 block mb-0.5">City</span>
                        <strong class="text-slate-800 font-semibold">{{ $enquiry->city ?: 'Not Specified' }}</strong>
                    </div>

                    <div>
                        <span class="text-slate-400 block mb-0.5">Age / Date of Birth</span>
                        <strong class="text-slate-800 font-semibold">{{ $enquiry->age_or_dob ?: 'Not Specified' }}</strong>
                    </div>

                    <div>
                        <span class="text-slate-400 block mb-0.5">Source Page</span>
                        <span class="text-slate-600 truncate block text-[11px]" title="{{ $enquiry->source_page }}">
                            {{ $enquiry->source_page ?: 'Website Form' }}
                        </span>
                    </div>
                </div>

                <!-- Problem Statement -->
                <div class="pt-4 border-t border-slate-100 space-y-2">
                    <span class="text-xs font-bold text-slate-700 block">Reported Medical Condition / Problem:</span>
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200/80 text-xs text-slate-800 leading-relaxed whitespace-pre-line font-medium">
                        {{ $enquiry->problem ?: 'No detailed condition described. Patient requested general consultation.' }}
                    </div>
                </div>
            </div>

            <!-- Internal Staff Notes Form -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
                <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400 pb-2 border-b border-slate-100">
                    Coordinator Internal Follow-up Notes
                </h3>
                <form action="{{ route('admin.enquiries.update-notes', $enquiry->id) }}" method="POST" class="space-y-3">
                    @csrf
                    <textarea 
                        name="admin_notes" 
                        rows="3" 
                        placeholder="Add notes about patient follow-up calls, medical report status, doctor quotation shared, etc..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 placeholder-slate-400 p-3 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    >{{ old('admin_notes', $enquiry->admin_notes) }}</textarea>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-[#27797D] hover:bg-[#1f6063] text-white text-xs font-bold px-4 py-2 rounded-xl transition-all cursor-pointer">
                            Save Notes
                        </button>
                    </div>
                </form>
            </div>

        </div>

        <!-- Right (5 Cols): Associated Hospital & Doctor Information (ADMIN ONLY) -->
        <div class="lg:col-span-5 space-y-6">

            <!-- Convert to Patient Action Card -->
            <div class="bg-gradient-to-br from-[#27797D] to-[#112347] text-white p-6 rounded-3xl shadow-sm space-y-3">
                <div class="flex items-center gap-2">
                    <span class="text-xl">👤</span>
                    <h3 class="text-sm font-black tracking-tight text-white">Convert Lead to Patient</h3>
                </div>
                <p class="text-[11px] text-teal-100/90 leading-relaxed">
                    Transfer this lead's name, phone, country, and clinical details into the registered patients directory with pre-filled fields.
                </p>
                <a 
                    href="{{ route('admin.patient.create', ['enquiry_id' => $enquiry->id]) }}" 
                    class="block w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold py-2.5 px-4 rounded-xl text-center shadow-md transition-all cursor-pointer"
                >
                    Proceed to Create Patient &rarr;
                </a>
            </div>

            <!-- Status Changer Card -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-3">
                <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400">
                    Lead Status
                </h3>
                <form action="{{ route('admin.enquiries.update-status', $enquiry->id) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PATCH')
                    <select 
                        name="status" 
                        class="w-full bg-slate-50 focus:bg-white text-xs text-slate-800 px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold"
                    >
                        <option value="pending" {{ $enquiry->status === 'pending' ? 'selected' : '' }}>⏳ Pending Review</option>
                        <option value="contacted" {{ $enquiry->status === 'contacted' ? 'selected' : '' }}>📞 Contacted Patient</option>
                        <option value="in_treatment" {{ $enquiry->status === 'in_treatment' ? 'selected' : '' }}>🩺 In Treatment / Hospitalized</option>
                        <option value="closed" {{ $enquiry->status === 'closed' ? 'selected' : '' }}>✅ Closed / Completed</option>
                    </select>
                    <button type="submit" class="w-full bg-[#112347] hover:bg-[#0c1830] text-white text-xs font-bold py-2.5 rounded-xl transition-all cursor-pointer">
                        Update Status
                    </button>
                </form>
            </div>

            <!-- ASSOCIATED DOCTOR DETAILS (if filled from doctor_details) -->
            @if($enquiry->doctor)
                <div class="bg-gradient-to-br from-orange-50/60 to-amber-50/40 rounded-3xl border border-orange-200/80 p-6 shadow-xs space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-orange-200/60">
                        <div class="flex items-center gap-2">
                            <span class="text-lg">👨‍⚕️</span>
                            <span class="text-xs font-extrabold uppercase tracking-wider text-[#EF7415]">
                                Requested Doctor Details
                            </span>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 bg-white px-2 py-0.5 rounded-full border border-orange-200">
                            Doctor Lead
                        </span>
                    </div>

                    <div class="space-y-3 text-xs">
                        <div>
                            <span class="text-slate-400 text-[11px] block">Doctor Name:</span>
                            <strong class="text-sm font-black text-slate-900">Dr. {{ $enquiry->doctor->name }}</strong>
                        </div>

                        <div>
                            <span class="text-slate-400 text-[11px] block">Speciality:</span>
                            <span class="font-bold text-[#27797D]">{{ $enquiry->doctor->spaciality }}</span>
                        </div>

                        @if($enquiry->doctor->designation)
                            <div>
                                <span class="text-slate-400 text-[11px] block">Designation:</span>
                                <span class="text-slate-700">{{ $enquiry->doctor->designation }}</span>
                            </div>
                        @endif

                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-orange-200/50 text-[11px]">
                            <div>
                                <span class="text-slate-400 block">Experience:</span>
                                <span class="font-bold text-slate-800">{{ $enquiry->doctor->experience }} Years</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block">OPD Fee:</span>
                                <span class="font-bold text-emerald-700">₹{{ number_format($enquiry->doctor->OPD_fee, 2) }}</span>
                            </div>
                        </div>

                        <div class="pt-2">
                            <a 
                                href="{{ route('doctor.show', $enquiry->doctor->slug) }}" 
                                target="_blank" 
                                class="inline-block text-[11px] font-bold text-[#EF7415] hover:underline"
                            >
                                View Doctor Profile on Website &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- ASSOCIATED HOSPITAL DETAILS (if filled from hospital_details or doctor_details) -->
            @if($enquiry->hospital)
                <div class="bg-gradient-to-br from-teal-50/70 to-blue-50/40 rounded-3xl border border-teal-200/80 p-6 shadow-xs space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-teal-200/60">
                        <div class="flex items-center gap-2">
                            <span class="text-lg">🏥</span>
                            <span class="text-xs font-extrabold uppercase tracking-wider text-[#27797D]">
                                Target Hospital Details
                            </span>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 bg-white px-2 py-0.5 rounded-full border border-teal-200">
                            Hospital Lead
                        </span>
                    </div>

                    <div class="space-y-3 text-xs">
                        <div>
                            <span class="text-slate-400 text-[11px] block">Hospital Name:</span>
                            <strong class="text-sm font-black text-slate-900">{{ $enquiry->hospital->name }}</strong>
                        </div>

                        @if($enquiry->hospital->category)
                            <div>
                                <span class="text-slate-400 text-[11px] block">Category:</span>
                                <span class="font-semibold text-slate-700">{{ $enquiry->hospital->category->name }}</span>
                            </div>
                        @endif

                        <div>
                            <span class="text-slate-400 text-[11px] block">Location:</span>
                            <span class="text-slate-700">
                                {{ collect([$enquiry->hospital->city?->name, $enquiry->hospital->state?->name, $enquiry->hospital->country?->name])->filter()->implode(', ') }}
                            </span>
                        </div>

                        @if($enquiry->hospital->address)
                            <div class="text-[11px] text-slate-500">
                                📍 {{ $enquiry->hospital->address }}
                            </div>
                        @endif

                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-teal-200/50 text-[11px]">
                            @if($enquiry->hospital->contact)
                                <div>
                                    <span class="text-slate-400 block">Hospital Phone:</span>
                                    <a href="tel:{{ $enquiry->hospital->contact }}" class="font-bold text-[#27797D] hover:underline">{{ $enquiry->hospital->contact }}</a>
                                </div>
                            @endif
                            @if($enquiry->hospital->no_of_bed)
                                <div>
                                    <span class="text-slate-400 block">Total Beds:</span>
                                    <span class="font-bold text-slate-800">{{ $enquiry->hospital->no_of_bed }} Beds</span>
                                </div>
                            @endif
                        </div>

                        <div class="pt-2">
                            <a 
                                href="{{ route('hospital.show', $enquiry->hospital->slug) }}" 
                                target="_blank" 
                                class="inline-block text-[11px] font-bold text-[#27797D] hover:underline"
                            >
                                View Hospital Profile on Website &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            @if(!$enquiry->hospital && !$enquiry->doctor)
                <div class="bg-slate-50 rounded-3xl border border-slate-200 p-6 text-center text-slate-500 space-y-2">
                    <span class="text-2xl">🌐</span>
                    <h4 class="text-xs font-bold text-slate-800">General Website Lead</h4>
                    <p class="text-[11px] text-slate-400">
                        This inquiry was submitted from general browsing (such as Home hero or Medical Visa). No specific doctor or hospital was pre-selected.
                    </p>
                </div>
            @endif

        </div>

    </div>

</div>
@endsection

