<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
    'category_id','name','slug','description',

    ];

    public function categories()
    {
        return $this->belongsTo('App\Model\Category','category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
