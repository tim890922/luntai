<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get(
    '/',
    function () {
        return view('frontend/index', ['title' => '料號清單', 'header' => '料號']);
    }
);
Route::redirect('/admin', 'admin/product');
Route::prefix('admin')->group(function () {

    //GET
    Route::get('/product',[ProductController::class,'index'] )->name('root');
    Route::get('/order', function () {
            return view('backend.admin', ['title' => '訂單管理', 'header' => '訂單']);
        });
    Route::get('/employee',function () {
            return view('backend.admin', ['title' => '人員管理', 'header' => '員工']);
        });
    Route::get('/machine', function () {
        return view('backend.admin', ['title' => '機台管理', 'header' => '機台']);
    });

    //POST
    Route::post('/product', [ProductController::class,'store']);

});

Route::get("admin/product/create",[ProductController::class,'create']);