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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->nullable(); // e.g. "Simple 4-Step Process"
            $table->string('title'); // e.g. "Medical Treatment With Unmatched Personal Care"
            $table->string('highlight_text')->nullable(); // Highlighted accent words
            $table->text('subheading')->nullable(); // Tagline / description
            $table->string('patient_count')->nullable()->default('1,00,000+');
            $table->string('patient_count_label')->nullable()->default('Patients Assisted Since 2016');
            $table->string('rating')->nullable()->default('4.7');
            $table->string('rating_label')->nullable()->default('Google Rating');
            $table->string('primary_btn_text')->nullable()->default('Get a FREE Quote');
            $table->string('primary_btn_url')->nullable()->default('#quote-form');
            $table->string('secondary_btn_text')->nullable()->default('WhatsApp Us');
            $table->string('secondary_btn_url')->nullable()->default('https://wa.me/919129846542');
            $table->string('image')->nullable(); // Background or banner image
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};

