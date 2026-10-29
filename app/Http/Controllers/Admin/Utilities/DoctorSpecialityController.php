<?php

namespace App\Http\Controllers\Admin\Utilities;

use App\Helpers\IconHelper;
use App\Http\Controllers\Controller;
use App\Models\DoctorSpeciality;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

        // Available library icons from public/icons
        $publicIcons = IconHelper::getPublicIcons();

        return view('admin.utilities.doctor_spaciality', compact('specialities', 'publicIcons'));
    }

    /**
     * Store a newly created doctor speciality in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:doctor_specialities,name'],
            'selected_icon' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif', 'max:5120'],
        ]);

        // 1. If file uploaded, prioritize upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/specialities');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/specialities/' . $filename;
        } elseif ($request->filled('selected_icon')) {
            // 2. If chosen from public/icons library
            $validated['image'] = $request->selected_icon;
        }

        unset($validated['selected_icon']);

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
            'selected_icon' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif', 'max:5120'],
        ]);

        if ($request->hasFile('image')) {
            // Delete old uploaded image if in uploads/
            if ($doctorSpeciality->image && str_starts_with($doctorSpeciality->image, 'uploads/') && File::exists(public_path($doctorSpeciality->image))) {
                File::delete(public_path($doctorSpeciality->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/specialities');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/specialities/' . $filename;
        } elseif ($request->filled('selected_icon')) {
            // Delete old uploaded image if in uploads/
            if ($doctorSpeciality->image && str_starts_with($doctorSpeciality->image, 'uploads/') && File::exists(public_path($doctorSpeciality->image))) {
                File::delete(public_path($doctorSpeciality->image));
            }

            $validated['image'] = $request->selected_icon;
        }

        unset($validated['selected_icon']);

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

        if ($doctorSpeciality->image && str_starts_with($doctorSpeciality->image, 'uploads/') && File::exists(public_path($doctorSpeciality->image))) {
            File::delete(public_path($doctorSpeciality->image));
        }

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

        $specialities = DoctorSpeciality::whereIn('id', $validated['ids'])->get();

        foreach ($specialities as $speciality) {
            if ($speciality->image && str_starts_with($speciality->image, 'uploads/') && File::exists(public_path($speciality->image))) {
                File::delete(public_path($speciality->image));
            }
            $speciality->delete();
        }

        $count = $specialities->count();
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
