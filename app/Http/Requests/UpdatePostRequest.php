<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        // IF the user own the post

        $post_user_id = $request->post->user_id;

        $auth_user_id = Auth::user()->id;

        // dd([$post_user_id, $auth_user_id]);

        if ($post_user_id  == $auth_user_id) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'min:10|max:30',
            'body' => 'min:100|max:500',
        ];
    }
}
