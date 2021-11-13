<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ScarfController;
use App\Http\Controllers\ScoutGroupController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPageController::class)->name('landingPage');

Route::resources([
    'scarves' => ScarfController::class,
    'groups'  => ScoutGroupController::class,
]);
