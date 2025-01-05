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
Route::name('videos.')->group(function () {
    Route::get('videos', [VideosController::class, 'list'])->name('list');
    Route::post('video', [VideosController::class, 'store'])->name('save');
    Route::get('video/{id}', [VideosController::class, 'find'])->name('find');
    Route::put('video', [VideosController::class, 'store'])->name('update');
    Route::delete('video/{id}', [VideosController::class, 'delete'])->name('delete');
});
