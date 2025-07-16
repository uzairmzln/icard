<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.login');
// })->name('/');

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('pages.dashboard');
//     });
// });
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
