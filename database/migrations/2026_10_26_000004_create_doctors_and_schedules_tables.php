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
        // 1. Doctors Table
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_id')->constrained('hospitals')->onDelete('cascade');
            $table->string('name');
            $table->string('designation');
            $table->string('spaciality');
            $table->integer('experience')->default(0); // years of experience
            $table->decimal('OPD_fee', 10, 2)->default(0.00);
            $table->string('surgeries')->nullable(); // optional surgery count or description
            $table->text('education');
            $table->text('awards')->nullable();
            $table->text('work_experiance')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // 2. Schedules Table
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->enum('day', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']);
            $table->string('time_from'); // e.g. '09:00 AM' or '09:00'
            $table->string('time_to');   // e.g. '01:00 PM' or '17:00'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('doctors');
    }
};
