<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [

     	'title','name','image','category_id','subcategory_id','url'
     ];

    public function categories()
    {
        return $this->belongsTo('App\Model\Category','category_id');
    }

    public function subcategories()
    {
        return $this->belongsTo('App\Model\Subcategory','subcategory_id');
    }
}
