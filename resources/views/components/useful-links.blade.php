@if (!empty($usefulLinks))
    <section class="px-4 py-5 mt-2 text-center">
        <div class="my-2">
            <h2>{{ __('Useful Links') }}</h2>
            @foreach ($usefulLinks as $name => $link)
                <a class="btn btn-link" href="{{ $link }}"><i class="fa fa-external-link-alt"></i> {{ $name }}</a>
            @endforeach
        </div>
        <div class="my-2">
            {{ __('Is your favorite link not mentioned here yet?') }}
            <a class="btn btn-outline-secondary" href="https://www.facebook.com/ScoutScarf-105901955316548">
                <i class="fa fa-external-link-alt"></i> {{ __('Laat het me weten!') }}
            </a>
        </div>
    </section>
@endif
