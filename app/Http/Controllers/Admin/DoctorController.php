<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSpeciality;
use App\Models\Hospital;
use App\Models\Schedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DoctorController extends Controller
{
    /**
     * Display a listing of doctors for a specific hospital.
     */
    public function index(Request $request, Hospital $hospital): View
    {
        $query = $hospital->doctors()->with('schedules')->latest();

        // Search filter
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('designation', 'like', "%{$search}%")
                  ->orWhere('spaciality', 'like', "%{$search}%")
                  ->orWhere('education', 'like', "%{$search}%");
            });
        }

        // Filter by Speciality
        if ($request->filled('spaciality')) {
            $query->where('spaciality', $request->spaciality);
        }

        // Per page limit (10, 20, 50, 100, all)
        $perPageInput = $request->input('per_page', 10);
        if ($perPageInput === 'all') {
            $totalCount = $query->count();
            $doctors = $query->paginate($totalCount > 0 ? $totalCount : 10)->withQueryString();
        } else {
            $perPage = in_array((int)$perPageInput, [10, 20, 50, 100], true) ? (int)$perPageInput : 10;
            $doctors = $query->paginate($perPage)->withQueryString();
        }

        $specialities = DoctorSpeciality::orderBy('name')->get();

        return view('admin.hospital.doctor.index', compact('hospital', 'doctors', 'specialities'));
    }

    /**
     * Show the form for creating a new doctor.
     */
    public function create(Hospital $hospital): View
    {
        $specialities = DoctorSpeciality::orderBy('name')->get();
        return view('admin.hospital.doctor.create', compact('hospital', 'specialities'));
    }

    /**
     * Store a newly created doctor and weekly schedules.
     */
    public function store(Request $request, Hospital $hospital): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:doctors,slug'],
            'designation' => ['required', 'string', 'max:255'],
            'spaciality' => ['required', 'string', 'max:255'],
            'experience' => ['required', 'integer', 'min:0'],
            'OPD_fee' => ['required', 'numeric', 'min:0'],
            'surgeries' => ['nullable', 'string', 'max:255'],
            'education' => ['required', 'string'],
            'awards' => ['nullable', 'string'],
            'work_experiance' => ['nullable', 'string'],
            'image' => ['nullable', 'file', 'extensions:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif', 'max:5120'],
            'status' => ['nullable', 'boolean'],
            'schedules' => ['nullable', 'array'],
            'schedules.*.day' => ['required_with:schedules', 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday'],
            'schedules.*.time_from' => ['required_with:schedules', 'string'],
            'schedules.*.time_to' => ['required_with:schedules', 'string'],
        ], [
            'image.extensions' => 'The doctor photo must be an image (SVG, PNG, JPG, JPEG, WebP, GIF).',
            'image.max' => 'The photo size must not exceed 5MB.',
        ]);

        $validated['hospital_id'] = $hospital->id;
        $validated['status'] = $request->has('status');

        if (!empty($validated['slug'])) {
            $validated['slug'] = Doctor::generateUniqueSlug($validated['slug']);
        } else {
            $validated['slug'] = Doctor::generateUniqueSlug($validated['name']);
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('doctors', 'public');
        }

        $doctor = Doctor::create($validated);

        // Save Schedules
        if ($request->has('schedules') && is_array($request->schedules)) {
            foreach ($request->schedules as $sched) {
                if (!empty($sched['day']) && !empty($sched['time_from']) && !empty($sched['time_to'])) {
                    Schedule::create([
                        'doctor_id' => $doctor->id,
                        'day' => $sched['day'],
                        'time_from' => $sched['time_from'],
                        'time_to' => $sched['time_to'],
                    ]);
                }
            }
        }

        return redirect()->route('admin.hospital.doctor.index', $hospital)
            ->with('success', "Dr. {$doctor->name} and consultation schedule registered successfully!");
    }

    /**
     * Display the specified doctor profile and schedule table.
     */
    public function show(Hospital $hospital, Doctor $doctor): View
    {
        $doctor->load(['hospital', 'schedules']);
        return view('admin.hospital.doctor.view', compact('hospital', 'doctor'));
    }

    /**
     * Show the form for editing the specified doctor.
     */
    public function edit(Hospital $hospital, Doctor $doctor): View
    {
        $doctor->load('schedules');
        $specialities = DoctorSpeciality::orderBy('name')->get();
        return view('admin.hospital.doctor.update', compact('hospital', 'doctor', 'specialities'));
    }

    /**
     * Update the specified doctor and schedules.
     */
    public function update(Request $request, Hospital $hospital, Doctor $doctor): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', \Illuminate\Validation\Rule::unique('doctors', 'slug')->ignore($doctor->id)],
            'designation' => ['required', 'string', 'max:255'],
            'spaciality' => ['required', 'string', 'max:255'],
            'experience' => ['required', 'integer', 'min:0'],
            'OPD_fee' => ['required', 'numeric', 'min:0'],
            'surgeries' => ['nullable', 'string', 'max:255'],
            'education' => ['required', 'string'],
            'awards' => ['nullable', 'string'],
            'work_experiance' => ['nullable', 'string'],
            'image' => ['nullable', 'file', 'extensions:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif', 'max:5120'],
            'status' => ['nullable', 'boolean'],
            'schedules' => ['nullable', 'array'],
            'schedules.*.day' => ['required_with:schedules', 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday'],
            'schedules.*.time_from' => ['required_with:schedules', 'string'],
            'schedules.*.time_to' => ['required_with:schedules', 'string'],
        ], [
            'image.extensions' => 'The doctor photo must be an image (SVG, PNG, JPG, JPEG, WebP, GIF).',
            'image.max' => 'The photo size must not exceed 5MB.',
        ]);

        $validated['status'] = $request->has('status');

        if (!empty($validated['slug'])) {
            $validated['slug'] = Doctor::generateUniqueSlug($validated['slug'], $doctor->id);
        } else {
            $validated['slug'] = Doctor::generateUniqueSlug($validated['name'], $doctor->id);
        }

        if ($request->hasFile('image')) {
            if ($doctor->image && Storage::disk('public')->exists($doctor->image)) {
                Storage::disk('public')->delete($doctor->image);
            }
            $validated['image'] = $request->file('image')->store('doctors', 'public');
        }

        $doctor->update($validated);

        // Sync Schedules (delete old and insert updated)
        if ($request->has('schedules') && is_array($request->schedules)) {
            $doctor->schedules()->delete();
            foreach ($request->schedules as $sched) {
                if (!empty($sched['day']) && !empty($sched['time_from']) && !empty($sched['time_to'])) {
                    Schedule::create([
                        'doctor_id' => $doctor->id,
                        'day' => $sched['day'],
                        'time_from' => $sched['time_from'],
                        'time_to' => $sched['time_to'],
                    ]);
                }
            }
        }

        return redirect()->route('admin.hospital.doctor.index', $hospital->id)
            ->with('success', "Dr. {$doctor->name} updated successfully!");
    }

    /**
     * Remove the specified doctor from storage.
     */
    public function destroy(Hospital $hospital, Doctor $doctor): RedirectResponse
    {
        $name = $doctor->name;
        if ($doctor->image && Storage::disk('public')->exists($doctor->image)) {
            Storage::disk('public')->delete($doctor->image);
        }
        $doctor->delete();

        return back()->with('success', "Dr. {$name} deleted successfully!");
    }

    /**
     * Bulk delete doctors for this hospital.
     */
    public function bulkDelete(Request $request, Hospital $hospital): RedirectResponse
    {
        $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['exists:doctors,id'],
        ]);

        $doctors = Doctor::where('hospital_id', $hospital->id)->whereIn('id', $request->ids)->get();
        foreach ($doctors as $doc) {
            if ($doc->image && Storage::disk('public')->exists($doc->image)) {
                Storage::disk('public')->delete($doc->image);
            }
            $doc->delete();
        }

        return back()->with('success', count($doctors) . ' doctor(s) deleted successfully!');
    }
}
