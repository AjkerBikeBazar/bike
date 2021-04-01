<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
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
        $count = Category::where('slug', 'LIKE', $slug.'%')->count();
        $counter = $count ? $count + 1 : '';
        $slug .=$counter;
        return $slug.'-bike-in-bangladesh';
    }

    public function bikes()
    {
        return $this->hasMany(Bike::class);
    }
}
