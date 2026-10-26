<?php

namespace App\Http\Controllers\Admin\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StateController extends Controller
{
    /**
     * Display a listing of the states.
     */
    public function index(Request $request): View
    {
        $query = State::with('country')->withCount('cities')->latest();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('country', fn($sq) => $sq->where('name', 'like', "%{$search}%"));
            });
        }

        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        $perPageInput = $request->input('per_page', 10);
        if ($perPageInput === 'all') {
            $totalCount = $query->count();
            $states = $query->paginate($totalCount > 0 ? $totalCount : 10)->withQueryString();
        } else {
            $perPage = in_array((int)$perPageInput, [10, 20, 50, 100], true) ? (int)$perPageInput : 10;
            $states = $query->paginate($perPage)->withQueryString();
        }

        $countries = Country::orderBy('name')->get();

        return view('admin.utilities.state', compact('states', 'countries'));
    }

    /**
     * Store a newly created state in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'country_id' => ['required', 'exists:countries,id'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $state = State::create($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'State "' . $state->name . '" created successfully!',
                'data' => $state->load('country'),
            ]);
        }

        return back()->with('success', 'State "' . $state->name . '" created successfully!');
    }

    /**
     * Update the specified state in storage.
     */
    public function update(Request $request, State $state): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'country_id' => ['required', 'exists:countries,id'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $state->update($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'State updated successfully!',
                'data' => $state->load('country'),
            ]);
        }

        return back()->with('success', 'State updated successfully!');
    }

    /**
     * Remove the specified state from storage.
     */
    public function destroy(Request $request, State $state): JsonResponse|RedirectResponse
    {
        $name = $state->name;
        $state->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'State "' . $name . '" deleted successfully!',
            ]);
        }

        return back()->with('success', 'State "' . $name . '" deleted successfully!');
    }

    /**
     * Bulk delete selected states.
     */
    public function bulkDelete(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['exists:states,id'],
        ], [
            'ids.required' => 'Please select at least one state to delete.',
        ]);

        $count = State::whereIn('id', $validated['ids'])->delete();

        $msg = "{$count} " . ($count === 1 ? 'state' : 'states') . ' deleted successfully!';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $msg,
            ]);
        }

        return back()->with('success', $msg);
    }
}
