<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="{{ asset('') }}" class="nav-link">
            <img src="{{ asset('logo.png') }}" alt="Home" width="32" height="32">
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
