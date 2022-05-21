<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\PagesController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [CardsController::class, 'index']);

Route::get('category/{category}', [CardsController::class, 'index']);

Route::resource('cards', CardsController::class);

Route::get('/category/{category}/card/{id}', [CardsController::class, 'show']);

Route::post('photos', [CardsController::class, 'uploadPhotos']);
