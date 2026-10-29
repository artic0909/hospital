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
        Schema::create('appointment_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained('appointments')->onDelete('cascade');
            $table->foreignId('patient_id')->nullable()->constrained('patients')->nullOnDelete();
            $table->string('status', 50); // booked, received, treatment, discharge
            $table->text('notes')->nullable();
            $table->string('changed_by_type', 50)->default('admin'); // admin, partner, system
            $table->string('changed_by_name')->nullable();
            $table->timestamp('status_at')->useCurrent();
            $table->timestamps();

            $table->index(['appointment_id', 'status']);
            $table->index(['patient_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_histories');
    }
};

