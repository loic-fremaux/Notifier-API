<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
    public function create(Request $request)
    {
        $service = Service::fromSlug($request->input('slug'));
        if ($service !== null) {
            return Redirect::to('/panel')->with('failure', "Un service du même nom existe déjà...");
        } else {
            return Redirect::to('/panel')->with('success', "Le service a été ajouté !");
        }
    }
}
