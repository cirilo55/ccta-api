<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use function Laravel\Prompts\error;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'message' => 'Logged in successfully',
                'token' => $token,
            ]);
        }

        return response()->json([
            'message' => 'Invalid email or password',
        ], 401);
    }
    public function logout()
    {
        try {
            $token = JWTAuth::getToken();

            if (!$token) {
                return response()->json(['message' => 'Not logged in'], 200);
            }

            try {
                JWTAuth::decode($token);
            } catch (JWTException $e) {
                return response()->json(['message' => 'Not logged in'], 200);
            }

            JWTAuth::invalidate($token);
            return response()->json(['message' => 'Logged out successfully'], 200);
        } catch (JWTException $e) {
            return response()->json(['message' => 'Failed to logout, please try again'], 500);
        }
    }
    public function getToken()
    {
        return response()->json([
            'token' => JWTAuth::getToken(),
        ]);
    }
    public function isLoged()
    {
        return response()->json([
            'isLoged' => JWTAuth::get()->authenticate() ? true : false,
        ]);
    }
}
