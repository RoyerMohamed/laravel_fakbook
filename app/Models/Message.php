<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
