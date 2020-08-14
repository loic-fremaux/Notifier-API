@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Mise en place de l'authentification à 2 facteurs</div>

                    <div class="panel-body" style="text-align: center;">
                        <p>Flashez le QR code ci-dessous ou utilisez le code suivant : {{ $secret }}</p>
                        <div>
                            <img src="{{ $QR_Image }}">
                        </div>
                        <p>L'authentification à 2 facteurs est requise pour finaliser la création de votre compte.</p>
                        <div>
                            <a href="{{ url('/complete-registration') }}"><button class="btn btn-primary">Créer mon compte</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection