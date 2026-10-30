@extends('frontend.layouts.app')

@php
    $hosp = $hospital ?? null;
    $hospName = $hosp ? $hosp->name : 'Indraprastha Apollo Hospital, New Delhi';
    $hospLocation = $hosp ? collect([$hosp->city?->name, $hosp->state?->name, $hosp->country?->name])->filter()->implode(', ') : 'New Delhi, India';
    $hospEst = $hosp && $hosp->establish_year ? $hosp->establish_year : '1995';
    $hospBeds = $hosp && $hosp->no_of_bed ? number_format($hosp->no_of_bed) : '710';
    $hospCategory = $hosp && $hosp->category ? $hosp->category->name : 'Multi Specialty Hospital';
    $primaryImage = $hosp && $hosp->images->first() ? $hosp->images->first()->image_url : 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=1000&q=80';
    $hospitalDoctors = $hosp ? $hosp->doctors : collect();
    $hospitalFacilities = $hosp ? $hosp->facilities : collect();
    $hospitalServices = $hosp ? $hosp->services : collect();
    $hospitalReviews = $hosp ? $hosp->reviews : collect();
    $hospitalImages = $hosp ? $hosp->images : collect();
    $avgRating = $hospitalReviews->isNotEmpty() ? number_format($hospitalReviews->avg('rating'), 1) : '4.5';
    $reviewCount = $hospitalReviews->count();

    // Group active doctors by their specialities for this hospital
    $hospitalSpecialities = $hospitalDoctors
        ->groupBy(function ($doc) {
            return trim($doc->spaciality ?: 'General Medicine');
        })
        ->map(function ($docs, $specName) {
            $masterSpec = \App\Models\DoctorSpeciality::where('name', 'like', "%{$specName}%")
                ->orWhereRaw('? LIKE CONCAT("%", name, "%")', [$specName])
                ->first();

            return (object) [
                'name' => $specName,
                'doctors_count' => $docs->count(),
                'description' => $masterSpec?->description ?? 'Specialized clinical consultations and advanced medical care.',
                'image' => !empty($masterSpec?->image) 
                    ? (\Illuminate\Support\Str::startsWith($masterSpec->image, ['http://', 'https://']) ? $masterSpec->image : asset($masterSpec->image))
                    : asset('icons/cardio.svg'),
            ];
        })
        ->values();
@endphp

@section('title', $hospName . ' - Doctors, Cost & Facilities | Heal Go Fly')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-50/80 border-b border-gray-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium overflow-x-auto whitespace-nowrap">
                <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('hospitals') }}" class="hover:text-[#27797D] transition-colors">Hospitals</a>
                @if($hosp && $hosp->country)
                    <span class="text-gray-400">›</span>
                    <a href="{{ route('hospitals', ['country' => $hosp->country->name]) }}" class="hover:text-[#27797D] transition-colors font-medium">
                        {{ $hosp->country->name }}
                    </a>
                @endif
                <span class="text-gray-400">›</span>
                <span class="text-[#112347] font-semibold">{{ $hospName }}</span>
            </nav>
        </div>
    </div>

    <!-- ==================== MAIN CONTAINER ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 space-y-8">
        
        <!-- ==================== 1. TOP HERO OVERVIEW CARD ==================== -->
        <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-5 sm:p-7 space-y-6">
            
            <!-- Top Tag & Header Row -->
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <div class="space-y-1.5">
                    <div class="flex items-center gap-1.5 text-xs font-bold text-red-600">
                        <span class="text-amber-500 text-sm">★</span>
                        <span>You are viewing our top rated Hospital</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl lg:text-[34px] font-extrabold text-[#112347] tracking-tight leading-tight">
                        {{ $hospName }}
                    </h1>
                    <div class="flex flex-wrap items-center gap-4 text-xs text-gray-500 pt-0.5">
                        <div class="flex items-center text-amber-500 text-sm">
                            ★★★★<span class="text-amber-500">★</span>
                            <span class="text-xs font-bold text-gray-800 ml-1.5">{{ $avgRating }}</span>
                            <span class="text-gray-500 ml-1">({{ $reviewCount > 0 ? $reviewCount . ' Reviews' : 'JCI & NABH Verified' }})</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                            <span>{{ $hospLocation }}</span>
                        </div>
                    </div>
                </div>

                <!-- 96% Patients Recommendation Pill -->
                <div class="bg-emerald-50/80 border border-emerald-200 text-emerald-900 rounded-2xl px-5 py-3.5 flex items-center gap-3.5 shadow-xs self-start lg:self-auto">
                    <div class="w-9 h-9 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>
                    </div>
                    <div>
                        <span class="block text-base font-extrabold text-emerald-800 leading-none">96% Patients</span>
                        <span class="block text-xs text-emerald-600 font-medium mt-0.5">recommended this hospital</span>
                    </div>
                </div>
            </div>

            <!-- Two-Column Hero: Image + Quick Info Table -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center pt-2">
                
                <!-- Left: Big Hospital Photo -->
                <div class="lg:col-span-6 h-72 sm:h-80 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200/80 shadow-xs relative group">
                    <img 
                        src="{{ $primaryImage }}" 
                        alt="{{ $hospName }}" 
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                        onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=1000&q=80';"
                    >
                    <span class="absolute bottom-3 left-3 bg-black/60 text-white text-xs px-2.5 py-1 rounded-md backdrop-blur-xs font-medium">
                        {{ $hospName }}
                    </span>
                </div>

                <!-- Right: Quick Specs Grid (2 columns x 4 rows) -->
                <div class="lg:col-span-6 bg-gray-50/70 rounded-2xl p-5 sm:p-6 border border-gray-200/70">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-6 text-xs">
                        
                        <!-- Row 1 -->
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#27797D] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Doctors List</span>
                                <a href="#doctors-section" class="text-[#27797D] font-bold hover:underline">
                                    {{ $hospitalDoctors->count() > 0 ? $hospitalDoctors->count() . ' Specialists' : 'Click Here' }}
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#27797D] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2a8 8 0 0 0-8 8c0 5.25 8 12 8 12s8-6.75 8-12a8 8 0 0 0-8-8z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Location</span>
                                <strong class="text-gray-900 font-semibold">{{ $hospLocation }}</strong>
                            </div>
                        </div>

                        <!-- Row 2 -->
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#27797D] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Established in</span>
                                <strong class="text-gray-900 font-semibold">{{ $hospEst }}</strong>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#27797D] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Accreditations</span>
                                <div class="flex items-center gap-2 mt-0.5">
                                    <div class="flex items-center gap-1">
                                        <div class="w-5 h-5 rounded-full bg-gradient-to-tr from-amber-400 to-yellow-200 border border-amber-500 flex items-center justify-center text-amber-800 text-[8px] font-bold">★</div>
                                        <span class="font-bold text-gray-800">JCI</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <div class="w-5 h-5 rounded-full bg-teal-50 border border-teal-500 text-teal-700 flex items-center justify-center text-[8px] font-bold">✓</div>
                                        <span class="font-bold text-gray-800">NABH</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 3 -->
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#27797D] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M2 12h20"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Specialty</span>
                                <strong class="text-gray-900 font-semibold">{{ $hospCategory }}</strong>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#27797D] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Images</span>
                                <a href="#gallery-section" class="text-[#27797D] font-bold hover:underline">
                                    {{ $hospitalImages->count() > 0 ? $hospitalImages->count() . ' Photos' : 'Click Here' }}
                                </a>
                            </div>
                        </div>

                        <!-- Row 4 -->
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#27797D] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 4v16M2 8h18a2 2 0 0 1 2 2v10M2 17h20M6 8v9"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Number of beds</span>
                                <strong class="text-gray-900 font-semibold">{{ $hospBeds }}</strong>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100/70 flex items-center justify-center text-[#27797D] flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                            </div>
                            <div>
                                <span class="block text-gray-500 font-medium">Facilities</span>
                                <a href="#facilities-section" class="text-[#27797D] font-bold hover:underline">
                                    {{ $hospitalFacilities->count() > 0 ? $hospitalFacilities->count() . ' Available' : 'Click Here' }}
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Two Main Action CTAs -->
            <div class="pt-4 border-t border-gray-100 flex flex-col sm:flex-row items-center gap-3.5">
                <a href="{{ route('hospital.appointment') }}" class="w-full sm:flex-1 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-3 px-6 rounded-lg shadow-sm hover:shadow text-center transition-all">
                    Book Appointment for {{ $hospName }}
                </a>
                <a href="https://wa.me/919129846542?text={{ urlencode('Hello HealGoFly, I want to consult ' . $hospName) }}" target="_blank" class="w-full sm:w-auto bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-3 px-6 rounded-lg shadow-sm hover:shadow flex items-center justify-center gap-2 transition-all">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span>WhatsApp Us</span>
                </a>
            </div>

        </div>

        <!-- ==================== 2. TWO-COLUMN BODY (LEFT CONTENT & RIGHT STICKY FORM) ==================== -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- ==================== LEFT COLUMN (8 COLS): DETAILED SECTIONS ==================== -->
            <div class="lg:col-span-8 space-y-8">
                
                <!-- SECTION A: About Hospital -->
                <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-5">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        About {{ $hospName }}
                    </h2>

                    <div class="space-y-4 text-xs sm:text-sm text-gray-600 leading-relaxed">
                        @if($hosp && !empty($hosp->about))
                            <div class="prose max-w-none text-gray-700 text-xs sm:text-sm">
                                {!! $hosp->about !!}
                            </div>
                        @else
                            <div class="flex items-start gap-2.5">
                                <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                <span>{{ $hospName }} is one of the premier multi-super specialty hospitals in {{ $hospLocation }}, recognized globally for clinical excellence, patient-centric healthcare, and cutting-edge medical technologies.</span>
                            </div>
                        @endif

                        <div class="flex items-start gap-2.5">
                            <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                            <span>Accredited internationally with stringent NABH & JCI quality standards ensuring maximum clinical safety and exceptional patient outcomes.</span>
                        </div>

                        <!-- International Patient Services Highlight -->
                        <div class="mt-4 p-4 rounded-xl bg-blue-50/60 border border-blue-100 space-y-2">
                            <h4 class="text-xs font-bold text-[#27797D] uppercase tracking-wider">International Patient Services</h4>
                            <p class="text-xs text-gray-700 leading-relaxed">
                                {{ $hospName }} offers dedicated international assistance: 24/7 dedicated relationship managers, medical visa facilitation, complimentary airport transit, multilingual translation, and seamless post-discharge follow-ups.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- SECTION B: List Of Top Specialists at Hospital -->
                <div id="doctors-section" class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-gray-100">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight">
                                Top Medical Specialists at {{ $hospName }}
                            </h2>
                            <p class="text-xs text-gray-500 mt-0.5">Explore medical specialties and consult verified surgeons practicing at this hospital</p>
                        </div>
                        <a href="{{ route('doctors', ['hospital' => $hosp?->slug]) }}" class="text-xs font-bold text-[#27797D] hover:underline whitespace-nowrap">
                            View All Doctors ({{ $hospitalDoctors->count() }}) &rarr;
                        </a>
                    </div>

                    @if($hospitalSpecialities->isNotEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3.5">
                            @foreach($hospitalSpecialities as $specItem)
                                <a 
                                    href="{{ route('doctors', ['hospital' => $hosp?->slug, 'speciality' => $specItem->name]) }}" 
                                    class="group/item flex items-center justify-between p-3 rounded-xl border border-gray-200/80 bg-gray-50/50 hover:bg-white hover:border-[#27797D]/50 hover:shadow-md transition-all duration-200"
                                    title="View {{ $specItem->name }} doctors at {{ $hospName }}"
                                >
                                    <div class="flex items-center gap-3 min-w-0 pr-2">
                                        <!-- Specialty Icon / Image -->
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-50 to-blue-50/70 p-2 flex items-center justify-center shrink-0 border border-teal-100/70 group-hover/item:scale-105 group-hover/item:bg-teal-100/70 transition-all">
                                            <img src="{{ $specItem->image }}" alt="{{ $specItem->name }}" class="w-full h-full object-contain" onerror="this.onerror=null; this.src='{{ asset('icons/cardio.svg') }}';">
                                        </div>

                                        <!-- Specialty Title & Description -->
                                        <div class="min-w-0 flex-1">
                                            <h4 class="text-xs font-bold text-gray-800 group-hover/item:text-[#27797D] transition-colors leading-tight truncate">
                                                {{ $specItem->name }}
                                            </h4>
                                            <p class="text-[11px] text-gray-400 mt-0.5 truncate leading-none">
                                                {{ $specItem->description }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Count Badge with Arrow -->
                                    <div class="flex items-center gap-1 shrink-0">
                                        <span class="text-xs text-[#27797D] font-bold bg-teal-50 group-hover/item:bg-[#27797D] group-hover/item:text-white px-2 py-0.5 rounded-full border border-teal-200/80 transition-all">
                                            {{ $specItem->doctors_count }} {{ \Illuminate\Support\Str::plural('Doctor', $specItem->doctors_count) }}
                                        </span>
                                        <span class="text-gray-300 group-hover/item:text-[#27797D] text-xs font-bold transition-colors">›</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="p-6 text-center text-xs text-gray-500 bg-gray-50 rounded-xl">
                            Specialist consultants are available for appointment booking. Contact our medical desk for detailed doctor CVs.
                        </div>
                    @endif
                </div>

                <!-- SECTION C: Infrastructure -->
                <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-5">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        Infrastructure & Clinical Capabilities
                    </h2>

                    <div class="space-y-4 text-xs sm:text-sm text-gray-600 leading-relaxed">
                        @if($hosp && $hosp->infrustructure && !empty($hosp->infrustructure->description))
                            <div class="prose max-w-none text-gray-700 text-xs sm:text-sm">
                                {!! $hosp->infrustructure->description !!}
                            </div>
                        @else
                            <div class="flex items-start gap-2.5">
                                <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                <span>Modern modular surgical suites equipped with HEPA laminar air-flow systems to maintain 100% sterile environments.</span>
                            </div>
                            <div class="flex items-start gap-2.5">
                                <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                <span>Equipped with <strong>{{ $hospBeds }} certified patient beds</strong>, dedicated critical care units (CCU, MICU, SICU, NICU), and digital biplane catheterization laboratories.</span>
                            </div>
                            <div class="flex items-start gap-2.5">
                                <span class="text-emerald-500 font-bold text-base flex-shrink-0">✓</span>
                                <span>Advanced diagnostic imaging including 3-Tesla digital MRI, multi-slice PET-CT, and robotic surgical consoles.</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- SECTION D: Facilities at Hospital -->
                <div id="facilities-section" class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-5">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        Facilities at {{ $hospName }}
                    </h2>

                    <!-- Facilities Grid -->
                    @if($hospitalFacilities->isNotEmpty())
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            @foreach($hospitalFacilities as $facility)
                                <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3 flex items-center gap-2.5">
                                    <div class="w-7 h-7 rounded-full bg-blue-100 flex items-center justify-center text-[#27797D] text-xs shrink-0">🏥</div>
                                    <span class="text-xs font-bold text-gray-800 truncate" title="{{ $facility->name }}">{{ $facility->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#27797D] text-sm">🚑</div>
                                <span class="text-xs font-bold text-gray-800">Ambulance</span>
                            </div>
                            <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#27797D] text-sm">🩸</div>
                                <span class="text-xs font-bold text-gray-800">Blood Bank</span>
                            </div>
                            <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#27797D] text-sm">🩺</div>
                                <span class="text-xs font-bold text-gray-800">Dialysis</span>
                            </div>
                            <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#27797D] text-sm">🏥</div>
                                <span class="text-xs font-bold text-gray-800">ICU</span>
                            </div>
                            <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#27797D] text-sm">👶</div>
                                <span class="text-xs font-bold text-gray-800">NICU</span>
                            </div>
                            <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#27797D] text-sm">🔬</div>
                                <span class="text-xs font-bold text-gray-800">Operation Theater</span>
                            </div>
                            <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#27797D] text-sm">💊</div>
                                <span class="text-xs font-bold text-gray-800">Pharmacy</span>
                            </div>
                            <div class="bg-blue-50/70 border border-blue-100 rounded-xl p-3.5 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-[#27797D] text-sm">🧸</div>
                                <span class="text-xs font-bold text-gray-800">Emergency</span>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- SECTION E: Interactive Services Tabs -->
                <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-6">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                        Services at {{ $hospName }}
                    </h2>

                    @php
                        $serviceCategories = [
                            'comfort' => 'Comfort During Stay',
                            'food' => 'Food Services',
                            'money' => 'Money Matters',
                            'patient' => 'Patient Support',
                            'transport' => 'Transportation',
                            'diagnostics' => 'Diagnostics',
                            'language' => 'Language Support',
                        ];
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                        
                        <!-- Left Navigation Tabs -->
                        <div class="md:col-span-4 space-y-2" id="services-tabs">
                            @foreach($serviceCategories as $key => $catTitle)
                                <button type="button" class="service-tab {{ $loop->first ? 'active' : '' }} w-full text-left px-4 py-3 rounded-xl text-xs flex items-center justify-between transition-colors" data-category="{{ $key }}">
                                    <span>{{ $catTitle }}</span>
                                    <span class="text-sm">›</span>
                                </button>
                            @endforeach
                        </div>

                        <!-- Right Services Grid -->
                        <div class="md:col-span-8 min-h-[300px]">
                            @foreach($serviceCategories as $key => $catTitle)
                                @php
                                    $catServices = $hospitalServices->where('category', $catTitle);
                                    if ($catServices->isEmpty()) {
                                        $catServices = collect([
                                            (object)['name' => 'Dedicated International Assistance'],
                                            (object)['name' => '24/7 Concierge Support'],
                                            (object)['name' => 'Comprehensive Service Coordination'],
                                        ]);
                                    }
                                @endphp
                                <div class="service-panel {{ $loop->first ? '' : 'hidden' }} grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs text-gray-700" id="panel-{{ $key }}">
                                    @foreach($catServices as $srv)
                                        <div class="bg-blue-50/60 border border-blue-100/70 rounded-lg p-2.5 flex items-center gap-2">
                                            <span class="text-[#27797D] font-bold">✓</span>
                                            <span>{{ $srv->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

                <!-- SECTION F: Photo Gallery -->
                @if($hospitalImages->isNotEmpty())
                    <div id="gallery-section" class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-5">
                        <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100">
                            Hospital Photo Gallery
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            @foreach($hospitalImages as $gImg)
                                <div class="h-44 rounded-xl overflow-hidden bg-gray-100 border border-gray-200/80 group relative">
                                    <img src="{{ $gImg->image_url }}" alt="{{ $gImg->title ?? $hospName }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @if(!empty($gImg->title))
                                        <span class="absolute bottom-2 left-2 right-2 bg-black/60 text-white text-[11px] px-2 py-1 rounded backdrop-blur-xs truncate">
                                            {{ $gImg->title }}
                                        </span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- SECTION G: Reviews -->
                @if($hospitalReviews->isNotEmpty())
                    <div id="reviews-section" class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-5">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                            <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight">
                                Patient Reviews & Experiences
                            </h2>
                            <div class="flex items-center gap-1 text-xs text-amber-500 font-bold">
                                <span>★</span>
                                <span class="text-gray-900">{{ $avgRating }} / 5.0</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($hospitalReviews->take(4) as $rev)
                                <div class="bg-gray-50/70 rounded-xl p-4 border border-gray-200/70 space-y-2.5">
                                    <div class="flex text-amber-500 text-xs">
                                        @for($i = 0; $i < ($rev->rating ?? 5); $i++) ★ @endfor
                                    </div>
                                    <p class="text-xs text-gray-600 leading-relaxed italic">
                                        "{{ $rev->review }}"
                                    </p>
                                    <div class="text-[11px] pt-1 border-t border-gray-200/60 flex items-center justify-between">
                                        <span class="font-bold text-gray-900">{{ $rev->name }}</span>
                                        <span class="text-gray-500">{{ $rev->designation_or_country }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

            <!-- ==================== RIGHT COLUMN (4 COLS): STICKY APPOINTMENT FORM ==================== -->
            <div class="lg:col-span-4 lg:sticky lg:top-20 z-30 space-y-5">
                
                <div class="bg-[#27797D] rounded-2xl p-5 sm:p-6 text-white shadow-xl border border-blue-400/20 space-y-4">
                    <div class="mb-3">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-white p-1 flex-shrink-0">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 8v8M8 12h8"/></svg>
                            </div>
                            <h3 class="text-lg font-bold text-white tracking-tight">Consult {{ Str::limit($hospName, 22) }}</h3>
                        </div>
                        <p class="text-xs text-blue-100 mt-1">Get free cost estimates & doctor consultation within 24 hours.</p>
                    </div>

                    <form action="#" method="POST" class="space-y-3" onsubmit="event.preventDefault(); alert('Thank you! Your inquiry for {{ addslashes($hospName) }} has been submitted. Our team will contact you shortly.');">
                        @csrf
                        <input type="text" name="patient_name" required placeholder="Patient Name" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        <input type="email" name="email" required placeholder="Email Address" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        <input type="tel" name="phone" required placeholder="Phone / WhatsApp (+Country Code)" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        <textarea name="message" rows="3" required placeholder="Describe condition or medical inquiry..." class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415] resize-none"></textarea>
                        
                        <button type="submit" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white font-bold py-2.5 px-4 rounded-xl text-xs sm:text-sm shadow-md transition-all">
                            Submit Consultation Request
                        </button>
                    </form>

                    <div class="pt-3 border-t border-white/10 flex items-center justify-between text-[11px] text-blue-100">
                        <span>🔒 100% Confidential</span>
                        <span>⚡ Quick Response</span>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Script for Service Tabs -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.service-tab');
            const panels = document.querySelectorAll('.service-panel');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const cat = this.getAttribute('data-category');
                    tabs.forEach(t => t.classList.remove('active', 'bg-[#27797D]', 'text-white'));
                    this.classList.add('active');

                    panels.forEach(p => p.classList.add('hidden'));
                    const targetPanel = document.getElementById('panel-' + cat);
                    if (targetPanel) {
                        targetPanel.classList.remove('hidden');
                    }
                });
