<section class="rounded-lg m-1 p-1">
    <a href="{{ route('scarves.show', $scarf->id) }}">
        <svg viewBox="0 0 {{ Scarf::WIDTH }} {{ Scarf::HEIGHT }}">
            {{-- Pattern Definition --}}
            <defs>
                @if($scarf->hasPattern())
                    <pattern id="pattern{{ $scarf->id }}" patternUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                        <image href="{{ asset('patterns/' . $scarf->color_scheme . '.png') }}"/>
                    </pattern>
                @endif
            </defs>

            {{-- Base --}}
            @if($scarf->hasPattern())
                <polygon points="0 0, {{ Scarf::WIDTH }} 0, {{ Scarf::WIDTH/2 }} {{ Scarf::HEIGHT }}" style="fill:url(#pattern{{ $scarf->id }})"/>
            @else
                <polygon points="0 0, {{ Scarf::WIDTH }} 0, {{ Scarf::WIDTH/2 }} {{ Scarf::HEIGHT }}"
                         style="fill:{{ $scarf->color_scheme }};@if($scarf->color_scheme === '#ffffff') {{ 'stroke:lightgrey;' }}@endif"/>
            @endif
            @if($scarf->color_scheme_right)
                @if($scarf->hasPattern('color_scheme_right'))
                    <polygon points="{{ Scarf::WIDTH/2 }} 0, {{ Scarf::WIDTH }} 0, {{ Scarf::WIDTH/2 }} {{ Scarf::HEIGHT }}" style="fill:url(#pattern{{ $scarf->id }})"/>
                @else
                    <polygon points="{{ Scarf::WIDTH/2 }} 0, {{ Scarf::WIDTH }} 0, {{ Scarf::WIDTH/2 }} {{ Scarf::HEIGHT }}" style="fill:{{ $scarf->color_scheme_right }}"/>
                @endif
            @endif

            {{-- Edges --}}
            @php $cumulativeEdgeSize = 0 @endphp
            @for($i = 1; $i <= Scarf::MAX_EDGES_PER_SCARF; $i++)
                @if($scarf->{'edge_size' . $i})
                    <polygon points="{{ $cumulativeEdgeSize/4 }} 0, {{ ($scarf->{'edge_size' . $i} + $cumulativeEdgeSize)/4 }} 0,
                        {{ Scarf::WIDTH/2 }} {{ Scarf::HEIGHT - ($scarf->{'edge_size' . $i} + $cumulativeEdgeSize)/4 }},
                        {{ Scarf::WIDTH - ($scarf->{'edge_size' . $i} + $cumulativeEdgeSize)/4 }} 0, {{ Scarf::WIDTH - $cumulativeEdgeSize/4 }} 0,
                        {{ Scarf::WIDTH/2 }} {{ Scarf::HEIGHT - $cumulativeEdgeSize/4 }}"
                             style="fill:{{ $scarf->{'edge_color_scheme' . $i} }}"/>
                @endif
                @if($scarf->{'edge_color_scheme_right' . $i})
                    <polygon points="
                        {{ Scarf::WIDTH/2 }} {{ Scarf::HEIGHT - ($scarf->{'edge_size' . $i} + $cumulativeEdgeSize)/4 }},
                        {{ Scarf::WIDTH - ($scarf->{'edge_size' . $i} + $cumulativeEdgeSize)/4 }} 0, {{ Scarf::WIDTH - $cumulativeEdgeSize/4 }} 0,
                        {{ Scarf::WIDTH/2 }} {{ Scarf::HEIGHT - $cumulativeEdgeSize/4 }}"
                             style="fill:{{ $scarf->{'edge_color_scheme_right' . $i} }}"/>
                @endif
                @php $cumulativeEdgeSize += $scarf->{'edge_size' . $i} @endphp
            @endfor
        </svg>
    </a>
</section>
