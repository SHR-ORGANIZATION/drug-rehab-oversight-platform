<?php

namespace App\Livewire\Admin\DoctorReviews;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\CaregiverReport;
use App\Models\DoctorReview;
use App\Models\RiskType;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]
class ReviewReport extends Component
{
    public $reportId;
    public $report;

    // Review fields
    public $doctor_notes = '';
    public $subjective_notes = '';
    public $objective_notes = '';
    public $assessment_notes = '';
    public $treatment_plan = '';
    public $recommendation = '';
    public $risk_type_id = '';
    public $risk_severity = '';
    public $icd10_code = '';
    public $treatment_goals = '';
    public $medication_changes = '';
    public $follow_up_date = '';
    public $review_status = '';

    public $riskTypes = [];

    public function mount($id)
    {
        $this->reportId = $id;
        $this->report = CaregiverReport::with(['patient', 'caregiver', 'review'])->findOrFail($id);
        $this->riskTypes = RiskType::orderBy('name')->get()->toArray();

        // Load existing review if any
        $existingReview = $this->report->review;
        if ($existingReview) {
            $this->doctor_notes = $existingReview->doctor_notes ?? '';
            $this->subjective_notes = $existingReview->subjective_notes ?? '';
            $this->objective_notes = $existingReview->objective_notes ?? '';
            $this->assessment_notes = $existingReview->assessment_notes ?? '';
            $this->treatment_plan = $existingReview->treatment_plan ?? '';
            $this->recommendation = $existingReview->recommendation ?? '';
            $this->risk_type_id = $existingReview->risk_type_id ?? '';
            $this->risk_severity = $existingReview->risk_severity ?? '';
            $this->icd10_code = $existingReview->icd10_code ?? '';
            $this->treatment_goals = $existingReview->treatment_goals ?? '';
            $this->medication_changes = $existingReview->medication_changes ?? '';
            $this->follow_up_date = $existingReview->follow_up_date ? $existingReview->follow_up_date->format('Y-m-d') : '';
            $this->review_status = $existingReview->review_status ?? '';
        }
    }

    public function rules()
    {
        return [
            'doctor_notes' => 'nullable|string',
            'subjective_notes' => 'nullable|string',
            'objective_notes' => 'nullable|string',
            'assessment_notes' => 'required|string|min:10',
            'treatment_plan' => 'required|string|min:10',
            'recommendation' => 'nullable|string',
            'risk_type_id' => 'nullable|exists:risk_types,id',
            'risk_severity' => 'required|in:low,medium,high,critical',
            'icd10_code' => 'nullable|string|max:20',
            'treatment_goals' => 'nullable|string',
            'medication_changes' => 'nullable|string',
            'follow_up_date' => 'nullable|date|after_or_equal:today',
        ];
    }

    public function validationAttributes()
    {
        return [
            'assessment_notes' => 'clinical assessment',
            'treatment_plan' => 'treatment plan',
            'risk_severity' => 'risk severity',
        ];
    }

    public function saveDraft()
    {
        $this->review_status = 'draft';
        $this->saveReview();
        session()->flash('message', 'Review saved as draft.');
    }

    public function finalizeReview()
    {
        $this->validate();
        $this->review_status = 'finalized';
        $this->saveReview();

        // Update report status
        $this->report->update(['status' => 'reviewed']);

        session()->flash('message', 'Review finalized successfully. Report marked as reviewed.');
        $this->redirect(route('admin.reports', absolute: false));
    }

    private function saveReview()
    {
        $data = [
            'doctor_id' => Auth::id(),
            'doctor_notes' => $this->doctor_notes ?: null,
            'subjective_notes' => $this->subjective_notes ?: null,
            'objective_notes' => $this->objective_notes ?: null,
            'assessment_notes' => $this->assessment_notes ?: null,
            'treatment_plan' => $this->treatment_plan ?: null,
            'recommendation' => $this->recommendation ?: null,
            'risk_type_id' => $this->risk_type_id ?: null,
            'risk_severity' => $this->risk_severity ?: null,
            'icd10_code' => $this->icd10_code ?: null,
            'treatment_goals' => $this->treatment_goals ?: null,
            'medication_changes' => $this->medication_changes ?: null,
            'follow_up_date' => $this->follow_up_date ?: null,
            'review_status' => $this->review_status,
            'reviewed_at' => $this->review_status === 'finalized' ? now() : null,
        ];

        if ($this->report->review) {
            $this->report->review->update($data);
        } else {
            $data['caregiver_report_id'] = $this->report->id;
            DoctorReview::create($data);
        }

        // Reload the report
        $this->report->load('review');
    }

    public function render()
    {
        return view('livewire.admin.doctor-reviews.review-report');
    }
}
