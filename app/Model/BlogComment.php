<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $fillable = [
    	'user_id','blog_id','name','email','message'
    ];


    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
