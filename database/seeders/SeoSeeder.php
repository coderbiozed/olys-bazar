<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    public function run(): void
    {
        Seo::updateOrCreate(
            ['id' => 1],
            [
                'meta_title' => 'MukamGhor Mart & Grocery',
                'meta_author' => 'MukamGhor',
                'meta_keyword' => 'grocery, mart, shop, MukamGhor',
                'meta_description' => 'Shop daily essentials, fresh produce, and more at MukamGhor Mart & Grocery.',
            ]
        );
    }
}
