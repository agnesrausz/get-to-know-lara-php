<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request) {

        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user =User::create([
            "name" => $fields['name'],
            "email" => $fields['email'],
            "password" => bcrypt($fields['password'])
        ]);

        /*
        $user = new User();
        $user->name = $fields['name'];
        ... stb stb többi property megadása
        $user->save();
        */

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            "user"  => $user,
            "token" => $token
        ];

        return response($response,201);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'logged out'
        ],200);
    }
}
