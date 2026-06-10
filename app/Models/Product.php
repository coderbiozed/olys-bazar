<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function vendor(){
        return $this->belongsTo(User::class,'vendor_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

      public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }


  public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function thumbnailUrl(): string
    {
        $path = $this->product_thambnail;

        if (is_string($path) && $path !== '' && file_exists(public_path($path))) {
            return asset($path);
        }

        return asset('upload/no_image.jpg');
    }
}
