<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BookCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray ( $request )
    {
        return [
            'data' => $this->collection->map(function ( $item )
            {
                return
                    [
                        'book_name'       => $item->book_name ,
                        'author_name'     => $item->author_full_name ,
                        'number_of_pages' => $item->number_of_pages ,
                        'publisher'       => $item->publisher ,
                        'created_at'      => $item->created_at ,
                    ];
            }) ,
        ];
    }
}
