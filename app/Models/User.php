<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'remember_token',
        // 'email_verified_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'date',
        'password' => 'hashed',
    ];


    // Casts
    function roles(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => explode('|', $value)
        );
    }


    // Relations

    function posts()
    {
        // $this means the single user
        return $this->hasMany(Post::class);
    }

    function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    function comments()
    {
        return $this->hasMany(Comment::class);
    }

    function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
