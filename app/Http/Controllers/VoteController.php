<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Database\Eloquent\Builder;

class VoteController extends Controller
{
    /**
     * Sets a user's upvote of an idea.
     *
     * @return \App\Vote
     */
    public function upvote(Idea $idea)
    {
        $idea->increment('votes');
        $idea->addVote(auth()->id());

        return $idea->where(['id' => $idea->id])->with('userFavorite')->first();
        // return $idea;
    }

    /**
     * Sets a user's downvote of an idea.
     *
     * @return \App\Vote
     */
    public function downvote(Idea $idea)
    {
        $idea->decrement('votes');
        $idea->addVote(auth()->id());

        return $idea->where(['id' => $idea->id])->with('userFavorite')->get();
    }

    /**
     * Returns the top voted ideas.
     *
     * @return \App\Idea
     */
    public function top()
    {
        return Idea::with('userFavorite')->whereHas('votes')->orderBy('votes', 'desc')->get();
    }

    /**
     * Returns the ideas a user has yet to
     * vote on.
     *
     * @return \App\Idea
     */
    public function voteable()
    {
        return Idea::with('userFavorite')->whereDoesntHave('votes', function (Builder $query) {
            $query->where('user_id', '=', auth()->id());
        })->orderBy('created_at', 'desc')->get();
    }
}
