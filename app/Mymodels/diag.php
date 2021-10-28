<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class diag extends Model
{
    public function medicalrecord()
    {
        return $this->hasMany('App\Mymodels\medicalrecord');
    }

    public function room()
    {
        return $this->belongsTo('App\Mymodels\room');
    }
}
