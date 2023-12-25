<?php

namespace App\Http\Controllers\Api\v1;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
class AdminController extends Controller
{
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    
    //     // Check if the user exists
    //     $user = Admin::where('email', $credentials['email'])->first();
    
    //     if ($user && Hash::check($credentials['password'], $user->password)) {
    //         // User exists and password matches
    //         $token = $user->createToken('authToken')->accessToken;
    
    //         return response()->json(['token' => $token, 'user' => $user], 200);
    //     } else {
    //         // User does not exist or password is incorrect
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    // }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $user = Auth::admin();
            $token = $user->createToken('authToken')->accessToken;
    
            return response()->json(['token' => $token, 'user' => $user], 200);
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Admin::all();
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
    public function store(StoreAdminRequest $request)
    {
        try {
            $admin = Admin::create($request->all());

            return response()->json(['message' => 'Admin created successfully', 'data' => $admin], 201);
        } catch (\Exception $e) {
            Log::error('Failed to create admin. Error: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to create admin', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return $admin;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
