<?php

namespace App\Http\Controllers;

use App\Models\Scarf;
use App\Models\ScoutGroup;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class LandingPageController extends Controller
{
    public function __invoke()
    {
        $ttl = 3600;

        $totalScarves = Cache::remember('totalScarves', $ttl, fn() => Scarf::query()->count());
        $totalScoutGroups = Cache::remember('totalScoutGroups', $ttl, fn() => ScoutGroup::query()->count());
        $recentAdditions = Cache::remember('recentAdditions', $ttl, fn() => ScoutGroup::recentAdditions()->get());

        return view('landing-page', [
            'totalScarves'      => $totalScarves,
            'totalScoutGroups'  => $totalScoutGroups,
            'recentAdditions'   => $recentAdditions,
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
