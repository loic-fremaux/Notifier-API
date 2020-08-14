<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public static function addToken(Request $request)
    {
        $user = Auth::guard()->user();
        $user->token = $request->input('token');
        $user->save();
        return Redirect::to('/panel')->with('success', "Le token a été mis à jour !");
    }
}
