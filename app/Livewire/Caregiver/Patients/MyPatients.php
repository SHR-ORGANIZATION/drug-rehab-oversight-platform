<?php

namespace App\Livewire\Caregiver\Patients;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]
class MyPatients extends Component
{
    public $patients = [];
    public $search = '';

    public function mount()
    {
        $this->loadPatients();
    }

    public function updatedSearch()
    {
        $this->loadPatients();
    }

    public function loadPatients()
    {
        $caregiverId = Auth::guard('caregiver')->id();

        $this->patients = Patient::where('caregiver_id', $caregiverId)
            ->when($this->search, function ($query) {
                $query->where('full_name', 'like', '%' . $this->search . '%')
                      ->orWhere('patient_id', 'like', '%' . $this->search . '%');
            })
            ->orderBy('full_name', 'asc')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.caregiver.patients.my-patients');
    }
}
