<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiAuth extends Controller
{
    public function Login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if ($validator->fails()) {
            return new ApiResource(422, false, $validator->errors(), null);
        }
        $validatedData = $validator->validated();
        if (Auth::attempt($validatedData)) {
            $user = User::where('email', $validatedData['email'])->first();
            $token = $user->createToken("token")->plainTextToken;
            return new ApiResource(200, true, "Login Sucess", $token);
        }
        else
        {            
            return new ApiResource(401, false, "Login Gagal", null);
        }
    }
}
