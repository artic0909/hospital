<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppointmentHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'appointment_id',
        'patient_id',
        'status',
        'notes',
        'changed_by_type',
        'changed_by_name',
        'status_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status_at' => 'datetime',
        ];
    }

    /**
     * Parent appointment relationship.
     */
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    /**
     * Patient relationship.
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Human readable status label.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'booked' => 'Booked',
            'received' => 'Received',
            'treatment' => 'In Treatment',
            'discharge' => 'Discharged',
            default => ucfirst((string)$this->status),
        };
    }

    /**
     * Tailwind CSS badge classes based on status.
     */
    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->status) {
            'booked' => 'bg-blue-50 text-blue-700 border-blue-200',
            'received' => 'bg-amber-50 text-amber-700 border-amber-200',
            'treatment' => 'bg-purple-50 text-purple-700 border-purple-200',
            'discharge' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
            default => 'bg-slate-50 text-slate-700 border-slate-200',
        };
    }
}

