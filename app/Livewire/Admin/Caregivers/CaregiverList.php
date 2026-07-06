<?php

namespace App\Livewire\Admin\Caregivers;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Caregiver;

#[Layout('layouts.app')]
class CaregiverList extends Component
{
    public $caregivers;

    public function mount()
    {
        $this->caregivers = Caregiver::withCount('patients')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.caregivers.caregiver-list', [
            'caregivers' => $this->caregivers
        ]);
    }
}