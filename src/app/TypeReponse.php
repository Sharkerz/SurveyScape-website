<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeReponse extends Model
{
    protected $fillable = [
        'name'
    ];

    public function reponse()
    {
        return $this->belongsTo('App\TypeReponse');
    }
}
