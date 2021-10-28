<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class medicinerecord extends Model
{
    public function medicalrecord()
    {
        return $this->belongsTo('App\Mymodels\medicalrecord');
    }

    public function medicine()
    {
        return $this->belongsTo('App\Mymodels\medicine');
    }

    public function user()
    {
        return $this->belongsTo('App\Mymodels\user');
    }
}
