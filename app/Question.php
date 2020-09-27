<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'formulaire_id', 'name','type_question'
    ];

    public function formulaire()
    {
        return $this->belongsTo('App\Formulaire');
    }

}
