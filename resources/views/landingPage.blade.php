@extends('layouts.main')

@section('main')
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Add your scarf now!') }}</button>
    <h2 class="text-xl font-bold mb-4">{{ __('Recent Additions') }}</h2>
@endsection
