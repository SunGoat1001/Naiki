<?php

use App\Http\Controllers\DetailsController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\NewArrivalsController;
use App\Http\Controllers\ContactController;
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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/details/{id}', [DetailsController::class, 'show']);

Route::get('/newarrivals', [NewArrivalsController::class, 'index'])->name('new-arrivals.index');


Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', [App\Http\Controllers\ProfileController::class, 'edit'])->name('settings.edit');
    Route::delete('/settings', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('settings.destroy');
    Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
});
