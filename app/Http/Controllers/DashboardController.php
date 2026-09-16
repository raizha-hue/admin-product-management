<?php

namespace App\Http\Controllers;

use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $availableProducts = Product::where('status', 'available')->count();
        $outOfStock = Product::where('status', 'out_of_stock')->count();

        return response()->json([
            'message' => 'Admin dashboard',
            'statistics' => [
                'total_products' => $totalProducts,
                'available_products' => $availableProducts,
                'out_of_stock' => $outOfStock,
            ]
        ]);
    }

    public function statistics()
    {
        return response()->json([
            'total_products' => Product::count(),
            'available_products' => Product::where('status', 'available')->count(),
            'out_of_stock' => Product::where('status', 'out_of_stock')->count(),
        ]);
    }

    public function webDashboard()
{
    $totalProducts = Product::count();

    $availableProducts = Product::where(
        'status',
        'available'
    )->count();

    $outOfStock = Product::where(
        'status',
        'out_of_stock'
    )->count();

    return view('admin.dashboard', [
        'totalProducts' => $totalProducts,
        'availableProducts' => $availableProducts,
        'outOfStock' => $outOfStock,
    ]);
}
}
