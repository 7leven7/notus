<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images', 'categories')->get();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with('images', 'categories', 'comments')->findOrFail($id);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric',
        ]);

        $product = Product::create($request->only('name', 'description', 'price', 'main_image_id'));

        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric',
        ]);

        $product->update($request->only('name', 'description', 'price', 'main_image_id'));

        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully.']);
    }
}
