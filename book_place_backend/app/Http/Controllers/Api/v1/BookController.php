<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BookResource;

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
        // Validate the request using the StoreBookRequest rules

        // Create a new book instance
        $book = new Book();

        // Assign values from the request to the book instance
        $book->added_by = auth()->user()->id; // Assuming you have authentication set up
        $book->name = $request->input('name');
        $book->publisher = $request->input('publisher');
        $book->isbn = $request->input('isbn');
        $book->category = $request->input('category');
        $book->sub_category = $request->input('sub_category');
        $book->description = $request->input('description');
        $book->pages = $request->input('pages');

        // Handle image upload (assuming you have an 'image' field in the request)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
            $book->image = $imagePath;
        }

        // Save the book to the database
        $book->save();

        // Optionally, you can return a response or redirect
        return response()->json(['message' => 'Book created successfully', 'data' => $book], 201);
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
        //
    }
}
