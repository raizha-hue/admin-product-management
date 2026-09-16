<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json([
            'products' => Product::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:100',
            'stock' => 'required|integer|min:0',
            'status' => 'required|string|in:available,out_of_stock',
        ]);

        $product = Product::create($data);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    public function show(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'product' => $product
        ]);
    }

    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|numeric|min:0',
            'category' => 'sometimes|string|max:100',
            'stock' => 'sometimes|integer|min:0',
            'status' => 'sometimes|string|in:available,out_of_stock',
        ]);

        $product->update($data);

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ]);
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }

    public function search(string $keyword)
    {
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();

        return response()->json([
            'products' => $products
        ]);
    }

    public function byCategory(string $category)
    {
        $products = Product::where('category', $category)->get();

        return response()->json([
            'category' => $category,
            'products' => $products
        ]);
    }

    public function byStatus(string $status)
    {
        $products = Product::where('status', $status)->get();

        return response()->json([
            'status' => $status,
            'products' => $products
        ]);
    }

    public function lowStock()
    {
        $products = Product::where('stock', '<=', 5)->get();

        return response()->json([
            'products' => $products
        ]);
    }

    public function count()
    {
        return response()->json([
            'total_products' => Product::count()
        ]);
    }

    public function available()
    {
        $products = Product::where('status', 'available')->get();

        return response()->json([
            'products' => $products
        ]);
    }

    public function outOfStock()
    {
        $products = Product::where('status', 'out_of_stock')->get();

        return response()->json([
            'products' => $products
        ]);
    }

   public function webProducts(Request $request)
{
    $search = $request->search;

    if ($search) {
        $products = Product::where(
            'name',
            'like',
            '%' . $search . '%'
        )->get();
    } else {
        $products = Product::all();
    }

    return view('admin.products', [
        'products' => $products
    ]);
}

public function webCreate()
{
    return view('admin.add-product');
}

public function webStore(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category' => 'required|string|max:100',
        'stock' => 'required|integer|min:0',
        'status' => 'required|string|in:available,out_of_stock',
    ]);

    Product::create($data);

    return redirect('/admin/products')
        ->with('success', 'Product added successfully!');
}



public function webEdit(string $id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect('/admin/products')
            ->with('error', 'Product not found.');
    }

    return view('admin.edit-product', [
        'product' => $product
    ]);
}

public function webUpdate(Request $request, string $id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect('/admin/products')
            ->with('error', 'Product not found.');
    }

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category' => 'required|string|max:100',
        'stock' => 'required|integer|min:0',
        'status' => 'required|string|in:available,out_of_stock',
    ]);

    $product->update($data);

    return redirect('/admin/products')
        ->with('success', 'Product updated successfully!');
}

public function webDelete(string $id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect('/admin/products')
            ->with('error', 'Product not found.');
    }

    $product->delete();

    return redirect('/admin/products')
        ->with('success', 'Product deleted successfully!');
}


}

