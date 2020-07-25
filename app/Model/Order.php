<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
    	'user_id','name','phone','email','location','address','billing_discount','billing_discount_code','billing_subtotal','billing_total','shipped','product_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function products()
    {
    	return $this->belongsToMany('App\Model\Product')->withPivot('quantity');
    }

    public function orderproduct()
    {
        return $this->hasMany(OrderProduct::class);
    }

}
