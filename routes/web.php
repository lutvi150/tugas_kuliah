<?php

use App\Http\Controllers\Dosen;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('saya');
});
Route::get('mhs');
Route::get('dosen', [Dosen::class, 'biodata']);
