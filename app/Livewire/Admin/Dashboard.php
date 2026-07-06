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
use Carbon\Carbon;

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

        // Get weekly report data (current week)
        $weeklyData = $this->getWeeklyReportData();

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
            'weeklyData' => $weeklyData,
        ]);
    }

    private function getWeeklyReportData(): array
    {
        $startOfWeek = Carbon::now()->startOfWeek(); // Monday
        $data = [
            'monday' => 0,
            'tuesday' => 0,
            'wednesday' => 0,
            'thursday' => 0,
            'friday' => 0,
            'saturday' => 0,
            'sunday' => 0,
        ];

        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            $count = CaregiverReport::whereDate('report_date', $date)->count();
            $data[$days[$i]] = $count;
        }

        return $data;
    }
}
