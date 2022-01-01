<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scarfy</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="{{ asset('') }}" class="nav-link">
            <img src="{{ asset('logo.png') }}" alt="Home" width="32" height="32" class="">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a href="{{ asset('scarves') }}" class="nav-link">{{ __('Scarves') }}</a></li>
                <li class="nav-item"><a href="{{ asset('groups') }}" class="nav-link">{{ __('Scout Groups') }}</a></li>
                <li class="nav-item"><a href="{{ asset('about') }}" class="nav-link">{{ __('About') }}</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
