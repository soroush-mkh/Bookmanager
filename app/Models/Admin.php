<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory , HasApiTokens;

    public $timestamps = FALSE;

    protected $fillable = [
        'email' ,
        'password' ,
    ];

    protected $hidden = [
        'password' ,
        'remember_token',
    ];
}
