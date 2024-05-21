<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/api');

Route::fallback(function () {
    return redirect('/api');
});
