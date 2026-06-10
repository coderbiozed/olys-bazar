<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'support_phone' => '+880 1911594822',
                'phone_one' => '+880 1400300234',
                'email' => 'help@mukamghor.com',
                'company_address' => 'Khulna, Bangladesh',
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'youtube' => 'https://youtube.com',
                'copyright' => '© MukamGhor. All rights reserved.',
            ]
        );
    }
}
