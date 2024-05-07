<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends BaseModel
{
    use HasFactory, SoftDeletes;

    function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
