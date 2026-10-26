<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'frontend.pages.index')->name('home');
Route::view('/hospitals', 'frontend.pages.hospital.hospitals')->name('hospitals');
Route::view('/doctors', 'frontend.pages.doctor.doctors')->name('doctors');
Route::view('/hospital-details', 'frontend.pages.hospital.hospital_details')->name('hospital.details');
Route::view('/book-appointment', 'frontend.pages.hospital.book_appointment')->name('hospital.appointment');
Route::view('/doctor-details', 'frontend.pages.doctor.doctor_details')->name('doctor.details');
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
    });
});

require __DIR__.'/admin.php';
require __DIR__.'/settings.php';
