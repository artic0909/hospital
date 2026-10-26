<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ServiceController extends Controller
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
        $categories = Service::CATEGORIES;

        $query = Service::where('hospital_id', $hospital->id);

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        $perPage = $request->get('per_page', 10);
        if ($perPage === 'all') {
            $services = $query->latest()->paginate(99999)->withQueryString();
        } else {
            $perPage = in_array((int)$perPage, [10, 20, 50, 100], true) ? (int)$perPage : 10;
            $services = $query->latest()->paginate($perPage)->withQueryString();
        }

        // Counts per category for badge indicators
        $categoryCounts = Service::where('hospital_id', $hospital->id)
            ->selectRaw('category, count(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category')
            ->toArray();

        return view('partner.service.index', compact('hospital', 'services', 'categories', 'categoryCounts'));
    }

    public function store(Request $request): RedirectResponse
    {
        $hospital = $this->getHospital();

        $validated = $request->validate([
            'category' => ['required', 'string', Rule::in(Service::CATEGORIES)],
            'name' => ['required', 'string', 'max:255'],
        ], [
            'category.required' => 'Please select a service category.',
            'category.in' => 'Selected category is invalid.',
            'name.required' => 'Service title/description is required.',
        ]);

        Service::create([
            'hospital_id' => $hospital->id,
            'category' => $validated['category'],
            'name' => $validated['name'],
        ]);

        return back()->with('success', "Service '{$validated['name']}' added to {$validated['category']}!");
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $hospital = $this->getHospital();
        abort_if($service->hospital_id !== $hospital->id, 403);

        $validated = $request->validate([
            'category' => ['required', 'string', Rule::in(Service::CATEGORIES)],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $service->update($validated);

        return back()->with('success', "Service updated successfully!");
    }

    public function destroy(Service $service): RedirectResponse
    {
        $hospital = $this->getHospital();
        abort_if($service->hospital_id !== $hospital->id, 403);

        $name = $service->name;
        $service->delete();

        return back()->with('success', "Service '{$name}' removed successfully!");
    }

    public function bulkDelete(Request $request): RedirectResponse
    {
        $hospital = $this->getHospital();
        $ids = $request->input('selected_ids', []);

        if (empty($ids) || !is_array($ids)) {
            return back()->with('error', 'Please select at least one service to delete.');
        }

        $count = Service::where('hospital_id', $hospital->id)->whereIn('id', $ids)->delete();

        return back()->with('success', "{$count} service(s) deleted successfully!");
    }
}
