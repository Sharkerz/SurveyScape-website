<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubrique extends Model
{
    protected $fillable = [
        'name', 'formulaire_id'
    ];

    public function formulaire()
    {
        return $this->belongsTo('App\Formulaire');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
