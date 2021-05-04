<?php

use App\Http\Controllers\api\ProductController;
use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function (){
    Route::get('/products', [ProductController::class, 'get']);
    Route::post('/products', [ProductController::class, 'post']);
    Route::delete('/products', [ProductController::class, 'delete']);
});
