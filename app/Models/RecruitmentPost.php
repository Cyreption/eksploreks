<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecruitmentPost extends Model
{
    protected $table = 'recruitment_posts';
    protected $primaryKey = 'recruitment_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

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

    protected $casts = [
        'deadline'   => 'date',
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
