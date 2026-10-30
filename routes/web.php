<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news/{slug}', [HomeController::class, 'blogDetails'])->name('blog.show');
Route::get('/blog/{slug}', [HomeController::class, 'blogDetails'])->name('blog.details');
Route::get('/hospitals', [HomeController::class, 'hospitals'])->name('hospitals');
Route::get('/doctors', [HomeController::class, 'doctors'])->name('doctors');
Route::get('/search', [HomeController::class, 'search'])->name('search');

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

require __DIR__.'/admin.php';
require __DIR__.'/partner.php';
require __DIR__.'/settings.php';
