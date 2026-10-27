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
        if (Schema::hasTable('partners')) {
            Schema::table('partners', function (Blueprint $table) {
                if (!Schema::hasColumn('partners', 'name')) {
                    $table->string('name')->default('Partner')->after('id');
                }
                if (!Schema::hasColumn('partners', 'company_name')) {
                    $table->string('company_name')->nullable()->after('name');
                }
                if (!Schema::hasColumn('partners', 'email')) {
                    $table->string('email')->nullable()->unique()->after('company_name');
                }
                if (!Schema::hasColumn('partners', 'email_verified_at')) {
                    $table->timestamp('email_verified_at')->nullable()->after('email');
                }
                if (!Schema::hasColumn('partners', 'phone')) {
                    $table->string('phone')->nullable()->after('email_verified_at');
                }
                if (!Schema::hasColumn('partners', 'country')) {
                    $table->string('country')->nullable()->after('phone');
                }
                if (!Schema::hasColumn('partners', 'partner_type')) {
                    $table->string('partner_type')->default('medical_facilitator')->after('country');
                }
                if (!Schema::hasColumn('partners', 'address')) {
                    $table->string('address')->nullable()->after('partner_type');
                }
                if (!Schema::hasColumn('partners', 'website')) {
                    $table->string('website')->nullable()->after('address');
                }
                if (!Schema::hasColumn('partners', 'status')) {
                    $table->string('status')->default('active')->after('website');
                }
                if (!Schema::hasColumn('partners', 'password')) {
                    $table->string('password')->nullable()->after('status');
                }
                if (!Schema::hasColumn('partners', 'remember_token')) {
                    $table->rememberToken()->after('password');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Safe to keep columns intact
    }
};
