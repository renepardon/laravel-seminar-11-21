<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            $token = auth()->user()->createToken('MyLoginToken')->accessToken;
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['Unauthorized.', Response::HTTP_UNAUTHORIZED]);
        }
    }
}
