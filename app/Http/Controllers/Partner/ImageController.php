<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\HospitalImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ImageController extends Controller
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
        $images = HospitalImage::where('hospital_id', $hospital->id)->latest()->paginate(18);

        return view('partner.image.index', compact('hospital', 'images'));
    }

    public function store(Request $request): RedirectResponse
    {
        $hospital = $this->getHospital();

        $request->validate([
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['required', 'file', 'extensions:jpeg,png,jpg,gif,svg,webp,ico,bmp,avif', 'max:5120'],
            'title' => ['nullable', 'string', 'max:255'],
        ], [
            'images.required' => 'Please select at least one photo to upload.',
            'images.*.extensions' => 'Uploaded files must be images (SVG, PNG, JPG, JPEG, WebP, GIF).',
            'images.*.max' => 'Maximum upload file size is 5MB per image.',
        ]);

        $destination = public_path('hospital_images');
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $count = 0;
        foreach ($request->file('images') as $file) {
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $filename);

            HospitalImage::create([
                'hospital_id' => $hospital->id,
                'image' => 'hospital_images/' . $filename,
                'title' => $request->title ?: $file->getClientOriginalName(),
            ]);
            $count++;
        }

        return back()->with('success', "{$count} photo(s) uploaded successfully!");
    }

    public function destroy(HospitalImage $image): RedirectResponse
    {
        $hospital = $this->getHospital();
        abort_if($image->hospital_id !== $hospital->id, 403);

        if ($image->image && file_exists(public_path($image->image))) {
            @unlink(public_path($image->image));
        }

        $image->delete();

        return back()->with('success', 'Photo removed successfully!');
    }

    public function bulkDelete(Request $request): RedirectResponse
    {
        $hospital = $this->getHospital();
        $ids = $request->input('selected_ids', []);

        if (empty($ids) || !is_array($ids)) {
            return back()->with('error', 'Please select at least one photo to delete.');
        }

        $images = HospitalImage::where('hospital_id', $hospital->id)->whereIn('id', $ids)->get();
        foreach ($images as $img) {
            if ($img->image && file_exists(public_path($img->image))) {
                @unlink(public_path($img->image));
            }
            $img->delete();
        }

        return back()->with('success', count($images) . " photo(s) deleted successfully!");
    }
}
