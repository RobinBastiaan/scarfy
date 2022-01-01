<div class="">
    <div class="">
        @include('components.scarf-card', ['scarf' => $group->currentScarfUsage->scarf])
    </div>
    <div class="">
        <div class="">
            <div class=""><a href="{{ route('groups.show', $group->slug) }}">{{ $group->name }}</a></div>
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
</div>
