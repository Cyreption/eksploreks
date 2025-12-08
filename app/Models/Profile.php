<?php

// Author: Satria Pinandita (5026231004)

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'profile_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'bio',
        'interests',
        'followers_count',
        'following_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
