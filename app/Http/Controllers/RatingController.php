<?php

namespace App\Http\Controllers;

use App\Models\ReviewRating;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $value = ReviewRating::all();
        return view('rating.index', [
            'value' => $value,
            'title' => 'Data Rating'
        ]);

        // $ratings = Rating::all();
        // return view('rating.index', [
        //     'ratings' => $ratings,
        //     'title' => 'Data Rating'
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rating.create', [
            'title' => ' Rating'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRatingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRatingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(ReviewRating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit($user_name)
    {
        //
        $rating = ReviewRating::all();
        return \view('rating.edit', compact('rating'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRatingRequest  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRatingRequest $request, ReviewRating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_name)
    {
        $rating = ReviewRating::where('user_name', $user_name)->firstOrFail();
        $rating->delete();

        return redirect()->route('rating.index')->with('success', 'Rating berhasil dihapus');
    }
}
