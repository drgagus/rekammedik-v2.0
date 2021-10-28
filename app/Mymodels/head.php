<?php

namespace App\Mymodels;

use Illuminate\Database\Eloquent\Model;

class head extends Model
{
    public function village()
    {
        return $this->belongsTo(village::class);
    }

    public function members()
    {
        return $this->hasMany('App\Mymodels\member');
    }
}
