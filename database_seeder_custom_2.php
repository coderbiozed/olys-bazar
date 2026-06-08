
use App\Models\Brand;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;

$brandNames = ['Apple', 'Samsung', 'Sony'];
$subCategories = ['Smartphones', 'Laptops', 'Accessories'];

$brandDirs = public_path('upload/brand');
if (!file_exists($brandDirs)) {
    mkdir($brandDirs, 0777, true);
}

// 1. Create Brands
echo "Creating Brands...\n";
foreach ($brandNames as $name) {
    $slug = Str::slug($name);
    $imageName = "brand_" . $slug . "_" . time() . ".jpg";
    $imagePath = 'upload/brand/' . $imageName;
    $fullPath = public_path($imagePath);
    
    // Download image from Picsum
    $imageContent = @file_get_contents("https://picsum.photos/seed/{$slug}/150/150");
    if ($imageContent) {
        file_put_contents($fullPath, $imageContent);
    } else {
        $imagePath = 'upload/brand/default.jpg'; 
    }

    Brand::create([
        'brand_name' => $name,
        'brand_slug' => $slug,
        'brand_image' => $imagePath
    ]);
}
echo "Created 3 Brands.\n";

// 2. Create SubCategories
echo "Creating SubCategories...\n";
// Ensure we have a Category
$category = Category::first();
if (!$category) {
    $category = Category::create([
        'category_name' => 'Electronics',
        'category_slug' => 'electronics',
        'category_image' => 'upload/category/default.jpg'
    ]);
}
$categoryId = $category->id;

foreach ($subCategories as $name) {
    $slug = Str::slug($name);
    SubCategory::create([
        'category_id' => $categoryId,
        'subcategory_name' => $name,
        'subcategory_slug' => $slug
    ]);
}
echo "Created 3 SubCategories.\n";
