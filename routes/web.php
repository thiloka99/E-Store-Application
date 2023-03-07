<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;


Route::get('/', function () {
    return view('index');
});

Route::view('cusregister','register');
Route::get('/cusregister',[LoginController::class,'registerLogin']);
Route::post('/login',[LoginController::class,'checklogin']);
Route::post('/reg', [UserController::class, 'store' ]);

Route::resources(['products' => ProductController::class,
'users' =>  UserController::class,
'orders' => OrderController::class
 ]);

Route::get('/logout',[LoginController::class,'logout']);
Route::get('/placeorder/{product}',[ProductController::class,'showToOrder'])->name('products.order');
Route::get('/showmyorders', [OrderController::class, 'showEmployeeOrder'])->name('myorder');
