<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'caregiver_id',
        'full_name',
        'gender',
        'date_of_birth',
        'phone',
        'email',
        'address',
        'emergency_contact',
        'medical_history',
        'admission_date',
        'status',
    ];

    public function caregiver()
    {
        return $this->belongsTo(User::class, 'caregiver_id');
    }

    public function reports()
    {
        return $this->hasMany(CaregiverReport::class);
    }
}