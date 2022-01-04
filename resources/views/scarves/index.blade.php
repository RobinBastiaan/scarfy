@extends('layouts.main')

@section('main')
    <div class="container m-4">
        <h1>{{ __('Scarves') }}</h1>
        <form action="{{ route('scarves.index') }}" method="get">
            <div class="form-check form-check-inline">
                <input type="hidden" name="with_diagonal" value="0">
                <input type="checkbox" id="with_diagonal" name="with_diagonal" value="1"
                    {{ (request()->input('with_diagonal') === null or request()->input('with_diagonal') === '1') ? 'checked' : '' }}>
                <label for="with_diagonal">{{ __('With Diagonal') }}</label>
            </div>

            <div class="form-check form-check-inline">
                <input type="hidden" name="without_diagonal" value="0">
                <input type="checkbox" id="without_diagonal" name="without_diagonal" value="1"
                    {{ (request()->input('without_diagonal') === null or request()->input('without_diagonal') === '1') ? 'checked' : '' }}>
                <label for="without_diagonal">{{ __('Without Diagonal') }}</label>
            </div>

            <div class="form-check form-check-inline">
                <input type="hidden" name="with_border" value="0">
                <input type="checkbox" id="with_border" name="with_border" value="1"
                    {{ (request()->input('with_border') === null or request()->input('with_border') === '1') ? 'checked' : '' }}>
                <label for="with_border">{{ __('With Border') }}</label>
            </div>

            <div class="form-check form-check-inline">
                <input type="hidden" name="without_border" value="0">
                <input type="checkbox" id="without_border" name="without_border" value="1"
                    {{ (request()->input('without_border') === null or request()->input('without_border') === '1') ? 'checked' : '' }}>
                <label for="without_border">{{ __('Without Border') }}</label>
            </div>

            <div class="form-check form-check-inline">
                <input type="hidden" name="with_image" value="0">
                <input type="checkbox" id="with_image" name="with_image" value="1"
                    {{ (request()->input('with_image') === null or request()->input('with_image') === '1') ? 'checked' : '' }}>
                <label for="with_image">{{ __('With Image') }}</label>
            </div>

            <div class="form-check form-check-inline">
                <input type="hidden" name="without_image" value="0">
                <input type="checkbox" id="without_image" name="without_image" value="1"
                    {{ (request()->input('without_image') === null or request()->input('without_image') === '1') ? 'checked' : '' }}>
                <label for="without_image">{{ __('Without Image') }}</label>
            </div>

            <input class="btn btn-primary" type="submit" value="{{ __('Search') }}">
        </form>

        <div class="row py-3">
            @forelse ($scarves as $scarf)
                <div class="col-12 col-sm-6 col-md-4">
                    @include('components.scarf-card')
                </div>
            @empty
                <div class="col-12 p-5 text-center">
                    {{ __('No Results Found.') }}
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $scarves->links() }}
        </div>

        <a href="{{ route('scarves.create') }}">{{ __('Add your scarf now!') }}</a>
    </div>
@endsection
