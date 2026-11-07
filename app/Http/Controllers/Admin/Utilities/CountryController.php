<?php

namespace App\Http\Controllers\Admin\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CountryController extends Controller
{
    /**
     * Display a listing of the countries.
     */
    public function index(Request $request): View
    {
        $query = Country::withCount(['states', 'hospitals'])->latest();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where('name', 'like', "%{$search}%");
        }

        $perPageInput = $request->input('per_page', 10);
        if ($perPageInput === 'all') {
            $totalCount = $query->count();
            $countries = $query->paginate($totalCount > 0 ? $totalCount : 10)->withQueryString();
        } else {
            $perPage = in_array((int)$perPageInput, [10, 20, 50, 100], true) ? (int)$perPageInput : 10;
            $countries = $query->paginate($perPage)->withQueryString();
        }

        return view('admin.utilities.country', compact('countries'));
    }

    /**
     * Store a newly created country in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:countries,name'],
            'show_in_header' => ['nullable', 'boolean'],
        ]);

        $validated['show_in_header'] = $request->has('show_in_header');

        $country = Country::create($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Country "' . $country->name . '" created successfully!',
                'data' => $country,
            ]);
        }

        return back()->with('success', 'Country "' . $country->name . '" created successfully!');
    }

    /**
     * Update the specified country in storage.
     */
    public function update(Request $request, Country $country): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:countries,name,' . $country->id],
            'show_in_header' => ['nullable', 'boolean'],
        ]);

        $validated['show_in_header'] = $request->has('show_in_header');

        $country->update($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Country updated successfully!',
                'data' => $country,
            ]);
        }

        return back()->with('success', 'Country updated successfully!');
    }

    /**
     * Toggle country visibility in the frontend header.
     */
    public function toggleHeader(Country $country): JsonResponse|RedirectResponse
    {
        $country->update([
            'show_in_header' => !$country->show_in_header,
        ]);

        $statusText = $country->show_in_header ? 'enabled for' : 'removed from';
        $message = "Country \"{$country->name}\" {$statusText} frontend header navigation!";

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'show_in_header' => $country->show_in_header,
                'message' => $message,
            ]);
        }

        return back()->with('success', $message);
    }

    /**
     * Remove the specified country from storage.
     */
    public function destroy(Request $request, Country $country): JsonResponse|RedirectResponse
    {
        $name = $country->name;
        $country->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Country "' . $name . '" deleted successfully!',
            ]);
        }

        return back()->with('success', 'Country "' . $name . '" deleted successfully!');
    }

    /**
     * Bulk delete selected countries.
     */
    public function bulkDelete(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['exists:countries,id'],
        ], [
            'ids.required' => 'Please select at least one country to delete.',
        ]);

        $count = Country::whereIn('id', $validated['ids'])->delete();

        $msg = "{$count} " . ($count === 1 ? 'country' : 'countries') . ' deleted successfully!';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $msg,
            ]);
        }

        return back()->with('success', $msg);
    }
}
