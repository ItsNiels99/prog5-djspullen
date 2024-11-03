<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Http\Requests\ReviewFormRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();
        return view('reviews.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['product_id'] = $request->product_id;

        $review = Review::create($data);
        return redirect()->route('reviews.index')->with('message', 'Review added successfully!');
    }
    public function edit($review_id)
    {
        $review = Review::findOrFail($review_id);
        $product = Product::all();
        return view('reviews.edit', compact('review', 'product'));
    }

    public function update(Request $request, $review_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $review = Review::findOrFail($review_id);
        $review->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id'),
            'product_id' => $request->input('product_id'),
        ]);

        return redirect()->route('reviews.edit')->with('success', 'Product updated successfully.');
    }
    public function destroy($id)
    {
        $product = Review::findOrFail($id);
        $product->delete();
        return redirect('reviews')->with('success', 'Product deleted successfully.');
    }
}
