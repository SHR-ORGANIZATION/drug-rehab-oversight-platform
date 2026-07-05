<?php

namespace App\Livewire\Admin\Caregivers;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;

#[Layout('layouts.app')]
class CaregiverCreate extends Component
{
    public $name;
    public $email;
    public $phone;
    public $password;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|min:8',
        ];
    }

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => bcrypt($this->password),
            'role' => 'caregiver',
        ]);

        session()->flash('message', 'Caregiver created successfully!');
        return redirect()->route('caregivers');
    }

    public function render()
    {
        return view('livewire.admin.caregivers.caregiver-create');
    }
}