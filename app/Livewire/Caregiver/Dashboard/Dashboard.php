<?php

namespace App\Livewire\Caregiver\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Patient;
use App\Models\CaregiverReport;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]
class Dashboard extends Component
{
    public $myPatientsCount = 0;
    public $myReportsCount = 0;
    public $pendingReportsCount = 0;
    public $upcomingAppointmentsCount = 0;
    public $recentReports = [];
    public $upcomingAppointments = [];

    public function mount()
    {
        $caregiverId = Auth::guard('caregiver')->id();

        $this->myPatientsCount = Patient::where('caregiver_id', $caregiverId)->count();
        $this->myReportsCount = CaregiverReport::where('caregiver_id', $caregiverId)->count();
        $this->pendingReportsCount = CaregiverReport::where('caregiver_id', $caregiverId)
            ->where('status', 'pending')->count();
        $this->upcomingAppointmentsCount = Appointment::where('caregiver_id', $caregiverId)
            ->where('status', 'approved')
            ->where('appointment_date', '>=', now())
            ->count();

        $this->recentReports = CaregiverReport::where('caregiver_id', $caregiverId)
            ->with(['patient', 'review.riskType'])
            ->orderBy('report_date', 'desc')
            ->limit(5)
            ->get();

        $this->upcomingAppointments = Appointment::where('caregiver_id', $caregiverId)
            ->with(['patient', 'doctor'])
            ->where('appointment_date', '>=', now())
            ->orderBy('appointment_date', 'asc')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.caregiver.dashboard.dashboard');
    }
}
