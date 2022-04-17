@extends('layouts.app')

@section('body')
    <div class="parallax">
        @include('components.main-navigation')

        {{-- Hero Banner --}}
        <header>
            <div class="px-4 py-5 text-center">
                <h1 class="display-5 fw-bold text-light">{{ config('app.name') }}</h1>
                <p class="col-lg-6 mx-auto lead text-light">{{ __('A community driven database of scouting scarves.') }}</p>
                <a class="btn btn-success btn-lg px-4" href="{{ route('scarves.create') }}">{{ __('Add your scarf now!') }}</a>
            </div>
            <img width="500" alt="" src="{{ asset('images/banner1-background.png') }}" class="background">
            <img alt="{{ __('A patrol of scouts walking in nature on a sunny day') }}" src="{{ asset('images/banner1-foreground.png') }}" class="foreground">
        </header>

        <div class="bg-white">
            {{-- Quick Stats --}}
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

            {{-- Recent Additions --}}
            @if ($recentAdditions->isNotEmpty())
                <section class="container">
                    <h2>{{ __('Recent Additions') }}</h2>
                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                        @foreach ($recentAdditions as $group)
                            @include('components.group-card', ['group', $group])
                        @endforeach
                    </div>
                    <a class="d-block py-2" href="{{ route('groups.index') }}">{{ __('View all scout groups') }}</a>
                </section>
            @endif

            {{-- Scout Scarf Day --}}
            @if ($showScoutScarfDay)
                <section class="container px-4 py-5 mt-2 text-center">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <h2>{{ __('Scout Scarf Day') }}</h2>
                            <p>
                                {!! __('Each year on <b>August 1</b>, scouts across the world celebrate World Scout Scarf Day.') !!}
                                {{ __('This day is for all active and former scout members to showcase their scout pride by wearing their scarves in public.') }}
                            </p>
                            <p>
                                {{ __('Will you too be wearing your scarf on Scout Scarf Day?') }}
                            </p>
                            <a class="btn btn-success" href="https://www.facebook.com/Scout.Scarf.Day">{{ __('Yes, of course') }}</a>
                            <a class="btn btn-secondary" href="https://www.scoutscarfday.com">{{ __('Explore more') }}</a>
                        </div>
                        <div class="col-md-6 my-2">
                            <img width="100%" style="max-width: 400px" src="{{ asset('images/world-scarf-day.jpg') }}"
                                 alt="{{ __('A drawing of scarves laid out in a circle for World Scarf Day') }}">
                        </div>
                    </div>
                </section>
            @endif
        </div>

        {{-- Usefull Links --}}
        @include('components/useful-links')

        @include('components.socials')
    </div>
@endsection
