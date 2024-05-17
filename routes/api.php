<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return 'Bem vindo a API de produtos!';
});

include 'api/auth.php';
include 'api/user.php';

Route::middleware('auth:api')->group(function () {
    include 'api/category.php';
    include 'api/product.php';
});


Route::fallback(function () {
    return response()->json(['message' => 'Page do not exist'], 404);
});


/**
Você pode usar o
metodo auth()->attempt($credentials) para autenticar
método auth()->user() para obter o usuário autenticado.
Use auth()->logout() para invalidar o token
 */
