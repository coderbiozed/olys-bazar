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
                'slider_title' => 'Fresh Groceries Delivered',
                'short_title' => 'Shop daily essentials from MukamGhor Mart & Grocery',
                'slider_image' => 'upload/slider/1740124720282597.jpg',
            ],
            [
                'slider_title' => 'Best Deals Every Day',
                'short_title' => 'Save more on fruits, snacks, beverages and household items',
                'slider_image' => 'upload/slider/1740124692461696.jpg',
            ],
            [
                'slider_title' => 'Quality You Can Trust',
                'short_title' => 'Fresh produce, dairy, staples and more at your doorstep',
                'slider_image' => 'upload/slider/1740125628962691.jpg',
            ],
            [
                'slider_title' => 'Shop Smarter with MukamGhor',
                'short_title' => 'Fast delivery, secure payment and great prices',
                'slider_image' => 'frontend/assets/imgs/slider/slider-1.png',
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
