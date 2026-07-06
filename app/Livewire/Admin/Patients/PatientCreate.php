<?php

namespace App\Livewire\Admin\Patients;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Patient;
use App\Models\Caregiver;
use Carbon\Carbon;

#[Layout('layouts.app')]
class PatientCreate extends Component
{
    public $full_name = '';
    public $patient_id = '';
    public $age = '';
    public $gender = '';
    public $phone = '';
    public $email = '';
    public $caregiver_id = '';
    public $admission_date = '';
    public $address = '';

    public function save()
    {
        $this->validate([
            'full_name' => 'required|string|max:255',
            'patient_id' => 'required|string|max:50|unique:patients,patient_id',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:Male,Female',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'caregiver_id' => 'required|exists:caregivers,id',
            'admission_date' => 'required|date',
            'address' => 'nullable|string',
        ]);

        // Calculate date_of_birth from age
        $dateOfBirth = Carbon::now()->subYears($this->age)->format('Y-m-d');

        Patient::create([
            'full_name' => $this->full_name,
            'patient_id' => $this->patient_id,
            'date_of_birth' => $dateOfBirth,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'email' => $this->email,
            'caregiver_id' => $this->caregiver_id,
            'admission_date' => $this->admission_date,
            'address' => $this->address,
            'status' => 'Active',
        ]);

        session()->flash('message', 'Patient created successfully!');
        return redirect()->route('admin.patients');
    }

    public function render()
    {
        $caregivers = Caregiver::all();
        return view('livewire.admin.patients.create', compact('caregivers'));
    }
}