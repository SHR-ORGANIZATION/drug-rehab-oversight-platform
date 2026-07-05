<?php

namespace App\Livewire\Admin\Caregivers;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;

#[Layout('layouts.app')]
class CaregiverList extends Component
{
    public $caregivers;

    public function mount()
    {
        $this->caregivers = User::where('role', 'caregiver')
            ->withCount('patients')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.caregivers.caregiver-list', [
            'caregivers' => $this->caregivers
        ]);
    }
}