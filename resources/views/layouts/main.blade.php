@extends('layouts.app')

@section('body')
    @include('components.main-navigation')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>{{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main class="d-flex justify-content-center mt-4">
        <div class="container my-4">
            @yield('main')
        </div>
    </main>
@endsection
