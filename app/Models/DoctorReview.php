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