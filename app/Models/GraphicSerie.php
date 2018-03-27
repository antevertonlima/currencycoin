<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraphicSerie extends Model
{
    protected $fillable = [
    	'name',
        'description',
        'graphic_type_id'
    ];

    public function graphicType()
    {
        return $this->belongsTo('App\Models\GraphicType');
    }

    public function graphicsCard()
    {
        return $this->hasMany('App\Models\GraphicsCards');
    }
}
