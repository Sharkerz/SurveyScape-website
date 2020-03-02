<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{

    protected $fillable = [
        'name', 'question_id', 'user_id', 'close_on', 'open_on'
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

