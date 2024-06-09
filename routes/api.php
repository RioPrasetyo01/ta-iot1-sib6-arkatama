<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LedController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// route group name api
Route::group(['as' => 'api.'], function () {
    // resource route
    Route::resource('users', UserController::class)
        ->except(['create', 'edit']);

    Route::resource('data', DataController::class)
    ->names('data');
});

// Route::resource('users', UserController::class)
// ->except(['create','edit']);

Route::prefix('/devices')->name('devices')->group(function(){
    Route::post('/', [DeviceController::class, 'store'])->name('create');
    Route::get('/', [DeviceController::class, 'index'])->name('get');
    Route::get('/{id}', [DeviceController::class, 'show'])->name('details');
    Route::put('/{id}', [DeviceController::class, 'update'])->name('update');
    Route::delete('/{id}', [DeviceController::class, 'destroy'])->name('delete');
});

Route::prefix('/leds')->name('leds')->group(function(){
    Route::post('/', [LedController::class, 'store'])->name('create');
    Route::get('/', [LedController::class, 'index'])->name('get');
    Route::get('/{id}', [LedController::class, 'show'])->name('details');
    Route::put('/{id}', [LedController::class, 'update'])->name('update');
    Route::delete('/{id}', [LedController::class, 'destroy'])->name('delete');
});

Route::prefix('/data')->name('data')->group(function(){
    Route::post('/', [DataController::class, 'store'])->name('store');
    Route::get('/{id}', [DataController::class, 'show'])->name('details');
    Route::get('/{id}/latest', [DataController::class, 'showLatestData'])->name('');
    Route::put('/{id}', [DataController::class, 'update'])->name('update');
    Route::delete('/{id}', [DataController::class, 'destroy'])->name('delete');
});

Route::prefix('/status')->name('status')->group(function(){
    Route::post('/', [StatusController::class, 'store'])->name('store');
    Route::get('/{id}', [StatusController::class, 'show'])->name('details');
    Route::put('/{id}', [StatusController::class, 'update'])->name('update');
    Route::delete('/{id}', [StatusController::class, 'destroy'])->name('delete');
});
