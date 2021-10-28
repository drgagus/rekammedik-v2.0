<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class village extends Model
{
    public function head()
    {
        return $this->hasMany('App\Mymodels\head');
    }
}
