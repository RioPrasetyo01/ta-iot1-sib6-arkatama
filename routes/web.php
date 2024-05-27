<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/sensor', function () {
    return view('pages.sensor',[
        "title"=>"Sensor"
    ]);
})->middleware(['auth', 'verified'])->name('sensor');

Route::get('/led', function () {
    return view('pages.led',[
        "title"=>"Led Control"
    ]);
})->middleware(['auth', 'verified'])->name('led');

// Route::get('/user', function () {
//     return view('pages.user.index',[
//         "title"=>"User"
//     ]);
// })->middleware(['auth', 'verified'])->name('user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});


require __DIR__.'/auth.php';
