<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class typeoflab extends Model
{
    public function lab()
    {
        return $this->hasMany('App\Mymodels\lab');
    }
}
