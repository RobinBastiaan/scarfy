<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ScarfController;
use App\Http\Controllers\ScoutGroupController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/under-construction', static fn() => View::make('under-construction'));

Route::get('/', LandingPageController::class)->name('landing_page');
Route::get('/about', static fn() => View::make('about'));

Route::resources([
    'scarves' => ScarfController::class,
    'groups'  => ScoutGroupController::class,
    'votes'   => VoteController::class,
]);

Route::get('/scarves/{scarf}/add-group', [ScarfController::class, 'addGroup'])->name('scarves.add-group');
Route::post('/scarves/{scarf}/store-add-group', [ScarfController::class, 'storeAddGroup'])->name('scarves.store-add-group');
