<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AuthorCollection extends ResourceCollection
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
                        'first_name'   => $item->first_name ,
                        'last_name'    => $item->last_name ,
                        'email'        => $item->email ,
                        'avatar'       => $item->avatar ,
                        'author_books' => new BookCollection($item->books),
                    ];
            }) ,
        ];
    }
}
