@extends('partner.layouts.app')

@section('title', 'Patient Reviews - ' . $hospital->name)

@section('content')
<div class="space-y-6">

    <!-- Header & Action Ribbon -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('partner.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="text-slate-400">Patient Reviews</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Patient Reviews & Testimonials</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage patient satisfaction testimonials, treatment feedback, and 5-star ratings for <strong>{{ $hospital->name }}</strong>.</p>
        </div>

        <div class="flex items-center gap-3">
            <div class="hidden sm:flex items-center gap-2 px-3.5 py-2 bg-amber-50 rounded-2xl border border-amber-200/80">
                <span class="text-amber-500 text-lg">★</span>
                <div>
                    <div class="text-xs font-black text-amber-900 leading-none">{{ number_format($avgRating, 1) }} / 5.0</div>
                    <div class="text-[10px] text-amber-700 font-medium">{{ $totalReviews }} Reviews</div>
                </div>
            </div>

            <button 
                type="button" 
                onclick="openCreateReviewModal()"
                class="inline-flex items-center gap-2 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all transform hover:-translate-y-0.5 cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span>Add Review</span>
            </button>
        </div>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-xs space-y-3">
        <form action="{{ route('partner.review.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            <!-- Search -->
            <div class="sm:col-span-6 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search review by patient name, country, or keyword..." 
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 pl-9 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                >
                <div class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <!-- Rating Filter -->
            <div class="sm:col-span-3">
                <select 
                    name="rating" 
                    onchange="this.form.submit()"
                    class="w-full bg-slate-50 focus:bg-white text-xs px-3 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-semibold text-slate-700 cursor-pointer"
                >
                    <option value="">All Ratings</option>
                    <option value="5" {{ request('rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ 5 Stars</option>
                    <option value="4" {{ request('rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ 4 Stars</option>
                    <option value="3" {{ request('rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ 3 Stars</option>
                    <option value="2" {{ request('rating') == '2' ? 'selected' : '' }}>⭐⭐ 2 Stars</option>
                    <option value="1" {{ request('rating') == '1' ? 'selected' : '' }}>⭐ 1 Star</option>
                </select>
            </div>

            <!-- Per Page Dropdown -->
            <div class="sm:col-span-3 flex items-center justify-end gap-2">
                <span class="text-xs text-slate-400 font-bold whitespace-nowrap">Show:</span>
                <select 
                    name="per_page" 
                    onchange="this.form.submit()"
                    class="bg-slate-50 focus:bg-white text-xs px-2.5 py-2 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none font-bold text-slate-700 cursor-pointer"
                >
                    <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                    <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>20</option>
                    <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('per_page') == '100' ? 'selected' : '' }}>100</option>
                    <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>All</option>
                </select>

                @if(request()->hasAny(['search', 'rating', 'per_page']))
                    <a 
                        href="{{ route('partner.review.index') }}" 
                        class="p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition-colors cursor-pointer"
                        title="Reset Filters"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                @endif
            </div>
        </form>

        <!-- Bulk Action Bar -->
        <div id="bulk-action-bar" class="hidden items-center justify-between p-2.5 bg-rose-50 border border-rose-200 rounded-xl text-xs">
            <div class="flex items-center gap-2 text-rose-800 font-bold">
                <span>Selected:</span>
                <span id="selected-count" class="bg-rose-600 text-white px-2 py-0.5 rounded-md text-[11px]">0</span>
                <span>reviews</span>
            </div>
            <button 
                type="button" 
                onclick="confirmBulkDelete()"
                class="px-3 py-1.5 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs transition-colors cursor-pointer"
            >
                Delete Selected
            </button>
        </div>
    </div>

    <!-- Reviews Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200/70 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3.5 px-4 w-10 text-center">
                            <input type="checkbox" id="select-all" class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer">
                        </th>
                        <th class="py-3.5 px-4">Patient / Reviewer</th>
                        <th class="py-3.5 px-4 w-32">Rating</th>
                        <th class="py-3.5 px-4">Testimonial</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4">Date</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($reviews as $rev)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-3.5 px-4 text-center">
                                <input type="checkbox" name="ids[]" value="{{ $rev->id }}" class="row-checkbox w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer">
                            </td>
                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-teal-50 border border-teal-200 text-[#27797D] font-bold text-xs flex items-center justify-center shrink-0">
                                        {{ strtoupper(substr($rev->name, 0, 1)) }}
                                    </div>
                                    <div class="truncate">
                                        <div class="font-bold text-[#112347]">{{ $rev->name }}</div>
                                        @if($rev->designation_or_country)
                                            <div class="text-[10px] text-slate-400">{{ $rev->designation_or_country }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-4">
                                <div class="flex items-center text-amber-400 text-sm">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span>{{ $i <= $rev->rating ? '★' : '☆' }}</span>
                                    @endfor
                                    <span class="text-slate-400 text-[10px] ml-1 font-bold">({{ $rev->rating }})</span>
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-slate-700 max-w-md">
                                <p class="line-clamp-2 text-xs leading-relaxed">{{ $rev->review }}</p>
                            </td>
                            <td class="py-3.5 px-4">
                                @if($rev->status)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        Published
                                    </span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-500">
                                        Pending
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-slate-400 text-[11px] whitespace-nowrap">
                                {{ $rev->created_at->format('M d, Y') }}
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <div class="inline-flex items-center gap-1.5">
                                    <button 
                                        type="button" 
                                        onclick="openEditReviewModal({{ $rev->id }}, '{{ addslashes($rev->name) }}', {{ $rev->rating }}, '{{ addslashes($rev->review) }}', '{{ addslashes($rev->designation_or_country ?? '') }}', {{ $rev->status ? 1 : 0 }})"
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-amber-50 transition-colors cursor-pointer"
                                        title="Edit Review"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </button>

                                    <form id="delete-rev-{{ $rev->id }}" action="{{ route('partner.review.destroy', $rev->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="confirmDelete('delete-rev-{{ $rev->id }}', '{{ addslashes($rev->name) }}')"
                                            class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer"
                                            title="Delete Review"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-12 px-4 text-slate-400">
                                <span class="text-3xl block mb-2">⭐</span>
                                <div class="font-bold text-slate-600 text-sm">No reviews published yet</div>
                                <p class="text-xs text-slate-400 mt-1">Add patient feedback to build trust with prospective international patients.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($reviews->hasPages())
            <div class="p-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                <span class="text-xs text-slate-500 font-semibold">
                    Showing {{ $reviews->firstItem() }} to {{ $reviews->lastItem() }} of {{ $reviews->total() }} reviews
                </span>
                <div>
                    {{ $reviews->links('admin.includes.pagination') }}
                </div>
            </div>
        @endif
    </div>

    <!-- Hidden Bulk Delete Form -->
    <form id="bulk-delete-form" action="{{ route('partner.review.bulk-delete') }}" method="POST" class="hidden">
        @csrf
        <div id="bulk-delete-inputs"></div>
    </form>

    <!-- Create Review Modal -->
    <div id="create-review-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full border border-slate-200 shadow-2xl p-6 sm:p-7 space-y-5 animate-in fade-in zoom-in-95 duration-150">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 font-bold text-sm flex items-center justify-center">⭐</span>
                    <h3 class="text-base font-extrabold text-[#112347]">Add Patient Review</h3>
                </div>
                <button type="button" onclick="closeCreateReviewModal()" class="text-slate-400 hover:text-slate-600 text-xl font-bold">&times;</button>
            </div>

            <form action="{{ route('partner.review.store') }}" method="POST" class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            Patient Name <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            required 
                            placeholder="e.g. Ahmed Al-Mansoor, Sarah Jenkins..." 
                            class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                        >
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            Country / City <span class="text-slate-400 text-[10px] font-normal">(Optional)</span>
                        </label>
                        <input 
                            type="text" 
                            name="designation_or_country" 
                            placeholder="e.g. Dubai, UAE / Cardiac Patient" 
                            class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                        >
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Rating Score <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="rating" 
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-bold text-amber-600 cursor-pointer"
                    >
                        <option value="5">★★★★★ - 5 Stars (Exceptional)</option>
                        <option value="4">★★★★☆ - 4 Stars (Very Good)</option>
                        <option value="3">★★★☆☆ - 3 Stars (Average)</option>
                        <option value="2">★★☆☆☆ - 2 Stars (Needs Improvement)</option>
                        <option value="1">★☆☆☆☆ - 1 Star (Poor)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Patient Testimonial / Experience <span class="text-rose-500">*</span>
                    </label>
                    <textarea 
                        name="review" 
                        rows="4" 
                        required 
                        placeholder="Write patient treatment experience, nursing care, doctor bedside manner, and overall recovery experience..." 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    ></textarea>
                </div>

                <div class="flex items-center gap-2">
                    <input 
                        type="checkbox" 
                        name="status" 
                        id="status_cb" 
                        value="1" 
                        checked 
                        class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer"
                    >
                    <label for="status_cb" class="text-xs font-bold text-slate-700 cursor-pointer">
                        Publish immediately on hospital profile
                    </label>
                </div>

                <div class="flex items-center justify-end gap-2.5 pt-2 border-t border-slate-100">
                    <button 
                        type="button" 
                        onclick="closeCreateReviewModal()" 
                        class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="px-5 py-2 text-xs font-bold bg-[#EF7415] hover:bg-[#d9640d] text-white rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                    >
                        Publish Review
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Review Modal -->
    <div id="edit-review-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full border border-slate-200 shadow-2xl p-6 sm:p-7 space-y-5 animate-in fade-in zoom-in-95 duration-150">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 font-bold text-sm flex items-center justify-center">✏️</span>
                    <h3 class="text-base font-extrabold text-[#112347]">Edit Patient Review</h3>
                </div>
                <button type="button" onclick="closeEditReviewModal()" class="text-slate-400 hover:text-slate-600 text-xl font-bold">&times;</button>
            </div>

            <form id="edit-review-form" action="" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            Patient Name <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="edit-review-name"
                            required 
                            class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                        >
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            Country / City
                        </label>
                        <input 
                            type="text" 
                            name="designation_or_country" 
                            id="edit-review-country"
                            class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                        >
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Rating Score <span class="text-rose-500">*</span>
                    </label>
                    <select 
                        name="rating" 
                        id="edit-review-rating"
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-bold text-amber-600 cursor-pointer"
                    >
                        <option value="5">★★★★★ - 5 Stars</option>
                        <option value="4">★★★★☆ - 4 Stars</option>
                        <option value="3">★★★☆☆ - 3 Stars</option>
                        <option value="2">★★☆☆☆ - 2 Stars</option>
                        <option value="1">★☆☆☆☆ - 1 Star</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Patient Testimonial <span class="text-rose-500">*</span>
                    </label>
                    <textarea 
                        name="review" 
                        id="edit-review-text"
                        rows="4" 
                        required 
                        class="w-full bg-slate-50 focus:bg-white text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:border-[#27797D] focus:outline-none transition-all font-medium"
                    ></textarea>
                </div>

                <div class="flex items-center gap-2">
                    <input 
                        type="checkbox" 
                        name="status" 
                        id="edit-review-status" 
                        value="1" 
                        class="w-4 h-4 rounded text-[#27797D] focus:ring-[#27797D] border-slate-300 cursor-pointer"
                    >
                    <label for="edit-review-status" class="text-xs font-bold text-slate-700 cursor-pointer">
                        Published
                    </label>
                </div>

                <div class="flex items-center justify-end gap-2.5 pt-2 border-t border-slate-100">
                    <button 
                        type="button" 
                        onclick="closeEditReviewModal()" 
                        class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="px-5 py-2 text-xs font-bold bg-[#EF7415] hover:bg-[#d9640d] text-white rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                    >
                        Update Review
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@push('scripts')
<script>
    function openCreateReviewModal() {
        document.getElementById('create-review-modal').classList.remove('hidden');
    }

    function closeCreateReviewModal() {
        document.getElementById('create-review-modal').classList.add('hidden');
    }

    function openEditReviewModal(id, name, rating, reviewText, country, status) {
        document.getElementById('edit-review-form').action = `/partner/review/${id}`;
        document.getElementById('edit-review-name').value = name;
        document.getElementById('edit-review-rating').value = rating;
        document.getElementById('edit-review-text').value = reviewText;
        document.getElementById('edit-review-country').value = country;
        document.getElementById('edit-review-status').checked = (status === 1 || status === true);
        document.getElementById('edit-review-modal').classList.remove('hidden');
    }

    function closeEditReviewModal() {
        document.getElementById('edit-review-modal').classList.add('hidden');
    }

    const selectAll = document.getElementById('select-all');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const bulkBar = document.getElementById('bulk-action-bar');
    const selectedCount = document.getElementById('selected-count');

    function updateBulkBar() {
        const checked = document.querySelectorAll('.row-checkbox:checked');
        if (checked.length > 0) {
            bulkBar.classList.remove('hidden');
            bulkBar.classList.add('flex');
            selectedCount.textContent = checked.length;
        } else {
            bulkBar.classList.add('hidden');
            bulkBar.classList.remove('flex');
        }
    }

    if (selectAll) {
        selectAll.addEventListener('change', function () {
            rowCheckboxes.forEach(cb => cb.checked = selectAll.checked);
            updateBulkBar();
        });
    }

    rowCheckboxes.forEach(cb => {
        cb.addEventListener('change', function () {
            updateBulkBar();
            if (selectAll) {
                selectAll.checked = document.querySelectorAll('.row-checkbox:checked').length === rowCheckboxes.length;
            }
        });
    });

    function confirmDelete(formId, name) {
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: `Delete review from ${name}?`,
                text: "This patient review will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF7415',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, delete',
                borderRadius: '16px'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        } else {
            if (confirm(`Delete review from ${name}? This patient review will be permanently deleted.`)) {
                document.getElementById(formId).submit();
            }
        }
    }

    function confirmBulkDelete() {
        const checked = document.querySelectorAll('.row-checkbox:checked');
        if (checked.length === 0) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'info',
                    title: 'No Selection',
                    text: 'Please select at least one review to delete.',
                    confirmButtonColor: '#27797D'
                });
            } else {
                alert('Please select at least one review to delete.');
            }
            return;
        }

        const executeBulk = () => {
            const container = document.getElementById('bulk-delete-inputs');
            container.innerHTML = '';
            checked.forEach(cb => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selected_ids[]';
                input.value = cb.value;
                container.appendChild(input);
            });
            document.getElementById('bulk-delete-form').submit();
        };

        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: `Delete ${checked.length} selected reviews?`,
                text: "All selected patient reviews will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF7415',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, delete selected',
                borderRadius: '16px'
            }).then((result) => {
                if (result.isConfirmed) {
                    executeBulk();
                }
            });
        } else {
            if (confirm(`Delete ${checked.length} selected reviews?`)) {
                executeBulk();
            }
        }
    }
</script>
@endpush
@endsection
