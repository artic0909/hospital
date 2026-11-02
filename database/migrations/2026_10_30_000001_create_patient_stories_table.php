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
        Schema::create('patient_stories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('headline')->nullable();
            $table->longText('story');
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->string('country')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('treatment_name')->nullable();
            $table->unsignedTinyInteger('rating')->default(5);
            $table->boolean('status')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_stories');
    }
};

