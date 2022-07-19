<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login ( Request $request )
    {
        $loginData = $request->validate([
            'email'    => 'email|required' ,
            'password' => 'required' ,
        ]);
        if ( !auth()->attempt($loginData) )
        {
            return response()->json([
                'status'  => FALSE ,
                'message' => 'Invalid Credentials' ,
            ] , JsonResponse::HTTP_UNAUTHORIZED);
        }


        $accessToken = auth()->user()->createToken('authToken')->accessToken;


        return response()->json([
            'status'       => TRUE ,
            'user'         => auth()->user() ,
            'access_token' => $accessToken ,
        ] , JsonResponse::HTTP_OK);
    }

    public function logout ( Request $request )
    {
        // get token value
        $token = $request->user()->token();

        // revoke this token value
        $token->revoke();

        return response()->json([
            "status"  => TRUE ,
            "message" => "User logged out successfully" ,
        ]);
    }
}
//->guard('api')
