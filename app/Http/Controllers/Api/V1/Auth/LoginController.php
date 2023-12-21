<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {


        $user = User::where('email' , $request->validated('email'))->first();

        if(!Auth::attempt($request->only('email', 'password'))) response()->json('اطلاعات اشتباه می باشد.' );

        $user->tokens()->delete();
        $token =  $user->createToken('user-token' ,['server:update'])->plainTextToken;


        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json('user logged out' );
    }
}
