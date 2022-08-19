<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\OrderController;

Route::get(
    '/',
    function () {
        return view('frontend/index', ['title' => '料號清單', 'header' => '料號']);
    }
);
Route::redirect('/admin', 'admin/product');
Route::prefix('admin')->group(function () {

    //GET
    Route::get('/product',[ProductController::class,'index'] );
    Route::get('/machine',[MachineController::class,'index'] );
    Route::get('/order', [OrderController::class,'index']);
    Route::get('/employee',function () {
            return view('backend.admin', ['title' => '人員管理', 'header' => '員工']);
        });

    //POST
    Route::post('/product', [ProductController::class,'store']);
    Route::post('/machine', [MachineController::class,'store']);
    Route::post('/order', [OrderController::class,'store']);

    //delete
    Route::delete('/product/{id}', [ProductController::class,'destroy']);
    Route::delete('/machine/{id}', [MachineController::class,'destroy']);

    //import
    Route::post('/orderImport',[OrderController::class,'import']);
});

Route::get("admin/product/create",[ProductController::class,'create']);
Route::get("admin/machine/create",[MachineController::class,'create']);
Route::get("admin/order/create",[OrderController::class,'create']);


Route::view('/test','test');

