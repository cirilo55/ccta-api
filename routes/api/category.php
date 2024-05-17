<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
});
