<?php

namespace App\Livewire\Admin\Doctors;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]
class DoctorList extends Component
{
    use WithFileUploads;

    public $doctors;
    
    // Modal properties
    public $showModal = false;
    public $doctorId = null;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $password = '';
    public $profile_image;
    public $existingImage = null;

    public function mount()
    {
        $this->loadDoctors();
    }

    public function loadDoctors()
    {
        $this->doctors = User::where('role', 'doctor')
            ->withCount(['reviews' => function($query) {
                $query->where('review_status', 'finalized');
            }])
            ->get();
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function openEditModal($id)
    {
        $doctor = User::findOrFail($id);
        $this->doctorId = $doctor->id;
        $this->name = $doctor->name;
        $this->email = $doctor->email;
        $this->phone = $doctor->phone;
        $this->password = '';
        $this->existingImage = $doctor->profile_image;
        $this->profile_image = null;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->showModal = false;
    }

    public function resetForm()
    {
        $this->doctorId = null;
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->password = '';
        $this->profile_image = null;
        $this->existingImage = null;
    }

    public function saveDoctor()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|max:2048', // 2MB max
        ];

        if ($this->doctorId) {
            // Update
            $rules['email'] .= ',id,' . $this->doctorId;
            $rules['password'] = 'nullable|min:8';
        } else {
            // Create
            $rules['password'] = 'required|min:8';
        }

        $this->validate($rules);

        // Handle image upload
        $imagePath = null;
        if ($this->profile_image) {
            $imagePath = $this->profile_image->store('profile-images', 'public');
        }

        if ($this->doctorId) {
            // Update existing doctor
            $doctor = User::findOrFail($this->doctorId);
            $updateData = [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ];

            if ($imagePath) {
                // Delete old image if exists
                if ($doctor->profile_image) {
                    Storage::disk('public')->delete($doctor->profile_image);
                }
                $updateData['profile_image'] = $imagePath;
            }

            $doctor->update($updateData);

            if ($this->password) {
                $doctor->update(['password' => bcrypt($this->password)]);
            }

            session()->flash('message', 'Doctor updated successfully!');
        } else {
            // Create new doctor
            $doctor = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'password' => bcrypt($this->password),
                'role' => 'doctor',
                'profile_image' => $imagePath,
            ]);

            // Assign doctor role
            $doctor->assignRole('doctor');

            session()->flash('message', 'Doctor created successfully!');
        }

        $this->closeModal();
        $this->loadDoctors();
    }

    public function deleteDoctor($id)
    {
        $doctor = User::findOrFail($id);
        
        // Prevent deleting yourself
        if ($doctor->id === Auth::id()) {
            session()->flash('error', 'You cannot delete your own account.');
            return;
        }
        
        $doctor->delete();
        
        $this->loadDoctors();
        session()->flash('message', 'Doctor deleted successfully.');
    }

    public function render()
    {
        return view('livewire.admin.doctors.doctor-list', [
            'doctors' => $this->doctors
        ]);
    }
}
