<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    public function member()
    {
        return $this->belongsTo('App\Mymodels\member');
    }

    public function room()
    {
        return $this->belongsTo('App\Mymodels\room');
    }
}
