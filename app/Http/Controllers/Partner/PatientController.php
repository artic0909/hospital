<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Patient;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class PatientController extends Controller
{
    /**
     * Get authenticated partner.
     */
    protected function getPartner()
    {
        $partner = Auth::guard('partner')->user();
        if (!$partner) {
            abort(401, 'Unauthorized partner session.');
        }
        return $partner;
    }

    /**
     * Authorize that the patient belongs to current partner.
     */
    protected function authorizePatient(Patient $patient): void
    {
        if ($patient->partner_id !== $this->getPartner()->id) {
            abort(403, 'You do not have permission to access this patient profile.');
        }
    }

    /**
     * Display a listing of patients.
     */
    public function index(Request $request): View
    {
        $partner = $this->getPartner();
        $query = Patient::withCount('reports')->where('partner_id', $partner->id);

        // Search filter
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('state', 'like', "%{$search}%");
            });
        }

        // Country filter
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // Pagination
        $perPage = $request->get('per_page', 10);
        if ($perPage === 'all') {
            $patients = $query->latest()->paginate(99999)->withQueryString();
        } else {
            $perPage = in_array((int)$perPage, [10, 20, 50, 100], true) ? (int)$perPage : 10;
            $patients = $query->latest()->paginate($perPage)->withQueryString();
        }

        // Aggregate statistics
        $stats = [
            'total' => Patient::where('partner_id', $partner->id)->count(),
            'with_reports' => Patient::where('partner_id', $partner->id)->has('reports')->count(),
            'total_reports' => \App\Models\Report::whereHas('patient', function ($q) use ($partner) {
                $q->where('partner_id', $partner->id);
            })->count(),
            'this_month' => Patient::where('partner_id', $partner->id)
                ->where('created_at', '>=', now()->startOfMonth())
                ->count(),
        ];

        // Unique countries present in patient pool for quick filtering
        $filterCountries = Patient::where('partner_id', $partner->id)
            ->whereNotNull('country')
            ->where('country', '!=', '')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        return view('partner.patient.index', compact('partner', 'patients', 'stats', 'filterCountries'));
    }

    /**
     * Show the form for creating a new patient.
     */
    public function create(): View
    {
        $partner = $this->getPartner();
        $countries = Country::orderBy('name')->get();

        return view('partner.patient.create', compact('partner', 'countries'));
    }

    /**
     * Store a newly created patient in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $partner = $this->getPartner();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:1000'],
            'image' => [
                'nullable',
                'file',
                'mimes:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif,tiff,heic',
                'max:10240',
            ],
        ], [
            'name.required' => 'Patient name is required.',
            'image.mimes' => 'The photo must be an image (JPEG, PNG, JPG, GIF, SVG, WebP, ICO, BMP, AVIF, TIFF, HEIC).',
            'image.max' => 'The photo size cannot exceed 10MB.',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('patients');
            if (!File::isDirectory($destination)) {
                File::makeDirectory($destination, 0755, true, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'patients/' . $filename;
        }

        $hospital = $partner->getHospital();

        $patient = Patient::create([
            'partner_id' => $partner->id,
            'hospital_id' => $hospital ? $hospital->id : null,
            'name' => $validated['name'],
            'phone' => $validated['phone'] ?? null,
            'email' => $validated['email'] ?? null,
            'country' => $validated['country'] ?? null,
            'state' => $validated['state'] ?? null,
            'city' => $validated['city'] ?? null,
            'address' => $validated['address'] ?? null,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('partner.patient.view', $patient)
            ->with('success', "Patient '{$patient->name}' registered successfully! You can now attach medical reports.");
    }

    /**
     * Display the specified patient profile & their reports.
     */
    public function show(Patient $patient): View
    {
        $this->authorizePatient($patient);
        $partner = $this->getPartner();
        $patient->load(['reports']);

        return view('partner.patient.view', compact('partner', 'patient'));
    }

    /**
     * Show the form for editing the specified patient.
     */
    public function edit(Patient $patient): View
    {
        $this->authorizePatient($patient);
        $partner = $this->getPartner();
        $countries = Country::orderBy('name')->get();

        // Selected country/state resolution for dropdown pre-selection
        $selectedCountry = Country::where('name', $patient->country)->first();
        $states = $selectedCountry ? State::where('country_id', $selectedCountry->id)->orderBy('name')->get() : collect();

        $selectedState = State::where('name', $patient->state)->first();
        $cities = $selectedState ? City::where('state_id', $selectedState->id)->orderBy('name')->get() : collect();

        return view('partner.patient.update', compact('partner', 'patient', 'countries', 'states', 'cities'));
    }

    /**
     * Update the specified patient in storage.
     */
    public function update(Request $request, Patient $patient): RedirectResponse
    {
        $this->authorizePatient($patient);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:1000'],
            'image' => [
                'nullable',
                'file',
                'mimes:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif,tiff,heic',
                'max:10240',
            ],
            'remove_image' => ['nullable', 'boolean'],
        ], [
            'name.required' => 'Patient name is required.',
            'image.mimes' => 'The photo must be an image (JPEG, PNG, JPG, GIF, SVG, WebP, ICO, BMP, AVIF, TIFF, HEIC).',
            'image.max' => 'The photo size cannot exceed 10MB.',
        ]);

        $imagePath = $patient->image;

        // Check if user requested removing current image
        if ($request->boolean('remove_image')) {
            if ($imagePath && File::exists(public_path($imagePath))) {
                File::delete(public_path($imagePath));
            }
            $imagePath = null;
        }

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old file if present
            if ($patient->image && File::exists(public_path($patient->image))) {
                File::delete(public_path($patient->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('patients');
            if (!File::isDirectory($destination)) {
                File::makeDirectory($destination, 0755, true, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'patients/' . $filename;
        }

        $patient->update([
            'name' => $validated['name'],
            'phone' => $validated['phone'] ?? null,
            'email' => $validated['email'] ?? null,
            'country' => $validated['country'] ?? null,
            'state' => $validated['state'] ?? null,
            'city' => $validated['city'] ?? null,
            'address' => $validated['address'] ?? null,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('partner.patient.view', $patient)
            ->with('success', "Patient '{$patient->name}' profile updated successfully!");
    }

    /**
     * Remove the specified patient from storage.
     */
    public function destroy(Patient $patient): RedirectResponse
    {
        $this->authorizePatient($patient);

        $name = $patient->name;

        // Delete patient photo
        if ($patient->image && File::exists(public_path($patient->image))) {
            File::delete(public_path($patient->image));
        }

        // Delete associated reports files
        foreach ($patient->reports as $report) {
            if ($report->file && File::exists(public_path($report->file))) {
                File::delete(public_path($report->file));
            }
        }

        $patient->delete();

        return redirect()
            ->route('partner.patient.index')
            ->with('success', "Patient '{$name}' and all associated medical reports have been deleted.");
    }

    /**
     * Bulk delete selected patients.
     */
    public function bulkDelete(Request $request): RedirectResponse
    {
        $partner = $this->getPartner();

        $validated = $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['integer'],
        ]);

        $patients = Patient::where('partner_id', $partner->id)
            ->whereIn('id', $validated['ids'])
            ->with('reports')
            ->get();

        $count = 0;
        foreach ($patients as $patient) {
            if ($patient->image && File::exists(public_path($patient->image))) {
                File::delete(public_path($patient->image));
            }
            foreach ($patient->reports as $report) {
                if ($report->file && File::exists(public_path($report->file))) {
                    File::delete(public_path($report->file));
                }
            }
            $patient->delete();
            $count++;
        }

        return redirect()
            ->route('partner.patient.index')
            ->with('success', "Successfully deleted {$count} patient records.");
    }

    /**
     * Helper AJAX to fetch states by country name or ID.
     */
    public function getStates(Request $request): JsonResponse
    {
        $countryQuery = $request->query('country');
        if (is_numeric($countryQuery)) {
            $country = Country::find($countryQuery);
        } else {
            $country = Country::where('name', $countryQuery)->first();
        }

        if (!$country) {
            return response()->json([]);
        }

        $states = State::where('country_id', $country->id)->orderBy('name')->get(['id', 'name']);
        return response()->json($states);
    }

    /**
     * Helper AJAX to fetch cities by state name or ID.
     */
    public function getCities(Request $request): JsonResponse
    {
        $stateQuery = $request->query('state');
        if (is_numeric($stateQuery)) {
            $state = State::find($stateQuery);
        } else {
            $state = State::where('name', $stateQuery)->first();
        }

        if (!$state) {
            return response()->json([]);
        }

        $cities = City::where('state_id', $state->id)->orderBy('name')->get(['id', 'name']);
        return response()->json($cities);
    }
}
