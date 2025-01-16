<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Login
     * 
     * @unauthenticated
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!auth()->attempt($credentials)) {
            return response(['message' => 'Email or password is incorrect'], 401);
        }
        return response([
            'token' => auth()->user()->createToken('authToken')->plainTextToken
        ]);
    }
}
