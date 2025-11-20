<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $table = 'chat_rooms';
    protected $primaryKey = 'chat_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'chat_id');
    }
}
