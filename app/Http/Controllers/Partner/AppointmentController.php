<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    /**
     * Get active hospital for authenticated partner.
     */
    protected function getHospital()
    {
        $partner = Auth::guard('partner')->user();
        return $partner ? $partner->getHospital() : null;
    }

    /**
     * Display a listing of appointments for this partner / hospital.
     */
    public function index(Request $request): View
    {
        $partner = Auth::guard('partner')->user();
        $hospital = $this->getHospital();

        $query = Appointment::with(['patient', 'doctor', 'hospital', 'histories'])
            ->where(function ($q) use ($partner, $hospital) {
                if ($partner) {
                    $q->where('partner_id', $partner->id);
                }
                if ($hospital) {
                    $q->orWhere('hospital_id', $hospital->id);
                }
            });

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('appointment_code', 'like', "%{$search}%")
                  ->orWhereHas('patient', function ($p) use ($search) {
                      $p->where('name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                  })
                  ->orWhereHas('doctor', function ($d) use ($search) {
                      $d->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date')) {
            $query->whereDate('appointment_date', $request->date);
        }

        $appointments = $query->latest()->paginate(15)->withQueryString();

        $baseCountQuery = Appointment::where(function ($q) use ($partner, $hospital) {
            if ($partner) $q->where('partner_id', $partner->id);
            if ($hospital) $q->orWhere('hospital_id', $hospital->id);
        });

        $stats = [
            'total' => (clone $baseCountQuery)->count(),
            'booked' => (clone $baseCountQuery)->where('status', 'booked')->count(),
            'received' => (clone $baseCountQuery)->where('status', 'received')->count(),
            'treatment' => (clone $baseCountQuery)->where('status', 'treatment')->count(),
            'discharge' => (clone $baseCountQuery)->where('status', 'discharge')->count(),
        ];

        // Format appointment modal dataset including complete status histories
        $appointmentsModalData = $appointments->getCollection()->mapWithKeys(function ($apt) {
            return [$apt->id => [
                'id' => $apt->id,
                'code' => $apt->appointment_code,
                'status' => $apt->status,
                'status_label' => $apt->status_label,
                'status_badge' => $apt->status_badge_class,
                'date' => $apt->appointment_date ? $apt->appointment_date->format('M d, Y') : 'Date TBD',
                'time' => $apt->appointment_time ?: 'Standard OPD',
                'notes' => $apt->notes ?: '',
                'patient' => [
                    'name' => $apt->patient->name ?? 'Unknown Patient',
                    'code' => $apt->patient ? ('#PT-' . str_pad((string)$apt->patient->id, 5, '0', STR_PAD_LEFT)) : '',
                    'phone' => $apt->patient->phone ?? 'No phone',
                    'email' => $apt->patient->email ?? '',
                    'location' => $apt->patient->full_location ?? ($apt->patient->country ?? 'Global'),
                ],
                'doctor' => [
                    'name' => $apt->doctor->name ?? 'Unassigned Doctor',
                    'speciality' => $apt->doctor->spaciality ?? ($apt->doctor->designation ?? 'Consultant'),
                    'fee' => $apt->doctor && $apt->doctor->OPD_fee ? ('₹' . number_format($apt->doctor->OPD_fee)) : '',
                ],
                'hospital' => [
                    'name' => $apt->hospital->name ?? 'Facility N/A',
                    'phone' => $apt->hospital->contact ?? '',
                    'address' => $apt->hospital->address ?? '',
                ],
                'histories' => $apt->histories->map(function ($h) {
                    $ts = $h->status_at ?: $h->created_at;
                    return [
                        'status' => $h->status,
                        'status_label' => $h->status_label,
                        'badge_class' => $h->status_badge_class,
                        'date' => $ts ? $ts->format('M d, Y') : 'N/A',
                        'time' => $ts ? $ts->format('h:i A') : 'N/A',
                        'updated_by' => $h->changed_by_name ?: ucfirst($h->changed_by_type),
                        'notes' => $h->notes ?: '—',
                    ];
                })->values()->all(),
            ]];
        })->all();

        return view('partner.appointment.index', compact('appointments', 'stats', 'appointmentsModalData'));
    }

    /**
     * Show appointment details.
     */
    public function show(Appointment $appointment): View
    {
        $appointment->load(['patient', 'doctor', 'hospital', 'partner', 'histories']);
        return view('partner.appointment.view', compact('appointment'));
    }

    /**
     * Update appointment status.
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
            $partner = Auth::guard('partner')->user();
            $partnerName = $partner ? ($partner->company_name ?: $partner->name) : 'Partner Facilitator';

            $appointment->recordStatusHistory(
                status: $validated['status'],
                notes: $validated['notes'] ?? ('Stage updated to ' . ucfirst($validated['status'])),
                changedByType: 'partner',
                changedByName: $partnerName
            );
        }

        return back()->with('success', "Appointment #{$appointment->appointment_code} status updated to {$appointment->status_label}.");
    }
}

