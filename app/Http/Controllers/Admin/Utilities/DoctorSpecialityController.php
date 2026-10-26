<?php

namespace App\Http\Controllers\Admin\Utilities;

use App\Http\Controllers\Controller;
use App\Models\DoctorSpeciality;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DoctorSpecialityController extends Controller
{
    /**
     * Display a listing of doctor specialities.
     */
    public function index(Request $request): View
    {
        $query = DoctorSpeciality::withCount('treatments')->latest();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where('name', 'like', "%{$search}%");
        }

        $perPageInput = $request->input('per_page', 10);
        if ($perPageInput === 'all') {
            $totalCount = $query->count();
            $specialities = $query->paginate($totalCount > 0 ? $totalCount : 10)->withQueryString();
        } else {
            $perPage = in_array((int)$perPageInput, [10, 20, 50, 100], true) ? (int)$perPageInput : 10;
            $specialities = $query->paginate($perPage)->withQueryString();
        }

        return view('admin.utilities.doctor_spaciality', compact('specialities'));
    }

    /**
     * Store a newly created doctor speciality in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:doctor_specialities,name'],
        ]);

        $speciality = DoctorSpeciality::create($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Speciality "' . $speciality->name . '" created successfully!',
                'data' => $speciality,
            ]);
        }

        return back()->with('success', 'Speciality "' . $speciality->name . '" created successfully!');
    }

    /**
     * Update the specified doctor speciality in storage.
     */
    public function update(Request $request, DoctorSpeciality $doctorSpeciality): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:doctor_specialities,name,' . $doctorSpeciality->id],
        ]);

        $doctorSpeciality->update($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Speciality updated successfully!',
                'data' => $doctorSpeciality,
            ]);
        }

        return back()->with('success', 'Speciality updated successfully!');
    }

    /**
     * Remove the specified doctor speciality from storage.
     */
    public function destroy(Request $request, DoctorSpeciality $doctorSpeciality): JsonResponse|RedirectResponse
    {
        $name = $doctorSpeciality->name;
        $doctorSpeciality->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Speciality "' . $name . '" deleted successfully!',
            ]);
        }

        return back()->with('success', 'Speciality "' . $name . '" deleted successfully!');
    }

    /**
     * Bulk delete selected doctor specialities.
     */
    public function bulkDelete(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['exists:doctor_specialities,id'],
        ], [
            'ids.required' => 'Please select at least one speciality to delete.',
        ]);

        $count = DoctorSpeciality::whereIn('id', $validated['ids'])->delete();

        $msg = "{$count} " . ($count === 1 ? 'speciality' : 'specialities') . ' deleted successfully!';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $msg,
            ]);
        }

        return back()->with('success', $msg);
    }
}
