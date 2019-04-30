<?php

namespace App\Http\Controllers;

use App\Idea;
use App\History;
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

        return $idea->where(['id' => $idea->id])->with(['userFavorite', 'user'])->first();
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

        return $idea->where(['id' => $idea->id])->with(['userFavorite', 'user'])->first();
    }

    /**
     * Returns the top voted ideas.
     *
     * @return \App\Idea
     */
    public function top()
    {
        $ideas = Idea::with(['userFavorite', 'user'])->whereHas('votes')->orderBy('votes', 'desc')->get();

        $ideas->each(function ($item, $key) {
            $item->append(['elapsed_time'])->toArray();
        });

        return $ideas;
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
