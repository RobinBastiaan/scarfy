@extends('layouts.main')

@section('main')
    <article class="container">
        <div class="m-4">
            <h2 class="fw-bold">{{ __('Under Construction') }}</h2>
            <p class="lead">{{ __('This website is under construction. Please come back another time.') }}</p>
            <img class="img-fluid rounded" src="{{ asset('images/under-construction.jpg') }}" width="600" alt="{{ __('A wooden fence in front of mountainous and pristine nature') }}.">
        </div>
    </article>

    @include('components.socials')
@endsection
