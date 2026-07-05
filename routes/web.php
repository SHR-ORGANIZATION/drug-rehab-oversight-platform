<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Patients\PatientList;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome');

/*
|--------------------------------------------------------------------------
| Auth Routes (Laravel Breeze / Fortify)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    /*
    |-------------------------
    | Shared Dashboard Redirect
    |-------------------------
    */
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (DOCTOR)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
Route::get('/patients', \App\Livewire\Admin\Patients\PatientList::class)->name('patients');
Route::get('/patients/create', \App\Livewire\Admin\Patients\PatientCreate::class)->name('patients.create');
Route::get('/patients/{id}', \App\Livewire\Admin\Patients\PatientView::class)->name('patients.view');
Route::view('/patients/{id}/edit', 'livewire.admin.patients.edit')->name('patients.edit');
    Route::get('/caregivers', \App\Livewire\Admin\Caregivers\CaregiverList::class)->name('caregivers');
    Route::get('/caregivers/create', \App\Livewire\Admin\Caregivers\CaregiverCreate::class)->name('caregivers.create');
    Route::get('/reports', \App\Livewire\Admin\DoctorReviews\DoctorReviews::class)->name('reports');
    Route::view('/appointments', 'livewire.admin.appointments.appointment-list')->name('appointments');
    Route::view('/risks', 'livewire.admin.risks.risk-type')->name('risks');
});

/*
|--------------------------------------------------------------------------
| CAREGIVER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','verified'])->prefix('caregiver')->group(function () {
    Route::view('/dashboard', 'livewire.caregiver.dashboard')->name('dashboard');
    Route::view('/patients', 'livewire.caregiver.patients.my-patients')->name('patients');
    Route::view('/reports', 'livewire.caregiver.reports.my-reports')->name('reports');
    Route::view('/appointments', 'livewire.caregiver.appointments.my-appointments')->name('appointments');
    Route::view('/appointments/create', 'livewire.caregiver.appointments.create-appointment')->name('appointments.create');
});