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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['product_id'] = $request->product_id;
        $data['title'] = $request->title;
        $data['content'] = $request->content;


        $review = Review::create($data);
        return redirect()->route('reviews.index')->with('message', 'Review added successfully!');
    }
}
