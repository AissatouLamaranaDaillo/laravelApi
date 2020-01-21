<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'adress' => 'required|string',
            'tel' => 'required|string'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->adresse = $request->adress;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
    //
}
