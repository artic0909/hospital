<?php

namespace App\Http\Controllers\Admin\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the departments.
     */
    public function index(Request $request): View
    {
        $query = Department::withCount('treatments')->latest();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $perPageInput = $request->input('per_page', 10);
        if ($perPageInput === 'all') {
            $totalCount = $query->count();
            $departments = $query->paginate($totalCount > 0 ? $totalCount : 10)->withQueryString();
        } else {
            $perPage = in_array((int)$perPageInput, [10, 20, 50, 100], true) ? (int)$perPageInput : 10;
            $departments = $query->paginate($perPage)->withQueryString();
        }

        return view('admin.utilities.department', compact('departments'));
    }

    /**
     * Store a newly created department in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image_icon' => ['nullable', 'file', 'extensions:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif', 'max:5120'],
        ], [
            'image_icon.extensions' => 'The icon image must be a valid format: SVG, PNG, JPG, JPEG, WebP, GIF, ICO, or AVIF.',
            'image_icon.max' => 'The icon image size must not exceed 5MB.',
        ]);

        if ($request->hasFile('image_icon')) {
            $path = $request->file('image_icon')->store('departments', 'public');
            $validated['image_icon'] = $path;
        }

        $department = Department::create($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Department "' . $department->name . '" created successfully!',
                'data' => $department,
            ]);
        }

        return back()->with('success', 'Department "' . $department->name . '" created successfully!');
    }

    /**
     * Update the specified department in storage.
     */
    public function update(Request $request, Department $department): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image_icon' => ['nullable', 'file', 'extensions:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif', 'max:5120'],
        ], [
            'image_icon.extensions' => 'The icon image must be a valid format: SVG, PNG, JPG, JPEG, WebP, GIF, ICO, or AVIF.',
            'image_icon.max' => 'The icon image size must not exceed 5MB.',
        ]);

        if ($request->hasFile('image_icon')) {
            if ($department->image_icon && Storage::disk('public')->exists($department->image_icon)) {
                Storage::disk('public')->delete($department->image_icon);
            }
            $path = $request->file('image_icon')->store('departments', 'public');
            $validated['image_icon'] = $path;
        }

        $department->update($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Department updated successfully!',
                'data' => $department,
            ]);
        }

        return back()->with('success', 'Department updated successfully!');
    }

    /**
     * Remove the specified department from storage.
     */
    public function destroy(Request $request, Department $department): JsonResponse|RedirectResponse
    {
        $name = $department->name;
        if ($department->image_icon && Storage::disk('public')->exists($department->image_icon)) {
            Storage::disk('public')->delete($department->image_icon);
        }
        $department->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Department "' . $name . '" deleted successfully!',
            ]);
        }

        return back()->with('success', 'Department "' . $name . '" deleted successfully!');
    }

    /**
     * Bulk delete selected departments.
     */
    public function bulkDelete(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['exists:departments,id'],
        ], [
            'ids.required' => 'Please select at least one department to delete.',
        ]);

        $departments = Department::whereIn('id', $validated['ids'])->get();
        foreach ($departments as $dept) {
            if ($dept->image_icon && Storage::disk('public')->exists($dept->image_icon)) {
                Storage::disk('public')->delete($dept->image_icon);
            }
            $dept->delete();
        }

        $count = $departments->count();
        $msg = "{$count} " . ($count === 1 ? 'department' : 'departments') . ' deleted successfully!';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $msg,
            ]);
        }

        return back()->with('success', $msg);
    }
}
