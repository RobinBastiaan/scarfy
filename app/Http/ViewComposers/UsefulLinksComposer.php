<?php

namespace App\Http\ViewComposers;

use App;
use Illuminate\View\View;

class UsefulLinksComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('usefulLinks', $this->getUsefulLinks());
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
            //
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
