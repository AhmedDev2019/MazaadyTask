<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            'status' => 1,
            'message' => 'Account Registered Successfully'
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = auth()->guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = auth()->guard('api')->user();
        
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);

        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        // if( !auth()->guard('api')->attempt(['email' => $request->email,'password' => $request->password]) ){
        //     return response()->json([
        //         'status' => 0,
        //         'message' => 'Email or password incorrect ! please try again'
        //     ]);
        // }

        // return response()->json([
        //     'status' => 1,
        //     'message' => 'You Logged In Successfully',
        //     'token_type' => 'bearer',
        //     'expires_in' => auth()->guard('api')->factory()->getTTL() * 60
        // ]);
    }
}
