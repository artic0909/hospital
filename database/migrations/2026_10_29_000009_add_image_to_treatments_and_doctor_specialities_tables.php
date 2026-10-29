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
        // 1. Add image column to doctor_specialities table
        Schema::table('doctor_specialities', function (Blueprint $table) {
            if (!Schema::hasColumn('doctor_specialities', 'image')) {
                $table->string('image')->nullable()->after('name');
            }
        });

        // 2. Add image column to treatments table
        Schema::table('treatments', function (Blueprint $table) {
            if (!Schema::hasColumn('treatments', 'image')) {
                $table->string('image')->nullable()->after('name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctor_specialities', function (Blueprint $table) {
            if (Schema::hasColumn('doctor_specialities', 'image')) {
                $table->dropColumn('image');
            }
        });

        Schema::table('treatments', function (Blueprint $table) {
            if (Schema::hasColumn('treatments', 'image')) {
                $table->dropColumn('image');
            }
        });
    }
};

