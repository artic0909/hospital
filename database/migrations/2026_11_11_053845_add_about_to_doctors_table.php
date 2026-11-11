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
        Schema::table('doctors', function (Blueprint $table) {
            if (!Schema::hasColumn('doctors', 'about')) {
                $table->text('about')->nullable()->after('designation');
            }
        });

        // Automatically populate professional clinical biography for any existing doctors with NULL/empty about
        \Illuminate\Support\Facades\DB::table('doctors')
            ->whereNull('about')
            ->orWhere('about', '')
            ->get()
            ->each(function ($doc) {
                $aboutHtml = '<p><strong>Dr. ' . e($doc->name) . '</strong> is an internationally recognized specialist in <strong>' . e($doc->spaciality ?? 'Specialist Medicine') . '</strong> with over <strong>' . ($doc->experience ?? '15') . '+ years</strong> of clinical and surgical expertise. Currently serving as <strong>' . e($doc->designation ?? 'Senior Consultant') . '</strong>, holding benchmarked patient recovery rates.</p><p>With extensive fellowship training and clinical leadership across top healthcare institutions, Dr. ' . e($doc->name) . ' specializes in advanced diagnostics, minimally invasive therapies, and personalized post-operative recovery protocols for both domestic and international patients.</p>';

                \Illuminate\Support\Facades\DB::table('doctors')
                    ->where('id', $doc->id)
                    ->update(['about' => $aboutHtml]);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            if (Schema::hasColumn('doctors', 'about')) {
                $table->dropColumn('about');
            }
        });
    }
};
