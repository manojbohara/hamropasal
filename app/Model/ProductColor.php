<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $fillable  = [
    	'product_id','color_id'
    ];

     public function products()
    {
        return $this->belongsTo('App\Model\Product','product_id');
    }

    public function colors()
    {
        return $this->belongsTo('App\Model\Color','color_id');
    }
}
