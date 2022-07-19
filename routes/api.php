<?php

use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\V1\AuthorController;
use App\Http\Controllers\API\V1\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function ()
{
    Route::post('login' , [ AuthController::class , "login" ]);
    Route::group([ 'middleware' => [ 'auth:api' ] ] , function ()
    {
        Route::apiResource('authors' , AuthorController::class);
        Route::apiResource('books' , BookController::class);
        Route::post("logout" , [ AuthController::class , "logout" ]);
    });
});
