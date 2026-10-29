<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DoctorSpeciality extends Model
{
    use HasFactory;

    protected $table = 'doctor_specialities';

    protected $fillable = [
        'name',
        'image',
    ];

    public function treatments(): HasMany
    {
        return $this->hasMany(Treatment::class, 'spaciality_id');
    }
}
