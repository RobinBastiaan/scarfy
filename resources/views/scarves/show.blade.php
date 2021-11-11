<section class="rounded-lg m-1 p-1">
    <svg viewBox="0 0 100 25">
        <defs>
            @if($scarf->has_pattern())
                <pattern id="pattern{{ $scarf->id }}" patternUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                    <image href="{{ asset('patterns/' . $scarf->color_scheme . '.png') }}"/>
                </pattern>
                <polygon id="shape{{ $scarf->id }}" points="0 0, 100 0, 50 25" style="fill:url(#pattern{{ $scarf->id }})"/>
            @else
                <polygon id="shape{{ $scarf->id }}" points="0 0, 100 0, 50 25" style="fill:{{ $scarf->color_scheme }}"/>
            @endif
        </defs>

        <use width="100" height="50" xlink:href="#shape{{ $scarf->id }}" fill="url(#pattern{{ $scarf->id }})"/>

        @if($scarf->edge_size)
            <polygon points="0 0, 10 0, 50 20, 90 0, 100 0, 50 25" style="fill:{{ $scarf->edge_color_scheme }}"/>
        @endif
    </svg>
</section>
