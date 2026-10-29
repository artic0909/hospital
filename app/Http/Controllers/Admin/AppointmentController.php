<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Partner;
use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments with stats and filters.
     */
    public function index(Request $request): View
    {
        $query = Appointment::with(['patient', 'hospital', 'doctor', 'partner']);

        // Search filter (code, patient, doctor, hospital)
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('appointment_code', 'like', "%{$search}%")
                  ->orWhereHas('patient', function ($p) use ($search) {
                      $p->where('name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  })
                  ->orWhereHas('doctor', function ($d) use ($search) {
                      $d->where('name', 'like', "%{$search}%")
                        ->orWhere('spaciality', 'like', "%{$search}%");
                  })
                  ->orWhereHas('hospital', function ($h) use ($search) {
                      $h->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Partner filter
        if ($request->filled('partner_id')) {
            $query->where('partner_id', $request->partner_id);
        }

        // Hospital filter
        if ($request->filled('hospital_id')) {
            $query->where('hospital_id', $request->hospital_id);
        }

        // Date filter
        if ($request->filled('date')) {
            $query->whereDate('appointment_date', $request->date);
        }

        // Pagination
        $perPage = $request->get('per_page', 10);
        if ($perPage === 'all') {
            $appointments = $query->latest('id')->paginate(99999)->withQueryString();
        } else {
            $perPage = in_array((int)$perPage, [10, 20, 50, 100], true) ? (int)$perPage : 10;
            $appointments = $query->latest('id')->paginate($perPage)->withQueryString();
        }

        // Aggregate statistics
        $stats = [
            'total' => Appointment::count(),
            'booked' => Appointment::where('status', 'booked')->count(),
            'received' => Appointment::where('status', 'received')->count(),
            'treatment' => Appointment::where('status', 'treatment')->count(),
            'discharge' => Appointment::where('status', 'discharge')->count(),
        ];

        $partners = Partner::orderBy('name')->get(['id', 'name', 'company_name']);
        $hospitals = Hospital::orderBy('name')->get(['id', 'name']);

        return view('admin.appointment.index', compact('appointments', 'stats', 'partners', 'hospitals'));
    }

    /**
     * Show the form for creating a new appointment.
     */
    public function create(): View
    {
        $patients = Patient::orderBy('name')->get();
        $partners = Partner::with('hospital')->orderBy('name')->get();
        $allDoctors = Doctor::with('hospital')->where('status', true)->orderBy('name')->get();
        $allDoctorsFormatted = $this->formatDoctorsList($allDoctors);

        return view('admin.appointment.create', compact('patients', 'partners', 'allDoctors', 'allDoctorsFormatted'));
    }

    /**
     * Helper to format a collection of doctors for TomSelect.
     */
    protected function formatDoctorsList($doctors)
    {
        return $doctors->map(function ($doc) {
            $hosp = $doc->hospital->name ?? 'Affiliated Hospital';
            $hospPhone = $doc->hospital->contact ?? '';
            $fee = $doc->OPD_fee ? '₹' . number_format($doc->OPD_fee) : '';
            return [
                'value' => (string)$doc->id,
                'text' => "{$doc->name} (" . ($doc->spaciality ?: 'Specialist') . ") - {$hosp}" . ($hospPhone ? " [Tel: {$hospPhone}]" : '') . ($fee ? " [{$fee}]" : ''),
                'name' => $doc->name,
                'speciality' => $doc->spaciality ?: ($doc->designation ?: 'Specialist'),
                'hospital' => $hosp,
                'hospital_phone' => $hospPhone,
                'fee' => $fee,
                'hospital_id' => $doc->hospital_id,
            ];
        })->values();
    }

    /**
     * Helper AJAX: Get doctors for a particular partner.
     */
    public function getPartnerDoctors(Partner $partner): JsonResponse
    {
        $hospital = $partner->getHospital();
        $doctors = $hospital 
            ? $hospital->doctors()->where('status', true)->get(['id', 'name', 'designation', 'spaciality', 'OPD_fee', 'hospital_id']) 
            : collect();

        $hospPhone = $hospital?->contact ?? '';

        $formatted = $doctors->map(function ($doc) use ($hospital, $hospPhone) {
            $feeStr = $doc->OPD_fee ? '₹' . number_format($doc->OPD_fee) : '';
            return [
                'id' => $doc->id,
                'name' => $doc->name,
                'designation' => $doc->designation,
                'spaciality' => $doc->spaciality,
                'OPD_fee' => $doc->OPD_fee,
                'hospital_id' => $doc->hospital_id,
                'hospital_name' => $hospital?->name ?? '',
                'hospital_phone' => $hospPhone,
                'label' => "{$doc->name} (" . ($doc->spaciality ?: 'Specialist') . ") - " . ($hospital?->name ?? '') . ($hospPhone ? " [Tel: {$hospPhone}]" : '') . ($feeStr ? " [{$feeStr}]" : ''),
            ];
        });

        return response()->json([
            'hospital' => $hospital ? [
                'id' => $hospital->id,
                'name' => $hospital->name,
                'contact' => $hospPhone,
            ] : null,
            'doctors' => $formatted,
        ]);
    }

    /**
     * Helper AJAX: Get doctors for a particular hospital.
     */
    public function getHospitalDoctors(Hospital $hospital): JsonResponse
    {
        $doctors = $hospital->doctors()->where('status', true)->get(['id', 'name', 'designation', 'spaciality', 'OPD_fee']);
        return response()->json([
            'doctors' => $doctors,
        ]);
    }

    /**
     * Store a newly created appointment.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'patient_id' => ['required', 'exists:patients,id'],
            'partner_id' => ['nullable', 'exists:partners,id'],
            'hospital_id' => ['nullable', 'exists:hospitals,id'],
            'doctor_id' => ['required', 'exists:doctors,id'],
            'appointment_date' => ['nullable', 'date'],
            'appointment_time' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'in:booked,received,treatment,discharge'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ], [
            'patient_id.required' => 'Please select a patient.',
            'doctor_id.required' => 'Please select a doctor for this appointment.',
        ]);

        // If hospital is not explicitly selected, resolve it from the selected doctor or partner
        $hospitalId = $validated['hospital_id'] ?? null;
        if (!$hospitalId && !empty($validated['doctor_id'])) {
            $doctor = Doctor::find($validated['doctor_id']);
            $hospitalId = $doctor?->hospital_id;
        }
        if (!$hospitalId && !empty($validated['partner_id'])) {
            $partner = Partner::find($validated['partner_id']);
            $hospitalId = $partner?->getHospital()?->id;
        }
        if (!$hospitalId && !empty($validated['partner_id'])) {
            $partner = Partner::find($validated['partner_id']);
            $hospitalId = $partner?->getHospital()?->id;
        }

        $appointment = Appointment::create([
            'patient_id' => $validated['patient_id'],
            'partner_id' => $validated['partner_id'] ?? null,
            'hospital_id' => $hospitalId,
            'doctor_id' => $validated['doctor_id'],
            'appointment_date' => $validated['appointment_date'] ?? now()->toDateString(),
            'appointment_time' => $validated['appointment_time'] ?? null,
            'status' => $validated['status'] ?? 'booked',
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()
            ->route('admin.appointment.view', $appointment->id)
            ->with('success', "Appointment #{$appointment->appointment_code} booked successfully!");
    }

    /**
     * Display the specified appointment.
     */
    public function show(Appointment $appointment): View
    {
        $appointment->load(['patient', 'hospital', 'doctor', 'partner', 'histories']);
        return view('admin.appointment.view', compact('appointment'));
    }

    /**
     * Show the form for editing the appointment.
     */
    public function edit(Appointment $appointment): View
    {
        $appointment->load(['patient', 'hospital', 'doctor', 'partner']);
        $patients = Patient::orderBy('name')->get();
        $partners = Partner::with('hospital')->orderBy('name')->get();
        $allDoctors = Doctor::with('hospital')->where('status', true)->orderBy('name')->get();
        $allDoctorsFormatted = $this->formatDoctorsList($allDoctors);

        return view('admin.appointment.update', compact('appointment', 'patients', 'partners', 'allDoctors', 'allDoctorsFormatted'));
    }

    /**
     * Update the specified appointment.
     */
    public function update(Request $request, Appointment $appointment): RedirectResponse
    {
        $validated = $request->validate([
            'patient_id' => ['required', 'exists:patients,id'],
            'partner_id' => ['nullable', 'exists:partners,id'],
            'hospital_id' => ['nullable', 'exists:hospitals,id'],
            'doctor_id' => ['required', 'exists:doctors,id'],
            'appointment_date' => ['nullable', 'date'],
            'appointment_time' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'in:booked,received,treatment,discharge'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $hospitalId = $validated['hospital_id'] ?? null;
        if (!$hospitalId && !empty($validated['doctor_id'])) {
            $doctor = Doctor::find($validated['doctor_id']);
            $hospitalId = $doctor?->hospital_id;
        }
        if (!$hospitalId && !empty($validated['partner_id'])) {
            $partner = Partner::find($validated['partner_id']);
            $hospitalId = $partner?->getHospital()?->id;
        }

        $oldStatus = $appointment->status;

        $appointment->update([
            'patient_id' => $validated['patient_id'],
            'partner_id' => $validated['partner_id'] ?? null,
            'hospital_id' => $hospitalId,
            'doctor_id' => $validated['doctor_id'],
            'appointment_date' => $validated['appointment_date'] ?? $appointment->appointment_date,
            'appointment_time' => $validated['appointment_time'] ?? null,
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? null,
        ]);

        if ($oldStatus !== $validated['status']) {
            $appointment->recordStatusHistory(
                status: $validated['status'],
                notes: 'Stage updated to ' . ucfirst($validated['status']) . ' via dossier edit',
                changedByType: 'admin',
                changedByName: auth('admin')->user()?->name ?: 'Admin Command'
            );
        }

        return redirect()
            ->route('admin.appointment.view', $appointment->id)
            ->with('success', "Appointment #{$appointment->appointment_code} updated successfully!");
    }

    /**
     * Quick status update.
     */
    public function updateStatus(Request $request, Appointment $appointment): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:booked,received,treatment,discharge'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $oldStatus = $appointment->status;

        $appointment->update([
            'status' => $validated['status'],
        ]);

        if ($oldStatus !== $validated['status']) {
            $appointment->recordStatusHistory(
                status: $validated['status'],
                notes: $validated['notes'] ?? ('Stage updated to ' . ucfirst($validated['status'])),
                changedByType: 'admin',
                changedByName: auth('admin')->user()?->name ?: 'Admin Command'
            );
        }

        return back()->with('success', "Status for #{$appointment->appointment_code} updated to {$appointment->status_label}.");
    }

    /**
     * Remove the specified appointment.
     */
    public function destroy(Appointment $appointment): RedirectResponse
    {
        $code = $appointment->appointment_code;
        $appointment->delete();

        return redirect()
            ->route('admin.appointment.index')
            ->with('success', "Appointment #{$code} has been deleted.");
    }

    /**
     * Bulk delete selected appointments.
     */
    public function bulkDelete(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['integer'],
        ]);

        $count = Appointment::whereIn('id', $validated['ids'])->delete();

        return redirect()
            ->route('admin.appointment.index')
            ->with('success', "Successfully deleted {$count} appointment records.");
    }
}

