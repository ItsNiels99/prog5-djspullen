<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewFormRequest;
use App\Models\Review;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('Reviews.index', compact('reviews'));
    }
    public function create()
    {
        return view('reviews.create');
    }

    public function store(ReviewsFormRequest $request)
    {
        $data = $request->validated();

        $reviews = Product::create($data);
        return redirect('/reviews/create')->with('message', 'Reviews added Succesfully!');
    }

    public function edit($reviews_id)
    {
        $product = Product::findOrFail($reviews_id);
        return view('reviews.edit', compact('review'));
    }

    public function update(ReviewEditRequest $request, $id)
    {
        $review = Review::findOrFail($id); // Vind de review die je wilt updaten

        $review->update($request->validated()); // Update de review met gevalideerde data

        return redirect()->route('reviews.show', $id)->with('success', 'Review bijgewerkt!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('reviews')->with('success', 'Product deleted successfully.');
    }
}
