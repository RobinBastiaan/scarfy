@extends('layouts.main')

@section('main')
    <h1 class="text-4xl font-bold mb-4">{{ __('Scout Groups') }}</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6">
        @foreach ($groups as $group)
            <div class="rounded-lg shadow-lg bg-gray-100 flex flex-row flex-wrap p-3 antialiased">
                <div class="md:w-1/3 w-full">
                    @include('scarves.show', ['scarf' => $group->scarf])
                </div>
                <div class="md:w-2/3 w-full px-3 flex flex-row flex-wrap">
                    <div class="w-full text-right text-gray-700 font-semibold relative pt-3 md:pt-0">
                        <div class="text-2xl text-gray-700 leading-tight">{{ $group->name }}</div>
                        <div class="text-normal text-gray-300 hover:text-gray-400 cursor-pointer">
                            <span class="border-b border-dashed border-gray-500 pb-1">{{ $group->city }}, {{ __($group->country) }}</span>
                        </div>
                        <div class="text-sm text-gray-300 hover:text-gray-400 cursor-pointer md:absolute pt-3 md:pt-0 bottom-0 right-0">{{ $group->website }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $groups->links() }}
@endsection
