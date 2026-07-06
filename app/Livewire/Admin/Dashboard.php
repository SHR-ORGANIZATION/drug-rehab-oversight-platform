<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Patient;
use App\Models\CaregiverReport;
use App\Models\DoctorReview;
use App\Models\Appointment;
use App\Models\Caregiver;
use App\Models\User;

#[Layout('layouts.app')]
class Dashboard extends Component
{
    public function render()
    {
        $stats = [
            'totalPatients' => Patient::count(),
            'pendingReports' => CaregiverReport::where('status', 'pending')->count(),
            'completedReviews' => DoctorReview::where('review_status', 'finalized')->count(),
            'highRiskPatients' => DoctorReview::whereIn('risk_severity', ['high', 'critical'])->distinct('caregiver_report_id')->count(),
            'totalCaregivers' => Caregiver::count(),
            'totalReports' => CaregiverReport::count(),
            'upcomingAppointments' => Appointment::where('appointment_date', '>=', now())
                ->whereIn('status', ['pending', 'approved'])->count(),
        ];

        $recentReports = CaregiverReport::with(['patient', 'caregiver'])
            ->latest('report_date')
            ->take(5)
            ->get();

        $upcomingAppointments = Appointment::with(['patient', 'caregiver'])
            ->where('appointment_date', '>=', now())
            ->whereIn('status', ['pending', 'approved'])
            ->orderBy('appointment_date')
            ->take(5)
            ->get();

        $highRiskReviews = DoctorReview::with(['report.patient'])
            ->whereIn('risk_severity', ['high', 'critical'])
            ->latest()
            ->take(5)
            ->get();

        return view('livewire.admin.dashboard', [
            'stats' => $stats,
            'recentReports' => $recentReports,
            'upcomingAppointments' => $upcomingAppointments,
            'highRiskReviews' => $highRiskReviews,
        ]);
    }
}
