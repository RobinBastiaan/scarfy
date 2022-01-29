<?php

namespace App\Http\Controllers;

use App\Models\Scarf;
use App\Models\ScoutGroup;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class LandingPageController extends Controller
{
    public function __invoke()
    {
        return view('landing-page', [
            'totalScarves'      => Scarf::count(),
            'totalScoutGroups'  => ScoutGroup::count(),
            'recentAdditions'   => ScoutGroup::recentAdditions()->get(),
            'showScoutScarfDay' => $this->shouldShowScoutScarfDay(),
        ]);
    }

    /**
     * Determine when to show the Scout Scarf Day section.
     *
     * @return bool
     */
    protected function shouldShowScoutScarfDay(): bool
    {
        $currentDateTime = Carbon::now();
        $scoutScarfDay = Carbon::create(null, 8); // August 1st

        // only show during the month before Scout Scarf Day, and on the day itself
        return $currentDateTime <= $scoutScarfDay && $currentDateTime->addMonth() > $scoutScarfDay;
    }
}
