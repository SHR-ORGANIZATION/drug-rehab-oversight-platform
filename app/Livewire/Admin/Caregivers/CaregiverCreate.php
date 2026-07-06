<?php

namespace App\Livewire\Admin\Caregivers;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Caregiver;

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
            'email' => 'required|email|unique:caregivers,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|min:8',
        ];
    }

    public function save()
    {
        $this->validate();

        Caregiver::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => bcrypt($this->password),
        ]);

        session()->flash('message', 'Caregiver created successfully!');
        return redirect()->route('admin.caregivers');
    }

    public function render()
    {
        return view('livewire.admin.caregivers.caregiver-create');
    }
}