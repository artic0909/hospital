@extends('frontend.layouts.app')

@php
    $titleCountry = $selectedCountry ? $selectedCountry->name : 'Global';
    $titleCategory = $selectedCategory ? $selectedCategory->name . ' - ' : '';
@endphp

@section('title', 'Best ' . $titleCategory . 'Hospitals in ' . $titleCountry . ' - Top Rated Hospitals & Cost Comparison | Heal Go Fly')

@section('content')

    <!-- ==================== BREADCRUMBS ==================== -->
    <div class="bg-gray-50/80 border-b border-gray-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-xs text-gray-500 font-medium flex-wrap">
                <a href="{{ url('/') }}" class="hover:text-[#27797D] transition-colors">Home</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('hospitals') }}" class="hover:text-[#27797D] transition-colors">Hospitals</a>
                @if($selectedCountry)
                    <span class="text-gray-400">›</span>
                    <a href="{{ route('hospitals', ['country' => $selectedCountry->name]) }}" class="hover:text-[#27797D] transition-colors font-medium">
                        {{ $selectedCountry->name }}
                    </a>
                @endif
                @if($selectedCategory)
                    <span class="text-gray-400">›</span>
                    <span class="text-[#27797D] font-semibold">{{ $selectedCategory->name }}</span>
                @elseif(!$selectedCountry)
                    <span class="text-gray-400">›</span>
                    <span class="text-[#112347] font-semibold">All Locations</span>
                @endif
            </nav>
        </div>
    </div>

    <!-- ==================== PAGE TITLE ==================== -->
    <div class="py-6 sm:py-9 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#112347] tracking-tight" id="page-heading">
                @if($selectedCategory && $selectedCountry)
                    Best {{ $selectedCategory->name }} in {{ $selectedCountry->name }}
                @elseif($selectedCountry)
                    Best Hospitals in {{ $selectedCountry->name }}
                @elseif($selectedCategory)
                    Best {{ $selectedCategory->name }} Worldwide
                @else
                    Best Accredited Hospitals Worldwide
                @endif
            </h1>
            <p class="text-xs sm:text-sm text-[#5a6a85] mt-2 max-w-2xl mx-auto leading-relaxed">
                Compare NABH & JCI accredited multi-specialty hospitals{{ $selectedCountry ? ' in ' . $selectedCountry->name : '' }}. View specialist doctors, bed capacity, medical procedures, and request free cost estimates.
            </p>
        </div>
    </div>

    <!-- ==================== MAIN SECTION: LEFT SCROLLING LIST & RIGHT STICKY FORM ==================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">
            
            <!-- ==================== LEFT COLUMN: HOSPITAL CARDS (SCROLLABLE) ==================== -->
            <div class="lg:col-span-8 space-y-5">
                
                <!-- Results Bar -->
                <div class="bg-white p-4 sm:p-5 rounded-2xl border border-gray-200/80 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <span class="text-sm font-bold text-gray-900">
                            Showing <span id="visible-count" class="text-[#27797D]">{{ $hospitals->total() }}</span> 
                            {{ $selectedCategory ? $selectedCategory->name : 'Hospitals' }}
                            {{ $selectedCountry ? ' in ' . $selectedCountry->name : '' }}
                        </span>
                        <p class="text-xs text-gray-500 mt-0.5">Accredited by JCI, NABH, and international medical boards</p>
                    </div>
                </div>

                <!-- Hospital Cards List -->
                <div id="hospitals-list" class="space-y-5">

                    @forelse($hospitals as $hospital)
                        @php
                            $thumbImage = $hospital->images->first()?->image_url 
                                ?? 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?auto=format&fit=crop&w=400&q=80';
                            $locationText = collect([$hospital->city?->name, $hospital->state?->name, $hospital->country?->name])->filter()->implode(', ');
                        @endphp

                        <div class="hospital-card bg-white rounded-2xl border border-gray-200/90 shadow-sm hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4">
                            
                            <!-- Top Details Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                                
                                <!-- Left: Thumbnail + Title, Rating & Seals -->
                                <div class="md:col-span-7 flex flex-col sm:flex-row gap-4 items-start">
                                    <!-- Thumbnail -->
                                    <div class="w-32 sm:w-36 h-28 sm:h-28 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100 border border-gray-200/60 relative group">
                                        <img src="{{ $thumbImage }}" 
                                             alt="{{ $hospital->name }}" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=400&q=80';">
                                    </div>

                                    <!-- Title & Accreditation Emblems -->
                                    <div class="space-y-1.5 flex-1 min-w-0">
                                        <div class="flex items-center gap-1.5 flex-wrap">
                                            <h2 class="text-base sm:text-lg font-bold text-[#27797D] leading-tight">
                                                <a href="{{ route('hospital.show', $hospital->slug) }}" class="hover:underline">
                                                    {{ $hospital->name }}
                                                </a>
                                            </h2>
                                            <!-- Verified Checkmark Icon -->
                                            <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[9px] font-bold" title="Verified Hospital">✓</span>
                                            @if($hospital->category)
                                                <span class="bg-[#EF7415] text-white text-[10px] font-bold px-2 py-0.5 rounded-full tracking-wide">
                                                    {{ Str::limit($hospital->category->name, 25) }}
                                                </span>
                                            @endif
                                        </div>

                                        <!-- Rating -->
                                        <div class="flex items-center gap-1.5 text-xs text-gray-600">
                                            <div class="flex text-amber-500 text-sm">
                                                ★★★★<span class="text-amber-500">★</span>
                                            </div>
                                            <span class="font-bold text-gray-800">4.5</span>
                                            <span class="text-gray-500">(NABH & JCI Certified)</span>
                                        </div>

                                        <!-- Accreditation Seals -->
                                        <div class="flex items-center gap-2 pt-1">
                                            <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-amber-400 to-yellow-200 border-2 border-amber-500 flex items-center justify-center shadow-xs text-amber-800" title="JCI Accredited Network">
                                                <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                            </div>
                                            <div class="w-7 h-7 rounded-full border-2 border-red-500 bg-white flex items-center justify-center p-0.5 shadow-xs" title="NABH Certified">
                                                <div class="w-full h-full rounded-full bg-blue-600 flex items-center justify-center text-white text-[8px] font-extrabold">N</div>
                                            </div>
                                            <div class="w-7 h-7 rounded-full bg-teal-50 border-2 border-teal-500 text-teal-700 flex items-center justify-center shadow-xs text-[9px] font-bold" title="NABL Accredited">
                                                <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right: Key Specs, Doctors count & Two Stacked Buttons -->
                                <div class="md:col-span-5 flex flex-col justify-between h-full space-y-3">
                                    <div class="space-y-1.5 text-xs text-gray-600">
                                        @if($hospital->establish_year)
                                            <div class="flex items-center gap-2">
                                                <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                                <span>Established in: <strong class="text-gray-800 font-semibold">{{ $hospital->establish_year }}</strong></span>
                                            </div>
                                        @endif

                                        @if($hospital->no_of_bed)
                                            <div class="flex items-center gap-2">
                                                <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M2 4v16M2 8h18a2 2 0 0 1 2 2v10M2 17h20M6 8v9"/></svg>
                                                <span>Number of Beds: <strong class="text-gray-800 font-semibold">{{ number_format($hospital->no_of_bed) }}</strong></span>
                                            </div>
                                        @endif

                                        @if($hospital->category)
                                            <div class="flex items-center gap-2">
                                                <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 2v20M2 12h20"/></svg>
                                                <span><strong class="text-gray-800 font-semibold">{{ $hospital->category->name }}</strong></span>
                                            </div>
                                        @endif

                                        @if(!empty($locationText))
                                            <div class="flex items-center gap-2">
                                                <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                                <span class="truncate">Location: <strong class="text-gray-800 font-semibold">{{ $locationText }}</strong></span>
                                            </div>
                                        @endif

                                        <!-- Hospital's Doctors count & link -->
                                        <div class="pt-1">
                                            <a href="{{ route('doctors', ['hospital' => $hospital->slug]) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-teal-50 hover:bg-teal-100 text-[#27797D] font-bold text-xs border border-teal-200/80 transition-all group/doc">
                                                <span>👨‍⚕️ Available Doctors: <strong class="text-gray-900">{{ $hospital->doctors_count }}</strong></span>
                                                <span class="group-hover/doc:translate-x-0.5 transition-transform">&rarr;</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="space-y-2 pt-1">
                                        <button 
                                            type="button"
                                            data-book-appointment
                                            data-hospital-id="{{ $hospital->id }}"
                                            data-hospital-name="{{ $hospital->name }}"
                                            class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-xl shadow-xs hover:shadow text-center block transition-all cursor-pointer"
                                        >
                                            Book Appointment
                                        </button>
                                        <a href="https://wa.me/919129846542?text={{ urlencode('Hello HealGoFly, I am interested in ' . $hospital->name . ($hospital->city ? ', ' . $hospital->city->name : '')) }}" target="_blank" class="w-full bg-[#28a745] hover:bg-[#218838] text-white text-xs sm:text-sm font-bold py-2.5 px-4 rounded-xl shadow-xs hover:shadow text-center flex items-center justify-center gap-2 transition-all">
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                            <span>WhatsApp Us</span>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <!-- Bottom Description & Hospital Link -->
                            @if(!empty($hospital->about))
                                <div class="pt-2 border-t border-gray-100 flex flex-col sm:flex-row sm:items-end justify-between gap-2">
                                    <p class="text-xs text-gray-500 leading-relaxed flex-1 hospital-desc line-clamp-2">
                                        {{ strip_tags($hospital->about) }}
                                    </p>
                                    <a href="{{ route('hospital.show', $hospital->slug) }}" class="text-[#27797D] hover:underline font-bold text-xs whitespace-nowrap self-end sm:self-auto">
                                        View Hospital Profile &rarr;
                                    </a>
                                </div>
                            @endif

                        </div>
                    @empty
                        <div class="bg-white rounded-2xl border border-gray-200/90 p-8 sm:p-12 text-center space-y-4">
                            <div class="w-16 h-16 rounded-full bg-teal-50 text-[#27797D] flex items-center justify-center mx-auto text-2xl font-bold">
                                🏥
                            </div>
                            <h3 class="text-lg font-bold text-[#112347]">No Hospitals Found</h3>
                            <p class="text-xs text-gray-500 max-w-md mx-auto">
                                We could not find any hospitals matching your filter criteria. Try clearing your filters to explore our complete hospital network.
                            </p>
                            <div>
                                <a href="{{ route('hospitals') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#27797D] hover:bg-[#1e5f62] text-white text-xs font-bold transition-all shadow-xs">
                                    <span>View All Hospitals</span>
                                    <span>&rarr;</span>
                                </a>
                            </div>
                        </div>
                    @endforelse

                </div>

                <!-- Dynamic Pagination -->
                @if($hospitals->hasPages())
                    <div class="pt-6">
                        {{ $hospitals->links() }}
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
                            <h3 class="text-lg font-bold text-white tracking-tight">Get FREE Evaluation</h3>
                        </div>
                        <p class="text-xs text-blue-100 mt-1">Treatment plan and quote within 2 days</p>
                    </div>

                    <!-- Evaluation Form -->
                    <form action="{{ route('patient.enquiry.submit') }}" method="POST" class="space-y-3" data-enquiry-form>
                        @csrf
                        <input type="hidden" name="source_page" value="Hospitals Listing - Free Evaluation">
                        
                        <!-- 1. Patient Name -->
                        <div>
                            <input type="text" name="patient_name" required placeholder="Patient Name" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- 2. Country Dropdown -->
                        @php
                            $evalCountries = \App\Models\Country::orderBy('name')->get();
                        @endphp
                        <div class="relative">
                            <select name="country" class="w-full text-xs text-gray-900 bg-white px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415] appearance-none cursor-pointer font-medium">
                                @forelse($evalCountries as $cItem)
                                    <option value="{{ $cItem->name }}" {{ ($selectedCountry?->id === $cItem->id || strtolower($cItem->name) === 'india') ? 'selected' : '' }}>
                                        {{ $cItem->name }}
                                    </option>
                                @empty
                                    <option value="India" selected>India</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                @endforelse
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>

                        <!-- 3. Select City -->
                        <div>
                            <input type="text" name="city" placeholder="Select City" class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]">
                        </div>

                        <!-- 4. Phone with Country Code Dropdown -->
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
                                placeholder="Phone number" 
                                class="flex-1 min-w-0 text-xs text-gray-900 bg-white placeholder-gray-400 px-3 py-2.5 border-0 focus:outline-none"
                            >
                        </div>

                        <!-- 5. Medical Problem Textarea -->
                        <div>
                            <textarea name="problem" rows="3" placeholder="Describe The Current Medical Problem.." class="w-full text-xs text-gray-900 bg-white placeholder-gray-400 px-3.5 py-2.5 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-[#EF7415]"></textarea>
                        </div>

                        <!-- 6. Date of Birth Picker -->
                        <div class="relative flex items-center bg-white rounded-lg focus-within:ring-2 focus-within:ring-[#EF7415] transition-all">
                            <label for="hosp_dob" class="pl-3 pr-2 py-2.5 text-xs font-semibold text-gray-500 flex items-center gap-1 shrink-0 select-none cursor-pointer">
                                <svg class="w-3.5 h-3.5 text-[#27797D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>DOB:</span>
                            </label>
                            <input 
                                type="date" 
                                id="hosp_dob"
                                name="dob" 
                                max="{{ date('Y-m-d') }}"
                                class="w-full bg-transparent text-gray-900 text-xs pr-3 py-2.5 focus:outline-none cursor-pointer font-medium"
                            >
                        </div>

                        <!-- 7. Continue Button -->
                        <button type="submit" class="w-full bg-[#EF7415] hover:bg-[#d9640d] text-white text-sm font-bold py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 transform hover:-translate-y-0.5 cursor-pointer">
                            Continue →
                        </button>
                    </form>

                    <!-- Terms & Privacy -->
                    <p class="text-[11px] text-blue-100/90 text-center mt-3 leading-snug">
                        By submitting I agree to the <a href="{{ route('privacy') }}" class="underline hover:text-white font-medium">Terms of Use</a> and <a href="{{ route('privacy') }}" class="underline hover:text-white font-medium">Privacy Policy</a> of Heal Go Fly.
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
                            <span class="block text-xs font-bold text-gray-900">Data Privacy Guaranteed</span>
                            <span class="block text-[11px] text-gray-500">Your information is secure</span>
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
                            <span class="block text-xs font-bold text-gray-900">24/7 Patient Support</span>
                            <span class="block text-[11px] text-gray-500">Get assistance anytime</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
