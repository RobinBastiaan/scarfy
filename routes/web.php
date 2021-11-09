<?php

use App\Http\Controllers\ScoutGroupController;
use App\Models\Scarf;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
})->name('landingPage');

Route::resources([
    'scarfs' => Scarf::class,
    'groups' => ScoutGroupController::class,
]);
