<?php

namespace App\Http\Controllers;

use App\Models\Scarf;
use App\Models\ScoutGroup;

class LandingPageController extends Controller
{
    public function __invoke()
    {
        return view('landingPage', [
            'totalScarves'     => Scarf::all()->count(),
            'totalScoutGroups' => ScoutGroup::all()->count(),
            'recentAdditions'  => ScoutGroup::orderBy('created_at', 'DESC')->take(3)->get(),
        ]);
    }
}
