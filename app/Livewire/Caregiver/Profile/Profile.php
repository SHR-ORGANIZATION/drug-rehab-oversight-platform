<?php

namespace App\Livewire\Caregiver\Profile;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Caregiver;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]
class Profile extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';

    public function mount()
    {
        $caregiver = Auth::guard('caregiver')->user();
        $this->name = $caregiver->name;
        $this->email = $caregiver->email;
        $this->phone = $caregiver->phone;
    }

    public function rules()
    {
        $caregiverId = Auth::guard('caregiver')->id();
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:caregivers,email,' . $caregiverId,
            'phone' => 'nullable|string|max:20',
        ];
    }

    public function updateProfile()
    {
        $this->validate();

        /** @var Caregiver $caregiver */
        $caregiver = Auth::guard('caregiver')->user();
        $caregiver->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        session()->flash('message', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.caregiver.profile.profile');
    }
}
