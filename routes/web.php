<?php

use App\Http\Controllers\AkademikController;
use App\Http\Controllers\Dosen;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login-view');
});
Route::get('mhs');
Route::get('dosen', [Dosen::class, 'biodata']);
Route::get('akademik', [AkademikController::class, 'index']);
// use for admin menu
Route::middleware([])->prefix('admin')->group(function () {
    Route::get('tes', function () {
        return view('admin.dashboard');
    });
});
// Route::group('admin', function () {
//     Route::get('dashboard', function () {
//         return view('admin.dashboard');
//     });
// });
