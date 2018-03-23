<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Algorithm extends Model
{
    public function coins()
    {
        return $this->hasMany('App\Coin');
    }
}
