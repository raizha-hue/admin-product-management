<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/health', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API is running'
    ]);
});

Route::get('/info', function () {
    return response()->json([
        'application' => 'Admin Product Management System',
        'version' => '1.0.0',
        'database' => 'MongoDB'
    ]);
});

Route::post('/login', [AuthController::class, 'login']);


/*
|--------------------------------------------------------------------------
| Protected Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {

    // Authentication
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/statistics', [DashboardController::class, 'statistics']);

    // Products
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/search/{keyword}', [ProductController::class, 'search']);
    Route::get('/products/category/{category}', [ProductController::class, 'byCategory']);
    Route::get('/products/status/{status}', [ProductController::class, 'byStatus']);
    Route::get('/products/low-stock', [ProductController::class, 'lowStock']);
    Route::get('/products/count', [ProductController::class, 'count']);
    Route::get('/products/available', [ProductController::class, 'available']);
    Route::get('/products/out-of-stock', [ProductController::class, 'outOfStock']);

    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    

    // Categories
    Route::get('/categories', function () {
        return response()->json([
            'categories' => \App\Models\Product::distinct('category')->get()
        ]);
    });
});
