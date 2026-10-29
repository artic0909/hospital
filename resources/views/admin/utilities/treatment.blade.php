@extends('admin.layouts.app')

@section('title', 'Treatment & Procedure Management - Master Utilities')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="text-xs font-bold uppercase tracking-wider text-[#27797D]">Master Utilities</span>
                <span class="text-slate-300">&bull;</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $treatments->total() }} Procedures & Packages
                </span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Medical Treatments & Procedures</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage surgical procedures, treatments, icons (searchable SVG library or custom upload), estimated pricing, and department mappings.</p>
        </div>

        <div class="flex items-center gap-3">
            <button 
                type="button" 
                onclick="openAddTreatmentModal()"
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add Treatment</span>
            </button>
        </div>
    </div>

    <!-- Hidden Bulk Delete Form -->
    <form id="bulk-delete-form" action="{{ route('admin.utilities.treatment.bulk-delete') }}" method="POST" class="hidden">
        @csrf
    </form>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        
        <!-- Search & Filter Bar -->
        <div class="p-4 sm:p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <form action="{{ route('admin.utilities.treatment') }}" method="GET" class="flex flex-wrap items-center gap-3 w-full lg:w-auto flex-1">
                <!-- Search Input -->
                <div class="relative w-full sm:w-60">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Search treatment, department..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2 pl-9 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all"
                    >
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <!-- Department Filter -->
                <select 
                    name="department_id" 
                    onchange="this.form.submit()"
                    class="bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none cursor-pointer font-medium max-w-[160px] truncate"
                >
                    <option value="">All Departments</option>
                    @foreach ($departments as $d)
                        <option value="{{ $d->id }}" {{ request('department_id') == $d->id ? 'selected' : '' }}>
                            {{ $d->name }}
                        </option>
                    @endforeach
                </select>

                <!-- Speciality Filter -->
                <select 
                    name="spaciality_id" 
                    onchange="this.form.submit()"
                    class="bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none cursor-pointer font-medium max-w-[160px] truncate"
                >
                    <option value="">All Specialities</option>
                    @foreach ($specialities as $s)
                        <option value="{{ $s->id }}" {{ request('spaciality_id') == $s->id ? 'selected' : '' }}>
                            {{ $s->name }}
                        </option>
                    @endforeach
                </select>

                <!-- Currency Filter -->
                <select 
                    name="price_type" 
                    onchange="this.form.submit()"
                    class="bg-slate-50 text-xs px-3 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none cursor-pointer font-medium"
                >
                    <option value="">All Currencies</option>
                    <option value="rupees" {{ request('price_type') === 'rupees' ? 'selected' : '' }}>₹ Rupees</option>
                    <option value="dollars" {{ request('price_type') === 'dollars' ? 'selected' : '' }}>$ Dollars</option>
                </select>

                <!-- Per Page Dropdown -->
                <div class="flex items-center gap-1.5 text-xs text-slate-500 font-semibold">
                    <span>Show</span>
                    <select 
                        name="per_page" 
                        onchange="this.form.submit()" 
                        class="bg-slate-50 text-xs px-2.5 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none cursor-pointer font-bold text-slate-700"
                    >
                        <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ request('per_page', 20) == 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ request('per_page', 50) == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page', 100) == 100 ? 'selected' : '' }}>100</option>
                        <option value="all" {{ request('per_page') === 'all' ? 'selected' : '' }}>All</option>
                    </select>
                    <span>per page</span>
                </div>

                <button type="submit" class="px-3.5 py-2 text-xs font-bold bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl transition-colors cursor-pointer">
                    Apply
                </button>
            </form>

            @if(request('search') || request('department_id') || request('spaciality_id') || request('price_type') || (request('per_page') && request('per_page') != 10))
                <a href="{{ route('admin.utilities.treatment') }}" class="text-xs font-bold text-rose-500 hover:underline">
                    Reset Filters &times;
                </a>
            @endif
        </div>

        <!-- Floating Bulk Action Bar (Active when checkboxes selected) -->
        <div id="bulk-action-bar" class="hidden items-center justify-between px-6 py-3 bg-gradient-to-r from-amber-50 to-orange-50 border-b border-orange-200/80 text-xs text-orange-950 font-bold transition-all">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#EF7415] animate-ping"></span>
                <span><span id="selected-count">0</span> items selected</span>
            </div>
            <button 
                type="button" 
                onclick="submitBulkDelete()"
                class="inline-flex items-center gap-1.5 bg-rose-600 hover:bg-rose-700 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition-colors shadow-xs cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                <span>Delete Selected</span>
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3.5 px-4 w-10 text-center">
                            <input 
                                type="checkbox" 
                                id="selectAllCheckbox" 
                                onchange="toggleSelectAll(this)"
                                class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer"
                            >
                        </th>
                        <th class="py-3.5 px-4 w-16">#ID</th>
                        <th class="py-3.5 px-4 w-20 text-center">Icon / Visual</th>
                        <th class="py-3.5 px-6">Treatment / Procedure</th>
                        <th class="py-3.5 px-6">Department</th>
                        <th class="py-3.5 px-6">Speciality</th>
                        <th class="py-3.5 px-6">Estimated Cost</th>
                        <th class="py-3.5 px-6">Currency</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse ($treatments as $treatment)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-3.5 px-4 text-center">
                                <input 
                                    type="checkbox" 
                                    class="row-checkbox w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer"
                                    value="{{ $treatment->id }}"
                                    onchange="updateSelectionBar()"
                                >
                            </td>
                            <td class="py-3.5 px-4 font-bold text-slate-400">
                                #{{ $treatment->id }}
                            </td>
                            <!-- Icon / Image Preview -->
                            <td class="py-3.5 px-4 text-center">
                                <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-200/80 p-1 flex items-center justify-center mx-auto overflow-hidden shadow-2xs">
                                    @if ($treatment->image)
                                        <img 
                                            src="{{ asset($treatment->image) }}" 
                                            alt="{{ $treatment->name }}" 
                                            class="w-full h-full object-contain"
                                            onerror="this.onerror=null; this.src='https://placehold.co/40x40?text=SVG';"
                                        >
                                    @else
                                        <span class="text-base">💊</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3.5 px-6">
                                <span class="font-bold text-slate-900 text-sm block">
                                    {{ $treatment->name }}
                                </span>
                                @if($treatment->image)
                                    <span class="block text-[10px] text-slate-400 font-mono mt-0.5 truncate max-w-xs">
                                        {{ $treatment->image }}
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-6">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold bg-teal-50 text-[#27797D] border border-teal-200/60">
                                    🏥 {{ $treatment->department->name ?? 'Unassigned' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-6 text-slate-600">
                                {{ $treatment->doctorSpeciality->name ?? 'General' }}
                            </td>
                            <td class="py-3.5 px-6">
                                <span class="font-extrabold text-slate-900 text-sm">
                                    @if($treatment->price_type === 'dollars')
                                        ${{ number_format($treatment->price, 2) }}
                                    @else
                                        ₹{{ number_format($treatment->price, 2) }}
                                    @endif
                                </span>
                            </td>
                            <td class="py-3.5 px-6">
                                @if($treatment->price_type === 'dollars')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-blue-50 text-blue-700 border border-blue-200 uppercase">
                                        USD ($)
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200 uppercase">
                                        INR (₹)
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-6 text-right">
                                <div class="inline-flex items-center gap-1.5">
                                    <!-- Edit Button -->
                                    <button 
                                        type="button" 
                                        onclick="openEditTreatmentModal({{ $treatment->id }}, {{ $treatment->department_id }}, {{ $treatment->spaciality_id ?? 'null' }}, '{{ addslashes($treatment->name) }}', '{{ $treatment->price }}', '{{ $treatment->price_type }}', '{{ $treatment->image ?? '' }}')"
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-[#27797D] hover:bg-teal-50 transition-colors cursor-pointer"
                                        title="Edit Treatment"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </button>

                                    <!-- Delete Button -->
                                    <form id="delete-treatment-{{ $treatment->id }}" action="{{ route('admin.utilities.treatment.destroy', $treatment->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmDelete('delete-treatment-{{ $treatment->id }}', '{{ addslashes($treatment->name) }}')"
                                            class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer"
                                            title="Delete Treatment"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-12 text-center text-slate-400">
                                <div class="max-w-xs mx-auto space-y-2">
                                    <span class="text-3xl block">💊</span>
                                    <p class="font-bold text-slate-700">No treatments found</p>
                                    <p class="text-[11px] text-slate-400">Click "Add Treatment" above to register clinical procedures and costs.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($treatments->hasPages())
            <div class="p-4 sm:p-6 border-t border-slate-100">
                {{ $treatments->links('admin.includes.pagination') }}
            </div>
        @endif

    </div>

</div>

<!-- ==================== MODAL: ADD TREATMENT ==================== -->
<div id="add-treatment-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs overflow-y-auto">
    <div class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-8">
        <div class="bg-gradient-to-r from-[#112347] to-[#27797D] text-white p-5 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center font-bold text-sm">
                    +
                </div>
                <div>
                    <h3 class="text-base font-bold">Add Treatment Procedure</h3>
                    <p class="text-[11px] text-teal-100">Configure surgical procedure, icon visual & baseline pricing</p>
                </div>
            </div>
            <button type="button" onclick="closeAddTreatmentModal()" class="w-7 h-7 rounded-full bg-white/20 hover:bg-white/30 text-white flex items-center justify-center text-xs font-bold transition-colors cursor-pointer">&times;</button>
        </div>

        <form action="{{ route('admin.utilities.treatment.store') }}" method="POST" enctype="multipart/form-data" class="p-5 sm:p-6 space-y-4">
            @csrf

            <!-- Department -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">
                    Clinical Department <span class="text-rose-500">*</span>
                </label>
                <select name="department_id" required class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium cursor-pointer">
                    <option value="">Select Department</option>
                    @foreach ($departments as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Doctor Speciality -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">
                    Doctor Speciality <span class="text-slate-400 font-normal text-[10px]">(Optional)</span>
                </label>
                <select name="spaciality_id" class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium cursor-pointer">
                    <option value="">General / None</option>
                    @foreach ($specialities as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Treatment Name -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">
                    Treatment / Procedure Name <span class="text-rose-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    required 
                    placeholder="e.g. Total Knee Replacement, CABG Heart Bypass, Bone Marrow..." 
                    class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                >
            </div>

            <!-- DUAL ICON SELECTION: Searchable public/icons Dropdown + Upload -->
            <div class="space-y-3 bg-slate-50/70 p-4 rounded-2xl border border-slate-200/80">
                <div class="flex items-center justify-between">
                    <label class="block text-xs font-bold text-slate-800">
                        Procedure Icon / Visual
                    </label>
                    <button 
                        type="button" 
                        onclick="clearIconPicker('add-treat')" 
                        class="text-[11px] font-bold text-rose-500 hover:underline"
                    >
                        Clear Selection &times;
                    </button>
                </div>

                <!-- 1. Searchable Icons Dropdown (from public/icons) -->
                <div class="relative" id="dropdown-wrapper-add-treat">
                    <input type="hidden" name="selected_icon" id="add-treat-selected-icon" value="">

                    <!-- Trigger Button -->
                    <button 
                        type="button" 
                        onclick="toggleIconDropdown('add-treat')"
                        class="w-full bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] text-left flex items-center justify-between transition-all cursor-pointer shadow-2xs"
                    >
                        <div class="flex items-center gap-2.5 truncate" id="add-treat-trigger-content">
                            <span class="w-6 h-6 rounded-lg bg-orange-50 border border-orange-200/60 flex items-center justify-center text-[#EF7415] text-xs shrink-0 font-bold">💊</span>
                            <span class="text-slate-500 font-medium truncate">-- Search & choose from public/icons --</span>
                        </div>
                        <svg class="w-4 h-4 text-slate-400 shrink-0 transition-transform duration-200" id="add-treat-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="add-treat-menu" class="hidden absolute left-0 right-0 top-full mt-1.5 bg-white border border-slate-200 rounded-2xl shadow-xl z-50 p-2.5 space-y-2">
                        <!-- Search Box inside dropdown -->
                        <div class="relative">
                            <input 
                                type="text" 
                                id="add-treat-search-input"
                                placeholder="Search icon (e.g. cardio, bypass, hip, knee, tumor)..." 
                                oninput="filterIcons('add-treat', this.value)"
                                class="w-full bg-slate-50 text-xs px-3 py-2 pl-8 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none font-medium"
                            >
                            <svg class="w-3.5 h-3.5 text-slate-400 absolute left-2.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>

                        <!-- Scrollable Icons Options -->
                        <div class="max-h-48 overflow-y-auto space-y-1 pr-1 custom-scroll" id="add-treat-options-list">
                            @foreach ($publicIcons as $icon)
                                <div 
                                    onclick="selectIcon('add-treat', '{{ $icon['path'] }}', '{{ addslashes($icon['label']) }}', '{{ asset($icon['path']) }}')"
                                    data-search="{{ strtolower($icon['label'] . ' ' . $icon['filename']) }}"
                                    class="icon-option flex items-center gap-3 p-2 rounded-xl hover:bg-teal-50 cursor-pointer transition-colors group"
                                >
                                    <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-white p-1 border border-slate-200 shrink-0 flex items-center justify-center">
                                        <img src="{{ asset($icon['path']) }}" alt="{{ $icon['label'] }}" class="w-full h-full object-contain">
                                    </div>
                                    <div class="min-w-0 flex-1 truncate">
                                        <span class="font-bold text-xs text-slate-800 group-hover:text-[#27797D] block truncate">{{ $icon['label'] }}</span>
                                        <span class="text-[10px] text-slate-400 font-mono block truncate">{{ $icon['filename'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Divider: OR Upload -->
                <div class="relative flex items-center justify-center my-1">
                    <div class="border-t border-slate-200/80 w-full"></div>
                    <span class="bg-slate-50 px-2.5 text-[10px] font-extrabold uppercase tracking-wider text-slate-400 absolute">OR Upload New</span>
                </div>

                <!-- 2. File Upload Input -->
                <div>
                    <input 
                        type="file" 
                        name="image" 
                        id="add-treat-file-input"
                        accept="image/*,.svg"
                        onchange="handleFileUploadChange('add-treat', this)"
                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-3.5 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                    >
                    <p class="text-[10px] text-slate-400 mt-1">Accepts SVG, PNG, JPG, WebP icons (up to 5MB).</p>
                </div>
            </div>

            <!-- Price and Currency -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Base Estimated Price <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="number" 
                        step="0.01" 
                        min="0"
                        name="price" 
                        required 
                        placeholder="e.g. 450000 or 5800" 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Price Type / Currency <span class="text-rose-500">*</span>
                    </label>
                    <select name="price_type" required class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium cursor-pointer">
                        <option value="rupees" selected>₹ Rupees (INR)</option>
                        <option value="dollars">$ Dollars (USD)</option>
                    </select>
                </div>
            </div>

            <div class="pt-2 flex items-center justify-end gap-2.5">
                <button type="button" onclick="closeAddTreatmentModal()" class="px-4 py-2 text-xs font-bold text-slate-500 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2 text-xs font-bold bg-[#EF7415] hover:bg-[#d9640d] text-white rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer">
                    Save Treatment
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ==================== MODAL: EDIT TREATMENT ==================== -->
<div id="edit-treatment-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs overflow-y-auto">
    <div class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-8">
        <div class="bg-gradient-to-r from-[#112347] to-[#27797D] text-white p-5 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center font-bold text-sm">
                    ✎
                </div>
                <div>
                    <h3 class="text-base font-bold">Edit Treatment Procedure</h3>
                    <p class="text-[11px] text-teal-100">Update procedure details, specialty, icon, and pricing</p>
                </div>
            </div>
            <button type="button" onclick="closeEditTreatmentModal()" class="w-7 h-7 rounded-full bg-white/20 hover:bg-white/30 text-white flex items-center justify-center text-xs font-bold transition-colors cursor-pointer">&times;</button>
        </div>

        <form id="edit-treatment-form" action="" method="POST" enctype="multipart/form-data" class="p-5 sm:p-6 space-y-4">
            @csrf
            @method('PUT')

            <!-- Department -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">
                    Clinical Department <span class="text-rose-500">*</span>
                </label>
                <select name="department_id" id="edit-treatment-dept-id" required class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium cursor-pointer">
                    @foreach ($departments as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Doctor Speciality -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">
                    Doctor Speciality <span class="text-slate-400 font-normal text-[10px]">(Optional)</span>
                </label>
                <select name="spaciality_id" id="edit-treatment-spec-id" class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium cursor-pointer">
                    <option value="">General / None</option>
                    @foreach ($specialities as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Treatment Name -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">
                    Treatment / Procedure Name <span class="text-rose-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="edit-treatment-name"
                    required 
                    class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                >
            </div>

            <!-- Current Icon Preview -->
            <div id="edit-treat-current-preview" class="hidden">
                <label class="block text-xs font-bold text-slate-700 mb-1">Current Active Visual</label>
                <div class="flex items-center gap-3 bg-slate-50 p-2.5 rounded-xl border border-slate-200">
                    <div class="w-9 h-9 rounded-lg bg-white p-1 border border-slate-200 shrink-0 flex items-center justify-center">
                        <img id="edit-treat-current-img" src="" alt="Icon" class="w-full h-full object-contain">
                    </div>
                    <span id="edit-treat-current-path" class="text-[11px] text-slate-600 font-mono truncate flex-1"></span>
                </div>
            </div>

            <!-- DUAL ICON SELECTION: Searchable public/icons Dropdown + Upload -->
            <div class="space-y-3 bg-slate-50/70 p-4 rounded-2xl border border-slate-200/80">
                <div class="flex items-center justify-between">
                    <label class="block text-xs font-bold text-slate-800">
                        Choose Different Icon / Visual
                    </label>
                    <button 
                        type="button" 
                        onclick="clearIconPicker('edit-treat')" 
                        class="text-[11px] font-bold text-rose-500 hover:underline"
                    >
                        Clear Selection &times;
                    </button>
                </div>

                <!-- 1. Searchable Icons Dropdown (from public/icons) -->
                <div class="relative" id="dropdown-wrapper-edit-treat">
                    <input type="hidden" name="selected_icon" id="edit-treat-selected-icon" value="">

                    <!-- Trigger Button -->
                    <button 
                        type="button" 
                        onclick="toggleIconDropdown('edit-treat')"
                        class="w-full bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] text-left flex items-center justify-between transition-all cursor-pointer shadow-2xs"
                    >
                        <div class="flex items-center gap-2.5 truncate" id="edit-treat-trigger-content">
                            <span class="w-6 h-6 rounded-lg bg-orange-50 border border-orange-200/60 flex items-center justify-center text-[#EF7415] text-xs shrink-0 font-bold">💊</span>
                            <span class="text-slate-500 font-medium truncate">-- Select from public/icons --</span>
                        </div>
                        <svg class="w-4 h-4 text-slate-400 shrink-0 transition-transform duration-200" id="edit-treat-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="edit-treat-menu" class="hidden absolute left-0 right-0 top-full mt-1.5 bg-white border border-slate-200 rounded-2xl shadow-xl z-50 p-2.5 space-y-2">
                        <!-- Search Box inside dropdown -->
                        <div class="relative">
                            <input 
                                type="text" 
                                id="edit-treat-search-input"
                                placeholder="Search icon (e.g. cardio, bypass, hip, knee, tumor)..." 
                                oninput="filterIcons('edit-treat', this.value)"
                                class="w-full bg-slate-50 text-xs px-3 py-2 pl-8 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none font-medium"
                            >
                            <svg class="w-3.5 h-3.5 text-slate-400 absolute left-2.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>

                        <!-- Scrollable Icons Options -->
                        <div class="max-h-48 overflow-y-auto space-y-1 pr-1 custom-scroll" id="edit-treat-options-list">
                            @foreach ($publicIcons as $icon)
                                <div 
                                    onclick="selectIcon('edit-treat', '{{ $icon['path'] }}', '{{ addslashes($icon['label']) }}', '{{ asset($icon['path']) }}')"
                                    data-search="{{ strtolower($icon['label'] . ' ' . $icon['filename']) }}"
                                    class="icon-option flex items-center gap-3 p-2 rounded-xl hover:bg-teal-50 cursor-pointer transition-colors group"
                                >
                                    <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-white p-1 border border-slate-200 shrink-0 flex items-center justify-center">
                                        <img src="{{ asset($icon['path']) }}" alt="{{ $icon['label'] }}" class="w-full h-full object-contain">
                                    </div>
                                    <div class="min-w-0 flex-1 truncate">
                                        <span class="font-bold text-xs text-slate-800 group-hover:text-[#27797D] block truncate">{{ $icon['label'] }}</span>
                                        <span class="text-[10px] text-slate-400 font-mono block truncate">{{ $icon['filename'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Divider: OR Upload -->
                <div class="relative flex items-center justify-center my-1">
                    <div class="border-t border-slate-200/80 w-full"></div>
                    <span class="bg-slate-50 px-2.5 text-[10px] font-extrabold uppercase tracking-wider text-slate-400 absolute">OR Upload New</span>
                </div>

                <!-- 2. File Upload Input -->
                <div>
                    <input 
                        type="file" 
                        name="image" 
                        id="edit-treat-file-input"
                        accept="image/*,.svg"
                        onchange="handleFileUploadChange('edit-treat', this)"
                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-3.5 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                    >
                    <p class="text-[10px] text-slate-400 mt-1">Leave empty to keep current visual. Accepts SVGs, PNG, JPG, WebP.</p>
                </div>
            </div>

            <!-- Price and Currency -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Base Estimated Price <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="number" 
                        step="0.01" 
                        min="0"
                        name="price" 
                        id="edit-treatment-price"
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    >
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Price Type / Currency <span class="text-rose-500">*</span>
                    </label>
                    <select name="price_type" id="edit-treatment-price-type" required class="w-full bg-slate-50 focus:bg-white text-xs sm:text-sm px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium cursor-pointer">
                        <option value="rupees">₹ Rupees (INR)</option>
                        <option value="dollars">$ Dollars (USD)</option>
                    </select>
                </div>
            </div>

            <div class="pt-2 flex items-center justify-end gap-2.5">
                <button type="button" onclick="closeEditTreatmentModal()" class="px-4 py-2 text-xs font-bold text-slate-500 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2 text-xs font-bold bg-[#27797D] hover:bg-[#1e5f62] text-white rounded-xl shadow-md shadow-[#27797D]/20 transition-all cursor-pointer">
                    Update Treatment
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // All available public icons lookup
    const allPublicIcons = @json($publicIcons);

    function toggleIconDropdown(prefix) {
        const menu = document.getElementById(prefix + '-menu');
        const arrow = document.getElementById(prefix + '-arrow');
        const isOpen = !menu.classList.contains('hidden');

        document.querySelectorAll('[id$="-menu"]').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('[id$="-arrow"]').forEach(el => el.classList.remove('rotate-180'));

        if (!isOpen) {
            menu.classList.remove('hidden');
            if (arrow) arrow.classList.add('rotate-180');
            const searchInput = document.getElementById(prefix + '-search-input');
            if (searchInput) {
                searchInput.value = '';
                filterIcons(prefix, '');
                setTimeout(() => searchInput.focus(), 50);
            }
        }
    }

    function filterIcons(prefix, query) {
        const cleanQuery = query.toLowerCase().trim();
        const options = document.querySelectorAll('#' + prefix + '-options-list .icon-option');

        options.forEach(opt => {
            const searchData = opt.getAttribute('data-search') || '';
            if (!cleanQuery || searchData.includes(cleanQuery)) {
                opt.classList.remove('hidden');
            } else {
                opt.classList.add('hidden');
            }
        });
    }

    function selectIcon(prefix, path, label, url) {
        const hiddenInput = document.getElementById(prefix + '-selected-icon');
        const triggerContent = document.getElementById(prefix + '-trigger-content');
        const menu = document.getElementById(prefix + '-menu');
        const arrow = document.getElementById(prefix + '-arrow');
        const fileInput = document.getElementById(prefix + '-file-input');

        hiddenInput.value = path;

        if (fileInput) fileInput.value = '';

        triggerContent.innerHTML = `
            <div class="w-6 h-6 rounded-md bg-white border border-teal-200 p-0.5 shrink-0 flex items-center justify-center">
                <img src="${url}" class="w-full h-full object-contain" alt="${label}">
            </div>
            <span class="font-bold text-xs text-[#27797D] truncate">${label}</span>
            <span class="text-[10px] text-emerald-600 bg-emerald-50 px-1.5 py-0.5 rounded font-bold ml-auto shrink-0">Selected ✓</span>
        `;

        if (menu) menu.classList.add('hidden');
        if (arrow) arrow.classList.remove('rotate-180');
    }

    function clearIconPicker(prefix) {
        const hiddenInput = document.getElementById(prefix + '-selected-icon');
        const triggerContent = document.getElementById(prefix + '-trigger-content');
        const fileInput = document.getElementById(prefix + '-file-input');

        if (hiddenInput) hiddenInput.value = '';
        if (fileInput) fileInput.value = '';

        if (triggerContent) {
            triggerContent.innerHTML = `
                <span class="w-6 h-6 rounded-lg bg-orange-50 border border-orange-200/60 flex items-center justify-center text-[#EF7415] text-xs shrink-0 font-bold">💊</span>
                <span class="text-slate-500 font-medium truncate">-- Search & choose from public/icons --</span>
            `;
        }
    }

    function handleFileUploadChange(prefix, fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            const hiddenInput = document.getElementById(prefix + '-selected-icon');
            if (hiddenInput) hiddenInput.value = '';

            const triggerContent = document.getElementById(prefix + '-trigger-content');
            if (triggerContent) {
                triggerContent.innerHTML = `
                    <span class="w-6 h-6 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-xs shrink-0 font-bold">📁</span>
                    <span class="text-blue-700 font-bold text-xs truncate">Custom: ${fileInput.files[0].name}</span>
                `;
            }
        }
    }

    // Close dropdown on outside click
    document.addEventListener('click', function(e) {
        if (!e.target.closest('[id^="dropdown-wrapper-"]')) {
            document.querySelectorAll('[id$="-menu"]').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('[id$="-arrow"]').forEach(el => el.classList.remove('rotate-180'));
        }
    });

    function openAddTreatmentModal() {
        clearIconPicker('add-treat');
        const modal = document.getElementById('add-treatment-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeAddTreatmentModal() {
        const modal = document.getElementById('add-treatment-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function openEditTreatmentModal(id, deptId, specId, name, price, priceType, imagePath) {
        clearIconPicker('edit-treat');
        const modal = document.getElementById('edit-treatment-modal');
        const form = document.getElementById('edit-treatment-form');
        const deptSelect = document.getElementById('edit-treatment-dept-id');
        const specSelect = document.getElementById('edit-treatment-spec-id');
        const nameInput = document.getElementById('edit-treatment-name');
        const priceInput = document.getElementById('edit-treatment-price');
        const priceTypeSelect = document.getElementById('edit-treatment-price-type');
        const currentPreview = document.getElementById('edit-treat-current-preview');
        const currentImg = document.getElementById('edit-treat-current-img');
        const currentPath = document.getElementById('edit-treat-current-path');

        form.action = "{{ url('/admin/utilities/treatment') }}/" + id;
        deptSelect.value = deptId;
        specSelect.value = specId || '';
        nameInput.value = name;
        priceInput.value = price;
        priceTypeSelect.value = priceType;

        if (imagePath) {
            const assetUrl = "{{ asset('') }}" + imagePath;
            currentImg.src = assetUrl;
            currentPath.textContent = imagePath;
            currentPreview.classList.remove('hidden');

            const matched = allPublicIcons.find(ic => ic.path === imagePath);
            if (matched) {
                selectIcon('edit-treat', matched.path, matched.label, matched.url);
            }
        } else {
            currentPreview.classList.add('hidden');
            currentImg.src = '';
            currentPath.textContent = '';
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditTreatmentModal() {
        const modal = document.getElementById('edit-treatment-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Bulk selection logic
    function toggleSelectAll(master) {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(cb => cb.checked = master.checked);
        updateSelectionBar();
    }

    function updateSelectionBar() {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        const checked = document.querySelectorAll('.row-checkbox:checked');
        const countSpan = document.getElementById('selected-count');
        const bar = document.getElementById('bulk-action-bar');
        const master = document.getElementById('selectAllCheckbox');

        if (countSpan) countSpan.textContent = checked.length;

        if (checked.length > 0) {
            bar.classList.remove('hidden');
            bar.classList.add('flex');
        } else {
            bar.classList.add('hidden');
            bar.classList.remove('flex');
        }

        if (master) {
            master.checked = checkboxes.length > 0 && checked.length === checkboxes.length;
            master.indeterminate = checked.length > 0 && checked.length < checkboxes.length;
        }
    }

    function submitBulkDelete() {
        const checked = document.querySelectorAll('.row-checkbox:checked');
        if (checked.length === 0) return;

        Swal.fire({
            title: `Delete ${checked.length} treatments?`,
            text: 'Selected treatments and procedures will be permanently removed.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#94A3B8',
            confirmButtonText: 'Yes, delete all',
            cancelButtonText: 'Cancel',
            borderRadius: '1.25rem'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('bulk-delete-form');
                form.querySelectorAll('input[name="ids[]"]').forEach(el => el.remove());

                checked.forEach(cb => {
                    const hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = 'ids[]';
                    hidden.value = cb.value;
                    form.appendChild(hidden);
                });

                form.submit();
            }
        });
    }
</script>
@endpush
@endsection
