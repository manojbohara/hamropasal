<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
    	'name'
    ];

   public function produtsize()
    {
        return $this->hasMany(ProductSize::class);
    }
}
