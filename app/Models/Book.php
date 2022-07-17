<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    protected $hidden = [ 'id' , 'author_id' , 'author' ];

    protected $appends = [ 'author_full_name' ];


    protected $fillable = [
        'author_id' ,
        'book_name' ,
        'number_of_pages' ,
        'publisher' ,
    ];

    public function author ()
    {
        return $this->belongsTo(Author::class);
    }

    public function getAuthorFullNameAttribute ()
    {
        return $this->author->first_name . ' ' . $this->author->last_name;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('M,d,Y h:i:s');
    }
}
