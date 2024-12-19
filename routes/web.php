<?php

use App\Http\Controllers\DetailsController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\NewArrivalsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomepageController::class, 'index']);

Route::get('/details/{id}', [DetailsController::class, 'show']);

Route::get('/newarrivals', [NewArrivalsController::class, 'index'])->name('new-arrivals.index');
