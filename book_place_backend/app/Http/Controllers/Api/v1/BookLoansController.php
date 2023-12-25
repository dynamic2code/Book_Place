<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\StoreBookLoansRequest;
use App\Http\Requests\UpdateBookLoansRequest;
use App\Models\BookLoans;
use App\Http\Controllers\Controller;

class BookLoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookLoans::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookLoans  $bookLoans
     * @return \Illuminate\Http\Response
     */
    public function show(BookLoans $bookLoans)
    {
        return $bookLoans;
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
        //
    }
}
