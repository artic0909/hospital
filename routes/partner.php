<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Partner\AuthController as PartnerAuthController;
use App\Http\Controllers\Partner\DashboardController as PartnerDashboardController;
use App\Http\Controllers\Partner\DoctorController as PartnerDoctorController;
use App\Http\Controllers\Partner\FacilityController as PartnerFacilityController;
use App\Http\Controllers\Partner\ImageController as PartnerImageController;
use App\Http\Controllers\Partner\InfrustructureController as PartnerInfrustructureController;
use App\Http\Controllers\Partner\ServiceController as PartnerServiceController;
use App\Http\Controllers\Partner\LocationGuideController as PartnerLocationGuideController;
use App\Http\Controllers\Partner\ReviewController as PartnerReviewController;
use App\Http\Controllers\Partner\AppointmentController as PartnerAppointmentController;

// ==================== PARTNER PORTAL ====================
Route::prefix('partner')->name('partner.')->group(function () {

    // Guest partner routes
    Route::middleware('guest:partner')->group(function () {
        Route::get('/login', [PartnerAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [PartnerAuthController::class, 'login'])->name('login.submit');
        Route::get('/register', [PartnerAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [PartnerAuthController::class, 'register'])->name('register.submit');
    });

    // Authenticated partner routes
    Route::middleware('auth:partner')->group(function () {
        Route::get('/dashboard', [PartnerDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [PartnerAuthController::class, 'logout'])->name('logout');

        // Appointments for partner
        Route::prefix('appointment')->name('appointment.')->group(function () {
            Route::get('/', [PartnerAppointmentController::class, 'index'])->name('index');
            Route::get('/{appointment}', [PartnerAppointmentController::class, 'show'])->name('view');
            Route::patch('/{appointment}/status', [PartnerAppointmentController::class, 'updateStatus'])->name('update-status');
        });

        // 1. Doctors CRUD
        Route::prefix('doctor')->name('doctor.')->group(function () {
            Route::get('/', [PartnerDoctorController::class, 'index'])->name('index');
            Route::get('/create', [PartnerDoctorController::class, 'create'])->name('create');
            Route::post('/', [PartnerDoctorController::class, 'store'])->name('store');
            Route::post('/bulk-delete', [PartnerDoctorController::class, 'bulkDelete'])->name('bulk-delete');
            Route::get('/{doctor}', [PartnerDoctorController::class, 'show'])->name('view');
            Route::get('/{doctor}/edit', [PartnerDoctorController::class, 'edit'])->name('update');
            Route::put('/{doctor}', [PartnerDoctorController::class, 'update'])->name('update.submit');
            Route::delete('/{doctor}', [PartnerDoctorController::class, 'destroy'])->name('destroy');
        });

        // 2. Facilities CRUD
        Route::prefix('facility')->name('facility.')->group(function () {
            Route::get('/', [PartnerFacilityController::class, 'index'])->name('index');
            Route::post('/', [PartnerFacilityController::class, 'store'])->name('store');
            Route::put('/{facility}', [PartnerFacilityController::class, 'update'])->name('update');
            Route::delete('/{facility}', [PartnerFacilityController::class, 'destroy'])->name('destroy');
            Route::post('/bulk-delete', [PartnerFacilityController::class, 'bulkDelete'])->name('bulk-delete');
        });

        // 3. Images / Gallery CRUD
        Route::prefix('image')->name('image.')->group(function () {
            Route::get('/', [PartnerImageController::class, 'index'])->name('index');
            Route::post('/', [PartnerImageController::class, 'store'])->name('store');
            Route::delete('/{image}', [PartnerImageController::class, 'destroy'])->name('destroy');
            Route::post('/bulk-delete', [PartnerImageController::class, 'bulkDelete'])->name('bulk-delete');
        });

        // 4. Infrustructure CRUD
        Route::prefix('infrustructure')->name('infrustructure.')->group(function () {
            Route::get('/', [PartnerInfrustructureController::class, 'index'])->name('index');
            Route::post('/', [PartnerInfrustructureController::class, 'store'])->name('store');
        });

        // 5. Services CRUD (Categorized)
        Route::prefix('service')->name('service.')->group(function () {
            Route::get('/', [PartnerServiceController::class, 'index'])->name('index');
            Route::post('/', [PartnerServiceController::class, 'store'])->name('store');
            Route::put('/{service}', [PartnerServiceController::class, 'update'])->name('update');
            Route::delete('/{service}', [PartnerServiceController::class, 'destroy'])->name('destroy');
            Route::post('/bulk-delete', [PartnerServiceController::class, 'bulkDelete'])->name('bulk-delete');
        });

        // 6. Location Guide CRUD
        Route::prefix('locationguide')->name('locationguide.')->group(function () {
            Route::get('/', [PartnerLocationGuideController::class, 'index'])->name('index');
            Route::post('/', [PartnerLocationGuideController::class, 'store'])->name('store');
        });

        // 7. Reviews CRUD
        Route::prefix('review')->name('review.')->group(function () {
            Route::get('/', [PartnerReviewController::class, 'index'])->name('index');
            Route::post('/', [PartnerReviewController::class, 'store'])->name('store');
            Route::put('/{review}', [PartnerReviewController::class, 'update'])->name('update');
            Route::delete('/{review}', [PartnerReviewController::class, 'destroy'])->name('destroy');
            Route::post('/bulk-delete', [PartnerReviewController::class, 'bulkDelete'])->name('bulk-delete');
        });
    });
});

