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
        $idea->addVote(auth()->id());

        return $idea;
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

        return $idea;
    }

    /**
     * Returns the top voted ideas.
     *
     * @return \App\Idea
     */
    public function top()
    {
        return Idea::with('favorite')->orderBy('votes', 'desc')->get();
    }

    /**
     * Returns the ideas a user has yet to
     * vote on.
     *
     * @return \App\Idea
     */
    public function voteable()
    {
        return Idea::with('favorite')->orderBy('created_at', 'desc')->get();
    }
}
