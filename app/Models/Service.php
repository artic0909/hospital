<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital_id',
        'category',
        'name',
    ];

    /**
     * Categories specified by user design.
     */
    public const CATEGORIES = [
        'Comfort During Stay',
        'Food Services',
        'Money Matters',
        'Patient Support',
        'Transportation',
        'Diagnostics',
        'Language Support',
    ];

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }
}
