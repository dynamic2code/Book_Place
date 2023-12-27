<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class BookLoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'bookId'=>$this->book_id,
            'userId'=>$this->user_id,
            'loanDate'=>$this->loan_date,
            'dueDate'=>$this->due_date,
            'status'=>$this->status,
            'penalty'=>$this->penalty_amount,
            'penaltyStatus'=> $this->penalty_status
        ];
    }
}
