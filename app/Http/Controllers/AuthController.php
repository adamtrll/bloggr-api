<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        return response()->json([
            'token' => $request->authenticate(),
        ]);
    }
}
