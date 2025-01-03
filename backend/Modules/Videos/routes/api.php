<?php

use Illuminate\Support\Facades\Route;
use Modules\Videos\Http\Controllers\VideosController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/
Route::name('videos')->group(function () {
    Route::post('video', [VideosController::class, 'create'])->name('create');
});

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('videos', VideosController::class)->names('videos');
});
