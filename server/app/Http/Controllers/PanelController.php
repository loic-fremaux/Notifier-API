<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('panel.panel', ['services' => Auth::guard()->user()->services()->get()]);
    }
}
