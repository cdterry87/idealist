<?php

namespace App\Http\Controllers;

use App\Idea;

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
        return $idea->addVote(auth()->id());
    }

    /**
     * Sets a user's downvote of an idea.
     *
     * @return \App\Vote
     */
    public function downvote(Idea $idea)
    {
        $idea->decrement('votes');
        return $idea->addVote(auth()->id());
    }

    /**
     * Returns the top voted ideas.
     *
     * @return \App\Idea
     */
    public function top()
    {
        return Idea::with('favorites')->orderBy('votes', 'desc')->get();
    }

    /**
     * Returns the ideas a user has yet to
     * vote on.
     *
     * @return \App\Idea
     */
    public function voteable()
    {
        return Idea::orderBy('created_at', 'desc')->get();
    }
}
