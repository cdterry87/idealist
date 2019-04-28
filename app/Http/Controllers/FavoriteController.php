<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Favorite;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth()->user()->favorites()->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Idea  $idea
     * @return \App\Idea
     */
    public function store(Idea $idea)
    {
        $favorite = Favorite::create([
            'idea_id' => $idea->id,
            'user_id' => auth()->id(),
        ]);

        return $favorite;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorite  $favorite
     * @return \App\Favorite
     */
    public function destroy(Favorite $favorite)
    {
        return $favorite->delete();
    }
}
