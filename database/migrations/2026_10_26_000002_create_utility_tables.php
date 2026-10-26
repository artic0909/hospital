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
        // 1. Countries
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // 2. States
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });

        // 3. Cities
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->constrained('states')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });

        // 4. Departments
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_icon')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 5. Doctor Specialities
        Schema::create('doctor_specialities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // 6. Hospital Categories
        Schema::create('hospital_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // 7. Treatments
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->foreignId('spaciality_id')->nullable()->constrained('doctor_specialities')->onDelete('cascade');
            $table->string('name');
            $table->decimal('price', 12, 2)->default(0.00);
            $table->string('price_type')->default('rupees'); // 'rupees' or 'dollars'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
        Schema::dropIfExists('hospital_categories');
        Schema::dropIfExists('doctor_specialities');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('states');
        Schema::dropIfExists('countries');
    }
};
