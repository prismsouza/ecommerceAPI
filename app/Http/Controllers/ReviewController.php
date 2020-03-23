<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Model\Product;
use App\Model\Review;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param ReviewRequest $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request, Product $product)
    {
        $review = new Review($request->all());
        $product->reviews()->save($review);
        return response([
            'data' => new ReviewResource($review)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     * @param Review $review
     * @return void
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Review $review
     * @return void
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Product $product
     * @param Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Review $review)
    {
        $review->update($request->all());
        return response([
            'data' => new ReviewResource($review)
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     * @param Product $product
     * @param Review $review
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product, Review $review)
    {
        $review->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
