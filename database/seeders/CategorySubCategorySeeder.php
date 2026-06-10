<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategorySubCategorySeeder extends Seeder
{
    public function run(): void
    {
        SubCategory::query()->delete();

        $categories = [
            [
                'id' => 1,
                'category_name' => 'Fresh Produce',
                'category_slug' => 'fresh-produce',
                'category_image' => 'frontend/assets/imgs/theme/icons/category-10.svg',
                'subcategories' => [
                    ['name' => 'Fruits', 'slug' => 'fruits'],
                    ['name' => 'Vegetables', 'slug' => 'vegetables'],
                    ['name' => 'Organic Foods', 'slug' => 'organic-foods'],
                    ['name' => 'Herbs & Spices', 'slug' => 'herbs-spices'],
                    ['name' => 'Meat & Fish', 'slug' => 'meat-fish'],
                ],
            ],
            [
                'id' => 2,
                'category_name' => 'Dairy & Eggs',
                'category_slug' => 'dairy-eggs',
                'category_image' => 'frontend/assets/imgs/theme/icons/category-2.svg',
                'subcategories' => [
                    ['name' => 'Milk', 'slug' => 'milk'],
                    ['name' => 'Eggs', 'slug' => 'eggs'],
                    ['name' => 'Cheese & Butter', 'slug' => 'cheese-butter'],
                    ['name' => 'Yogurt & Cream', 'slug' => 'yogurt-cream'],
                    ['name' => 'Butter', 'slug' => 'butter'],
                    ['name' => 'Cheese', 'slug' => 'cheese'],
                ],
            ],
            [
                'id' => 3,
                'category_name' => 'Beverages',
                'category_slug' => 'beverages',
                'category_image' => 'frontend/assets/imgs/theme/icons/category-3.svg',
                'subcategories' => [
                    ['name' => 'Soft Drinks', 'slug' => 'soft-drinks'],
                    ['name' => 'Juice', 'slug' => 'juice'],
                    ['name' => 'Tea & Coffee', 'slug' => 'tea-coffee'],
                    ['name' => 'Water', 'slug' => 'water'],
                ],
            ],
            [
                'id' => 4,
                'category_name' => 'Grocery Staples',
                'category_slug' => 'grocery-staples',
                'category_image' => 'frontend/assets/imgs/theme/icons/category-4.svg',
                'subcategories' => [
                    ['name' => 'Rice', 'slug' => 'rice'],
                    ['name' => 'Flour & Lentils', 'slug' => 'flour-lentils'],
                    ['name' => 'Cooking Oil', 'slug' => 'cooking-oil'],
                    ['name' => 'Salt & Sugar', 'slug' => 'salt-sugar'],
                    ['name' => 'Spices & Seasonings', 'slug' => 'spices-seasonings'],
                    ['name' => 'Baking Ingredients', 'slug' => 'baking-ingredients'],
                ],
            ],
            [
                'id' => 5,
                'category_name' => 'Snacks & Bakery',
                'category_slug' => 'snacks-bakery',
                'category_image' => 'frontend/assets/imgs/theme/icons/category-8.svg',
                'subcategories' => [
                    ['name' => 'Biscuits & Cookies', 'slug' => 'biscuits-cookies'],
                    ['name' => 'Chips & Nuts', 'slug' => 'chips-nuts'],
                    ['name' => 'Bread & Cakes', 'slug' => 'bread-cakes'],
                    ['name' => 'Instant Noodles', 'slug' => 'instant-noodles'],
                    ['name' => 'Candy & Chocolate', 'slug' => 'candy-chocolate'],
                    ['name' => 'Pastries', 'slug' => 'pastries'],
                    ['name' => 'Snacks', 'slug' => 'snacks'],
                ],
            ],
            [
                'id' => 6,
                'category_name' => 'Household & Care',
                'category_slug' => 'household-care',
                'category_image' => 'frontend/assets/imgs/theme/icons/category-6.svg',
                'subcategories' => [
                    ['name' => 'Cleaning Supplies', 'slug' => 'cleaning-supplies'],
                    ['name' => 'Kitchen Items', 'slug' => 'kitchen-items'],
                    ['name' => 'Personal Care', 'slug' => 'personal-care'],
                    ['name' => 'Laundry', 'slug' => 'laundry'],
                    ['name' => 'Paper Products', 'slug' => 'paper-products'],
                    ['name' => 'Pest Control', 'slug' => 'pest-control'],
                    ['name' => 'Home Decor', 'slug' => 'home-decor'],
                    ['name' => 'Home Appliances', 'slug' => 'home-appliances'],
                    ['name' => 'Home Improvement', 'slug' => 'home-improvement'],
                    ['name' => 'Pet Supplies', 'slug' => 'pet-supplies'],
                    ['name' => 'Baby Products', 'slug' => 'baby-products'],
                    ['name' => 'Health & Beauty', 'slug' => 'health-beauty'],
                    ['name' => 'Office Supplies', 'slug' => 'office-supplies'],
                    ['name' => 'Stationery', 'slug' => 'stationery'],
                    ['name' => 'Furniture', 'slug' => 'furniture'],
                ],
            ],
            [
                'id' => 7,
                'category_name' => 'Fashion & Electronics',
                'category_slug' => 'fashion-electronics',
                'category_image' => 'frontend/assets/imgs/theme/icons/category-7.svg',
                'subcategories' => [
                    ['name' => 'Mobile & Gadgets', 'slug' => 'mobile-gadgets'],
                    ['name' => 'Computers & Laptops', 'slug' => 'computers-laptops'],
                    ['name' => 'TV & Audio', 'slug' => 'tv-audio'],
                    ['name' => 'Clothing & Shoes', 'slug' => 'clothing-shoes'],
                    ['name' => 'Watches & Accessories', 'slug' => 'watches-accessories'],
                    ['name' => 'Gaming & Consoles', 'slug' => 'gaming-consoles'],
                    ['name' => 'Cameras & Photography', 'slug' => 'cameras-photography'],
                    ['name' => 'Smart Home Devices', 'slug' => 'smart-home-devices'],
                    ['name' => 'Audio & Headphones', 'slug' => 'audio-headphones'],
                    ['name' => 'Wearable Technology', 'slug' => 'wearable-technology'],
                    ['name' => 'Drones & Robotics', 'slug' => 'drones-robotics'],
                    ['name' => 'Virtual Reality', 'slug' => 'virtual-reality'],
                    ['name' => '3D Printing', 'slug' => '3d-printing'],
                    ['name' => 'Fitness & Health Tech', 'slug' => 'fitness-health-tech'],
                    ['name' => 'Automotive Electronics', 'slug' => 'automotive-electronics'],
                    ['name' => 'Office Electronics', 'slug' => 'office-electronics'],
                    ['name' => 'Audio & Home Theater', 'slug' => 'audio-home-theater'],
                    ['name' => 'Computer Components', 'slug' => 'computer-components'],
                    ['name' => 'Networking & Wi-Fi', 'slug' => 'networking-wifi'],
                    ['name' => 'Storage Devices', 'slug' => 'storage-devices'],
                ],
            ],
        ];

        $seededCategoryIds = [];

        foreach ($categories as $cat) {
            $seededCategoryIds[] = $cat['id'];

            Category::updateOrCreate(
                ['id' => $cat['id']],
                [
                    'category_name' => $cat['category_name'],
                    'category_slug' => $cat['category_slug'],
                    'category_image' => $cat['category_image'],
                ]
            );

            foreach ($cat['subcategories'] as $sub) {
                SubCategory::updateOrCreate(
                    [
                        'category_id' => $cat['id'],
                        'subcategory_slug' => $sub['slug'],
                    ],
                    [
                        'subcategory_name' => $sub['name'],
                    ]
                );
            }
        }

        Category::whereNotIn('id', $seededCategoryIds)->delete();

        $subIds = SubCategory::all()
            ->mapWithKeys(fn ($sub) => ["{$sub->category_id}:{$sub->subcategory_slug}" => $sub->id]);

        $productMap = [
            1  => ['category_id' => 1, 'subcategory_slug' => 'organic-foods'],
            2  => ['category_id' => 6, 'subcategory_slug' => 'kitchen-items'],
            3  => ['category_id' => 7, 'subcategory_slug' => 'mobile-gadgets'],
            4  => ['category_id' => 7, 'subcategory_slug' => 'tv-audio'],
            5  => ['category_id' => 7, 'subcategory_slug' => 'clothing-shoes'],
            6  => ['category_id' => 7, 'subcategory_slug' => 'computers-laptops'],
            7  => ['category_id' => 7, 'subcategory_slug' => 'clothing-shoes'],
            8  => ['category_id' => 7, 'subcategory_slug' => 'tv-audio'],
            9  => ['category_id' => 1, 'subcategory_slug' => 'fruits'],
            10 => ['category_id' => 3, 'subcategory_slug' => 'juice'],
            11 => ['category_id' => 5, 'subcategory_slug' => 'chips-nuts'],
        ];

        foreach ($productMap as $productId => $map) {
            $subKey = "{$map['category_id']}:{$map['subcategory_slug']}";

            Product::where('id', $productId)->update([
                'category_id' => $map['category_id'],
                'subcategory_id' => $subIds[$subKey] ?? null,
            ]);
        }

        if (DB::getDriverName() === 'pgsql') {
            DB::statement("SELECT setval(pg_get_serial_sequence('categories', 'id'), COALESCE((SELECT MAX(id) FROM categories), 1))");
            DB::statement("SELECT setval(pg_get_serial_sequence('sub_categories', 'id'), COALESCE((SELECT MAX(id) FROM sub_categories), 1))");
        }
    }
}
