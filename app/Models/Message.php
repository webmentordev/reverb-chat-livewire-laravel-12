<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message',
        'image',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
