<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulaire extends Model
{
    protected $fillable = [
        'name', 'user_id', 'close_on', 'open_on'
    ];

    public function rubriques()
    {
        return $this->hasMany('App\Rubrique');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
