<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'name'=> $this-> name,
            'description' => $this -> description ,
            'category'=> $this-> category,
            'subCategory'=> $this-> sub_category,
            'publisher'=> $this->publisher,
            'description'=> $this -> description ,
            'pages'=> $this->pages,
            'image'=> $this->image

        ];
    }
}
