<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Algorithm extends Model
{
    public function coins()
    {
        return $this->hasMany('App\Models\Coin');
    }
}
