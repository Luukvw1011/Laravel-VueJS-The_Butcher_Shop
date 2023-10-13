<?php

use Illuminate\Support\Facades\Route;

// Route::get('img', function () {
//     dd(fake()->imageUrl(640, 480, 'Ground Turkey', true));
// });

Route::get('{any}', function () { 
    return view('welcome'); 
})->where('any', '.*');
