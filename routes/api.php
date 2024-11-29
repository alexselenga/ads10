<?php

use App\Http\Controllers\RecordController;
use App\Http\Middleware\EnsureAccessIsValid;
use Illuminate\Http\Request;
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

Route::controller(RecordController::class)->group(function () {
    Route::get('/records', 'index');
    Route::get('/records/{myRecord}', 'show');
    Route::get('/records2/{record}', 'show2')->middleware(EnsureAccessIsValid::class);
});
