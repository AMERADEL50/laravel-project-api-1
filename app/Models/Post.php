<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
        'comment',
        'approved'
    ];



    // protected $fillable  = [
    //     'title',
    //     'body',
    //     'user_id',
    //     'post_status_id',
    // ];

    protected $hidden = [
        // 'created_at',
        'updated_at',
        'deleted_at',
    ];



    // Ref
    // https://laravel.com/docs/10.x/eloquent-mutators#cast-parameters
    protected $casts = [
        'created_at' => 'date: d M Y',
        'approved' => 'bool',
    ];

    // Create a cast that return the title always UPPERCASE
    function title(): Attribute
    {
        return Attribute::make(
            get: fn ($v) => strtoupper($v)
        );
    }
    // Create a cast that return the title always UPPERCASE
    function body(): Attribute
    {
        return Attribute::make(
            get: fn ($v) => substr($v, 0, 20) . '...'
        );
    }


    function comments()
    {
        return $this->hasMany(Comment::class);
    }

    function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function post_status()
    {
        return $this->belongsTo(PostStatus::class);
    }

    // Scopes
    // This funciton will be used in all models,
    // So, we moved it to the BaseModel which became the parent of all models in this folder
    // Check the extends in the top

    // function scopeSort($query, $field, $order)
    // {

    //     return $query->orderBy($field, $order);
    // }
}
