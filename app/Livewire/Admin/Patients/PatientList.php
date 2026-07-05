<?php

namespace App\Livewire\Admin\Patients;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Patient;

#[Layout('layouts.app')]
class PatientList extends Component
{
    public $patients;

    public function mount()
    {
        $this->patients = Patient::with('caregiver')->get();
    }

    public function render()
    {
        return view('livewire.admin.patients.patient-list', [
            'patients' => $this->patients
        ]);
    }
}