<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroSectionController extends Controller
{
    /**
     * Show the edit form for the single hero section.
     */
    public function edit()
    {
        $heroSection = HeroSection::getHero();
        return view('admin.hero.edit', compact('heroSection'));
    }

    /**
     * Update the single hero section in storage.
     */
    public function update(Request $request)
    {
        $heroSection = HeroSection::getHero();

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
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif|max:5120',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists in uploads
            if ($heroSection->image && File::exists(public_path($heroSection->image)) && str_starts_with($heroSection->image, 'uploads/')) {
                File::delete(public_path($heroSection->image));
            }

            $file = $request->file('image');
            $filename = 'hero_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/hero');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/hero/' . $filename;
        }

        $heroSection->update($validated);

        return redirect()->route('admin.hero-section.index')
            ->with('success', 'Hero section data updated successfully.');
    }
}
