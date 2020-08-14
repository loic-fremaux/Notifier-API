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
        $services = Service::fromUser(Auth::guard()->user()->getAuthIdentifier());
        return view('panel.panel', ['services' => $services]);
    }
}
