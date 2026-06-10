<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Product;
use Image;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class VendorProductController extends Controller
{
    private function vendorProductOrFail($id): Product
    {
        return Product::where('vendor_id', Auth::id())->findOrFail($id);
    }

    private function ensureUploadDir(string $relativePath): void
    {
        $dir = public_path($relativePath);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }

    private function saveProductImage($image, string $relativeDir, int $width = 800, int $height = 800): string
    {
        if (!$image || !$image->isValid()) {
            throw ValidationException::withMessages([
                'product_thambnail' => 'Please upload a valid image file.',
            ]);
        }

        $path = $image->getRealPath();
        if (!$path || !is_file($path)) {
            throw ValidationException::withMessages([
                'product_thambnail' => 'Uploaded file could not be read. Use JPG, PNG, GIF, BMP, or WebP.',
            ]);
        }

        $this->ensureUploadDir($relativeDir);

        $extension = strtolower($image->extension() ?: $image->getClientOriginalExtension() ?: 'jpg');
        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'], true)) {
            $extension = 'jpg';
        }

        $name_gen = hexdec(uniqid()).'.'.$extension;
        Image::make($path)->resize($width, $height)->save(public_path($relativeDir.'/'.$name_gen));

        return $relativeDir.'/'.$name_gen;
    }

    private function productRules(bool $thumbnailRequired = true): array
    {
        $rules = [
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:sub_categories,id',
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:100',
            'product_qty' => 'required|integer|min:0',
            'product_tags' => 'nullable|string|max:500',
            'product_size' => 'nullable|string|max:500',
            'product_color' => 'nullable|string|max:500',
            'selling_price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'short_descp' => 'required|string|max:1000',
            'long_descp' => 'nullable|string',
            'multi_img' => 'nullable|array',
            'multi_img.*' => 'image|mimes:jpeg,png,jpg,gif,bmp,webp|max:5120',
        ];

        $rules['product_thambnail'] = ($thumbnailRequired ? 'required|' : 'nullable|').'image|mimes:jpeg,png,jpg,gif,bmp,webp|max:5120';

        return $rules;
    }

    public function VendorAllProduct()
    {
        $products = Product::where('vendor_id', Auth::id())->latest()->get();

        return view('vendor.backend.product.vendor_product_all', compact('products'));
    }

    public function VendorAddProduct()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();

        return view('vendor.backend.product.vendor_product_add', compact('brands', 'categories'));
    }

    public function VendorGetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();

        return response()->json($subcat);
    }

    public function VendorStoreProduct(Request $request)
    {
        $request->validate($this->productRules(true));

        $save_url = $this->saveProductImage(
            $request->file('product_thambnail'),
            'upload/products/thambnail'
        );

        $slug = Str::slug($request->product_name).'-'.strtolower(Str::random(6));

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => $slug,
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'hot_deals' => null,
            'featured' => null,
            'special_offer' => null,
            'special_deals' => null,
            'product_thambnail' => $save_url,
            'vendor_id' => Auth::id(),
            'status' => 0,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('multi_img')) {
            $this->ensureUploadDir('upload/products/multi-image');

            foreach ($request->file('multi_img') as $img) {
                $uploadPath = $this->saveProductImage($img, 'upload/products/multi-image');

                MultiImg::insert([
                    'product_id' => $product_id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(),
                ]);
            }
        }

        $notification = [
            'message' => 'Product submitted successfully. It will appear on the shop after admin approval.',
            'alert-type' => 'success',
        ];

        return redirect()->route('vendor.all.product')->with($notification);
    }

    public function VendorEditProduct($id)
    {
        $products = $this->vendorProductOrFail($id);
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();

        return view('vendor.backend.product.vendor_product_edit', compact('brands', 'categories', 'products', 'subcategory', 'multiImgs'));
    }

    public function VendorUpdateProduct(Request $request)
    {
        $request->validate($this->productRules(false));

        $product = $this->vendorProductOrFail($request->id);

        $product->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name).'-'.$product->id,
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Vendor Product Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('vendor.all.product')->with($notification);
    }

    public function VendorUpdateProductThabnail(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'product_thambnail' => 'required|image|mimes:jpeg,png,jpg,gif,bmp,webp|max:5120',
        ]);

        $product = $this->vendorProductOrFail($request->id);
        $oldImage = $product->product_thambnail;

        $save_url = $this->saveProductImage(
            $request->file('product_thambnail'),
            'upload/products/thambnail'
        );

        if ($oldImage && file_exists(public_path($oldImage))) {
            @unlink(public_path($oldImage));
        }

        $product->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Vendor Product Thumbnail Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function VendorUpdateProductmultiImage(Request $request)
    {
        $request->validate([
            'multi_img' => 'required|array',
            'multi_img.*' => 'image|mimes:jpeg,png,jpg,gif,bmp,webp|max:5120',
        ]);

        $imgs = $request->file('multi_img');

        foreach ($imgs as $id => $img) {
            $multiImg = MultiImg::findOrFail($id);
            $this->vendorProductOrFail($multiImg->product_id);

            if (file_exists(public_path($multiImg->photo_name))) {
                @unlink(public_path($multiImg->photo_name));
            }

            $uploadPath = $this->saveProductImage($img, 'upload/products/multi-image');

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = [
            'message' => 'Vendor Product Multi Image Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function VendorMultiimgDelete($id)
    {
        $oldImg = MultiImg::findOrFail($id);
        $this->vendorProductOrFail($oldImg->product_id);

        if (file_exists(public_path($oldImg->photo_name))) {
            @unlink(public_path($oldImg->photo_name));
        }

        $oldImg->delete();

        $notification = [
            'message' => 'Vendor Product Multi Image Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function VendorProductInactive($id)
    {
        $product = $this->vendorProductOrFail($id);

        if ($product->status != 1) {
            return redirect()->back()->with([
                'message' => 'Only approved products can be deactivated.',
                'alert-type' => 'warning',
            ]);
        }

        $product->update(['status' => 0]);

        return redirect()->back()->with([
            'message' => 'Product deactivated. Contact admin to publish again.',
            'alert-type' => 'success',
        ]);
    }

    public function VendorProductActive($id)
    {
        $this->vendorProductOrFail($id);

        return redirect()->back()->with([
            'message' => 'Products require admin approval before going live.',
            'alert-type' => 'warning',
        ]);
    }

    public function VendorProductDelete($id)
    {
        $product = $this->vendorProductOrFail($id);

        if ($product->product_thambnail && file_exists(public_path($product->product_thambnail))) {
            @unlink(public_path($product->product_thambnail));
        }

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img) {
            if (file_exists(public_path($img->photo_name))) {
                @unlink(public_path($img->photo_name));
            }
            $img->delete();
        }

        $product->delete();

        $notification = [
            'message' => 'Vendor Product Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
