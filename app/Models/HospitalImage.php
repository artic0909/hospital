<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HospitalImage extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'hospital_id',
        'image',
        'title',
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

        return 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80';
    }
}
