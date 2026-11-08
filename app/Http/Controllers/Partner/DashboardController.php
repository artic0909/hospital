<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the partner portal dashboard for hospital management.
     */
    public function index(Request $request): View
    {
        /** @var \App\Models\Partner|null $partner */
        $partner = Auth::guard('partner')->user();
        $hospital = $partner?->getHospital();

        if ($hospital) {
            $hospital->load(['country', 'city', 'state', 'category', 'infrustructure', 'locationGuide']);
        }

        // Hospital Resource Counters
        $doctorCount   = $hospital ? $hospital->doctors()->count() : 0;
        $facilityCount = $hospital ? $hospital->facilities()->count() : 0;
        $imageCount    = $hospital ? $hospital->images()->count() : 0;
        $serviceCount  = $hospital ? $hospital->services()->count() : 0;
        $reviewCount   = $hospital ? $hospital->reviews()->count() : 0;
        $avgRating     = $hospital ? round($hospital->reviews()->avg('rating') ?: 5.0, 1) : 5.0;

        $kpis = [
            'doctor_count'   => $doctorCount,
            'facility_count' => $facilityCount,
            'image_count'    => $imageCount,
            'service_count'  => $serviceCount,
            'review_count'   => $reviewCount,
            'avg_rating'     => $avgRating,
        ];

        // Recent Doctors associated with this partner hospital
        $doctors = $hospital 
            ? $hospital->doctors()->with('schedules')->latest('id')->take(8)->get() 
            : collect();

        // Recent Reviews for this hospital
        $recentReviews = $hospital
            ? $hospital->reviews()->latest('id')->take(5)->get()
            : collect();

        return view('partner.dashboard.index', compact(
            'partner',
            'hospital',
            'kpis',
            'doctors',
            'recentReviews'
        ));
    }
}
