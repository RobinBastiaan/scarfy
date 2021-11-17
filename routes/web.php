<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ScarfController;
use App\Http\Controllers\ScoutGroupController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPageController::class)->name('landing_page');
Route::get('/about', AboutController::class)->name('about');

Route::resources([
    'scarves' => ScarfController::class,
    'groups'  => ScoutGroupController::class,
]);
