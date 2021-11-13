@extends('layouts.main')

@section('main')
    <section>
        <h2>Scarfy</h2>
        <p>{{ __('A community driven database of scouting scarves.') }}</p>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Add your scarf now!') }}</button>
        <img src="{{ asset('images/banner1.jpg') }}" width="600" alt="{{ __('A patrol of scouts walking in nature on a sunny day') }}.">
    </section>

    <section>
        <div>
            <img src="{{ asset('icons/scarf.png') }}" alt="" width="40" height="40">
            <h2>{{ __('Scarves') }}</h2>
            <p>{{ $totalScarves }}</p>
        </div>
        <div>
            <img src="{{ asset('icons/scouting.png') }}" alt="" width="40" height="40">
            <h2>{{ __('Scout Groups') }}</h2>
            <p>{{ $totalScoutGroups }}</p>
        </div>
    </section>

    <section>
        <h2 class="text-xl font-bold mb-4">{{ __('Recent Additions') }}</h2>
        @foreach ($recentAdditions as $group)
            @include('components.group-card', ['group', $group])
        @endforeach
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('View all scout groups') }}</button>
    </section>
@endsection
