<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecruitmentPost extends Model
{
    use HasFactory;

    protected $table = 'recruitment_posts';
    protected $primaryKey = 'recruitment_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'organization',
        'location',
        'application_link',
        'deadline',
        'file_link',
        'image',
    ];

    protected $casts = [
        'deadline' => 'date',
    ];

    // Override route key name untuk Laravel implicit routing
    public function getRouteKeyName()
    {
        return 'recruitment_id';
    }

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        return $this->image ? asset($this->image) : asset('images/placeholder-recruitment.jpg');
    }
}
