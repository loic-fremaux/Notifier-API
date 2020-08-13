<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">

    <title>{{ $page }} | Notifier</title>
</head>
<body>
<div class="container">
    <div class="top-right links">
        @auth
            <button class="btn btn-primary"><a href="{{ url('/') }}">Home</a></button>
        @else
            <button class="btn btn-primary"><a href="{{ url('/login') }}">Login</a></button>
            <a href="{{ url('/register') }}">Register</a>
        @endauth
    </div>
</div>
</body>
</html>
