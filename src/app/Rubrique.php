<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubrique extends Model
{
    protected $fillable = [
        'name', 'formulaire_id'
    ];

    public function Formulaire()
    {
        return $this->belongsTo('App\Formulaire');
    }
}
