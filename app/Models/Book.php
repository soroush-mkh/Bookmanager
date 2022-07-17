<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    protected $fillable = [
        'author_id' ,
        'book_name' ,
        'number_of_pages' ,
        'publisher' ,
    ];
}
