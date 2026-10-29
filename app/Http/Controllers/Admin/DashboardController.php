<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Partner;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the admin central dashboard with dynamic database metrics.
     */
    public function index(Request $request): View
    {
        $admin = Auth::guard('admin')->user() ?? Auth::user();

        // 1. Core KPIs
        $totalReferrals = Appointment::count();
        $bookedCount    = Appointment::where('status', 'booked')->count();
        $receivedCount  = Appointment::where('status', 'received')->count();
        $treatmentCount = Appointment::where('status', 'treatment')->count();
        $dischargeCount = Appointment::where('status', 'discharge')->count();
        $admissions     = $receivedCount + $treatmentCount;

        $totalPatients  = Patient::count();
        $totalPartners  = Partner::count();
        $totalHospitals = Hospital::count();
        $totalDoctors   = Doctor::count();

        // Sum of doctor OPD fee for appointments (or fall back to doctor fees)
        $totalEarnings = Appointment::join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->sum('doctors.OPD_fee');
        if ($totalEarnings <= 0) {
            $totalEarnings = Doctor::sum('OPD_fee');
        }

        $referralsThisMonth = Appointment::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        $conversionRate = $totalReferrals > 0
            ? round((($treatmentCount + $dischargeCount) / $totalReferrals) * 100, 1)
            : 0;

        $completionRate = $totalReferrals > 0
            ? round(($dischargeCount / $totalReferrals) * 100, 1)
            : 0;

        $kpis = [
            'total_referrals'      => $totalReferrals,
            'admissions'           => $admissions,
            'active_treatment'     => $treatmentCount,
            'received'             => $receivedCount,
            'discharged'           => $dischargeCount,
            'booked'               => $bookedCount,
            'total_patients'       => $totalPatients,
            'total_partners'       => $totalPartners,
            'total_hospitals'      => $totalHospitals,
            'total_doctors'        => $totalDoctors,
            'total_earnings'       => (float) $totalEarnings,
            'referrals_this_month' => $referralsThisMonth,
            'conversion_rate'      => $conversionRate,
            'completion_rate'      => $completionRate,
        ];

        // 2. Monthly Trend Chart (Last 6 Months)
        $monthlyLabels     = [];
        $monthlyReferrals  = [];
        $monthlyAdmissions = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthlyLabels[] = $date->format('M Y');

            $monthlyReferrals[] = Appointment::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $monthlyAdmissions[] = Appointment::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->whereIn('status', ['received', 'treatment', 'discharge'])
                ->count();
        }

        // 3. Specialties Distribution (Donut Chart)
        $specialties = Appointment::join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->whereNotNull('doctors.spaciality')
            ->where('doctors.spaciality', '!=', '')
            ->select('doctors.spaciality', DB::raw('count(*) as count'))
            ->groupBy('doctors.spaciality')
            ->orderByDesc('count')
            ->take(5)
            ->get();

        if ($specialties->isEmpty()) {
            $specialties = Doctor::whereNotNull('spaciality')
                ->where('spaciality', '!=', '')
                ->select('spaciality', DB::raw('count(*) as count'))
                ->groupBy('spaciality')
                ->orderByDesc('count')
                ->take(5)
                ->get();
        }

        $specialtyLabels = $specialties->pluck('spaciality')->toArray();
        $specialtySeries = $specialties->pluck('count')->map(fn($v) => (int) $v)->toArray();

        if (empty($specialtyLabels)) {
            $specialtyLabels = ['General Medicine', 'Cardiology', 'Orthopedics'];
            $specialtySeries = [1, 1, 1];
        }

        // 4. Conversion Pipeline Funnel
        $pipelineCategories = [
            '1. Inquiries Booked',
            '2. Patients Received',
            '3. In Treatment',
            '4. Discharged / Completed'
        ];
        $pipelineSeries = [
            $bookedCount,
            $receivedCount,
            $treatmentCount,
            $dischargeCount
        ];
        $retentionRate = $totalReferrals > 0
            ? round((($treatmentCount + $dischargeCount) / $totalReferrals) * 100)
            : 100;

        // 5. Radial Progress & Destination Hubs
        $radialProgress = $totalReferrals > 0
            ? (int) min(100, round((($treatmentCount + $dischargeCount) / $totalReferrals) * 100))
            : 0;

        $destinations = Hospital::withCount(['appointments'])
            ->orderByDesc('appointments_count')
            ->take(4)
            ->get()
            ->map(function ($hosp) use ($totalReferrals) {
                $count = $hosp->appointments_count;
                $pct = $totalReferrals > 0 ? round(($count / $totalReferrals) * 100) : 0;
                return [
                    'name'       => $hosp->name,
                    'count'      => $count,
                    'percentage' => $pct,
                ];
            });

        // 6. Recent Appointments Table
        $recentAppointments = Appointment::with(['patient', 'doctor', 'hospital', 'partner', 'histories'])
            ->latest()
            ->take(8)
            ->get();

        // Package chart payload
        $chartData = [
            'monthly' => [
                'labels'     => $monthlyLabels,
                'referrals'  => $monthlyReferrals,
                'admissions' => $monthlyAdmissions,
            ],
            'specialty' => [
                'labels' => $specialtyLabels,
                'series' => $specialtySeries,
            ],
            'pipeline' => [
                'categories'    => $pipelineCategories,
                'series'        => $pipelineSeries,
                'retentionRate' => $retentionRate,
            ],
            'radialProgress' => $radialProgress,
        ];

        return view('admin.dashboard.index', compact(
            'admin',
            'kpis',
            'chartData',
            'destinations',
            'recentAppointments'
        ));
    }
}
