@extends('layouts.main')

@section('title', __('Scarf') . ' - ')

@section('main')
    <h1>{{ __('Scarf') }}</h1>
    <div class="clearfix p-2">
        @include('components.scarf-card')

        @if ($scarf->hasPattern())
            <div class="px-3">
                <b>{{ __('Pattern')  }}:</b> {{ $scarf->readablePattern() }}
            </div>
        @endif

        <div class="float-end px-3">
            <form class="inline" action="{{ route('votes.store') }}" method="POST">
                @csrf
                <input type="hidden" name="voteable_type" value="scarves">
                <input type="hidden" name="voteable_id" value="{{ __($scarf->id) }}">
                <button type="submit" class="btn btn-success" name="is_good" value="1"><i class="fa fa-thumbs-up"></i> {{ __('Looks Good') }}</button>
                <button type="submit" class="btn btn-danger" name="is_good" value="0"><i class="fa fa-thumbs-down"></i> {{ __('Looks Wrong') }}</button>
            </form>
        </div>
    </div>

    <section class="my-5">
        <h2>{{ __('Scout Groups with this scarf') }}{!! $scarf->scarfUsages->count() <= 6 ? '' : ' (' . $scarf->scarfUsages->count() . ')' !!}</h2>
        <table class="table">
            @forelse ($scarf->scarfUsages as $scarfUsage)
                <tr @if ($scarfUsage->used_until) class="table-active text-muted" @endif >
                    <td><a href="{{ route('groups.show', $scarfUsage->scoutGroup->slug) }}">{{ $scarfUsage->scoutGroup->name }}</a></td>
                    <td>{{ __(ucfirst($scarfUsage->scarfUsageType->name)) }} {{ __('Scarf') }}</td>
                    <td>@if($scarfUsage->introduced_on)<i class="fa fa-plus"></i> {{ __('Introduced on') }} {{ $scarfUsage->introduced_on }} @endif</td>
                    <td>@if($scarfUsage->used_until)<i class="fa fa-times"></i> {{ __('Used Until') }} {{ $scarfUsage->used_until }} @endif</td>
                </tr>
            @empty
                <tr><td>{{ __('No scout groups known to this scarf yet.') }}</td></tr>
            @endforelse
        </table>
    </section>

    <a href="{{ route('scarves.add-group', ['scarf' => $scarf]) }}">{{ __('Add a scouting group to this scarf!') }}</a>
@endsection
