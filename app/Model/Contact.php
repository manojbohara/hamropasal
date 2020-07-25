<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    'contact_slog','address','phone','mobile','primary_email','sec_email','latitude','longitude'	
    ]; 
}
