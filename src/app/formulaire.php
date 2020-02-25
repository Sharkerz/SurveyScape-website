<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class formulaire extends Model
{
    protected $fillable = [
        'name', 'user_id', 'close_on', 'open_onn'
    ];

    public function rubriques()
    {
        return $this->hasMany('App\Rubrique');
    }
}
