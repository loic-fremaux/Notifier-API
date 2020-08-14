@extends('layouts.app')

@section('content')
    <div class="card-header">{{ __('Panel') }}</div>

    <div class="col-md-10">
        @foreach ($services as $service)
            <p>{{ $service->id }}</p>
        @endforeach
    </div>

    <form class="form-horizontal" method="POST" action="{{ route('panel.create') }}">
        @csrf
        <fieldset>

            <!-- Form Name -->
            <legend>Créer un service</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Nom</label>
                <div class="col-md-4">
                    <input id="name" name="name" type="text" placeholder="Service indisponible"
                           class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="slug">Slug</label>
                <div class="col-md-4">
                    <input id="slug" name="slug" type="text" placeholder="service-indisponible"
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
@endsection