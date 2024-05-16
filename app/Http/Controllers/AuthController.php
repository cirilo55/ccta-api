<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        var_dump(Auth::attempt($credentials));die();

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return response()->json([
                'message' => 'Logged in successfully',
            ]);
        }

        return response()->json([
            'message' => 'Invalid email or password',
        ], 401);
    }
}
