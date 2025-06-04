<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\RequestController;
use App\Http\Controllers\User\PermissionTypeController;
use App\Http\Controllers\User\LocationController;
use App\Http\Controllers\User\DataPerizinanController;
use App\Http\Controllers\User\FormStepper;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController; // Ensure this matches the actual namespace of ProfileController
// Removed unused imports

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.auth');
    Route::post('/register', [AuthController::class, 'register'])->name('register.auth');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/perizinan', [DataPerizinanController::class, 'index'])->name('perizinan');

//for permission type select
Route::get('/permission', [PermissionTypeController::class, 'index'])->name('permission');
Route::post('/permission', [PermissionTypeController::class, 'validate'])->name('permission.validate');

// For stepper form
Route::get('/addData/{step?}', [FormStepper::class, 'index'])->name('addData');
Route::post('/addData/store', [FormStepper::class, 'store'])->name('addData.store');

// For fetching data
Route::post('/fetch-city', [FormStepper::class, 'fetchCity']);
Route::post('/fetch-subdistrict', [FormStepper::class, 'fetchSubdistrict']);
// Dropdown AJAX
// Route::post('/fetch-city', [FormStepper::class, 'fetchCity'])->name('fetch.city');
// Route::post('/fetch-subdistric', [FormStepper::class, 'fetchSubdistric'])->name('fetch.subdistric');
// Route::post('/addData/{step?}', [FormStepper::class, 'store'])->name('addData');

// Route::get('/add-data', [FormStepper::class, 'getStepData'])->name('addData');

// Route::get('/perizinan-data', [FormStepper::class, 'index'])->name('addData');
// Route::get('/add-data', [FormStepper::class, 'getStepData'])->name('addData');
Route::get('/request-permit-store', [RequestController::class, 'index'])->name('request');
Route::get('/add-location', [LocationController::class, 'index'])->name('data-location.index');
Route::post('/add-location-store', [LocationController::class, 'store'])->name('data-location.store');

Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/permissions', [DataPerizinanController::class, 'index'])->name('data-permissions.index');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware(['auth:web'])->group(function () {
    Route::get('/home1', [HomeController::class, 'index'])->name('home.1');
});










// route::get('/perizinan', function () {
//     return view('user.formPerizinan.berandaDataPerizinan');
// });
route::get('/addData', function () {
    return view('user.formPerizinan.addDataPerizinan');
});
// Route::get('/add-data', function () {
//     return view('user.formPermissions.addDataPermissions');
// });
// Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
// Route::get('/DetailPerorangan', [DetailPeroranganController::class, 'store'])->name('DetailPerorangan.store');
// Route::get('/perizinan/index', [App\Http\Controllers\locationController::class, 'index'])->name('perizinan.index');

// Route::resource('locations', locationController::class);
