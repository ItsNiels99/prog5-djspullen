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

    public function store(ReviewFormRequest $request)
    {
        $data['user_id'] = auth()->user()->id;
        $data['product_id'] = $request->product_id;
        $data = $request->validated();

        Review::create($data);
        return redirect()->route('reviews')->with('message', 'Review added successfully!');
    }
}
