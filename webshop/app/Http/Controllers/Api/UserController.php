<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;   

class UserController extends Controller
{
    public function register (Request $request) {
        try {
            $fields = $request->validate([
                'full_name' => 'required|string',
                'email' => 'required|string',
                'password' => 'required|string',
            ]);
        } catch (\Throwable $th) {
            return 'error';
        }

        $user = User::create([
            'full_name' => $fields['full_name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
        ]);

        $response = [
            'user' => $user,
        ];

        return $response;
    }

    public function login (Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return response('Logged in', 200);
        }
 
        return response('Wrong credentials', 401);
    }

    public function logout (Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return response('User logged out', 200);
    }
}
