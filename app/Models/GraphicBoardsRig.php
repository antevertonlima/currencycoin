<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GraphicsCard;
use App\Models\Rig;

class GraphicBoardsRig extends Model
{
    protected $fillable = [
    	'amount',
        'rig_id',
        'graphics_card_id'
    ];

    public function rig()
    {
        return $this->belongsTo(Rig::class);
    }

    public function graphicsCard()
    {
        return $this->belongsTo(GraphicsCard::class);
    }
}
