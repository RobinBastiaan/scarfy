@extends('layouts.main')

@section('main')
    <h1 class="text-4xl font-bold mb-4">{{ __('Add Your Scarf') }}</h1>

    <form action="{{ route('scarves.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2 class="text-xl font-bold">{{ __('Base') }}</h2>
        <label for="color-scheme">{{ __('Color Scheme') }}*</label>
        <input id="color-scheme" type="text" name="color_scheme" placeholder="{{ __('Color or pattern') }}" value="{{ old('color_scheme') }}" required>
        <label for="color-scheme-right">{{ __('Color Scheme Right') }}</label>
        <input id="color-scheme-right" type="text" name="color_scheme_right" placeholder="{{ __('Color or pattern') }}" value="{{ old('color_scheme_right') }}">

        <h2 class="text-xl mt-4 font-bold">{{ __('Edge from outer to inner') }}</h2>
        @for ($i = 1; $i <= Scarf::MAX_EDGES_PER_SCARF; $i++)
            <h3 class="text-l mt-2 font-bold">{{ __('Edge') }} {{ $i }}</h3>
            <label for="edge-size{{ $i }}">{{ __('Edge Size') }}</label>
            <input id="edge-size{{ $i }}" type="text" name="edge_size{{ $i }}" placeholder="{{ __('In millimeters') }}" value="{{ old('edge_size' . $i) }}">
            <label for="edge-color-scheme{{ $i }}">{{ __('Edge Color Scheme') }}</label>
            <input id="edge-color-scheme{{ $i }}" type="text" name="edge_color_scheme{{ $i }}" placeholder="{{ __('Color or pattern') }}" value="{{ old('edge_color_scheme' . $i) }}">
            <label for="edge-color-scheme-right{{ $i }}">{{ __('Edge Color Scheme Right') }}</label>
            <input id="edge-color-scheme-right{{ $i }}" type="text" name="edge_color_scheme_right{{ $i }}" placeholder="{{ __('Color or pattern') }}" value="{{ old('edge_color_scheme_right' . $i) }}">
        @endfor

        <div class="clearfix"></div>

        <input type="file" name="image" class="block shadow-5xl md-10 p-2 w-80 italic placeholder-gray-400">

        <div class="clearfix"></div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Add') }}</button>
    </form>
@endsection
