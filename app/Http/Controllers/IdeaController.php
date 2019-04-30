<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\History;

class IdeaController extends Controller
{
    /**
     * Display a listing of a users created ideas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user()->ideas()->orderBy('updated_at', 'desc')->with('user')->get();
    }

    /**
     * Store a newly created idea resource in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['idea' => 'required']);

        $idea = auth()->user()->addIdea(request('idea'));

        $history = new History;
        $history->addHistory($idea->id, 'created');

        return $idea;
    }
}
