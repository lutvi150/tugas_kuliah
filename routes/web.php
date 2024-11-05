<?php

use App\Http\Controllers\AkademikController;
use App\Http\Controllers\Dosen;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('saya');
});
Route::get('mhs');
Route::get('dosen', [Dosen::class, 'biodata']);
Route::get('akademik', [AkademikController::class, 'index']);
Route::post('akademik', [AkademikController::class, 'akademikStore']);
