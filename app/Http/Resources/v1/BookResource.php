<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray ( $request )
    {
        return [
            'book_informations' => [
                'book_name'       => $this->book_name ,
                'author_name'     => $this->author_full_name ,
                'number_of_pages' => $this->number_of_pages ,
                'publisher'       => $this->publisher ,
                'created_at'      => $this->created_at,
            ],
        ];
    }
}
