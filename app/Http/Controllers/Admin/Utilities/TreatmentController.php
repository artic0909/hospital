<?php

namespace App\Http\Controllers\Admin\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DoctorSpeciality;
use App\Models\Treatment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TreatmentController extends Controller
{
    /**
     * Display a listing of treatments.
     */
    public function index(Request $request): View
    {
        $query = Treatment::with(['department', 'doctorSpeciality'])->latest();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('department', fn($dq) => $dq->where('name', 'like', "%{$search}%"))
                  ->orWhereHas('doctorSpeciality', fn($sq) => $sq->where('name', 'like', "%{$search}%"));
            });
        }

        if ($request->filled('department_id')) {
            $query->where('department_id', $request->department_id);
        }

        if ($request->filled('spaciality_id')) {
            $query->where('spaciality_id', $request->spaciality_id);
        }

        if ($request->filled('price_type')) {
            $query->where('price_type', $request->price_type);
        }

        $perPageInput = $request->input('per_page', 10);
        if ($perPageInput === 'all') {
            $totalCount = $query->count();
            $treatments = $query->paginate($totalCount > 0 ? $totalCount : 10)->withQueryString();
        } else {
            $perPage = in_array((int)$perPageInput, [10, 20, 50, 100], true) ? (int)$perPageInput : 10;
            $treatments = $query->paginate($perPage)->withQueryString();
        }

        $departments = Department::orderBy('name')->get();
        $specialities = DoctorSpeciality::orderBy('name')->get();

        return view('admin.utilities.treatment', compact('treatments', 'departments', 'specialities'));
    }

    /**
     * Store a newly created treatment in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'department_id' => ['required', 'exists:departments,id'],
            'spaciality_id' => ['nullable', 'exists:doctor_specialities,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'price_type' => ['required', 'in:rupees,dollars'],
        ]);

        $treatment = Treatment::create($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Treatment "' . $treatment->name . '" created successfully!',
                'data' => $treatment->load(['department', 'doctorSpeciality']),
            ]);
        }

        return back()->with('success', 'Treatment "' . $treatment->name . '" created successfully!');
    }

    /**
     * Update the specified treatment in storage.
     */
    public function update(Request $request, Treatment $treatment): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'department_id' => ['required', 'exists:departments,id'],
            'spaciality_id' => ['nullable', 'exists:doctor_specialities,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'price_type' => ['required', 'in:rupees,dollars'],
        ]);

        $treatment->update($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Treatment updated successfully!',
                'data' => $treatment->load(['department', 'doctorSpeciality']),
            ]);
        }

        return back()->with('success', 'Treatment updated successfully!');
    }

    /**
     * Remove the specified treatment from storage.
     */
    public function destroy(Request $request, Treatment $treatment): JsonResponse|RedirectResponse
    {
        $name = $treatment->name;
        $treatment->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Treatment "' . $name . '" deleted successfully!',
            ]);
        }

        return back()->with('success', 'Treatment "' . $name . '" deleted successfully!');
    }

    /**
     * Bulk delete selected treatments.
     */
    public function bulkDelete(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['exists:treatments,id'],
        ], [
            'ids.required' => 'Please select at least one treatment to delete.',
        ]);

        $count = Treatment::whereIn('id', $validated['ids'])->delete();

        $msg = "{$count} " . ($count === 1 ? 'treatment' : 'treatments') . ' deleted successfully!';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $msg,
            ]);
        }

        return back()->with('success', $msg);
    }
}
