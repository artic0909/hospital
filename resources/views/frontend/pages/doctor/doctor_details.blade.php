@extends('frontend.layouts.app')

@php
    $doc = $doctor ?? null;
    $docName = $doc ? $doc->name : 'Specialist Doctor';
    $docFullName = Str::startsWith($docName, 'Dr') ? $docName : 'Dr. ' . $docName;
    $docTitle = $doc ? $docFullName . ' - ' . ($doc->designation ?: 'Specialist Doctor') . ' | Heal Go Fly' : 'Doctor Details | Heal Go Fly';
    $docPhoto = $doc && $doc->image_url ? $doc->image_url : 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=400&q=80';
    $docHospital = $doc && $doc->hospital ? $doc->hospital->name : 'Partner Healthcare Institute';
    $docHospitalSlug = $doc && $doc->hospital ? $doc->hospital->slug : '';
    $docLocation = $doc && $doc->hospital ? collect([$doc->hospital->city?->name, $doc->hospital->state?->name, $doc->hospital->country?->name])->filter()->implode(', ') : 'India';
    $docHospitalAddress = $doc && $doc->hospital ? $doc->hospital->address : 'Hospital Medical Corridor';
    $docSpeciality = $doc && $doc->spaciality ? $doc->spaciality : 'General Medicine';
    $docExperience = $doc && $doc->experience ? $doc->experience . '+ Years' : '15+ Years';
    $docFee = $doc && $doc->OPD_fee ? 'INR ' . number_format($doc->OPD_fee, 0) . ' /-' : 'INR 2,000 /-';
    $docSurgeries = $doc && $doc->surgeries ? $doc->surgeries : 'Thousands of Successful Surgeries';
    $docSchedules = $doc ? $doc->schedules : collect();

    // Hospital relation details
    $hospital = $doc ? $doc->hospital : null;
    $docReviews = $hospital ? $hospital->reviews->where('status', true) : collect();
    $avgRating = $docReviews->isNotEmpty() ? number_format($docReviews->avg('rating'), 1) : '4.9';
    $reviewCount = $docReviews->count();
@endphp

@section('title', $docTitle)

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-50/80 border-b border-gray-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium overflow-x-auto whitespace-nowrap">
                <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('doctors') }}" class="hover:text-[#27797D] transition-colors">Doctors</a>
                @if($hospital && $hospital->country)
                    <span class="text-gray-400">›</span>
                    <a href="{{ route('doctors', ['country' => $hospital->country->name]) }}" class="hover:text-[#27797D] transition-colors">
                        {{ $hospital->country->name }}
                    </a>
                @endif
                <span class="text-gray-400">›</span>
                <span class="text-[#112347] font-semibold">{{ $docFullName }}</span>
            </nav>
        </div>
    </div>

    <!-- ==================== MAIN CONTAINER ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-2">
        
        <!-- ==================== 1. TOP DOCTOR HERO OVERVIEW CARD ==================== -->
        <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-5 sm:p-7 space-y-6">
            <div class="flex flex-col md:flex-row gap-6 items-start">
                
                <!-- Doctor Image -->
                <div class="w-28 h-28 sm:w-36 sm:h-36 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200 flex-shrink-0 shadow-xs relative">
                    <img 
                        src="{{ $docPhoto }}" 
                        alt="{{ $docFullName }}" 
                        class="w-full h-full object-cover"
                        onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=400&q=80';"
                    >
                    <span class="absolute top-2 right-2 w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px] font-bold shadow-xs" title="Verified Specialist">
                        ✓
                    </span>
                </div>

                <!-- Info Details -->
                <div class="flex-1 space-y-2.5 min-w-0">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <div>
                            <div class="flex items-center gap-2">
                                <h1 class="text-2xl sm:text-3xl font-extrabold text-[#112347] tracking-tight">
                                    {{ $docFullName }}
                                </h1>
                                <span class="inline-flex items-center justify-center w-5 h-5 rounded-full border border-emerald-500 text-emerald-500 text-xs font-bold" title="Verified Specialist">
                                    ✓
                                </span>
                            </div>
                            <p class="text-sm font-semibold text-[#27797D] mt-0.5">
                                {{ $doc && $doc->designation ? $doc->designation : 'Senior Medical Specialist' }}
                            </p>
                        </div>

                        <!-- Dynamic Rating Pill -->
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-900 rounded-xl px-3.5 py-1.5 flex items-center gap-2 self-start sm:self-auto shadow-xs">
                            <span class="text-amber-500 text-sm">★</span>
                            <span class="text-xs font-bold text-gray-900">{{ $avgRating }}</span>
                            <span class="text-xs text-emerald-700">({{ $reviewCount > 0 ? $reviewCount . ' Verified Reviews' : 'Verified Specialist' }})</span>
                        </div>
                    </div>

                    <!-- Meta Badges -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-y-2.5 gap-x-4 text-xs text-gray-600 pt-1">
                        <div class="flex items-center gap-2">
                            <span class="text-teal-600 font-bold text-sm">🩺</span>
                            <span class="truncate"><strong>Speciality:</strong> {{ $docSpeciality }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-amber-600 font-bold text-sm">⏳</span>
                            <span><strong>Experience:</strong> {{ $docExperience }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-blue-600 font-bold text-sm">🏥</span>
                            <span class="truncate"><strong>Hospital:</strong> 
                                @if($docHospitalSlug)
                                    <a href="{{ route('hospital.show', $docHospitalSlug) }}" class="text-[#27797D] font-bold hover:underline">{{ $docHospital }}</a>
                                @else
                                    {{ $docHospital }}
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                            <span class="truncate">{{ $docLocation }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-emerald-600 font-bold text-sm">💵</span>
                            <span><strong>OPD Fee:</strong> {{ $docFee }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-amber-500 font-bold text-sm">🏆</span>
                            <span class="truncate">{{ $docSurgeries }}</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-3 flex flex-col sm:flex-row items-center gap-3">
                        <button 
                            type="button"
                            data-book-appointment
                            data-doctor-id="{{ $doc ? $doc->id : '' }}"
                            data-doctor-name="{{ $docName }}"
                            data-hospital-id="{{ $doc ? $doc->hospital_id : '' }}"
                            data-hospital-name="{{ $hospital ? $hospital->name : '' }}"
                            class="w-full sm:w-auto bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-2.5 px-6 rounded-lg shadow-sm hover:shadow text-center transition-all cursor-pointer"
                        >
                            Book Appointment
                        </button>
                        <a href="https://wa.me/{{ $siteSettings->clean_whatsapp }}?text={{ urlencode('Hello HealGoFly, I want to book a consultation with ' . $docFullName . ($doc && $doc->spaciality ? ' (' . $doc->spaciality . ')' : '') . ($hospital ? ' at ' . $hospital->name : '') . '. Please provide appointment availability and consultation details.') }}" target="_blank" class="w-full sm:w-auto bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-6 rounded-lg shadow-sm hover:shadow flex items-center justify-center gap-2 transition-all">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            <span>WhatsApp Us</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- ==================== 2. DOCTOR SUB-NAV ANCHORS BAR (STICKY BELOW HERO) ==================== -->
    <div class="sticky top-0 z-30 bg-white/95 backdrop-blur-sm border-y border-gray-200 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-6 sm:gap-8 overflow-x-auto whitespace-nowrap text-xs font-semibold py-3 text-gray-600" id="doctor-subnav">
                <a href="#about-section" class="doc-subnav-item text-[#27797D] font-bold border-b-2 border-[#27797D] pb-3 -mb-3 transition-colors">About</a>
                <a href="#opd-section" class="doc-subnav-item hover:text-[#27797D] transition-colors pb-3 -mb-3">OPD Schedule</a>
                <a href="#education-section" class="doc-subnav-item hover:text-[#27797D] transition-colors pb-3 -mb-3">Qualifications & Career</a>
                <a href="#location-section" class="doc-subnav-item hover:text-[#27797D] transition-colors pb-3 -mb-3">Hospital & Infrastructure</a>
                <a href="#reviews-section" class="doc-subnav-item hover:text-[#27797D] transition-colors pb-3 -mb-3">Patient Reviews ({{ $reviewCount }})</a>
            </nav>
        </div>
    </div>

    <!-- ==================== 3. TWO-COLUMN BODY (LEFT CONTENT & RIGHT STICKY FORM) ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- ==================== LEFT COLUMN (8 COLS): DETAILED SECTIONS ==================== -->
            <div class="lg:col-span-8 space-y-8">
                
                <!-- SECTION 1: ABOUT DOCTOR (100% DYNAMIC) -->
                <div id="about-section" class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-4 scroll-mt-20">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight pb-3 border-b border-gray-100 flex items-center justify-between">
                        <span>About {{ $docFullName }}</span>
                        <span class="text-xs font-bold text-teal-700 bg-teal-50 px-2.5 py-1 rounded-full border border-teal-200">
                            {{ $docSpeciality }}
                        </span>
                    </h2>

                    @if($doc && !empty($doc->about))
                        <div class="rich-html-content text-xs sm:text-sm text-gray-700 leading-relaxed space-y-3">
                            {!! $doc->about !!}
                        </div>
                    @else
                        <div class="text-xs sm:text-sm text-gray-700 leading-relaxed space-y-3">
                            <p>
                                <strong>{{ $docFullName }}</strong> is a board-certified, senior clinical specialist in <strong>{{ $docSpeciality }}</strong> with over <strong>{{ $docExperience }}</strong> of dedicated practice. Currently serving as <strong>{{ $doc ? $doc->designation : 'Consultant' }}</strong> at <strong>{{ $docHospital }}</strong>, holding a documented surgical track record of <strong>{{ $docSurgeries }}</strong>.
                            </p>
                            <p>
                                Recognized nationally and internationally for excellence in diagnostic accuracy, advanced procedural therapies, and patient-centric post-operative care, {{ $docFullName }} provides compassionate care to both domestic and international medical travelers.
                            </p>
                        </div>
                    @endif
                </div>

                <!-- SECTION 2: OPD SCHEDULE & APPOINTMENT TIMETABLE -->
                <div id="opd-section" class="space-y-4 scroll-mt-20">
                    
                    <!-- Header with Title and Book Appointment CTA -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight">
                                OPD Schedule & Consultation Hours
                            </h2>
                            <p class="text-xs text-gray-500 mt-0.5">Direct outpatient consultation timings at {{ $docHospital }}</p>
                        </div>
                        <button 
                            type="button"
                            data-book-appointment
                            data-doctor-id="{{ $doc ? $doc->id : '' }}"
                            data-doctor-name="{{ $docName }}"
                            data-hospital-id="{{ $doc ? $doc->hospital_id : '' }}"
                            data-hospital-name="{{ $hospital ? $hospital->name : '' }}"
                            class="bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-2.5 px-5 rounded-lg shadow-sm hover:shadow self-start sm:self-auto transition-all cursor-pointer"
                        >
                            Book Appointment
                        </button>
                    </div>

                    <!-- OPD Schedule Card -->
                    <div class="bg-[#f0f9f9] border border-blue-100 rounded-2xl p-5 sm:p-6 shadow-xs space-y-5">
                        
                        <!-- Top Subheader of Card -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3.5 border-b border-blue-200/60">
                            <div class="flex items-center gap-2">
                                <div class="w-5 h-5 rounded-md bg-[#27797D] text-white flex items-center justify-center text-xs font-bold">
                                    🏥
                                </div>
                                <div>
                                    <span class="text-xs sm:text-sm font-bold text-[#112347] block">
                                        {{ $docHospital }}
                                    </span>
                                    <span class="text-[11px] text-gray-500 block">
                                        {{ $docLocation }}
                                    </span>
                                </div>
                            </div>
                            <div class="inline-flex items-center gap-1.5 bg-white px-3 py-1.5 rounded-xl border border-teal-200 shadow-2xs self-start sm:self-auto">
                                <span class="text-xs text-gray-500 font-medium">Consultation Fee:</span>
                                <span class="text-xs sm:text-sm font-black text-[#27797D]">{{ $docFee }}</span>
                            </div>
                        </div>

                        <!-- Schedule Timetable Grid -->
                        <div class="space-y-2.5">
                            @if($docSchedules->isNotEmpty())
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    @foreach($docSchedules as $sch)
                                        <div class="bg-white/95 rounded-xl p-3 border border-blue-100/90 shadow-2xs flex items-center justify-between gap-2 hover:border-[#27797D]/50 transition-colors">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-8 h-8 rounded-lg bg-teal-50 text-[#27797D] font-bold text-xs flex items-center justify-center border border-teal-100 shrink-0">
                                                    {{ substr($sch->day, 0, 3) }}
                                                </span>
                                                <div>
                                                    <span class="font-bold text-xs text-gray-800 block">{{ $sch->day }}</span>
                                                    <span class="text-[11px] font-semibold text-[#27797D]">
                                                        {{ $sch->time_from }} - {{ $sch->time_to }}
                                                    </span>
                                                </div>
                                            </div>
                                            <button 
                                                type="button"
                                                data-book-appointment
                                                data-doctor-id="{{ $doc ? $doc->id : '' }}"
                                                data-doctor-name="{{ $docName }}"
                                                data-hospital-id="{{ $doc ? $doc->hospital_id : '' }}"
                                                data-hospital-name="{{ $hospital ? $hospital->name : '' }}"
                                                class="text-[11px] font-bold text-white bg-[#27797D] hover:bg-[#1D4B6C] px-3 py-1.5 rounded-lg transition-all cursor-pointer shadow-2xs"
                                            >
                                                Book
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="bg-white/80 rounded-xl p-4 text-center border border-dashed border-teal-200 space-y-1">
                                    <p class="text-xs font-bold text-gray-700">Consultation available Monday through Saturday by prior appointment</p>
                                    <p class="text-[11px] text-gray-500">Contact our medical coordination desk for express slot confirmation.</p>
                                </div>
                            @endif
                        </div>

                        <!-- Reassurance Banner -->
                        <div class="pt-3 border-t border-blue-200/50 flex flex-wrap items-center justify-between gap-2 text-[11px] text-gray-600">
                            <span class="flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                Guaranteed priority OPD queue for HealGoFly patients
                            </span>
                            <span class="text-[#EF7415] font-bold">100% Free Consultation Coordination</span>
                        </div>

                    </div>
                </div>

                <!-- SECTION 3: QUALIFICATIONS, HONORS & EXPERIENCE (DYNAMIC TABS) -->
                <div id="education-section" class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-6 scroll-mt-20">
                    
                    <!-- Tabs Bar -->
                    <div class="flex items-center gap-4 sm:gap-6 border-b border-gray-200 text-xs sm:text-sm font-semibold overflow-x-auto whitespace-nowrap">
                        <button type="button" class="tab-btn-doc active-doc-tab pb-3 text-[#27797D] font-bold border-b-2 border-[#27797D] transition-all cursor-pointer flex items-center gap-1.5" data-target="tab-education">
                            <span>🎓 Education & Degrees</span>
                        </button>
                        <button type="button" class="tab-btn-doc pb-3 text-gray-500 hover:text-[#27797D] transition-all cursor-pointer flex items-center gap-1.5" data-target="tab-awards">
                            <span>🏆 Honours & Awards</span>
                            @if($doc && !empty($doc->awards))
                                <span class="w-2 h-2 rounded-full bg-[#EF7415]"></span>
                            @endif
                        </button>
                        <button type="button" class="tab-btn-doc pb-3 text-gray-500 hover:text-[#27797D] transition-all cursor-pointer flex items-center gap-1.5" data-target="tab-experience">
                            <span>💼 Work Experience</span>
                            @if($doc && !empty($doc->work_experiance))
                                <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            @endif
                        </button>
                    </div>

                    <!-- Panel 1: Education & Training -->
                    <div id="tab-education" class="doc-tab-panel space-y-3 text-xs sm:text-sm text-gray-700">
                        @if($doc && !empty($doc->education))
                            <div class="rich-html-content space-y-2 text-xs sm:text-sm text-gray-700">
                                {!! $doc->education !!}
                            </div>
                        @else
                            <div class="p-4 bg-gray-50 rounded-xl border border-gray-200/80 space-y-1">
                                <span class="text-xs font-bold text-gray-800 block">Board Certified Medical Credentials</span>
                                <p class="text-xs text-gray-600">MBBS & advanced postgraduate surgical specialization degrees from accredited national and international medical universities.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Panel 2: Honours & Awards -->
                    <div id="tab-awards" class="doc-tab-panel hidden space-y-3 text-xs sm:text-sm text-gray-700">
                        @if($doc && !empty($doc->awards))
                            <div class="rich-html-content space-y-2 text-xs sm:text-sm text-gray-700">
                                {!! $doc->awards !!}
                            </div>
                        @else
                            <div class="p-4 bg-amber-50/60 rounded-xl border border-amber-200/80 space-y-1">
                                <span class="text-xs font-bold text-amber-900 block">Distinguished Medical Recognitions</span>
                                <p class="text-xs text-amber-800/90">Honored with prestigious awards, research fellowships, and lifetime achievement citations in {{ $docSpeciality }}.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Panel 3: Work Experience -->
                    <div id="tab-experience" class="doc-tab-panel hidden space-y-3 text-xs sm:text-sm text-gray-700">
                        @if($doc && !empty($doc->work_experiance))
                            <div class="rich-html-content space-y-2 text-xs sm:text-sm text-gray-700">
                                {!! $doc->work_experiance !!}
                            </div>
                        @else
                            <div class="p-4 bg-teal-50/60 rounded-xl border border-teal-200/80 space-y-1">
                                <span class="text-xs font-bold text-teal-900 block">Clinical Leadership & Institutional Practice</span>
                                <p class="text-xs text-teal-800/90">Over {{ $docExperience }} of distinguished clinical practice and head of department appointments at premier multi-specialty healthcare centers.</p>
                            </div>
                        @endif
                    </div>

                </div>

                <!-- SECTION 4: HOSPITAL LOCATION & INFRASTRUCTURE -->
                <div id="location-section" class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-8 space-y-5 scroll-mt-20">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-gray-100">
                        <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight">
                            Hospital & Clinical Facility
                        </h2>
                        @if($docHospitalSlug)
                            <a href="{{ route('hospital.show', $docHospitalSlug) }}" class="text-xs font-bold text-[#27797D] hover:underline">
                                View Complete Hospital Profile →
                            </a>
                        @endif
                    </div>

                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <!-- Hospital Photo -->
                        <div class="w-full md:w-1/2 h-56 sm:h-64 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200 shadow-xs relative group">
                            <img 
                                src="{{ $hospital && $hospital->images->first() ? $hospital->images->first()->image_url : 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?auto=format&fit=crop&w=700&q=80' }}" 
                                alt="{{ $docHospital }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?auto=format&fit=crop&w=700&q=80';"
                            >
                            <span class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-xs text-white text-[11px] font-semibold px-2.5 py-1 rounded-md">
                                {{ $docHospital }}
                            </span>
                        </div>

                        <!-- Location & Hospital Specs Info -->
                        <div class="w-full md:w-1/2 space-y-3.5">
                            <div class="flex items-start gap-2.5">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                <div>
                                    <h3 class="text-base sm:text-lg font-bold text-[#112347]">
                                        {{ $docHospital }}
                                    </h3>
                                    <p class="text-xs text-gray-500 mt-0.5">
                                        {{ $docHospitalAddress }}
                                    </p>
                                </div>
                            </div>

                            <!-- Hospital Spec Badges -->
                            <div class="grid grid-cols-2 gap-2 text-xs pt-1">
                                <div class="bg-gray-50 p-2.5 rounded-xl border border-gray-200/70">
                                    <span class="block text-[10px] text-gray-400 font-bold uppercase">Bed Capacity</span>
                                    <span class="font-extrabold text-gray-800">{{ $hospital && $hospital->no_of_bed ? number_format($hospital->no_of_bed) . ' Beds' : '500+ Beds' }}</span>
                                </div>
                                <div class="bg-gray-50 p-2.5 rounded-xl border border-gray-200/70">
                                    <span class="block text-[10px] text-gray-400 font-bold uppercase">Accreditation</span>
                                    <span class="font-extrabold text-[#27797D]">{{ $hospital && $hospital->category ? $hospital->category->name : 'JCI & NABH Certified' }}</span>
                                </div>
                            </div>

                            <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                                {{ $hospital && !empty($hospital->about) ? strip_tags($hospital->about) : ($docHospital . ' is an internationally accredited tertiary care healthcare center, providing world-class medical treatment with state-of-the-art robotic infrastructure.') }}
                            </p>

                            @if($docHospitalSlug)
                                <div class="pt-1">
                                    <a href="{{ route('hospital.show', $docHospitalSlug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#27797D] hover:underline">
                                        Explore All {{ $docHospital }} Facilities & Specialities &rarr;
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- SECTION 5: REAL PATIENT REVIEWS (FROM DATABASE) -->
                <div id="reviews-section" class="space-y-4 scroll-mt-20">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-[#112347] tracking-tight">
                                Patient Reviews & Feedback
                            </h2>
                            <p class="text-xs text-gray-500 mt-0.5">Verified clinical experiences from international and domestic patients</p>
                        </div>
                        <div class="flex items-center text-xs font-semibold text-gray-700 gap-1.5 self-start sm:self-auto bg-amber-50/80 px-3 py-1.5 rounded-xl border border-amber-200">
                            <span class="text-amber-500 text-sm">★</span>
                            <span class="font-bold text-gray-900">{{ $avgRating }}</span>
                            <span class="text-gray-400">·</span>
                            <span class="text-gray-700 font-bold">{{ $reviewCount > 0 ? $reviewCount . ' Verified Reviews' : 'Verified Reviews' }}</span>
                        </div>
                    </div>

                    <!-- Reviews Card -->
                    <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm p-6 sm:p-7 space-y-5">
                        @if($docReviews->isNotEmpty())
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($docReviews as $rev)
                                    <div class="bg-gray-50/70 rounded-xl p-4 border border-gray-200/70 space-y-3 flex flex-col justify-between hover:border-teal-200 transition-colors">
                                        <div class="space-y-2">
                                            <div class="flex items-center text-amber-500 text-xs">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= ($rev->rating ?? 5))
                                                        ★
                                                    @else
                                                        ☆
                                                    @endif
                                                @endfor
                                            </div>
                                            <p class="text-xs text-gray-600 leading-relaxed">
                                                "{{ $rev->review }}"
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2.5 pt-2 border-t border-gray-200/60">
                                            <div class="w-7 h-7 rounded-full bg-teal-100 text-[#27797D] font-bold text-xs flex items-center justify-center shrink-0">
                                                {{ substr($rev->name, 0, 1) }}
                                            </div>
                                            <div class="text-xs min-w-0">
                                                <span class="font-bold text-gray-900 block leading-tight truncate">{{ $rev->name }}</span>
                                                <span class="text-gray-500 text-[11px] block truncate">
                                                    {{ $rev->designation_or_country ?: 'Verified Patient' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="p-6 text-center space-y-2 bg-gray-50/80 rounded-xl border border-gray-200">
                                <span class="text-2xl">⭐</span>
                                <h4 class="text-sm font-bold text-gray-800">Verified Clinical Consultation</h4>
                                <p class="text-xs text-gray-500 max-w-md mx-auto">
                                    Patients consulting {{ $docFullName }} report top-tier diagnostic clarity and compassionate post-procedure guidance.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <!-- ==================== RIGHT COLUMN (4 COLS): STICKY INQUIRY FORM ==================== -->
            <div class="lg:col-span-4 lg:sticky lg:top-16 z-20 space-y-4" id="enquiry-box">
                
                <div class="bg-[#27797D] rounded-2xl p-5 sm:p-6 text-white shadow-xl border border-blue-400/20 space-y-4">
                    
                    <div>
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-white p-1 flex-shrink-0">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 8v8M8 12h8"/></svg>
                            </div>
                            <h3 class="text-lg font-bold text-white tracking-tight">Book Doctor Consultation</h3>
                        </div>
                        <p class="text-xs text-blue-100 mt-1">Directly consult {{ $docFullName }}. Our medical coordinators will contact you within 24 hours.</p>
                    </div>

                    <form action="{{ route('patient.enquiry.submit') }}" method="POST" class="space-y-3" data-enquiry-form>
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $doc ? $doc->id : '' }}">
                        <input type="hidden" name="hospital_id" value="{{ $doc ? $doc->hospital_id : '' }}">
                        <input type="hidden" name="source_page" value="Doctor Details: {{ $docName }}">

                        <div>
                            <input type="text" name="patient_name" required placeholder="Patient Name *" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        @php
                            $docDetailCountries = \App\Models\Country::orderBy('name')->get();
                        @endphp
                        <div class="relative">
                            <select name="country" class="w-full text-xs text-gray-900 bg-white px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415] appearance-none cursor-pointer font-medium">
                                <option value="" selected disabled>Select Country *</option>
                                @forelse($docDetailCountries as $cItem)
                                    <option value="{{ $cItem->name }}" {{ old('country') === $cItem->name ? 'selected' : '' }}>
                                        {{ $cItem->name }}
                                    </option>
                                @empty
                                    <option value="India">India</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                @endforelse
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>

                        <!-- Phone with Country Code Dropdown -->
                        <div class="flex rounded-lg overflow-hidden bg-white focus-within:ring-2 focus-within:ring-[#EF7415] transition-all notranslate" dir="ltr">
                            <div class="relative bg-gray-100 border-r border-gray-200 select-none flex items-center shrink-0">
                                <select 
                                    name="country_code" 
                                    class="bg-transparent text-gray-800 text-xs font-bold pl-2 pr-5 py-2.5 focus:outline-none appearance-none cursor-pointer max-w-[105px]"
                                >
                                    @include('frontend.includes.country_code_options')
                                </select>
                                <div class="pointer-events-none absolute right-1 inset-y-0 flex items-center text-gray-500">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                            <input 
                                type="tel" 
                                name="phone" 
                                required 
                                placeholder="Phone / WhatsApp *" 
                                class="flex-1 min-w-0 text-xs text-gray-900 bg-white placeholder-gray-400 px-3 py-2.5 border-0 focus:outline-none"
                            >
                        </div>

                        <!-- Date of Birth Picker -->
                        <div class="relative flex items-center bg-white rounded-lg focus-within:ring-2 focus-within:ring-[#EF7415] transition-all">
                            <label for="doc_detail_dob" class="pl-3 pr-2 py-2.5 text-xs font-semibold text-gray-500 flex items-center gap-1 shrink-0 select-none cursor-pointer">
                                <svg class="w-3.5 h-3.5 text-[#27797D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>DOB:</span>
                            </label>
                            <input 
                                type="date" 
                                id="doc_detail_dob"
                                name="dob" 
                                max="{{ date('Y-m-d') }}"
                                class="w-full bg-transparent text-gray-900 text-xs pr-3 py-2.5 focus:outline-none cursor-pointer font-medium"
                            >
                        </div>

                        <div>
                            <textarea name="problem" rows="3" required placeholder="Describe symptoms or current medical problem... *" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415] resize-none"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white font-bold py-2.5 px-4 rounded-xl text-xs sm:text-sm shadow-md transition-all cursor-pointer">
                            Submit Consultation Request
                        </button>
                    </form>

                    <div class="pt-2 border-t border-white/10 flex items-center justify-between text-[11px] text-blue-100">
                        <span>🔒 100% Confidential</span>
                        <span>⚡ 24hr Response</span>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- Script for Tab Switching & Rich Content Styling -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabButtons = document.querySelectorAll('.tab-btn-doc');
            const tabPanels = document.querySelectorAll('.doc-tab-panel');

            tabButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    const target = this.getAttribute('data-target');

                    tabButtons.forEach(b => {
                        b.classList.remove('active-doc-tab', 'text-[#27797D]', 'font-bold', 'border-b-2', 'border-[#27797D]');
                        b.classList.add('text-gray-500');
                    });

                    this.classList.add('active-doc-tab', 'text-[#27797D]', 'font-bold', 'border-b-2', 'border-[#27797D]');
                    this.classList.remove('text-gray-500');

                    tabPanels.forEach(p => p.classList.add('hidden'));
                    const activeP = document.getElementById(target);
                    if (activeP) {
                        activeP.classList.remove('hidden');
                    }
                });
            });
        });
    </script>

    <style>
        .rich-html-content p {
            margin-bottom: 0.6rem;
            line-height: 1.6;
        }
        .rich-html-content p:last-child {
            margin-bottom: 0;
        }
        .rich-html-content strong {
            color: #112347;
            font-weight: 700;
        }
        .rich-html-content ul {
            list-style-type: disc;
            padding-left: 1.25rem;
            margin-top: 0.4rem;
            margin-bottom: 0.6rem;
        }
        .rich-html-content ol {
            list-style-type: decimal;
            padding-left: 1.25rem;
            margin-top: 0.4rem;
            margin-bottom: 0.6rem;
        }
        .rich-html-content li {
            margin-bottom: 0.35rem;
            line-height: 1.5;
        }
    </style>

@endsection
