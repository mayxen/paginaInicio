<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trabajo extends Model
{
    protected $guarded = ['id'];


    public function recursos()
    {
        return $this->hasMany('App\recurso');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
