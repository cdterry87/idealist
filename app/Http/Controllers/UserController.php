<?php

namespace App\Http\Controllers;

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
}
