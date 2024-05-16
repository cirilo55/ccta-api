<?php

namespace App\Exceptions;

use Exception;

class CustomAuthenticationException extends Exception
{
    public function render($request)
    {
        return response()->json(['message' => 'Not Logged in'], 401);
    }
}
