@extends('layouts.main')

@section('main')
    <div class="container m-4">
        <h1>{{ __('Scout Group') }}</h1>

        <div class="row py-3">
            @include('components.group-card', ['cols' => 'col-12 col-md-6'])

            <section class="col-12 col-md-6 px-4 py-3 py-md-0">
                <h2>{{ __('Additional Information') }}</h2>
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

                <div class="float-end px-3">
                    <button type="button" class="btn btn-success"><i class="fa fa-thumbs-up"></i> {{ __('Looks Good') }}</button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-thumbs-down"></i> {{ __('Looks Wrong') }}</button>
                </div>
            </section>
        </div>

        @php $group->scarfUsages->shift() @endphp {{-- Remove the first/main scarf, to only display the other scarves of this group --}}
        @if ($group->scarfUsages->isNotEmpty())
            <section class="row py-3">
                <h2>{{ __('Other Scarves Of This Scouting Group') }}</h2>
                @foreach($group->scarfUsages as $scarfUsage)
                    <div class="col-12 col-md-6 col-lg-4">
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
            <section class="row py-3">
                <h2>{{ __('Neighboring Scouting Groups') }}{!! $neighboringGroups->count() <= 6 ? '' : ' (' . $neighboringGroups->count() . ')' !!}</h2>
                @foreach ($neighboringGroups as $group)
                    @include('components.group-card', ['group', $group])
                @endforeach
            </section>
        @endif
    </div>
@endsection
