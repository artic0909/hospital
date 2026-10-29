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
        'slug',
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
     * Boot model logic to autogenerate hospital code and unique slug.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($hospital) {
            if (empty($hospital->code)) {
                $hospital->code = static::generateHospitalCode();
            }
            if (empty($hospital->slug)) {
                $hospital->slug = static::generateUniqueSlug($hospital->name);
            }
        });

        static::updating(function ($hospital) {
            if (empty($hospital->slug) || ($hospital->isDirty('name') && !$hospital->isDirty('slug'))) {
                $hospital->slug = static::generateUniqueSlug($hospital->name, $hospital->id);
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
     * Generate unique URL-friendly slug.
     */
    public static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = \Illuminate\Support\Str::slug($name) ?: 'hospital';
        $slug = $baseSlug;
        $counter = 1;

        while (static::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }

    /**
     * Get the route key for implicit model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Resolve the route binding allowing both slug and numeric ID.
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'slug', $value)
            ->orWhere('id', $value)
            ->firstOrFail();
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

    /**
     * Patients relationship.
     */
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }

    /**
     * Appointments relationship.
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class)->latest();
    }

    /**
     * Facilities relationship.
     */
    public function facilities(): HasMany
    {
        return $this->hasMany(Facility::class);
    }

    /**
     * Images / Photo Gallery relationship.
     */
    public function images(): HasMany
    {
        return $this->hasMany(HospitalImage::class);
    }

    /**
     * Infrastructure relationship.
     */
    public function infrustructure(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Infrustructure::class);
    }

    /**
     * Services relationship.
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Location Guide relationship.
     */
    public function locationGuide(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(LocationGuide::class);
    }

    /**
     * Reviews relationship.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class)->latest();
    }
}
