@extends('frontend.layouts.app')

@php
    $pageCountry = $selectedCountry ? $selectedCountry->name : ($selectedHospital?->country?->name ?? 'Global');
    $pageSpec = $selectedSpeciality ? $selectedSpeciality->name : '';
@endphp

@section('title', 'Best ' . ($pageSpec ? $pageSpec . ' Specialists' : 'Doctors') . ' in ' . $pageCountry . ' - Top Rated Specialists & Surgeons | Heal Go Fly')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-50/80 border-b border-gray-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium flex-wrap">
                <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('doctors') }}" class="hover:text-[#27797D] transition-colors">Doctors</a>
                @if($selectedHospital)
                    <span class="text-gray-400">›</span>
                    <a href="{{ route('hospital.show', $selectedHospital->slug) }}" class="hover:text-[#27797D] transition-colors font-medium">
                        {{ $selectedHospital->name }}
                    </a>
                @elseif($selectedCountry)
                    <span class="text-gray-400">›</span>
                    <a href="{{ route('doctors', ['country' => $selectedCountry->name]) }}" class="hover:text-[#27797D] transition-colors font-medium">
                        {{ $selectedCountry->name }}
                    </a>
                @endif
                @if($selectedSpeciality)
                    <span class="text-gray-400">›</span>
                    <span class="text-[#27797D] font-semibold">{{ $selectedSpeciality->name }}</span>
                @elseif(!$selectedHospital && !$selectedCountry)
                    <span class="text-gray-400">›</span>
                    <span class="text-[#112347] font-semibold">All Specialists</span>
                @endif
            </nav>
        </div>
    </div>

    <!-- ==================== PAGE TITLE ==================== -->
    <div class="py-6 sm:py-9 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#112347] tracking-tight" id="page-heading">
                @if($selectedHospital)
                    Specialist Doctors at {{ $selectedHospital->name }}
                @elseif($selectedSpeciality && $selectedCountry)
                    Best {{ $selectedSpeciality->name }} in {{ $selectedCountry->name }}
                @elseif($selectedCountry)
                    Best Doctors in {{ $selectedCountry->name }}
                @elseif($selectedSpeciality)
                    Best {{ $selectedSpeciality->name }} Specialists & Surgeons
                @else
                    Best Specialist Doctors & Surgeons
                @endif
            </h1>
            <p class="text-xs sm:text-sm text-[#5a6a85] mt-2 max-w-2xl mx-auto leading-relaxed">
                @if($selectedHospital)
                    Consult top board-certified medical consultants, surgeons, and specialists practicing at {{ $selectedHospital->name }}. View doctor credentials, OPD consultation fee, surgical experience, and book appointments directly.
                @else
                    Find and consult world-class specialists and surgeons{{ $selectedCountry ? ' in ' . $selectedCountry->name : '' }}. View doctor credentials, surgical experience, patient ratings, and book appointments directly.
                @endif
            </p>
        </div>
    </div>

    <!-- ==================== MAIN CONTENT: LEFT DOCTOR CARDS & RIGHT STICKY FORM ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">
            
            <!-- ==================== LEFT COLUMN: DOCTORS LIST (SCROLLABLE) ==================== -->
            <div class="lg:col-span-8 space-y-5">
                
                <!-- Results Bar & Searchable Specialty Dropdown -->
                <div class="bg-white p-4 sm:p-5 rounded-2xl border border-gray-200/80 shadow-xs space-y-3.5">
                    
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <span class="text-sm font-bold text-gray-900">
                                Showing <span id="visible-count" class="text-[#27797D]">{{ $doctors->total() }}</span> 
                                {{ $selectedSpeciality ? $selectedSpeciality->name : 'Best Doctors' }}
                                @if($selectedHospital)
                                    at <span class="text-[#EF7415]">{{ $selectedHospital->name }}</span>
                                @elseif($selectedCountry)
                                    in {{ $selectedCountry->name }}
                                @endif
                            </span>
                            <p class="text-xs text-gray-500 mt-0.5">Board-certified specialists & surgeons with international patient expertise</p>
                        </div>

                        <!-- Searchable Specialty Dropdown Component -->
                        <div class="relative w-full sm:w-72" id="speciality-dropdown-wrapper">
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">
                                Filter by Specialist:
                            </label>

                            <!-- Trigger Button -->
                            <button 
                                type="button" 
                                id="spec-dropdown-trigger" 
                                class="w-full bg-gray-50 hover:bg-white border border-gray-200 text-gray-800 text-xs font-semibold rounded-xl px-3 py-2.5 flex items-center justify-between gap-2 focus:outline-none focus:ring-2 focus:ring-[#27797D]/20 focus:border-[#27797D] transition-all cursor-pointer shadow-2xs"
                                aria-haspopup="listbox"
                                aria-expanded="false"
                            >
                                <span class="flex items-center gap-1.5 truncate" id="spec-selected-label">
                                    <span class="text-teal-600">🩺</span>
                                    <span class="truncate">{{ $selectedSpeciality ? $selectedSpeciality->name : 'All Specialists' }}</span>
                                </span>
                                <svg class="w-4 h-4 text-gray-400 shrink-0 transition-transform duration-200" id="spec-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <!-- Dropdown Menu with Search Field -->
                            <div 
                                id="spec-dropdown-menu" 
                                class="hidden absolute left-0 right-0 top-full mt-1.5 bg-white border border-gray-200 rounded-xl shadow-xl z-50 p-2 space-y-2 text-xs"
                            >
                                <!-- Search Input inside Dropdown -->
                                <div class="relative">
                                    <input 
                                        type="text" 
                                        id="spec-search-input" 
                                        placeholder="Type to search specialist..." 
                                        class="w-full bg-gray-50 focus:bg-white text-xs text-gray-800 placeholder-gray-400 rounded-lg pl-8 pr-3 py-2 border border-gray-200 focus:border-[#27797D] focus:outline-none transition-all"
                                        autocomplete="off"
                                    >
                                    <svg class="w-3.5 h-3.5 text-gray-400 absolute left-2.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>

                                <!-- Options List -->
                                <div class="max-h-52 overflow-y-auto space-y-0.5 pr-1" id="spec-options-list">
                                    <a 
                                        href="{{ route('doctors', request()->except('speciality', 'page')) }}" 
                                        class="spec-option flex items-center justify-between px-2.5 py-2 rounded-lg hover:bg-teal-50 hover:text-[#27797D] font-semibold text-gray-700 transition-colors {{ empty(request('speciality')) || request('speciality') === 'all' ? 'bg-teal-50 text-[#27797D] font-bold' : '' }}"
                                        data-name="all specialists"
                                    >
                                        <span>All Specialists</span>
                                        @if(empty(request('speciality')) || request('speciality') === 'all')
                                            <span class="text-[#27797D]">✓</span>
                                        @endif
                                    </a>

                                    @foreach($specialities as $sp)
                                        <a 
                                            href="{{ route('doctors', array_merge(request()->except('page'), ['speciality' => $sp->name])) }}" 
                                            class="spec-option flex items-center justify-between px-2.5 py-2 rounded-lg hover:bg-teal-50 hover:text-[#27797D] font-semibold text-gray-700 transition-colors {{ request('speciality') === $sp->name ? 'bg-teal-50 text-[#27797D] font-bold' : '' }}"
                                            data-name="{{ strtolower($sp->name) }}"
                                        >
                                            <span class="truncate">{{ $sp->name }}</span>
                                            @if(request('speciality') === $sp->name)
                                                <span class="text-[#27797D] font-bold">✓</span>
                                            @endif
                                        </a>
                                    @endforeach

                                    <div id="spec-no-results" class="hidden py-4 text-center text-gray-400 text-xs">
                                        No specialist found
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Filter Badges (Hospital / Country / Specialist) -->
                    @if(request('hospital') || request('country') || (request('speciality') && request('speciality') !== 'all') || request('search'))
                        <div class="pt-2 border-t border-gray-100 flex flex-wrap items-center gap-2 text-xs">
                            <span class="text-gray-400 font-bold uppercase text-[10px] tracking-wider">Filtered:</span>
                            @if($selectedHospital)
                                <span class="inline-flex items-center gap-1.5 bg-orange-50 text-[#EF7415] border border-orange-200 px-3 py-1 rounded-full text-xs font-bold">
                                    <span>🏥 {{ $selectedHospital->name }}</span>
                                    <a href="{{ route('doctors', request()->except('hospital', 'hospital_id', 'page')) }}" class="text-orange-600 hover:text-rose-600 font-bold text-sm leading-none ml-1" title="Clear hospital filter">&times;</a>
                                </span>
                            @endif
                            @if($selectedCountry)
                                <span class="inline-flex items-center gap-1.5 bg-blue-50 text-blue-700 border border-blue-200 px-3 py-1 rounded-full text-xs font-bold">
                                    <span>🌍 {{ $selectedCountry->name }}</span>
                                    <a href="{{ route('doctors', request()->except('country', 'page')) }}" class="text-blue-600 hover:text-rose-600 font-bold text-sm leading-none ml-1" title="Clear country filter">&times;</a>
                                </span>
                            @endif
                            @if(request('speciality') && request('speciality') !== 'all')
                                <span class="inline-flex items-center gap-1.5 bg-teal-50 text-[#27797D] border border-teal-200 px-3 py-1 rounded-full text-xs font-bold">
                                    <span>🩺 {{ request('speciality') }}</span>
                                    <a href="{{ route('doctors', request()->except('speciality', 'page')) }}" class="text-teal-600 hover:text-rose-600 font-bold text-sm leading-none ml-1" title="Clear specialty filter">&times;</a>
                                </span>
                            @endif
                            @if(request('search'))
                                <span class="inline-flex items-center gap-1.5 bg-gray-100 text-gray-700 border border-gray-200 px-3 py-1 rounded-full text-xs font-bold">
                                    <span>🔍 "{{ request('search') }}"</span>
                                    <a href="{{ route('doctors', request()->except('search', 'page')) }}" class="text-gray-500 hover:text-rose-600 font-bold text-sm leading-none ml-1" title="Clear keyword">&times;</a>
                                </span>
                            @endif
                            <a href="{{ route('doctors') }}" class="text-[11px] text-gray-400 hover:text-rose-600 font-semibold underline ml-1">
                                Clear All
                            </a>
                        </div>
                    @endif

                </div>

                <!-- Doctor Cards Container -->
                <div id="doctors-list" class="space-y-5">

                    @forelse($doctors as $doctor)
                        @php
                            $doctorPhoto = $doctor->image_url 
                                ?? 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=400&q=80';
                            $hospitalLocation = collect([$doctor->hospital?->city?->name, $doctor->hospital?->country?->name])->filter()->implode(', ');
                        @endphp

                        <div class="doctor-card bg-white rounded-2xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4">
                            
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                                
                                <!-- Left: Photo, Name, Badge, Specs & Rating -->
                                <div class="md:col-span-8 flex flex-col sm:flex-row gap-4 items-start">
                                    <!-- Photo -->
                                    <div class="w-32 sm:w-36 h-36 rounded-2xl overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/70 relative group">
                                        <img src="{{ $doctorPhoto }}" 
                                             alt="{{ $doctor->name }}" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=400&q=80';">
                                        <span class="absolute bottom-1.5 right-1.5 text-[9px] font-bold bg-white/95 text-gray-700 px-1.5 py-0.5 rounded shadow-xs notranslate">
                                            HealGoFly
                                        </span>
                                    </div>

                                    <!-- Doctor Details -->
                                    <div class="space-y-1.5 flex-1 min-w-0">
                                        <div class="flex items-center gap-1.5 flex-wrap">
                                            <h2 class="text-base sm:text-lg font-bold text-[#27797D] hover:underline cursor-pointer leading-tight">
                                                <a href="{{ route('doctor.show', $doctor->slug) }}">
                                                    Dr. {{ $doctor->name }}
                                                </a>
                                            </h2>
                                            <!-- Verified Checkmark -->
                                            <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Specialist">✓</span>
                                        </div>

                                        <!-- Specialty Pill & Designation -->
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span class="inline-block bg-sky-50 text-[#27797D] text-xs font-semibold px-3 py-0.5 rounded-full border border-blue-100">
                                                {{ $doctor->spaciality }}
                                            </span>
                                            <span class="text-xs text-gray-500 font-medium">
                                                {{ $doctor->designation }}
                                            </span>
                                        </div>

                                        <!-- Specs with Subtle Gray Icons -->
                                        <div class="space-y-1.5 text-xs text-gray-600 pt-1.5">
                                            <!-- Hospital Connection ("hospital's doctors show") -->
                                            @if($doctor->hospital)
                                                <div class="flex items-center gap-2">
                                                    <span class="text-base flex-shrink-0">🏥</span>
                                                    <span>Practicing At: 
                                                        <a href="{{ route('hospital.show', $doctor->hospital->slug) }}" class="text-[#27797D] font-bold hover:underline">
                                                            {{ $doctor->hospital->name }}
                                                        </a>
                                                    </span>
                                                </div>
                                            @endif

                                            @if(!empty($hospitalLocation))
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                                    <span>{{ $hospitalLocation }}</span>
                                                </div>
                                            @endif

                                            @if($doctor->experience)
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                                    <span><strong>{{ $doctor->experience }}+ years</strong> of clinical experience</span>
                                                </div>
                                            @endif

                                            @if($doctor->OPD_fee)
                                                <div class="flex items-center gap-2">
                                                    <span class="text-gray-400 font-bold flex-shrink-0">💳</span>
                                                    <span>OPD Consultation Fee: <strong class="text-gray-900 font-bold">₹{{ number_format($doctor->OPD_fee, 2) }}</strong></span>
                                                </div>
                                            @endif

                                            @if($doctor->surgeries)
                                                <div class="flex items-center gap-2">
                                                    <span class="text-gray-400 font-bold flex-shrink-0">🔬</span>
                                                    <span class="truncate">Surgeries & Milestones: <strong class="text-gray-800 font-semibold">{{ $doctor->surgeries }}</strong></span>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Rating -->
                                        <div class="flex items-center gap-1.5 text-xs text-gray-600 pt-1">
                                            <div class="flex text-amber-500 text-sm">
                                                ★★★★★
                                            </div>
                                            <span class="font-bold text-gray-800">4.9</span>
                                            <span class="text-gray-500">(Verified Consultant)</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right: Two Action Buttons -->
                                <div class="md:col-span-4 flex flex-col justify-center space-y-2.5 pt-2 md:pt-0">
                                    <a href="{{ route('doctor.appointment') }}" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-xl shadow-xs hover:shadow text-center block transition-all">
                                        Book Consultation
                                    </a>
                                    <a href="https://wa.me/919129846542?text={{ urlencode('Hello HealGoFly, I want to consult Dr. ' . $doctor->name . ($doctor->hospital ? ' at ' . $doctor->hospital->name : '')) }}" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-xl shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>WhatsApp Doctor</span>
                                    </a>
                                </div>

                            </div>

                            <!-- Available Weekly Schedules -->
                            @if($doctor->schedules->isNotEmpty())
                                <div class="bg-gray-50/70 p-3 rounded-xl border border-gray-100 flex items-center gap-2 flex-wrap text-[11px] text-gray-600">
                                    <span class="font-bold text-[#112347] flex items-center gap-1">
                                        <span>📅 OPD Schedules:</span>
                                    </span>
                                    @foreach($doctor->schedules->take(4) as $sch)
                                        <span class="bg-white px-2 py-0.5 rounded-md border border-gray-200 font-medium">
                                            <strong>{{ $sch->day }}:</strong> {{ $sch->time_from }} - {{ $sch->time_to }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Bottom Bullet Points & Profile Link -->
                            <div class="pt-2 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-2 text-xs">
                                <div class="text-gray-500 line-clamp-1 flex-1">
                                    @if(!empty($doctor->education))
                                        <span>🎓 {!! Str::limit(strip_tags($doctor->education), 120) !!}</span>
                                    @elseif(!empty($doctor->work_experiance))
                                        <span>💼 {!! Str::limit(strip_tags($doctor->work_experiance), 120) !!}</span>
                                    @endif
                                </div>
                                <a href="{{ route('doctor.show', $doctor->slug) }}" class="text-[#27797D] hover:underline font-bold text-xs whitespace-nowrap">
                                    Full Doctor Profile &rarr;
                                </a>
                            </div>

                        </div>
                    @empty
                        <div class="bg-white rounded-2xl border border-gray-200/90 p-8 sm:p-12 text-center space-y-4">
                            <div class="w-16 h-16 rounded-full bg-teal-50 text-[#27797D] flex items-center justify-center mx-auto text-2xl font-bold">
                                👨‍⚕️
                            </div>
                            <h3 class="text-lg font-bold text-[#112347]">No Doctors Found</h3>
                            <p class="text-xs text-gray-500 max-w-md mx-auto">
                                We could not find any doctors matching your selected filters. Try clearing your filters or select a different hospital or medical speciality.
                            </p>
                            <div>
                                <a href="{{ route('doctors') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold transition-all shadow-xs">
                                    <span>View All Doctors</span>
                                    <span>&rarr;</span>
                                </a>
                            </div>
                        </div>
                    @endforelse

                </div>

                <!-- Dynamic Pagination -->
                @if($doctors->hasPages())
                    <div class="pt-6">
                        {{ $doctors->links() }}
                    </div>
                @endif

            </div>

            <!-- ==================== RIGHT COLUMN: STICKY EVALUATION FORM & TRUST ==================== -->
            <div class="lg:col-span-4 lg:sticky lg:top-20 z-30 space-y-4">
                
                <!-- The Blue "Get FREE Evaluation" Card -->
                <div id="evaluation-form" class="bg-[#27797D] rounded-2xl p-5 sm:p-6 text-white shadow-xl border border-blue-400/20">
                    
                    <!-- Header -->
                    <div class="mb-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-white p-1 flex-shrink-0">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                    <path d="M12 8v8M8 12h8"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-white tracking-tight">Consult Top Doctors</h3>
                        </div>
                        <p class="text-xs text-blue-100 mt-1">Get doctor recommendations & treatment quotes</p>
                    </div>

                    <!-- Evaluation Form -->
                    <form action="#" method="POST" class="space-y-3" onsubmit="event.preventDefault(); alert('Thank you! Your doctor consultation request has been received. Our medical team will reach out with consultant slots within 24 hours.');">
                        @csrf
                        
                        <!-- 1. Patient Name -->
                        <div>
                            <input type="text" name="patient_name" required placeholder="Patient Name" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- 2. Country Dropdown -->
                        <div class="relative">
                            <select name="country" class="w-full text-xs text-gray-900 bg-white px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415] appearance-none cursor-pointer font-medium">
                                <option value="India" {{ ($selectedCountry?->name === 'India') ? 'selected' : '' }}>India</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="United Arab Emirates" {{ ($selectedCountry?->name === 'United Arab Emirates') ? 'selected' : '' }}>United Arab Emirates</option>
                                <option value="Turkey" {{ ($selectedCountry?->name === 'Turkey') ? 'selected' : '' }}>Turkey</option>
                                <option value="Thailand" {{ ($selectedCountry?->name === 'Thailand') ? 'selected' : '' }}>Thailand</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Russia">Russia</option>
                                <option value="Other">Other Country</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>

                        <!-- 3. Phone with Country Code -->
                        <div class="flex gap-2">
                            <div class="w-16 bg-white rounded-lg flex items-center justify-center text-xs font-bold text-gray-700 px-2 flex-shrink-0">
                                +91
                            </div>
                            <input type="tel" name="phone" required placeholder="Phone / WhatsApp" class="flex-1 text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- 4. Preferred Speciality / Problem -->
                        <div>
                            <input type="text" name="preferred_speciality" value="{{ $selectedSpeciality?->name ?? '' }}" placeholder="Medical Speciality or Symptoms..." class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- 5. Medical Problem Description -->
                        <div>
                            <textarea name="problem" rows="3" placeholder="Describe the current medical diagnosis or upload reports.." class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]"></textarea>
                        </div>

                        <!-- 6. Continue Button -->
                        <button type="submit" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-sm font-bold py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 transform hover:-translate-y-0.5">
                            Request Appointment →
                        </button>
                    </form>

                    <!-- Terms & Privacy -->
                    <p class="text-[11px] text-blue-100/90 text-center mt-3 leading-snug">
                        By submitting I agree to the <a href="#terms" class="underline hover:text-white font-medium">Terms of Use</a> and <a href="#privacy" class="underline hover:text-white font-medium">Privacy Policy</a> of Heal Go Fly.
                    </p>
                </div>

                <!-- Trust Badges Below The Sticky Form -->
                <div class="bg-white rounded-xl border border-gray-200/90 p-4 space-y-3.5 shadow-xs">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0 text-red-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-gray-900">Verified Medical Board</span>
                            <span class="block text-[11px] text-gray-500">Board-certified specialists</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-2.5 border-t border-gray-100">
                        <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0 text-red-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M3 18v-6a9 9 0 0 1 18 0v6"/>
                                <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-gray-900">24/7 Consultation Support</span>
                            <span class="block text-[11px] text-gray-500">WhatsApp & Phone Assistance</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Searchable Dropdown JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const trigger = document.getElementById('spec-dropdown-trigger');
            const menu = document.getElementById('spec-dropdown-menu');
            const arrow = document.getElementById('spec-arrow');
            const searchInput = document.getElementById('spec-search-input');
            const options = document.querySelectorAll('.spec-option');
            const noResults = document.getElementById('spec-no-results');
            const wrapper = document.getElementById('speciality-dropdown-wrapper');

            if (!trigger || !menu) return;

            // Toggle Dropdown
            function toggleMenu(show) {
                const isExpanded = show !== undefined ? show : menu.classList.contains('hidden');
                if (isExpanded) {
                    menu.classList.remove('hidden');
                    arrow.classList.add('rotate-180');
                    trigger.setAttribute('aria-expanded', 'true');
                    setTimeout(() => searchInput.focus(), 50);
                } else {
                    menu.classList.add('hidden');
                    arrow.classList.remove('rotate-180');
                    trigger.setAttribute('aria-expanded', 'false');
                }
            }

            trigger.addEventListener('click', function (e) {
                e.stopPropagation();
                toggleMenu();
            });

            // Live filter options based on search input
            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    const q = this.value.trim().toLowerCase();
                    let visibleCount = 0;

                    options.forEach(opt => {
                        const name = opt.getAttribute('data-name') || '';
                        if (name.includes(q)) {
                            opt.classList.remove('hidden');
                            visibleCount++;
                        } else {
                            opt.classList.add('hidden');
                        }
                    });

                    if (noResults) {
                        if (visibleCount === 0) {
                            noResults.classList.remove('hidden');
                        } else {
                            noResults.classList.add('hidden');
                        }
                    }
                });
            }

            // Close on click outside
            document.addEventListener('click', function (e) {
                if (wrapper && !wrapper.contains(e.target)) {
                    toggleMenu(false);
                }
            });

            // Close on Escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    toggleMenu(false);
                }
            });
        });
    </script>

@endsection
