<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class lab extends Model
{
    public function labrecord()
    {
        return $this->hasMany('App\Mymodels\labrecord');
    }

    public function typeoflab()
    {
        return $this->belongsTo('App\Mymodels\typeoflab');
    }
}
