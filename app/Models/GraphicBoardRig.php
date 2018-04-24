<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraphicBoardRig extends Model
{
    protected $fillable = [
    	'amount',
        'rig_id',
        'graphics_card_id'
    ];

    public function rigs()
    {
        return $this->belongsTo('App\Models\Rig');
    }

    public function cards()
    {
        return $this->belongsTo('App\Models\GraphicsCard');
    }
}
