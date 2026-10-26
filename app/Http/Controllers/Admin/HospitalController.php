<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Hospital;
use App\Models\HospitalCategory;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class HospitalController extends Controller
{
    /**
     * Display a listing of hospitals with pagination, search, and per-page limits.
     */
    public function index(Request $request): View
    {
        $query = Hospital::with(['country', 'state', 'city', 'category'])->latest();

        // Search by name, code, contact, email, or city name
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%")
                  ->orWhere('contact', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhereHas('city', function ($cq) use ($search) {
                      $cq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by Category
        if ($request->filled('hospital_category_id')) {
            $query->where('hospital_category_id', $request->hospital_category_id);
        }

        // Filter by Country
        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        // Filter by Status
        if ($request->filled('status')) {
            $query->where('status', (bool)$request->status);
        }

        // Dynamic Per-Page (10, 20, 50, 100, all)
        $perPageInput = $request->input('per_page', 10);
        if ($perPageInput === 'all') {
            $totalCount = $query->count();
            $hospitals = $query->paginate($totalCount > 0 ? $totalCount : 10)->withQueryString();
        } else {
            $perPage = in_array((int)$perPageInput, [10, 20, 50, 100], true) ? (int)$perPageInput : 10;
            $hospitals = $query->paginate($perPage)->withQueryString();
        }

        $categories = HospitalCategory::orderBy('name')->get();
        $countries = Country::orderBy('name')->get();

        return view('admin.hospital.index', compact('hospitals', 'categories', 'countries'));
    }

    /**
     * Show the form for creating a new hospital.
     */
    public function create(): View
    {
        $countries = Country::orderBy('name')->get();
        $categories = HospitalCategory::orderBy('name')->get();

        return view('admin.hospital.create', compact('countries', 'categories'));
    }

    /**
     * Store a newly created hospital in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:50', 'unique:hospitals,contact'],
            'email' => ['nullable', 'email', 'max:255', 'unique:hospitals,email'],
            'country_id' => ['required', 'exists:countries,id'],
            'state_id' => ['required', 'exists:states,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'address' => ['required', 'string'],
            'establish_year' => ['required', 'integer', 'min:1800', 'max:' . (date('Y') + 1)],
            'hospital_category_id' => ['required', 'exists:hospital_categories,id'],
            'no_of_bed' => ['required', 'integer', 'min:0'],
            'about' => ['nullable', 'string'],
            'password' => ['required', 'string', 'min:6'],
            'status' => ['nullable', 'boolean'],
        ]);

        $validated['status'] = $request->has('status');

        $hospital = Hospital::create($validated);

        return redirect()->route('admin.hospital.index')->with('success', "Hospital \"{$hospital->name}\" ({$hospital->code}) registered successfully!");
    }

    /**
     * Display the specified hospital details.
     */
    public function show(Hospital $hospital): View
    {
        $hospital->load(['country', 'state', 'city', 'category']);

        return view('admin.hospital.view', compact('hospital'));
    }

    /**
     * Show the form for editing the specified hospital.
     */
    public function edit(Hospital $hospital): View
    {
        $hospital->load(['country', 'state', 'city', 'category']);

        $countries = Country::orderBy('name')->get();
        $categories = HospitalCategory::orderBy('name')->get();
        $states = State::where('country_id', $hospital->country_id)->orderBy('name')->get();
        $cities = City::where('state_id', $hospital->state_id)->orderBy('name')->get();

        return view('admin.hospital.update', compact('hospital', 'countries', 'categories', 'states', 'cities'));
    }

    /**
     * Update the specified hospital in storage.
     */
    public function update(Request $request, Hospital $hospital): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:50', Rule::unique('hospitals', 'contact')->ignore($hospital->id)],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('hospitals', 'email')->ignore($hospital->id)],
            'country_id' => ['required', 'exists:countries,id'],
            'state_id' => ['required', 'exists:states,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'address' => ['required', 'string'],
            'establish_year' => ['required', 'integer', 'min:1800', 'max:' . (date('Y') + 1)],
            'hospital_category_id' => ['required', 'exists:hospital_categories,id'],
            'no_of_bed' => ['required', 'integer', 'min:0'],
            'about' => ['nullable', 'string'],
            'password' => ['nullable', 'string', 'min:6'],
            'status' => ['nullable', 'boolean'],
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $validated['status'] = $request->has('status');

        $hospital->update($validated);

        return redirect()->route('admin.hospital.index')->with('success', "Hospital \"{$hospital->name}\" updated successfully!");
    }

    /**
     * Remove the specified hospital from storage.
     */
    public function destroy(Hospital $hospital): RedirectResponse
    {
        $name = $hospital->name;
        $code = $hospital->code;
        $hospital->delete();

        return back()->with('success', "Hospital \"{$name}\" ({$code}) deleted successfully!");
    }

    /**
     * Bulk delete hospitals.
     */
    public function bulkDelete(Request $request): RedirectResponse
    {
        $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['exists:hospitals,id'],
        ]);

        $count = Hospital::whereIn('id', $request->ids)->delete();

        return back()->with('success', "{$count} hospital(s) deleted successfully!");
    }

    /**
     * AJAX helper: Get states by country.
     */
    public function getStates(Country $country): JsonResponse
    {
        $states = State::where('country_id', $country->id)->orderBy('name')->get(['id', 'name']);
        return response()->json($states);
    }

    /**
     * AJAX helper: Get cities by state.
     */
    public function getCities(State $state): JsonResponse
    {
        $cities = City::where('state_id', $state->id)->orderBy('name')->get(['id', 'name']);
        return response()->json($cities);
    }
}
