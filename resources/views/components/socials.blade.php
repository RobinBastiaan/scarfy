<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>

<div class="px-4 py-5 mt-2 text-center">
    <p class="lead">{{ __('Do you want to help this project further? Then share this website on your socials!') }}</p>
        {!!
            Share::page(
                URL::to('/'),
                __('Look at this awesome scouting scarf collection! Is your scarf already represented?'),
            )
                ->facebook()
                ->twitter()
                ->reddit()
                ->whatsapp()
                ->telegram();
        !!}
</div>
