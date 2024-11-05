<?php

use App\Http\Controllers\AkademikController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('akademik', [AkademikController::class, 'akademikStore']);
Route::get('akademik', [AkademikController::class, 'akademikGet']);
