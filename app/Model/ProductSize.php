<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable  = [
    	'product_id','size_id'
    ];

     public function products()
    {
        return $this->belongsTo('App\Model\Product','product_id');
    }

    public function sizes()
    {
        return $this->belongsTo('App\Model\Size','size_id');
    }
}
