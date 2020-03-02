<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'rubrique_id', 'name'
    ];

    public function rubrique()
    {
        return $this->belongsTo('App\Rubrique');
    }

    public function TypeReponse()
    {
        return $this->belongsTo('App\TypeReponse');
    }
}
