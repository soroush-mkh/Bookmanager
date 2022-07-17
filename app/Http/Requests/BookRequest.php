<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize ()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules ()
    {
        return [
            'book_name'       => 'required|min:2|max:120' ,
            'author_id'       => 'required|numeric|exists:authors,id' ,
            'number_of_pages' => 'required|numeric' ,
            'publisher'       => 'required|min:2|max:150' ,
        ];
    }
}
