<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $fillable = [
        'username', 'name', 'jabatan', 'password',
    ];

    public function medicalrecord()
    {
        return $this->hasMany('App\Mymodels\medicalrecord');
    }

    public function labrecord()
    {
        return $this->hasMany('App\Mymodels\labrecord');
    }

    public function medicinerecord()
    {
        return $this->hasMany('App\Mymodels\medicinerecord');
    }
}
