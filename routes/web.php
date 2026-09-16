<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect('/admin/login');
});


Route::get('/admin/login', function () {
    return view('auth.login');
});

Route::post('/admin/login', [AuthController::class, 'webLogin']);


// Protected Admin Pages

Route::middleware('webadmin')->group(function () {

    Route::get('/admin/dashboard', [
        DashboardController::class,
        'webDashboard'
    ]);

    Route::get('/admin/products', [
        ProductController::class,
        'webProducts'
    ]);

    Route::get('/admin/products/create', [
        ProductController::class,
        'webCreate'
    ]);

    Route::post('/admin/products', [
        ProductController::class,
        'webStore'
    ]);

    Route::get('/admin/products/{id}/edit', [
        ProductController::class,
        'webEdit'
    ]);

    Route::put('/admin/products/{id}', [
        ProductController::class,
        'webUpdate'
    ]);

    Route::delete('/admin/products/{id}', [
    ProductController::class,
    'webDelete'
]);

    Route::post('/admin/logout', function () {

        session()->forget([
            'admin_id',
            'admin_name',
            'admin_email'
        ]);

        return redirect('/admin/login')
            ->with('success', 'You have been logged out.');
    });

});