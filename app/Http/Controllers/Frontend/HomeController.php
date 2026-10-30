<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\City;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\DoctorSpeciality;
use App\Models\HeroSection;
use App\Models\Hospital;
use App\Models\HospitalCategory;
use App\Models\HowItWork;
use App\Models\Partner;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the frontend home page with dynamic sections.
     */
    public function index(): View
    {
        // 1. Hero Section (singleton)
        $hero = HeroSection::getHero();

        // 2. Doctor Specialties
        $specialities = DoctorSpeciality::withCount('treatments')
            ->orderBy('id')
            ->get();

        // 3. How It Works (ordered active steps)
        $howItWorks = HowItWork::where('is_active', true)
            ->orderBy('step_number')
            ->orderBy('order')
            ->get();

        // 4. Treatments / Procedures
        $treatments = Treatment::with(['department', 'doctorSpeciality'])
            ->latest()
            ->take(12)
            ->get();

        // 5. Network of Top Hospitals (with city, country, images)
        $hospitals = Hospital::with(['country', 'city', 'images', 'category'])
            ->where('status', true)
            ->get();

        // Separate India and international network hospitals
        $indiaHospitals = $hospitals->filter(function ($h) {
            return strtolower($h->country?->name ?? '') === 'india';
        })->values();

        $internationalHospitals = $hospitals->filter(function ($h) {
            return strtolower($h->country?->name ?? '') !== 'india';
        })->values();

        // Accredited Hospital Partners
        $partners = Partner::where('status', 'active')
            ->whereNotNull('hospital_id')
            ->with('hospital')
            ->get();

        // 6. HealGoFly In News / Blogs
        $blogs = Blog::where('status', 'published')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(8)
            ->get();

        return view('frontend.pages.index', compact(
            'hero',
            'specialities',
            'howItWorks',
            'treatments',
            'hospitals',
            'indiaHospitals',
            'internationalHospitals',
            'partners',
            'blogs'
        ));
    }

    /**
     * Display a specific blog/news details page.
     */
    public function blogDetails(string $slug): View
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Increment views count
        $blog->increment('views');

        // Recent stories
        $recentBlogs = Blog::where('id', '!=', $blog->id)
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(5)
            ->get();

        // Featured specialties for sidebar
        $sidebarSpecialities = DoctorSpeciality::take(6)->get();

        return view('frontend.pages.blog-details', compact('blog', 'recentBlogs', 'sidebarSpecialities'));
    }

    /**
     * Display the dynamic hospitals directory with header and sidebar filters.
     */
    public function hospitals(Request $request): View
    {
        $query = Hospital::with(['country', 'state', 'city', 'category', 'images', 'reviews'])
            ->withCount('doctors')
            ->where('status', true);

        // 1. Filter by Country
        $selectedCountry = null;
        if ($request->filled('country')) {
            $countryParam = trim($request->country);
            $query->whereHas('country', function ($q) use ($countryParam) {
                $q->where('name', $countryParam);
            });
            $selectedCountry = Country::where('name', $countryParam)->first();
        }

        // 2. Filter by Hospital Category
        $selectedCategory = null;
        if ($request->filled('category')) {
            $categoryParam = trim($request->category);
            $query->whereHas('category', function ($q) use ($categoryParam) {
                $q->where('name', $categoryParam);
            });
            $selectedCategory = HospitalCategory::where('name', $categoryParam)->first();
        } elseif ($request->filled('category_id')) {
            $query->where('hospital_category_id', $request->category_id);
            $selectedCategory = HospitalCategory::find($request->category_id);
        }

        // 3. Filter by City
        $selectedCity = $request->input('city');
        if (!empty($selectedCity) && $selectedCity !== 'all') {
            $cityParam = trim($selectedCity);
            $query->whereHas('city', function ($q) use ($cityParam) {
                $q->where('name', $cityParam);
            });
        }

        // 4. Filter by Search Query
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('about', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhereHas('city', fn($cq) => $cq->where('name', 'like', "%{$search}%"))
                  ->orWhereHas('country', fn($cq) => $cq->where('name', 'like', "%{$search}%"));
            });
        }

        // 5. Sorting
        $sort = $request->input('sort', 'recommended');
        if ($sort === 'beds') {
            $query->orderByDesc('no_of_bed');
        } elseif ($sort === 'established') {
            $query->orderBy('establish_year');
        } elseif ($sort === 'rating') {
            $query->withAvg('reviews', 'rating')->orderByDesc('reviews_avg_rating');
        } else {
            $query->latest();
        }

        $hospitals = $query->paginate(10)->withQueryString();

        // Available filter options
        $countries = Country::whereHas('hospitals', fn($q) => $q->where('status', true))->orderBy('name')->get();
        $categories = HospitalCategory::orderBy('name')->get();

        // Extract available cities for quick filter pills safely
        if ($selectedCountry) {
            $cities = City::where(function ($cq) use ($selectedCountry) {
                $cq->whereHas('state', fn($sq) => $sq->where('country_id', $selectedCountry->id))
                   ->orWhereHas('hospitals', fn($hq) => $hq->where('country_id', $selectedCountry->id)->where('status', true));
            })
            ->whereHas('hospitals', fn($q) => $q->where('status', true))
            ->orderBy('name')
            ->get();
        } else {
            $cities = City::whereHas('hospitals', fn($q) => $q->where('status', true))->orderBy('name')->get();
        }

        return view('frontend.pages.hospital.hospitals', compact(
            'hospitals',
            'selectedCountry',
            'selectedCategory',
            'selectedCity',
            'countries',
            'categories',
            'cities'
        ));
    }

    /**
     * Display the dynamic doctors directory with header and hospital filters.
     */
    public function doctors(Request $request): View
    {
        $query = Doctor::with(['hospital.country', 'hospital.city', 'hospital.state', 'schedules'])
            ->where('status', true);

        // 1. Filter by Hospital (slug or id or name) - "& hospital's doctors show"
        $selectedHospital = null;
        if ($request->filled('hospital')) {
            $hospitalParam = trim($request->hospital);
            $query->whereHas('hospital', function ($q) use ($hospitalParam) {
                $q->where('slug', $hospitalParam)
                  ->orWhere('name', 'like', "%{$hospitalParam}%");
            });
            $selectedHospital = Hospital::where('slug', $hospitalParam)
                ->orWhere('name', $hospitalParam)
                ->first();
        } elseif ($request->filled('hospital_id')) {
            $query->where('hospital_id', $request->hospital_id);
            $selectedHospital = Hospital::find($request->hospital_id);
        }

        // 2. Filter by Country
        $selectedCountry = null;
        if ($request->filled('country')) {
            $countryParam = trim($request->country);
            $query->whereHas('hospital.country', function ($q) use ($countryParam) {
                $q->where('name', $countryParam);
            });
            $selectedCountry = Country::where('name', $countryParam)->first();
        }

        // 3. Filter by Speciality - Doctors show specialist wise from any hospital
        $selectedSpeciality = null;
        if ($request->filled('speciality') && $request->speciality !== 'all') {
            $specParam = trim($request->speciality);
            
            // Extract key words to allow smart fuzzy matching (e.g. "Cardiology" matches "Cardiothoracic Surgery" or "Interventional Cardiology")
            $words = array_filter(preg_split('/[\s,&]+/', $specParam), fn($w) => mb_strlen($w) > 3);
            
            $query->where(function ($q) use ($specParam, $words) {
                $q->where('spaciality', 'like', "%{$specParam}%")
                  ->orWhere('designation', 'like', "%{$specParam}%")
                  ->orWhereRaw('? LIKE CONCAT("%", spaciality, "%")', [$specParam]);

                foreach ($words as $word) {
                    $q->orWhere('spaciality', 'like', "%{$word}%")
                      ->orWhere('designation', 'like', "%{$word}%");
                }
            });

            $selectedSpeciality = DoctorSpeciality::where('name', 'like', "%{$specParam}%")->first()
                ?? (object)['name' => $specParam];
        }

        // 4. Filter by Search Query
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('designation', 'like', "%{$search}%")
                  ->orWhere('spaciality', 'like', "%{$search}%")
                  ->orWhere('education', 'like', "%{$search}%")
                  ->orWhereHas('hospital', fn($hq) => $hq->where('name', 'like', "%{$search}%"));
            });
        }

        // 5. Sorting
        $sort = $request->input('sort', 'experience');
        if ($sort === 'fee_low') {
            $query->orderBy('OPD_fee');
        } elseif ($sort === 'fee_high') {
            $query->orderByDesc('OPD_fee');
        } elseif ($sort === 'experience') {
            $query->orderByDesc('experience');
        } else {
            $query->latest();
        }

        $doctors = $query->paginate(10)->withQueryString();

        // Data for dynamic filters: only show specialities that have actual doctors in DB
        $activeDoctorSpecialities = Doctor::where('status', true)
            ->whereNotNull('spaciality')
            ->where('spaciality', '!=', '')
            ->pluck('spaciality')
            ->map(fn($s) => trim($s))
            ->filter()
            ->unique();

        $matchedSpecialities = collect();
        foreach ($activeDoctorSpecialities as $specName) {
            $matched = DoctorSpeciality::where(function ($q) use ($specName) {
                $q->where('name', 'like', "%{$specName}%")
                  ->orWhereRaw('? LIKE CONCAT("%", name, "%")', [$specName]);
            })->first();

            if ($matched) {
                $matchedSpecialities->push($matched);
            } else {
                $matchedSpecialities->push((object)[
                    'name' => $specName,
                ]);
            }
        }

        $specialities = $matchedSpecialities->unique('name');
        if ($specialities->isEmpty()) {
            $specialities = DoctorSpeciality::orderBy('name')->get();
        }
        $countries = Country::whereHas('hospitals.doctors', fn($q) => $q->where('status', true))->orderBy('name')->get();
        if ($countries->isEmpty()) {
            $countries = Country::whereHas('hospitals', fn($q) => $q->where('status', true))->orderBy('name')->get();
        }
        $hospitals = Hospital::where('status', true)->whereHas('doctors', fn($q) => $q->where('status', true))->orderBy('name')->get();
        if ($hospitals->isEmpty()) {
            $hospitals = Hospital::where('status', true)->orderBy('name')->get();
        }

        return view('frontend.pages.doctor.doctors', compact(
            'doctors',
            'selectedHospital',
            'selectedCountry',
            'selectedSpeciality',
            'specialities',
            'countries',
            'hospitals'
        ));
    }

    /**
     * Unified Global Search: Search Hospitals, Doctors, Specialities, and Categories.
     */
    public function search(Request $request): View
    {
        $keyword = trim($request->input('q', $request->input('search', '')));
        $type = $request->input('type', 'all'); // 'all', 'hospitals', 'doctors', 'specialities', 'categories'

        // 1. Search Hospitals (by hospital name, category name, country, city, address, about)
        $hospitalsQuery = Hospital::with(['country', 'city', 'state', 'category', 'images'])
            ->withCount('doctors')
            ->where('status', true);

        if (!empty($keyword)) {
            $words = array_filter(preg_split('/[\s,&]+/', $keyword), fn($w) => mb_strlen($w) > 2);
            $hospitalsQuery->where(function ($q) use ($keyword, $words) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('about', 'like', "%{$keyword}%")
                  ->orWhere('address', 'like', "%{$keyword}%")
                  ->orWhereHas('category', fn($cat) => $cat->where('name', 'like', "%{$keyword}%"))
                  ->orWhereHas('country', fn($cnt) => $cnt->where('name', 'like', "%{$keyword}%"))
                  ->orWhereHas('city', fn($ct) => $ct->where('name', 'like', "%{$keyword}%"));

                foreach ($words as $w) {
                    $q->orWhere('name', 'like', "%{$w}%")
                      ->orWhereHas('category', fn($cat) => $cat->where('name', 'like', "%{$w}%"))
                      ->orWhereHas('country', fn($cnt) => $cnt->where('name', 'like', "%{$w}%"))
                      ->orWhereHas('city', fn($ct) => $ct->where('name', 'like', "%{$w}%"));
                }
            });
        }

        // 2. Search Doctors (by doctor name, speciality, designation, hospital name, country, city)
        $doctorsQuery = Doctor::with(['hospital.country', 'hospital.city', 'hospital.state', 'schedules'])
            ->where('status', true);

        if (!empty($keyword)) {
            $words = array_filter(preg_split('/[\s,&]+/', $keyword), fn($w) => mb_strlen($w) > 2);
            $doctorsQuery->where(function ($q) use ($keyword, $words) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('designation', 'like', "%{$keyword}%")
                  ->orWhere('spaciality', 'like', "%{$keyword}%")
                  ->orWhere('education', 'like', "%{$keyword}%")
                  ->orWhereHas('hospital', fn($hq) => $hq->where('name', 'like', "%{$keyword}%"))
                  ->orWhereHas('hospital.category', fn($cat) => $cat->where('name', 'like', "%{$keyword}%"))
                  ->orWhereHas('hospital.country', fn($cnt) => $cnt->where('name', 'like', "%{$keyword}%"));

                foreach ($words as $w) {
                    $q->orWhere('name', 'like', "%{$w}%")
                      ->orWhere('spaciality', 'like', "%{$w}%")
                      ->orWhere('designation', 'like', "%{$w}%")
                      ->orWhereHas('hospital', fn($hq) => $hq->where('name', 'like', "%{$w}%"));
                }
            });
        }

        // 3. Search Matching Specialities
        $specialities = collect();
        if (!empty($keyword)) {
            $specialities = DoctorSpeciality::withCount('treatments')
                ->where('name', 'like', "%{$keyword}%")
                ->orWhere('description', 'like', "%{$keyword}%")
                ->take(8)
                ->get();
        }

        // 4. Search Matching Hospital Categories
        $categories = collect();
        if (!empty($keyword)) {
            $categories = HospitalCategory::withCount(['hospitals' => fn($q) => $q->where('status', true)])
                ->where('name', 'like', "%{$keyword}%")
                ->take(8)
                ->get();
        }

        // Count totals
        $totalHospitals = (clone $hospitalsQuery)->count();
        $totalDoctors = (clone $doctorsQuery)->count();

        // Paginate results based on active tab
        if ($type === 'doctors') {
            $doctors = $doctorsQuery->latest()->paginate(10)->withQueryString();
            $hospitals = collect();
        } elseif ($type === 'hospitals') {
            $hospitals = $hospitalsQuery->latest()->paginate(10)->withQueryString();
            $doctors = collect();
        } else {
            // 'all': show up to 6 of each or paginated
            $hospitals = $hospitalsQuery->latest()->paginate(6, ['*'], 'hospitals_page')->withQueryString();
            $doctors = $doctorsQuery->latest()->paginate(6, ['*'], 'doctors_page')->withQueryString();
        }

        return view('frontend.pages.search', compact(
            'keyword',
            'type',
            'hospitals',
            'doctors',
            'specialities',
            'categories',
            'totalHospitals',
            'totalDoctors'
        ));
    }
}

