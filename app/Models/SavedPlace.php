<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedPlace extends Model
{
    protected $table = 'saved_places';
    protected $primaryKey = 'saved_place_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'place_id',
        'saved_at',
    ];

    protected $casts = [
        'saved_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }
}
