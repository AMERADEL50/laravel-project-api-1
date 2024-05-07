<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostStatus extends BaseModel
{
    use HasFactory, SoftDeletes;

    function posts () {
        return $this->hasMany(Post::class);
    }

}
