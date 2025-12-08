<?php

// Author: Satria Pinandita (5026231004)

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// kalau nanti mau pakai Auth bawaan Laravel, ganti ke:
// use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model // ganti ke Authenticatable kalau pakai auth
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'email',
        'password_hash',
        'full_name',
        'institution',
        'department',
        'birth_date',
        'avatar_url',
        'description',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'created_at' => 'datetime',
    ];

    // RELATIONS

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'user_id');
    }

    public function recruitmentPosts()
    {
        return $this->hasMany(RecruitmentPost::class, 'user_id');
    }

    public function friendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'user_id');
    }

    public function friendList()
    {
        return $this->hasMany(FriendList::class, 'user_id');
    }

    public function friends()
    {
        // teman yang dia tambah
        return $this->belongsToMany(
            User::class,
            'friend_list',
            'user_id',
            'friend_id'
        );
    }

    public function friendsOf()
    {
        // orang lain yang menambahkan dia
        return $this->belongsToMany(
            User::class,
            'friend_list',
            'friend_id',
            'user_id'
        );
    }

    public function messagesSent()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function savedPlaces()
    {
        return $this->hasMany(SavedPlace::class, 'user_id');
    }

    public function calendarEvents()
    {
        return $this->hasMany(CalendarEvent::class, 'user_id');
    }
}
