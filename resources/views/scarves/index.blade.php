@extends('layouts.main')

@section('main')
    <h1>Scarves</h1>
    <div>
        @foreach ($scarves as $scarf)
            @include('scarves.show')
        @endforeach
    </div>
@endsection
