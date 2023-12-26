<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\v1\StoreUserRequest;
use App\Http\Requests\v1\UpdateUserRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\UserResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
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
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        return new UserResource(User::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            // Delete the book
            $user->delete();
    
            // Optionally, you can return a success response
            return response()->json(['message' => 'Book deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during deletion
            return response()->json(['error' => 'Failed to delete the book'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
