@extends('layouts.main')

@section('main')
    <h1>Scout Groups</h1>
    <div>
        @foreach ($groups as $group)
            <h2>{{ $group->name }}</h2>
            <p>
                {{ $group->website }}
                <br>{{ $group->city }}, {{ $group->country }}
            </p>
            @include('scarves.show', ['scarf' => $group->scarf])
        @endforeach
    </div>
@endsection
