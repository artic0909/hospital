@extends('partner.layouts.app')

@section('title', 'Partner Dashboard - Hospital Management - Heal Go Fly')

@section('content')
<div class="space-y-6 sm:space-y-8">
    
    <!-- ==================== 1. WELCOME HERO BANNER ==================== -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#112347] via-[#1D4B6C] to-[#27797D] p-6 sm:p-8 text-white shadow-xl shadow-[#112347]/10 border border-slate-700/50">
        <!-- Background Lighting Glows -->
        <div class="absolute -right-12 -bottom-12 w-72 h-72 bg-[#27797D]/30 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute right-1/3 -top-16 w-56 h-56 bg-[#EF7415]/20 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            
            <!-- Left: Avatar + Title & Meta -->
            <div class="flex items-start sm:items-center gap-4 sm:gap-5">
                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-2xl sm:text-3xl font-extrabold text-[#EF7415] shadow-inner shrink-0">
                    🏥
                </div>
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-1.5">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            Verified Hospital Partner
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white/15 text-white border border-white/20">
                            ID: #HGF-PTR-{{ str_pad($partner->id ?? 1, 5, '0', STR_PAD_LEFT) }}
                        </span>
                        @if($hospital)
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#EF7415] text-white">
                                {{ $hospital->category->name ?? 'Accredited Hospital' }}
                            </span>
                        @endif
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-black tracking-tight text-white">
                        {{ $hospital->name ?? ($partner->company_name ?? $partner->name ?? 'Hospital Partner Desk') }}
                    </h1>
                    <p class="text-teal-100 text-xs sm:text-sm mt-0.5 font-medium flex items-center gap-2 flex-wrap">
                        <span class="font-bold text-white">{{ $partner->name }} (Partner Head)</span>
                        @if($hospital && $hospital->city)
                            <span>&bull;</span>
                            <span>{{ $hospital->city->name ?? '' }}, {{ $hospital->country->name ?? $partner->country }}</span>
                        @elseif($partner->country)
                            <span>&bull;</span>
                            <span>{{ $partner->country }}</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Right: Quick Hospital Actions -->
            <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                <a 
                    href="{{ route('partner.doctor.create') }}"
                    class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white px-5 py-3 rounded-xl font-bold text-sm shadow-lg shadow-[#EF7415]/30 transition-all hover:-translate-y-0.5 cursor-pointer"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Add New Doctor</span>
                </a>

                @if($hospital && !empty($hospital->slug))
                    <a 
                        href="{{ route('hospital.show', $hospital->slug) }}" 
                        target="_blank"
                        class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 bg-white/20 hover:bg-white/30 text-white px-5 py-3 rounded-xl font-bold text-sm backdrop-blur-xs border border-white/20 transition-all hover:-translate-y-0.5"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        <span>View Public Listing</span>
                    </a>
                @endif
            </div>

        </div>
    </div>

    <!-- ==================== 2. HOSPITAL METRIC COUNTER CARDS ==================== -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        
        <!-- Doctors & OPD -->
        <a href="{{ route('partner.doctor.index') }}" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#27797D]/50 transition-all group cursor-pointer">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Doctors & OPD</span>
                <div class="w-9 h-9 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center group-hover:scale-105 transition-transform text-sm">
                    👨‍⚕️
                </div>
            </div>
            <div class="mt-2.5">
                <h3 class="text-2xl font-black text-[#112347]">{{ number_format($kpis['doctor_count']) }}</h3>
                <span class="text-[11px] font-semibold text-[#27797D] flex items-center gap-1 mt-1">
                    <span>Manage Staff &rarr;</span>
                </span>
            </div>
        </a>

        <!-- Facilities -->
        <a href="{{ route('partner.facility.index') }}" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#27797D]/50 transition-all group cursor-pointer">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Facilities</span>
                <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-105 transition-transform text-sm">
                    🏥
                </div>
            </div>
            <div class="mt-2.5">
                <h3 class="text-2xl font-black text-[#112347]">{{ number_format($kpis['facility_count']) }}</h3>
                <span class="text-[11px] font-semibold text-blue-600 flex items-center gap-1 mt-1">
                    <span>Amenities &rarr;</span>
                </span>
            </div>
        </a>

        <!-- Photos -->
        <a href="{{ route('partner.image.index') }}" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#27797D]/50 transition-all group cursor-pointer">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Photo Gallery</span>
                <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center group-hover:scale-105 transition-transform text-sm">
                    📸
                </div>
            </div>
            <div class="mt-2.5">
                <h3 class="text-2xl font-black text-[#112347]">{{ number_format($kpis['image_count']) }}</h3>
                <span class="text-[11px] font-semibold text-purple-600 flex items-center gap-1 mt-1">
                    <span>Upload Images &rarr;</span>
                </span>
            </div>
        </a>

        <!-- Services -->
        <a href="{{ route('partner.service.index') }}" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#27797D]/50 transition-all group cursor-pointer">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Services</span>
                <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-105 transition-transform text-sm">
                    🛎️
                </div>
            </div>
            <div class="mt-2.5">
                <h3 class="text-2xl font-black text-[#112347]">{{ number_format($kpis['service_count']) }}</h3>
                <span class="text-[11px] font-semibold text-emerald-600 flex items-center gap-1 mt-1">
                    <span>7 Categories &rarr;</span>
                </span>
            </div>
        </a>

        <!-- Patient Reviews -->
        <a href="{{ route('partner.review.index') }}" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#27797D]/50 transition-all group cursor-pointer">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Reviews</span>
                <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-105 transition-transform text-sm">
                    ⭐
                </div>
            </div>
            <div class="mt-2.5">
                <h3 class="text-2xl font-black text-[#112347]">{{ number_format($kpis['review_count']) }}</h3>
                <span class="text-[11px] font-semibold text-amber-600 flex items-center gap-1 mt-1">
                    <span>★ {{ $kpis['avg_rating'] }} / 5.0</span>
                </span>
            </div>
        </a>

        <!-- Infrastructure Status -->
        <a href="{{ route('partner.infrustructure.index') }}" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#27797D]/50 transition-all group cursor-pointer">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Infrastructure</span>
                <div class="w-9 h-9 rounded-xl bg-orange-50 text-[#EF7415] flex items-center justify-center group-hover:scale-105 transition-transform text-sm">
                    🏗️
                </div>
            </div>
            <div class="mt-2.5">
                <h3 class="text-2xl font-black text-[#112347]">{{ !empty($hospital?->infrustructure?->content) ? 'Active' : 'Pending' }}</h3>
                <span class="text-[11px] font-semibold text-[#EF7415] flex items-center gap-1 mt-1">
                    <span>Edit Profile &rarr;</span>
                </span>
            </div>
        </a>

    </div>

    <!-- ==================== 3. HOSPITAL MANAGEMENT CONTROL CENTER ==================== -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left: Hospital Overview Dossier -->
        <div class="lg:col-span-1 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
            <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                <div class="w-10 h-10 rounded-2xl bg-teal-50 text-[#27797D] flex items-center justify-center font-bold text-lg">
                    🏥
                </div>
                <div>
                    <h3 class="text-sm font-black text-[#112347]">Hospital Profile Information</h3>
                    <p class="text-xs text-slate-400">Core hospital registration data.</p>
                </div>
            </div>

            <div class="space-y-3.5 text-xs">
                @if($hospital)
                    <div>
                        <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Hospital Name</span>
                        <span class="font-bold text-slate-800 text-sm">{{ $hospital->name }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Category</span>
                        <span class="font-semibold text-[#27797D]">{{ $hospital->category->name ?? 'Multi-Specialty' }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Location & Address</span>
                        <p class="text-slate-700 font-medium leading-relaxed">{{ $hospital->address ?: 'Address not set' }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 pt-2 border-t border-slate-100">
                        <div>
                            <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Bed Capacity</span>
                            <span class="font-mono font-bold text-slate-800">{{ $hospital->no_of_bed ? $hospital->no_of_bed . ' Beds' : 'N/A' }}</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-[11px] font-bold uppercase tracking-wider">Established</span>
                            <span class="font-mono font-bold text-slate-800">{{ $hospital->establish_year ?: 'N/A' }}</span>
                        </div>
                    </div>
                @else
                    <div class="py-4 text-center text-slate-400 italic">
                        No hospital record is linked to your partner account. Please contact central administration.
                    </div>
                @endif
            </div>

            <!-- Quick Management Tools -->
            <div class="pt-4 border-t border-slate-100 space-y-2">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-2">Hospital Modules</span>
                <div class="grid grid-cols-2 gap-2 text-xs font-semibold">
                    <a href="{{ route('partner.doctor.index') }}" class="p-2.5 rounded-xl bg-slate-50 hover:bg-teal-50 hover:text-[#27797D] border border-slate-200 text-slate-700 transition-colors flex items-center gap-2">
                        <span>👨‍⚕️ Doctors</span>
                    </a>
                    <a href="{{ route('partner.facility.index') }}" class="p-2.5 rounded-xl bg-slate-50 hover:bg-teal-50 hover:text-[#27797D] border border-slate-200 text-slate-700 transition-colors flex items-center gap-2">
                        <span>🏥 Facilities</span>
                    </a>
                    <a href="{{ route('partner.image.index') }}" class="p-2.5 rounded-xl bg-slate-50 hover:bg-teal-50 hover:text-[#27797D] border border-slate-200 text-slate-700 transition-colors flex items-center gap-2">
                        <span>📸 Photos</span>
                    </a>
                    <a href="{{ route('partner.service.index') }}" class="p-2.5 rounded-xl bg-slate-50 hover:bg-teal-50 hover:text-[#27797D] border border-slate-200 text-slate-700 transition-colors flex items-center gap-2">
                        <span>🛎️ Services</span>
                    </a>
                    <a href="{{ route('partner.infrustructure.index') }}" class="p-2.5 rounded-xl bg-slate-50 hover:bg-teal-50 hover:text-[#27797D] border border-slate-200 text-slate-700 transition-colors flex items-center gap-2">
                        <span>🏗️ Infrastructure</span>
                    </a>
                    <a href="{{ route('partner.locationguide.index') }}" class="p-2.5 rounded-xl bg-slate-50 hover:bg-teal-50 hover:text-[#27797D] border border-slate-200 text-slate-700 transition-colors flex items-center gap-2">
                        <span>🗺️ Location</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Right: Doctors Directory Table -->
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="p-5 sm:p-6 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-black text-[#112347]">Hospital Doctors & Clinical Specialists</h3>
                        <p class="text-xs text-slate-400">Specialist doctors and surgeons listed under your hospital.</p>
                    </div>
                    <a href="{{ route('partner.doctor.create') }}" class="px-3.5 py-1.5 rounded-xl bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold transition-all shadow-xs">
                        + Add Doctor
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-100 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                <th class="py-3 px-4 sm:px-6">Doctor</th>
                                <th class="py-3 px-4">Specialty & Dept</th>
                                <th class="py-3 px-4">Experience</th>
                                <th class="py-3 px-4">OPD Fee</th>
                                <th class="py-3 px-4 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                            @forelse($doctors as $doc)
                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    <td class="py-3 px-4 sm:px-6">
                                        <div class="flex items-center gap-2.5">
                                            @if($doc->image)
                                                <img src="{{ asset($doc->image) }}" alt="{{ $doc->name }}" class="w-8 h-8 rounded-full object-cover shrink-0 border border-slate-200">
                                            @else
                                                <div class="w-8 h-8 rounded-full bg-teal-50 text-[#27797D] flex items-center justify-center font-bold text-xs shrink-0">
                                                    {{ strtoupper(substr($doc->name, 0, 1)) }}
                                                </div>
                                            @endif
                                            <div>
                                                <span class="block font-bold text-slate-900">Dr. {{ $doc->name }}</span>
                                                <span class="block text-[11px] text-slate-400">{{ $doc->designation ?: 'Specialist' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="font-bold text-[#27797D] block">{{ $doc->spaciality ?: 'Clinical Specialist' }}</span>
                                    </td>
                                    <td class="py-3 px-4 font-mono text-slate-600">
                                        {{ $doc->experience ? $doc->experience . ' Yrs' : '—' }}
                                    </td>
                                    <td class="py-3 px-4 font-bold text-slate-900 font-mono">
                                        {{ $doc->OPD_fee ? '₹' . number_format($doc->OPD_fee) : 'Free' }}
                                    </td>
                                    <td class="py-3 px-4 text-right">
                                        <a href="{{ route('partner.doctor.update', $doc->id) }}" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#27797D] hover:text-white text-slate-700 text-[11px] font-bold transition-colors inline-block">
                                            Edit &rarr;
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-slate-400">
                                        No doctors added yet. <a href="{{ route('partner.doctor.create') }}" class="text-[#27797D] font-bold underline">Add your first doctor</a>.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-3.5 bg-slate-50 border-t border-slate-100 text-right">
                    <a href="{{ route('partner.doctor.index') }}" class="text-xs font-bold text-[#27797D] hover:underline">
                        View All Doctors & OPD Schedules &rarr;
                    </a>
                </div>
            </div>

            <!-- Recent Reviews -->
            @if($recentReviews->isNotEmpty())
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-5 sm:p-6 space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                        <h3 class="text-sm font-black text-[#112347]">Recent Patient Feedback & Reviews</h3>
                        <a href="{{ route('partner.review.index') }}" class="text-xs font-bold text-[#27797D] hover:underline">
                            View All Reviews &rarr;
                        </a>
                    </div>
                    <div class="space-y-3">
                        @foreach($recentReviews as $rev)
                            <div class="p-3.5 rounded-2xl bg-slate-50/70 border border-slate-100 flex items-start justify-between gap-3 text-xs">
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="font-bold text-slate-800">{{ $rev->name ?? 'Patient' }}</span>
                                        <span class="text-amber-500 font-bold">★ {{ $rev->rating ?? 5 }}/5</span>
                                    </div>
                                    <p class="text-slate-600 leading-relaxed">{{ Str::limit($rev->review ?? '', 140) }}</p>
                                </div>
                                <span class="text-[10px] text-slate-400 font-mono shrink-0">{{ $rev->created_at?->format('M d, Y') }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>

    </div>

</div>
@endsection
