<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
class Product extends Model
{
    use SearchableTrait;

        protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.product_name' => 10,
            'products.discount_price' => 5,
            'products.detail' => 5,
            'products.description' => 5,
        ],
    ];

    protected $fillable = [

     	'product_name','slug','quantity','original_price','discount_price','image','detail','description','meta_title','meta_keyword','meta_description','status','category_id','subcategory_id','hotdeal','expire_date','special','onsale'
     ];

    public function categories()
    {
        return $this->belongsTo('App\Model\Category','category_id');
    }

    public function subcategories()
    {
        return $this->belongsTo('App\Model\Subcategory','subcategory_id');
    }

    public function produtsize()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function produtcolor()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function getTotal()
    {
        return $this->items->sum(function ($detail) {
            return $detail->discount_price * $detail->quantity;
        });
    }

    public function wishlist()
    {
        return $this->hasMany(WishList::class);
    }
}
