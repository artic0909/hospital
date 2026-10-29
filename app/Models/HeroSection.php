<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $table = 'hero_sections';

    protected $fillable = [
        'badge',
        'title',
        'highlight_text',
        'subheading',
        'patient_count',
        'patient_count_label',
        'rating',
        'rating_label',
        'primary_btn_text',
        'primary_btn_url',
        'secondary_btn_text',
        'secondary_btn_url',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get or initialize the singleton hero section record.
     */
    public static function getHero(): self
    {
        return static::firstOrCreate([], [
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
}
