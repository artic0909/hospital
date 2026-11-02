<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Patient;
use App\Models\PatientEnquiry;
use App\Models\Report;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class PatientController extends Controller
{
    /**
     * Display a listing of patients.
     */
    public function index(Request $request): View
    {
        $query = Patient::withCount('reports');

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
            'total' => Patient::count(),
            'with_reports' => Patient::has('reports')->count(),
            'total_reports' => Report::count(),
            'this_month' => Patient::where('created_at', '>=', now()->startOfMonth())->count(),
        ];

        // Unique countries in patient pool
        $filterCountries = Patient::whereNotNull('country')
            ->where('country', '!=', '')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        return view('admin.patient.index', compact('patients', 'stats', 'filterCountries'));
    }

    /**
     * Show the form for creating a new patient, with optional enquiry prefill.
     */
    public function create(Request $request): View
    {
        $countries = Country::orderBy('name')->get();
        $enquiry = null;

        if ($request->filled('enquiry_id')) {
            $enquiry = PatientEnquiry::with(['hospital', 'doctor'])->find($request->enquiry_id);
        }

        return view('admin.patient.create', compact('countries', 'enquiry'));
    }

    /**
     * Check if a patient already exists by phone or email.
     */
    public function checkExists(Request $request): JsonResponse
    {
        $phone = trim($request->input('phone', ''));
        $email = trim($request->input('email', ''));
        $ignoreId = $request->input('ignore_id');

        $patient = null;
        $reason = null;

        if (!empty($phone)) {
            $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
            $patient = Patient::where(function ($q) use ($phone, $cleanPhone) {
                $q->where('phone', $phone);
                if (strlen($cleanPhone) >= 7) {
                    $q->orWhereRaw("REPLACE(REPLACE(REPLACE(phone, ' ', ''), '-', ''), '+', '') LIKE ?", ['%' . substr($cleanPhone, -10)]);
                }
            })
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->first();

            if ($patient) {
                $reason = "A patient with this mobile number already exists: {$patient->name} (Patient ID #{$patient->id})";
            }
        }

        if (!$patient && !empty($email)) {
            $patient = Patient::where('email', $email)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->first();

            if ($patient) {
                $reason = "A patient with this email address already exists: {$patient->name} (Patient ID #{$patient->id})";
            }
        }

        return response()->json([
            'exists' => (bool)$patient,
            'message' => $reason,
            'patient' => $patient ? [
                'id' => $patient->id,
                'name' => $patient->name,
                'phone' => $patient->phone,
                'email' => $patient->email,
                'url' => route('admin.patient.view', $patient->id),
            ] : null,
        ]);
    }

    /**
     * Store a newly created patient.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50', 'unique:patients,phone'],
            'email' => ['nullable', 'email', 'max:255', 'unique:patients,email'],
            'country' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:1000'],
            'enquiry_id' => ['nullable', 'integer'],
            'hospital_id' => ['nullable', 'integer'],
            'image' => [
                'nullable',
                'file',
                'mimes:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif,tiff,heic',
                'max:10240',
            ],
        ], [
            'name.required' => 'Patient name is required.',
            'phone.required' => 'Patient phone/mobile number is required.',
            'phone.unique' => 'A patient with this mobile number already exists in the system.',
            'email.unique' => 'A patient with this email address already exists in the system.',
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

        $hospitalId = $validated['hospital_id'] ?? null;
        if (!$hospitalId && $request->filled('enquiry_id')) {
            $enq = PatientEnquiry::find($request->enquiry_id);
            if ($enq) {
                $hospitalId = $enq->hospital_id;
            }
        }

        $patient = Patient::create([
            'partner_id' => null,
            'hospital_id' => $hospitalId,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'country' => $validated['country'] ?? null,
            'state' => $validated['state'] ?? null,
            'city' => $validated['city'] ?? null,
            'address' => $validated['address'] ?? null,
            'image' => $imagePath,
        ]);

        // If converted from enquiry, mark enquiry as in_treatment & log coordinator note
        if ($request->filled('enquiry_id')) {
            $enquiry = PatientEnquiry::find($request->enquiry_id);
            if ($enquiry) {
                $note = "✓ Converted to Registered Patient #{$patient->id} ({$patient->name}) on " . now()->format('d M Y, h:i A');
                $enquiry->update([
                    'status' => 'in_treatment',
                    'admin_notes' => $enquiry->admin_notes ? ($enquiry->admin_notes . "\n" . $note) : $note,
                ]);
            }
        }

        return redirect()
            ->route('admin.patient.view', $patient->id)
            ->with('success', "Patient '{$patient->name}' registered successfully!" . ($request->filled('enquiry_id') ? " (Converted from Enquiry #{$request->enquiry_id})" : ""));
    }

    /**
     * Display the specified patient profile.
     */
    public function show(Patient $patient): View
    {
        $patient->load('reports');
        return view('admin.patient.view', compact('patient'));
    }

    /**
     * Show the form for editing the specified patient.
     */
    public function edit(Patient $patient): View
    {
        $countries = Country::orderBy('name')->get();

        $selectedCountry = Country::where('name', $patient->country)->first();
        $states = $selectedCountry ? State::where('country_id', $selectedCountry->id)->orderBy('name')->get() : collect();

        $selectedState = State::where('name', $patient->state)->first();
        $cities = $selectedState ? City::where('state_id', $selectedState->id)->orderBy('name')->get() : collect();

        return view('admin.patient.update', compact('patient', 'countries', 'states', 'cities'));
    }

    /**
     * Update the specified patient.
     */
    public function update(Request $request, Patient $patient): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50', \Illuminate\Validation\Rule::unique('patients', 'phone')->ignore($patient->id)],
            'email' => ['nullable', 'email', 'max:255', \Illuminate\Validation\Rule::unique('patients', 'email')->ignore($patient->id)],
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
            'phone.required' => 'Patient phone number is required.',
            'phone.unique' => 'A patient with this mobile number already exists in the system.',
            'email.unique' => 'A patient with this email address already exists in the system.',
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
            ->route('admin.patient.view', $patient->id)
            ->with('success', "Patient '{$patient->name}' profile updated successfully!");
    }

    /**
     * Remove the specified patient.
     */
    public function destroy(Patient $patient): RedirectResponse
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
            ->route('admin.patient.index')
            ->with('success', "Patient '{$name}' and all attached medical reports have been deleted.");
    }

    /**
     * Bulk delete selected patients.
     */
    public function bulkDelete(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['integer'],
        ]);

        $patients = Patient::whereIn('id', $validated['ids'])->with('reports')->get();

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
            ->route('admin.patient.index')
            ->with('success', "Successfully deleted {$count} patient records.");
    }

    /**
     * Helper AJAX to fetch states.
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
     * Helper AJAX to fetch cities.
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
