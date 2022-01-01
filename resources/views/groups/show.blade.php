@extends('layouts.main')

@section('main')
    <h1 class="">{{ __('Scout Group') }}</h1>

    @include('components.group-card')

    <section>
        <h2 class="">{{ __('Additional Information') }}</h2>
        <dl>
            <dt>{{ __('Association') }}</dt>
            <dd>{{ $group->association->name }}</dd>
            <dt>{{ __('Founded on') }}</dt>
            <dd>{{ $group->founded_on }}</dd>
            @if ($group->cancelled_on)
                <dt>{{ __('Canceled on') }}</dt>
                <dd>{{ $group->cancelled_on }}</dd>
            @endif
        </dl>
    </section>

    <div>
        <button class="">{{ __('Looks Good') }}</button>
        <button class="">{{ __('Looks Wrong') }}</button>
    </div>

    @php $group->scarfUsages->shift() @endphp {{-- Remove the first/main scarf, to only display the other scarves of this group --}}
    @if ($group->scarfUsages->isNotEmpty())
        <section>
            <h2 class="">{{ __('Other Scarves Of This Scouting Group') }}</h2>
            @foreach($group->scarfUsages as $scarfUsage)
                <div class="">
                    @include('components.scarf-card', ['scarf' => $scarfUsage->scarf])
                    <dl>
                        <dt>{{ __('Use type') }}</dt>
                        <dd>{{ __(ucfirst($scarfUsage->scarfUsageType->name)) }} {{ __('Scarf') }}</dd>
                        <dt>{{ __('Introduced on') }}</dt>
                        <dd>{{ $scarfUsage->introduced_on }}</dd>
                        @if ($scarfUsage->cancelled_on)
                            <dt>{{ __('Used Until') }}</dt>
                            <dd>{{ $scarfUsage->cancelled_on }}</dd>
                        @endif
                    </dl>
                </div>
            @endforeach
        </section>
    @endif

    @if ($neighboringGroups->isNotEmpty())
        <section>
            <h2 class="">{{ __('Neighboring Scouting Groups') }} ({{ $neighboringGroups->count() }})</h2>
            @foreach ($neighboringGroups as $group)
                @include('components.group-card', ['group', $group])
            @endforeach
        </section>
    @endif
@endsection
