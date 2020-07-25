<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = "order_product";

    protected $fillable = [
    	'order_id','product_id','quantity'
    ];


    public function products()
    {
        return $this->belongsTo('App\Model\Product','product_id');
    }

    public function orders()
    {
        return $this->belongsTo('App\Model\Order','order_id');
    }
}
