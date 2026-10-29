<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class IconHelper
{
    /**
     * Get all available icons from public/icons directory
     *
     * @return array<int, array{filename: string, path: string, url: string, label: string, extension: string}>
     */
    public static function getPublicIcons(): array
    {
        $icons = [];
        $iconsPath = public_path('icons');

        if (File::exists($iconsPath)) {
            $files = File::files($iconsPath);
            foreach ($files as $file) {
                $filename = $file->getFilename();
                $extension = strtolower($file->getExtension());

                // Accept only image and vector formats
                if (!in_array($extension, ['svg', 'png', 'jpg', 'jpeg', 'webp', 'gif', 'ico', 'bmp', 'avif'])) {
                    continue;
                }

                $nameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);
                $label = ucwords(str_replace(['-', '_', '(', ')'], ' ', $nameWithoutExt));
                $label = trim(preg_replace('/\s+/', ' ', $label));

                $icons[] = [
                    'filename' => $filename,
                    'path' => 'icons/' . $filename,
                    'url' => asset('icons/' . $filename),
                    'label' => $label,
                    'extension' => $extension,
                ];
            }

            // Sort alphabetically by human-readable label
            usort($icons, fn($a, $b) => strcasecmp($a['label'], $b['label']));
        }

        return $icons;
    }
}

