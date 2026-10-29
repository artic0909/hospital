<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowItWork extends Model
{
    use HasFactory;

    protected $table = 'how_it_works';

    protected $fillable = [
        'step_number',
        'title',
        'description',
        'icon',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'step_number' => 'integer',
        'order' => 'integer',
        'is_active' => 'boolean',
    ];
}

