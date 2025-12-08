<?php

// Author: Aulia Salma Anjani (5026231063) & // Author: Hafizhan Yusra Sulistyo (5026231060)

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicCalendar extends Model
{
    protected $table = 'academic_calendars';
    protected $primaryKey = 'calendar_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'department',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function events()
    {
        return $this->hasMany(CalendarEvent::class, 'calendar_id');
    }
}
