@extends('layouts.main')

@section('main')
    <h1 class="">{{ __('Scarf') }}</h1>

    @include('components.scarf-card')

    <section>
        <h2 class="">{{ __('Scout Groups with this scarf') }} ({{ $scarf->scarfUsages->count() }})</h2>
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
        <button class="">{{ __('Looks Good') }}</button>
        <button class="">{{ __('Looks Wrong') }}</button>
    </div>
@endsection
