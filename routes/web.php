<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ProductController;

Route::get('/',
    function () {
        return view('welcome');
    }
);

Route::get('/product', [ProductController::class,'index']);
// Route::get('/home',
//     function () {
//         return view('home',['name'=>'tim']);
//     }
// );
// Route::get('/home/{name}',
//     function ($name) {
//         return view('home',['name'=>$name]);
//     }
// );

Route::prefix('/home')->group(function(){
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/{name}', function ($name) {
        return view('home',['name'=>$name]);
    });
    Route::get('/', function () {
        return view('home');
    });


});

Route::redirect('/here', '/home');


