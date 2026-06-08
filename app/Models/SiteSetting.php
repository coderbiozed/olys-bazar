<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getLogoUrlAttribute(): string
    {
        $default = asset('frontend/assets/imgs/theme/logo.svg');

        if (empty($this->logo) || !file_exists(public_path($this->logo))) {
            return $default;
        }

        return asset($this->logo);
    }
}
