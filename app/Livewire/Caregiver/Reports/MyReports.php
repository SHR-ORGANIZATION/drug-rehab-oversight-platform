<?php

namespace App\Livewire\Caregiver\Reports;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\CaregiverReport;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]
class MyReports extends Component
{
    public $reports = [];
    public $filter = 'all';

    public function mount()
    {
        $this->loadReports();
    }

    public function updatedFilter()
    {
        $this->loadReports();
    }

    public function loadReports()
    {
        $caregiverId = Auth::guard('caregiver')->id();

        $query = CaregiverReport::where('caregiver_id', $caregiverId)
            ->with(['patient', 'review.riskType']);

        if ($this->filter === 'pending') {
            $query->where('status', 'pending');
        } elseif ($this->filter === 'reviewed') {
            $query->where('status', 'reviewed');
        }

        $this->reports = $query->orderBy('report_date', 'desc')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.caregiver.reports.my-reports');
    }
}
