@extends('layouts.main')

@section('main')
    <h1 class="text-4xl font-bold mb-4">{{ __('Scout Groups') }}</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6">
        @foreach ($groups as $group)
            @include('groups.show', ['group' => $group])
        @endforeach
    </div>

    {{ $groups->links() }}
@endsection
