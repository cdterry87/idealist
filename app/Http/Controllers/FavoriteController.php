<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Mark an idea as favorite.
     */
    public function favorite(Idea $idea)
    {
        $favorite = Favorite::create([
            'idea_id' => $idea->id,
            'user_id' => auth()->id(),
        ]);

        return $idea;
    }
}
