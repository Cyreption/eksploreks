<?php

// Author: Hafizhan Yusra Sulistyo (5026231060)

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    // ...existing code...
    protected $table = 'events';
    protected $primaryKey = 'event_id';
    public $incrementing = true;
    protected $keyType = 'int';

    // gunakan created_at tapi non-aktifkan updated_at (DB hanya punya created_at)
    public $timestamps = true;
    const UPDATED_AT = null;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'organizer',
        'location',
        'registration_link',
        'file_link',
        'start_time',
        'end_time',
        'image', 
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time'   => 'datetime',
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // accessor supaya $event->link merujuk ke kolom registration_link
    public function getLinkAttribute()
    {
        return $this->attributes['registration_link'] ?? null;
    }

    public function setLinkAttribute($value)
    {
        $this->attributes['registration_link'] = $value;
    }

    // accessor supaya $event->file_path merujuk ke kolom file_link (opsional)
    public function getFilePathAttribute()
    {
        return $this->attributes['file_link'] ?? null;
    }

    public function setFilePathAttribute($value)
    {
        $this->attributes['file_link'] = $value;
    }
}