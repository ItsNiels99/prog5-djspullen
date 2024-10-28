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
        $product = Product::findOrFail($product_id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductFormRequest $request, $product_id)
    {
        $data = $request->validated();

        $product = Product::where('id', $product_id)->update([
            'title' =>$data['title'],
            'description' =>$data['description'],
            'price' =>$data['price']
        ]);
        return redirect('/products')->with('message', 'Product added Succesfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('products')->with('success', 'Product deleted successfully.');
    }
}
