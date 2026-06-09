<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        Slider::query()->delete();

        $sliders = [
            [
                'slider_title' => 'Welcome to MukamGhor',
                'short_title' => 'Your trusted mart & grocery store',
                'slider_image' => 'frontend/assets/imgs/slider/slider-1.png',
            ],
            [
                'slider_title' => 'Fresh Deals Daily',
                'short_title' => 'Fruits, snacks, beverages and more',
                'slider_image' => 'frontend/assets/imgs/slider/slider1-1.png',
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
