<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookLoansRequest extends FormRequest
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
            'user_id'=>['required'],
            'book_id'=>['required'],
            'loan_date'=>['required'],
            'due_date'=>['required'],
        ];
    }
    function prepareForValidation()
    {
        $this->merge([
            'userId' => $this->user_id,
            'bookId' => $this->book_id,
            'loanDate' => $this->loan_date,
            'dueDate' => $this->due_date,
        ]);
    }
}
