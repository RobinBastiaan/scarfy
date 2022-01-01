<div class="scout-group col-12 col-md-6 col-lg-4">
    <div class="p-3 bg-light">
        @include('components.scarf-card', ['scarf' => $group->currentScarfUsage->scarf])
        <h3 class="fw-bold"><a class="text-decoration-none" href="{{ route('groups.show', $group->slug) }}">{{ $group->name }}</a></h3>
        <div class="">
            <span class="">{{ $group->city }}, {{ __($group->country) }}</span>
        </div>
        @if ($group->website)
            <div class="">
                <a target="_blank" href="{{ $group->getWebsiteUrl() }}">{{ $group->website }}</a>
            </div>
        @endif
    </div>
</div>
