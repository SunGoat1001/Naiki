<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('categories', \App\Http\Controllers\API\CategoryController::class);
    Route::apiResource('products', \App\Http\Controllers\API\ProductController::class);

});

Route::get('/test-slow-query', function () {
    DB::select('SELECT SLEEP(1)'); // Truy vấn này sẽ dừng trong 2 giây (2000ms)

    return response()->json(['message' => 'Slow query executed']);
});
Route::get('/slow-request', function () {
    sleep(2); // Độ trễ 2 giây

    return 'Slow request!';
});
Route::get('/slow-outgoing', function () {
    \Illuminate\Support\Facades\Http::get('https://httpbin.org/delay/2'); // Yêu cầu HTTP chậm 2 giây

    return 'Slow outgoing request!';
});
