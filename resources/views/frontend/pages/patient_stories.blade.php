@extends('frontend.layouts.app')

@section('title', 'Patient Stories & Treatment Experiences - Real Patient Reviews | Heal Go Fly')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-100/80 border-b border-gray-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs font-medium text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-800 font-semibold">Patient Stories</span>
            </nav>
        </div>
    </div>

    <!-- ==================== HERO SECTION ==================== -->
    <div class="bg-gradient-to-b from-teal-50/70 via-white to-gray-50/40 border-b border-gray-200/70 py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#EF7415]/10 text-[#EF7415] border border-[#EF7415]/20 text-xs font-extrabold tracking-wide">
                    <span>❤️</span>
                    <span>Real Patient Journeys & Clinical Outcomes</span>
                </div>

                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-[#112347] tracking-tight leading-tight">
                    Real Stories. Real Healing. <br class="hidden sm:inline">
                    <span class="text-[#27797D]">Real Peace of Mind.</span>
                </h1>

                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Read authentic testimonials from patients worldwide who traveled abroad for complex surgeries, organ transplants, cancer care, and joint replacements with HealGoFly's end-to-end guidance.
                </p>

                <!-- Quick Stats Strip -->
                <div class="pt-2 flex flex-wrap items-center gap-6 text-xs text-gray-600">
                    <div class="flex items-center gap-2">
                        <span class="font-extrabold text-[#112347] text-base">15,000+</span>
                        <span class="text-gray-500">Patients Assisted</span>
                    </div>
                    <div class="w-px h-4 bg-gray-300"></div>
                    <div class="flex items-center gap-2">
                        <span class="font-extrabold text-emerald-600 text-base">98.6%</span>
                        <span class="text-gray-500">Satisfaction Rate</span>
                    </div>
                    <div class="w-px h-4 bg-gray-300"></div>
                    <div class="flex items-center gap-2">
                        <span class="font-extrabold text-[#27797D] text-base">20+</span>
                        <span class="text-gray-500">JCI / NABH Hospitals</span>
                    </div>
                </div>

                <!-- CTAs -->
                <div class="pt-3 flex flex-wrap items-center gap-3">
                    <a href="https://wa.me/919129846542?text={{ urlencode('Hello HealGoFly, I read your patient stories and would like to consult a doctor for my treatment.') }}" target="_blank" class="inline-flex items-center gap-2 bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold px-6 py-3 rounded-xl shadow-sm hover:shadow transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>Chat With Patient Coordinator</span>
                    </a>
                    <a href="{{ route('hospital.appointment') }}" class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-6 py-3 rounded-xl shadow-sm hover:shadow transition-all">
                        <span>Get Free Treatment Cost Estimate</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== MAIN CONTENT ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10">

        <!-- Filter & Search Toolbar -->
        <div class="bg-white p-5 rounded-2xl border border-gray-200/90 shadow-xs">
            <form method="GET" action="{{ route('patient.stories') }}" class="flex flex-col md:flex-row items-stretch md:items-center gap-3">
                <!-- Search Keyword -->
                <div class="relative flex-1">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Search by patient name, country, surgery, or hospital..." 
                        class="w-full bg-gray-50 focus:bg-white text-xs text-gray-800 placeholder-gray-400 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#27797D] focus:outline-none transition-all"
                    >
                </div>

                <!-- Filter by Country -->
                @if(isset($countries) && $countries->isNotEmpty())
                    <div class="w-full md:w-52">
                        <select 
                            name="country" 
                            class="w-full bg-gray-50 focus:bg-white text-xs text-gray-800 px-3 py-2.5 rounded-xl border border-gray-200 focus:border-[#27797D] focus:outline-none transition-all cursor-pointer"
                            onchange="this.form.submit()"
                        >
                            <option value="">All Patient Countries</option>
                            @foreach($countries as $cnt)
                                <option value="{{ $cnt }}" {{ request('country') === $cnt ? 'selected' : '' }}>
                                    {{ $cnt }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <!-- Filter by Hospital -->
                @if(isset($hospitals) && $hospitals->isNotEmpty())
                    <div class="w-full md:w-60">
                        <select 
                            name="hospital" 
                            class="w-full bg-gray-50 focus:bg-white text-xs text-gray-800 px-3 py-2.5 rounded-xl border border-gray-200 focus:border-[#27797D] focus:outline-none transition-all cursor-pointer"
                            onchange="this.form.submit()"
                        >
                            <option value="">All Treated Hospitals</option>
                            @foreach($hospitals as $hospName)
                                <option value="{{ $hospName }}" {{ request('hospital') === $hospName ? 'selected' : '' }}>
                                    {{ $hospName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <button type="submit" class="bg-[#27797D] hover:bg-[#1f6063] text-white text-xs font-bold px-6 py-2.5 rounded-xl transition-all cursor-pointer">
                    Filter
                </button>

                @if(request('search') || request('country') || request('hospital'))
                    <a href="{{ route('patient.stories') }}" class="inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-600 text-xs font-bold px-4 py-2.5 rounded-xl transition-all">
                        Reset
                    </a>
                @endif
            </form>

            <!-- Active Filter Badges -->
            @if(request('search') || request('country') || request('hospital'))
                <div class="pt-3 mt-3 border-t border-gray-100 flex flex-wrap items-center gap-2 text-xs">
                    <span class="text-gray-400 font-bold uppercase text-[10px] tracking-wider">Filtered:</span>
                    @if(request('country'))
                        <span class="inline-flex items-center gap-1.5 bg-blue-50 text-blue-700 border border-blue-200 px-3 py-1 rounded-full text-xs font-bold">
                            <span>🌍 {{ request('country') }}</span>
                            <a href="{{ route('patient.stories', request()->except('country', 'page')) }}" class="text-blue-600 hover:text-rose-600 font-bold">&times;</a>
                        </span>
                    @endif
                    @if(request('hospital'))
                        <span class="inline-flex items-center gap-1.5 bg-orange-50 text-[#EF7415] border border-orange-200 px-3 py-1 rounded-full text-xs font-bold">
                            <span>🏥 {{ request('hospital') }}</span>
                            <a href="{{ route('patient.stories', request()->except('hospital', 'page')) }}" class="text-orange-600 hover:text-rose-600 font-bold">&times;</a>
                        </span>
                    @endif
                    @if(request('search'))
                        <span class="inline-flex items-center gap-1.5 bg-gray-100 text-gray-700 border border-gray-200 px-3 py-1 rounded-full text-xs font-bold">
                            <span>🔍 "{{ request('search') }}"</span>
                            <a href="{{ route('patient.stories', request()->except('search', 'page')) }}" class="text-gray-500 hover:text-rose-600 font-bold">&times;</a>
                        </span>
                    @endif
                    <a href="{{ route('patient.stories') }}" class="text-[11px] text-gray-400 hover:text-rose-600 font-semibold underline ml-1">
                        Clear All
                    </a>
                </div>
            @endif
        </div>

        <!-- ==================== STORIES GRID ==================== -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($stories as $story)
                <div class="bg-white rounded-3xl border border-gray-200/90 shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between overflow-hidden group">
                    
                    <div class="p-6 sm:p-7 space-y-4">
                        
                        <!-- Top Header: Patient Avatar & Country Badge & Star Rating -->
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="w-14 h-14 rounded-2xl overflow-hidden bg-gray-100 border-2 border-teal-100/80 shadow-2xs shrink-0 group-hover:scale-105 transition-transform duration-200">
                                    <img src="{{ $story->image_url }}" alt="{{ $story->name }}" class="w-full h-full object-cover">
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <h3 class="text-sm font-extrabold text-[#112347] truncate">
                                            {{ $story->name }}
                                        </h3>
                                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Patient Review">✓</span>
                                    </div>
                                    <span class="text-xs text-gray-500 flex items-center gap-1 mt-0.5">
                                        <span>🌍</span>
                                        <span>{{ $story->country ?: 'International Patient' }}</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Star Rating -->
                            <div class="text-amber-400 text-xs tracking-tighter shrink-0" title="{{ $story->rating }} Star Experience">
                                @for($i = 0; $i < ($story->rating ?? 5); $i++)
                                    ★
                                @endfor
                            </div>
                        </div>

                        <!-- Hospital & Treatment Badges -->
                        <div class="flex flex-wrap items-center gap-2 pt-1 text-[11px]">
                            @if($story->hospital_name)
                                <a href="{{ route('hospitals', ['search' => $story->hospital_name]) }}" class="inline-flex items-center gap-1 font-bold text-[#27797D] bg-teal-50 hover:bg-teal-100/70 px-2.5 py-1 rounded-lg border border-teal-100 transition-colors">
                                    <span>🏥</span>
                                    <span class="truncate max-w-[180px]">{{ $story->hospital_name }}</span>
                                </a>
                            @endif

                            @if($story->treatment_name)
                                <span class="inline-flex items-center gap-1 font-semibold text-gray-600 bg-gray-100 px-2.5 py-1 rounded-lg border border-gray-200">
                                    <span>🩺</span>
                                    <span class="truncate max-w-[150px]">{{ $story->treatment_name }}</span>
                                </span>
                            @endif
                        </div>

                        <!-- Story Headline -->
                        @if($story->headline)
                            <h4 class="text-sm font-bold text-gray-900 group-hover:text-[#27797D] transition-colors leading-snug">
                                "{{ $story->headline }}"
                            </h4>
                        @endif

                        <!-- Story Body with Quotes -->
                        <div class="relative text-xs text-gray-600 leading-relaxed space-y-2">
                            <p class="italic line-clamp-4">
                                {{ $story->story }}
                            </p>
                        </div>

                        <!-- Additional Photos Thumbnails (if multiple images present) -->
                        @if(!empty($story->images) && is_array($story->images) && count($story->images) > 1)
                            <div class="pt-2">
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-1.5">Medical Journey Photos:</span>
                                <div class="flex items-center gap-2">
                                    @foreach(array_slice($story->images, 0, 3) as $gImg)
                                        <div class="w-12 h-12 rounded-xl overflow-hidden border border-gray-200 bg-gray-50 shadow-2xs shrink-0">
                                            <img src="{{ \Illuminate\Support\Str::startsWith($gImg, ['http://', 'https://']) ? $gImg : asset($gImg) }}" alt="{{ $story->name }} Journey" class="w-full h-full object-cover">
                                        </div>
                                    @endforeach
                                    @if(count($story->images) > 3)
                                        <span class="text-[11px] font-bold text-[#27797D] bg-teal-50 px-2 py-1 rounded-lg border border-teal-200">
                                            +{{ count($story->images) - 3 }} more
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                    </div>

                    <!-- Bottom Card Footer CTA -->
                    <div class="p-4 sm:p-5 bg-gray-50/70 border-t border-gray-100 flex items-center justify-between gap-3">
                        <span class="text-[11px] text-gray-500 font-medium">Verified Medical Journey</span>
                        <a href="https://wa.me/919129846542?text={{ urlencode('Hello HealGoFly, I saw ' . $story->name . '\'s recovery story for ' . ($story->treatment_name ?: 'treatment') . ' at ' . ($story->hospital_name ?: 'your hospital') . '. I want consultation assistance.') }}" target="_blank" class="inline-flex items-center gap-1 text-xs font-bold text-[#27797D] hover:text-[#1f6063] hover:underline">
                            <span>Consult Similar Case</span>
                            <span>&rarr;</span>
                        </a>
                    </div>

                </div>
            @empty
                <div class="col-span-full py-16 text-center text-gray-500 bg-white rounded-3xl border border-gray-200/80 p-8 space-y-3">
                    <div class="text-4xl">❤️</div>
                    <h3 class="text-base font-bold text-gray-800">No Patient Stories Found</h3>
                    <p class="text-xs text-gray-500 max-w-md mx-auto">
                        No patient stories match your selected criteria. Try resetting filters or search keywords.
                    </p>
                    <a href="{{ route('patient.stories') }}" class="inline-block mt-2 bg-[#27797D] text-white text-xs font-bold px-5 py-2.5 rounded-xl hover:bg-[#1f6063] transition-all">
                        View All Patient Stories
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($stories->hasPages())
            <div class="pt-4 flex justify-center">
                {{ $stories->links() }}
            </div>
        @endif

        <!-- ==================== BOTTOM CONSULTATION CTA BANNER ==================== -->
        <div class="bg-gradient-to-r from-[#112347] via-[#1D4B6C] to-[#27797D] rounded-3xl p-8 sm:p-12 text-white shadow-xl relative overflow-hidden">
            <div class="relative z-10 max-w-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-amber-300 bg-white/10 px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-xs">
                    Free Second Opinion & Treatment Planning
                </span>
                <h2 class="text-2xl sm:text-3xl font-black tracking-tight leading-tight">
                    Want an Expert Treatment Plan For Your Case?
                </h2>
                <p class="text-xs sm:text-sm text-blue-100/90 leading-relaxed">
                    Upload your recent medical reports. Our medical board will connect you directly with premier hospital surgeons, provide accurate cost quotes, and arrange your Medical Visa Invitation Letter.
                </p>

                <div class="pt-3 flex flex-wrap items-center gap-3">
                    <a href="https://wa.me/919129846542?text={{ urlencode('Hello HealGoFly, I would like to get a free medical opinion and treatment cost estimate.') }}" target="_blank" class="bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold px-6 py-3.5 rounded-xl shadow-lg transition-all flex items-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>WhatsApp Reports Now</span>
                    </a>
                    <a href="{{ route('hospital.appointment') }}" class="bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-6 py-3.5 rounded-xl shadow-lg transition-all">
                        Book Hospital Consultation
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection

