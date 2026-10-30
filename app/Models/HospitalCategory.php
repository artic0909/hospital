<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HospitalCategory extends Model
{
    use HasFactory;

    protected $table = 'hospital_categories';

    protected $fillable = ['name'];

    public function hospitals(): HasMany
    {
        return $this->hasMany(Hospital::class, 'hospital_category_id');
    }
}
