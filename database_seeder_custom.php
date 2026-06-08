

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// 1. Create 3 Vendors
$vendors = [];
for ($i = 1; $i <= 3; $i++) {
    $vendors[] = User::create([
        'name' => "New Vendor $i",
        'username' => "new_vendor_$i",
        'email' => "vendor$i@test.com",
        'password' => Hash::make('111'),
        'role' => 'vendor',
        'status' => 'active',
    ]);
}
echo "Created 3 Vendors.\n";

// 2. Ensure we have a Category
$category = Category::first();
if (!$category) {
    $category = Category::create([
        'category_name' => 'General',
        'category_slug' => 'general',
        'category_image' => 'upload/category/default.jpg'
    ]);
}
$categoryId = $category->id;

// 3. Create 3 Products, one for each Vendor
$productNames = [
    'Delicious Premium Apples',
    'Refreshing Tropical Drink',
    'Assorted Organic Snacks'
];

$productDirs = public_path('upload/products/thambnail');
if (!file_exists($productDirs)) {
    mkdir($productDirs, 0777, true);
}

foreach ($vendors as $index => $vendor) {
    $productName = $productNames[$index];
    $slug = Str::slug($productName);
    
    // Download a placeholder image
    $imageName = "product_{$vendor->id}_" . time() . ".jpg";
    $imagePath = 'upload/products/thambnail/' . $imageName;
    $fullPath = public_path($imagePath);
    
    // Download image from Picsum
    $imageContent = file_get_contents("https://picsum.photos/seed/{$slug}/400/400");
    if ($imageContent) {
        file_put_contents($fullPath, $imageContent);
    } else {
        $imagePath = 'upload/products/thambnail/default.jpg'; // fallback
    }

    Product::create([
        'brand_id' => 1, // Assume 1 exists or is bypassed by foreign key checks
        'category_id' => $categoryId,
        'subcategory_id' => 1,
        'product_name' => $productName,
        'product_slug' => $slug,
        'product_code' => 'PROD-' . rand(1000, 9999),
        'product_qty' => rand(10, 100),
        'product_tags' => 'fresh,organic,premium',
        'product_size' => 'Small,Medium,Large',
        'product_color' => 'Red,Green,Blue',
        'selling_price' => rand(10, 50),
        'discount_price' => rand(5, 9),
        'short_descp' => "This is a high quality {$productName} from {$vendor->name}.",
        'long_descp' => "<p>Detailed description for {$productName}. It is very fresh and delicious.</p>",
        'product_thambnail' => $imagePath,
        'vendor_id' => $vendor->id,
        'hot_deals' => 1,
        'featured' => 1,
        'special_offer' => 1,
        'special_deals' => 1,
        'status' => 1,
    ]);
}
echo "Created 3 Products with images and assigned them to vendors.\n";
