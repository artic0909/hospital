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
        // 1. Add hospital_id to partners if not present
        if (!Schema::hasColumn('partners', 'hospital_id')) {
            Schema::table('partners', function (Blueprint $table) {
                $table->foreignId('hospital_id')->nullable()->after('id')->constrained('hospitals')->nullOnDelete();
            });
        }

        // 2. Facilities table (hospital_id, image, name)
        if (!Schema::hasTable('facilities')) {
            Schema::create('facilities', function (Blueprint $table) {
                $table->id();
                $table->foreignId('hospital_id')->constrained('hospitals')->cascadeOnDelete();
                $table->string('name');
                $table->string('image')->nullable();
                $table->timestamps();
            });
        }

        // 3. Images table (hospital_id, image)
        if (!Schema::hasTable('images')) {
            Schema::create('images', function (Blueprint $table) {
                $table->id();
                $table->foreignId('hospital_id')->constrained('hospitals')->cascadeOnDelete();
                $table->string('image');
                $table->string('title')->nullable();
                $table->timestamps();
            });
        }

        // 4. Infrustructures table (hospital_id, description)
        if (!Schema::hasTable('infrustructures')) {
            Schema::create('infrustructures', function (Blueprint $table) {
                $table->id();
                $table->foreignId('hospital_id')->constrained('hospitals')->cascadeOnDelete();
                $table->longText('description');
                $table->timestamps();
            });
        }

        // 5. Services table (hospital_id, category, name)
        if (!Schema::hasTable('services')) {
            Schema::create('services', function (Blueprint $table) {
                $table->id();
                $table->foreignId('hospital_id')->constrained('hospitals')->cascadeOnDelete();
                $table->string('category');
                $table->string('name');
                $table->timestamps();
            });
        }

        // 6. Location Guide table (hospital_id, description)
        if (!Schema::hasTable('location_guides')) {
            Schema::create('location_guides', function (Blueprint $table) {
                $table->id();
                $table->foreignId('hospital_id')->constrained('hospitals')->cascadeOnDelete();
                $table->longText('description');
                $table->timestamps();
            });
        }

        // 7. Reviews table (hospital_id, name, rating, review, status)
        if (!Schema::hasTable('reviews')) {
            Schema::create('reviews', function (Blueprint $table) {
                $table->id();
                $table->foreignId('hospital_id')->constrained('hospitals')->cascadeOnDelete();
                $table->string('name');
                $table->unsignedTinyInteger('rating')->default(5);
                $table->text('review');
                $table->string('designation_or_country')->nullable();
                $table->boolean('status')->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('location_guides');
        Schema::dropIfExists('services');
        Schema::dropIfExists('infrustructures');
        Schema::dropIfExists('images');
        Schema::dropIfExists('facilities');

        if (Schema::hasColumn('partners', 'hospital_id')) {
            Schema::table('partners', function (Blueprint $table) {
                $table->dropForeign(['hospital_id']);
                $table->dropColumn('hospital_id');
            });
        }
    }
};
