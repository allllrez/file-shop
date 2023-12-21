<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {


        $user = User::create([
            'name' =>$request->validated('name'),
            'email' => $request->validated('email'),
            'password' => bcrypt($request->validated('password'),),
        ]);


        $token = $user->createToken('user-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];


        return response()->json($response, 201);
    }
}
