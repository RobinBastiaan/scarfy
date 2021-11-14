<div class="rounded-lg shadow-lg bg-gray-100 flex flex-row flex-wrap p-3 antialiased">
    <div class="md:w-1/3 w-full">
        @include('components.scarf-card', ['scarf' => $group->scarf])
    </div>
    <div class="md:w-2/3 w-full px-3 flex flex-row flex-wrap">
        <div class="w-full text-right text-gray-700 font-semibold relative pt-3 md:pt-0">
            <div class="text-2xl text-gray-700 leading-tight"><a href="{{ route('groups.show', $group->slug) }}">{{ $group->name }}</a></div>
            <div class="text-normal text-gray-300 hover:text-gray-400 cursor-pointer">
                <span class="border-b border-dashed border-gray-500 pb-1">{{ $group->city }}, {{ __($group->country) }}</span>
            </div>
            @if ($group->website)
                <div class="text-sm text-gray-300 hover:text-gray-400 cursor-pointer md:absolute pt-3 md:pt-0 bottom-0 right-0">
                    <a target="_blank" href="{{ $group->getWebsiteUrl() }}">{{ $group->website }}</a>
                </div>
            @endif
        </div>
    </div>
</div>
