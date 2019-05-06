<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Favorite;
use App\History;

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
        return auth()->user()->favorites()->with('idea.user')->latest()->get();
    }

    /**
     * Store a newly created favorite.
     *
     * @param  \App\Idea  $idea
     * @return \App\Idea
     */
    public function store(Idea $idea)
    {
        $history = new History;
        $history->addHistory($idea->id, 'favorited');

        $idea->message = "Idea favorited!";

        return $idea->addFavorite(auth()->id());
    }

    /**
     * Remove a specified favorite
     *
     * @param  \App\Favorite  $favorite
     * @return \App\Favorite
     */
    public function destroy(Idea $idea, Favorite $favorite)
    {
        $favorite->delete();

        $history = new History;
        $history->addHistory($idea->id, 'unfavorited');

        $idea->message = "Idea unfavorited!";

        return $idea;
    }
}
