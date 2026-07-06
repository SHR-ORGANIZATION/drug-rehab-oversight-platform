<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]
class Profile extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public $profile_image;
    public $existingImage = null;

    public function mount()
    {
        /** @var User $doctor */
        $doctor = Auth::user();
        $this->name = $doctor->name;
        $this->email = $doctor->email;
        $this->phone = $doctor->phone ?? '';
        $this->existingImage = $doctor->profile_image;
    }

    public function rules()
    {
        $doctorId = Auth::id();
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $doctorId,
            'phone' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|max:2048',
        ];
    }

    public function updateProfile()
    {
        $this->validate();

        /** @var User $doctor */
        $doctor = Auth::user();
        
        $updateData = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ];

        // Handle image upload
        if ($this->profile_image) {
            // Delete old image if exists
            if ($doctor->profile_image) {
                Storage::disk('public')->delete($doctor->profile_image);
            }
            $updateData['profile_image'] = $this->profile_image->store('profile-images', 'public');
        }

        $doctor->update($updateData);

        session()->flash('message', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.profile.profile');
    }
}
