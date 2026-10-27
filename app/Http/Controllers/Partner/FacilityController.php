<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FacilityController extends Controller
{
    protected function getHospital()
    {
        $partner = Auth::guard('partner')->user();
        $hospital = $partner ? $partner->getHospital() : null;

        if (!$hospital) {
            abort(404, 'No active hospital profile assigned to your partner account.');
        }

        return $hospital;
    }

    public function index(Request $request): View
    {
        $hospital = $this->getHospital();
        $query = Facility::where('hospital_id', $hospital->id);

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where('name', 'like', "%{$search}%");
        }

        $perPage = $request->get('per_page', 10);
        if ($perPage === 'all') {
            $facilities = $query->latest()->paginate(99999)->withQueryString();
        } else {
            $perPage = in_array((int)$perPage, [10, 20, 50, 100], true) ? (int)$perPage : 10;
            $facilities = $query->latest()->paginate($perPage)->withQueryString();
        }

        return view('partner.facility.index', compact('hospital', 'facilities'));
    }

    public function store(Request $request): RedirectResponse
    {
        $hospital = $this->getHospital();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'file', 'extensions:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif', 'max:5120'],
        ], [
            'image.extensions' => 'Facility icon/photo must be an image format (SVG, PNG, JPG, WebP).',
            'image.max' => 'Maximum upload file size is 5MB.',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('facilities');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'facilities/' . $filename;
        }

        Facility::create([
            'hospital_id' => $hospital->id,
            'name' => $validated['name'],
            'image' => $imagePath,
        ]);

        return back()->with('success', "Facility '{$validated['name']}' added successfully!");
    }

    public function update(Request $request, Facility $facility): RedirectResponse
    {
        $hospital = $this->getHospital();
        abort_if($facility->hospital_id !== $hospital->id, 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'file', 'extensions:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif', 'max:5120'],
        ]);

        if ($request->hasFile('image')) {
            if ($facility->image && file_exists(public_path($facility->image))) {
                @unlink(public_path($facility->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('facilities');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $facility->image = 'facilities/' . $filename;
        }

        $facility->name = $validated['name'];
        $facility->save();

        return back()->with('success', "Facility '{$facility->name}' updated successfully!");
    }

    public function destroy(Facility $facility): RedirectResponse
    {
        $hospital = $this->getHospital();
        abort_if((int) $facility->hospital_id !== (int) $hospital->id, 403);

        if ($facility->image && file_exists(public_path($facility->image))) {
            @unlink(public_path($facility->image));
        }

        $name = $facility->name;
        $facility->delete();

        return back()->with('success', "Facility '{$name}' deleted successfully!");
    }

    public function bulkDelete(Request $request): RedirectResponse
    {
        $hospital = $this->getHospital();
        $ids = $request->input('selected_ids', $request->input('ids', []));

        if (empty($ids) || !is_array($ids)) {
            return back()->with('error', 'Please select at least one facility to delete.');
        }

        $facilities = Facility::where('hospital_id', $hospital->id)->whereIn('id', $ids)->get();
        foreach ($facilities as $fac) {
            if ($fac->image && file_exists(public_path($fac->image))) {
                @unlink(public_path($fac->image));
            }
            $fac->delete();
        }

        return back()->with('success', count($facilities) . " facility(ies) deleted successfully!");
    }
}
