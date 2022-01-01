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
<nav class="">
    <ul class="">
        <li>
            <a href="{{ asset('') }}" class="">
                <img src="{{ asset('logo.png') }}" alt="Home" width="32" height="32" class="">
            </a>
        </li>
        <li><a href="{{ asset('scarves') }}" class="">{{ __('Scarves') }}</a></li>
        <li><a href="{{ asset('groups') }}" class="">{{ __('Scout Groups') }}</a></li>
        <li><a href="{{ asset('about') }}" class="">{{ __('About') }}</a></li>
    </ul>
</nav>

@yield('content')
</body>
</html>
