<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Patient;
use App\Models\Report;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class PatientController extends Controller
{
    /**
     * Get authenticated agent.
     */
    protected function getAgent()
    {
        $agent = Auth::guard('agent')->user();
        if (!$agent) {
            abort(401, 'Unauthorized agent session.');
        }
        return $agent;
    }

    /**
     * Authorize that the patient belongs to current agent.
     */
    protected function authorizePatient(Patient $patient): void
    {
        if ($patient->agent_id !== $this->getAgent()->id) {
            abort(403, 'You do not have permission to access this patient profile.');
        }
    }

    /**
     * Display a listing of the agent's patients.
     */
    public function index(Request $request): View
    {
        $agent = $this->getAgent();
        $query = Patient::withCount('reports')
            ->with(['appointments' => fn($q) => $q->latest()->take(1)])
            ->where('agent_id', $agent->id);

        // Search filter
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
            });
        }

        // Country filter
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // Pagination
        $perPage = $request->get('per_page', 10);
        if ($perPage === 'all') {
            $patients = $query->latest('id')->paginate(99999)->withQueryString();
        } else {
            $perPage = in_array((int)$perPage, [10, 20, 50, 100], true) ? (int)$perPage : 10;
            $patients = $query->latest('id')->paginate($perPage)->withQueryString();
        }

        $stats = [
            'total' => Patient::where('agent_id', $agent->id)->count(),
            'with_reports' => Patient::where('agent_id', $agent->id)->has('reports')->count(),
            'total_reports' => Report::whereHas('patient', fn($q) => $q->where('agent_id', $agent->id))->count(),
            'this_month' => Patient::where('agent_id', $agent->id)->where('created_at', '>=', now()->startOfMonth())->count(),
        ];

        $filterCountries = Patient::where('agent_id', $agent->id)
            ->whereNotNull('country')
            ->where('country', '!=', '')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        return view('agent.patient.index', compact('patients', 'stats', 'filterCountries'));
    }

    /**
     * Show form for creating a new patient.
     */
    public function create(): View
    {
        $countries = Country::orderBy('name')->get();
        return view('agent.patient.create', compact('countries'));
    }

    /**
     * Store newly created patient under this agent.
     */
    public function store(Request $request): RedirectResponse
    {
        $agent = $this->getAgent();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:1000'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'agent_pt_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('uploads/patients');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $image->move($destination, $imageName);
            $imagePath = 'uploads/patients/' . $imageName;
        }

        $patient = Patient::create([
            'agent_id' => $agent->id,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'country' => $validated['country'] ?? null,
            'state' => $validated['state'] ?? null,
            'city' => $validated['city'] ?? null,
            'address' => $validated['address'] ?? null,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('agent.patient.view', $patient->id)
            ->with('success', "Patient '{$patient->name}' registered successfully!");
    }

    /**
     * Display patient profile, reports, and appointments.
     */
    public function show(Patient $patient): View
    {
        $this->authorizePatient($patient);

        $patient->load([
            'reports',
            'appointments.doctor',
            'appointments.hospital',
            'appointments.histories',
            'appointmentHistories',
        ]);

        return view('agent.patient.view', compact('patient'));
    }

    /**
     * Show form for editing patient.
     */
    public function edit(Patient $patient): View
    {
        $this->authorizePatient($patient);
        $countries = Country::orderBy('name')->get();

        return view('agent.patient.edit', compact('patient', 'countries'));
    }

    /**
     * Update patient details.
     */
    public function update(Request $request, Patient $patient): RedirectResponse
    {
        $this->authorizePatient($patient);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:1000'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
        ]);

        $imagePath = $patient->image;
        if ($request->hasFile('image')) {
            if ($patient->image && File::exists(public_path($patient->image))) {
                File::delete(public_path($patient->image));
            }

            $image = $request->file('image');
            $imageName = 'agent_pt_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('uploads/patients');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $image->move($destination, $imageName);
            $imagePath = 'uploads/patients/' . $imageName;
        }

        $patient->update([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'country' => $validated['country'] ?? null,
            'state' => $validated['state'] ?? null,
            'city' => $validated['city'] ?? null,
            'address' => $validated['address'] ?? null,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('agent.patient.view', $patient->id)
            ->with('success', "Patient profile updated successfully!");
    }

    /**
     * Delete patient.
     */
    public function destroy(Patient $patient): RedirectResponse
    {
        $this->authorizePatient($patient);

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
            ->route('agent.patient.index')
            ->with('success', "Patient '{$name}' deleted successfully.");
    }

    /**
     * Store a medical report for patient.
     */
    public function storeReport(Request $request, Patient $patient): RedirectResponse
    {
        $this->authorizePatient($patient);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'file' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png,webp,doc,docx', 'max:10240'],
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'agent_rep_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/reports');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $fileName);
            $filePath = 'uploads/reports/' . $fileName;
        }

        $patient->reports()->create([
            'name' => $request->name,
            'date' => $request->date ?? now()->toDateString(),
            'file' => $filePath,
        ]);

        return back()->with('success', 'Medical report uploaded successfully.');
    }

    /**
     * Delete a medical report.
     */
    public function destroyReport(Report $report): RedirectResponse
    {
        $agent = $this->getAgent();
        if ($report->patient->agent_id !== $agent->id) {
            abort(403, 'Unauthorized action.');
        }

        if ($report->file && File::exists(public_path($report->file))) {
            File::delete(public_path($report->file));
        }

        $report->delete();

        return back()->with('success', 'Medical report removed successfully.');
    }
}

