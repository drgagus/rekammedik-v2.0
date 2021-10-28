<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class labrecord extends Model
{
    public function medicalrecord()
    {
        return $this->belongsTo('App\Mymodels\medicalrecord');
    }

    public function lab()
    {
        return $this->belongsTo('App\Mymodels\lab');
    }

    public function user()
    {
        return $this->belongsTo('App\Mymodels\user');
    }
}
