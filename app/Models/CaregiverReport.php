<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CaregiverReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'caregiver_id',
        'report_date',
        'symptoms',
        'observations',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function caregiver()
    {
        return $this->belongsTo(User::class, 'caregiver_id');
    }

    public function review()
    {
        return $this->hasOne(DoctorReview::class);
    }
}
