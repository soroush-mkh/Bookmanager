<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    protected $hidden = [ 'id' ];

    protected $fillable = [
        'first_name' ,
        'last_name' ,
        'email' ,
        'password' ,
        'avatar' ,
    ];
}
