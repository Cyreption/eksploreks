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
    ];

    protected $casts = [
        'rating' => 'float',
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
