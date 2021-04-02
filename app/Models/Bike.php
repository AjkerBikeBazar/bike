<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bike extends Model
{
    use HasFactory;

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = $this->slugify($value);
    }

    private function slugify ($value)
    {
        $slug = Str::slug($value);
        $count = Brand::where('slug', 'LIKE', $slug.'%')->count();
        $counter = $count ? $count + 1 : '';
        $slug .=$counter;
        return $slug.'-bike-price-in-bangladesh';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function capacity()
    {
        return $this->belongsTo(Capacity::class);
    }

    public function galleries()
    {
        return $this->hasMany(BikeGallery::class);
    }
}
