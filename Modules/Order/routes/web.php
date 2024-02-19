<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\App\Http\Controllers\OrderController;
use Modules\Order\App\Http\Controllers\PipelineActionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('orders', OrderController::class)->names('order')->middleware('auth');
    Route::resource('pipeline-actions', PipelineActionController::class)->names('pipeline-action')->only(['store', 'destroy'])->middleware('auth');
});
