<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'patient_id',
        'name',
        'date',
        'file',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    /**
     * Patient relationship.
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Resolved file URL if uploaded.
     */
    public function getFileUrlAttribute(): ?string
    {
        if (empty($this->file)) {
            return null;
        }

        if (str_starts_with($this->file, 'http://') || str_starts_with($this->file, 'https://')) {
            return $this->file;
        }

        return asset($this->file);
    }

    /**
     * File extension.
     */
    public function getExtensionAttribute(): ?string
    {
        if (empty($this->file)) {
            return null;
        }
        return strtolower(pathinfo($this->file, PATHINFO_EXTENSION));
    }

    /**
     * Check if file is image.
     */
    public function isImage(): bool
    {
        $ext = $this->extension;
        return in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'bmp', 'avif', 'tiff', 'heic'], true);
    }

    /**
     * Check if file is PDF.
     */
    public function isPdf(): bool
    {
        return $this->extension === 'pdf';
    }
}
