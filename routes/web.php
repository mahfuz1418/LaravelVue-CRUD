<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{any}', function () {
    return view('welcome'); // or your main Blade view file
})->where('any', '.*');
