<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthC extends Controller
{
    public function login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $users = User::where('username',$request->username)->first();

        if (! $users || ! Hash::check($request->password, $users->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $users->createToken('user login')->plainTextToken;

    }
}
