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

        $query = Appointment::with(['patient', 'doctor', 'hospital'])
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

        return view('partner.appointment.index', compact('appointments', 'stats'));
    }

    /**
     * Show appointment details.
     */
    public function show(Appointment $appointment): View
    {
        $appointment->load(['patient', 'doctor', 'hospital', 'partner']);
        return view('partner.appointment.view', compact('appointment'));
    }

    /**
     * Update appointment status.
     */
    public function updateStatus(Request $request, Appointment $appointment): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:booked,received,treatment,discharge'],
        ]);

        $appointment->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', "Appointment #{$appointment->appointment_code} status updated to {$appointment->status_label}.");
    }
}

