@extends('layouts.app')

@section('content')
    <div class="card-header">{{ __('Impossible de créer votre service') }}</div>
    <div class="card-body">{{ __('Ce slug est déjà utilisé...') }}</div>
@endsection