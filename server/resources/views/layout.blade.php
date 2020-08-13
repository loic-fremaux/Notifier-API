<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">

    <title>@yield('title') | Notifier</title>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Notifier</h1>
    <p>Créez simplement des notifications push pour Android</p>
</div>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="">Notifier</a>
        </div>
        <ul class="nav navbar-nav">
            @auth
                <li class="active"><a href="{{ url('/panel') }}"><button class="btn btn-primary">Panel</button></a></li>
            @else
                <li class="active"><a href="{{ route('login') }}"><button class="btn btn-primary">Se connecter</button></a></li>
                <li class="active"><a href="{{ route('register') }}"><button class="btn btn-default">Créer un compte</button></a></li>
            @endauth
        </ul>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>
