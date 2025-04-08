<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/home', function () {
    return view('user.home');
});
route::get('/perizinan', function () {
    return view('user.dataPerizinan');
});
route::get('/tambahData', function () {
    return view('user.addDataPerizinan');
});
