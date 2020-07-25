<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
    	'color_name','value'	
    ];
    
    public function produtcolor()
    {
        return $this->hasMany(ProductColor::class);
    }

    
}
