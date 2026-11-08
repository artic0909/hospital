<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the agent dashboard.
     */
    public function index(Request $request): View
    {
        $agent = Auth::guard('agent')->user();

        $stats = [
            'total_patients' => Patient::where('agent_id', $agent->id)->count(),
            'total_appointments' => Appointment::where('agent_id', $agent->id)->count(),
            'booked' => Appointment::where('agent_id', $agent->id)->where('status', 'booked')->count(),
            'received' => Appointment::where('agent_id', $agent->id)->where('status', 'received')->count(),
            'in_treatment' => Appointment::where('agent_id', $agent->id)->where('status', 'treatment')->count(),
            'discharged' => Appointment::where('agent_id', $agent->id)->where('status', 'discharge')->count(),
            'total_reports' => Report::whereHas('patient', fn($q) => $q->where('agent_id', $agent->id))->count(),
        ];

        $recentPatients = Patient::where('agent_id', $agent->id)
            ->withCount('reports')
            ->with(['appointments' => fn($q) => $q->latest()->take(1)])
            ->latest('id')
            ->take(6)
            ->get();

        $recentAppointments = Appointment::where('agent_id', $agent->id)
            ->with(['patient', 'doctor', 'hospital'])
            ->latest('id')
            ->take(6)
            ->get();

        return view('agent.dashboard.index', compact('agent', 'stats', 'recentPatients', 'recentAppointments'));
    }
}

