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

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('placeholder-recruitment.jpg');
    }
}
