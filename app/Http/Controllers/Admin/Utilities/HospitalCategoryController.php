<?php

namespace App\Http\Controllers\Admin\Utilities;

use App\Http\Controllers\Controller;
use App\Models\HospitalCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HospitalCategoryController extends Controller
{
    /**
     * Display a listing of hospital categories.
     */
    public function index(Request $request): View
    {
        $query = HospitalCategory::latest();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where('name', 'like', "%{$search}%");
        }

        $perPageInput = $request->input('per_page', 10);
        if ($perPageInput === 'all') {
            $totalCount = $query->count();
            $categories = $query->paginate($totalCount > 0 ? $totalCount : 10)->withQueryString();
        } else {
            $perPage = in_array((int)$perPageInput, [10, 20, 50, 100], true) ? (int)$perPageInput : 10;
            $categories = $query->paginate($perPage)->withQueryString();
        }

        return view('admin.utilities.hospital_category', compact('categories'));
    }

    /**
     * Store a newly created hospital category in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:hospital_categories,name'],
        ]);

        $category = HospitalCategory::create($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Category "' . $category->name . '" created successfully!',
                'data' => $category,
            ]);
        }

        return back()->with('success', 'Category "' . $category->name . '" created successfully!');
    }

    /**
     * Update the specified hospital category in storage.
     */
    public function update(Request $request, HospitalCategory $hospitalCategory): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:hospital_categories,name,' . $hospitalCategory->id],
        ]);

        $hospitalCategory->update($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully!',
                'data' => $hospitalCategory,
            ]);
        }

        return back()->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified hospital category from storage.
     */
    public function destroy(Request $request, HospitalCategory $hospitalCategory): JsonResponse|RedirectResponse
    {
        $name = $hospitalCategory->name;
        $hospitalCategory->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Category "' . $name . '" deleted successfully!',
            ]);
        }

        return back()->with('success', 'Category "' . $name . '" deleted successfully!');
    }

    /**
     * Bulk delete selected hospital categories.
     */
    public function bulkDelete(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['exists:hospital_categories,id'],
        ], [
            'ids.required' => 'Please select at least one category to delete.',
        ]);

        $count = HospitalCategory::whereIn('id', $validated['ids'])->delete();

        $msg = "{$count} " . ($count === 1 ? 'category' : 'categories') . ' deleted successfully!';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $msg,
            ]);
        }

        return back()->with('success', $msg);
    }
}
