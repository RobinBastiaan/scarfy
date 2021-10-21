<?php

use Illuminate\Support\Facades\Route;

Route::get('/scarfs', function () {
    return view('scarfs.index');
});
