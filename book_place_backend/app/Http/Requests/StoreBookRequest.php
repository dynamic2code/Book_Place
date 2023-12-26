<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'publisher' => ['required'],
            'isbn' => ['required'],
            'category' => ['required'],
            'sub_category' => ['required'],
            'description' => ['required'],
            'pages' => ['required'],
            'image' => ['required'],
        ];
    }
}
