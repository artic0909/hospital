<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientEnquiry extends Model
{
    use HasFactory;

    protected $table = 'patient_enquiries';

    protected $fillable = [
        'name',
        'country',
        'city',
        'phone',
        'problem',
        'age_or_dob',
        'hospital_id',
        'doctor_id',
        'source_page',
        'status',
        'admin_notes',
    ];

    /**
     * Relationship with Hospital (Optional)
     */
    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }

    /**
     * Relationship with Doctor (Optional)
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    /**
     * Get CSS badge class for status
     */
    public function getStatusBadgeAttribute(): array
    {
        return match ($this->status) {
            'contacted' => ['class' => 'bg-blue-50 text-blue-700 border-blue-200', 'label' => 'Contacted'],
            'in_treatment' => ['class' => 'bg-purple-50 text-purple-700 border-purple-200', 'label' => 'In Treatment'],
            'closed' => ['class' => 'bg-gray-100 text-gray-700 border-gray-200', 'label' => 'Closed'],
            default => ['class' => 'bg-amber-50 text-amber-700 border-amber-200', 'label' => 'Pending Review'],
        };
    }
}

