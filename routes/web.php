<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\NewArrivalsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'index']);

Route::get('/newarrivals', [NewArrivalsController::class, 'index'])
    ->name('newarrivals.index');
