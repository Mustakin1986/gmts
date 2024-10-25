<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(ProductController::class)->prefix('/products')->group(function(){
    Route::get('/','index');
    Route::post('/store','store');
    Route::post('/update/{id}','update');
    Route::get('/show/{id}','show');
    Route::delete('/delete/{id}','destroy');
});

Route::controller(EmployeeController::class)->prefix('/employee')->group(function(){
    Route::get('/','index');
    Route::post('/store','store');
    Route::post('/update/{id}','update');
    Route::get('/show/{id}','show');
    Route::delete('/delete/{id}','destroy');
});