<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';
    protected $fillable = [
        'name', 'total','price','user_info','product_list'
    ];
}
