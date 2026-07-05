<?php

namespace App\Livewire\Admin\Patients;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Patient;

#[Layout('layouts.app')]
class PatientView extends Component
{
    public Patient $patient;

    public function mount($id)
    {
        $this->patient = Patient::with('caregiver')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.patients.view', [
            'patient' => $this->patient
        ]);
    }
}