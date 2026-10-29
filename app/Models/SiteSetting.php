<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $table = 'site_settings';

    protected $fillable = [
        'phone_primary',
        'phone_secondary',
        'whatsapp_number',
        'email_primary',
        'email_support',
        'address',
        'city_state_country',
        'working_hours',
        'google_map_iframe',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'youtube_url',
        'footer_about',
        'copyright_text',
    ];

    /**
     * Get or initialize the singleton site settings
     */
    public static function getSettings(): self
    {
        return static::firstOrCreate([], [
            'phone_primary' => '+91 9129846542',
            'phone_secondary' => '9129846542',
            'whatsapp_number' => '+91 9129846542',
            'email_primary' => 'info@healgofly.com',
            'email_support' => 'support@healgofly.com',
            'address' => '274, 2nd Floor, Satra Plaza, Palm Beach Rd, Phase 2, Sector 19D',
            'city_state_country' => 'Vashi, Navi Mumbai, Maharashtra 400703, India',
            'working_hours' => '24/7 Support Assistance',
            'facebook_url' => 'https://facebook.com',
            'twitter_url' => 'https://twitter.com',
            'instagram_url' => 'https://instagram.com',
            'linkedin_url' => 'https://linkedin.com',
            'youtube_url' => 'https://youtube.com',
            'footer_about' => 'HealGoFly is your trusted medical value travel partner. We connect international and domestic patients to the best accredited hospitals and doctors worldwide with seamless care and dedicated assistance.',
            'copyright_text' => '© Copyright HealGoFly. All rights reserved.',
        ]);
    }
}

