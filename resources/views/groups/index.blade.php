@extends('layouts.main')

@section('main')
    <h1>{{ __('Scout Groups') }}</h1>
    <form class="row g-3 align-items-center" action="{{ route('groups.index') }}" method="get">
        <div class="col-12 col-md-6">
            <div class="col-auto">
                <label for="name" class="col-form-label">{{ __('Name') }}</label>
            </div>
            <div class="col-auto">
                <input class="form-control" type="text" id="name" name="name" value="{{ request()->input('name') }}">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="col-auto">
                <label for="city" class="col-form-label">{{ __('City') }}</label>
            </div>
            <div class="col-auto">
                <input class="form-control" type="text" id="city" name="city" value="{{ request()->input('city') }}">
            </div>
        </div>

        <input class="btn btn-primary" type="submit" value="{{ __('Search') }}">
    </form>

    @if(!empty($groups))
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 py-3">
            @foreach ($groups as $group)
                @include('components.group-card', ['group' => $group])
            @endforeach
        </div>
    @else
        <div class="row">
            <div class="col-12 position-relative py-5 text-center">
                <img class="img-fluid rounded hero__image" src="{{ asset('images/no-results.jpg') }}" width="600" alt="{{ __('No Results Found.') }}.">
                <p class="hero__caption fw-bold">
                    {{ __('No Results Found.') }}
                </p>
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-center">
        {{ $groups->links() }}
    </div>

    <a href="{{ route('groups.create') }}">{{ __('Add your scouting group now!') }}</a>
@endsection
