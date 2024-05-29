<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LedController;
use App\Http\Controllers\StatusController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('users', UserController::class)
->except(['create','edit']);

// Route::get('/users/{id}/devices', [UserController::class, 'getUserDevices']);
Route::post('/users/{id}/devices', [DeviceController::class, 'store']);

Route::prefix('/devices')->name('devices')->group(function(){
    Route::get('/', [DeviceController::class, 'index'])->name('get');
    Route::get('/{id}', [DeviceController::class, 'show'])->name('details');
    Route::put('/{id}', [DeviceController::class, 'update'])->name('update');
    Route::delete('/{id}', [DeviceController::class, 'destroy'])->name('delete');
});

// Route::get('/users/{id}/leds', [UserController::class, 'getUserLeds']);
Route::post('/users/{id}/leds', [LedController::class, 'store']);

Route::prefix('/leds')->name('leds')->group(function(){
    Route::get('/', [LedController::class, 'index'])->name('get');
    Route::get('/{id}', [LedController::class, 'show'])->name('details');
    Route::put('/{id}', [LedController::class, 'update'])->name('update');
    Route::delete('/{id}', [LedController::class, 'destroy'])->name('delete');
});

Route::prefix('/data')->name('data')->group(function(){
    Route::post('/', [DataController::class, 'store'])->name('store');
    Route::get('/{id}', [DataController::class, 'show'])->name('details');
    Route::put('/{id}', [DataController::class, 'update'])->name('update');
    Route::delete('/{id}', [DataController::class, 'destroy'])->name('delete');
});

Route::prefix('/status')->name('status')->group(function(){
    Route::post('/', [StatusController::class, 'store'])->name('store');
    Route::get('/{id}', [StatusController::class, 'show'])->name('details');
    Route::put('/{id}', [StatusController::class, 'update'])->name('update');
    Route::delete('/{id}', [StatusController::class, 'destroy'])->name('delete');
});
