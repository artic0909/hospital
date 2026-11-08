<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agent\AuthController as AgentAuthController;
use App\Http\Controllers\Agent\DashboardController as AgentDashboardController;
use App\Http\Controllers\Agent\PatientController as AgentPatientController;
use App\Http\Controllers\Agent\AppointmentController as AgentAppointmentController;

// ==================== AGENT PORTAL ====================
Route::prefix('agent')->name('agent.')->group(function () {

    // Guest agent routes
    Route::middleware('guest:agent')->group(function () {
        Route::get('/login', [AgentAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AgentAuthController::class, 'login'])->name('login.submit');
        Route::get('/register', [AgentAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [AgentAuthController::class, 'register'])->name('register.submit');
    });

    // Authenticated agent routes
    Route::middleware('auth:agent')->group(function () {
        Route::get('/dashboard', [AgentDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AgentAuthController::class, 'logout'])->name('logout');

        // Patients CRUD for Agent
        Route::prefix('patient')->name('patient.')->group(function () {
            Route::get('/', [AgentPatientController::class, 'index'])->name('index');
            Route::get('/create', [AgentPatientController::class, 'create'])->name('create');
            Route::post('/', [AgentPatientController::class, 'store'])->name('store');
            Route::get('/{patient}', [AgentPatientController::class, 'show'])->name('view');
            Route::get('/{patient}/edit', [AgentPatientController::class, 'edit'])->name('update');
            Route::put('/{patient}', [AgentPatientController::class, 'update'])->name('update.submit');
            Route::delete('/{patient}', [AgentPatientController::class, 'destroy'])->name('destroy');

            // Reports upload/delete
            Route::post('/{patient}/reports', [AgentPatientController::class, 'storeReport'])->name('reports.store');
            Route::delete('/reports/{report}', [AgentPatientController::class, 'destroyReport'])->name('reports.destroy');
        });

        // Appointments for Agent (view appointments of their patients)
        Route::prefix('appointment')->name('appointment.')->group(function () {
            Route::get('/', [AgentAppointmentController::class, 'index'])->name('index');
            Route::get('/{appointment}', [AgentAppointmentController::class, 'show'])->name('view');
        });
    });
});

