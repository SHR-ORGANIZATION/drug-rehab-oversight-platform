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
            'urgentPendingReports' => CaregiverReport::where('status', 'pending')
                ->where('report_date', '>=', now()->subDays(3))->count(),
            'completedReviews' => DoctorReview::where('review_status', 'finalized')->count(),
            'completionRate' => $this->getCompletionRate(),
            'highRiskPatients' => DoctorReview::whereIn('risk_severity', ['high', 'critical'])->distinct('caregiver_report_id')->count(),
            'criticalRiskPatients' => DoctorReview::where('risk_severity', 'critical')->distinct('caregiver_report_id')->count(),
            'totalCaregivers' => Caregiver::count(),
            'totalReports' => CaregiverReport::count(),
            'upcomingAppointments' => Appointment::where('appointment_date', '>=', now())
                ->whereIn('status', ['pending', 'approved'])->count(),
            'patientsGrowth' => $this->getPatientsGrowth(),
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

        // Build recent activity feed from multiple sources
        $recentActivity = $this->getRecentActivity();

        return view('livewire.admin.dashboard', [
            'stats' => $stats,
            'recentReports' => $recentReports,
            'upcomingAppointments' => $upcomingAppointments,
            'highRiskReviews' => $highRiskReviews,
            'weeklyData' => $weeklyData,
            'recentActivity' => $recentActivity,
        ]);
    }

    private function getRecentActivity(): array
    {
        $activities = [];

        // Recent reports submitted
        $reports = CaregiverReport::with(['patient', 'caregiver'])
            ->latest('created_at')
            ->take(3)
            ->get();

        foreach ($reports as $report) {
            $activities[] = [
                'type' => 'report',
                'icon' => 'feather-file-text',
                'color' => 'primary',
                'title' => 'Caregiver submitted report',
                'description' => ($report->caregiver->full_name ?? 'Caregiver') . ' submitted a report for ' . ($report->patient->full_name ?? 'Patient'),
                'time' => $report->created_at->diffForHumans(),
                'created_at' => $report->created_at,
            ];
        }

        // Recent doctor reviews
        $reviews = DoctorReview::with(['report.patient', 'doctor'])
            ->latest('created_at')
            ->take(3)
            ->get();

        foreach ($reviews as $review) {
            $activities[] = [
                'type' => 'review',
                'icon' => 'feather-check-circle',
                'color' => 'success',
                'title' => 'Doctor reviewed report',
                'description' => 'Dr. ' . ($review->doctor->name ?? 'Doctor') . ' reviewed report for ' . ($review->report->patient->full_name ?? 'Patient'),
                'time' => $review->created_at->diffForHumans(),
                'created_at' => $review->created_at,
            ];
        }

        // Recent appointments
        $appointments = Appointment::with(['patient', 'caregiver', 'doctor'])
            ->latest('created_at')
            ->take(2)
            ->get();

        foreach ($appointments as $apt) {
            $activities[] = [
                'type' => 'appointment',
                'icon' => 'feather-calendar',
                'color' => 'info',
                'title' => 'Appointment scheduled',
                'description' => 'New appointment for ' . ($apt->patient->full_name ?? 'Patient') . ' with ' . ($apt->doctor->name ?? 'Doctor'),
                'time' => $apt->created_at->diffForHumans(),
                'created_at' => $apt->created_at,
            ];
        }

        // Recent high/critical risk assignments
        $risks = DoctorReview::with(['report.patient', 'riskType'])
            ->whereIn('risk_severity', ['high', 'critical'])
            ->latest('created_at')
            ->take(2)
            ->get();

        foreach ($risks as $risk) {
            $activities[] = [
                'type' => 'risk',
                'icon' => 'feather-alert-triangle',
                'color' => 'danger',
                'title' => ucfirst($risk->risk_severity) . ' risk assigned',
                'description' => ucfirst($risk->risk_severity) . ' risk assigned to ' . ($risk->report->patient->full_name ?? 'Patient') . ($risk->riskType ? ' for ' . $risk->riskType->name : ''),
                'time' => $risk->created_at->diffForHumans(),
                'created_at' => $risk->created_at,
            ];
        }

        // Sort by created_at descending and take top 5
        usort($activities, function ($a, $b) {
            return $b['created_at']->timestamp <=> $a['created_at']->timestamp;
        });

        return array_slice($activities, 0, 5);
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

    private function getPatientsGrowth(): array
    {
        $currentMonth = Patient::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $lastMonth = Patient::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();

        $growth = 0;
        if ($lastMonth > 0) {
            $growth = round((($currentMonth - $lastMonth) / $lastMonth) * 100);
        } elseif ($currentMonth > 0) {
            $growth = 100;
        }

        return [
            'percentage' => $growth,
            'current' => $currentMonth,
            'last' => $lastMonth,
        ];
    }

    private function getCompletionRate(): int
    {
        $totalReports = CaregiverReport::count();
        $completedReviews = DoctorReview::where('review_status', 'finalized')->count();

        if ($totalReports === 0) {
            return 0;
        }

        return round(($completedReviews / $totalReports) * 100);
    }
}
