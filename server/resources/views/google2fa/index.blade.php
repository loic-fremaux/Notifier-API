@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Authentification à 2 facteurs</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('2fa') }}">
                            @csrf

                            <div class="form-group">
                                <label for="one_time_password" class="col-md-4 control-label">Code
                                    d'authentification</label>

                                <div class="col-md-6">
                                    <input id="one_time_password" type="number" class="form-control"
                                           name="one_time_password" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Se connecter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection