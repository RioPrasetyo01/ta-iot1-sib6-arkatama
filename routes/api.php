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
Route::get('/devices', [DeviceController::class,'index']);
Route::get('/devices/{id}', [DeviceController::class,'show']);
Route::put('/devices/{id}', [DeviceController::class,'update']);
Route::delete('/devices/{id}', [DeviceController::class,'destroy']);

Route::post('/data', [DataController::class, 'store']);
Route::get('/data', [DataController::class, 'index']);
Route::get('/data/{id}', [DataController::class, 'show']);

Route::post('/users/{id}/leds', [LedController::class, 'store']);
Route::get('/leds', [LedController::class,'index']);
Route::get('/leds/{id}', [LedController::class,'show']);
Route::put('/leds/{id}', [LedController::class,'update']);
Route::delete('/leds/{id}', [LedController::class,'destroy']);

Route::post('/status', [StatusController::class, 'store']);
Route::get('/status', [StatusController::class, 'index']);
Route::get('/status/{id}', [StatusController::class, 'show']);
