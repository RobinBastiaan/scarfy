<?php

namespace App\Http\Controllers;

use App\Models\Scarf;
use App\Models\ScoutGroup;

class LandingPageController extends Controller
{
    public function __invoke()
    {
        return view('landing-page', [
            'totalScarves'     => Scarf::all()->count(),
            'totalScoutGroups' => ScoutGroup::all()->count(),
            'recentAdditions'  => ScoutGroup::recentAdditions()->get(),
        ]);
    }
}
