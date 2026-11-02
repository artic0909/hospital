<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PatientStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PatientStoryController extends Controller
{
    /**
     * Display a listing of patient stories.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status');

        $query = PatientStory::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('headline', 'like', "%{$search}%")
                  ->orWhere('story', 'like', "%{$search}%")
                  ->orWhere('hospital_name', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('treatment_name', 'like', "%{$search}%");
            });
        }

        if ($status !== null && $status !== '') {
            $query->where('status', (bool)$status);
        }

        $stories = $query->latest('id')->paginate(10)->withQueryString();

        $stats = [
            'total' => PatientStory::count(),
            'active' => PatientStory::where('status', true)->count(),
            'featured' => PatientStory::where('is_featured', true)->count(),
        ];

        return view('admin.patient_story.index', compact('stories', 'stats', 'search', 'status'));
    }

    /**
     * Show the form for creating a new patient story.
     */
    public function create()
    {
        return view('admin.patient_story.create');
    }

    /**
     * Store a newly created patient story in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'headline' => 'nullable|string|max:255',
            'story' => 'required|string',
            'country' => 'nullable|string|max:100',
            'hospital_name' => 'nullable|string|max:255',
            'treatment_name' => 'nullable|string|max:255',
            'rating' => 'nullable|integer|min:1|max:5',
            'status' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $validated['status'] = $request->has('status') ? (bool)$request->status : true;
        $validated['is_featured'] = $request->has('is_featured');
        $validated['rating'] = $validated['rating'] ?? 5;

        $destinationPath = public_path('uploads/patient_stories');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // 1. Primary Photo
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/patient_stories/' . $filename;
        }

        // 2. Multiple Gallery Images
        $galleryImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $filename);
                $galleryImages[] = 'uploads/patient_stories/' . $filename;
            }
        }

        // If primary image wasn't uploaded, but gallery images were, use first gallery image as primary
        if (empty($validated['image']) && !empty($galleryImages)) {
            $validated['image'] = $galleryImages[0];
        }

        if (!empty($galleryImages)) {
            $validated['images'] = $galleryImages;
        }

        PatientStory::create($validated);

        return redirect()->route('admin.patient-stories.index')
            ->with('success', 'Patient story created successfully.');
    }

    /**
     * Show the form for editing the specified patient story.
     */
    public function edit(PatientStory $patientStory)
    {
        return view('admin.patient_story.edit', compact('patientStory'));
    }

    /**
     * Update the specified patient story in storage.
     */
    public function update(Request $request, PatientStory $patientStory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'headline' => 'nullable|string|max:255',
            'story' => 'required|string',
            'country' => 'nullable|string|max:100',
            'hospital_name' => 'nullable|string|max:255',
            'treatment_name' => 'nullable|string|max:255',
            'rating' => 'nullable|integer|min:1|max:5',
            'status' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $validated['status'] = $request->has('status') ? (bool)$request->status : false;
        $validated['is_featured'] = $request->has('is_featured');
        $validated['rating'] = $validated['rating'] ?? 5;

        $destinationPath = public_path('uploads/patient_stories');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // Primary image replacement
        if ($request->hasFile('image')) {
            if ($patientStory->image && File::exists(public_path($patientStory->image))) {
                File::delete(public_path($patientStory->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/patient_stories/' . $filename;
        }

        // Additional gallery images
        $existingImages = is_array($patientStory->images) ? $patientStory->images : [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $filename);
                $existingImages[] = 'uploads/patient_stories/' . $filename;
            }
            $validated['images'] = $existingImages;
        }

        $patientStory->update($validated);

        return redirect()->route('admin.patient-stories.index')
            ->with('success', 'Patient story updated successfully.');
    }

    /**
     * Remove the specified patient story from storage.
     */
    public function destroy(PatientStory $patientStory)
    {
        // Delete primary image
        if ($patientStory->image && File::exists(public_path($patientStory->image))) {
            File::delete(public_path($patientStory->image));
        }

        // Delete gallery images
        if (is_array($patientStory->images)) {
            foreach ($patientStory->images as $img) {
                if ($img && File::exists(public_path($img))) {
                    File::delete(public_path($img));
                }
            }
        }

        $patientStory->delete();

        return redirect()->route('admin.patient-stories.index')
            ->with('success', 'Patient story deleted successfully.');
    }

    /**
     * Toggle active/inactive status.
     */
    public function toggleStatus(PatientStory $patientStory)
    {
        $patientStory->status = !$patientStory->status;
        $patientStory->save();

        return back()->with('success', 'Patient story status updated to ' . ($patientStory->status ? 'Active' : 'Inactive'));
    }
}

