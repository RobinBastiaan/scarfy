@extends('layouts.main')

@section('main')
    <h1 class="">{{ __('Add Your Scouting Group') }}</h1>

    <form action="{{ route('groups.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2 class="">{{ __('Details') }}</h2>
        <label for="name">{{ __('Name') }}</label>
        <input id="name" type="text" name="name" placeholder="" value="{{ old('name') }}" required>
        <label for="website">{{ __('Website') }}</label>
        <input id="website" type="url" name="website" placeholder="" value="{{ old('website') }}">
        <label for="city">{{ __('City') }}</label>
        <input id="city" type="text" name="city" placeholder="" value="{{ old('city') }}" required>

        <div class="clearfix"></div>

        <h2 class="">{{ __('Dates') }}</h2>
        <label for="founded-on">{{ __('Founded On') }}</label>
        <input id="founded-on" type="date" name="founded_on" placeholder="" value="{{ old('founded_on') }}" required>
        <label for="cancelled-on">{{ __('Cancelled On') }}</label>
        <input id="cancelled-on" type="date" name="cancelled_on" placeholder="" value="{{ old('cancelled_on') }}">

        {{-- These fields can be made non-hidden when internationalisation is needed. --}}
        <input type="hidden" name="country" placeholder="" value="Netherlands">
        <input type="hidden" name="association_id" placeholder="" value="1">

        <div class="clearfix"></div>

        <button type="submit" class="">{{ __('Add') }}</button>
    </form>
@endsection
