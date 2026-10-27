<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Add slug to hospitals table
        Schema::table('hospitals', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('name');
        });

        // 2. Add slug to doctors table
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('name');
        });

        // 3. Populate existing hospitals with unique slugs
        $hospitals = DB::table('hospitals')->get();
        foreach ($hospitals as $hosp) {
            $baseSlug = Str::slug($hosp->name) ?: 'hospital';
            $slug = $baseSlug;
            $counter = 1;
            while (DB::table('hospitals')->where('slug', $slug)->where('id', '!=', $hosp->id)->exists()) {
                $slug = "{$baseSlug}-{$counter}";
                $counter++;
            }
            DB::table('hospitals')->where('id', $hosp->id)->update(['slug' => $slug]);
        }

        // 4. Populate existing doctors with unique slugs
        $doctors = DB::table('doctors')->get();
        foreach ($doctors as $doc) {
            $baseSlug = Str::slug($doc->name) ?: 'doctor';
            $slug = $baseSlug;
            $counter = 1;
            while (DB::table('doctors')->where('slug', $slug)->where('id', '!=', $doc->id)->exists()) {
                $slug = "{$baseSlug}-{$counter}";
                $counter++;
            }
            DB::table('doctors')->where('id', $doc->id)->update(['slug' => $slug]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
