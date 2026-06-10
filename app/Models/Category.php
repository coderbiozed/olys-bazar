<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function imageUrl(): string
    {
        $path = $this->category_image;

        if (is_string($path) && $path !== '' && file_exists(public_path($path))) {
            return asset($path);
        }

        $iconNumber = (($this->id - 1) % 11) + 1;
        $iconPath = "frontend/assets/imgs/theme/icons/category-{$iconNumber}.svg";

        if (file_exists(public_path($iconPath))) {
            return asset($iconPath);
        }

        return asset('upload/no_image.jpg');
    }
}
