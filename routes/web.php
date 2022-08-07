<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get(
    '/',
    function () {
        return view('layout.app', ['title' => 'title', 'header' => 'header']);
    }
);
Route::redirect('/admin', 'admin/order');
Route::prefix('admin')->group(function () {
    Route::get(
        '/product',
        function () {
            return view('layout.app', ['title' => '料號清單', 'header' => '料號']);
        }
    );
    Route::get(
        '/order',
        function () {
            return view('layout.app', ['title' => '訂單管理', 'header' => '訂單']);
        }
    );
    Route::get(
        '/employee',
        function () {
            return view('layout.app', ['title' => '人員管理', 'header' => '員工']);
        }
    );
    Route::get('/machine', function () {
        return view('layout.app', ['title' => '機台管理', 'header' => '機台']);
    });
    
    
});

