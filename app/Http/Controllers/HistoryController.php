<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        return auth()->user()->history()->with('idea.user')->latest()->get();
    }
}
