<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class RiskType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function reviews()
    {
        return $this->hasMany(DoctorReview::class);
    }
}
