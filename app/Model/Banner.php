<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	protected $table = 'banners';
    protected $fillable = [
     'title','image','category_id','subcategory_id','url','status'	

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
