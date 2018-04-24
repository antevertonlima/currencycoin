<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiningGroup extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function rigs()
    {
        return $this->hasMany('App\Models\Rig');
    }
}
