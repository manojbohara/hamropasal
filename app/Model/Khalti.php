<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Khalti extends Model
{
    protected $fillable = [
        'user_id', 'mobile' ,'amount' , 'pre_token','status','verified_token'
    ];
}
