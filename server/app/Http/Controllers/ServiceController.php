<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
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
            Service::store($request);
            return Redirect::to('/panel')->with('success', "Le service a été ajouté !");
        }
    }

    public function delete(Request $request)
    {
        $service = Service::fromSlug($request->get('id'));
        if ($service !== null && $service->user_id === Auth::guard()->user()->getAuthIdentifier()) {
            $service->delete();
            return Redirect::to('/panel')->with('success', "Le service a été supprimé !");
        } else {
            return Redirect::to('/panel')->with('failure', "Impossible de supprimer ce service...");
        }
    }

    public static function addUser(Service $service, Request $request)
    {
        if ($service !== null && $service->user_id === Auth::guard()->user()->getAuthIdentifier()) {
            $user = User::fromName($request->input('username'));
            if ($user === null) {
                return Redirect::to('/panel')->with('failure', "L'utilisateur n'existe pas !");
            }

            if ($service->addUser($user)) {
                return Redirect::to('/panel')->with('success', "L'utilisateur a été ajouté !");
            } else {
                return Redirect::to('/panel')->with('failure', "L'utilisateur a déjà été ajouté !");
            }
        } else {
            return Redirect::to('/panel')->with('failure', "Impossible d'ajouter un utilisateur à ce service...");
        }
    }

    public static function delUser(Service $service, $request)
    {
        if ($service !== null && $service->user_id === Auth::guard()->user()->getAuthIdentifier()) {
            $user = User::fromId($request);
            if ($user === null) {
                return Redirect::to('/panel')->with('failure', "L'utilisateur n'existe pas !");
            }

            if ($user->id === $service->user_id) {
                return Redirect::to('/panel')->with('failure', "Vous ne pouvez pas vous supprimer du service.");
            }

            if ($service->delUser($user)) {
                return Redirect::to('/panel')->with('success', "L'utilisateur a été supprimé !");
            } else {
                return Redirect::to('/panel')->with('failure', "L'utilisateur ne fait pas partie de ce service !");
            }
        } else {
            return Redirect::to('/panel')->with('failure', "Impossible de supprimer l'utilisateur de ce service...");
        }
    }
}
