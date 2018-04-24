<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rig extends Model
{
    protected $fillable = [
        'name',
        'description',
        'mining_group_id',
        'coin_id'
    ];

    public function miningGroup()
    {
        return $this->belongsTo('App\Models\MiningGroup');
    }

    public function coin()
    {
        return $this->belongsTo('App\Models\Coin');
    }

    public function graphicBoards()
    {
        return $this->hasMany('App\Models\GraphicBoardRig');
    }
}
