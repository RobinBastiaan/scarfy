@extends('layouts.main')

@section('main')
    <h1 class="text-4xl font-bold">Scarves</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-1">
        @foreach ($scarves as $scarf)
            @include('scarves.show')
        @endforeach
    </div>
@endsection
