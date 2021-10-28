<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    public function head()
    {
        return $this->belongsTo('App\Mymodels\head');
    }

    public function patient()
    {
        return $this->hasOne('App\Mymodels\patient');
    }

    public function medicalrecord()
    {
        return $this->hasMany('App\Mymodels\medicalrecord');
    }
    
    public function momcard()
    {
        return $this->hasMany('App\Mymodels\momcard');
    }

    public function vitalsign()
    {
        return $this->hasOne('App\Mymodels\vitalsign');
    }
}
