<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'partner_id',
        'hospital_id',
        'name',
        'phone',
        'email',
        'country',
        'state',
        'city',
        'address',
        'image',
    ];

    /**
     * Hospital relationship.
     */
    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    /**
     * Partner relationship.
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * Medical reports relationship.
     */
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class)->latest('date');
    }

    /**
     * Appointments relationship.
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class)->latest();
    }

    /**
     * Get the resolved image URL or a default fallback avatar.
     */
    public function getImageUrlAttribute(): string
    {
        if (!empty($this->image)) {
            if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
                return $this->image;
            }
            return asset($this->image);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=27797D&color=fff&size=200&bold=true';
    }

    /**
     * Location formatted as City, State, Country.
     */
    public function getFullLocationAttribute(): string
    {
        $parts = array_filter([$this->city, $this->state, $this->country]);
        return count($parts) > 0 ? implode(', ', $parts) : 'Not specified';
    }
}
