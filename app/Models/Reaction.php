<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reaction extends BaseModel
{
    use HasFactory, SoftDeletes;

    function post()
    {
        return $this->belongsTo(Post::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function reaction_type()
    {
        return $this->belongsTo(ReactionType::class);
    }
}
