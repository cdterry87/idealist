<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function settings()
    {
        return view('settings');
    }

    public function myideas()
    {
        return view('myideas');
    }

    public function favorites()
    {
        return view('favorites');
    }

    public function history()
    {
        return view('history');
    }
}
