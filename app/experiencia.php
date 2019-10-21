<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class experiencia extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
