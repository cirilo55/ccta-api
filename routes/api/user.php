<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store'])->middleware('');
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);

    Route::get('/products/{id}', [UserController::class, 'getProductsByUser']);
});
