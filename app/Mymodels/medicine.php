<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    public function medicinerecord()
    {
        return $this->hasMany('App\Mymodels\medicinerecord');
    }
}
