<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            UsersTableSeeder::class,
            CategorySubCategorySeeder::class,
            SliderSeeder::class,
            SiteSettingSeeder::class,
            SeoSeeder::class,
         ]);

         if (\App\Models\User::count() <= 3) {
            \App\Models\User::factory(8)->create();
         }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
