<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PatientStory extends Model
{
    use HasFactory;

    protected $table = 'patient_stories';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'headline',
        'story',
        'image',
        'images',
        'country',
        'hospital_name',
        'treatment_name',
        'rating',
        'status',
        'is_featured',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'images' => 'array',
            'status' => 'boolean',
            'is_featured' => 'boolean',
            'rating' => 'integer',
        ];
    }

    /**
     * Get the primary image URL with fallback.
     */
    public function getImageUrlAttribute(): string
    {
        if (!empty($this->image)) {
            if (Str::startsWith($this->image, ['http://', 'https://'])) {
                return $this->image;
            }
            return asset($this->image);
        }

        // Check if there is an image in the images array
        if (!empty($this->images) && is_array($this->images) && count($this->images) > 0) {
            $first = $this->images[0];
            if (Str::startsWith($first, ['http://', 'https://'])) {
                return $first;
            }
            return asset($first);
        }

        return 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=600&q=80';
    }

    /**
     * Get all image URLs as an array.
     */
    public function getAllImagesAttribute(): array
    {
        $list = [];

        if (!empty($this->image)) {
            $list[] = Str::startsWith($this->image, ['http://', 'https://']) ? $this->image : asset($this->image);
        }

        if (!empty($this->images) && is_array($this->images)) {
            foreach ($this->images as $img) {
                $url = Str::startsWith($img, ['http://', 'https://']) ? $img : asset($img);
                if (!in_array($url, $list)) {
                    $list[] = $url;
                }
            }
        }

        if (empty($list)) {
            $list[] = $this->image_url;
        }

        return $list;
    }
}

