<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class momcard extends Model
{
    public function member()
    {
        return $this->belongsTo('App\Mymodels\member');
    }
}
