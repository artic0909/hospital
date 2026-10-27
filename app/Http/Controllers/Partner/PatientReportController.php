<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PatientReportController extends Controller
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
            abort(403, 'You do not have permission to manage reports for this patient.');
        }
    }

    /**
     * Display medical reports listing for a patient.
     */
    public function index(Request $request, Patient $patient): View
    {
        $this->authorizePatient($patient);
        $partner = $this->getPartner();

        $query = $patient->reports();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where('name', 'like', "%{$search}%");
        }

        if ($request->filled('date_from')) {
            $query->whereDate('date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('date', '<=', $request->date_to);
        }

        $reports = $query->latest('date')->paginate(12)->withQueryString();

        $stats = [
            'total' => $patient->reports()->count(),
            'with_file' => $patient->reports()->whereNotNull('file')->count(),
            'latest_date' => $patient->reports()->max('date'),
        ];

        return view('partner.patient.report.index', compact('partner', 'patient', 'reports', 'stats'));
    }

    /**
     * Store a newly created medical report for the patient.
     */
    public function store(Request $request, Patient $patient): RedirectResponse
    {
        $this->authorizePatient($patient);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,jpeg,png,jpg,webp,gif,svg,txt,csv,xls,xlsx,zip',
                'max:25600', // 25MB max
            ],
        ], [
            'name.required' => 'Report title or test name is required.',
            'file.max' => 'The report document must not exceed 25MB.',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('patient_reports');
            if (!File::isDirectory($destination)) {
                File::makeDirectory($destination, 0755, true, true);
            }
            $file->move($destination, $filename);
            $filePath = 'patient_reports/' . $filename;
        }

        $report = Report::create([
            'patient_id' => $patient->id,
            'name' => $validated['name'],
            'date' => $validated['date'] ?? now()->toDateString(),
            'file' => $filePath,
        ]);

        return back()->with('success', "Medical report '{$report->name}' attached successfully!");
    }

    /**
     * Remove the specified medical report.
     */
    public function destroy(Patient $patient, Report $report): RedirectResponse
    {
        $this->authorizePatient($patient);

        if ($report->patient_id !== $patient->id) {
            abort(403, 'Report does not match this patient.');
        }

        $name = $report->name;

        if ($report->file && File::exists(public_path($report->file))) {
            File::delete(public_path($report->file));
        }

        $report->delete();

        return back()->with('success', "Medical report '{$name}' deleted successfully.");
    }

    /**
     * Download or view report file.
     */
    public function download(Patient $patient, Report $report): BinaryFileResponse|RedirectResponse
    {
        $this->authorizePatient($patient);

        if ($report->patient_id !== $patient->id) {
            abort(403, 'Report does not match this patient.');
        }

        if (!$report->file || !File::exists(public_path($report->file))) {
            return back()->with('error', 'The requested report document was not found on the server.');
        }

        return response()->download(public_path($report->file), $report->name . '.' . $report->extension);
    }
}
