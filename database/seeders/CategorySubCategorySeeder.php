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
                'category_image' => 'frontend/assets/imgs/theme/icons/category-1.svg',
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
                    ['name' => 'Cheese', 'slug' => 'cheese'],
                    ['name' => 'Butter', 'slug' => 'butter'],
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
                    ['name' => 'Energy Drinks', 'slug' => 'energy-drinks'],
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
                    ['name' => 'Candy & Chocolate', 'slug' => 'candy-chocolate'],
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
                ],
            ],
            [
                'id' => 8,
                'category_name' => 'Frozen Foods',
                'category_slug' => 'frozen-foods',
                'category_image' => 'frontend/assets/imgs/theme/icons/category-8.svg',
                'subcategories' => [
                    ['name' => 'Frozen Vegetables', 'slug' => 'frozen-vegetables'],
                    ['name' => 'Frozen Meat & Fish', 'slug' => 'frozen-meat-fish'],
                    ['name' => 'Ice Cream & Desserts', 'slug' => 'ice-cream-desserts'],
                    ['name' => 'Ready Meals', 'slug' => 'ready-meals'],
                    ['name' => 'Frozen Snacks', 'slug' => 'frozen-snacks'],
                ],
            ],
            [
                'id' => 9,
                'category_name' => 'Baby & Kids',
                'category_slug' => 'baby-kids',
                'category_image' => 'frontend/assets/imgs/theme/icons/category-9.svg',
                'subcategories' => [
                    ['name' => 'Baby Food', 'slug' => 'baby-food'],
                    ['name' => 'Diapers & Wipes', 'slug' => 'diapers-wipes'],
                    ['name' => 'Baby Care', 'slug' => 'baby-care'],
                    ['name' => 'Kids Snacks', 'slug' => 'kids-snacks'],
                    ['name' => 'Toys & Learning', 'slug' => 'toys-learning'],
                ],
            ],
            [
                'id' => 10,
                'category_name' => 'Pet Supplies',
                'category_slug' => 'pet-supplies',
                'category_image' => 'frontend/assets/imgs/theme/icons/category-10.svg',
                'subcategories' => [
                    ['name' => 'Dog Food', 'slug' => 'dog-food'],
                    ['name' => 'Cat Food', 'slug' => 'cat-food'],
                    ['name' => 'Pet Treats', 'slug' => 'pet-treats'],
                    ['name' => 'Pet Care & Grooming', 'slug' => 'pet-care-grooming'],
                    ['name' => 'Pet Accessories', 'slug' => 'pet-accessories'],
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
