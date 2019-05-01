<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the user view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account');
    }

    /**
     * Return the user's info
     *
     * @return void
     */
    public function user()
    {
        return auth()->user();
    }

    public function store(Request $request)
    {

    }

    public function changePassword(Request $request)
    {

    }

    public function changeTheme(Request $request)
    {
        $user = Auth::user();
        $user->dark = $request->dark;
        $user->save();

        return $user;
    }
}
