<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'appointment_code',
        'patient_id',
        'hospital_id',
        'doctor_id',
        'partner_id',
        'appointment_date',
        'appointment_time',
        'status',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'appointment_date' => 'date',
        ];
    }

    /**
     * Auto-generate unique appointment_code on creating.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($appointment) {
            if (empty($appointment->appointment_code)) {
                $appointment->appointment_code = static::generateAppointmentCode();
            }
        });
    }

    /**
     * Generate unique appointment code.
     */
    public static function generateAppointmentCode(): string
    {
        do {
            $code = 'APT-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -5));
        } while (static::where('appointment_code', $code)->exists());

        return $code;
    }

    /**
     * Patient relationship.
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Hospital relationship.
     */
    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    /**
     * Doctor relationship.
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Partner relationship.
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * Human-friendly status label.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'booked' => 'Booked',
            'received' => 'Received',
            'treatment' => 'In Treatment',
            'discharge' => 'Discharged',
            default => ucfirst($this->status),
        };
    }

    /**
     * Status color theme for UI badges.
     */
    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->status) {
            'booked' => 'bg-blue-50 text-[#1D4B6C] border-blue-200',
            'received' => 'bg-amber-50 text-amber-700 border-amber-200',
            'treatment' => 'bg-purple-50 text-purple-700 border-purple-200',
            'discharge' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
            default => 'bg-slate-100 text-slate-700 border-slate-200',
        };
    }
}

