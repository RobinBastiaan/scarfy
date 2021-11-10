<section class="rounded-lg m-1 p-1">
    <svg viewBox="0 0 100 25">
        <polygon points="0 0, 100 0, 50 25" style="fill:{{ $scarf->color_scheme }}"/>
        @if($scarf->edge_size)
            <polygon points="0 0, 10 0, 50 20, 90 0, 100 0, 50 25" style="fill:{{ $scarf->edge_color_scheme }}"/>
        @endif
    </svg>
</section>
