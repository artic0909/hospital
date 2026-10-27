<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Hospital;
use App\Models\Partner;
use App\Models\Patient;
use App\Models\Report;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PatientController extends Controller
{
    /**
     * Resolve or provision a partner account for this hospital.
     */
    protected function getOrCreateHospitalPartner(Hospital $hospital): Partner
    {
        $partner = Partner::where('hospital_id', $hospital->id)->first();
        if ($partner) return $partner;

        if (!empty($hospital->email)) {
            $partner = Partner::where('email', $hospital->email)->first();
            if ($partner) {
                $partner->update(['hospital_id' => $hospital->id]);
                return $partner;
            }
        }

        $partner = Partner::where('company_name', $hospital->name)->first();
        if ($partner) {
            $partner->update(['hospital_id' => $hospital->id]);
            return $partner;
        }

        // Provision a partner record
        $cleanCode = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $hospital->code ?: 'hosp' . $hospital->id));
        $email = !empty($hospital->email) 
            ? $hospital->email 
            : ($cleanCode . '@partner.healgofly.com');

        return Partner::create([
            'hospital_id' => $hospital->id,
            'name' => $hospital->name,
            'company_name' => $hospital->name,
            'email' => $email,
            'phone' => $hospital->contact ?? '0000000000',
            'country' => $hospital->country->name ?? 'India',
            'partner_type' => 'Hospital Partner',
            'address' => $hospital->address,
            'status' => 'active',
            'password' => $hospital->password ?? Hash::make('12345678'),
        ]);
    }

    /**
     * Display a listing of patients for a specific hospital.
     */
    public function index(Request $request, Hospital $hospital): View
    {
        $query = $hospital->patients()->withCount('reports');

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

        // Aggregate statistics for this hospital
        $stats = [
            'total' => $hospital->patients()->count(),
            'with_reports' => $hospital->patients()->has('reports')->count(),
            'total_reports' => Report::whereHas('patient', function ($q) use ($hospital) {
                $q->where('hospital_id', $hospital->id);
            })->count(),
            'this_month' => $hospital->patients()
                ->where('created_at', '>=', now()->startOfMonth())
                ->count(),
        ];

        // Unique countries in this hospital's patient pool
        $filterCountries = $hospital->patients()
            ->whereNotNull('country')
            ->where('country', '!=', '')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        return view('admin.hospital.patient.index', compact('hospital', 'patients', 'stats', 'filterCountries'));
    }

    /**
     * Show the form for creating a new patient for this hospital.
     */
    public function create(Hospital $hospital): View
    {
        $countries = Country::orderBy('name')->get();
        return view('admin.hospital.patient.create', compact('hospital', 'countries'));
    }

    /**
     * Store a newly created patient for this hospital.
     */
    public function store(Request $request, Hospital $hospital): RedirectResponse
    {
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

        $partner = $this->getOrCreateHospitalPartner($hospital);

        $patient = Patient::create([
            'hospital_id' => $hospital->id,
            'partner_id' => $partner->id,
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
            ->route('admin.hospital.patient.view', [$hospital->id, $patient->id])
            ->with('success', "Patient '{$patient->name}' registered for {$hospital->name} successfully!");
    }

    /**
     * Display the specified patient profile.
     */
    public function show(Hospital $hospital, Patient $patient): View
    {
        $patient->load('reports');
        return view('admin.hospital.patient.view', compact('hospital', 'patient'));
    }

    /**
     * Show the form for editing the specified patient.
     */
    public function edit(Hospital $hospital, Patient $patient): View
    {
        $countries = Country::orderBy('name')->get();

        $selectedCountry = Country::where('name', $patient->country)->first();
        $states = $selectedCountry ? State::where('country_id', $selectedCountry->id)->orderBy('name')->get() : collect();

        $selectedState = State::where('name', $patient->state)->first();
        $cities = $selectedState ? City::where('state_id', $selectedState->id)->orderBy('name')->get() : collect();

        return view('admin.hospital.patient.update', compact('hospital', 'patient', 'countries', 'states', 'cities'));
    }

    /**
     * Update the specified patient.
     */
    public function update(Request $request, Hospital $hospital, Patient $patient): RedirectResponse
    {
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
        ]);

        $imagePath = $patient->image;

        if ($request->boolean('remove_image')) {
            if ($imagePath && File::exists(public_path($imagePath))) {
                File::delete(public_path($imagePath));
            }
            $imagePath = null;
        }

        if ($request->hasFile('image')) {
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
            ->route('admin.hospital.patient.view', [$hospital->id, $patient->id])
            ->with('success', "Patient '{$patient->name}' profile updated successfully!");
    }

    /**
     * Remove the specified patient.
     */
    public function destroy(Hospital $hospital, Patient $patient): RedirectResponse
    {
        $name = $patient->name;

        if ($patient->image && File::exists(public_path($patient->image))) {
            File::delete(public_path($patient->image));
        }

        foreach ($patient->reports as $report) {
            if ($report->file && File::exists(public_path($report->file))) {
                File::delete(public_path($report->file));
            }
        }

        $patient->delete();

        return redirect()
            ->route('admin.hospital.patient.index', $hospital->id)
            ->with('success', "Patient '{$name}' and all attached medical reports have been deleted.");
    }

    /**
     * Bulk delete selected patients.
     */
    public function bulkDelete(Request $request, Hospital $hospital): RedirectResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['integer'],
        ]);

        $patients = $hospital->patients()->whereIn('id', $validated['ids'])->with('reports')->get();

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
            ->route('admin.hospital.patient.index', $hospital->id)
            ->with('success', "Successfully deleted {$count} patient records.");
    }

    /**
     * Helper AJAX to fetch states.
     */
    public function getStates(Request $request, Hospital $hospital): JsonResponse
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
     * Helper AJAX to fetch cities.
     */
    public function getCities(Request $request, Hospital $hospital): JsonResponse
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
