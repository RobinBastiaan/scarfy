<?php

namespace App\Http\Controllers;

use App;
use App\Models\Scarf;
use App\Models\ScoutGroup;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function __invoke()
    {
        return view('landing-page', [
            'totalScarves'      => Scarf::count(),
            'totalScoutGroups'  => ScoutGroup::count(),
            'recentAdditions'   => ScoutGroup::recentAdditions()->get(),
            'showScoutScarfDay' => $this->shouldShowScoutScarfDay(),
            'usefulLinks'       => $this->getUsefulLinks(),
        ]);
    }

    /**
     * Determine when to show the section about Scout Scarf Day.
     *
     * @param int $monthsInAdvance
     * @return bool
     */
    protected function shouldShowScoutScarfDay(int $monthsInAdvance = 3): bool
    {
        $currentDateTime = Carbon::now();
        $scoutScarfDay = Carbon::create(null, 8); // August 1st

        // only show some period before Scout Scarf Day, and on the day itself
        return $currentDateTime <= $scoutScarfDay && $currentDateTime->addMonths($monthsInAdvance) > $scoutScarfDay;
    }

    /**
     * Get useful links based on the locale of the application.
     *
     * @return array
     */
    protected function getUsefulLinks(): array
    {
        // links relevant for all locales
        $generalLinks = [
            // TODO
        ];

        $localeSpecificLinks = [
            'en' => [
                'Wikipedia - Neckerchief' => 'https://en.wikipedia.org/wiki/Neckerchief#Scouting',
            ],
            'nl' => [
                'Scoutwiki - Dassencatalogus' => 'https://nl.scoutwiki.org/Dassencatalogus',
                'Wikipedia - Scoutingdas'     => 'https://nl.wikipedia.org/wiki/Scoutingdas',
                'Scoutshop - Dassenoverzicht' => 'https://www.scoutshop.nl/amfile/file/download/file/25/product/7656/',
            ],
        ];

        return array_merge($generalLinks, $localeSpecificLinks[App::currentLocale()]);
    }
}
