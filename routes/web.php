<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ScarfController;
use App\Http\Controllers\ScoutGroupController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', LandingPageController::class)->name('landing_page');
Route::get('/about', fn() => View::make('about'));

Route::resources([
    'scarves' => ScarfController::class,
    'groups'  => ScoutGroupController::class,
]);
