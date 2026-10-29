<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of hero slides/sections.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = HeroSection::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('badge', 'like', "%{$search}%")
                  ->orWhere('subheading', 'like', "%{$search}%");
            });
        }

        $heroes = $query->orderBy('order', 'asc')->orderBy('id', 'desc')->paginate(10)->withQueryString();

        $stats = [
            'total' => HeroSection::count(),
            'active' => HeroSection::where('is_active', true)->count(),
            'inactive' => HeroSection::where('is_active', false)->count(),
        ];

        return view('admin.hero.index', compact('heroes', 'stats', 'search'));
    }

    /**
     * Show the form for creating a new hero slide.
     */
    public function create()
    {
        return view('admin.hero.create');
    }

    /**
     * Store a newly created hero slide in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'badge' => 'nullable|string|max:150',
            'highlight_text' => 'nullable|string|max:150',
            'subheading' => 'nullable|string',
            'patient_count' => 'nullable|string|max:100',
            'patient_count_label' => 'nullable|string|max:150',
            'rating' => 'nullable|string|max:20',
            'rating_label' => 'nullable|string|max:150',
            'primary_btn_text' => 'nullable|string|max:100',
            'primary_btn_url' => 'nullable|string|max:255',
            'secondary_btn_text' => 'nullable|string|max:100',
            'secondary_btn_url' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/hero');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/hero/' . $filename;
        }

        HeroSection::create($validated);

        return redirect()->route('admin.hero-section.index')
            ->with('success', 'Hero section slide created successfully.');
    }

    /**
     * Show the form for editing the specified hero slide.
     */
    public function edit(HeroSection $heroSection)
    {
        return view('admin.hero.edit', compact('heroSection'));
    }

    /**
     * Update the specified hero slide in storage.
     */
    public function update(Request $request, HeroSection $heroSection)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'badge' => 'nullable|string|max:150',
            'highlight_text' => 'nullable|string|max:150',
            'subheading' => 'nullable|string',
            'patient_count' => 'nullable|string|max:100',
            'patient_count_label' => 'nullable|string|max:150',
            'rating' => 'nullable|string|max:20',
            'rating_label' => 'nullable|string|max:150',
            'primary_btn_text' => 'nullable|string|max:100',
            'primary_btn_url' => 'nullable|string|max:255',
            'secondary_btn_text' => 'nullable|string|max:100',
            'secondary_btn_url' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists in uploads
            if ($heroSection->image && File::exists(public_path($heroSection->image)) && str_starts_with($heroSection->image, 'uploads/')) {
                File::delete(public_path($heroSection->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/hero');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/hero/' . $filename;
        }

        $heroSection->update($validated);

        return redirect()->route('admin.hero-section.index')
            ->with('success', 'Hero section slide updated successfully.');
    }

    /**
     * Remove the specified hero slide from storage.
     */
    public function destroy(HeroSection $heroSection)
    {
        if ($heroSection->image && File::exists(public_path($heroSection->image)) && str_starts_with($heroSection->image, 'uploads/')) {
            File::delete(public_path($heroSection->image));
        }

        $heroSection->delete();

        return redirect()->route('admin.hero-section.index')
            ->with('success', 'Hero section slide deleted successfully.');
    }

    /**
     * Toggle active status.
     */
    public function toggleStatus(HeroSection $heroSection)
    {
        $heroSection->update([
            'is_active' => !$heroSection->is_active,
        ]);

        return back()->with('success', 'Hero section status updated.');
    }
}

