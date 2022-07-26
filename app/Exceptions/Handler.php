<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Throwable;
use App\Exceptions\CustomException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password' ,
        'password' ,
        'password_confirmation' ,
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register ()
    {
        $this->renderable(function ( NotFoundHttpException $e , $request )
        {
            return response()->json([
                'error' => 'Not Found!' ,
            ] , JsonResponse::HTTP_NOT_FOUND);
        });

        $this->renderable(function ( NodataException $e , $request )
        {
            return response()->json([
                'error' => 'There is no data!' ,
            ] , JsonResponse::HTTP_NOT_FOUND);
        });

        $this->renderable(function ( IncorrectAuthorException $e , $request )
        {
            return response()->json([
                'error' => 'author_id is incorrect!' ,
            ] , JsonResponse::HTTP_NOT_FOUND);
        });
    }
}
