<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function user_login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $user_token = $user->createToken ('user_token', ['create','update','delete']);
            return response()->json([
                'user' => $user,
                'access_token' => $user_token->plainTextToken
            ], 200);
        }

        return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
    }

    public function admin_login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            $admin_token = $admin->createToken ('user_token', ['create','update','delete']);
            return response()->json([
                'user' => $admin,
                'access_token' => $admin_token->plainTextToken
            ], 200);
        }

        return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
    }
}
