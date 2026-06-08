<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

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
                'category_image' => 'frontend/assets/imgs/theme/icons/category-1.svg',
                'subcategories' => [
                    ['name' => 'Fruits', 'slug' => 'fruits'],
                    ['name' => 'Vegetables', 'slug' => 'vegetables'],
                    ['name' => 'Organic Foods', 'slug' => 'organic-foods'],
                    ['name' => 'Herbs & Spices', 'slug' => 'herbs-spices'],
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
                ],
            ],
            [
                'id' => 5,
                'category_name' => 'Snacks & Bakery',
                'category_slug' => 'snacks-bakery',
                'category_image' => 'frontend/assets/imgs/theme/icons/category-5.svg',
                'subcategories' => [
                    ['name' => 'Biscuits & Cookies', 'slug' => 'biscuits-cookies'],
                    ['name' => 'Chips & Nuts', 'slug' => 'chips-nuts'],
                    ['name' => 'Bread & Cakes', 'slug' => 'bread-cakes'],
                    ['name' => 'Instant Noodles', 'slug' => 'instant-noodles'],
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
                ],
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['id' => $cat['id']],
                [
                    'category_name' => $cat['category_name'],
                    'category_slug' => $cat['category_slug'],
                    'category_image' => $cat['category_image'],
                ]
            );

            foreach ($cat['subcategories'] as $sub) {
                SubCategory::create([
                    'category_id' => $cat['id'],
                    'subcategory_name' => $sub['name'],
                    'subcategory_slug' => $sub['slug'],
                ]);
            }
        }

        $subIds = SubCategory::pluck('id', 'subcategory_slug');

        $productMap = [
            1  => ['category_id' => 1, 'subcategory_slug' => 'organic-foods'],          // Olys Food
            2  => ['category_id' => 6, 'subcategory_slug' => 'kitchen-items'],           // Mug
            3  => ['category_id' => 7, 'subcategory_slug' => 'mobile-gadgets'],          // iPhone 13
            4  => ['category_id' => 7, 'subcategory_slug' => 'tv-audio'],                // Samsung TV
            5  => ['category_id' => 7, 'subcategory_slug' => 'clothing-shoes'],         // Nike Running Shoes
            6  => ['category_id' => 7, 'subcategory_slug' => 'computers-laptops'],      // MacBook Pro
            7  => ['category_id' => 7, 'subcategory_slug' => 'clothing-shoes'],         // Adidas Sports Jacket
            8  => ['category_id' => 7, 'subcategory_slug' => 'tv-audio'],               // Sony Headphones
            9  => ['category_id' => 1, 'subcategory_slug' => 'fruits'],                // Delicious Premium Apples
            10 => ['category_id' => 3, 'subcategory_slug' => 'juice'],                 // Refreshing Tropical Drink
            11 => ['category_id' => 5, 'subcategory_slug' => 'chips-nuts'],             // Assorted Organic Snacks
        ];

        foreach ($productMap as $productId => $map) {
            Product::where('id', $productId)->update([
                'category_id' => $map['category_id'],
                'subcategory_id' => $subIds[$map['subcategory_slug']] ?? null,
            ]);
        }

    }
}
