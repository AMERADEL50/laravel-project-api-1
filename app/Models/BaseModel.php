<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    function scopeSort($query, $field, $order)
    {

        return $query->orderBy($field, $order);
    }
}
