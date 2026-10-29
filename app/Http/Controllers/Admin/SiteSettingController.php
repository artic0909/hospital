<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Show the website settings & contact details form.
     */
    public function edit()
    {
        $settings = SiteSetting::getSettings();
        return view('admin.settings.contact', compact('settings'));
    }

    /**
     * Update the website settings & contact details.
     */
    public function update(Request $request)
    {
        $settings = SiteSetting::getSettings();

        $validated = $request->validate([
            // Phone numbers & WhatsApp
            'phone_primary' => 'nullable|string|max:100',
            'phone_secondary' => 'nullable|string|max:100',
            'whatsapp_number' => 'nullable|string|max:100',

            // Email addresses
            'email_primary' => 'nullable|email|max:150',
            'email_support' => 'nullable|email|max:150',

            // Office Address & Location
            'address' => 'nullable|string',
            'city_state_country' => 'nullable|string|max:255',
            'working_hours' => 'nullable|string|max:150',
            'google_map_iframe' => 'nullable|string',

            // Social links
            'facebook_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',

            // Footer & brand
            'footer_about' => 'nullable|string',
            'copyright_text' => 'nullable|string|max:255',
        ]);

        $settings->update($validated);

        return redirect()->route('admin.settings.contact')
            ->with('success', 'Website contact details & settings updated successfully.');
    }
}

