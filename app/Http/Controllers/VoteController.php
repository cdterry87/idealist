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

        $idea = Vote::create([
            'idea_id' => $idea->id,
            'user_id' => auth()->id(),
        ]);
    }

    public function downvote(Idea $idea)
    {
        $idea->decrement('votes');

        $idea = Vote::create([
            'idea_id' => $idea->id,
            'user_id' => auth()->id(),
        ]);
    }
}
