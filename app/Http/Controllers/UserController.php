<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $user->message = 'Successfully updated profile.';

        return $user;
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        $user->message = 'Successfully updated password.';

        return $user;
    }

    public function updateTheme(Request $request)
    {
        $user = Auth::user();
        $user->dark = $request->dark;
        $user->save();

        return $user;
    }
}
