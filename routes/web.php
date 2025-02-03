<?php

declare(strict_types=1);

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');

Route::get('/register', [RegistrationController::class, 'create'])->name('register')->middleware('guest');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store')->middleware('guest');
