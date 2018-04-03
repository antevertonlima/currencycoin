<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HashrateGraphic extends Model
{
    protected $fillable = [
        'state',
        'hashrate',
        'graphics_card_id',
        'coin_id'
    ];

    public function graphicsCard()
    {
        return $this->belongsTo('App\Models\GraphicsCard');
    }

    public function coin()
    {
        return $this->belongsTo('App\Models\Coin');
    }
}
