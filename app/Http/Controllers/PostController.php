<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $this->authorize('index', Post::class);

        return Post::with('post_status')
        ->with('user')
        // ->sort('title', 'asc')->get();
        ->sort('created_at', 'desc')->get();

    }

    public function pending()
    {
        $this->authorize('pending', Post::class);

        $pending = Post::with('post_status')
            ->with('user')
            ->where('type', '=', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return $pending;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        // return array of validated-only data
        $data = $request->validated();

        // $errors = [];
        // if (!isset($request->title)) {
        //     $errors['title'] = ['required' => 'The title field is required'];
        // }

        // if (strlen($request->title) < 30) {
        //     $errors['title'] = ['length' => 'Title lingth is too short'];
        // }

        // return $errors;

        // var_dump($request);
        // Get all request data as associative array
        // $data = $request->all();


        return Post::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        $this->authorize('show', $post);
        // return Auth::user();

        // $post = Post::with([
        //     'user',
        //     'post_status',
        //     'comments.user',
        //     'reactions.user',
        //     'reactions.reaction_type'
        // ])
        //     ->where('id', '=', $post_id)
        //     ->first();

        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();

        return $post->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        return $post->delete();
    }

    public function deleted()
    {
        return Post::onlyTrashed()->get();
    }

    public function restore($post_id)
    {
        return POST::onlyTrashed()->where('id', $post_id)->restore();
    }

    public function approve(Request $request, Post $post)
    {

        // return $request;

        // $updated =  Post::where('id', $post->id)->update([
        //     'title' => 'New Title 6',
        //     'approved' => 1
        // ]);

        // if ($updated) {

        //     $post =    Post::where('id', $post->id)->first();

        //     return $post;
        // }

        $post->approved = 1;

        $post->comment = $request->comment;

        $post->save();

        return $post;
    }
}
