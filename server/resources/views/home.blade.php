@extends('layouts.app')

@section('content')
    <div class="card-header">{{ __('Accueil') }}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @auth
            <div>Vous êtes connecté, rendez-vous sur l'interface utilisateur.</div>
        @else
            <div>Veuillez vous connecter ou créer un compte pour utiliser cette application</div>
        @endauth
    </div>
@endsection
