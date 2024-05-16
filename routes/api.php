<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return 'Bem vindo a API de produtos!';
});

include 'api/user.php';
include 'api/category.php';
include 'api/product.php';

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/isLoged', function () {
} )->name('isLoged');

Route::middleware('auth:sanctum')->get('/user', function () {
    try{
    return auth()->user();

    }catch(\Exception $e){
        return response()->json(['message' => $e->getMessage()], 401);
    }
})->name('user');

Route::fallback(function () {
    return 'Pagina de Fallback';
});
