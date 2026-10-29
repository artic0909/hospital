<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;
use App\Models\HeroSection;
use App\Models\HowItWork;
use App\Models\Blog;

class FrontendDynamicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::getSettings();

        if (HeroSection::count() === 0) {
            HeroSection::create([
                'badge' => 'World-Class Healthcare Partner',
                'title' => 'Medical Treatment With Unmatched Personal Care',
                'highlight_text' => 'Personal Care',
                'subheading' => "World's Most Trusted Medical Travel Assistance Platform connecting global patients with accredited hospitals.",
                'patient_count' => '1,00,000+',
                'patient_count_label' => 'Patients Assisted Since 2016',
                'rating' => '4.7',
                'rating_label' => 'Google Rating (500+ Reviews)',
                'primary_btn_text' => 'Get a FREE Quote',
                'primary_btn_url' => '#quote-form',
                'secondary_btn_text' => 'WhatsApp Us',
                'secondary_btn_url' => 'https://wa.me/919129846542',
                'image' => 'images/hero_medical_care.jpg',
                'order' => 1,
                'is_active' => true,
            ]);
        }

        if (HowItWork::count() === 0) {
            HowItWork::create([
                'step_number' => 1,
                'title' => 'Contact Us',
                'description' => 'Contact us, share your case details and our team will get in touch with you.',
                'icon' => 'phone',
                'order' => 1,
                'is_active' => true,
            ]);
            HowItWork::create([
                'step_number' => 2,
                'title' => 'Medical Opinion & Estimate',
                'description' => 'Receive medical opinion and cost estimate within 48 Hours.',
                'icon' => 'clipboard',
                'order' => 2,
                'is_active' => true,
            ]);
            HowItWork::create([
                'step_number' => 3,
                'title' => 'Book Flights & Arrival',
                'description' => 'Book flights and get received by our team at the airport.',
                'icon' => 'plane',
                'order' => 3,
                'is_active' => true,
            ]);
            HowItWork::create([
                'step_number' => 4,
                'title' => 'Treatment & Follow Ups',
                'description' => 'Get treated and fly back. We stay in touch with you for follow ups.',
                'icon' => 'heart',
                'order' => 4,
                'is_active' => true,
            ]);
        }

        if (Blog::count() === 0) {
            Blog::create([
                'title' => 'BioSpectrumIndia: Heal Go Fly CancerRounds Acquisition Featured in Leading Life Sciences Story',
                'category' => 'News Article',
                'excerpt' => "Heal Go Fly's CancerRounds Acquisition Featured in BioSpectrum Industry Story.",
                'content' => '<p>Heal Go Fly has officially acquired CancerRounds to expand specialized oncology treatment pathways for international medical travelers across India, Turkey, Thailand and UAE.</p>',
                'author_name' => 'BioSpectrum India',
                'publisher_or_source' => 'BioSpectrum',
                'reading_time' => '3 min read',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now(),
            ]);
            Blog::create([
                'title' => 'Financial Express: Navigating Complex Medical Treatments Abroad with Trusted Facilitators',
                'category' => 'Healthcare Trends',
                'excerpt' => 'Financial Express highlights Heal Go Fly\'s dedicated patient concierge and transparent pricing.',
                'content' => '<p>Modern medical tourism requires comprehensive clinical vetting and pre-hospitalized logistical planning. Heal Go Fly leads the transition toward standardized international patient care.</p>',
                'author_name' => 'Financial Express',
                'publisher_or_source' => 'Financial Express',
                'reading_time' => '5 min read',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now(),
            ]);
        }
    }
}

