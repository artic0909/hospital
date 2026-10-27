@extends('partner.layouts.app')

@section('title', 'Dr. ' . $doctor->name . ' - ' . $hospital->name)

@section('content')
<div class="space-y-6 max-w-6xl mx-auto">

    <!-- Top Breadcrumb & Actions Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold">
                <a href="{{ route('partner.dashboard') }}" class="text-[#27797D] hover:underline flex items-center gap-1">
                    &larr; Dashboard
                </a>
                <span class="text-slate-300">&bull;</span>
                <a href="{{ route('partner.doctor.index') }}" class="text-slate-600 hover:underline">
                    Doctors
                </a>
                <span class="text-slate-300">&bull;</span>
                <span class="text-slate-400">Dr. {{ $doctor->name }}</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Doctor Profile & Timetable</h1>
            <p class="text-xs text-slate-500 mt-0.5">Clinical credentials, OPD consultation fee, qualifications, and weekly consultation schedules for {{ $hospital->name }}.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <a 
                href="{{ route('doctor.show', $doctor) }}" 
                target="_blank"
                class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-teal-50 hover:bg-teal-100 text-[#27797D] border border-teal-200 text-xs font-bold transition-all shadow-xs"
                title="View public profile on frontend"
            >
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Public View</span>
            </a>
            <a 
                href="{{ route('partner.doctor.update', $doctor->id) }}" 
                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold transition-all shadow-sm shadow-[#EF7415]/20 cursor-pointer"
            >
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/></svg>
                <span>Edit Profile</span>
            </a>
            <button 
                type="button" 
                onclick="confirmDeleteDoctor()"
                class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200 text-xs font-bold transition-colors cursor-pointer"
            >
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                <span>Delete</span>
            </button>
            <form id="delete-doctor-form" action="{{ route('partner.doctor.destroy', $doctor->id) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>

    <!-- Doctor Hero Card -->
    <div class="bg-gradient-to-r from-[#112347] via-[#1D4B6C] to-[#27797D] p-6 sm:p-8 rounded-3xl text-white shadow-lg relative overflow-hidden">
        <div class="absolute -right-8 -bottom-8 w-64 h-64 bg-white/5 rounded-full blur-2xl pointer-events-none"></div>

        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6 relative z-10">
            <div class="relative shrink-0">
                <img 
                    src="{{ $doctor->image_url }}" 
                    alt="{{ $doctor->name }}" 
                    class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl object-cover border-4 border-white/20 shadow-xl bg-slate-100"
                >
                @if($doctor->status)
                    <span class="absolute -bottom-1 -right-1 px-2.5 py-0.5 rounded-full bg-emerald-500 text-white text-[10px] font-black tracking-wide border-2 border-white shadow-xs">
                        ACTIVE
                    </span>
                @else
                    <span class="absolute -bottom-1 -right-1 px-2.5 py-0.5 rounded-full bg-slate-500 text-white text-[10px] font-black tracking-wide border-2 border-white shadow-xs">
                        INACTIVE
                    </span>
                @endif
            </div>

            <div class="space-y-2 grow">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="px-3 py-1 rounded-full bg-[#EF7415] text-white text-xs font-extrabold uppercase tracking-wider">
                        {{ $doctor->spaciality }}
                    </span>
                    <span class="px-3 py-1 rounded-full bg-white/10 text-white text-xs font-semibold backdrop-blur-xs flex items-center gap-1.5">
                        <span>🏥</span>
                        <span>{{ $hospital->name }}</span>
                    </span>
                </div>

                <h2 class="text-2xl sm:text-3xl font-black tracking-tight text-white">
                    Dr. {{ $doctor->name }}
                </h2>

                <p class="text-slate-200 text-sm font-medium">
                    {{ $doctor->designation }}
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-2 text-xs text-teal-100">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-teal-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ $doctor->experience }} Years Clinical Practice</span>
                    </span>
                    <span class="text-white/30">&bull;</span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>OPD Fee: ₹{{ number_format($doctor->OPD_fee, 2) }}</span>
                    </span>
                    @if($doctor->surgeries)
                        <span class="text-white/30">&bull;</span>
                        <span class="flex items-center gap-1.5">
                            <span>🩺</span>
                            <span>{{ $doctor->surgeries }}</span>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-teal-50 text-[#27797D] font-bold text-lg flex items-center justify-center shrink-0">
                ⏳
            </div>
            <div>
                <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Experience</div>
                <div class="text-lg font-black text-[#112347]">{{ $doctor->experience }} Years</div>
                <div class="text-[11px] text-teal-600 font-semibold">Specialist Practice</div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 font-bold text-lg flex items-center justify-center shrink-0">
                ₹
            </div>
            <div>
                <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">OPD Consultation Fee</div>
                <div class="text-lg font-black text-amber-600">₹{{ number_format($doctor->OPD_fee, 2) }}</div>
                <div class="text-[11px] text-slate-500">Per Patient Visit</div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 font-bold text-lg flex items-center justify-center shrink-0">
                🩺
            </div>
            <div>
                <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Surgeries</div>
                <div class="text-sm font-black text-[#112347] truncate max-w-[150px]">
                    {{ $doctor->surgeries ?: 'Consultant' }}
                </div>
                <div class="text-[11px] text-slate-500">Track Record</div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 font-bold text-lg flex items-center justify-center shrink-0">
                🏥
            </div>
            <div class="overflow-hidden">
                <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Hospital Affiliation</div>
                <div class="text-sm font-black text-[#112347] truncate">
                    {{ $hospital->name }}
                </div>
                <div class="text-[11px] text-slate-500 truncate">{{ $hospital->city->name ?? '' }}, {{ $hospital->state->name ?? '' }}</div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Column 1 & 2: Qualifications & Experience -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Education -->
            <div class="bg-white p-6 sm:p-7 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
                <div class="flex items-center gap-3 border-b border-slate-100 pb-3">
                    <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] font-bold text-sm flex items-center justify-center">
                        🎓
                    </span>
                    <div>
                        <h3 class="text-base font-extrabold text-[#112347]">Education & Medical Degrees</h3>
                        <p class="text-xs text-slate-400">Postgraduate degrees and fellowships</p>
                    </div>
                </div>

                <div class="prose prose-sm max-w-none text-slate-700 leading-relaxed text-xs sm:text-sm">
                    {!! $doctor->education !!}
                </div>
            </div>

            <!-- Awards -->
            @if($doctor->awards)
                <div class="bg-white p-6 sm:p-7 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-3">
                        <span class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 font-bold text-sm flex items-center justify-center">
                            🏆
                        </span>
                        <div>
                            <h3 class="text-base font-extrabold text-[#112347]">Awards, Honors & Accolades</h3>
                            <p class="text-xs text-slate-400">National and international recognitions</p>
                        </div>
                    </div>

                    <div class="prose prose-sm max-w-none text-slate-700 leading-relaxed text-xs sm:text-sm">
                        {!! $doctor->awards !!}
                    </div>
                </div>
            @endif

            <!-- Work Experience -->
            @if($doctor->work_experiance)
                <div class="bg-white p-6 sm:p-7 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-3">
                        <span class="w-8 h-8 rounded-xl bg-indigo-50 text-indigo-600 font-bold text-sm flex items-center justify-center">
                            💼
                        </span>
                        <div>
                            <h3 class="text-base font-extrabold text-[#112347]">Career Experience & Former Affiliations</h3>
                            <p class="text-xs text-slate-400">Clinical leadership and previous medical centers</p>
                        </div>
                    </div>

                    <div class="prose prose-sm max-w-none text-slate-700 leading-relaxed text-xs sm:text-sm">
                        {!! $doctor->work_experiance !!}
                    </div>
                </div>
            @endif
        </div>

        <!-- Column 3: Weekly Timetable -->
        <div class="space-y-6">
            <div class="bg-white p-6 sm:p-7 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-xl bg-teal-50 text-[#27797D] font-bold text-sm flex items-center justify-center">
                            📅
                        </span>
                        <div>
                            <h3 class="text-base font-extrabold text-[#112347]">OPD Timetable</h3>
                            <p class="text-[11px] text-slate-400">Weekly consultation slots</p>
                        </div>
                    </div>
                    <span class="px-2.5 py-1 rounded-full bg-teal-50 text-teal-800 text-[10px] font-bold border border-teal-200">
                        {{ $doctor->schedules->count() }} Slots
                    </span>
                </div>

                @if($doctor->schedules->count() > 0)
                    <div class="space-y-2.5">
                        @foreach($doctor->schedules as $schedule)
                            <div class="p-3 bg-slate-50/70 hover:bg-teal-50/50 rounded-2xl border border-slate-200/70 transition-all flex items-center justify-between gap-2">
                                <div class="flex items-center gap-2.5">
                                    <span class="w-2 h-2 rounded-full bg-[#27797D]"></span>
                                    <span class="text-xs font-bold text-slate-800">{{ $schedule->day }}</span>
                                </div>
                                <span class="text-xs font-bold text-[#1D4B6C] bg-white px-2.5 py-1 rounded-xl border border-slate-200 shadow-2xs">
                                    {{ $schedule->time_from }} &ndash; {{ $schedule->time_to }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 px-4 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                        <span class="text-3xl">🗓️</span>
                        <div class="text-xs font-bold text-slate-700 mt-2">No Consultation Slots Configured</div>
                        <a 
                            href="{{ route('partner.doctor.update', $doctor->id) }}" 
                            class="inline-block mt-3 px-3.5 py-1.5 rounded-xl bg-[#27797D] hover:bg-[#1D4B6C] text-white text-xs font-bold transition-colors cursor-pointer"
                        >
                            Configure Schedule
                        </a>
                    </div>
                @endif
            </div>
        </div>

    </div>

</div>

@push('scripts')
<script>
    function confirmDeleteDoctor() {
        Swal.fire({
            title: 'Delete Dr. {{ $doctor->name }}?',
            text: 'This doctor and consultation timetable will be permanently deleted!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF7415',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, delete doctor'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-doctor-form').submit();
            }
        });
    }
</script>
@endpush
@endsection
