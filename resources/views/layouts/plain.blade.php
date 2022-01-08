@extends('layouts.app')

@section('body')
    <div class="bg-light" style="height: 64px"></div>

    <main class="d-flex justify-content-center mt-4">
        <div class="container my-4">
            @yield('plain')
        </div>
    </main>
@endsection
