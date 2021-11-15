@extends('layouts.main')

@section('main')
    <h1 class="text-4xl font-bold mb-4">{{ __('Scarves') }}</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-1">
        @foreach ($scarves as $scarf)
            @include('components.scarf-card')
        @endforeach
    </div>

    {{ $scarves->links() }}

    <a class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="{{ route('scarves.create') }}">{{ __('Add your scarf now!') }}</a>
@endsection
