<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CardsController;

Route::get('/', function () {
    return view('pages.home');
});

Route::resource('cards', CardsController::class);

Route::get('{zip}/{street}', [CardsController::class, 'show']);

Route::post('photos', [CardsController::class, 'addTempPhoto']);
