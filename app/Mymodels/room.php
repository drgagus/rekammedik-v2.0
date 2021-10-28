<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    public function patient()
    {
        return $this->hasMany('App\Mymodels\patient');
    }

    public function medicalrecord()
    {
        return $this->hasMany('App\Mymodels\medicalrecord');
    }
    
    public function diag()
    {
        return $this->hasMany('App\Mymodels\diag');
    }
}
