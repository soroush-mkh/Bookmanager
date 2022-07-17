<?php

namespace App\Http\Requests;

use App\Models\Author;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthorRequest extends FormRequest
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
            'first_name' => 'required|min:2|max:50|string' ,
            'last_name'  => 'required|min:2|max:50|string' ,
            'email'      => [ 'required' , 'string' , 'email' , Rule::unique('authors')->ignore($this->route('author.id')) ] ,
            'password'   => 'required' ,
            'avatar'     => 'nullable|image|mimes:png,jpg,jpeg,gif',
        ];
    }
}
