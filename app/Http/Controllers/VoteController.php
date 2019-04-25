<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Vote;

class VoteController extends Controller
{
    public function upvote(Idea $idea)
    {
        $idea->increment('votes');

        $vote = Vote::create([
            'idea_id' => $idea->id,
            'user_id' => auth()->id(),
        ]);

        return $idea;
    }

    public function downvote(Idea $idea)
    {
        $idea->decrement('votes');

        $vote = Vote::create([
            'idea_id' => $idea->id,
            'user_id' => auth()->id(),
        ]);

        return $idea;
    }
}
