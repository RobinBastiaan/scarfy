@extends('layouts.main')

@section('main')
    <h1 class="text-4xl font-bold mb-4">{{ __('Scout Group') }}</h1>

    @include('components.group-card')

    <section>
        <h2 class="text-xl font-bold my-4">{{ __('Additional Information') }}</h2>
        <dl>
            <dt>{{ __('Association') }}</dt>
            <dd>{{ $group->association->name }}</dd>
            <dt>{{ __('Founded on') }}</dt>
            <dd>{{ $group->founded_on }}</dd>
            @if ($group->cencelled_on)
                <dt>{{ __('Canceled on') }}</dt>
                <dd>{{ $group->cencelled_on }}</dd>
            @endif
        </dl>
    </section>

    <div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Looks Good') }}</button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Looks Wrong') }}</button>
    </div>

    @if ($neighboringGroups->isNotEmpty())
        <section>
            <h2 class="text-4xl font-bold mb-4">{{ __('Neighboring Scouting Groups') }}</h2>
            @foreach ($neighboringGroups as $group)
                @include('components.group-card', ['group', $group])
            @endforeach
        </section>
    @endif
@endsection
