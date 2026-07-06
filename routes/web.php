<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\Patients\PatientList;
use App\Livewire\Admin\Patients\PatientCreate;
use App\Livewire\Admin\Patients\PatientView;
use App\Livewire\Admin\Caregivers\CaregiverList;
use App\Livewire\Admin\Caregivers\CaregiverCreate;
use App\Livewire\Admin\DoctorReviews\DoctorReviews;
use App\Livewire\Admin\DoctorReviews\ReviewReport;
use App\Livewire\Admin\Appointments\AppointmentList;
use App\Livewire\Admin\Risks\RiskType;
use App\Livewire\Caregiver\Dashboard\Dashboard as CaregiverDashboard;
use App\Livewire\Caregiver\Patients\MyPatients;
use App\Livewire\Caregiver\Reports\MyReports;
use App\Livewire\Caregiver\Reports\CreateReport;
use App\Livewire\Caregiver\Appointments\MyAppointments;
use App\Livewire\Caregiver\Profile\Profile as CaregiverProfile;

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
| Authenticated Routes - Default Redirect
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        // Default redirect - each portal's login handles its own redirect
        return redirect()->route('admin.dashboard');
    })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (DOCTOR) - Protected by auth + role:doctor
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:doctor'])->prefix('admin')->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/patients', PatientList::class)->name('admin.patients');
    Route::get('/patients/create', PatientCreate::class)->name('admin.patients.create');
    Route::get('/patients/{id}', PatientView::class)->name('admin.patients.view');
    Route::view('/patients/{id}/edit', 'livewire.admin.patients.edit')->name('admin.patients.edit');
    Route::get('/caregivers', CaregiverList::class)->name('admin.caregivers');
    Route::get('/caregivers/create', CaregiverCreate::class)->name('admin.caregivers.create');
    Route::get('/reports', DoctorReviews::class)->name('admin.reports');
    Route::get('/reports/{id}/review', ReviewReport::class)->name('admin.reports.review');
    Route::get('/appointments', AppointmentList::class)->name('admin.appointments');
    Route::get('/risks', RiskType::class)->name('admin.risks');
});

/*
|--------------------------------------------------------------------------
| CAREGIVER ROUTES - Protected by auth + role:caregiver
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:caregiver'])->prefix('caregiver')->group(function () {
    Route::get('/dashboard', CaregiverDashboard::class)->name('caregiver.dashboard');
    Route::get('/patients', MyPatients::class)->name('caregiver.patients');
    Route::get('/reports', MyReports::class)->name('caregiver.reports');
    Route::get('/reports/create', CreateReport::class)->name('caregiver.reports.create');
    Route::get('/appointments', MyAppointments::class)->name('caregiver.appointments');
    Route::get('/profile', CaregiverProfile::class)->name('caregiver.profile');
});