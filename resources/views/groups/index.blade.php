@extends('layouts.main')

@section('main')
    <h1 class="">{{ __('Scout Groups') }}</h1>
    <form action="{{ route('groups.index') }}" method="get">
        <label for="name">{{ __('Name') }}</label>
        <input type="text" id="name" name="name" value="{{ request()->input('name') }}"><br>
        <label for="city">{{ __('City') }}</label>
        <input type="text" id="city" name="city" value="{{ request()->input('city') }}"><br>

        <input type="submit" value="{{ __('Search') }}">
    </form>

    <div class="">
        @foreach ($groups as $group)
            @include('components.group-card', ['group' => $group])
        @endforeach
    </div>

    {{ $groups->links() }}

    <a class="" href="{{ route('groups.create') }}">{{ __('Add your scouting group now!') }}</a>
@endsection
