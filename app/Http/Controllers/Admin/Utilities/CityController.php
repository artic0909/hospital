<?php

namespace App\Http\Controllers\Admin\Utilities;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{
    /**
     * Display a listing of the cities.
     */
    public function index(Request $request): View
    {
        $query = City::with(['state.country'])->latest();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('state', function ($sq) use ($search) {
                      $sq->where('name', 'like', "%{$search}%")
                         ->orWhereHas('country', fn($cq) => $cq->where('name', 'like', "%{$search}%"));
                  });
            });
        }

        if ($request->filled('state_id')) {
            $query->where('state_id', $request->state_id);
        }

        $perPageInput = $request->input('per_page', 10);
        if ($perPageInput === 'all') {
            $totalCount = $query->count();
            $cities = $query->paginate($totalCount > 0 ? $totalCount : 10)->withQueryString();
        } else {
            $perPage = in_array((int)$perPageInput, [10, 20, 50, 100], true) ? (int)$perPageInput : 10;
            $cities = $query->paginate($perPage)->withQueryString();
        }

        $states = State::with('country')->orderBy('name')->get();

        return view('admin.utilities.city', compact('cities', 'states'));
    }

    /**
     * Store a newly created city in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'state_id' => ['required', 'exists:states,id'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $city = City::create($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'City "' . $city->name . '" created successfully!',
                'data' => $city->load('state.country'),
            ]);
        }

        return back()->with('success', 'City "' . $city->name . '" created successfully!');
    }

    /**
     * Update the specified city in storage.
     */
    public function update(Request $request, City $city): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'state_id' => ['required', 'exists:states,id'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $city->update($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'City updated successfully!',
                'data' => $city->load('state.country'),
            ]);
        }

        return back()->with('success', 'City updated successfully!');
    }

    /**
     * Remove the specified city from storage.
     */
    public function destroy(Request $request, City $city): JsonResponse|RedirectResponse
    {
        $name = $city->name;
        $city->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'City "' . $name . '" deleted successfully!',
            ]);
        }

        return back()->with('success', 'City "' . $name . '" deleted successfully!');
    }

    /**
     * Bulk delete selected cities.
     */
    public function bulkDelete(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['exists:cities,id'],
        ], [
            'ids.required' => 'Please select at least one city to delete.',
        ]);

        $count = City::whereIn('id', $validated['ids'])->delete();

        $msg = "{$count} " . ($count === 1 ? 'city' : 'cities') . ' deleted successfully!';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $msg,
            ]);
        }

        return back()->with('success', $msg);
    }
}
