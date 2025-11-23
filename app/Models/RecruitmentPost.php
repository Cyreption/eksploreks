<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecruitmentPost extends Model
{
    use HasFactory;

    protected $table = 'recruitment_posts'; // nama tabel persis di ERD

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'organization',
        'location',
        'application_link',
        'deadline',
        'file_link',
    ];

    // Relasi ke User (yang posting)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Optional: cast deadline jadi date
    protected $casts = [
        'deadline' => 'date',
    ];
}