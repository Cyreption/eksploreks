<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    protected $primaryKey = 'place_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'address',
        'rating',
        'price_range',
        'image',
        'distance',
        'reviews',
        'is_top',
        'price_rating',
        'location_rating',
        'service_rating',
    ];

    protected $casts = [
        'rating' => 'float',
        'price_rating' => 'float',
        'location_rating' => 'float',
        'service_rating' => 'float',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'place_id');
    }

    public function savedByUsers()
    {
        return $this->hasMany(SavedPlace::class, 'place_id');
    }
}
