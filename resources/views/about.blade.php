@extends('layouts.main')

@section('main')
    <article class="">
        <h2>{{ __('About') }}</h2>
        @if (Config::get('app.locale') === 'nl')
            <p>Een scoutingdas wordt door Scouts met trots gedragen en een echt icoon voor Scouting. Naast dat het je nek beschermt tegen ze zon, vertelt het ook waar je vandaan komt. Bijna iedere
                groep heeft namelijk wel een das die er uniek uitziet door middel van het gebruik van andere kleuren, patronen, tekst en zelfs een badge van de groep. Naast dat een das door een groep
                gebruikt wordt, worden er door dassen gebruikt door bijvoorbeeld regio's, landelijke teams en zelfs bij speciale (in)ternationale Scouting evenementen.</p>
            <p>Dit project is opgezet om deze grote diversiteit aan dassen te documenten en voor iedereen het gebruik van dassen ontdekbaar te maken. Doordat er alleen in Nederland al 1.000 groepen
                zijn met elk hun eigen das, is het een hele opgave om alle dassen te verzamelen. Bovendien worden er continu scoutinggroepen opgericht en gefuseerd, en zullen er steeds nieuwe speciale
                evenement dassen worden uitgegeven. Daarom is de hulp van eenieder die deze website bezoekt meer dan welkom en zo opgezet dat dit laagdrempelig kan.</p>
            <p>Als je technisch aangelegd bent, kan je overwegen om <a href="{{ url('https://github.com/RobinBastiaan/scarfy') }}">bij te dragen aan de code van dit project</a>.</p>
        @else
            {{-- Default assume "en" locale --}}
            <p>A Scout Scarf is worn with pride by Scouts and is a true icon for Scouting. Besides protecting your neck from the sun, it also tells where you are from. Almost every group has a scarf
                which looks unique with the use of different colours, patterns, text and even a badge of the scouting group. Besides the fact that a scarf is used by a group, scarves are used by
                scouting regions, national teams and even at special (in)ternational Scouting events.</p>
            <p>This project has been set up to document this great diversity of scarves and to make the use of scarves discoverable for everyone. World wide there are thousands of scouting groups, each
                with their own scarf, and this it is quite a task to collect all scarves. Moreover, scouting groups are constantly being founded and merged, and new special event ties will be issued
                all the time. Therefore, the help of everyone who visits this website is more than welcome and set up in such a way that this can be done easily.</p>
            <p>If you are technically inclined, you can consider <a href="{{ url('https://github.com/RobinBastiaan/scarfy') }}">contributing to the code of this project</a>.</p>
        @endif
    </article>

    @include('components.socials')
@endsection
