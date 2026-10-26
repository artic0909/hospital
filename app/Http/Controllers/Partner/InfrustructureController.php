<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Infrustructure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class InfrustructureController extends Controller
{
    protected function getHospital()
    {
        $partner = Auth::guard('partner')->user();
        $hospital = $partner ? $partner->getHospital() : null;

        if (!$hospital) {
            abort(404, 'No active hospital profile assigned to your partner account.');
        }

        return $hospital;
    }

    public function index(): View
    {
        $hospital = $this->getHospital();
        $infrustructure = Infrustructure::firstOrCreate(
            ['hospital_id' => $hospital->id],
            ['description' => '<p>State-of-the-art medical infrastructure with modern operating theaters, intensive care units, advanced robotic surgery suites, and round-the-clock emergency support.</p>']
        );

        return view('partner.infrustructure.index', compact('hospital', 'infrustructure'));
    }

    public function store(Request $request): RedirectResponse
    {
        $hospital = $this->getHospital();

        $validated = $request->validate([
            'description' => ['required', 'string'],
        ], [
            'description.required' => 'Please provide the infrastructure details.',
        ]);

        Infrustructure::updateOrCreate(
            ['hospital_id' => $hospital->id],
            ['description' => $validated['description']]
        );

        return back()->with('success', 'Hospital infrastructure details updated successfully!');
    }
}
