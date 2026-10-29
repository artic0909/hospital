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
        Schema::create('how_it_works', function (Blueprint $table) {
            $table->id();
            $table->integer('step_number')->default(1); // 1, 2, 3, 4
            $table->string('title'); // e.g. "Contact Us", "Medical Opinion & Estimate"
            $table->text('description'); // e.g. "Contact us, share your case details..."
            $table->text('icon')->nullable(); // SVG code or icon class
            $table->string('image')->nullable(); // Optional illustration / image
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
        Schema::dropIfExists('how_it_works');
    }
};

