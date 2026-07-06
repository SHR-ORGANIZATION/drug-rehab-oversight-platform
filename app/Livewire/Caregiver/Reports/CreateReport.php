<?php

namespace App\Livewire\Caregiver\Reports;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Patient;
use App\Models\CaregiverReport;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]
class CreateReport extends Component
{
    public $patient_id = '';
    public $report_date = '';
    public $symptoms = '';
    public $observations = '';
    public $vital_signs = '';
    public $pain_level = '';
    public $functional_status = '';
    public $session_type = '';
    public $mood_behavior = '';
    public $patients = [];

    public function mount()
    {
        $this->report_date = date('Y-m-d');
        $this->patients = Patient::where('caregiver_id', Auth::guard('caregiver')->id())
            ->orderBy('full_name')
            ->get()
            ->toArray();
    }

    public function rules()
    {
        return [
            'patient_id' => 'required|exists:patients,id',
            'report_date' => 'required|date',
            'symptoms' => 'required|string|min:10',
            'observations' => 'required|string|min:10',
            'vital_signs' => 'nullable|string|max:500',
            'pain_level' => 'nullable|integer|min:0|max:10',
            'functional_status' => 'nullable|in:improved,stable,declined',
            'session_type' => 'nullable|string|max:100',
            'mood_behavior' => 'nullable|string|max:1000',
        ];
    }

    public function save()
    {
        $this->validate();

        CaregiverReport::create([
            'patient_id' => $this->patient_id,
            'caregiver_id' => Auth::guard('caregiver')->id(),
            'report_date' => $this->report_date,
            'symptoms' => $this->symptoms,
            'observations' => $this->observations,
            'vital_signs' => $this->vital_signs ?: null,
            'pain_level' => $this->pain_level !== '' ? $this->pain_level : null,
            'functional_status' => $this->functional_status ?: null,
            'session_type' => $this->session_type ?: null,
            'mood_behavior' => $this->mood_behavior ?: null,
            'status' => 'pending',
        ]);

        session()->flash('message', 'Report submitted successfully!');
        return redirect()->route('caregiver.reports');
    }

    public function render()
    {
        return view('livewire.caregiver.reports.create-report');
    }
}
