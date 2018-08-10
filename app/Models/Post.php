<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = [
        'name', 'summary','user_id','body','avatar'
    ];
}
