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

require __DIR__.'/settings.php';
