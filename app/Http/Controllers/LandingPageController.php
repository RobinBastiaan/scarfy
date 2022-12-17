<?php

namespace App\Http\Controllers;

use App\Models\Scarf;
use App\Models\ScoutGroup;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function __invoke()
    {
        return view('landing-page', [
            'totalScarves'      => Scarf::query()->count(),
            'totalScoutGroups'  => ScoutGroup::query()->count(),
            'recentAdditions'   => ScoutGroup::recentAdditions()->get(),
            'showScoutScarfDay' => $this->shouldShowScoutScarfDay(),
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
}
