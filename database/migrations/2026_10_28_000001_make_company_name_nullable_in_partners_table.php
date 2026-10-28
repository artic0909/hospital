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
        if (Schema::hasTable('partners') && Schema::hasColumn('partners', 'company_name')) {
            Schema::table('partners', function (Blueprint $table) {
                $table->string('company_name')->nullable()->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('partners') && Schema::hasColumn('partners', 'company_name')) {
            Schema::table('partners', function (Blueprint $table) {
                $table->string('company_name')->nullable(false)->change();
            });
        }
    }
};

