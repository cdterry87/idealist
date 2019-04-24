<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;

class VoteController extends Controller
{
    public function upvote(Idea $idea)
    {
        $idea->increment('votes');
    }

    public function downvote(Idea $idea)
    {
        $idea->decrement('votes');
    }
}
