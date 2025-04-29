<?php

use App\Http\Controllers\DataPerizinanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\locationController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/home', function () {
    return view('user.home');
});
route::get('/perizinan', function () {
    return view('user.formPerizinan.berandaDataPerizinan');
});
route::get('/addData', function () {
    return view('user.formPerizinan.addDataPerizinan');
});
// route::get('/addDataStep', function () {
//     return view('layouts.stepperForm');
// });

Route::get('/perizinan/index', [App\Http\Controllers\locationController::class, 'index'])->name('perizinan.index');

Route::resource('locations', locationController::class);
