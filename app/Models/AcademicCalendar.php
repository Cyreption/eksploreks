<?php

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
