<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BikeGallery extends Model
{
    protected $fillable = [
        'name',
        'image',
        'is_main',
        'bike_id',
    ];
    
    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}
