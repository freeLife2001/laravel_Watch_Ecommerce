<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBill extends Model
{
    protected $table = 'product_bill';
    protected $fillable = [
        'bill_id','product_id','total','value'
    ];
}
