<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'frontend.pages.index')->name('home');
Route::view('/hospitals', 'frontend.pages.hospital.hospitals')->name('hospitals');
Route::view('/doctors', 'frontend.pages.doctor.doctors')->name('doctors');

// Hospital Slug Routes
Route::get('/hospital/{hospital:slug}', function (\App\Models\Hospital $hospital) {
    return view('frontend.pages.hospital.hospital_details', compact('hospital'));
})->name('hospital.show');

Route::get('/hospital-details/{hospital:slug?}', function (?\App\Models\Hospital $hospital = null) {
    $hospital = $hospital ?? \App\Models\Hospital::first();
    return view('frontend.pages.hospital.hospital_details', compact('hospital'));
})->name('hospital.details');

Route::view('/book-appointment', 'frontend.pages.hospital.book_appointment')->name('hospital.appointment');

// Doctor Slug Routes
Route::get('/doctor/{doctor:slug}', function (\App\Models\Doctor $doctor) {
    return view('frontend.pages.doctor.doctor_details', compact('doctor'));
})->name('doctor.show');

Route::get('/doctor-details/{doctor:slug?}', function (?\App\Models\Doctor $doctor = null) {
    $doctor = $doctor ?? \App\Models\Doctor::first();
    return view('frontend.pages.doctor.doctor_details', compact('doctor'));
})->name('doctor.details');

Route::view('/doctor-appointment', 'frontend.pages.doctor.book_appointment')->name('doctor.appointment');

Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'bn', 'ru', 'ar'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

use App\Http\Controllers\Partner\AuthController as PartnerAuthController;
use App\Http\Controllers\Partner\DashboardController as PartnerDashboardController;

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

        // 1. Doctors CRUD
        Route::prefix('doctor')->name('doctor.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Partner\DoctorController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Partner\DoctorController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Partner\DoctorController::class, 'store'])->name('store');
            Route::post('/bulk-delete', [\App\Http\Controllers\Partner\DoctorController::class, 'bulkDelete'])->name('bulk-delete');
            Route::get('/{doctor}', [\App\Http\Controllers\Partner\DoctorController::class, 'show'])->name('view');
            Route::get('/{doctor}/edit', [\App\Http\Controllers\Partner\DoctorController::class, 'edit'])->name('update');
            Route::put('/{doctor}', [\App\Http\Controllers\Partner\DoctorController::class, 'update'])->name('update.submit');
            Route::delete('/{doctor}', [\App\Http\Controllers\Partner\DoctorController::class, 'destroy'])->name('destroy');
        });

        // 2. Facilities CRUD
        Route::prefix('facility')->name('facility.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Partner\FacilityController::class, 'index'])->name('index');
            Route::post('/', [\App\Http\Controllers\Partner\FacilityController::class, 'store'])->name('store');
            Route::put('/{facility}', [\App\Http\Controllers\Partner\FacilityController::class, 'update'])->name('update');
            Route::delete('/{facility}', [\App\Http\Controllers\Partner\FacilityController::class, 'destroy'])->name('destroy');
            Route::post('/bulk-delete', [\App\Http\Controllers\Partner\FacilityController::class, 'bulkDelete'])->name('bulk-delete');
        });

        // 3. Images / Gallery CRUD
        Route::prefix('image')->name('image.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Partner\ImageController::class, 'index'])->name('index');
            Route::post('/', [\App\Http\Controllers\Partner\ImageController::class, 'store'])->name('store');
            Route::delete('/{image}', [\App\Http\Controllers\Partner\ImageController::class, 'destroy'])->name('destroy');
            Route::post('/bulk-delete', [\App\Http\Controllers\Partner\ImageController::class, 'bulkDelete'])->name('bulk-delete');
        });

        // 4. Infrustructure CRUD
        Route::prefix('infrustructure')->name('infrustructure.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Partner\InfrustructureController::class, 'index'])->name('index');
            Route::post('/', [\App\Http\Controllers\Partner\InfrustructureController::class, 'store'])->name('store');
        });

        // 5. Services CRUD (Categorized)
        Route::prefix('service')->name('service.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Partner\ServiceController::class, 'index'])->name('index');
            Route::post('/', [\App\Http\Controllers\Partner\ServiceController::class, 'store'])->name('store');
            Route::put('/{service}', [\App\Http\Controllers\Partner\ServiceController::class, 'update'])->name('update');
            Route::delete('/{service}', [\App\Http\Controllers\Partner\ServiceController::class, 'destroy'])->name('destroy');
            Route::post('/bulk-delete', [\App\Http\Controllers\Partner\ServiceController::class, 'bulkDelete'])->name('bulk-delete');
        });

        // 6. Location Guide CRUD
        Route::prefix('locationguide')->name('locationguide.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Partner\LocationGuideController::class, 'index'])->name('index');
            Route::post('/', [\App\Http\Controllers\Partner\LocationGuideController::class, 'store'])->name('store');
        });

        // 7. Reviews CRUD
        Route::prefix('review')->name('review.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Partner\ReviewController::class, 'index'])->name('index');
            Route::post('/', [\App\Http\Controllers\Partner\ReviewController::class, 'store'])->name('store');
            Route::put('/{review}', [\App\Http\Controllers\Partner\ReviewController::class, 'update'])->name('update');
            Route::delete('/{review}', [\App\Http\Controllers\Partner\ReviewController::class, 'destroy'])->name('destroy');
            Route::post('/bulk-delete', [\App\Http\Controllers\Partner\ReviewController::class, 'bulkDelete'])->name('bulk-delete');
        });
    });
});

require __DIR__.'/admin.php';
require __DIR__.'/settings.php';
