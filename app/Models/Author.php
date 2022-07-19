<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    protected $hidden = [ 'id' , 'password' ];

    protected $fillable = [
        'first_name' ,
        'last_name' ,
        'email' ,
        'password' ,
        'avatar' ,
    ];

    public function books ()
    {
        return $this->hasMany(Book::class);
    }


}
