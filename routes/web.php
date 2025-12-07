<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DayController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('days', [DayController::class, 'calendar']);

require __DIR__.'/auth.php';