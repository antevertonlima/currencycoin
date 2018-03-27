<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraphicType extends Model
{
    protected $fillable = [
    	'name',
        'description',
        'brand_id'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function graphicSerie()
    {
        return $this->hasMany('App\Models\GraphicSerie');
    }
}
