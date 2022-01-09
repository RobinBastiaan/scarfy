@extends('layouts.main')

@section('main')
    <h1>{{ __('Add Your Scouting Group') }}</h1>

    <form class="row" action="{{ route('groups.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2 class="pt-3 m-0">{{ __('Details') }}</h2>
        <div class="col-12 col-md-6">
            <label for="name" class="col-form-label">{{ __('Name') }}*</label>
            <input id="name" class="form-control" type="text" name="name" placeholder="" value="{{ old('name') }}" required>
        </div>
        <div class="col-12 col-md-6">
            <label for="city" class="col-form-label">{{ __('City') }}*</label>
            <input id="city" class="form-control" type="text" name="city" placeholder="" value="{{ old('city') }}" required>
        </div>
        <div class="col-12">
            <label for="website" class="col-form-label">{{ __('Website') }}</label>
            <input id="website" class="form-control" type="url" name="website" placeholder="" value="{{ old('website') }}">
        </div>

        <h2 class="pt-3 m-0">{{ __('Dates') }}</h2>
        <div class="col-12 col-md-6">
            <label for="founded-on" class="col-form-label">{{ __('Founded on') }}*</label>
            <input id="founded-on" class="form-control" type="date" name="founded_on" placeholder="" value="{{ old('founded_on') }}" required>
        </div>
        <div class="col-12 col-md-6">
            <label for="cancelled-on" class="col-form-label">{{ __('Cancelled on') }}</label>
            <input id="cancelled-on" class="form-control" type="date" name="cancelled_on" placeholder="" value="{{ old('cancelled_on') }}">
        </div>

        {{-- These fields can be made non-hidden when internationalisation is needed. --}}
        <input class="form-control" type="hidden" name="country" placeholder="" value="Netherlands">
        <input class="form-control" type="hidden" name="association_id" placeholder="" value="1">

        <div class="col-12 py-3">
            <button class="btn btn-primary" type="submit">{{ __('Add') }}</button>
        </div>
    </form>
@endsection
