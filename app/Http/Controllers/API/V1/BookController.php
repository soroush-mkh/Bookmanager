<?php

namespace App\Http\Controllers\API\V1;

use App\Exceptions\IncorrectAuthorException;
use App\Exceptions\NodataException;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BookCollection;
use App\Http\Resources\v1\BookResource;
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
            return new BookCollection($books);

        else
            throw new NodataException();

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

        if ( Author::find($request->author_id) == NULL )
            throw new IncorrectAuthorException();

        $book->book_name       = $request->book_name;
        $book->author_id       = $request->author_id;
        $book->number_of_pages = $request->number_of_pages;
        $book->publisher       = $request->publisher;


        //Save Data
        $book->save();

        //Return Data
        return new BookResource($book);

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
        return new BookResource($book);

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

        if ( Author::find($request->author_id) == NULL )
            throw new IncorrectAuthorException();

        //Update AuthorResource
        $book->update([
            'book_name'       => $request->book_name ,
            'author_id'       => $request->author_id ,
            'number_of_pages' => $request->number_of_pages ,
            'publisher'       => $request->publisher ,
        ]);

        // Send Response
        return new BookResource($book);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy ( Book $book )
    {
        //Delete AuthorResource
        $book->delete();

        // Send Response
        return new BookResource($book);

    }
}
