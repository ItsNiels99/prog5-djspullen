<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title', 'LIKE', "%{$query}%")->get();
        return view('products.index', compact('products'));
    }
    public function addTags(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $tagIds = $request->input('tags'); // Array of tag IDs

        $product->tags()->sync($tagIds);

        return redirect()->route('products.index')->with('success', 'Tags added successfully.');
    }
    public function welcome()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
    public function dashboard()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        }
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $product_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($product_id);
        $product->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('products')->with('success', 'Product deleted successfully.');
    }

    public function toggleStatus(Product $product)
    {
        $product->toggleStatus();
        return redirect()->route('products.index')->with('message', 'Product status updated successfully!');
    }
}
