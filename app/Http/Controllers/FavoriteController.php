<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Favorite;

class FavoriteController extends Controller
{
    /**
     * Display a listing of all the ideas a user
     * has favorited.
     *
     * @return \App\Favorite
     */
    public function index()
    {
        return auth()->user()->favorites()->with('idea')->latest()->get();
    }

    /**
     * Store a newly created favorite.
     *
     * @param  \App\Idea  $idea
     * @return \App\Idea
     */
    public function store(Idea $idea)
    {
        return $idea->addFavorite(auth()->id());
    }

    /**
     * Remove a specified favorite
     *
     * @param  \App\Favorite  $favorite
     * @return \App\Favorite
     */
    public function destroy(Favorite $favorite)
    {
        return $favorite->delete();
    }
}
