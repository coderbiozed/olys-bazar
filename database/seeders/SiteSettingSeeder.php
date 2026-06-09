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
                'support_phone' => '+880 1800 900',
                'phone_one' => '+880 1800 900',
                'email' => 'hello@mukamghor.com',
                'company_address' => 'Dhaka, Bangladesh',
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'youtube' => 'https://youtube.com',
                'copyright' => '© MukamGhor. All rights reserved.',
            ]
        );
    }
}
