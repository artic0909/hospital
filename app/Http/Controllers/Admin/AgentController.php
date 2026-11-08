<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Appointment;
use App\Models\Country;
use App\Models\Patient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AgentController extends Controller
{
    /**
     * Display a listing of agents.
     */
    public function index(Request $request): View
    {
        $query = Agent::withCount(['patients', 'appointments']);

        // Search Filter
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('agent_type', 'like', "%{$search}%");

                // Search by Agent code pattern e.g. AGT-00001
                if (preg_match('/^AGT-?0*(\d+)$/i', $search, $matches)) {
                    $q->orWhere('id', (int) $matches[1]);
                }
            });
        }

        // Status Filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Country Filter
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // Pagination
        $perPage = $request->input('per_page', 10);
        if ($perPage === 'all') {
            $agents = $query->latest('id')->paginate(99999)->withQueryString();
        } else {
            $perPage = in_array((int)$perPage, [10, 20, 50, 100], true) ? (int)$perPage : 10;
            $agents = $query->latest('id')->paginate($perPage)->withQueryString();
        }

        // Statistics
        $stats = [
            'total' => Agent::count(),
            'active' => Agent::where('status', 'active')->count(),
            'suspended' => Agent::where('status', 'suspended')->count(),
            'total_patients' => Patient::whereNotNull('agent_id')->count(),
            'total_appointments' => Appointment::whereNotNull('agent_id')->count(),
        ];

        // Filter list of countries
        $filterCountries = Agent::whereNotNull('country')
            ->where('country', '!=', '')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        return view('admin.agent.index', compact('agents', 'stats', 'filterCountries'));
    }

    /**
     * Show the form for creating a new agent.
     */
    public function create(): View
    {
        $countries = Country::orderBy('name')->get();
        return view('admin.agent.create', compact('countries'));
    }

    /**
     * Store a newly created agent in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:agents,email'],
            'phone' => ['required', 'string', 'min:5', 'max:30'],
            'country' => ['required', 'string', 'max:100'],
            'agent_type' => ['required', 'string', 'max:100'],
            'website' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'in:active,suspended'],
            'password' => ['nullable', 'string', 'min:6'],
        ]);

        $agent = Agent::create([
            'name' => trim($validated['name']),
            'company_name' => $request->filled('company_name') ? trim($validated['company_name']) : null,
            'email' => strtolower(trim($validated['email'])),
            'phone' => trim($validated['phone']),
            'country' => trim($validated['country']),
            'agent_type' => $validated['agent_type'],
            'website' => $request->filled('website') ? trim($validated['website']) : null,
            'address' => $request->filled('address') ? trim($validated['address']) : null,
            'status' => $validated['status'],
            'password' => Hash::make($request->filled('password') ? $request->password : '12345678'),
        ]);

        return redirect()
            ->route('admin.agent.view', $agent->id)
            ->with('success', "Agent '{$agent->name}' ({$agent->agent_code}) created successfully!");
    }

    /**
     * Display the specified agent details.
     */
    public function show(Agent $agent): View
    {
        $agent->loadCount(['patients', 'appointments']);
        
        $patients = Patient::where('agent_id', $agent->id)
            ->withCount('reports')
            ->with(['appointments' => fn($q) => $q->latest()->take(1)])
            ->latest('id')
            ->take(15)
            ->get();

        $appointments = Appointment::where('agent_id', $agent->id)
            ->orWhereHas('patient', fn($q) => $q->where('agent_id', $agent->id))
            ->with(['patient', 'doctor', 'hospital'])
            ->latest('id')
            ->take(15)
            ->get();

        return view('admin.agent.view', compact('agent', 'patients', 'appointments'));
    }

    /**
     * Show the form for editing the agent.
     */
    public function edit(Agent $agent): View
    {
        $countries = Country::orderBy('name')->get();
        return view('admin.agent.update', compact('agent', 'countries'));
    }

    /**
     * Update the specified agent in storage.
     */
    public function update(Request $request, Agent $agent): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('agents')->ignore($agent->id)],
            'phone' => ['required', 'string', 'min:5', 'max:30'],
            'country' => ['required', 'string', 'max:100'],
            'agent_type' => ['required', 'string', 'max:100'],
            'website' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'in:active,suspended'],
            'password' => ['nullable', 'string', 'min:6'],
        ]);

        $data = [
            'name' => trim($validated['name']),
            'company_name' => $request->filled('company_name') ? trim($validated['company_name']) : null,
            'email' => strtolower(trim($validated['email'])),
            'phone' => trim($validated['phone']),
            'country' => trim($validated['country']),
            'agent_type' => $validated['agent_type'],
            'website' => $request->filled('website') ? trim($validated['website']) : null,
            'address' => $request->filled('address') ? trim($validated['address']) : null,
            'status' => $validated['status'],
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $agent->update($data);

        return redirect()
            ->route('admin.agent.view', $agent->id)
            ->with('success', "Agent '{$agent->name}' profile updated successfully!");
    }

    /**
     * Remove the specified agent from storage.
     */
    public function destroy(Agent $agent): RedirectResponse
    {
        $name = $agent->name;
        $code = $agent->agent_code;

        // Unlink patients and appointments so records are preserved safely
        Patient::where('agent_id', $agent->id)->update(['agent_id' => null]);
        Appointment::where('agent_id', $agent->id)->update(['agent_id' => null]);

        $agent->delete();

        return redirect()
            ->route('admin.agent.index')
            ->with('success', "Agent '{$name}' ({$code}) deleted successfully.");
    }

    /**
     * Direct login into Agent Portal as this agent (Admin impersonation mode).
     */
    public function loginAsAgent(Agent $agent): RedirectResponse
    {
        // 1. If agent is suspended, activate so admin can login
        if ($agent->status === 'suspended') {
            $agent->update(['status' => 'active']);
        }

        // 2. Log into agent guard with admin impersonation session flags
        Auth::guard('agent')->login($agent);

        session([
            'impersonated_by_admin' => true,
            'impersonated_agent_id' => $agent->id,
            'impersonated_agent_name' => $agent->name,
            'impersonated_agent_code' => $agent->agent_code,
        ]);

        return redirect()
            ->route('agent.dashboard')
            ->with('success', "Direct Login Successful! You are now viewing the Agent Portal as {$agent->name} ({$agent->agent_code}).");
    }
}

