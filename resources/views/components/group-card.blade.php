<div class="scout-group {!! !empty($cols) ? $cols : 'col-12 col-sm-6 col-lg-4' !!}">
    <div class="p-3 bg-light">
        @if ($group->currentScarfUsage)
            @include('components.scarf-card', ['scarf' => $group->currentScarfUsage->scarf])
        @endif

        <h3 class="fw-bold"><a class="text-decoration-none" href="{{ route('groups.show', $group->slug) }}">{{ $group->name }}</a></h3>
        <div>
            <span>{{ $group->city }}, {{ __($group->country) }}</span>
        </div>
        @if ($group->website)
            <div>
                <a class="d-block text-truncate" target="_blank" href="{{ $group->getWebsiteUrl() }}">{{ $group->website }}</a>
            </div>
        @endif
    </div>
</div>
