<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Doctor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'hospital_id',
        'name',
        'slug',
        'designation',
        'spaciality',
        'experience',
        'OPD_fee',
        'surgeries',
        'education',
        'awards',
        'work_experiance',
        'image',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'experience' => 'integer',
            'OPD_fee' => 'decimal:2',
            'status' => 'boolean',
        ];
    }

    /**
     * Boot model logic to autogenerate unique doctor slug.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($doctor) {
            if (empty($doctor->slug)) {
                $doctor->slug = static::generateUniqueSlug($doctor->name);
            }
        });

        static::updating(function ($doctor) {
            if (empty($doctor->slug) || ($doctor->isDirty('name') && !$doctor->isDirty('slug'))) {
                $doctor->slug = static::generateUniqueSlug($doctor->name, $doctor->id);
            }
        });
    }

    /**
     * Generate unique URL-friendly doctor slug.
     */
    public static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = \Illuminate\Support\Str::slug($name) ?: 'doctor';
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
     * Hospital relationship.
     */
    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    /**
     * Appointments relationship.
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class)->latest();
    }

    /**
     * Schedules relationship.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class)->orderByRaw("FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')");
    }

    /**
     * Image URL accessor.
     */
    public function getImageUrlAttribute(): ?string
    {
        if ($this->image && (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://'))) {
            return $this->image;
        }

        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . $this->image);
        }

        if ($this->image && file_exists(public_path($this->image))) {
            return asset($this->image);
        }

        return null;
    }
}
