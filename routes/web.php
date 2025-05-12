<?php

use App\Http\Controllers\BerandaAdminController;
use App\Http\Controllers\dataperizinanadmincontroller;
use App\Http\Controllers\detailvalidasiadmincontroller;
use App\Http\Controllers\detailprocessadmincontroller;
use App\Http\Controllers\detailditerimaadmincontroller;
use App\Http\Controllers\detailditolakadmincontroller;
use App\Http\Controllers\detaildoneadmincontroller;
use App\Http\Controllers\laporancetakadmincontroller;
use App\Http\Controllers\LaporanExportController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//    // return view('welcome');
// });

Route::get('/berandaadmin', [BerandaAdminController::class, 'index'])
    ->name('berandaadmin.index');
Route::get('/dataperizinanadmin', [DataPerizinanAdminController::class, 'index'])
    ->name('dataperizinanadmin.index');
Route::get('/detailvalidasiadmin', [detailvalidasiadmincontroller::class, 'index'])
    ->name('/detailvalidasiadmin.index');
Route::get('/detailprocessadmin', [detailprocessadmincontroller::class, 'index'])
    ->name('/detailprocessadmin.index');
Route::get('/detailditerimaadmin', [detailditerimaadmincontroller::class, 'index'])
    ->name('/detailditerimaadmin.index');
Route::get('/detailditolakadmin', [detailditolakadmincontroller::class, 'index'])
    ->name('/detailditolakadmin.index');
Route::get('/detaildoneadmin', [detaildoneadmincontroller::class, 'index'])
    ->name('/detaildoneadmin.index');
Route::get('/laporancetakadmin', [laporancetakadmincontroller::class, 'index'])
    ->name('laporancetakadmin.index');

Route::get('/laporancetakadmin/download-pdf', [LaporanExportController::class, 'downloadPDF'])
    ->name('laporancetakadmin.downloadpdf');

Route::get('/laporancetakadmin/print-pdf', [LaporanExportController::class, 'printPDF'])
    ->name('laporancetakadmin.printpdf');

Route::get('/laporancetakadmin/download-excel', [LaporanExportController::class, 'downloadExcel'])
    ->name('laporancetakadmin.downloadexcel');
