<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\PatientEnquiry;
use Illuminate\Http\Request;

class PatientEnquiryController extends Controller
{
    /**
     * Display a listing of patient enquiries.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status');
        $hospitalId = $request->query('hospital_id');
        $hasDoctor = $request->query('has_doctor');

        $query = PatientEnquiry::with(['hospital.country', 'doctor.hospital']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('problem', 'like', "%{$search}%")
                  ->orWhereHas('hospital', fn($hq) => $hq->where('name', 'like', "%{$search}%"))
                  ->orWhereHas('doctor', fn($dq) => $dq->where('name', 'like', "%{$search}%"));
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        if ($hospitalId) {
            $query->where('hospital_id', $hospitalId);
        }

        if ($hasDoctor === 'yes') {
            $query->whereNotNull('doctor_id');
        } elseif ($hasDoctor === 'no') {
            $query->whereNull('doctor_id');
        }

        $enquiries = $query->latest('id')->paginate(15)->withQueryString();

        $stats = [
            'total' => PatientEnquiry::count(),
            'pending' => PatientEnquiry::where('status', 'pending')->count(),
            'contacted' => PatientEnquiry::where('status', 'contacted')->count(),
            'in_treatment' => PatientEnquiry::where('status', 'in_treatment')->count(),
            'closed' => PatientEnquiry::where('status', 'closed')->count(),
            'with_hospital' => PatientEnquiry::whereNotNull('hospital_id')->count(),
            'with_doctor' => PatientEnquiry::whereNotNull('doctor_id')->count(),
        ];

        $hospitals = Hospital::where('status', true)->orderBy('name')->get();

        return view('admin.enquiry.index', compact('enquiries', 'stats', 'search', 'status', 'hospitalId', 'hasDoctor', 'hospitals'));
    }

    /**
     * Display details of a specific enquiry with full Hospital and Doctor associations.
     */
    public function show(PatientEnquiry $enquiry)
    {
        $enquiry->load(['hospital.country', 'hospital.city', 'hospital.category', 'doctor.hospital']);

        return view('admin.enquiry.show', compact('enquiry'));
    }

    /**
     * Update enquiry status.
     */
    public function updateStatus(Request $request, PatientEnquiry $enquiry)
    {
        $request->validate([
            'status' => 'required|in:pending,contacted,in_treatment,closed',
        ]);

        $enquiry->update(['status' => $request->status]);

        return back()->with('success', 'Enquiry status updated to ' . ucfirst(str_replace('_', ' ', $request->status)));
    }

    /**
     * Update admin internal notes.
     */
    public function updateNotes(Request $request, PatientEnquiry $enquiry)
    {
        $request->validate([
            'admin_notes' => 'nullable|string',
        ]);

        $enquiry->update(['admin_notes' => $request->admin_notes]);

        return back()->with('success', 'Internal notes updated successfully.');
    }

    /**
     * Delete an enquiry.
     */
    public function destroy(PatientEnquiry $enquiry)
    {
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')
            ->with('success', 'Patient enquiry deleted successfully.');
    }
}

