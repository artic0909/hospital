<?php

namespace App\Http\Controllers\Admin\Utilities;

use App\Helpers\IconHelper;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DoctorSpeciality;
use App\Models\Treatment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

        // Available library icons from public/icons
        $publicIcons = IconHelper::getPublicIcons();

        return view('admin.utilities.treatment', compact('treatments', 'departments', 'specialities', 'publicIcons'));
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
            'selected_icon' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif', 'max:5120'],
        ]);

        // 1. If file uploaded, prioritize upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/treatments');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/treatments/' . $filename;
        } elseif ($request->filled('selected_icon')) {
            // 2. If chosen from public/icons library
            $validated['image'] = $request->selected_icon;
        }

        unset($validated['selected_icon']);

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
            'selected_icon' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif', 'max:5120'],
        ]);

        if ($request->hasFile('image')) {
            // Delete old uploaded image if in uploads/
            if ($treatment->image && str_starts_with($treatment->image, 'uploads/') && File::exists(public_path($treatment->image))) {
                File::delete(public_path($treatment->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/treatments');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/treatments/' . $filename;
        } elseif ($request->filled('selected_icon')) {
            // Delete old uploaded image if in uploads/
            if ($treatment->image && str_starts_with($treatment->image, 'uploads/') && File::exists(public_path($treatment->image))) {
                File::delete(public_path($treatment->image));
            }

            $validated['image'] = $request->selected_icon;
        }

        unset($validated['selected_icon']);

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

        if ($treatment->image && str_starts_with($treatment->image, 'uploads/') && File::exists(public_path($treatment->image))) {
            File::delete(public_path($treatment->image));
        }

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

        $treatments = Treatment::whereIn('id', $validated['ids'])->get();

        foreach ($treatments as $treatment) {
            if ($treatment->image && str_starts_with($treatment->image, 'uploads/') && File::exists(public_path($treatment->image))) {
                File::delete(public_path($treatment->image));
            }
            $treatment->delete();
        }

        $count = $treatments->count();
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
