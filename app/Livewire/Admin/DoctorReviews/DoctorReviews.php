<?php

namespace App\Livewire\Admin\DoctorReviews;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CaregiverReport;

#[Layout('layouts.app')]
class DoctorReviews extends Component
{
    use WithPagination;

    public $filter = 'all';
    public $search = '';
    public $sortField = 'report_date';
    public $sortDirection = 'desc';
    public $perPage = 10;

    protected $updatesQueryString = ['filter', 'search', 'sortField', 'sortDirection'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function getStatsProperty()
    {
        return [
            'total' => CaregiverReport::count(),
            'pending' => CaregiverReport::where('status', 'pending')->count(),
            'reviewed' => CaregiverReport::where('status', 'reviewed')->count(),
            'high_risk' => CaregiverReport::whereHas('review', function ($q) {
                $q->whereIn('risk_severity', ['high', 'critical']);
            })->count(),
        ];
    }

    public function render()
    {
        $reports = CaregiverReport::with(['patient', 'caregiver', 'review'])
            ->when($this->filter === 'pending', fn($q) => $q->where('status', 'pending'))
            ->when($this->filter === 'reviewed', fn($q) => $q->where('status', 'reviewed'))
            ->when($this->search, function ($q) {
                $q->whereHas('patient', function ($q2) {
                    $q2->where('full_name', 'like', '%' . $this->search . '%')
                       ->orWhere('patient_id', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin.doctor-reviews.doctor-reviews', [
            'reports' => $reports,
            'stats' => $this->stats,
        ]);
    }
}
