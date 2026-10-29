<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            // Phone numbers
            $table->string('phone_primary')->nullable()->default('+91 9129846542');
            $table->string('phone_secondary')->nullable()->default('9129846542');
            $table->string('whatsapp_number')->nullable()->default('+91 9129846542');
            
            // Email addresses
            $table->string('email_primary')->nullable()->default('info@healgofly.com');
            $table->string('email_support')->nullable()->default('support@healgofly.com');
            
            // Address & Location
            $table->text('address')->nullable();
            $table->string('city_state_country')->nullable()->default('Vashi, Navi Mumbai, Maharashtra 400703, India');
            $table->string('working_hours')->nullable()->default('24/7 Support Assistance');
            $table->text('google_map_iframe')->nullable();
            
            // Social Links
            $table->string('facebook_url')->nullable()->default('https://facebook.com');
            $table->string('twitter_url')->nullable()->default('https://twitter.com');
            $table->string('instagram_url')->nullable()->default('https://instagram.com');
            $table->string('linkedin_url')->nullable()->default('https://linkedin.com');
            $table->string('youtube_url')->nullable()->default('https://youtube.com');
            
            // Footer & Brand info
            $table->text('footer_about')->nullable();
            $table->string('copyright_text')->nullable()->default('© Copyright HealGoFly. All rights reserved.');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
