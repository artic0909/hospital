<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\Utilities\CityController;
use App\Http\Controllers\Admin\Utilities\CountryController;
use App\Http\Controllers\Admin\Utilities\DepartmentController;
use App\Http\Controllers\Admin\Utilities\DoctorSpecialityController;
use App\Http\Controllers\Admin\Utilities\HospitalCategoryController;
use App\Http\Controllers\Admin\Utilities\StateController;
use App\Http\Controllers\Admin\Utilities\TreatmentController;
use Illuminate\Support\Facades\Route;

// ==================== ADMIN PORTAL ====================
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest admin routes
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    // Authenticated admin routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        // ==================== UTILITIES & MASTER DATA CRUD ====================
        Route::prefix('utilities')->name('utilities.')->group(function () {
            // 1. Countries
            Route::get('/country', [CountryController::class, 'index'])->name('country');
            Route::post('/country', [CountryController::class, 'store'])->name('country.store');
            Route::put('/country/{country}', [CountryController::class, 'update'])->name('country.update');
            Route::delete('/country/{country}', [CountryController::class, 'destroy'])->name('country.destroy');
            Route::post('/country/bulk-delete', [CountryController::class, 'bulkDelete'])->name('country.bulk-delete');

            // 2. States
            Route::get('/state', [StateController::class, 'index'])->name('state');
            Route::post('/state', [StateController::class, 'store'])->name('state.store');
            Route::put('/state/{state}', [StateController::class, 'update'])->name('state.update');
            Route::delete('/state/{state}', [StateController::class, 'destroy'])->name('state.destroy');
            Route::post('/state/bulk-delete', [StateController::class, 'bulkDelete'])->name('state.bulk-delete');

            // 3. Cities
            Route::get('/city', [CityController::class, 'index'])->name('city');
            Route::post('/city', [CityController::class, 'store'])->name('city.store');
            Route::put('/city/{city}', [CityController::class, 'update'])->name('city.update');
            Route::delete('/city/{city}', [CityController::class, 'destroy'])->name('city.destroy');
            Route::post('/city/bulk-delete', [CityController::class, 'bulkDelete'])->name('city.bulk-delete');

            // 4. Departments
            Route::get('/department', [DepartmentController::class, 'index'])->name('department');
            Route::post('/department', [DepartmentController::class, 'store'])->name('department.store');
            Route::put('/department/{department}', [DepartmentController::class, 'update'])->name('department.update');
            Route::delete('/department/{department}', [DepartmentController::class, 'destroy'])->name('department.destroy');
            Route::post('/department/bulk-delete', [DepartmentController::class, 'bulkDelete'])->name('department.bulk-delete');

            // 5. Doctor Specialities
            Route::get('/doctor-spaciality', [DoctorSpecialityController::class, 'index'])->name('doctor-spaciality');
            Route::post('/doctor-spaciality', [DoctorSpecialityController::class, 'store'])->name('doctor-spaciality.store');
            Route::put('/doctor-spaciality/{doctorSpeciality}', [DoctorSpecialityController::class, 'update'])->name('doctor-spaciality.update');
            Route::delete('/doctor-spaciality/{doctorSpeciality}', [DoctorSpecialityController::class, 'destroy'])->name('doctor-spaciality.destroy');
            Route::post('/doctor-spaciality/bulk-delete', [DoctorSpecialityController::class, 'bulkDelete'])->name('doctor-spaciality.bulk-delete');

            // 6. Hospital Categories
            Route::get('/hospital-category', [HospitalCategoryController::class, 'index'])->name('hospital-category');
            Route::post('/hospital-category', [HospitalCategoryController::class, 'store'])->name('hospital-category.store');
            Route::put('/hospital-category/{hospitalCategory}', [HospitalCategoryController::class, 'update'])->name('hospital-category.update');
            Route::delete('/hospital-category/{hospitalCategory}', [HospitalCategoryController::class, 'destroy'])->name('hospital-category.destroy');
            Route::post('/hospital-category/bulk-delete', [HospitalCategoryController::class, 'bulkDelete'])->name('hospital-category.bulk-delete');

            // 7. Treatments
            Route::get('/treatment', [TreatmentController::class, 'index'])->name('treatment');
            Route::post('/treatment', [TreatmentController::class, 'store'])->name('treatment.store');
            Route::put('/treatment/{treatment}', [TreatmentController::class, 'update'])->name('treatment.update');
            Route::delete('/treatment/{treatment}', [TreatmentController::class, 'destroy'])->name('treatment.destroy');
            Route::post('/treatment/bulk-delete', [TreatmentController::class, 'bulkDelete'])->name('treatment.bulk-delete');
        });

        // ==================== HOSPITAL CRUD ====================
        Route::prefix('hospital')->name('hospital.')->group(function () {
            Route::get('/', \App\Http\Controllers\Admin\HospitalController::class . '@index')->name('index');
            Route::get('/create', \App\Http\Controllers\Admin\HospitalController::class . '@create')->name('create');
            Route::post('/', \App\Http\Controllers\Admin\HospitalController::class . '@store')->name('store');
            Route::get('/get-states/{country}', \App\Http\Controllers\Admin\HospitalController::class . '@getStates')->name('get-states');
            Route::get('/get-cities/{state}', \App\Http\Controllers\Admin\HospitalController::class . '@getCities')->name('get-cities');
            Route::post('/bulk-delete', \App\Http\Controllers\Admin\HospitalController::class . '@bulkDelete')->name('bulk-delete');
            Route::get('/{hospital}/login-as-partner', \App\Http\Controllers\Admin\HospitalController::class . '@loginAsPartner')->name('login-as-partner');
            Route::get('/{hospital}', \App\Http\Controllers\Admin\HospitalController::class . '@show')->name('view');
            Route::get('/{hospital}/edit', \App\Http\Controllers\Admin\HospitalController::class . '@edit')->name('update');
            Route::put('/{hospital}', \App\Http\Controllers\Admin\HospitalController::class . '@update')->name('update.submit');
            Route::delete('/{hospital}', \App\Http\Controllers\Admin\HospitalController::class . '@destroy')->name('destroy');

            // Hospital Doctor & Schedule CRUD
            Route::prefix('{hospital}/doctor')->name('doctor.')->group(function () {
                Route::get('/', \App\Http\Controllers\Admin\DoctorController::class . '@index')->name('index');
                Route::get('/create', \App\Http\Controllers\Admin\DoctorController::class . '@create')->name('create');
                Route::post('/', \App\Http\Controllers\Admin\DoctorController::class . '@store')->name('store');
                Route::post('/bulk-delete', \App\Http\Controllers\Admin\DoctorController::class . '@bulkDelete')->name('bulk-delete');
                Route::get('/{doctor}', \App\Http\Controllers\Admin\DoctorController::class . '@show')->name('view');
                Route::get('/{doctor}/edit', \App\Http\Controllers\Admin\DoctorController::class . '@edit')->name('update');
                Route::put('/{doctor}', \App\Http\Controllers\Admin\DoctorController::class . '@update')->name('update.submit');
                Route::delete('/{doctor}', \App\Http\Controllers\Admin\DoctorController::class . '@destroy')->name('destroy');
            });
        });

        // ==================== PATIENT CRUD ====================
        Route::prefix('patient')->name('patient.')->group(function () {
            Route::get('/', \App\Http\Controllers\Admin\PatientController::class . '@index')->name('index');
            Route::get('/create', \App\Http\Controllers\Admin\PatientController::class . '@create')->name('create');
            Route::post('/', \App\Http\Controllers\Admin\PatientController::class . '@store')->name('store');
            Route::post('/bulk-delete', \App\Http\Controllers\Admin\PatientController::class . '@bulkDelete')->name('bulk-delete');
            Route::get('/get-states', \App\Http\Controllers\Admin\PatientController::class . '@getStates')->name('get-states');
            Route::get('/get-cities', \App\Http\Controllers\Admin\PatientController::class . '@getCities')->name('get-cities');
            Route::get('/{patient}', \App\Http\Controllers\Admin\PatientController::class . '@show')->name('view');
            Route::get('/{patient}/edit', \App\Http\Controllers\Admin\PatientController::class . '@edit')->name('update');
            Route::put('/{patient}', \App\Http\Controllers\Admin\PatientController::class . '@update')->name('update.submit');
            Route::delete('/{patient}', \App\Http\Controllers\Admin\PatientController::class . '@destroy')->name('destroy');

            // Patient Medical Reports
            Route::prefix('{patient}/report')->name('report.')->group(function () {
                Route::get('/', \App\Http\Controllers\Admin\PatientReportController::class . '@index')->name('index');
                Route::post('/', \App\Http\Controllers\Admin\PatientReportController::class . '@store')->name('store');
                Route::delete('/{report}', \App\Http\Controllers\Admin\PatientReportController::class . '@destroy')->name('destroy');
                Route::get('/{report}/download', \App\Http\Controllers\Admin\PatientReportController::class . '@download')->name('download');
            });
        });

        // ==================== APPOINTMENTS CRUD ====================
        Route::prefix('appointment')->name('appointment.')->group(function () {
            Route::get('/', \App\Http\Controllers\Admin\AppointmentController::class . '@index')->name('index');
            Route::get('/create', \App\Http\Controllers\Admin\AppointmentController::class . '@create')->name('create');
            Route::post('/', \App\Http\Controllers\Admin\AppointmentController::class . '@store')->name('store');
            Route::post('/bulk-delete', \App\Http\Controllers\Admin\AppointmentController::class . '@bulkDelete')->name('bulk-delete');
            Route::get('/get-partner-doctors/{partner}', \App\Http\Controllers\Admin\AppointmentController::class . '@getPartnerDoctors')->name('get-partner-doctors');
            Route::get('/get-hospital-doctors/{hospital}', \App\Http\Controllers\Admin\AppointmentController::class . '@getHospitalDoctors')->name('get-hospital-doctors');
            Route::get('/{appointment}', \App\Http\Controllers\Admin\AppointmentController::class . '@show')->name('view');
            Route::get('/{appointment}/edit', \App\Http\Controllers\Admin\AppointmentController::class . '@edit')->name('update');
            Route::put('/{appointment}', \App\Http\Controllers\Admin\AppointmentController::class . '@update')->name('update.submit');
            Route::patch('/{appointment}/status', \App\Http\Controllers\Admin\AppointmentController::class . '@updateStatus')->name('update-status');
            Route::delete('/{appointment}', \App\Http\Controllers\Admin\AppointmentController::class . '@destroy')->name('destroy');
        });
    });
});
