<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $books = Book::all();

        if ( count($books) )
            return response()->json([
                'status'  => TRUE ,
                'data'    => $books ,
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
    public function store ( Request $request )
    {
        //Create Book
        $book = new Book();

        $book->book_name       = $request->book_name;
        $book->author_id       = $request->author_id;
        $book->number_of_pages = $request->number_of_pages;
        $book->publisher       = $request->publisher;


        //Save Data
        $book->save();

        // Send Response
        return response()->json([
            'status'  => TRUE ,
            'message' => 'Author Created Successfully' ,
        ] , JsonResponse::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show ( Book $book )
    {
        //Return Data
        return response()->json([
            'data' => $book ,
        ] , JsonResponse::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book         $book
     * @return \Illuminate\Http\Response
     */
    public function update ( Request $request , Book $book )
    {
        //Update Author
        $book->update([
            'book_name'       => $request->book_name ,
            'author_id'       => $request->author_id ,
            'number_of_pages' => $request->number_of_pages ,
            'publisher'       => $request->publisher ,
        ]);

        // Send Response
        return response()->json([
            'status'  => TRUE ,
            'message' => 'Book Updated Successfully' ,
        ] , JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy ( Book $book )
    {
        //Delete Author
        $book->delete();

        // Send Response
        return response()->json([
            'status'  => TRUE ,
            'message' => 'Book Deleted Successfully' ,
        ] , JsonResponse::HTTP_OK);
    }
}
