<?php


use App\Http\Controllers\locationController;
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
Route::post('/dataperizinanadmin/store', [dataperizinanadmincontroller::class, 'store'])
    ->name('dataperizinanadmin.store');

Route::get('/detailvalidasiadmin', [detailvalidasiadmincontroller::class, 'index'])
    ->name('/detailvalidasiadmin.index');

Route::get('/detailprocessadmin', [detailprocessadmincontroller::class, 'index'])
    ->name('/detailprocessadmin.index');

Route::get('/detailditerimaadmin', [detailditerimaadmincontroller::class, 'index'])
    ->name('/detailditerimaadmin.index');

Route::get('/detailditolakadmin', [detailditolakadmincontroller::class, 'index'])
    ->name('/detailditolakadmin.index');

Route::get('/detaildoneadmin', [DetailDoneAdminController::class, 'index'])
    ->name('detaildoneadmin.index');
Route::get('/admin/detaildoneadmin', [DetailDoneAdminController::class, 'index'])
    ->name('detaildoneadmin.index');
Route::post('/detaildoneadmin/store', [detaildoneadmincontroller::class, 'store'])
    ->name('detaildoneadmin.store');
Route::get('/detaildoneadmin/{id}', [detaildoneadmincontroller::class, 'show'])
    ->name('detaildoneadmin.show');
Route::put('/detaildoneadmin/{id}', [detaildoneadmincontroller::class, 'update'])
    ->name('detaildoneadmin.update');
Route::delete('/detaildoneadmin/{id}', [detaildoneadmincontroller::class, 'destroy'])
    ->name('detaildoneadmin.destroy');


Route::get('/laporancetakadmin', [laporancetakadmincontroller::class, 'index'])
    ->name('laporancetakadmin.index');
Route::get('/laporancetakadmin/download-pdf', [LaporanExportController::class, 'downloadPDF'])
    ->name('laporancetakadmin.downloadpdf');
Route::get('/laporancetakadmin/print-pdf', [LaporanExportController::class, 'printPDF'])
    ->name('laporancetakadmin.printpdf');



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
