@extends('layouts.main')

@section('main')
    <h1 class="text-4xl font-bold mb-4">{{ __('Scarves') }}</h1>
    <form action="{{ route('scarves.index') }}" method="get">
        <input type="hidden" name="with_diagonal" value="0">
        <input type="checkbox" id="with_diagonal" name="with_diagonal" value="1"
            {{ (request()->input('with_diagonal') === null or request()->input('with_diagonal') === '1') ? 'checked' : '' }}>
        <label for="with_diagonal">{{ __('With Diagonal') }}</label>
        <input type="hidden" name="without_diagonal" value="0">
        <input type="checkbox" id="without_diagonal" name="without_diagonal" value="1"
            {{ (request()->input('without_diagonal') === null or request()->input('without_diagonal') === '1') ? 'checked' : '' }}>
        <label for="without_diagonal">{{ __('Without Diagonal') }}</label><br>

        <input type="hidden" name="with_border" value="0">
        <input type="checkbox" id="with_border" name="with_border" value="1"
            {{ (request()->input('with_border') === null or request()->input('with_border') === '1') ? 'checked' : '' }}>
        <label for="with_border">{{ __('With Border') }}</label>
        <input type="hidden" name="without_border" value="0">
        <input type="checkbox" id="without_border" name="without_border" value="1"
            {{ (request()->input('without_border') === null or request()->input('without_border') === '1') ? 'checked' : '' }}>
        <label for="without_border">{{ __('Without Border') }}</label><br>

        <input type="hidden" name="with_image" value="0">
        <input type="checkbox" id="with_image" name="with_image" value="1"
            {{ (request()->input('with_image') === null or request()->input('with_image') === '1') ? 'checked' : '' }}>
        <label for="with_image">{{ __('With Image') }}</label>
        <input type="hidden" name="without_image" value="0">
        <input type="checkbox" id="without_image" name="without_image" value="1"
            {{ (request()->input('without_image') === null or request()->input('without_image') === '1') ? 'checked' : '' }}>
        <label for="without_image">{{ __('Without Image') }}</label><br>

        <input type="submit" value="{{ __('Search') }}">
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-1">
        @foreach ($scarves as $scarf)
            @include('components.scarf-card')
        @endforeach
    </div>

    {{ $scarves->links() }}

    <a class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="{{ route('scarves.create') }}">{{ __('Add your scarf now!') }}</a>
@endsection
