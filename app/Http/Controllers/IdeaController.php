<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return auth()->user()->addIdea(request('idea'));
    }
}
