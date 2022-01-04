@extends('layouts.main')

@section('main')
    <h1>{{ __('Add Your Scarf') }}</h1>

    <form action="{{ route('scarves.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2>{{ __('Base') }}</h2>
        <label for="color-scheme">{{ __('Color Scheme') }}*</label>
        <input id="color-scheme" type="text" name="color_scheme" placeholder="{{ __('Color or pattern') }}" value="{{ old('color_scheme') }}" required>
        <label for="color-scheme-right">{{ __('Color Scheme Right') }}</label>
        <input id="color-scheme-right" type="text" name="color_scheme_right" placeholder="{{ __('Color or pattern') }}" value="{{ old('color_scheme_right') }}">

        <h2>{{ __('Edge from outer to inner') }}</h2>
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

        <h2>{{ __('Badge') }}</h2>
        <input type="file" name="image">

        <div class="clearfix"></div>

        <h2>{{ __('Text') }}</h2>
        <label for="text">{{ __('Text') }}</label>
        <input id="text" type="text" name="text" placeholder="" value="{{ old('text') }}">
        <label for="text-color">{{ __('Text Color') }}</label>
        <input id="text-color" type="text" name="text_color" placeholder="" value="{{ old('text_color') }}">
        <label for="text-font">{{ __('Text Font') }}</label>
        <input id="text-font" type="text" name="text_font" placeholder="" value="{{ old('text_font') }}">

        <div class="clearfix"></div>

        <button type="submit">{{ __('Add') }}</button>
    </form>
@endsection
