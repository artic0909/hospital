<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\LocationGuide;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LocationGuideController extends Controller
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
        $locationGuide = LocationGuide::firstOrCreate(
            ['hospital_id' => $hospital->id],
            ['description' => '<p>Conveniently accessible from international & domestic airports, metro stations, and key transport hubs. Ample parking, dedicated patient pick-up & drop-off zones, and affiliated patient guest houses nearby.</p>']
        );

        return view('partner.locationguide.index', compact('hospital', 'locationGuide'));
    }

    public function store(Request $request): RedirectResponse
    {
        $hospital = $this->getHospital();

        $validated = $request->validate([
            'description' => ['required', 'string'],
        ], [
            'description.required' => 'Please provide the location guide and travel connectivity details.',
        ]);

        LocationGuide::updateOrCreate(
            ['hospital_id' => $hospital->id],
            ['description' => $validated['description']]
        );

        return back()->with('success', 'Location guide updated successfully!');
    }
}
