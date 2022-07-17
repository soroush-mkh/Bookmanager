<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $authors = Author::with('books')->get();

        if ( count($authors) )
            return response()->json([
                'status'  => TRUE ,
                'data'    => $authors ,
                'message' => 'All Books data returned successfully' ,
            ] , JsonResponse::HTTP_OK);
        else
            return response()->json([
                'status'  => FALSE ,
                'message' => 'There is no any books!' ,
            ] , JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store ( AuthorRequest $request )
    {
        //Create Author
        $author = new Author;

        $author->first_name = $request->first_name;
        $author->last_name  = $request->last_name;
        $author->email      = $request->email;
        $author->password   = Hash::make($request->password);


        //Save Data
        $author->save();

        // Send Response
        return response()->json([
            'status'  => TRUE ,
            'message' => 'Author Created Successfully' ,
        ] , JsonResponse::HTTP_OK);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function show ( Author $author )
    {
        //Return Data
        return response()->json([
            'data' => $author ,
        ] , JsonResponse::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Author       $author
     * @return \Illuminate\Http\Response
     */
    public function update ( AuthorRequest $request , Author $author )
    {
        //Update Author
        $author->update([
            'first_name' => $request->first_name ,
            'last_name'  => $request->last_name ,
            'email'      => $request->email ,
            'password'   => Hash::make($request->password) ,

        ]);

        // Send Response
        return response()->json([
            'status'  => TRUE ,
            'message' => 'Author Updated Successfully' ,
        ] , JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function destroy ( Author $author )
    {
        //Delete Author
        $author->delete();

        // Send Response
        return response()->json([
            'status'  => TRUE ,
            'message' => 'Author Deleted Successfully' ,
        ] , JsonResponse::HTTP_OK);
    }
}
