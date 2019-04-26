<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'idea' => 'required'
        ]);

        $idea = Idea::create([
            'idea' => request('idea'),
            'votes' => 0,
            'user_id' => auth()->id(),
        ]);

        return $idea;
    }

    /**
     * Returns the top voted ideas.
     *
     * @return \Illuminate\Http\Response
     */
    public function top()
    {
        return Idea::orderBy('votes', 'desc')->get();
    }

    /**
     * Returns the ideas a user has yet to
     * vote on.
     *
     * @return \Illuminate\Http\Response
     */
    public function voteable()
    {
        return Idea::orderBy('created_at', 'desc')->get();
    }

    /**
     * Returns the ideas for the authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function my()
    {
        return Auth::user()->ideas()->orderBy('updated_at', 'desc')->get();
    }
}
