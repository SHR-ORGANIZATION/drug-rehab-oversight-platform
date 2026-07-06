<?php

namespace App\Livewire\Admin\Appointments;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Caregiver;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]
class AppointmentList extends Component
{
    use WithPagination;

    public $filter = 'all';
    public $search = '';
    public $showForm = false;

    // Form fields
    public $editingId = null;
    public $patient_id = '';
    public $caregiver_id = '';
    public $appointment_date = '';
    public $purpose = '';
    public $status = 'pending';

    public $patients = [];
    public $caregivers = [];

    protected $rules = [
        'patient_id' => 'required|exists:patients,id',
        'caregiver_id' => 'required|exists:caregivers,id',
        'appointment_date' => 'required|date|after_or_equal:today',
        'purpose' => 'required|string|min:10|max:500',
        'status' => 'required|in:pending,approved,rejected,completed',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->loadFormData();
    }

    private function loadFormData()
    {
        $this->patients = Patient::orderBy('full_name')->get()->toArray();
        $this->caregivers = Caregiver::orderBy('name')->get()->toArray();
    }

    public function openCreate()
    {
        $this->resetForm();
        $this->showForm = true;
        $this->loadFormData();
    }

    public function openEdit($id)
    {
        $apt = Appointment::findOrFail($id);
        $this->editingId = $apt->id;
        $this->patient_id = $apt->patient_id;
        $this->caregiver_id = $apt->caregiver_id;
        $this->appointment_date = $apt->appointment_date->format('Y-m-d H:i');
        $this->purpose = $apt->purpose;
        $this->status = $apt->status;
        $this->showForm = true;
        $this->loadFormData();
    }

    public function save()
    {
        $this->validate();

        $data = [
            'patient_id' => $this->patient_id,
            'caregiver_id' => $this->caregiver_id,
            'appointment_date' => $this->appointment_date,
            'purpose' => $this->purpose,
            'status' => $this->status,
        ];

        if ($this->editingId) {
            Appointment::findOrFail($this->editingId)->update($data);
            session()->flash('message', 'Appointment updated successfully.');
        } else {
            $data['doctor_id'] = Auth::id();
            Appointment::create($data);
            session()->flash('message', 'Appointment created successfully.');
        }

        $this->resetForm();
    }

    public function updateStatus($id, $newStatus)
    {
        Appointment::findOrFail($id)->update(['status' => $newStatus]);
        session()->flash('message', 'Appointment status updated to ' . ucfirst($newStatus) . '.');
    }

    public function delete($id)
    {
        Appointment::findOrFail($id)->delete();
        session()->flash('message', 'Appointment deleted successfully.');
    }

    public function cancel()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->editingId = null;
        $this->patient_id = '';
        $this->caregiver_id = '';
        $this->appointment_date = '';
        $this->purpose = '';
        $this->status = 'pending';
        $this->showForm = false;
    }

    public function render()
    {
        $appointments = Appointment::with(['patient', 'caregiver', 'doctor'])
            ->when($this->filter === 'upcoming', fn($q) => $q->where('appointment_date', '>=', now())->where('status', 'approved'))
            ->when($this->filter === 'pending', fn($q) => $q->where('status', 'pending'))
            ->when($this->filter === 'completed', fn($q) => $q->where('status', 'completed'))
            ->when($this->search, function ($q) {
                $q->whereHas('patient', function ($q2) {
                    $q2->where('full_name', 'like', '%' . $this->search . '%')
                       ->orWhere('patient_id', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('appointment_date', 'desc')
            ->paginate(10);

        return view('livewire.admin.appointments.appointment-list', [
            'appointments' => $appointments,
        ]);
    }
}
