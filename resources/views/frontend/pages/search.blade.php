@extends('frontend.layouts.app')

@section('title', (!empty($keyword) ? 'Search: "' . $keyword . '"' : 'Search Hospitals, Doctors & Specialities') . ' | Heal Go Fly')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-50/80 border-b border-gray-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium flex-wrap">
                <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-400">›</span>
                <span class="text-[#27797D] font-semibold">Search Results</span>
                @if(!empty($keyword))
                    <span class="text-gray-400">›</span>
                    <span class="text-[#112347] font-semibold truncate max-w-[200px]">"{{ $keyword }}"</span>
                @endif
            </nav>
        </div>
    </div>

    <!-- ==================== SEARCH HERO HEADER ==================== -->
    <div class="py-8 sm:py-10 bg-gradient-to-b from-white to-gray-50/60 border-b border-gray-200/70">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center space-y-4">
            <div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#112347] tracking-tight">
                    @if(!empty($keyword))
                        Results for <span class="text-[#27797D]">"{{ $keyword }}"</span>
                    @else
                        Explore Hospitals & Doctors
                    @endif
                </h1>
                <p class="text-xs sm:text-sm text-[#5a6a85] mt-1.5 max-w-xl mx-auto leading-relaxed">
                    Search multi-specialty hospitals, verified specialist doctors, clinical procedures, and accreditation worldwide.
                </p>
            </div>

            <!-- Big Search Form -->
            <form action="{{ route('search') }}" method="GET" class="relative max-w-2xl mx-auto">
                <input 
                    type="text" 
                    name="q" 
                    value="{{ $keyword }}" 
                    placeholder="Search by hospital name, doctor name, speciality, category, or city..." 
                    class="w-full bg-white text-xs sm:text-sm text-gray-800 placeholder-gray-400 rounded-2xl pl-12 pr-28 py-3.5 border-2 border-gray-200 focus:border-[#27797D] focus:ring-4 focus:ring-teal-50 focus:outline-none transition-all shadow-sm"
                    required
                >
                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <button 
                    type="submit" 
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-[#27797D] hover:bg-[#1f6266] text-white text-xs sm:text-sm font-bold px-5 py-2.5 rounded-xl shadow-xs transition-all"
                >
                    Search
                </button>
            </form>

            <!-- Navigation Filter Tabs: All, Hospitals, Doctors -->
            <div class="flex items-center justify-center gap-2 pt-2 flex-wrap">
                <a href="{{ route('search', ['q' => $keyword, 'type' => 'all']) }}" class="px-4 py-1.5 rounded-full text-xs font-bold transition-all {{ $type === 'all' ? 'bg-[#27797D] text-white shadow-xs' : 'bg-white hover:bg-gray-100 text-gray-600 border border-gray-200' }}">
                    All Results
                </a>
                <a href="{{ route('search', ['q' => $keyword, 'type' => 'hospitals']) }}" class="px-4 py-1.5 rounded-full text-xs font-bold transition-all {{ $type === 'hospitals' ? 'bg-[#27797D] text-white shadow-xs' : 'bg-white hover:bg-gray-100 text-gray-600 border border-gray-200' }}">
                    Hospitals ({{ $totalHospitals }})
                </a>
                <a href="{{ route('search', ['q' => $keyword, 'type' => 'doctors']) }}" class="px-4 py-1.5 rounded-full text-xs font-bold transition-all {{ $type === 'doctors' ? 'bg-[#27797D] text-white shadow-xs' : 'bg-white hover:bg-gray-100 text-gray-600 border border-gray-200' }}">
                    Doctors ({{ $totalDoctors }})
                </a>
            </div>
        </div>
    </div>

    <!-- ==================== SEARCH RESULTS CONTENT ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Main Results Column -->
            <div class="lg:col-span-8 space-y-8">

                <!-- 1. Matching Categories / Specialities Pills (Quick Jump) -->
                @if(($categories->isNotEmpty() || $specialities->isNotEmpty()) && $type === 'all')
                    <div class="bg-gradient-to-r from-teal-50/70 to-blue-50/50 p-4 sm:p-5 rounded-2xl border border-teal-100/80 space-y-3">
                        <span class="text-xs font-bold uppercase tracking-wider text-[#27797D] block">
                            Matched Specialities & Categories:
                        </span>
                        <div class="flex flex-wrap gap-2">
                            @foreach($specialities as $spec)
                                <a href="{{ route('doctors', ['speciality' => $spec->name]) }}" class="inline-flex items-center gap-1.5 bg-white hover:bg-[#27797D] text-gray-700 hover:text-white px-3 py-1.5 rounded-xl border border-teal-200/60 shadow-2xs text-xs font-semibold transition-all group">
                                    <span>👨‍⚕️</span>
                                    <span>{{ $spec->name }}</span>
                                    <span class="text-gray-400 group-hover:text-white">&rarr;</span>
                                </a>
                            @endforeach

                            @foreach($categories as $cat)
                                <a href="{{ route('hospitals', ['category' => $cat->name]) }}" class="inline-flex items-center gap-1.5 bg-white hover:bg-[#EF7415] text-gray-700 hover:text-white px-3 py-1.5 rounded-xl border border-orange-200/60 shadow-2xs text-xs font-semibold transition-all group">
                                    <span>🏥</span>
                                    <span>{{ $cat->name }}</span>
                                    <span class="text-gray-400 group-hover:text-white">&rarr;</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- ==================== HOSPITALS SECTION ==================== -->
                @if($type === 'all' || $type === 'hospitals')
                    <div class="space-y-4">
                        <div class="flex items-center justify-between pb-2 border-b border-gray-200">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#27797D]"></span>
                                <h2 class="text-base sm:text-lg font-bold text-[#112347]">
                                    Hospitals Matching Search
                                </h2>
                                <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-teal-50 text-[#27797D] border border-teal-200">
                                    {{ $totalHospitals }}
                                </span>
                            </div>
                            @if($type === 'all' && $totalHospitals > 6)
                                <a href="{{ route('search', ['q' => $keyword, 'type' => 'hospitals']) }}" class="text-xs font-bold text-[#27797D] hover:underline">
                                    View all {{ $totalHospitals }} hospitals &rarr;
                                </a>
                            @endif
                        </div>

                        <div class="space-y-4">
                            @forelse($hospitals as $hospital)
                                @php
                                    $thumbImage = $hospital->images->first()?->image_url 
                                        ?? 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?auto=format&fit=crop&w=400&q=80';
                                    $locationText = collect([$hospital->city?->name, $hospital->state?->name, $hospital->country?->name])->filter()->implode(', ');
                                @endphp

                                <div class="bg-white rounded-2xl border border-gray-200/90 shadow-xs hover:shadow-md transition-all duration-200 p-5 space-y-3">
                                    <div class="flex flex-col sm:flex-row gap-4 items-start">
                                        <!-- Thumbnail -->
                                        <div class="w-28 sm:w-32 h-24 sm:h-24 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/60">
                                            <img src="{{ $thumbImage }}" alt="{{ $hospital->name }}" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=400&q=80';">
                                        </div>

                                        <!-- Details -->
                                        <div class="flex-1 min-w-0 space-y-1">
                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                <h3 class="text-base font-bold text-[#27797D] hover:underline">
                                                    <a href="{{ route('hospital.show', $hospital->slug) }}">
                                                        {{ $hospital->name }}
                                                    </a>
                                                </h3>
                                                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold">✓</span>
                                                @if($hospital->category)
                                                    <span class="bg-[#EF7415] text-white text-[10px] font-bold px-2 py-0.5 rounded-full">
                                                        {{ $hospital->category->name }}
                                                    </span>
                                                @endif
                                            </div>

                                            @if(!empty($locationText))
                                                <p class="text-xs text-gray-500 flex items-center gap-1">
                                                    <svg class="w-3.5 h-3.5 text-gray-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                                    <span>{{ $locationText }}</span>
                                                </p>
                                            @endif

                                            <div class="flex items-center gap-4 text-xs text-gray-600 pt-1">
                                                @if($hospital->no_of_bed)
                                                    <span>Beds: <strong>{{ number_format($hospital->no_of_bed) }}</strong></span>
                                                @endif
                                                <span>Doctors: <strong>{{ $hospital->doctors_count }}</strong></span>
                                                <a href="{{ route('doctors', ['hospital' => $hospital->slug]) }}" class="text-[#27797D] font-bold hover:underline">
                                                    View Doctors &rarr;
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Quick CTA -->
                                        <div class="sm:self-center flex sm:flex-col gap-2 w-full sm:w-auto shrink-0 pt-2 sm:pt-0">
                                            <a href="{{ route('hospital.show', $hospital->slug) }}" class="flex-1 sm:flex-initial text-center bg-[#27797D] hover:bg-[#1f6266] text-white text-xs font-bold px-3.5 py-2 rounded-xl transition-all">
                                                Profile
                                            </a>
                                            <a href="https://wa.me/{{ $siteSettings->clean_whatsapp }}?text={{ urlencode('Hello HealGoFly, I am inquiring about medical treatment at ' . $hospital->name . ($hospital->city ? ', ' . $hospital->city->name : '')) }}" target="_blank" class="flex-1 sm:flex-initial text-center bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition-all">
                                                WhatsApp
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                @if($type === 'hospitals')
                                    <div class="bg-white rounded-2xl border border-gray-200 p-8 text-center text-gray-500 text-xs">
                                        No hospitals found matching "{{ $keyword }}".
                                    </div>
                                @endif
                            @endforelse
                        </div>

                        @if($type === 'hospitals' && $hospitals instanceof \Illuminate\Pagination\LengthAwarePaginator && $hospitals->hasPages())
                            <div class="pt-4">
                                {{ $hospitals->links() }}
                            </div>
                        @endif
                    </div>
                @endif

                <!-- ==================== DOCTORS SECTION ==================== -->
                @if($type === 'all' || $type === 'doctors')
                    <div class="space-y-4 pt-4">
                        <div class="flex items-center justify-between pb-2 border-b border-gray-200">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#EF7415]"></span>
                                <h2 class="text-base sm:text-lg font-bold text-[#112347]">
                                    Doctors & Specialists Matching Search
                                </h2>
                                <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-orange-50 text-[#EF7415] border border-orange-200">
                                    {{ $totalDoctors }}
                                </span>
                            </div>
                            @if($type === 'all' && $totalDoctors > 6)
                                <a href="{{ route('search', ['q' => $keyword, 'type' => 'doctors']) }}" class="text-xs font-bold text-[#27797D] hover:underline">
                                    View all {{ $totalDoctors }} doctors &rarr;
                                </a>
                            @endif
                        </div>

                        <div class="space-y-4">
                            @forelse($doctors as $doctor)
                                @php
                                    $doctorPhoto = $doctor->image_url 
                                        ?? 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=400&q=80';
                                    $docHospital = $doctor->hospital?->name;
                                    $docLocation = collect([$doctor->hospital?->city?->name, $doctor->hospital?->country?->name])->filter()->implode(', ');
                                @endphp

                                <div class="bg-white rounded-2xl border border-gray-200/90 shadow-xs hover:shadow-md transition-all duration-200 p-5 space-y-3">
                                    <div class="flex flex-col sm:flex-row gap-4 items-start">
                                        <!-- Photo -->
                                        <div class="w-24 sm:w-28 h-28 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/60">
                                            <img src="{{ $doctorPhoto }}" alt="{{ $doctor->name }}" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=400&q=80';">
                                        </div>

                                        <!-- Details -->
                                        <div class="flex-1 min-w-0 space-y-1">
                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                <h3 class="text-base font-bold text-[#27797D] hover:underline">
                                                    <a href="{{ route('doctor.show', $doctor->slug) }}">
                                                        Dr. {{ $doctor->name }}
                                                    </a>
                                                </h3>
                                                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold">✓</span>
                                                @if($doctor->spaciality)
                                                    <span class="bg-sky-50 text-[#27797D] text-[10px] font-bold px-2 py-0.5 rounded-full border border-sky-200">
                                                        {{ $doctor->spaciality }}
                                                    </span>
                                                @endif
                                            </div>

                                            @if($doctor->designation)
                                                <p class="text-xs text-gray-500 font-medium">
                                                    {{ $doctor->designation }}
                                                </p>
                                            @endif

                                            @if($docHospital)
                                                <p class="text-xs text-gray-600 flex items-center gap-1.5 pt-0.5">
                                                    <span>🏥</span>
                                                    <span>Practicing at: <a href="{{ route('hospital.show', $doctor->hospital->slug) }}" class="text-[#27797D] font-bold hover:underline">{{ $docHospital }}</a> {{ $docLocation ? "($docLocation)" : '' }}</span>
                                                </p>
                                            @endif

                                            <div class="flex items-center gap-4 text-xs text-gray-600 pt-1">
                                                @if($doctor->experience)
                                                    <span>Exp: <strong>{{ $doctor->experience }}+ years</strong></span>
                                                @endif
                                                @if($doctor->OPD_fee)
                                                    <span>Fee: <strong class="text-gray-900">₹{{ number_format($doctor->OPD_fee, 2) }}</strong></span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Quick CTA -->
                                        <div class="sm:self-center flex sm:flex-col gap-2 w-full sm:w-auto shrink-0 pt-2 sm:pt-0">
                                            <a href="{{ route('doctor.appointment') }}" class="flex-1 sm:flex-initial text-center bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold px-3.5 py-2 rounded-xl transition-all">
                                                Book OPD
                                            </a>
                                            <a href="https://wa.me/{{ $siteSettings->clean_whatsapp }}?text={{ urlencode('Hello HealGoFly, I want to consult Dr. ' . $doctor->name . ($doctor->spaciality ? ' (' . $doctor->spaciality . ')' : '') . ($doctor->hospital ? ' at ' . $doctor->hospital->name : '')) }}" target="_blank" class="flex-1 sm:flex-initial text-center bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition-all">
                                                WhatsApp
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                @if($type === 'doctors')
                                    <div class="bg-white rounded-2xl border border-gray-200 p-8 text-center text-gray-500 text-xs">
                                        No doctors found matching "{{ $keyword }}".
                                    </div>
                                @endif
                            @endforelse
                        </div>

                        @if($type === 'doctors' && $doctors instanceof \Illuminate\Pagination\LengthAwarePaginator && $doctors->hasPages())
                            <div class="pt-4">
                                {{ $doctors->links() }}
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Empty State if no hospitals and no doctors found -->
                @if($totalHospitals === 0 && $totalDoctors === 0)
                    <div class="bg-white rounded-3xl border border-gray-200 p-10 sm:p-14 text-center space-y-4">
                        <div class="w-16 h-16 rounded-full bg-orange-50 text-[#EF7415] flex items-center justify-center mx-auto text-2xl font-bold">
                            🔍
                        </div>
                        <h3 class="text-xl font-bold text-[#112347]">No Results Found for "{{ $keyword }}"</h3>
                        <p class="text-xs sm:text-sm text-gray-500 max-w-md mx-auto leading-relaxed">
                            We could not find any hospitals or doctors matching your keyword. Try searching with a broader term (e.g. "Cardiology", "Apollo", "Delhi", "Surgery") or browse our directories.
                        </p>
                        <div class="flex items-center justify-center gap-3 pt-2">
                            <a href="{{ route('hospitals') }}" class="px-5 py-2.5 rounded-xl bg-[#27797D] text-white text-xs font-bold hover:bg-[#1e5f62] transition-all">
                                Browse Hospitals
                            </a>
                            <a href="{{ route('doctors') }}" class="px-5 py-2.5 rounded-xl bg-[#EF7415] text-white text-xs font-bold hover:bg-[#d9640d] transition-all">
                                Browse Doctors
                            </a>
                        </div>
                    </div>
                @endif

            </div>

            <!-- Right Column: Sticky Free Evaluation Card -->
            <div class="lg:col-span-4 lg:sticky lg:top-20 z-30 space-y-5">
                
                <div class="bg-[#27797D] rounded-3xl p-6 text-white shadow-xl border border-blue-400/20">
                    <div class="mb-4">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-white/20 flex items-center justify-center text-white p-1 flex-shrink-0">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                    <path d="M12 8v8M8 12h8"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-white tracking-tight">Need Free Medical Advice?</h3>
                        </div>
                        <p class="text-xs text-blue-100 mt-1">Get customized hospital recommendations & cost quotes within 24 hours.</p>
                    </div>

                    <form action="{{ route('patient.enquiry.submit') }}" method="POST" class="space-y-3" data-enquiry-form>
                        @csrf
                        <input type="hidden" name="source_page" value="Search Page - Medical Advice Request">
                        <div>
                            <input type="text" name="name" required placeholder="Patient Full Name" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>
                        <div class="flex rounded-xl overflow-hidden bg-white focus-within:ring-2 focus-within:ring-[#EF7415] transition-all notranslate" dir="ltr">
                            <div class="relative bg-gray-100 border-r border-gray-200 select-none flex items-center shrink-0">
                                <select 
                                    name="country_code" 
                                    class="bg-transparent text-gray-800 text-xs font-bold pl-2 pr-5 py-2.5 focus:outline-none appearance-none cursor-pointer max-w-[105px]"
                                >
                                    @include('frontend.includes.country_code_options')
                                </select>
                                <div class="pointer-events-none absolute right-1 inset-y-0 flex items-center text-gray-500">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                            <input 
                                type="tel" 
                                name="phone" 
                                required 
                                placeholder="Phone number" 
                                class="flex-1 min-w-0 text-xs text-gray-900 bg-white placeholder-gray-400 px-3 py-2.5 border-0 focus:outline-none"
                            >
                        </div>
                        <div class="relative flex items-center bg-white rounded-xl focus-within:ring-2 focus-within:ring-[#EF7415] transition-all">
                            <label for="search_dob" class="pl-3 pr-2 py-2.5 text-xs font-semibold text-gray-500 flex items-center gap-1 shrink-0 select-none cursor-pointer">
                                <svg class="w-3.5 h-3.5 text-[#27797D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>DOB:</span>
                            </label>
                            <input 
                                type="date" 
                                id="search_dob"
                                name="dob" 
                                max="{{ date('Y-m-d') }}"
                                class="w-full bg-transparent text-gray-900 text-xs pr-3 py-2.5 focus:outline-none cursor-pointer font-medium"
                            >
                        </div>
                        <div>
                            <textarea name="treatment" rows="3" required placeholder="Describe condition or treatment needed..." class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-xl border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415] resize-none"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white font-bold py-2.5 px-4 rounded-xl text-xs sm:text-sm shadow-md transition-all cursor-pointer">
                            Request Free Hospital Quotes
                        </button>
                    </form>

                    <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between text-[11px] text-blue-100">
                        <span>🔒 100% Confidential</span>
                        <span>⚡ 24hr Response</span>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection

