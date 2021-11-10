<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scarfy</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
<nav class="p-6 bg-gray-400 flex justify-between mb-6">
    <ul class="flex items-center">
        <li>
            <a href="{{ asset('') }}" class="px-3">
                <img src="{{ asset('logo.png') }}" alt="Home" width="32px" height="32px" class="inline transition duration-500 ease-in-out transform hover:scale-110">
            </a>
        </li>
        <li><a href="{{ asset('scarfs') }}" class="p-3 hover:text-gray-100">Scarfs</a></li>
        <li><a href="{{ asset('groups') }}" class="p-3 hover:text-gray-100">Scout Groups</a></li>
    </ul>
</nav>

@yield('content')
</body>
</html>
