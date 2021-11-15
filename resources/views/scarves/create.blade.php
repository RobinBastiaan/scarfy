@extends('layouts.main')

@section('main')
    <h1 class="text-4xl font-bold mb-4">{{ __('Add Your Scarf') }}</h1>

    <form action="{{ route('scarves.store') }}" method="POST">
        @csrf

        <label for="color-scheme">{{ __('Color Scheme') }}</label>
        <input id="color-scheme" type="text" name="color_scheme" placeholder="{{ __('Color or pattern') }}" value="{{ old('color_scheme') }}">
        <label for="edge-size">{{ __('Edge Size') }}</label>
        <input id="edge-size" type="text" name="edge_size" placeholder="{{ __('In millimeters') }}" value="{{ old('edge_size') }}">
        <label for="edge-color-scheme">{{ __('Edge Color Scheme') }}</label>
        <input id="edge-color-scheme" type="text" name="edge_color_scheme" placeholder="{{ __('Color or pattern') }}" value="{{ old('edge_color_scheme') }}">

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Add') }}</button>
    </form>
@endsection
