<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agent extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'agents';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone',
        'country',
        'agent_type',
        'address',
        'website',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'email_verified_at' => 'datetime',
    ];

    /**
     * Patients referred by this agent.
     */
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class, 'agent_id')->latest();
    }

    /**
     * Appointments for patients of this agent.
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'agent_id')->latest();
    }

    /**
     * Formatted agent code (e.g. AGT-00001).
     */
    public function getAgentCodeAttribute(): string
    {
        return 'AGT-' . str_pad((string) $this->id, 5, '0', STR_PAD_LEFT);
    }
}

