<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LedController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;
use App\Service\WhatsappNotificationService;

Route::get('/', function () {
    return view('layouts.landing');
});

Route::get('/dashboard', function () {
    $data['title'] = 'Dashboard';
        $data['breadcrumbs'] []=[
            'title'=>'Dashboard',
            'url'=>route('dashboard')
        ];
    return view('pages.dashboard',$data);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(LedController::class)->group(function () {
    Route::get('/leds', 'webIndex')->name('led.index');
    Route::post('/leds/{id}/status', 'webStore')->name('led.store');
});

Route::get('/sensor', [DataController::class, 'web_index'])->middleware(['auth', 'verified'])->name('sensor.index');


Route::get('/data/{deviceId}', [DataController::class, 'getChartData']);
Route::get('/leds/{Id}', [LedController::class, 'getChartData']);
Route::get('/data', [DataController::class, 'showCharts']);
Route::get('/devices', [DataController::class, 'showDevices']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'webIndex'])->name('users.index');

    // Route::get('/whatsapp', function () {
    //     $target = request('target');
    //     $message = 'Ada kebocoran gas di rumah anda, segera cek dan perbaiki';
    //     $response = WhatsappNotificationService::sendMessage($target, $message);
    //     echo $response;
    // });
});


require __DIR__.'/auth.php';
