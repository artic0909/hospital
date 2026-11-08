<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AppointmentController extends Controller
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
     * Display a listing of appointments for agent's patients.
     */
    public function index(Request $request): View
    {
        $agent = $this->getAgent();

        $query = Appointment::where(function ($q) use ($agent) {
            $q->where('agent_id', $agent->id)
              ->orWhereHas('patient', function ($pq) use ($agent) {
                  $pq->where('agent_id', $agent->id);
              });
        })->with(['patient', 'hospital', 'doctor']);

        // Search filter
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('appointment_code', 'like', "%{$search}%")
                  ->orWhereHas('patient', function ($p) use ($search) {
                      $p->where('name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
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

        // Date filter
        if ($request->filled('date')) {
            $query->whereDate('appointment_date', $request->date);
        }

        // Pagination
        $perPage = $request->input('per_page', 10);
        if ($perPage === 'all') {
            $appointments = $query->latest('id')->paginate(99999)->withQueryString();
        } else {
            $perPage = in_array((int)$perPage, [10, 20, 50, 100], true) ? (int)$perPage : 10;
            $appointments = $query->latest('id')->paginate($perPage)->withQueryString();
        }

        $baseCount = Appointment::where(function ($q) use ($agent) {
            $q->where('agent_id', $agent->id)
              ->orWhereHas('patient', fn($pq) => $pq->where('agent_id', $agent->id));
        });

        $stats = [
            'total' => (clone $baseCount)->count(),
            'booked' => (clone $baseCount)->where('status', 'booked')->count(),
            'received' => (clone $baseCount)->where('status', 'received')->count(),
            'treatment' => (clone $baseCount)->where('status', 'treatment')->count(),
            'discharge' => (clone $baseCount)->where('status', 'discharge')->count(),
        ];

        return view('agent.appointment.index', compact('appointments', 'stats'));
    }

    /**
     * Display the specified appointment for an agent's patient.
     */
    public function show(Appointment $appointment): View
    {
        $agent = $this->getAgent();

        $belongsToAgent = ($appointment->agent_id === $agent->id) || 
                          ($appointment->patient && $appointment->patient->agent_id === $agent->id);

        if (!$belongsToAgent) {
            abort(403, 'You do not have permission to access this appointment record.');
        }

        $appointment->load(['patient.reports', 'hospital', 'doctor', 'histories']);

        return view('agent.appointment.view', compact('appointment'));
    }
}

