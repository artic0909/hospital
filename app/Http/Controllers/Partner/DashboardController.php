<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the partner portal dashboard with dynamic database metrics.
     */
    public function index(Request $request): View
    {
        /** @var \App\Models\Partner|null $partner */
        $partner = Auth::guard('partner')->user();
        $hospital = $partner?->getHospital();

        // Base scoped query for partner appointments (qualify columns with table name)
        $aptQuery = Appointment::query();
        if ($partner) {
            $aptQuery->where(function ($q) use ($partner, $hospital) {
                $q->where('appointments.partner_id', $partner->id);
                if ($hospital) {
                    $q->orWhere('appointments.hospital_id', $hospital->id);
                }
            });
        }

        // 1. Core KPIs
        $totalReferrals = (clone $aptQuery)->count();
        $bookedCount    = (clone $aptQuery)->where('appointments.status', 'booked')->count();
        $receivedCount  = (clone $aptQuery)->where('appointments.status', 'received')->count();
        $treatmentCount = (clone $aptQuery)->where('appointments.status', 'treatment')->count();
        $dischargeCount = (clone $aptQuery)->where('appointments.status', 'discharge')->count();
        $admissions     = $receivedCount + $treatmentCount;

        $totalPatients = $partner ? Patient::where('partner_id', $partner->id)->count() : 0;
        if ($totalPatients === 0 && $hospital) {
            $totalPatients = Patient::where('hospital_id', $hospital->id)->count();
        }

        $doctorCount = $hospital 
            ? Doctor::where('hospital_id', $hospital->id)->count() 
            : Doctor::count();

        // Calculate earnings from partner's appointments
        $totalEarnings = (clone $aptQuery)
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->sum('doctors.OPD_fee');

        $referralsThisMonth = (clone $aptQuery)
            ->whereYear('appointments.created_at', Carbon::now()->year)
            ->whereMonth('appointments.created_at', Carbon::now()->month)
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
            'doctor_count'         => $doctorCount,
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

            $monthlyReferrals[] = (clone $aptQuery)
                ->whereYear('appointments.created_at', $date->year)
                ->whereMonth('appointments.created_at', $date->month)
                ->count();

            $monthlyAdmissions[] = (clone $aptQuery)
                ->whereYear('appointments.created_at', $date->year)
                ->whereMonth('appointments.created_at', $date->month)
                ->whereIn('appointments.status', ['received', 'treatment', 'discharge'])
                ->count();
        }

        // 3. Specialties Distribution
        $specialties = (clone $aptQuery)
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->whereNotNull('doctors.spaciality')
            ->where('doctors.spaciality', '!=', '')
            ->select('doctors.spaciality', DB::raw('count(*) as count'))
            ->groupBy('doctors.spaciality')
            ->orderByDesc('count')
            ->take(5)
            ->get();

        if ($specialties->isEmpty()) {
            $docQuery = Doctor::query();
            if ($hospital) {
                $docQuery->where('hospital_id', $hospital->id);
            }
            $specialties = $docQuery->whereNotNull('spaciality')
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

        // 5. Radial Progress & Top Doctors / Specialties
        $radialProgress = $totalReferrals > 0
            ? (int) min(100, round((($treatmentCount + $dischargeCount) / $totalReferrals) * 100))
            : 0;

        // Partner destinations / doctors breakdown
        $topDoctors = Doctor::query();
        if ($hospital) {
            $topDoctors->where('hospital_id', $hospital->id);
        }
        $destinations = $topDoctors->take(4)->get()->map(function ($doc) use ($totalReferrals, $partner, $hospital) {
            $docAptCount = Appointment::where('doctor_id', $doc->id)
                ->where(function($q) use ($partner, $hospital) {
                    if ($partner) $q->where('appointments.partner_id', $partner->id);
                    if ($hospital) $q->orWhere('appointments.hospital_id', $hospital->id);
                })
                ->count();
            $pct = $totalReferrals > 0 ? round(($docAptCount / $totalReferrals) * 100) : 0;
            return [
                'name'       => 'Dr. ' . $doc->name . ' (' . ($doc->spaciality ?? 'Specialist') . ')',
                'count'      => $docAptCount,
                'percentage' => $pct,
            ];
        });

        // 6. Recent Appointments Table
        $recentAppointments = (clone $aptQuery)
            ->with(['patient', 'doctor', 'hospital', 'partner', 'histories'])
            ->latest('appointments.created_at')
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

        return view('partner.dashboard.index', compact(
            'partner',
            'hospital',
            'kpis',
            'chartData',
            'destinations',
            'recentAppointments'
        ));
    }
}
