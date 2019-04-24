<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function top()
    {
        return response()->json(Idea::all()->toArray());
    }

    public function voteable()
    {
        return response()->json(Idea::all()->toArray());
    }
}
