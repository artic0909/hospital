<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReviewController extends Controller
{
    protected function getHospital()
    {
        $partner = Auth::guard('partner')->user();
        $hospital = $partner ? $partner->getHospital() : null;

        if (!$hospital) {
            abort(404, 'No active hospital profile assigned to your partner account.');
        }

        return $hospital;
    }

    public function index(Request $request): View
    {
        $hospital = $this->getHospital();
        $query = Review::where('hospital_id', $hospital->id);

        if ($request->filled('rating')) {
            $query->where('rating', (int)$request->rating);
        }

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('review', 'like', "%{$search}%")
                  ->orWhere('designation_or_country', 'like', "%{$search}%");
            });
        }

        $perPage = $request->get('per_page', 10);
        if ($perPage === 'all') {
            $reviews = $query->latest()->paginate(99999)->withQueryString();
        } else {
            $perPage = in_array((int)$perPage, [10, 20, 50, 100], true) ? (int)$perPage : 10;
            $reviews = $query->latest()->paginate($perPage)->withQueryString();
        }

        $avgRating = Review::where('hospital_id', $hospital->id)->avg('rating') ?: 5.0;
        $totalReviews = Review::where('hospital_id', $hospital->id)->count();

        return view('partner.review.index', compact('hospital', 'reviews', 'avgRating', 'totalReviews'));
    }

    public function store(Request $request): RedirectResponse
    {
        $hospital = $this->getHospital();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'review' => ['required', 'string'],
            'designation_or_country' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'boolean'],
        ]);

        Review::create([
            'hospital_id' => $hospital->id,
            'name' => $validated['name'],
            'rating' => (int)$validated['rating'],
            'review' => $validated['review'],
            'designation_or_country' => $validated['designation_or_country'] ?? null,
            'status' => $request->boolean('status', true),
        ]);

        return back()->with('success', "Patient review from '{$validated['name']}' published successfully!");
    }

    public function update(Request $request, Review $review): RedirectResponse
    {
        $hospital = $this->getHospital();
        abort_if($review->hospital_id !== $hospital->id, 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'review' => ['required', 'string'],
            'designation_or_country' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'boolean'],
        ]);

        $review->update([
            'name' => $validated['name'],
            'rating' => (int)$validated['rating'],
            'review' => $validated['review'],
            'designation_or_country' => $validated['designation_or_country'] ?? null,
            'status' => $request->boolean('status', true),
        ]);

        return back()->with('success', "Review updated successfully!");
    }

    public function destroy(Review $review): RedirectResponse
    {
        $hospital = $this->getHospital();
        abort_if($review->hospital_id !== $hospital->id, 403);

        $review->delete();

        return back()->with('success', 'Review deleted successfully!');
    }

    public function bulkDelete(Request $request): RedirectResponse
    {
        $hospital = $this->getHospital();
        $ids = $request->input('selected_ids', []);

        if (empty($ids) || !is_array($ids)) {
            return back()->with('error', 'Please select at least one review to delete.');
        }

        $count = Review::where('hospital_id', $hospital->id)->whereIn('id', $ids)->delete();

        return back()->with('success', "{$count} review(s) deleted successfully!");
    }
}
