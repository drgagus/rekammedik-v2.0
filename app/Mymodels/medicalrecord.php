<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class medicalrecord extends Model
{
    public function room()
    {
        return $this->belongsTo('App\Mymodels\room');
    }

    public function diag()
    {
        return $this->belongsTo('App\Mymodels\diag');
    }

    public function member()
    {
        return $this->belongsTo('App\Mymodels\member');
    }

    public function user()
    {
        return $this->belongsTo('App\Mymodels\user');
    }

    public function medicinerecord()
    {
        return $this->hasMany('App\Mymodels\medicinerecord');
    }

    public function labrecord()
    {
        return $this->hasMany('App\Mymodels\labrecord');
    }
}
