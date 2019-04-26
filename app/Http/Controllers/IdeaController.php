<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        // return Idea::orderBy('created_at', 'desc')->get();
        return Auth::user()->ideas()->orderBy('updated_at', 'desc')->get();
    }
}
