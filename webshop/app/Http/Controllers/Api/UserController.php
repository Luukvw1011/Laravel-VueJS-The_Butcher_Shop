<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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


        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return $response;
    }
}
