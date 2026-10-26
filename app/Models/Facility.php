<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital_id',
        'name',
        'image',
    ];

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image && file_exists(public_path($this->image))) {
            return asset($this->image);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=27797D&color=ffffff&bold=true&size=128';
    }
}
