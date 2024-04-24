<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendSmsController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [MainController::class, 'main']);
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');

    Route::resource('workers', WorkerController::class,);

    Route::get('/sendSms', [SendSmsController::class, 'sendSms']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
