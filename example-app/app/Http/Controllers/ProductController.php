<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }

    public function store(ProductFormRequest $request)
    {
        $data = $request->validated();

        $product = Product::create($data);
        return redirect('/products/create')->with('message', 'Product added Succesfully!');
    }

    public function edit($product_id)
    {
        // Find the product by ID
        $product = Product::findOrFail($product_id);

        // Return the edit view with the product data
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $product_id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($product_id);

        // Update the product with the new data
        $product->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        // Redirect back with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('products')->with('success', 'Product deleted successfully.');
    }
}
