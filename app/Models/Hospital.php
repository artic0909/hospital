<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Hospital extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'code',
        'name',
        'contact',
        'email',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'establish_year',
        'hospital_category_id',
        'no_of_bed',
        'about',
        'password',
        'status',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'status' => 'boolean',
            'establish_year' => 'integer',
            'no_of_bed' => 'integer',
        ];
    }

    /**
     * Boot model logic to autogenerate hospital code.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($hospital) {
            if (empty($hospital->code)) {
                $hospital->code = static::generateHospitalCode();
            }
        });
    }

    /**
     * Generate unique sequential hospital code (e.g. HOSP-00001).
     */
    public static function generateHospitalCode(): string
    {
        $lastHospital = static::latest('id')->first();
        $nextId = $lastHospital ? ($lastHospital->id + 1) : 1;
        $code = 'HOSP-' . str_pad((string)$nextId, 5, '0', STR_PAD_LEFT);

        while (static::where('code', $code)->exists()) {
            $nextId++;
            $code = 'HOSP-' . str_pad((string)$nextId, 5, '0', STR_PAD_LEFT);
        }

        return $code;
    }

    /**
     * Country relationship.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * State relationship.
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    /**
     * City relationship.
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Hospital Category relationship.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(HospitalCategory::class, 'hospital_category_id');
    }

    /**
     * Doctors relationship.
     */
    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
