<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\DoctorSpeciality;
use App\Models\HeroSection;
use App\Models\Hospital;
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
}

