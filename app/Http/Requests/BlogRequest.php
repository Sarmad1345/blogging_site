<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'file' => 'image|max:2048',
        ];
    }
}
