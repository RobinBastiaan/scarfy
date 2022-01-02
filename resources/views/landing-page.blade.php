@extends('layouts.main')

@section('content')
    <section class="parallax-header">
        <div class="px-4 py-5 text-center">
            <h1 class="display-5 fw-bold text-light">Scarfy</h1>
            <p class="col-lg-6 mx-auto lead text-light">{{ __('A community driven database of scouting scarves.') }}</p>
            <a class="btn btn-success btn-lg px-4" href="{{ route('scarves.create') }}">{{ __('Add your scarf now!') }}</a>
        </div>
    </section>

    <div class="container my-5 py-2">
        <div class="row m-4 text-center">
            <section class="card border-0 col-sm pt-2">
                <div class="card-body">
                    <h2 class="mb-0"><img class="card-title" src="{{ asset('icons/scarf.png') }}" alt="" width="40" height="40"> {{ $totalScarves }}</h2>
                    <p class="card-text">{{ __('Scarves') }}</p>
                </div>
            </section>
            <section class="card border-0 col-sm pt-2">
                <div class="card-body">
                    <h2 class="mb-0"><img class="card-title" src="{{ asset('icons/scouting.png') }}" alt="" width="40" height="40"> {{ $totalScoutGroups }}</h2>
                    <p class="card-text">{{ __('Scout Groups') }}</p>
                </div>
            </section>
        </div>
    </div>

    @if ($recentAdditions->isNotEmpty())
        <section class="container">
            <h2 class="">{{ __('Recent Additions') }}</h2>
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                @foreach ($recentAdditions as $group)
                    @include('components.group-card', ['group', $group])
                @endforeach
            </div>
            <a class="d-block py-2" href="{{ route('groups.index') }}">{{ __('View all scout groups') }}</a>
        </section>
    @endif

    @include('components.socials')
@endsection
