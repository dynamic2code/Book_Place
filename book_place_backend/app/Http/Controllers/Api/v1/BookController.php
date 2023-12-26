<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\v1\StoreBookRequest;
use App\Http\Requests\v1\UpdateBookRequest;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BookResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookResource::collection(Book::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
            // Validate the request and store the book
        $book = Book::create($request->all());

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $book->update(['image' => Storage::url($imagePath)]);
        }

        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        try {
            // Delete the book
            $book->delete();
    
            // Optionally, you can return a success response
            return response()->json(['message' => 'Book deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during deletion
            return response()->json(['error' => 'Failed to delete the book'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
