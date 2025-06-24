<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataPerizinanController;
use App\Http\Controllers\PermissionTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
 return view('landingPage');
})->name('home');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/draft', [PerizinanController::class, 'index'])->name('draft.index');

    Route::middleware('role:user')->group(function () {
        Route::get('/user/dashboard', function () {
            return view('dashboard.user');
        })->name('user.dashboard');

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/perizinan', [DataPerizinanController::class, 'index'])->name('berandaDataPerizinan');
            Route::get('/permission', [PermissionTypeController::class, 'index'])->name('permission');
            Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
            Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto'])->name('profile.delete-photo');
            Route::get('/draft', [PerizinanController::class, 'index'])->name('draft');
            Route::get('/perizinan/{id}', [PerizinanController::class, 'detail'])->name('perizinan.detail');
        });
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('dashboard.admin');
        })->name('admin.dashboard');
    });
});
Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('user')) {
            return redirect()->route('user.dashboard');
        }
    }
    // Jika belum login → tampilkan landing page di views/landingPage.blade.php
    return view('landingPage');
})->name('home');

Route::fallback(function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('user')) {
            return redirect()->route('user.dashboard');
        }
    }
    return redirect()->route('login');
});

Route::get('/debug-perizinan', [PerizinanController::class, 'debug'])->name('debug.perizinan');
