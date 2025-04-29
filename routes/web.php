<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authentication'])->name('login.auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/register', [AuthController::class, 'register'])->name('register');