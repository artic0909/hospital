<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HowItWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HowItWorksController extends Controller
{
    /**
     * Display a listing of steps.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = HowItWork::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('step_number', 'like', "%{$search}%");
            });
        }

        $steps = $query->orderBy('step_number', 'asc')->orderBy('order', 'asc')->paginate(10)->withQueryString();

        $stats = [
            'total' => HowItWork::count(),
            'active' => HowItWork::where('is_active', true)->count(),
            'inactive' => HowItWork::where('is_active', false)->count(),
        ];

        return view('admin.how-it-works.index', compact('steps', 'stats', 'search'));
    }

    /**
     * Show the form for creating a new step.
     */
    public function create()
    {
        $nextStepNumber = (HowItWork::max('step_number') ?? 0) + 1;
        return view('admin.how-it-works.create', compact('nextStepNumber'));
    }

    /**
     * Store a newly created step in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'step_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? $validated['step_number'];

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/how-it-works');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/how-it-works/' . $filename;
        }

        HowItWork::create($validated);

        return redirect()->route('admin.how-it-works.index')
            ->with('success', 'Workflow step created successfully.');
    }

    /**
     * Show the form for editing the specified step.
     */
    public function edit(HowItWork $howItWork)
    {
        return view('admin.how-it-works.edit', compact('howItWork'));
    }

    /**
     * Update the specified step in storage.
     */
    public function update(Request $request, HowItWork $howItWork)
    {
        $validated = $request->validate([
            'step_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? $validated['step_number'];

        if ($request->hasFile('image')) {
            if ($howItWork->image && File::exists(public_path($howItWork->image)) && str_starts_with($howItWork->image, 'uploads/')) {
                File::delete(public_path($howItWork->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/how-it-works');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/how-it-works/' . $filename;
        }

        $howItWork->update($validated);

        return redirect()->route('admin.how-it-works.index')
            ->with('success', 'Workflow step updated successfully.');
    }

    /**
     * Remove the specified step from storage.
     */
    public function destroy(HowItWork $howItWork)
    {
        if ($howItWork->image && File::exists(public_path($howItWork->image)) && str_starts_with($howItWork->image, 'uploads/')) {
            File::delete(public_path($howItWork->image));
        }

        $howItWork->delete();

        return redirect()->route('admin.how-it-works.index')
            ->with('success', 'Workflow step deleted successfully.');
    }

    /**
     * Toggle active status.
     */
    public function toggleStatus(HowItWork $howItWork)
    {
        $howItWork->update([
            'is_active' => !$howItWork->is_active,
        ]);

        return back()->with('success', 'Workflow step status updated.');
    }
}

