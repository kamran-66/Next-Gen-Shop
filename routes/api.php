<?php


use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Api Routes


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::get('/products', [ProductController::class, 'index']);

    Route::middleware('auth:sanctum')->group(function () {
    
        Route::post('/products', [ProductController::class, 'store']);
    
        
        Route::get('/cart', [CartController::class, 'index']);
        Route::post('/cart/add/{productId}', [CartController::class, 'add']);
        Route::delete('/cart/remove/{productId}', [CartController::class, 'remove']);
    
       
            Route::post('/checkout', [OrderController::class, 'checkout']);
            Route::get('/orders', [OrderController::class, 'index']);



             Route::get('/admin/orders', [OrderController::class, 'allOrders']);
    Route::put('/admin/orders/{id}/status', [OrderController::class, 'updateStatus']);
    
    // Route::apiResource('products', ProductController::class);
    // Route::middleware('auth:sanctum')->apiResource('products', Api\ProductController::class);


});
