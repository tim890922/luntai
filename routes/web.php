<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/',
    function () {
        return view('layout.app');
    }
);

Route::resource('product',ProductController::class);




