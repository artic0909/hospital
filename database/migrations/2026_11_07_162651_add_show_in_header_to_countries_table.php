<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->boolean('show_in_header')->default(false)->after('name');
        });

        // Automatically enable show_in_header for existing countries with hospitals so current navigation is preserved
        DB::table('countries')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('hospitals')
                    ->whereColumn('hospitals.country_id', 'countries.id');
            })
            ->update(['show_in_header' => true]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('show_in_header');
        });
    }
};
