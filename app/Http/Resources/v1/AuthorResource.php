<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
            'author_informations' => [
                'first_name' => $this->first_name ,
                'last_name'  => $this->last_name ,
                'email'      => $this->email ,
                'avatar'     => $this->avatar ,
            ] ,
        ];
    }
}
