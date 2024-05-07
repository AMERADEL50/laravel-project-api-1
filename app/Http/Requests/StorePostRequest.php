<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:10|max:120',
            'body' => 'required',
            'user_id' => 'required|exists:users,id',
            'post_status_id' => ['required', 'exists:post_statuses,id'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'You must type the post title',
            'title.min' => 'اكتب تايتل عدل اكتر من 10 حروف',
            'user_id.exists' =>"هذا المستخدم غير موجود"
        ];
    }
}
