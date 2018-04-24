<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraphicsCard extends Model
{
    protected $fillable = [
        'name',
        'consumption',
        'description',        
        'graphic_serie_id'
    ];

    public function graphicSerie()
    {
        return $this->belongsTo('App\Models\GraphicSerie');
    }

    public function hashrash()
    {
        return $this->hasMany('App\Models\HashrateGraphic');
    }

    public function boards()
    {
        return $this->hasMany('App\Models\GraphicBoardRig');
    }
}
