<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<div class="rounded-lg shadow-lg bg-gray-100 flex flex-row flex-wrap p-3 antialiased">
    <p>{{ __('Do you want to help this project further? Then share this website on your socials!') }}</p>
    <div class="inline">
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
</div>
