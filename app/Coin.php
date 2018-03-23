<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    public function algorithm()
    {
        return $this->belongsTo('App\Algorithm');
    }
}
