<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amis extends Model
{
    protected $fillable = [
        'user1', 'user2', 'pending'
    ];
}
