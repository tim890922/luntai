<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MachineProductController;
use App\Http\Controllers\WorkstationController;
use App\Http\Controllers\MaterialProductController;
use App\Http\Controllers\ProcessController;
use App\Models\Client;

Route::redirect('/', 'admin/product');
Route::redirect('/admin', 'admin/product');
Route::prefix('admin')->group(function () {

    //GET
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/machine', [MachineController::class, 'index']);
    // Route::get('/order', [OrderController::class, 'index']);
    Route::get('/order', function () {
        $clients = Client::all();
        $href=[];
        foreach ($clients as $client) {
            $href[] = strtolower($client->client_name);
        }
        $view = [
                'clients'=>$clients,
                'href'=>$href   
        ];
        return view('backend.order', $view);
    });
    Route::get('/order/YMT', [OrderController::class, 'user']);
    Route::get('/materialProduct', [MaterialProductController::class, 'index']);

    Route::get('/employee/con', [EmployeeController::class, 'index']);
    Route::get('/employee',[EmployeeController::class,'index'] );
    Route::get('/employee/worker', [EmployeeController::class, 'worker']);
    Route::get('/material', [MaterialController::class, 'index']);
    Route::get('/client', [ClientController::class, 'index']);
    Route::get('/supplier', [SupplierController::class, 'index']);
    Route::get('/machineProduct', [MachineProductController::class, 'index']);
    Route::get('/workstation', [WorkstationController::class, 'index']);
    Route::get('/process', [ProcessController::class, 'index']);

    //SHOW
    Route::get('/process/show/{id}',[ProcessController::class, 'show']);
    Route::get('/materialProduct/show/{id}',[MaterialProductController::class, 'show']);
    //POST
    Route::post('/product', [ProductController::class, 'store']);
    Route::post('/machine', [MachineController::class, 'store']);
    Route::post('/order', [OrderController::class, 'store']);
    Route::post('/employee', [EmployeeController::class, 'store']);
    Route::post('/machineProduct', [MachineProductController::class, 'store']);
    Route::post('/workstation', [WorkstationController::class, 'store']);
    Route::post('/client', [ClientController::class, 'store']);
    Route::post('/material', [MaterialController::class, 'store']);
    Route::post('/supplier', [SupplierController::class, 'store']);
    

    //edit
    Route::get('/product/edit/{id}', [ProductController::class, 'edit']); //tim
    Route::get('/order/edit/{id}', [OrderController::class, 'edit']); //yun
    Route::get('/machine/edit/{id}', [MachineController::class, 'edit']); //yun
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit']); //xin
    Route::get('/material/edit/{id}', [MaterialController::class, 'edit']); //xin
    Route::get('/machineProduct/edit/{id}', [MachineProductController::class, 'edit']); //tim
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit']); //julie
    Route::get('/client/edit/{id}', [ClientController::class, 'edit']); //julie
    Route::get('/workstation/edit/{id}', [WorkstationController::class, 'edit']); //julie

    //update
    Route::put('/product', [ProductController::class, 'update']);
    Route::put('/client', [ClientController::class, 'update']);
    Route::put('/order', [OrderController::class, 'update']);
    Route::put('/employee', [EmployeeController::class, 'update']);
    Route::put('/machine', [MachineController::class, 'update']);
    Route::put('/material', [MaterialController::class, 'update']);
    Route::put('/supplier', [SupplierController::class, 'update']);
    Route::put('/machineProduct', [MachineProductController::class, 'update']);
    Route::put('/workstation', [WorkstationController::class, 'update']);

    //create
    Route::get("/product/create", [ProductController::class, 'create']);
    Route::get("/machine/create", [MachineController::class, 'create']);
    Route::get("/order/create", [OrderController::class, 'create']);
    Route::get("/employee/create", [EmployeeController::class, 'create']);
    Route::get("/material/create", [MaterialController::class, 'create']);
    Route::get("/client/create", [ClientController::class, 'create']);
    Route::get("/supplier/create", [SupplierController::class, 'create']);
    Route::get("/machineProduct/create", [MachineProductController::class, 'create']);
    Route::get("/workstation/create", [WorkstationController::class, 'create']);
    Route::get('/process/create/{id}', [ProcessController::class, 'create']);


    //delete
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);
    Route::delete('/machine/{id}', [MachineController::class, 'destroy']);
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy']);
    Route::delete('/material/{id}', [MaterialController::class, 'destroy']);
    Route::delete('/client/{id}', [ClientController::class, 'destroy']);
    Route::delete('/supplier/{id}', [SupplierController::class, 'destroy']);
    Route::delete('/machineProduct/{id}', [MachineProductController::class, 'destroy']);
    Route::delete('/order/{id}', [OrderController::class, 'destroy']);
    Route::delete('/workstation/{id}', [WorkstationController::class, 'destroy']);

    //import
    Route::post('/orderImport', [OrderController::class, 'import']);
    Route::post('/productImport', [ProductController::class, 'import']);
});


Route::get('/test', [OrderController::class, 'test']);
