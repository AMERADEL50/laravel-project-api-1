<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReactionType extends BaseModel
{
    use HasFactory, SoftDeletes;

    function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
}
