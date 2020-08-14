@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <section class="col-md-auto">
                <table class="table table-bordered table-striped table-responsive-xl">
                    <h4 class="card-header">{{ __('Mes services') }}</h4>
                    @if(count($services) > 0)
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Slug</th>
                            <th>Membres</th>
                            <th>Clé d'API</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->slug }}</td>
                                <td>
                                    @if($service->user_id === Auth::guard()->user()->getAuthIdentifier())
                                        @php($i = 0)
                                        @php($c = count($service->users))
                                        @foreach($service->users as $user)
                                            @if($user->id === Auth::guard()->user()->getAuthIdentifier())
                                                <span>{{$user->name}}</span>
                                            @else
                                                <div class="nav-item dropdown">
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                       role="button"
                                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                       v-pre>{{ $user->name }}<span class="caret"></span>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="navbarDropdown">
                                                        <form id="accept-form-{{ $service->id }}"
                                                              action="{{ route('panel.deluser', ['service_id'=> $service->id, 'user_id' => $user->id]) }}"
                                                              method="POST"
                                                              class="form-horizontal">

                                                            <button type="submit"
                                                                    class="btn-danger btn">{{ __('Supprimer') }}</button>
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                            @php($i++)
                                            @if($i < $c && $c > 1)
                                                {{ __(', ') }}
                                            @endif
                                        @endforeach
                                    @else
                                        {{ $service->users->implode('name', ', ') }}
                                    @endif
                                </td>
                                <td>{{ $service->api_key }}</td>
                                <td class="align-content-center">
                                    <a href="{{ route('panel.delete', ['id' => $service->id]) }}">
                                        <button class="btn btn-danger">Supprimer</button>
                                    </a>
                                    <div class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <button class="btn btn-primary">{{ __('Ajouter un utilisateur') }}</button>
                                            <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <form id="accept-form-{{ $service->id }}"
                                                  action="{{ route('panel.adduser', ['id'=> $service->id]) }}"
                                                  method="POST"
                                                  class="form-horizontal">
                                                <label>
                                                    {{__('Nom d\'utilisateur')}}
                                                    <input name="username" id="username-input-{{ $service->id }}"
                                                           type="text"
                                                           class="text">
                                                </label>

                                                <button type="submit"
                                                        class="btn-primary btn">{{ __('Valider') }}</button>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @else
                        {{ __('Vous n\'avez aucun service pour le moment') }}
                    @endif
                </table>
            </section>
        </div>
        <div class="container-sm justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" method="POST" action="{{ route('panel.create') }}">
                        @csrf
                        <fieldset>

                            <!-- Form Name -->
                            <legend class="card-header">{{ __('Créer un service') }}</legend>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Nom</label>
                                <div class="col-md-4">
                                    <input id="name" name="name" type="text" placeholder="Serveur injoignable"
                                           class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="slug">Slug</label>
                                <div class="col-md-4">
                                    <input id="slug" name="slug" type="text" placeholder="serveur-injoignable"
                                           class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="submit"></label>
                                <div class="col-md-4">
                                    <button id="submit" name="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection