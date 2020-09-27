<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partage_form extends Model
{
    protected $fillable = [
        'formulaire_id', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
