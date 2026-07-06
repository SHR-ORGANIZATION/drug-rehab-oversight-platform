<?php

namespace App\Livewire\Caregiver\Appointments;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]
class MyAppointments extends Component
{
    public $appointments = [];

    public function mount()
    {
        $this->appointments = Appointment::where('caregiver_id', Auth::guard('caregiver')->id())
            ->with(['patient', 'doctor'])
            ->orderBy('appointment_date', 'desc')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.caregiver.appointments.my-appointments');
    }
}
