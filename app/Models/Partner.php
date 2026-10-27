<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Partner extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'hospital_id',
        'name',
        'company_name',
        'email',
        'phone',
        'country',
        'partner_type',
        'address',
        'website',
        'status',
        'password',
    ];

    /**
     * Hospital relationship.
     */
    public function hospital(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    /**
     * Patients relationship.
     */
    public function patients(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Patient::class);
    }

    /**
     * Resolve the active hospital for this partner.
     */
    public function getHospital(): ?Hospital
    {
        if ($this->hospital_id) {
            $h = Hospital::find($this->hospital_id);
            if ($h) return $h;
        }

        if (session('impersonated_hospital_id')) {
            $h = Hospital::find(session('impersonated_hospital_id'));
            if ($h) return $h;
        }

        $h = Hospital::where('email', $this->email)
            ->orWhere('name', $this->company_name)
            ->first();

        if ($h) {
            $this->update(['hospital_id' => $h->id]);
            return $h;
        }

        return Hospital::first();
    }

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
