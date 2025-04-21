<?php

use App\Http\Controllers\DataPerizinanController;
use Illuminate\Support\Facades\Route;

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

Route::get('/perizinan/index', [DataPerizinanController::class, 'index'])->name('perizinan.index');
