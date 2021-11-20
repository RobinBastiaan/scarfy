@extends('layouts.main')

@section('main')
    <h1 class="text-4xl font-bold mb-4">{{ __('Scarf') }}</h1>

    @include('components.scarf-card')

    <section>
        <h2 class="text-xl font-bold my-4">{{ __('Scout Groups with this scarf') }}</h2>
        <table>
            @foreach ($scarf->scarfUsages as $scarfUsage)
                <tr>
                    <td><a href="{{ route('groups.show', $scarfUsage->scoutGroup->slug) }}">{{ $scarfUsage->scoutGroup->name }}</a></td>
                    <td>{{ __(ucfirst($scarfUsage->scarfUsageType->name)) }} {{ __('Scarf') }}</td>
                    <td>@if($scarfUsage->used_until) {{ __('Used Until') }} {{ $scarfUsage->used_until }} @endif</td>
                </tr>
            @endforeach
        </table>
    </section>

    <div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Looks Good') }}</button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Looks Wrong') }}</button>
    </div>
@endsection
