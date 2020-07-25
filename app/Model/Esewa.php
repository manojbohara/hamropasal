<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Esewa extends Model
{
    protected $table = 'esewa';
    protected $fillable = ['amt','txAmt','pdc','psc','tAmt','pid','scd','transactionDate','pay_status'];
}
