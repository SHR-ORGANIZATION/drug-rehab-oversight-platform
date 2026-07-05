<?php

namespace App\Livewire\Admin\DoctorReviews;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\CaregiverReport;

#[Layout('layouts.app')]
class DoctorReviews extends Component
{
    public $reports;

    public function mount()
    {
        $this->reports = CaregiverReport::with(['patient', 'caregiver'])
            ->where('status', 'pending')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.doctor-reviews.doctor-reviews', [
            'reports' => $this->reports
        ]);
    }
}