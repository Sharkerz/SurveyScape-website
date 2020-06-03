<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionChoixMultiple extends Model
{
    protected $fillable = [
        'questions_id', 'name'
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

}
