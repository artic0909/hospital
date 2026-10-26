<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSpeciality;
use App\Models\Schedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DoctorController extends Controller
{
    /**
     * Get active hospital for authenticated partner.
     */
    protected function getHospital()
    {
        $partner = Auth::guard('partner')->user();
        $hospital = $partner ? $partner->getHospital() : null;

        if (!$hospital) {
            abort(404, 'No active hospital profile assigned to your partner account.');
        }

        return $hospital;
    }

    /**
     * Display doctors listing for the partner's hospital.
     */
    public function index(Request $request): View
    {
        $hospital = $this->getHospital();
        $query = Doctor::with('schedules')->where('hospital_id', $hospital->id);

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('designation', 'like', "%{$search}%")
                  ->orWhere('spaciality', 'like', "%{$search}%");
            });
        }

        if ($request->filled('spaciality')) {
            $query->where('spaciality', $request->spaciality);
        }

        $perPage = $request->get('per_page', 10);
        if ($perPage === 'all') {
            $doctors = $query->latest()->paginate(99999)->withQueryString();
        } else {
            $perPage = in_array((int)$perPage, [10, 20, 50, 100], true) ? (int)$perPage : 10;
            $doctors = $query->latest()->paginate($perPage)->withQueryString();
        }

        $specialities = DoctorSpeciality::orderBy('name')->get();

        return view('partner.doctor.index', compact('hospital', 'doctors', 'specialities'));
    }

    /**
     * Show form to add a new doctor.
     */
    public function create(): View
    {
        $hospital = $this->getHospital();
        $specialities = DoctorSpeciality::orderBy('name')->get();

        return view('partner.doctor.create', compact('hospital', 'specialities'));
    }

    /**
     * Store a newly created doctor & consultation schedule.
     */
    public function store(Request $request): RedirectResponse
    {
        $hospital = $this->getHospital();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
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
            'image.extensions' => 'The photo must be an image (SVG, PNG, JPG, JPEG, WebP, GIF).',
            'image.max' => 'The photo size must not exceed 5MB.',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('doctors');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'doctors/' . $filename;
        }

        $doctor = Doctor::create([
            'hospital_id' => $hospital->id,
            'name' => $validated['name'],
            'designation' => $validated['designation'],
            'spaciality' => $validated['spaciality'],
            'experience' => (int)$validated['experience'],
            'OPD_fee' => (float)$validated['OPD_fee'],
            'surgeries' => $validated['surgeries'] ?? null,
            'education' => $validated['education'],
            'awards' => $validated['awards'] ?? null,
            'work_experiance' => $validated['work_experiance'] ?? null,
            'image' => $imagePath,
            'status' => $request->boolean('status', true),
        ]);

        if (!empty($validated['schedules'])) {
            foreach ($validated['schedules'] as $slot) {
                if (!empty($slot['day']) && !empty($slot['time_from']) && !empty($slot['time_to'])) {
                    Schedule::create([
                        'doctor_id' => $doctor->id,
                        'day' => $slot['day'],
                        'time_from' => trim($slot['time_from']),
                        'time_to' => trim($slot['time_to']),
                    ]);
                }
            }
        }

        return redirect()->route('partner.doctor.index')
            ->with('success', "Dr. {$doctor->name} added successfully!");
    }

    /**
     * Display specified doctor profile & timetable.
     */
    public function show(Doctor $doctor): View
    {
        $hospital = $this->getHospital();
        abort_if($doctor->hospital_id !== $hospital->id, 403);

        $doctor->load(['hospital', 'schedules']);
        return view('partner.doctor.view', compact('hospital', 'doctor'));
    }

    /**
     * Show form for editing doctor.
     */
    public function edit(Doctor $doctor): View
    {
        $hospital = $this->getHospital();
        abort_if($doctor->hospital_id !== $hospital->id, 403);

        $doctor->load('schedules');
        $specialities = DoctorSpeciality::orderBy('name')->get();

        return view('partner.doctor.update', compact('hospital', 'doctor', 'specialities'));
    }

    /**
     * Update specified doctor & weekly schedules.
     */
    public function update(Request $request, Doctor $doctor): RedirectResponse
    {
        $hospital = $this->getHospital();
        abort_if($doctor->hospital_id !== $hospital->id, 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
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
        ]);

        if ($request->hasFile('image')) {
            if ($doctor->image && file_exists(public_path($doctor->image))) {
                @unlink(public_path($doctor->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('doctors');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $doctor->image = 'doctors/' . $filename;
        }

        $doctor->name = $validated['name'];
        $doctor->designation = $validated['designation'];
        $doctor->spaciality = $validated['spaciality'];
        $doctor->experience = (int)$validated['experience'];
        $doctor->OPD_fee = (float)$validated['OPD_fee'];
        $doctor->surgeries = $validated['surgeries'] ?? null;
        $doctor->education = $validated['education'];
        $doctor->awards = $validated['awards'] ?? null;
        $doctor->work_experiance = $validated['work_experiance'] ?? null;
        $doctor->status = $request->boolean('status', true);
        $doctor->save();

        Schedule::where('doctor_id', $doctor->id)->delete();
        if (!empty($validated['schedules'])) {
            foreach ($validated['schedules'] as $slot) {
                if (!empty($slot['day']) && !empty($slot['time_from']) && !empty($slot['time_to'])) {
                    Schedule::create([
                        'doctor_id' => $doctor->id,
                        'day' => $slot['day'],
                        'time_from' => trim($slot['time_from']),
                        'time_to' => trim($slot['time_to']),
                    ]);
                }
            }
        }

        return redirect()->route('partner.doctor.index')
            ->with('success', "Dr. {$doctor->name} updated successfully!");
    }

    /**
     * Delete doctor and schedules.
     */
    public function destroy(Doctor $doctor): RedirectResponse
    {
        $hospital = $this->getHospital();
        abort_if($doctor->hospital_id !== $hospital->id, 403);

        if ($doctor->image && file_exists(public_path($doctor->image))) {
            @unlink(public_path($doctor->image));
        }

        $name = $doctor->name;
        $doctor->delete();

        return redirect()->route('partner.doctor.index')
            ->with('success', "Dr. {$name} deleted successfully!");
    }

    /**
     * Bulk delete doctors.
     */
    public function bulkDelete(Request $request): RedirectResponse
    {
        $hospital = $this->getHospital();
        $ids = $request->input('selected_ids', []);

        if (empty($ids) || !is_array($ids)) {
            return back()->with('error', 'Please select at least one doctor to delete.');
        }

        $doctors = Doctor::where('hospital_id', $hospital->id)->whereIn('id', $ids)->get();
        foreach ($doctors as $doc) {
            if ($doc->image && file_exists(public_path($doc->image))) {
                @unlink(public_path($doc->image));
            }
            $doc->delete();
        }

        return back()->with('success', count($doctors) . " doctor(s) deleted successfully!");
    }
}
