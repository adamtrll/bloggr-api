<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:20|max:250',
            'content' => 'required|string',
            'slug' => ['required', 'string', 'min:3', 'max:100', 'alpha_dash', Rule::unique('posts', 'slug')->ignore($this->post)],
            'topic_id' => ['required', 'exists:topics,id'],
        ];
    }
}
