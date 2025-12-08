<?php

// Author: Aulia Salma Anjani (5026231063) & // Author: Hafizhan Yusra Sulistyo (5026231060)

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    protected $table = 'calendar_events';
    protected $primaryKey = 'calendar_event_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'calendar_id',
        'title',
        'date_time',
        'all_day',
        'color',
        'location',
        'notification',
        'description',
        'user_id',
    ];

    protected $casts = [
        'date_time'  => 'datetime',
        'all_day'    => 'boolean',
        'created_at' => 'datetime',
    ];

    public function calendar()
    {
        return $this->belongsTo(AcademicCalendar::class, 'calendar_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
