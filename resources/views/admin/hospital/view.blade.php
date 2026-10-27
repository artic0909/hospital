@extends('admin.layouts.app')

@section('title', 'Hospital Profile - ' . $hospital->name)

@section('content')
<div class="space-y-6 max-w-6xl mx-auto">

    <!-- Top Header Banner -->
    <div class="bg-gradient-to-r from-[#112347] via-[#1D4B6C] to-[#27797D] text-white p-6 sm:p-8 rounded-3xl shadow-lg border border-slate-700/60 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute -right-8 -bottom-8 w-64 h-64 rounded-full bg-white/5 pointer-events-none"></div>
        <div class="absolute right-32 -top-12 w-48 h-48 rounded-full bg-teal-400/10 pointer-events-none blur-2xl"></div>

        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-start gap-4">
                <div class="w-16 h-16 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-3xl shadow-md shrink-0">
                    🏥
                </div>
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-2">
                        <span class="font-mono text-xs font-bold px-2.5 py-0.5 rounded-lg bg-white/20 text-teal-100 border border-white/25">
                            {{ $hospital->code }}
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#EF7415] text-white shadow-xs">
                            🏷️ {{ $hospital->category->name ?? 'General' }}
                        </span>
                        @if($hospital->status)
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-200 border border-emerald-400/30">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                Active Partner
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-rose-500/20 text-rose-200 border border-rose-400/30">
                                Inactive
                            </span>
                        @endif
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                        {{ $hospital->name }}
                    </h1>
                    <p class="text-xs text-teal-100/90 mt-1 flex items-center gap-1.5 flex-wrap">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>{{ $hospital->city->name ?? '' }}, {{ $hospital->state->name ?? '' }}, {{ $hospital->country->name ?? '' }}</span>
                        <span>&bull;</span>
                        <span>Est. {{ $hospital->establish_year }}</span>
                        <span>&bull;</span>
                        <span class="bg-white/15 px-2 py-0.5 rounded text-[11px] font-mono text-teal-100">slug: {{ $hospital->slug }}</span>
                    </p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap items-center gap-2.5 shrink-0">
                <a 
                    href="{{ route('hospital.show', $hospital) }}" 
                    target="_blank"
                    class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-bold bg-white/15 hover:bg-white/25 text-white rounded-xl transition-all border border-white/20"
                    title="View public profile on frontend"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    <span>Public View</span>
                </a>
                <a 
                    href="{{ route('admin.hospital.index') }}" 
                    class="px-4 py-2 text-xs font-bold bg-white/10 hover:bg-white/20 text-white rounded-xl transition-all border border-white/15"
                >
                    &larr; Directory
                </a>
                <a 
                    href="{{ route('admin.hospital.doctor.index', $hospital->id) }}" 
                    class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-bold bg-white/15 hover:bg-white/25 text-white rounded-xl transition-all border border-white/20"
                    title="Manage Doctors & Timetables"
                >
                    <span>👨‍⚕️</span>
                    <span>Doctors ({{ $hospital->doctors()->count() }})</span>
                </a>
                <a 
                    href="{{ route('admin.hospital.patient.index', $hospital->id) }}" 
                    class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-bold bg-[#EF7415] hover:bg-[#d9640d] text-white rounded-xl transition-all shadow-md shadow-[#EF7415]/20 font-semibold"
                    title="Manage Hospital Patients & Reports"
                >
                    <span>👥</span>
                    <span>Patients ({{ $hospital->patients()->count() }})</span>
                </a>
                <a 
                    href="{{ route('admin.hospital.login-as-partner', $hospital->id) }}" 
                    target="_blank"
                    class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-bold bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl transition-all shadow-md shadow-emerald-500/20 font-semibold"
                    title="Power Login: Access Partner Dashboard as {{ $hospital->name }}"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9"/></svg>
                    <span>Partner Dashboard</span>
                </a>
                <a 
                    href="{{ route('admin.hospital.update', $hospital->id) }}" 
                    class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-bold bg-white text-[#112347] hover:bg-teal-50 rounded-xl transition-all shadow-md font-semibold"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    <span>Edit Hospital</span>
                </a>
                <form id="delete-hosp-form" action="{{ route('admin.hospital.destroy', $hospital->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="button" 
                        onclick="confirmHospitalDelete()"
                        class="p-2 text-rose-300 hover:text-white hover:bg-rose-600/30 rounded-xl transition-colors cursor-pointer border border-rose-400/20"
                        title="Delete Hospital"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Quick Stats Metric Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <!-- Metric 1: Beds -->
        <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-[#27797D] font-extrabold text-xl flex items-center justify-center border border-teal-200/60 shrink-0">
                🛏️
            </div>
            <div>
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Bed Capacity</span>
                <span class="text-xl font-black text-slate-900 block leading-tight">{{ number_format($hospital->no_of_bed) }}</span>
                <span class="text-[10px] text-emerald-600 font-bold">In-Patient Wards</span>
            </div>
        </div>

        <!-- Metric 2: Category -->
        <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-700 font-extrabold text-xl flex items-center justify-center border border-amber-200/60 shrink-0">
                🏷️
            </div>
            <div>
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Classification</span>
                <span class="text-sm font-black text-slate-900 block leading-tight truncate max-w-[130px]">{{ $hospital->category->name ?? 'General' }}</span>
                <span class="text-[10px] text-slate-400">Accredited Tier</span>
            </div>
        </div>

        <!-- Metric 3: Est Year -->
        <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-700 font-extrabold text-xl flex items-center justify-center border border-blue-200/60 shrink-0">
                📅
            </div>
            <div>
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Established</span>
                <span class="text-xl font-black text-slate-900 block leading-tight">{{ $hospital->establish_year }}</span>
                <span class="text-[10px] text-slate-400">{{ date('Y') - $hospital->establish_year }} Years of Service</span>
            </div>
        </div>

        <!-- Metric 4: Location -->
        <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-700 font-extrabold text-xl flex items-center justify-center border border-orange-200/60 shrink-0">
                📍
            </div>
            <div>
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">City & Hub</span>
                <span class="text-sm font-black text-slate-900 block leading-tight truncate max-w-[130px]">{{ $hospital->city->name ?? 'N/A' }}</span>
                <span class="text-[10px] text-slate-400">{{ $hospital->country->name ?? 'Global' }}</span>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Column 1 & 2: Overview and Infrastructure -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Card: About / Scope of Healthcare -->
            <div class="bg-white p-6 sm:p-7 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <h2 class="text-base font-extrabold text-[#112347] flex items-center gap-2">
                        <span>📋</span>
                        <span>Clinical Profile & Hospital Overview</span>
                    </h2>
                </div>

                <div class="text-xs sm:text-sm text-slate-700 leading-relaxed font-medium prose max-w-none">
                    {!! $hospital->about ?: '<p class="text-slate-400 italic">No detailed clinical overview provided yet. You can add hospital accolades, international patient services, and emergency capabilities by clicking "Edit Hospital".</p>' !!}
                </div>
            </div>

            <!-- Card: Location and Campus Address -->
            <div class="bg-white p-6 sm:p-7 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <h2 class="text-base font-extrabold text-[#112347] flex items-center gap-2">
                        <span>🗺️</span>
                        <span>Campus Location & Geo Address</span>
                    </h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                    <div class="p-3.5 bg-slate-50 rounded-2xl border border-slate-200/70">
                        <span class="text-slate-400 text-[10px] font-bold uppercase block">Country</span>
                        <span class="font-extrabold text-slate-900 text-sm mt-0.5 block">🌐 {{ $hospital->country->name ?? 'N/A' }}</span>
                    </div>

                    <div class="p-3.5 bg-slate-50 rounded-2xl border border-slate-200/70">
                        <span class="text-slate-400 text-[10px] font-bold uppercase block">State / Province</span>
                        <span class="font-extrabold text-slate-900 text-sm mt-0.5 block">🗺️ {{ $hospital->state->name ?? 'N/A' }}</span>
                    </div>

                    <div class="p-3.5 bg-slate-50 rounded-2xl border border-slate-200/70">
                        <span class="text-slate-400 text-[10px] font-bold uppercase block">City</span>
                        <span class="font-extrabold text-slate-900 text-sm mt-0.5 block">🏙️ {{ $hospital->city->name ?? 'N/A' }}</span>
                    </div>

                    <div class="sm:col-span-3 p-4 bg-slate-50 rounded-2xl border border-slate-200/70">
                        <span class="text-slate-400 text-[10px] font-bold uppercase block mb-1">Detailed Street Address</span>
                        <p class="font-bold text-slate-800 text-xs sm:text-sm">
                            {{ $hospital->address }}
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Column 3: Contact Details & Audit Information -->
        <div class="space-y-6">

            <!-- Card: Communication & Portal Access -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <h2 class="text-sm font-extrabold text-[#112347] flex items-center gap-2">
                        <span>🔐</span>
                        <span>Hospital Contact & Access</span>
                    </h2>
                </div>

                <div class="space-y-3.5 text-xs">
                    <div>
                        <span class="text-slate-400 text-[10px] font-bold uppercase block">Direct Phone Hotline</span>
                        <a href="tel:{{ $hospital->contact }}" class="font-extrabold text-[#27797D] text-sm hover:underline block mt-0.5">
                            📞 {{ $hospital->contact }}
                        </a>
                    </div>

                    <div>
                        <span class="text-slate-400 text-[10px] font-bold uppercase block">Official Email</span>
                        @if($hospital->email)
                            <a href="mailto:{{ $hospital->email }}" class="font-bold text-slate-800 hover:text-[#27797D] text-xs hover:underline block mt-0.5">
                                ✉️ {{ $hospital->email }}
                            </a>
                        @else
                            <span class="text-slate-400 italic mt-0.5 block">No email recorded</span>
                        @endif
                    </div>

                    <div>
                        <span class="text-slate-400 text-[10px] font-bold uppercase block">Partner Portal Password</span>
                        <span class="font-mono text-slate-500 font-bold block mt-0.5">
                            •••••••••••• (Encrypted)
                        </span>
                    </div>
                </div>
            </div>

            <!-- Card: Hospital Modules & Extensions -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-3">
                <span class="text-slate-400 text-[10px] font-bold uppercase tracking-wider block mb-1">Hospital Sub-Modules</span>
                
                <div class="space-y-2">
                    <div class="flex items-center justify-between p-2.5 bg-slate-50 rounded-xl border border-slate-100 text-xs">
                        <span class="font-bold text-slate-700 flex items-center gap-2">
                            <span>👨‍⚕️</span>
                            <span>Associated Doctors</span>
                        </span>
                        <span class="text-[11px] font-bold text-[#27797D]">Active</span>
                    </div>

                    <div class="flex items-center justify-between p-2.5 bg-slate-50 rounded-xl border border-slate-100 text-xs">
                        <span class="font-bold text-slate-700 flex items-center gap-2">
                            <span>🏢</span>
                            <span>Facilities & Tech</span>
                        </span>
                        <span class="text-[11px] font-bold text-[#27797D]">Active</span>
                    </div>

                    <div class="flex items-center justify-between p-2.5 bg-slate-50 rounded-xl border border-slate-100 text-xs">
                        <span class="font-bold text-slate-700 flex items-center gap-2">
                            <span>🖼️</span>
                            <span>Hospital Gallery</span>
                        </span>
                        <span class="text-[11px] font-bold text-[#27797D]">Active</span>
                    </div>

                    <div class="flex items-center justify-between p-2.5 bg-slate-50 rounded-xl border border-slate-100 text-xs">
                        <span class="font-bold text-slate-700 flex items-center gap-2">
                            <span>⭐</span>
                            <span>Patient Reviews</span>
                        </span>
                        <span class="text-[11px] font-bold text-[#27797D]">Active</span>
                    </div>
                </div>
            </div>

            <!-- Card: Audit Dates -->
            <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs text-xs space-y-2 text-slate-500">
                <div class="flex justify-between items-center">
                    <span class="text-[11px]">System ID:</span>
                    <span class="font-mono font-bold text-slate-700">#{{ $hospital->id }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[11px]">Empanelled On:</span>
                    <span class="font-bold text-slate-700">{{ $hospital->created_at ? $hospital->created_at->format('M d, Y') : 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[11px]">Last Updated:</span>
                    <span class="font-bold text-slate-700">{{ $hospital->updated_at ? $hospital->updated_at->diffForHumans() : 'N/A' }}</span>
                </div>
            </div>

        </div>

    </div>

</div>

@push('scripts')
<script>
    function confirmHospitalDelete() {
        Swal.fire({
            title: `Delete {{ addslashes($hospital->name) }}?`,
            text: 'This will permanently remove the hospital and all linked doctors, reviews, and facilities.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#94A3B8',
            confirmButtonText: 'Yes, delete permanently',
            cancelButtonText: 'Cancel',
            borderRadius: '1.25rem'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-hosp-form').submit();
            }
        });
    }
</script>
@endpush
@endsection
