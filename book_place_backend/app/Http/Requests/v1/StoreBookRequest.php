<?php

namespace App\Http\Requests\v1;

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
        return true;
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
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'added_by'=>['required']
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'Please upload an image.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image must not be larger than 2MB.',
        ];
    }
    function prepareForValidation()
    {
        $this->merge([
            'subCategory' => $this->sub_category,
            'addedBy' => $this->added_by,
        ]);
    }
}
