<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">ETBDB</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Mostrar menú">
            <span class="navbar-toggler-icon"></span>
          </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if(Request::is('home')) active @endif">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                @if(Auth::check())
                    <li class="nav-item @if(Request::is('data/*') || Request::is('data')) active @endif">
                        <a class="nav-link" href="{{ route('data.index') }}">Data</a>
                    </li>
                    <li class="nav-item @if(Request::is('users/*') || Request::is('users')) active @endif">
                        <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown ml-auto">
                        <a class="nav-link" href="{{ route('users.show', Auth::id()) }}">
                        {{ Auth::user()->name }}
                        </a>
                    </li>
                </ul>
                @endif
            </div>
        </nav>
        <br>
        @include('components.alert')
        <br>
        @yield('content')
    </div>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>