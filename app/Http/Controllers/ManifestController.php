<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use App\Models\SiteSetting;

class ManifestController extends Controller
{
    public function __invoke()
    {
        $name = config('app.name', 'MukamGhor');
        if ($name === 'Laravel') {
            $name = 'MukamGhor';
        }

        $seo = Seo::find(1);
        $setting = SiteSetting::find(1);

        $icon = asset('frontend/assets/imgs/theme/logo-mukamghor.png');
        if ($setting && $setting->logo && file_exists(public_path($setting->logo))) {
            $icon = asset($setting->logo);
        }

        $description = $seo?->meta_description
            ?: 'MukamGhor — your online bazaar for fresh groceries and everyday essentials.';

        return response()->json([
            'name' => $name,
            'short_name' => 'MukamGhor',
            'description' => $description,
            'start_url' => '/',
            'scope' => '/',
            'display' => 'standalone',
            'orientation' => 'portrait-primary',
            'background_color' => '#ffffff',
            'theme_color' => '#3BB77E',
            'lang' => 'en',
            'dir' => 'ltr',
            'categories' => ['shopping', 'food'],
            'icons' => [
                [
                    'src' => $icon,
                    'sizes' => '192x192',
                    'type' => 'image/png',
                    'purpose' => 'any',
                ],
                [
                    'src' => $icon,
                    'sizes' => '512x512',
                    'type' => 'image/png',
                    'purpose' => 'any maskable',
                ],
                [
                    'src' => asset('frontend/assets/imgs/theme/favicon.svg'),
                    'sizes' => 'any',
                    'type' => 'image/svg+xml',
                    'purpose' => 'any',
                ],
            ],
        ], 200, [
            'Content-Type' => 'application/manifest+json',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }
}
