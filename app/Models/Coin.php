<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $fillable = [
    	'name',
    	'abbreviation',
        'description',
        'algorithm_id'
    ];

    public function algorithm()
    {
        return $this->belongsTo('App\Models\Algorithm');
    }
}
