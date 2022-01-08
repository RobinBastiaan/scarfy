<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ScarfController;
use App\Http\Controllers\ScoutGroupController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/under-construction', static fn() => View::make('under-construction'));
Route::demoAccess('/demo');

//only users who have previously visited "/demo" will be able to see these pages.
Route::group(['middleware' => 'demoMode'], static function () {
    Route::get('/', LandingPageController::class)->name('landing_page');
    Route::get('/about', static fn() => View::make('about'));

    Route::resources([
        'scarves' => ScarfController::class,
        'groups'  => ScoutGroupController::class,
    ]);
});
