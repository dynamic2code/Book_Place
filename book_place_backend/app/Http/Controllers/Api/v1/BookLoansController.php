<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\v1\StoreBookLoansRequest;
use App\Http\Requests\v1\UpdateBookLoansRequest;
use App\Models\BookLoans;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BookLoanResource;
use Illuminate\Http\Response;

class BookLoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookLoanResource::collection(BookLoans::all());
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
     * @param  \App\Http\Requests\StoreBookLoansRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookLoansRequest $request)
    {
        return new BookLoanResource(BookLoans::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookLoans  $bookLoans
     * @return \Illuminate\Http\Response
     */
    public function show(BookLoans $bookLoans)
    {
        return new BookLoanResource($bookLoans);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookLoans  $bookLoans
     * @return \Illuminate\Http\Response
     */
    public function edit(BookLoans $bookLoans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookLoansRequest  $request
     * @param  \App\Models\BookLoans  $bookLoans
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookLoansRequest $request, BookLoans $bookLoans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookLoans  $bookLoans
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookLoans $bookLoans)
    {
        try {
            // Delete the book
            $bookLoans->delete();
    
            // Optionally, you can return a success response
            return response()->json(['message' => 'Book deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during deletion
            return response()->json(['error' => 'Failed to delete the book'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
