<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'caregiver_report_id',
        'doctor_id',
        'risk_type_id',
        'doctor_notes',
        'recommendation',
        'subjective_notes',
        'objective_notes',
        'assessment_notes',
        'treatment_plan',
        'risk_severity',
        'icd10_code',
        'treatment_goals',
        'medication_changes',
        'follow_up_date',
        'review_status',
        'reviewed_at',
    ];

    protected $casts = [
        'follow_up_date' => 'date',
        'reviewed_at' => 'datetime',
    ];

    public function report()
    {
        return $this->belongsTo(CaregiverReport::class, 'caregiver_report_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function riskType()
    {
        return $this->belongsTo(RiskType::class);
    }
}