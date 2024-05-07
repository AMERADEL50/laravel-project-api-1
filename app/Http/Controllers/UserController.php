<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::with('posts.comments')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Return this user
        // return $user;

        // Return all admins
        // return User::where('role', '=', 'admin')->get();

        // return first admin
        // return User::where('role', '=', 'admin')->first();

        // return current user in an array of one object
        // return User::where('id', '=', $user->id)->get();

        // return current user as object
        // return User::where('id', '=', $user->id)->first();

        // return the user and all related posts
        // return User::with('posts')
        //     ->where('id', $user->id)
        //     ->first();

        // return the user and all related posts with comments on each post
        return User::with('posts.comments')
            ->where('id', $user->id)
            ->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
